<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/10
 * Time: 15:47
 */
namespace app\admin\controller;
use think\Db;
use think\facade\Session;
use think\Request;
use think\Controller;
use think\View;
use app\admin\model\Login as LoginModel;

class Login extends Controller {

    /**
     * 功能：后台管理员登录功能
     * 方式：同步post
     * @param Request $Request
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function doLogin(Request $Request){
        if($Request->isPost()){
            /**
             * 接收数据
             */
            $data = $Request->post();

            /**
             *  查询此用户
             */
            $thisAdmin = Db::table('itblog_admininfo')
                ->where(['admin_phone' => $data['admin_phone'],'admin_pwd' => $data['admin_pwd']])
                ->where(['admin_status' => 2])
                ->find();

            if($thisAdmin){
                Session::start();
                Session::set('thisAdmin',$thisAdmin);
                $this->redirect('/admin/Index/index');
            }else{
                $this->error("登录失败（账号密码错误或未审核通过）");
            }
        }else{
            return View();
        }
    }

    /**
     * 退出登录
     */
    public function loginOut(){
        Session::start();
        Session::delete("thisAdmin");
        $this->redirect("/admin/Index/index");
    }

}