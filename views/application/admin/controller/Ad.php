<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/15
 * Time: 10:47
 */
namespace app\admin\controller;
use app\admin\model\Ad as AdModel;
use think\Request;
use think\View;


class Ad extends Test{
    /**
     * @展示广告
     * @return \think\response\View
     */
    public function showAd(){
        $Model = new AdModel();
        $data = $Model->getAd();
        $this->assign('data',$data);
        return View();
    }

    /**
     * @添加广告
     * @param Request $Request
     * @return \think\response\View
     */
    public function addAd(Request $Request){
        if($Request->post()){
            $data = $Request->post();
            /**
             * 上传文件
             */
            $ad_img = $Request->file('ad_img');
            $info	=	$ad_img->move(	'./static/admin/uploads/ad/');
            if($info){
                $data['ad_img'] = $info->getSaveName();
            }else{
                $errorMsg = $ad_img->getError();
                $this->error("$errorMsg");
            }

            /**
             * 模型
             */
            $Model = new AdModel();
            $res = $Model->addAd($data);
            if($res){
                $this->redirect('/admin/Ad/showAd');
            }else{
                $this->error('添加失败');
            }
        }else{
            return View();
        }
    }

    /**
     * @异步修改展示状态
     * @param Request $Request
     * @return false|string
     */
    public function updateIsshow(Request $Request){
        if($Request->isAjax()){
            /**
             * 接收数据
             */
            $data = $Request->post();

            $Model = new AdModel();
            $res = $Model->updateIsshow($data);
            if($res){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '修改成功',
                ];
            }else{
                $msg = [
                    'errorCode' => 101,
                    'errorMsg' => '修改失败',
                ];
            }
            return json_encode($msg);
        }
    }


}