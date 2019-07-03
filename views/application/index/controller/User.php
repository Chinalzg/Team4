<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/13
 * Time: 20:11
 */
namespace app\index\controller;

use think\App;
use think\Request;
use think\View;
use think\facade\Session;
use think\facade\Cache;
use think\Db;
use app\index\model\User as UserModel;

class User extends Test
{

    /**
     * 初始化方法
     * User constructor.
     * @param App|null $app
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function __construct(App $app = null ,Request $Request)
    {
        parent::__construct($app);

        /**
         * 用户信息
         */
        global $thisUser;
        $thisUser = Session::get('thisUser');

        /**
         * 查询用户简略信息 -> 主页使用
         */
        $thisUser = Session::get('thisUser');

        /**
         * 查询博文分类信息
         */
        $cateData = Db::table('itblog_cate')->select();

        /**
         * 计算园龄
         */
        $compYear = function() use ($thisUser){
            //相差时间
            $asyTime = time() - $thisUser['user_addtime'];
            //算法
            if($asyTime <= 30*24*60*60){
                $blogYear = floor($asyTime / (24*60*60)).'天';
            }else if($asyTime <= 365*24*60*60){
                $blogYear = floor($asyTime / (30*24*60*60)).'月';
            }else{
                $blogYear = floor($asyTime / (365*24*60*60)).'年';
            }
            return $blogYear;
        };

        /**
         * 我的博客 -> 统计栏信息
         * 自己发布的文章数量
         * 自己发布的文章的总评论数(评论我的)
         */
        $Model = new UserModel();
        $countData = $Model->countData($Request->get('user_id'));

        /**
         * 我的博客 -> 公告栏信息
         * 昵称（构造方法中有了）
         * 园龄（构造方法中有了）
         * 粉丝
         * 关注
         */
        $bulletinData = $Model->bulletinData($Request->get('user_id'));

        /**
         * 我的收藏的数量和数据
         */
        $collectNums = $Model->collectData();

        /**
         * 我评论别人的数量
         */
        $commOtherPerson = $Model->commOtherPerson();


        $this->assign('commOtherPerson',    $commOtherPerson);//我发布的评论总数
        $this->assign('collectNums',    $collectNums);//收藏的数量
        $this->assign('countData',  $countData);  //个人主页右边栏，统计栏信息
        $this->assign('bulletinData',   $bulletinData); //右边栏个人中心栏信息


