<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/17
 * Time: 14:22
 */
namespace app\admin\model;

use think\Db;
use think\Model;

class Comm extends Model
{
    /**
     * @获取评论信息
     * @处理非法词汇
     * @return array
     * @throws \think\exception\DbException
     */
    public function getCommData()
    {
        /**
         * 查询所有数据
         */
        $commData = Db::table('itblog_comm')
            ->alias("comm")
            ->field("comm.*")
            ->where("comm_isshow = 1 or comm_isshow = 3")

            ->field("userinfo.user_name")
            ->join("itblog_userinfo userinfo","comm.comm_user_id = userinfo.user_id","LEFT")

            ->field("article.article_title")
            ->join("itblog_article article","comm.comm_article_id = article.article_id","LEFT")
            ->paginate(6);

        /**
         * 检查非法词汇 并和谐非法词汇
         */
        foreach ($commData as $k => $v){
            /**
             * 处理非法词汇
             * 响应数据包含
             *          非法词汇出现次数
             *          和谐后的文本
             */
            $sendMsg = $this->compSen($v);

            /**
             * 添加附加信息数组
             *      由于$data数据使用了paginate类 框架限制不允许添加数据
             */
            $addData[$k]['sen_nums'] = $sendMsg['totalSenNums'];
            $addData[$k]['comm_content_normal'] = $sendMsg['comm_content_normal'];
        }
        /**
         * 返回值注意防止附加数组不存在 ->
         *                                                  主数组为空时，不走循环，所以不存在附加数组
         */
        return [
            'data' => $commData,
            'addData' => isset($addData)&&!empty($addData)?$addData:[],
        ];
    }

    /**
     * @处理评论信息非法词汇
     * @返回必要数据
     * @param array $data
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    private function compSen($data = [])
    {
        /**
         * 查询所有非法词汇
         */
        $senData = Db::table('itblog_sensitive')
            ->field("sensitive_word")
            ->select();

        /**
         * 开始检测
         */
        $totalSenNums = 0; //非法评论总数
        foreach($senData as $k => $v){
            /**
             * 检查当前词汇是否在评论内容中
             */
            $senNums = substr_count($data['comm_content'],$v['sensitive_word']);

            /**
             * 非法词汇总量
             */
            $totalSenNums = $totalSenNums + $senNums;

            /**
             * 和谐非法词汇
             */
            for($i=1;$i<=$senNums;$i++){
                $data['comm_content'] = str_replace($v['sensitive_word'],"****",$data['comm_content']);
            }
        }
        return ['totalSenNums' => $totalSenNums,'comm_content_normal' => $data['comm_content']];
    }


    public function oneComm($comm_id = '')
    {
        $data = Db::table('itblog_comm')
            ->alias("comm")
            ->field("comm.*")
            ->where(['comm_id' => $comm_id])

            ->field("userinfo.user_name")
            ->join("itblog_userinfo userinfo","userinfo.user_id = comm.comm_user_id","LEFT")

            ->field("article.article_title")
            ->join("itblog_article article","comm.comm_article_id = article.article_id","LEFT")

            ->find();

        /**
         * 响应数据
         * 基本博文数据
         * 附加数据（违法字符数量 和谐后的博文）
         */
        $senMsgData = $this->oneCompSen($data);

        $data['totalSenNums'] = $senMsgData['totalSenNums'];
        $data['comm_content_normal'] = $senMsgData['comm_content'];

        return $data;
    }

    public function oneCompSen($data = [])
    {
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
            $senNums = substr_count($data['comm_content'],    $v['sensitive_word']);

            /**
             * 加入总次数（非法字符出现总次数）
             */
            $totalSenNums  = $totalSenNums + $senNums;

            /**
             * 和谐字符串
             */
            for($i=1;$i<=$senNums;$i++){
                $data['comm_content'] = str_replace($v['sensitive_word'],    "****",     $data['comm_content']);
            }
        }
        return ['totalSenNums' => $totalSenNums,'comm_content' => $data['comm_content']];
    }

}