<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/15
 * Time: 16:49
 */
namespace app\admin\model;

use think\Db;
use think\Model;

class User extends Model{

    public function getUserData(){
        $data = Db::table('itblog_userinfo')->paginate(6);
        return $data;
    }

    public function updateStatus($data = []){
        if($data['user_status'] == 2){
            $user_status = 3;
        }else{
            $user_status = 2;
        }

        $res = Db::table('itblog_userinfo')
            ->where(['user_id' => $data['user_id']])
            ->update(['user_status' => $user_status]);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function showExecUser(){
        $data = Db::table('itblog_userinfo')
            ->where("user_status <> 2")
            ->select();
        return $data;
    }


}