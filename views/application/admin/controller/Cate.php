<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/13
 * Time: 16:06
 */
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;
use think\Db;
use think\Request;
use think\View;

class Cate extends Test{

    public function showCate(Request $Request){
        /**
         * 接受参数
         */
        $Model = new CateModel();
        $data = $Model::where('1=1')->select();

        $this->assign('data',$data);
        return View();
    }

    public function addCate(Request $Request){
        if($Request->isPost()){
            /**
             * 接收参数
             */
            $data = $Request->post();
            $data['cate_addtime'] = time();

            $Model = new CateModel();
            $res = $Model->insert($data);
            if($res){
                $this->redirect('/admin/Cate/showCate');
            }else{
                $this->error('添加失败');
            }
        }else{
            return View();
        }
    }

}