<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/15
 * Time: 14:55
 */
namespace app\admin\controller;
use app\admin\model\Link as LinkModel;
use think\Request;
use think\View;


class Link extends Test{

    public function showLink(){
        $Model = new LinkModel();
        $data = $Model->getLinkData();
        $this->assign('data',$data);
        return View();
    }

    public function addLink(Request $Request){
        if($Request->isPost()){
            /**
             * 接收数据
             */
            $data = $Request->post();

            /**
             * 上传文件
             */
            $ad_img = $Request->file('link_img');
            $info	=	$ad_img->move(	'./static/admin/uploads/link/');
            if($info){
                $data['link_img'] = $info->getSaveName();
            }else{
                $errorMsg = $ad_img->getError();
                $this->error("$errorMsg");
            }

            $Model = new LinkModel();
            $res = $Model->addLink($data);
            if($res){
                $this->redirect("/admin/Link/showLink");
            }else{
                $this->error('添加失败');
            }
        }else{
            return View();
        }
    }

    public function updateIsshow(Request $Request){
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $data = $Request->post();

            $Model = new LinkModel();
            $res = $Model->updateIsshow($data);
            if($res){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '修改成功',
                ];
            }else{
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' =>'修改失败',
                ];
            }
            return json_encode($msg);
        }
    }


}