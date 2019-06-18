<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/29
 * Time: 15:14
 */
namespace app\api\controller;

use think\App;
use think\Db;
use think\facade\Request;

class Comm extends Basic
{

    public function __construct(App $app = null)
    {
        $msg = parent::__construct($app);
        if(!empty($msg)){
            return $msg;
        }
    }

    public function getComm()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();
        unset($data['token']);unset($data['Appid']);

        if(empty($data['article_id']) || empty($data['nums'])){

            return json_encode(
                [
                    'errorCode' => 118,
                    'errorMsg' => '获取评论参数不足',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        $commData = Db::name('comm')
            ->field("comm_id,comm_content")
            ->where(['comm_article_id' => $data['article_id']])
            ->where(['comm_isshow' => 2])
            ->limit($data['nums'])
            ->order("comm_addtime","DESC")
            ->select();

        return json_encode(
            [
                'errorCode' => 200,
                'errorMsg' => '查询成功',
                'errorCause' => $commData,
            ],
            JSON_UNESCAPED_UNICODE
        );

    }

    public function addComm()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();
        unset($data['Appid']);unset($data['token']);

        if(empty($data['comm_article_id']) || empty($data['comm_content']) || empty($data['comm_user_id'])){

            return json_encode(
                [
                    'errorCode' => 119,
                    'errorMsg' => '发布评论参数不足',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        $data['comm_addtime'] = time();

        $res = Db::name('comm')->insert($data);

        if($res){

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '发布评论成功',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 120,
                    'errorMsg' => '发布评论失败',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }



    }


}