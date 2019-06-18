<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/12
 * Time: 20:25
 */
namespace app\index\controller;

use think\Controller;
use think\facade\Request;
use think\facade\Session;
use think\model\Pivot;
use think\Db;

class Test extends Controller{

    public function initialize()
    {
        $Test = $this->checkLogin();

    }

    protected function checkLogin()
    {
        $thisUser = Session::get('thisUser');

        if($thisUser['user_status'] == 3){
            $this->error('您已被封号');
        }

        if(empty($thisUser)){

            /**
             * 如果是Ajax请求
             */
            if(Request::isAjax()){

                $msg = [
                    'errorCode' => 000,
                    'errorMsg' => '请先登录',
                ];

                return json_encode($msg);
            }else{
                $this->error('请先登录','/index/index/index');
                return false;
            }



        }


    }



}