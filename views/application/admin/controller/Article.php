<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/14
 * Time: 11:44
 */
namespace app\admin\controller;
use app\admin\model\Article as ArticleModel;
use think\Db;
use think\Request;
use think\View;

class Article extends Test{

    /**
     * @查询状态不正常的博文
     * @return \think\response\View
     * @throws \think\exception\DbException
     */
    public function showBlogs(){
        /**
         * 接收数据
         */
        $Model = new ArticleModel();
        $Msg = $Model->getBlogsData();

        /**
         * 基本数据
         * 附加数据
         */
        $blogData = $Msg['data'];
        $addData = $Msg['addData'];

        $this->assign('blogData',$blogData);
        $this->assign('addData',$addData);
        return View();
    }

    /**
     * @状态正常博文
     * @return \think\response\View
     */
    public function normalBlogs(){
        $Model = new ArticleModel();
        $data = $Model->getNormalBlogs();

        $this->assign('data',$data);
        return View();
    }

    /**
     * @获取垃圾博文
     * @return \think\response\View
     */
    public function nopassBlogs(){
        $Model = new ArticleModel();
        $data = $Model->getNopassBlogs();
        $this->assign('data',$data);
        return View();
    }


    /**
     * @删除博文
     * @param Request $Request
     */
    public function deleteBlog(Request $Request){
        /**
         * 接收参数
         */
        $article_id = $Request->get('article_id');

        $Model = new ArticleModel();
        $res = $Model->deleteBlog($article_id);
        if($res){
            $this->redirect("/admin/article/showBlogs");
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * @审核博文
     * @param Request $Request
     * @return false|string|\think\response\View
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function articleCheck(Request $Request){
        /**
         * 异步审核此文章
         */
        if($Request->isAjax()){
            $articleStatus = $Request->post('articleStatus');
            if($articleStatus == 'succ'){
                $article_isshow = 2;        //通过
            }elseif($articleStatus == 'fail'){
                $article_isshow = 3;       //拒绝通过  4再次修改
            }

            $article_id = $Request->post('article_id');

            /**
             * 开启事务
             */
            Db::startTrans();

            $res = Db::table('itblog_article')
                ->where(['article_id' => $article_id])
                ->update(['article_isshow' => 0]);
            if($res){
                $res = Db::table('itblog_article')
                    ->where(['article_id' => $article_id])
                    ->update(['article_isshow' => $article_isshow]);
                if($res){
                    Db::commit();
                    $msg = [
                        'errorCode' => 100,
                        'errorMsg' => '审核成功',
                    ];
                    return json_encode($msg);
                }else{
                    Db::rollback();
                    $msg = [
                        'errorCode' => 102,
                        'errorMsg' => '审核失败',
                    ];
                    return json_encode($msg);
                }
            }else{
                Db::rollback();
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '审核失败',
                ];
                return json_encode($msg);
            }
        }

        /**
         * 接收数据
         */
        $article_id = $Request->get('article_id');
        
        /**
         * 响应数据包含 ->
         * 基本数据
         * 附加数据
         */
        $Model = new ArticleModel();
        $Msg = $Model->getArticleData($article_id);
        $this->assign('data',$Msg);
        return View();
    }

}