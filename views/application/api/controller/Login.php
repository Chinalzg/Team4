<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/6/1
 * Time: 11:16
 */
namespace app\api\controller;

use think\facade\Request;
use think\Db;

class Login
{

    public function doLogin()
    {
//        $msg = $this->__construct();
//        if (!empty($msg)) {
//            return json_encode($msg, JSON_UNESCAPED_UNICODE);
//        }

        $data = Request::instance()->param();

        if (empty($data['user_phone']) || empty($data['user_pwd'])) {

            return json_encode(
                [
                    'errorCode' => 111,
                    'errorMsg' => '缺少登录参数user_phone或user_pwd',
                    'errorCause' => []
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        $thisUser = Db::name('userinfo')
            ->where(
                [
                    'user_phone' => $data['user_phone'],
                    'user_pwd' => $data['user_pwd'],
                ]
            )
            ->find();

        if (!empty($thisUser)) {
            unset($thisUser['user_pwd']);

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '用户登录成功',
                    'errorCause' => [
                        'user_info' => $thisUser,
                        'Appid' => $thisUser['user_id'],
                    ],
                ],
                JSON_UNESCAPED_UNICODE
            );

        } else {

            return json_encode(
                [
                    'errorCode' => 112,
                    'errorMsg' => '登录失败或无此用户',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

    }



}