<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/17
 * Time: 14:21
 */
namespace app\admin\controller;

use app\admin\model\Comm as CommModel;
use think\Db;
use think\Request;
use think\View;


class Comm extends Test
{

    /**
     * 评论审核列表
     * @return \think\response\View
     */
    public function showComm()
    {
        /**
         * 请求数据
         */
        $Model = new CommModel();
        $dataMsg = $Model->getCommData();

        /**
         * 构建数据
         */
        $data = $dataMsg['data'];
        $addData = $dataMsg['addData'];

        $this->assign('data',   $data);
        $this->assign('addData',    $addData);
        return View();
    }

    /**
     *
     */
    public function checkComm(Request $Request)
    {
        /**
         * 异步请求 -> 删除评论数据
         */
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $data = $Request->post("manyCommId");

            if(empty($data)){
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '通过失败',
                ];
                return json_encode($msg);
            }

            $res = Db::table('itblog_comm')
                ->where("comm_id",  "in",   "$data")
                ->update(['comm_isshow' => 2]);

            if($res){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '通过成功',
                ];
            }else{
                $msg = [
                    'errorCode' => 102,
                    'errorMsg' => '通过失败',
                ];
            }
            return json_encode($msg);
        }

        /**
         * 接收数据
         */
        $comm_id = $Request->get('comm_id');

        /**
         * 审核
         */
        $res = Db::table('itblog_comm')
            ->where(['comm_id' => $comm_id])
            ->update(['comm_isshow' => 2]);

        if($res){
            $this->redirect("/admin/Comm/showComm");
        }else{
            $this->error('审核失败');
        }
    }

    public function detailComm(Request $Request)
    {
        /**
         * 审核评论
         */
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $commStatus = $Request->post('commStatus');
            $comm_id = $Request->post("comm_id");
            if($commStatus == 'succ'){
                $commStatus = 2;
            }else{
                $commStatus = 3;
            }

            /**
             * 操作数据库
             */
            Db::startTrans();
            $res = Db::table('itblog_comm')
                ->where(['comm_id' => $comm_id])
                ->update(['comm_isshow' => 0]);

            if($res){
                $res = Db::table('itblog_comm')
                    ->where(['comm_id' => $comm_id])
                    ->update(['comm_isshow' => $commStatus]);
                if($res){
                    Db::commit();
                    $msg = [
                        'errorCode' => 100,
                        'errorMsg' => '审核成功',
                    ];
                    return json_encode($msg);
                }
                Db::rollback();
                $msg = [
                    'errorCode' => 102,
                    'errorMsg' => '审核失败',
                ];
                return json_encode($msg);
            }

            Db::rollback();
            $msg = [
                'errorCode' => 101,
                'errorMsg' => '审核失败',
            ];
            return json_encode($msg);

        }

        $Model = new CommModel();
        $data = $Model->oneComm($Request->get('comm_id'));

        $this->assign('data',$data);
        return View();
    }

    /**
     * @异步删除评论数据
     * @param Request $Request
     * @return false|string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteComm(Request $Request){
        if($Request->isAjax()){
            $data = $Request->post('manyCommId');

            if(empty($data)){
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '删除失败',
                ];
                return json_encode($msg);
            }

            $res = Db::table('itblog_comm')
                ->where("comm_id",  "in",   "$data")
                ->delete();

            if($res){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '删除成功',
                ];
            }else{
                $msg = [
                    'errorCode' => 102,
                    'errorMsg' => '删除失败',
                ];
            }
            return json_encode($msg);
        }
    }

}