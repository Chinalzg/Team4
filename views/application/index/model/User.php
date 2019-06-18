<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/14
 * Time: 10:30
 */
namespace app\index\model;

use think\Db;
use think\facade\Session;
use think\Model;
use traits\controller\Jump;

class User extends Model{

    public function __construct($data = [])
    {
        parent::__construct($data);

        global $thisUser;

        $thisUser = Session::get('thisUser');
    }

    public function addBlogs($data = []){
        $data['article_addtime'] = time();
        $res = Db::table('itblog_article')->insert($data);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function getBlogs($user_id = '',$cate_id = ''){
        if($cate_id == NULL){
            $data = Db::table('itblog_article')
                ->where(['article_user_id' => $user_id])
                ->where(['article_isshow' => 2])
                ->order('article_addtime',"DESC")
                ->select();
        }else{
            $data = Db::table('itblog_article')
                ->where(['article_cateid' => $cate_id])
                ->where(['article_user_id' => $user_id])
                ->where(['article_isshow' => 2])
                ->order('article_addtime',"DESC")
                ->select();
        }

        /**
         * 显示博客列表不许太长的文本 我们再此截取以便显示
         */
        foreach ($data as $k => $v){
            $data[$k]['short_article_content'] = substr($data[$k]['article_content'],0,227).'...';
            $data[$k]['short_article_content'] = trim(strip_tags($data[$k]['short_article_content']));
        }
        return $data;
    }

    public function countData($user_id = ''){
        /**
         * 查询自己发表的文章数量
         */
        $articleNums = Db::table('itblog_article')
            ->where(['article_user_id' => $user_id])
            ->count("article_id");

        /**
         * 查询文章总评论数
         */
        $commsNums = Db::table('itblog_article')
            ->where(['article_user_id' => $user_id])
            ->sum('article_comms');

        return ['articleNums' => $articleNums,'commsNums' => $commsNums];
    }

    public function bulletinData($user_id = ''){
        /**
         * 查询我的粉丝数量
         */
        $fansData = Db::table('itblog_atten')
            ->where(['atten_user_id' => $user_id])
            ->count('atten_id');

        $myattenData = Db::table('itblog_atten')
            ->where(['atten_selfid' => $user_id])
            ->count('atten_id');

        return ['fansNums' => $fansData,'myattenNums' => $myattenData];
    }

    /**
     * 获取我的收藏信息
     * 收藏数量
     */
    public function collectData()
    {
        $thisUser = Session::get('thisUser');

        $myCollectNums = Db::table('itblog_collect')
            ->where(['collect_status' => 1,'collect_selfid' => $thisUser['user_id']])
            ->count("collect_id");

        return $myCollectNums;
    }

    /**
     * 获取自己评论别人的数量
     */
    public function commOtherPerson()
    {
        //用户信息
        global $thisUser;

        return  Db::table('itblog_comm')
            ->field("comm_content,comm_addtime")
            ->where(['comm_user_id' => $thisUser['user_id']])
            ->where(['comm_isshow' => 2])
            ->count("comm_id");
    }



}