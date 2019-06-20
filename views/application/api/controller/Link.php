<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/29
 * Time: 16:51
 */
namespace app\api\controller;

use think\App;
use think\Db;
use think\facade\Request;

class Link extends Basic
{

    public function __construct(App $app = null)
    {
        $msg = parent::__construct($app);
        if(!empty($msg)){
            return $msg;
        }
    }


    public function addLink()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();
        unset($data['Appid']);unset($data['token']);

        if(empty($data['link_name']) || empty($data['link_company']) || empty($data['link_link'])){

            return json_encode(
                [
                    'errorCode' =>  122,
                    'errorMsg' => '添加友情链接时参数不足',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        $link_img = Request::instance()->file('link_img');
        $link_img = $link_img->move("./static/api/Uploads");

        if($link_img){
            $link_img = $link_img->getSaveName();
        }else{

            return json_encode(
                [
                    'errorCode' => 121,
                    'errorMsg' => '上传图片时出现错误',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

        //组装数据
        $data['link_img'] = $link_img;
        $data['link_addtime'] = time();

        $res = Db::name('link')->insert($data);

        if($res){

            return json_encode(
               [
                   'errorCode' => 200,
                   'errorMsg' => '添加友情链接成功',
                   'errorCause' => [],
               ],
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 123,
                    'errorMsg' => '添加友情链接失败',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

    }

    public function deleteLink()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();

        $res = Db::name('link')
            ->where(['link_id' => $data['link_id']])
            ->delete();

        if($res){

            return json_encode(
                [
                    'errorCode' => 200,
                    'errorMsg' => '删除友情链接成功',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }else{

            return json_encode(
                [
                    'errorCode' => 124,
                    'errorMsg' => '删除友情链接失败',
                    'errorCause' => [],
                ],
                JSON_UNESCAPED_UNICODE
            );

        }

    }

    public function getLink()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $data = Request::instance()->param();

        //计算偏移量
        $offset = ($data['page'] - 1) * $data['nums'];

        $linkData = Db::name('link')
            ->where(['link_isshow' => 2])
            ->limit("$offset",$data['nums'])
            ->order("link_addtime","DESC")
            ->select();

        return json_encode(
            [
                'errorCode' => 200,
                'errorMsg' => '友情链接数据查询成功',
                'errorCause' => $linkData,
            ],
            JSON_UNESCAPED_UNICODE
        );

    }




}