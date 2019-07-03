<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/13
 * Time: 14:51
 */
namespace app\index\model;

use think\Db;
use think\Model;

class Account extends Model{

    /**
     * 检查此用户手机号是否被使用
     * @param string $user_phone
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function checkThisUser($user_phone = ''){
        /**
         * 查询此框架
         */
        $thisUser = Db::table('itblog_userinfo')
            ->field('user_phone')
            ->where(['user_phone' => $user_phone])
            ->find();

        if(!empty($thisUser)){
            return false;
        }else{
            return true;
        }
    }

    /**
     * 用户注册，信息入库
     * @param array $data
     * @return bool
     */
    public function doAccount($data = []){
        $res = Db::table('itblog_userinfo')->insert($data);
        if($res){
            return true;
        }else{
            return false;
        }
    }






}