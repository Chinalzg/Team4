<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/11
 * Time: 10:52
 */
namespace app\admin\controller;
use think\Db;
use think\facade\Cache;
use think\facade\Cookie;
use think\Request;
use think\Controller;
use app\admin\controller\REST;
use app\admin\controller\Sendnote;
use app\admin\model\Account as AccountModel;


class Account extends Controller{

    /**
     * 功能：后台注册成为管理员功能
     * 方式：异步
     * @param Request $Request
     * @return false|string|\think\response\View
     */
    public function doAccount(Request $Request){
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $data = $Request->post();
            $admin_phone = $data['admin_phone'];
            
            /**
             * 验证电话号是否被注册
             */
            $Model = new AccountModel();
            $repeatMsg = $Model->checkAdminRepeat($admin_phone);
            if($repeatMsg){
                $ajaxMsg = [
                    'errorCode' => 101,
                    'errorMsg' => '此电话已被注册',
                ];
                return json_encode($ajaxMsg);
            }

            /**
             * 验证短信验证码是否正确
             */
            $admin_testCode = $data['admin_testCode'];
            $testCode = Cache::get("$admin_phone");
            if($testCode != $admin_testCode){
                $ajaxMsg = [
                    'errorCode' => 102,
                    'errorMsg' => '验证码不正确或超时',
                ];
                return json_encode($ajaxMsg);
            }


            /**
             * 构建数据
             */
            $adminInfoData = [
                'admin_name' => '',
                'admin_pwd' => $data['admin_pwd'],
                'admin_phone' => $admin_phone,
                'admin_email' => '',
                'admin_status' => '',
                'admin_addtime' => time(),
                'admin_updatetime' => time(),
            ];

            $msg = Db::table('itblog_admininfo')->insert($adminInfoData);
            if($msg){
                $ajaxMsg = [
                    'errorCode' => 100,
                    'errorMsg' => '注册成功',
                ];
                return json_encode($ajaxMsg);
            }else{
                $ajaxMsg = [
                    'errorCode' => 103,
                    'errorMsg' => '注册失败',
                ];
                return json_encode($ajaxMsg);
            }
        }else{
            return View();
        }
    }

    /**
     * 发送短信验证码
     * @param Request $Request
     * @return string
     */
    public function sendNote(Request $Request){
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $admin_phone = $Request->post('admin_phone');

            /**
             * 设置参数
             */
            $testCode = rand(1000,9999);
            Cache::set("$admin_phone","$testCode","120");
            $content = [
                $testCode.",欢迎使用IT博客网。详情请致电13503268162",
                "2",
            ];

            /**
             * 实例化发短信模型 发送短信
             */
            $Model = new Sendnote();
            $res = $Model->sendNoteToAdmin($admin_phone,$content,1);
            if($res){
                return "ok";
            }else{
                return "faliure";
            }
        }else{
            return "faliure";
        }
    }

}