<?php
namespace app\index\controller;

use app\index\model\Redis;
use think\App;
use think\Controller;
use think\Db;
use think\facade\Cache;
use think\facade\Session;
use think\Request;
use think\View;

class Index extends Controller{



    public function __construct(App $app = null)
    {
        parent::__construct($app);
        Redis::redis();
    }


    public function index(Request $Request){
        $data = $Request->get();
        /**
         * 查询用户简略信息 -> 主页使用
         */
        Session::start();
        $thisUser = Session::get('thisUser');

        /**
         * 查询博文分类信息
         */
        $cateData = Db::table('itblog_cate')->select();

        /**
         * 查询轮播图信息
         */
        $slide_active = Db::table('itblog_ad')
            ->where(['ad_isshow' => 2])
            ->order("ad_addtime","DESC")
            ->limit(1)
            ->find();

        /**
         * 轮播图信息
         */
        $slide = Db::table('itblog_ad')
            ->where(['ad_isshow' => 2])
            ->order("ad_addtime","DESC")
            ->limit(1,4)
            ->select();

        /**
         * 查询首页文章信息
         */
        $cate_id = isset($data['cate_id']) && !empty($data['cate_id']) ? $data['cate_id'] : NULL;
        if($cate_id == NULL){
            $indexArticles = Db::table('itblog_article')
                ->order("article_addtime","DESC")
                ->where(['article_isshow' => 2])
                ->limit(15)
                ->select();
        }else{
            $indexArticles = Db::table('itblog_article')
                ->where(['article_cateid' => $cate_id])
                ->order("article_addtime","DESC")
                ->where(['article_isshow' => 2])
                ->limit(15)
                ->select();
        }

        /**
         * 当前用户的关注的用户信息
         */
        $thisUser = Session::get("thisUser");

        $attenData = Db::table('itblog_atten')
            ->field("atten_user_id")
            ->where(['atten_selfid' => $thisUser['user_id']])
            ->where(['atten_status' => 1])
            ->select();

        $attenData = array_column($attenData,"atten_user_id",0);

        /**
         * 当前用户收藏的博文信息
         */
        $collectData = Db::table('itblog_collect')
            ->field("collect_article_id")
            ->where(['collect_selfid' => $thisUser['user_id']])
            ->where(['collect_status' => 1])
            ->select();

        $collectData = array_column($collectData,"collect_article_id",0);

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
        //收藏和关注信息
        $this->assign('collectData',    $collectData);
        $this->assign('attenData',  $attenData);
        //轮播图信息
        $this->assign('slide_active',$slide_active);
        $this->assign('slide',$slide);
        //分类和用户信息
        $this->assign('cateData',$cateData);
        $this->assign('thisUser',$thisUser);
        //主页博文信息
        $this->assign('indexArticles',$indexArticles);
        return View();
    }




}
