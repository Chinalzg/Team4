<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/27
 * Time: 9:58
 */
namespace app\api\controller;


use think\App;
use think\Controller;
use think\Db;
use think\facade\Request;

class Basic extends Controller
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);

        /**
         * 打开Redis
         */
        global $Redis;
        $Redis = new \Redis();
        $Redis->connect('127.0.0.1',6379);

        //验证登陆
//        $checkLogin = $this->checkLogin();
//        if(!empty($checkLogin)){
//            return $checkLogin;
//        }
        //验证Token
        $checkToken = $this->checkToken();
        if(!empty($checkToken)){
            return $checkToken;
        }
        //验证权限
        $checkPower = $this->checkPower();
        if(!empty($checkPower)){
            return $checkPower;
        }

    }


    private function checkToken()
    {
          $data =  Request::instance()->param();

          if(!empty($data['token']) && !empty($data['Appid'])){
              $Redis = new \Redis();
              $Redis->connect("127.0.0.1",  6379);
              $redisToken = $Redis->get("userid_" . $data['Appid'] . "_token");

              if(!empty($redisToken) && ($redisToken == $data['token']) ){

              }else {
                  return ['errorCode' => 105,     'errorMsg' => 'Token或Appid有误或还未获取Token',     'errorCause' => ''];
              }
          }else{
                return ['errorCode' => 106,     'errorMsg' => 'Token未设置或Appid未设置',     'errorCause' => ''];
          }
    }

    private function checkPower()
    {
    }

      /**
       * 给用户生成token
       */
    public function save(Request $Request)
    {
        $Redis = new \Redis();
        $Redis->connect('127.0.0.1',    6379);


        $userData = $Request::instance()->post();

          /**
           * 验证数据表
           */
          $thisUser = Db::name('userinfo')
              ->field("user_id")
              ->where(['user_phone' => $userData['user_phone']])
              ->where(['user_pwd' => $userData['user_pwd']])
              ->find();

          if(empty($thisUser)){
              return json_encode(
                  [
                      'errorCode' => 101,
                      'errorMsg' => '请求Token时的参数未查询出用户数据',
                      'errorCause' => []
                  ]
                  ,
                  JSON_UNESCAPED_UNICODE
              );
          }

        /**
         * 验证此用户是否存在Token
         */
        $isSet = Db::name('usertoken')
            ->field("token")
            ->where(['user_id' => $thisUser['user_id']])
            ->find();

        $Token = md5($userData['user_phone'] . $userData['user_pwd'] . time());
        if(empty($isSet)){
            /**
             * 请求正确 token入库
             */
            $insertDb = Db::name('usertoken')->insert(
                [
                    'user_id' => $thisUser['user_id'],
                    'token' => $Token,
                    'addtime' => time(),
                ]
            );

            if($insertDb){

                //存入Redis
                $Redis->set("userid_".$thisUser['user_id'].'_token',    $Token, 2*60*60);

                return json_encode(
                    [
                        'errorCode' => 100,
                        'errorMsg' => '生成Token成功',
                        'errorCause' => [
                            'token' => $Token,
                            'Appid' => $thisUser['user_id'],
                        ],
                    ]
                    ,
                    JSON_UNESCAPED_UNICODE
                );

            }else{

                return json_encode(
                    [
                        'errorCode' => 102,
                        'errorMsg' => '生成Token时网络错误',
                        'errorCause' => []
                    ]
                    ,
                    JSON_UNESCAPED_UNICODE
                );
            }
        }

        /**
         * 若存在此用户的Token 更新它
         */
        $updateToken = Db::name('usertoken')
            ->where(['user_id' => $thisUser['user_id']])
            ->update(['token' => $Token,    'addtime' => time()]);
        if($updateToken){

            //存入Redis
            $Redis->set("userid_".$thisUser['user_id'].'_token',    $Token, 2*60*60);

            return json_encode(
                [
                    'errorCode' => 103,
                    'errorMsg' => '更新Token成功',
                    'errorCause' => [
                        'token' => $Token,
                        'Appid' => $thisUser['user_id']
                    ],
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 104,
                    'errorMsg' => '更新Token失败',
                    'errorCause' => []
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }






    }



}