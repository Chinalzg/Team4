<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/13
 * Time: 9:02
 */
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\facade\Session;
use think\Request;
use app\index\model\Login as LoginModel;

class Login extends Controller{


    /**
     * 前台用户登录功能
     * 异步请求
     * @param Request $Request
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function doLogin(Request $Request){
        if($Request->isAjax()){
            /**
             * 接收登录参数
             */
            $data = $Request->post();
            $user_phone = $data['user_phone'];
            $user_pwd    = $data['user_pwd'];

            /**
             * 检查此用户
             * $thisUser 返回布尔值true\false
             */
            $Model = new LoginModel();
            $thisUser = $Model->checkThisUser($user_phone,$user_pwd);
            if($thisUser){
                /**
                 * 存在此用户
                 */
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '登录成功',
                ];
                return json_encode($msg);
            }else{
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '登录失败或被封号',
                ];
                return json_encode($msg);
            }
        }
    }

    /**
     * 用户注销
     */
    public function loginOut(Request $Request){
        /**
         * 检测
         */
//        $Url = $_SERVER["HTTP_REFERER"];
//        if(strpos($Url,"writeBlog")){
//            $this->error("请先退出发布博文页面");
//        }

        Session::start();
        Session::delete('thisUser');
        $this->redirect('/index/Index/index');
    }




}