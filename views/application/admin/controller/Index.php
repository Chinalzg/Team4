<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/10
 * Time: 15:34
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\facade\Cache;
use think\facade\Session;
use think\View;
use app\admin\model\Comm;

class Index extends  Test {

    public function index(){
        /**
         * 查询用户信息
         */
        $thisAdmin = Session::get('thisAdmin');

        if(isset($thisAdmin['admin_name']) && !empty($thisAdmin['admin_name'])){
            $admin = $thisAdmin['admin_name'];
        }else{
            $admin = $thisAdmin['admin_phone'];
        }
        $this->assign('admin',$admin);
        return View();
    }

    public function welcome(){
        return View();
    }

}