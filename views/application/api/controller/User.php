<?php

namespace app\api\controller;

use think\App;
use think\Controller;
use think\Db;
use think\facade\Request;
use app\api\controller\Sendnote;
use think\facade\Cache;

class User extends Basic
{

    public function __construct(App $app = null)
    {
        $msg = parent::__construct($app);

        if (!empty($msg)) {
            return $msg;
        }
    }


    public function doLogin()
    {
        $msg = $this->__construct();
        if (!empty($msg)) {
            return json_encode($msg, JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();

        unset($data['token']);
        unset($data['Appid']);

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
                    'errorCause' => $thisUser,
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

    public function oneUser()
    {

        $msg = $this->__construct();
        if (!empty($msg)) {
            return json_encode($msg, JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();

        unset($data['token']);
        unset($data['Appid']);

        if (empty($data['user_id'])) {

            return json_encode(
                [
                    'errorCode' => 113,
                    'errorMsg' => '未设置用户user_id',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        $thisUser = Db::name('userinfo')
            ->where(['user_id' => $data['user_id']])


            ->find();

        if (!empty($thisUser)) {
            unset($thisUser['user_pwd']);
            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '查询单个用户信息成功',
                    'errorCause' => $thisUser,
                ],
                JSON_UNESCAPED_UNICODE
            );

        } else {

            return json_encode(
                [
                    'errorCode' => 114,
                    'errorMsg' => '查询失败或无此用户',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }
    }

    public function attenUser()
    {
        if (!empty($this->__construct())) {
            return json_encode($this->__construct(), JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();
        unset($data['Appid']);
        unset($data['token']);

        //判断参数
        if (empty($data['atten_user_id']) || empty($data['atten_selfid'])) {
            return json_encode(
                [
                    'errorCode' => 115,
                    'errorMsg' => '参数不足',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );
        }

        //检查曾经是否关注过
        $thisAtten = Db::name('atten')
            ->where(['atten_user_id' => $data['atten_user_id']])
            ->where(['atten_selfid' => $data['atten_selfid']])
            ->find();


        if (!empty($thisAtten)) {
            //执行关注(更新)
            $res = Db::name('atten')
                ->where(['atten_user_id' => $data['atten_user_id']])
                ->where(['atten_selfid' => $data['atten_selfid']])
                ->update(['atten_addtime' => time(), 'atten_status' => 1]);

        } else {
            //执行关注(添加)
            $attenData = [
                'atten_user_id' => $data['atten_user_id'],
                'atten_selfid' => $data['atten_selfid'],
                'atten_addtime' => time(),
                'atten_status' => 1,
            ];
            $res = Db::name('atten')->insert($attenData);
        }

        if ($res) {

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '关注成功',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        } else {

            return json_encode(
                [
                    'errorCode' => 116,
                    'errorMsg' => '关注失败',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }
    }

    public function unattenUser()
    {
        if (!empty($this->__construct())) {
            return json_encode($this->__construct(), JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();
        unset($data['token']);
        unset($data['Appid']);

        //判断参数
        if (empty($data['atten_user_id']) || empty($data['atten_selfid'])) {
            return json_encode(
                [
                    'errorCode' => 115,
                    'errorMsg' => '参数不足',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );
        }

        $unattenData = [
            'atten_status' => 2,
            'atten_cancel_time' => time(),
        ];

        $res = Db::name('atten')
            ->where(['atten_user_id' => $data['atten_user_id']])
            ->where(['atten_selfid' => $data['atten_selfid']])
            ->update($unattenData);

        if ($res) {

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '取消关注成功',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        } else {

            return json_encode(
                [
                    'errorCode' => 117,
                    'errorMsg' => '取关失败',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }
    }


    public function attenNums()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();

        if(empty($data['user_id'])){

            return json_encode(
                [
                    'errorCode' => 125,
                    'errorMsg' => '查询用户关注量时参数不足',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        $attenNums = Db::name('atten')
            ->where(['atten_selfid' => $data['user_id']])
            ->where(['atten_status' => 1])
            ->count('atten_id');

        return json_encode(
            [
                'errorCode' => 200,
                'errorMsg' => '统计成功',
                'errorCause' => [
                    'attenNums' => $attenNums,
                ],
            ],
            JSON_UNESCAPED_UNICODE
        );

    }

    public function fansNums()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();

        $fansNums = Db::name('atten')
            ->where(['atten_user_id' => $data['user_id']])
            ->where(['atten_status' => 1])
            ->count('atten_id');

        return json_encode(
            [
                'errorCode' => 200,
                'errorMsg' => '查询粉丝数量成功',
                'errorCause' => [
                    'fansNums' => $fansNums,
                ],
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function account()
    {
        if(Request::instance()->isPost()){

            $data = Request::instance()->param();
            $data['user_addtime'] = time();

            $res = Db::name('userinfo')->insert($data);
            if($res){

                return json_encode(
                   [
                       'errorCode' => 200,
                       'errorMsg' => '注册成功',
                       'errorCause' => [],
                   ],
                    JSON_UNESCAPED_UNICODE
                );

            }else{

                return json_encode(
                    [
                        'errorCode' => 126,
                        'errorMsg' => '注册失败',
                        'errorCause' => [],
                    ],
                    JSON_UNESCAPED_UNICODE
                );

            }
        }

    }

    /**
     * 用户注册发送短信验证码功能
     * @param Request $Request
     * @return string
     */
    public function sendNote()
    {
        if(Request::instance()->isGet()){
            /**
             * 接收参数
             */
            $user_phone = Request::instance()->param('user_phone');
die('测试');
            /**
             * 设置参数
             */
            $testCode = rand(1000,9999);
            Cache::set("$user_phone","$testCode","120");
            $content = [
                $testCode.",欢迎使用IT博客网。详情请致电13503268162",
                "2",
            ];

            /**
             * 实例化发短信模型 发送短信
             */
            $Model = new Sendnote();
            $res = $Model->sendNoteToAdmin($user_phone,$content,1);
            if($res){
                return "ok";
            }else{
                return "faliure";
            }
        }else{
            return "faliure";
        }
    }

    public function checkCode()
    {

    }


}