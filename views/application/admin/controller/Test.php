<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/10
 * Time: 15:35
 */
namespace  app\admin\controller;
use think\Controller;
use think\facade\Session;

class Test extends Controller{

    public function initialize(){
        /**
         * 后台检查管理员登录状态
         */
        
        $this->checkLogin();

    }


    private function checkLogin(){
        // Session::start();
        $thisAdmin = Session::get('thisAdmin');

        if(empty($thisAdmin)){
            $this->redirect('/admin/Login/doLogin');
        }else{
            //状态正常
        }

    }

}