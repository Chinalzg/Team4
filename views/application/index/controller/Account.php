<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/13
 * Time: 10:50
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\View;
use think\facade\Cache;
use app\index\controller\Sendnote;
use app\index\model\Account as AccountModel;

class Account extends Controller{

    public function doAccount(Request $Requset){
        if($Requset->isAjax()){
            /**
             * 接收参数
             */
            $data = $Requset->post();

            /**
             * 检测两次密码是否一致
             */
            if($data['user_pwd'] != $data['user_pwd_check']){
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '两次密码不一致,请重试',
                ];
                return json_encode($msg);
            }

            /**
             * 检测此电话号是否已注册
             */
            $Model = new AccountModel();
            $thisUser = $Model->checkThisUser($data['user_phone']);
            if(!$thisUser || empty($data['user_phone'])){
                $msg = [
                    'errorCode' => 102,
                    'errorMsg' => '此手机号已使用或号码为空',
                ];
                return json_encode($msg);
            }

            /**
             * 检查邮箱
             */
            if(empty($data['user_email'])){
                $msg = [
                    'errorCode' => 105,
                    'errorMsg' => '请填写电子邮箱',
                ];
                return json_encode($msg);
            }

            /**
             * 检测验证码
             */
            $testCode = Cache::get($data['user_phone']);
            if(empty($data['user_testCode']) || $testCode != $data['user_testCode']){
                $msg = [
                    'errorCode' => 103,
                    'errorMsg' => '验证码不正确或为空.',
                ];
                return json_encode($msg);
            }

            /**
             * 构建数据
             */
            unset($data['user_testCode']);
            unset($data['user_pwd_check']);
            $data['user_addtime'] = time();
            $data['user_updatetime'] = time();

            /**
             * 执行注册
             */
            $doAccount = $Model->doAccount($data);
            if($doAccount){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '注册成功',
                ];
            }else{
                $msg = [
                    'errorCode' => 104,
                    'errorMsg' => '注册失败',
                ];
            }
            return json_encode($msg);
        }else{
            return View('account');
        }
    }

    /**
     * 用户注册发送短信验证码功能
     * @param Request $Request
     * @return string
     */
    public function sendNote(Request $Request){
        if($Request->isAjax()){
            /**
             * 接收参数
             */
            $user_phone = $Request->post('user_phone');

            /**
             * 设置参数
             */
            $testCode = rand(1000,9999);
            Cache::set("$user_phone","$testCode","120");
            $content = [
                $testCode.",欢迎使用IT博客网。详情请致电13503268162",
                "2",
            ];

            /**
             * 实例化发短信模型 发送短信
             */
            $Model = new Sendnote();
            $res = $Model->sendNoteToAdmin($user_phone,$content,1);
            if($res){
                return "ok";
            }else{
                return "faliure";
            }
        }else{
            return "faliure";
        }
    }

    public function findPwd(Request $Request)
    {
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $data = $Request->post();

            /**
             * 验证非空
             */
            if(empty($data['user_pwd']) || empty($data['user_testCode']) || empty($data['user_phone'])){
                $msg = [
                    'errorCode' => 106,
                    'errorMsg' => '缺少必要参数',
                ];
                return json_encode($msg);
            }

            /**
             * 1.检查验证码是否正确
             * 2.检查电话号是否存在
             * 3.检查密码与原密码是否一致
             * 4.检查确认密码是否一致
             */

            //1.
            $testCode = Cache::get($data['user_phone']);

            if($testCode != $data['user_testCode']){

                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '验证码不正确',
                ];
                return json_encode($msg);

            }

            //2.
            $thisPhoneNum = Db::table('itblog_userinfo')
                ->field("user_pwd")
                ->where(['user_phone' => $data['user_phone']])
                ->find();

            if(empty($thisPhoneNum)){

                $msg = [
                    'errorCode' => 102,
                    'errorMsg' => '不存在此电话号码',
                ];
                return json_encode($msg);

            }

            //3.
            if($thisPhoneNum['user_pwd'] == $data['user_pwd']){
                $msg = [
                    'errorCode' => 103,
                    'errorMsg' => '不可与旧密码相同',
                ];
                return json_encode($msg);
            }

            //4.
            if($data['user_pwd'] != $data['user_pwd_check']){
                $msg = [
                    'errorCode' => 104,
                    'errorMsg' => '两次输入的密码不一致',
                ];
                return json_encode($msg);
            }

            //开始修改数据库
            $res = Db::table('itblog_userinfo')
                ->where(['user_phone' => $data['user_phone']])
                ->update(['user_pwd' => $data['user_pwd']]);
            if($res){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '修改成功',
                ];
            }else{
                $msg = [
                'errorCode' => 105,
                'errorMsg' => '修改失败',
                ];
            }
            return json_encode($msg);
        }else{
            return View();
        }
    }

    /**
     * @找回密码发送短信验证功能
     * @param Request $Request
     * @return string
     */
    public function findPwdNote(Request $Request){
        if($Request->isAjax()){
            $data = $Request->post();
            $user_phone = isset($data['user_phone']) && !empty($data['user_phone']) ? $data['user_phone'] : function(){
                return 'faliure';
            };

            /**
             * 生成验证码
             */
            $testCode = rand(1000,9999);
            Cache::set("$user_phone","$testCode","120");
            $content = [
                $testCode.",您正在修改密码，如非本人操作请忽略。详情请致电13503268162",
                "2",
            ];

            /**
             * 实例化发短信模型 发送短信
             */
            $Model = new Sendnote();
            $res = $Model->sendNoteToAdmin($user_phone,$content,1);
            if($res){
                return "ok";
            }else{
                return "faliure";
            }
        }
    }



}