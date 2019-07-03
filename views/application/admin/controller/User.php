<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/15
 * Time: 16:31
 */
namespace app\admin\controller;
use app\admin\model\User as UserModel;
use think\Request;
use think\View;

class User extends Test{

    public function showUser(){
            $Model = new UserModel();
            $data = $Model->getUserData();

            $this->assign('data',$data);
            return View();
    }

    public function updateStatus(Request $Request){
        if ($Request->isAjax()) {
            /**
             * 接收数据
             */
            $data = $Request->post();
            $Model = new UserModel();
            $res = $Model->updateStatus($data);
            if ($res) {
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '修改成功',
                ];
            } else {
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '修改失败',
                ];
            }
            return json_encode($msg);
        }
    }

    public function showExceUser(Request $Request){
        $Model = new UserModel();
        $data = $Model->showExecUser();

        $this->assign('data',$data);
        return View();
    }



}