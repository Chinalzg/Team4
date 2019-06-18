<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/13
 * Time: 9:31
 */
namespace app\index\model;

use think\Db;
use think\facade\Session;
use think\Model;

class Login extends Model{

    /**
     * 检查此登录的用户是否存在
     * 返回布尔数据
     * @param string $user_phone
     * @param string $user_pwd
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function checkThisUser($user_phone = '',$user_pwd = ''){
            $thisUser = Db::table('itblog_userinfo')
                ->where(['user_phone' => $user_phone,'user_pwd' => $user_pwd])
                ->where(['user_status' => 2])
                ->find();

            if(!empty($thisUser)){
                Session::start();
                Session::set('thisUser',$thisUser);
                return true;
            }else{
                return false;
            }
    }



}