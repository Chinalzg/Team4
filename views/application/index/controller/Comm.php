<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/22
 * Time: 11:06
 */
namespace app\index\controller;

use think\Db;
use think\facade\Session;
use think\Request;

class Comm extends Test
{


    /**
     * 发表评论
     */
    public function publishComm(Request $Request)
    {
        if($Request->isPost()){
            /**
             * 接收数据
             */

            $data = $Request->post();
            $thisUser = Session::get('thisUser');

            $data['comm_content'] = "<span>" . $data['comm_content'] . "</span>";
            $data['comm_user_id'] = $thisUser['user_id'];
            $data['comm_addtime'] = time();
            $data['comm_pid'] = 0;

            Db::table("itblog_article")
                ->where(['article_id' => $data['comm_article_id']])
                ->setInc("article_comms",1);


            $res = Db::table('itblog_comm')->insert($data);
            if($res){
                $this->redirect("/index/Article/showArticle?article_id=$data[comm_article_id]");
            }else {
                $this->error('评论失败');
            }
        }

    }






}