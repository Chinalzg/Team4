<?php

namespace app\api\controller;

use think\App;
use think\Db;
use think\facade\Request;
use app\api\model\Article as ArticleModel;
use think\response\Json;

class Article extends Basic
{
      public function __construct(App $app = null)
      {
            $basicMsg = parent::__construct($app);
            if(!empty($basicMsg)){
                return json_encode($basicMsg,   JSON_UNESCAPED_UNICODE);
            }

      }


    public function getArticle()
    {
        $data = Request::instance()->param();

        /**
         * 返回   检测类返回的信息
         */
        $checkMsg = $this->__construct();
        if(!empty($checkMsg)){
            return $checkMsg;
        }

        //判断文章分类类型号码
        if($data['cateid'] != 0){
            $cateWhere = "article_cateid = " . $data['cateid'];
        }else{
            $cateWhere = "1=1";
        }

        //计算偏移量
        $offset = ($data['page'] - 1) * $data['nums'];

        $articleData = ArticleModel::where(['article_isshow' => 2])
            ->alias('article')
            ->field("article_id,article_title,LEFT(article_content,40) as article_content_short,article_looks,article_comms,article_cateid,article_addtime")
            ->where(['article_isshow' => 2])
            ->where($cateWhere)

            ->join("cate","article.article_cateid = cate.cate_id","LEFT")
            ->field("cate_name")

            ->limit($offset,$data['nums'])
            ->select();

        if(!empty($articleData)){

            return json_encode(
                [
                    "errorCode" =>200,
                    'errorMsg' => '查询博文成功',
                    'errorCause' => $articleData,
                ]
                ,    JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    "errorCode" =>108,
                    'errorMsg' => '查询博文失败',
                    'errorCause' => $articleData,
                ]
                ,    JSON_UNESCAPED_UNICODE
            );

        }
    }

    public function addArticle()
    {
        $data = Request::instance()->post();
        $res = Db::name('article')->insert($data);
        if($res){

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '添加文章成功',
                    'errorCause' => [],
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 107,
                    'errorMsg' => '添加文章失败',
                    'errorCause' => [],
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }
    }

    public function updateArticle()
    {
        $msg = $this->__construct();
        if(!empty($msg)){
            return $msg;
        }

        $data = Request::instance()->param();

        unset($data['token']);unset($data['Appid']);

        $res = Db::name('article')
            ->where(['article_id' => $data['article_id']])
            ->update($data);

        if($res){

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '编辑文章成功',
                    'errorCause' => []
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 202,
                    'errorMsg' => '编辑文章失败',
                    'errorCause' => []
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }
    }

    public function deleteArticle()
    {
        $msg = $this->__construct();
        if(!empty($msg)){
            return $msg;
        }

        $data = Request::instance()->param();
        unset($data['Appid']);unset($data['token']);

        $res = Db::name('article')->where(['article_id' => $data['article_id']])->delete();
        if($res){

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '删除文章成功',
                    'errorCause' => []
                ]
                ,
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 108,
                    'errorMsg' => '删除文章失败',
                    'errorCause' => []
                ],
                JSON_UNESCAPED_UNICODE
            );

        }
    }

    public function checkArticle()
    {
        $msg = $this->__construct();
        if(!empty($msg)){
            return $msg;
        }

        $data = Request::instance()->param();

        unset($data['token']);unset($data['Appid']);

        $res = Db::name('article')
            ->where(['article_id' => $data['article_id']])
            ->update(['article_isshow' => $data['isshow']]);

        if($res){

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '审核成功',
                    'errorCause' => []
                ],
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 108,
                    'errorMsg' => '审核失败',
                    'errorCause' => []
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

    }


    public function personArtice()
    {
            $data = Request::instance()->param();

            if(empty($data['user_id'])){

                return json_encode(
                    [
                        'errorCode' => 127,
                        'errorMsg' => '未知user_id',
                        'errorCause' => [],
                    ],
                    JSON_UNESCAPED_UNICODE
                );

            }

            $data = Db::name('article')
                ->field("article_id,article_title,article_looks,article_comms,LEFT(article_content,60) as article_content_short")
                ->where(['article_user_id' => $data['user_id']])
                ->limit(5)
                ->select();

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '请求成功',
                    'errorCause' => $data,
                ],
                JSON_UNESCAPED_UNICODE
            );
    }


}