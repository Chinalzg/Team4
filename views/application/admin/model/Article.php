<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/14
 * Time: 11:46
 */
namespace app\admin\model;


use think\Db;
use think\Model;

class Article extends Model{

    /**
     * 分页查询不正常的博文信息
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getBlogsData(){
        $data = Db::table('itblog_article')
            ->alias("article")
            ->field(["article.article_id","article.article_user_id","article.article_title","article.article_cateid","article.article_area","article_isshow","article_addtime"])
            ->where("article_isshow=1 or article_isshow=3 or article_isshow=4")

            ->field(["cate.cate_name"])
            ->join("itblog_cate cate","article.article_cateid = cate.cate_id")

            ->field(["userinfo.user_name"])
            ->join("itblog_userinfo userinfo","article.article_user_id = userinfo.user_id")
            ->paginate("6");

        /**
         * 对象转数组
         */
        foreach ($data as $k => $v){
            /**
             * 返回信息包括 ->
             *          出现非法字符总次数
             *          替换后的博客文章内容
             */
            $senDataMsg = $this->compSen($v['article_id']);

            /**
             * 非法字符出现总数
             * 和谐后的文章
             */
            $addData[$k]['sen_nums'] = $senDataMsg['totalSenNums'];
            $addData[$k]['article_content_normal'] = $senDataMsg['article_content'];
        }
        /**
         * data 基本数据
         * addData 附加数据
         * 返回值注意防止附加数组不存在 ->
         *                                            主数组为空时，不走循环，所以不存在附加数组
         */
        return [
            'data' => $data,
            'addData' => isset($addData)&&!empty($addData)?$addData:[],
        ];
    }

    /**
     * @获取状态正常的博文
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getNormalBlogs(){
        $data = Db::table('itblog_article')
            ->alias("article")
            ->field(["article.article_id","article.article_user_id","article.article_title","article.article_cateid","article.article_area","article_isshow","article_addtime"])
            ->where("article_isshow=2")

            ->field(["cate.cate_name"])
            ->join("itblog_cate cate","article.article_cateid = cate.cate_id")

            ->field(["userinfo.user_name"])
            ->join("itblog_userinfo userinfo","article.article_user_id = userinfo.user_id",'left')
            ->paginate("6");
            
        return $data;
    }

    /**
     * @获取未通过的博文（垃圾博文，已被删除的）
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getNopassBlogs(){
        $data = Db::table('itblog_nopass')
            ->alias('nopass')
            ->field("nopass.*")

            ->join("itblog_userinfo userinfo","nopass.article_user_id = userinfo.user_id")
            ->field("userinfo.user_name,userinfo.user_phone")
            ->paginate(6);
        return $data;
    }

    /**
     * @删除博文
     * @param string $article_id
     * @return bool
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function deleteBlog($article_id = ''){
        /**
         * 查询此博文数据 准备加入博通过数据表
         */
        $data = Db::table('itblog_article')
            ->field(["article_title","article_addtime as put_time","article_user_id"])
            ->where(['article_id' => $article_id])
            ->find();
        $data['delete_time'] = time();

        /**
         *  开启事务
         */
        Db::startTrans();
        /**
         * 删除的博文入垃圾博文数据库
         */
        $insertNoPass = Db::table('itblog_nopass')->insert($data);
        if($insertNoPass){
            /**
             * 执行删除
             */
            $deleteArticle = Db::table('itblog_article')
                ->where(['article_id' => $article_id])
                ->delete();
            if($deleteArticle){
                Db::commit();
                return true;
            }else{
                Db::rollback();
                return false;
            }
        }else{
            Db::rollback();
            return false;
        }
    }

    /**
     * @查询博文详细信息
     * @param string $article_id
     * @return array|null|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getArticleData($article_id = ''){
        $data = Db::table('itblog_article')
            ->alias("article")
            ->field("article.*")
            ->where(['article_id' => $article_id])

            ->field("cate.cate_name")
            ->join("itblog_cate cate","article.article_cateid = cate.cate_id","left")

            ->field("userinfo.user_name")
            ->join("itblog_userinfo userinfo","article_user_id = userinfo.user_id",'left')
            ->find();

        /**
         * 响应数据
         * 基本博文数据
         * 附加数据（违法字符数量 和谐后的博文）
         */
        $senMsgData = $this->oneCompSen($data);

        $data['totalSenNums'] = $senMsgData['totalSenNums'];
        $data['article_content_normal'] = $senMsgData['article_content'];
        return $data;
    }

    /**
     * @单条数据验证非法词汇
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function oneCompSen($data = []){
        /**
         * 非法词汇数据
         */
        $senData = Db::table('itblog_sensitive')
            ->field('sensitive_word')
            ->select();

        /**
         * 操作
         */
        $totalSenNums = 0; // 非法字符出现总次数
        foreach ($senData as $k => $v){
            /**
             * 判断$v['sensitive_word']是否在博文中 出现的次数
             */
            $senNums = substr_count($data['article_content'],    $v['sensitive_word']);

            /**
             * 加入总次数（非法字符出现总次数）
             */
            $totalSenNums  = $totalSenNums + $senNums;

            /**
             * 和谐字符串
             */
            for($i=1;$i<=$senNums;$i++){
                $data['article_content'] = str_replace($v['sensitive_word'],    "****",     $data['article_content']);
            }
        }
        return ['totalSenNums' => $totalSenNums,'article_content' => $data['article_content']];
    }


    /**
     * @统计非法词汇数量 并 和谐
     * @param string $article_id
     */
    private function compSen($article_id = ''){
        /**
         * 获取此博文正文
         */
        $article_content = Db::table('itblog_article')
            ->where(['article_id' => $article_id])
            ->field('article_content')
            ->find();

        /**
         * 非法词汇数据
         */
        $senData = Db::table('itblog_sensitive')
            ->field('sensitive_word')
            ->select();

        /**
         * 操作
         */
        $totalSenNums = 0; // 非法字符出现总次数
        foreach ($senData as $k => $v){
            /**
             * 判断$v['sensitive_word']是否在博文中 出现的次数
             */
            $senNums = substr_count($article_content['article_content'],    $v['sensitive_word']);

            /**
             * 加入总次数（非法字符出现总次数）
             */
            $totalSenNums  = $totalSenNums + $senNums;

            /**
             * 和谐字符串
             */
            for($i=1;$i<=$senNums;$i++){
                $article_content['article_content'] = str_replace($v['sensitive_word'],"****",$article_content['article_content']);
            }
        }
        return ['totalSenNums' => $totalSenNums,'article_content' => $article_content['article_content']];
    }

}


/**
 * 此SQL是清除非法词汇表
 * DELETE
 * FROM
 * itblog_sensitive
 * WHERE
 * sensitive_id NOT IN
 * ( SELECT id FROM
 * ( SELECT min( sensitive_id ) AS id FROM itblog_sensitive GROUP BY
 * sensitive_word )
 * AS b );
 */