        $this->assign('blogYear', $compYear());  //园龄
        $this->assign('cateData', $cateData);      //分类
        $this->assign('thisUser', $thisUser);         //此用户信息缓存
        $this->assign('time', time());                    //时钟时间戳
    }

    /**
     * 查询个人博客主页
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function userBlogs(Request $Request){
        /**
         * 接收数据
         */
        $cate_id = $Request->get('cate_id', NULL);

        /**
         * 获取自己的博客内容
         */
        $Model = new UserModel();
        $data = $Model->getBlogs($Request->get('user_id'),  $cate_id);


        $this->assign('data',   $data);                    //自己发布的博文数据
        return View();
    }

    public function writeBlog(Request $Request){
        if($Request->isPost()){
            /**
             * 接收数据
             */
            $data = $Request->post();

            $Model = new UserModel();
            $msg = $Model->addBlogs($data);
            if($msg){
                $this->redirect("/index/User/userBlogs?user_id=$data[article_user_id]");
            }else{
                $this->assign('发布失败');
            }
        }else{
            /**
             * 用户标识符
             */
            $user_id = $Request->get('user_id');

            /**
             * 博文分类信息
             */
            $cateData = Db::table('itblog_cate')->select();

            $this->assign('cateData',   $cateData);
            $this->assign('user_id',    $user_id);
            return View('write_blog');
        }
    }

    public function updateBlog(Request $Request){
        if($Request->isPost()){
            /**
             * 更新博文 预留位置
             */
            $data = $Request->post();
            $data['article_isshow']  = 4;

            Db::table('itblog_article')
                ->where(['article_id' => $data['article_id']])
                ->update($data);

            global $thisUser;

            $this->redirect("/index/User/userBlogs?user_id=$thisUser[user_id]");
        }else{
            /**
             * 查询此条数据
             */
            $thisBlog = Db::table('itblog_article')
                ->where(['article_id' => $Request->get('article_id')])
                ->find();
            $this->assign('thisBlog',   $thisBlog);
            return View();
        }
    }

    /**
     * 编辑个人信息
     */
    public function updateMyself(Request $Request)
    {
        if($Request->isPost()){
            /**
             * 上传文件
             */
            $headImg = $Request->file('user_headimg');
            $moveRes = $headImg->move("./static/index/Uploads/headImg/");
            if($moveRes){
                $headImgPath = $moveRes->getSaveName();
            }else{
                $this->error($moveRes->getError());
            }

            /**
             * 接收数据
             */
            $data = $Request->post();
            $data['user_headimg'] = $headImgPath;

            Db::table('itblog_userinfo')
                ->where(['user_id' => $data['user_id']])
                ->update($data);

            $this->redirect("/index/Login/loginOut");
        }else{
            $thisUser = Session::get('thisUser');

            /**
             * 获取自己的博客内容
             */
            $Model = new UserModel();

            /**
             * 我的博客 -> 统计栏信息
             * 自己发布的文章数量
             * 自己发布的文章的总评论数
             */
            $countData = $Model->countData($Request->get('user_id'));

            /**
             * 我的博客 -> 公告栏信息
             * 昵称（构造方法中有了）
             * 园龄（构造方法中有了）
             * 粉丝
             * 关注
             */
            $bulletinData = $Model->bulletinData($Request->get('user_id'));

            $this->assign('thisUser',   $thisUser);
            $this->assign('countData',  $countData);        //个人主页右边栏，统计栏信息
            $this->assign('bulletinData',   $bulletinData);  //右边栏个人中心栏信息
            return View();
        }
    }

    /**
     * 删除自己的的博文
     */
    public function deleteBlog(Request $Request)
    {
        Db::startTrans();
        $res = Db::table('itblog_article')
            ->delete(['article_id' => $Request->get('article_id')]);

        if($res){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }

    /**
     * @取消关注功能
     * @param Request $Request
     */
    public function unattenUser(Request $Request)
    {
        if($Request->isAjax()) {
            /**
             * 不用验证登录
             * 只有登录了才能显示已关注的数据
             */
            $data = $Request->post();

            $thisUser = Session::get('thisUser');

            /**
             * 查询此被关注人的信息是否在数据库中
             */
            $thisData = Db::table('itblog_atten')
                ->where(['atten_user_id' => $data['article_user_id']])
                ->where(['atten_selfid' => $thisUser['user_id']])
                ->find();

            if (empty($thisData)) {

                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '您未关注此用户，操作错误',
                ];
                return json_encode($msg);

            }

            /**
             * 更改状态
             */
            $res = Db::table('itblog_atten')
                ->where(['atten_user_id' => $data['article_user_id']])
                ->where(['atten_selfid' => $thisUser['user_id']])
                ->update(['atten_status' => 2, 'atten_cancel_time' => time()]);

            if ($res) {

                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '取关成功',
                ];

            } else {

                $msg = [
                    'errorCode' => 102,
                    'errorMsg' => '取关失败',
                ];

            }
            return json_encode($msg);
        }
    }

    /**
     * @关注用户关注博主功能
     * @param Request $Request
     * @return false|string
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException8
     */
    public function attenUser(Request $Request)
    {
        if($Request->isAjax()){
            /**
             * 验证登录
             */
            $test = parent::checkLogin();
            if(!empty($test)){
                return $test;
            }

            $thisUser = Session::get('thisUser');

            $data = $Request->post();

            /**
             * 检查是否关注过此用户
             */
          $isAttenUser = Db::table('itblog_atten')
              ->field("atten_id")
              ->where(['atten_user_id' => $data['article_user_id']])
              ->where(['atten_selfid' => $thisUser['user_id']])
              ->find();

          if(empty($isAttenUser)){
              /**
               * 第一次关注或取关数据已被清空  将数据入库
               */
              $data = [

                  'atten_user_id' => $data['article_user_id'],
                  'atten_selfid' => $thisUser['user_id'],
                  'atten_addtime' => time(),
                  'atten_status' => 1,

              ];

              //关注信息入库
              $res = Db::table('itblog_atten')->insert($data);

              if($res){

                  $msg = [

                      'errorCode' => 100,
                      'errorMsg' => '关注成功',

                  ];

                  return json_encode($msg);
              }else{

                  $msg = [

                      'errorCode' => 101,
                      'errorMsg' => '添加关注失败',

                  ];

                  return json_encode($msg);
              }

          }else{

              /**
               * 已经关注过
               * 变更状态
               */
              $res = Db::table('itblog_atten')
                  ->where(['atten_user_id' => $data['article_user_id']])
                  ->where(['atten_selfid' => $thisUser['user_id']])
                  ->update(['atten_status' => 1,'atten_addtime' => time()]);

              if($res){

                  $msg = [
                      'errorCode' => 100,
                      'errorMsg' => '关注成功',
                  ];

                  return json_encode($msg);
              }else{

                  $msg = [
                      'errorCode' => 102,
                      'errorMsg' => '更新关注失败',
                  ];

                  return json_encode($msg);
              }
          }
        }

    }

    /**
     * 收藏博文功能
     */
    public function collectBlog(Request $Request)
    {
        if($Request->isAjax()){
            /**
             * 验证登录
             */
            $test = parent::checkLogin();
            if(!empty($test)){

                return $test;

            }

            $thisUser = Session::get('thisUser');

            $data = $Request->post();

            /**
             *
             */
            $thisCollectData = Db::table('itblog_collect')
                ->where(['collect_article_id' => $data['article_id']])
                ->where(['collect_article_userid' => $data['article_user_id']])
                ->where(['collect_selfid' => $thisUser['user_id']])
                ->find();

            if(empty($thisCollectData)){
                /**
                 * 为空则添加新的收藏数据
                 */
                $data = [
                    'collect_article_id' => $data['article_id'],
                    'collect_article_userid' => $data['article_user_id'],
                    'collect_selfid' => $thisUser['user_id'],
                    'collect_addtime' => time(),
                    'collect_status' => 1,
                ];

                $res = Db::table('itblog_collect')->insert($data);
                if($res){

                    $msg = [

                        'errorCode' => 100,
                        'errorMsg' => '收藏成功',

                    ];

                    return json_encode($msg);
                }else{

                    $msg = [

                        'errorCode' => 101,
                        'errorMsg' => '收藏失败',

                    ];
                    return json_encode($msg);
                }
            }else{
                /**
                 * 不为空则修改
                 */
                $res = Db::table('itblog_collect')
                    ->where(['collect_article_id' => $data['article_id']])
                    ->where(['collect_article_userid' => $data['article_user_id']])
                    ->where(['collect_selfid' => $thisUser['user_id']])
                    ->update(['collect_status' => 1,'collect_addtime' => time()]);

                if($res){

                    $msg = [

                        'errorCode' => 100,
                        'errorMsg' => '收藏成功',

                    ];

                    return json_encode($msg);
                }else{

                    $msg = [

                        'errorCode' =>  102,
                        'errorMsg' => '收藏失败',

                    ];

                    return json_encode($msg);
                }
            }

        }
    }

    /**
     * 取消收藏博文功能
     */
    public function uncollectBlog(Request $Request)
    {
        if($Request->isAjax()){

            $data = $Request->post();

            $thisUser = Session::get('thisUser');

            $thisCollectData = Db::table('itblog_collect')
                ->where(['collect_article_id' => $data['article_id']])
                ->where(['collect_article_userid' => $data['article_user_id']])
                ->where(['collect_selfid' => $thisUser['user_id']])
                ->find();

            if(empty($thisCollectData)){

                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '无此数据',
                ];

                return json_encode($msg);
            }else{

                $res = Db::table('itblog_collect')
                    ->where(['collect_article_id' => $data['article_id']])
                    ->where(['collect_article_userid' => $data['article_user_id']])
                    ->where(['collect_selfid' => $thisUser['user_id']])
                    ->update(['collect_status' => 2,'collect_cancel_time' => time()]);

                if($res){

                    $msg = [

                        'errorCode' => 100,
                        'errorMsg' => '取消收藏成功',

                    ];

                    return json_encode($msg);
                }else{

                    $msg = [
                        'errorCode' => 102,
                        'errorMsg' => '取消收藏失败',
                    ];

                    return json_encode($msg);
                }

            }
        }

    }

    /**
     * @查询我的收藏
     * @param Request $Request
     */
    public function myCollect(Request $Request)
    {
        if(!empty($Request->get('cate_id'))){
            $cate_condition = ["article_cateid" => $Request->get('cate_id')];
        }else{
            $cate_condition = [];
        }

        /**
         * 查询简略信息
         */
        $thisUser = Session::get('thisUser');

        $collectData = Db::table('itblog_collect')
            ->alias("collect")
            ->where(['collect_selfid' => $thisUser['user_id']])
            ->where(['collect_status' => 1])
            ->field("collect.collect_article_id")

            ->join("itblog_article article","collect.collect_article_id = article.article_id","RIGHT")
            ->field("article_id,article_title,article_addtime,article_looks,article_comms,left(`article_content`,220)as article_content")
            ->where($cate_condition)

            ->select();

        $this->assign('cate_id',    $Request->get('cate_id'));
        $this->assign('collectData',    $collectData);
        return View();
    }

    /**
     * 取消收藏
     */
    public function deleteCollect(Request $Request)
    {
        $thisUser = Session::get('thisUser');

        /**
         * 变更数据库数据状态值
         */

        Db::table('itblog_collect')
            ->where(['collect_selfid' => $thisUser['user_id']])
            ->where(['collect_article_id' => $Request->get('article_id')])
            ->update(['collect_cancel_time' => time(),'collect_status' => 2]);

        $this->redirect("/index/User/myCollect?cate_id=".$Request->get('cate_id')."&user_id=".$thisUser['user_id']);
    }


    /**
     * @我的粉丝
     * @param Request $Request
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function myFans(Request $Request)
    {

        global $thisUser;

        $myFans = Db::table('itblog_atten')
            ->alias("atten")
            ->field("atten_selfid,atten_addtime")
            ->where(['atten_user_id' => $thisUser['user_id']])
            ->where(['atten_status' => 1])

            ->join("itblog_userinfo userinfo","atten.atten_selfid = userinfo.user_id","LEFT")
            ->field("userinfo.user_name,userinfo.user_headimg")
            ->select();

        $this->assign('myFans', $myFans);
        return View();
    }

    /**
     * 我关注的人
     */
    public function myAtten()
    {

        global $thisUser;

        /**
         * 查询我关注的人的信息
         */
        $myAttenData = Db::table('itblog_atten')
            ->where(['atten_selfid' => $thisUser['user_id']])
            ->field("atten_user_id,atten_addtime")
            ->where(['atten_status' => 1])

            ->join("itblog_userinfo","atten_user_id = user_id","LEFT")
            ->field("user_name,user_headimg")

            ->select();

        $this->assign('myAtten',   $myAttenData);
        return View();
    }

    /**
     * 我发表的
     */
    public function myComm()
    {

        global $thisUser;

        $commOtherPer = Db::table('itblog_comm')
            ->where(['comm_user_id' => $thisUser['user_id']])
            ->where(['comm_isshow' => 2])
            ->field("comm_article_id,LEFT(comm_content,250) comm_content_short,comm_addtime")
            ->order("comm_addtime","ASC")

            ->join("itblog_article","comm_article_id = article_id","LEFT")
            ->field("article_title")

            ->select();

        $this->assign('commOtherPer',   $commOtherPer);
        return View();
    }

    /**
     * 评论我的
     */
    public function commMe()
    {
        global $thisUser;

        $commMeData = Db::table("itblog_article")
            ->where(['article_user_id' => $thisUser['user_id']])
            ->field("article_id,article_title")

            ->join("itblog_comm","article_id = comm_article_id","RIGHT")
            ->field("LEFT(comm_content,150) as comm_content_short,comm_addtime,comm_user_id")
            ->where("comm_isshow = 2")

            ->join("itblog_userinfo","comm_user_id = user_id","LEFT")
            ->field("user_name")

            ->select();

        $this->assign('commMeData', $commMeData);
        return View();
    }
     public function support($article_id , $supports , $user_id)
    {  
        
        
        if(Cache::store('redis')->get('user_article'.$user_id.'_'.$article_id)){

            echo json_encode(['code'=> 3 ,'msg'=>'supprot alerdy']);exit;

        }

        if(!Cache::store('redis')->get('article_support_'.$article_id)){

            Cache::store('redis')->set('article_support_'.$article_id , $supports ,300);

        }

        Cache::store('redis')->INCR('article_support_'.$article_id);
       
        Cache::store('redis')->set('user_article'.$user_id.'_'.$article_id , 1 ,3600);
        $article_supports =  Cache::store('redis')->get('article_support_'.$article_id);
        echo json_encode(['code' => 1 ,'msg' =>'success' ,'data'=> $article_supports]);exit;
            
    

       
        
                
                 
          

            
}



}