<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/14
 * Time: 8:37
 */
namespace app\index\controller;

use think\App;
use think\Controller;
use think\Request;
use think\View;
use think\facade\Session;
use think\facade\Cache;
use think\Db;

class Article extends Controller  {

    /**
     * 初始化方法，获得必要信息
     * article constructor.
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function __construct()
    {
        parent::__construct();
        /**
         * 查询用户简略信息 -> 主页使用
         */
        global $thisUser;
        $thisUser = Session::get('thisUser');

        /**
         * 查询博文分类信息
         */
        $cateData = Db::table('itblog_cate')->select();

        /**
         * 首页热门推荐数据
         */
        $hotData = Db::table('itblog_article')
            ->field("article_id,article_title,article_looks,article_comms,article_addtime")
            ->field("article_looks+article_comms AS hotNums")
            ->order("hotNums","DESC")
            ->limit("4")
            ->select();

        $this->assign('hotData',    $hotData);
        $this->assign('cateData',$cateData);
        $this->assign('thisUser',$thisUser);
        $this->assign('time',time());
    }


    public function showArticle(Request $Request)
    {
        /**
         * 查询数据
         */
        
        
        $articleData = Db::table('itblog_article')
            ->alias("article")
            ->field("article.article_id,article.article_user_id,article.article_title,article.article_addtime")
            ->field("article.article_looks,article.article_comms,article.article_content")

            ->where(['article_id' => $Request->get('article_id')])
            ->where(['article_isshow' => 2])

            ->join("itblog_userinfo userinfo","article.article_user_id = userinfo.user_id","LEFT")
            ->field("userinfo.user_name")

            ->join("itblog_cate cate","article.article_cateid = cate_id","LEFT")
            ->field("cate_name")

            ->find();

        /**
         * 更新访问量
         */
        Db::table('itblog_article')->where(['article_id' => $Request->get('article_id')])->setInc("article_looks",1);

        /**
         * 相关推荐
         */
        $recData = Db::table('itblog_article')
            ->where(['article_isshow' => 2])
            ->order("article_looks","DESC")
            ->limit("5")
            ->field("article_id,article_title")
            ->select();

        /**
         * 查询评论
         *      字段：用户名      -> 用户id
         *               评论内容
         *               评论时间
         *               用户头像   -> 用户id
         *
         *      条件：是否展示字段
         */
        $commData = Db::table('itblog_comm')
            ->alias("comm")
            ->field("comm_id,comm_content,comm_addtime,comm_user_id")
            ->where(['comm_isshow' => 2])
            ->where(['comm_article_id' => $Request->get('article_id')])
            ->order("comm.comm_addtime","ASC")

            ->join("itblog_userinfo userinfo","userinfo.user_id = comm.comm_user_id","LEFT")
            ->field("userinfo.user_name,userinfo.user_headimg")

            ->select();

        /**
         * 判断当前用户是否关注了此博文
         */
        global $thisUser;
        $attenInfo = Db::table('itblog_atten')
            ->field("atten_id")
            ->where(['atten_user_id' => $articleData['article_user_id']])
            ->where(['atten_selfid' => $thisUser['user_id']])
            ->where(['atten_status' => 1])
            ->find();
        if(Cache::store('redis')->get('article_support_'.$Request->get('article_id'))){

            $supports =  Cache::store('redis')->get('article_support_'.$Request->get('article_id'));
       }else{

            $supports = Db::name('article')->where(['article_id' => $Request->get('article_id')])->value('supports');
       }
       echo Cache::store('redis')->get('article_support_'.$Request->get('article_id'));
        
        
        $this->assign('attenInfo',  $attenInfo);
        $this->assign('commData',   $commData);
        $this->assign('thisUser',   Session::get('thisUser'));
        $this->assign('recData',    $recData);
        $this->assign('article',    $articleData);
        $this->assign('supports',    $supports);
        return View();
    }




}