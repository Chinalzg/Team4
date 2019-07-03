<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/16
 * Time: 8:57
 */
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\View;
use app\admin\validate\itblog_admininfo;

class Admin extends Test{

    public function showAdmin(){
        $data = Db::table('itblog_admininfo')
            ->alias("admin")
            ->field("admin.*")
            ->field("IFNULL('未设置','admin.admin_name') as null_name")
            ->paginate(6);

        $this->assign('data',$data);
        return View();
    }

    public function checkAdmin(){
        $data = Db::table('itblog_admininfo')
            ->alias("admin")
            ->field("admin.*")
            ->field("IFNULL('未设置','admin.admin_name') as null_name")
            ->where("admin_status = 1")
            ->paginate(6);

        $this->assign('data',$data);
        return View();
    }

    public function overAdmin(Request $Request){
        if($Request->isAjax()){
            $data = $Request->post();

            if($data['admin_status'] == 1){
                $admin_status = 2;
            }else{
                $admin_status = 1;
            }

            $res = Db::table('itblog_admininfo')
                ->where(['admin_id' => $data['admin_id']])
                ->update(['admin_status' => $admin_status]);

            if($res){
                $msg = [
                    'errorCode' => 100,
                    'errorMsg' => '审核成功',
                ];
            }else{
                $msg = [
                    'errroCode' => 101,
                    'errorMsg' => '审核失败',
                ];
            }
            return json_encode($msg);
        }
    }

    public function reliAdmin(Request $Request){
        if($Request->isAjax()){
                $admin_id = $Request->post('admin_id');
                $admin_status = $Request->post('admin_status');

                if($admin_status == 3){
                    $admin_status = 2;
                }else{
                    $admin_status = 3;
                }

                $res = Db::table('itblog_admininfo')
                    ->where(['admin_id' => $admin_id])
                    ->update(['admin_status' => $admin_status]);

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

    /**
     * 封禁管理员账号
     * 查询出所有，通过状态码尽心分类查询
     */
    public function exceAdmin(Request $Request){
        /**
         * 接收数据
         */
        $data = $Request->get();
        $admin_status = $Request->get('admin_status',3);

        /**
         * 查询数据
         */
        $data = Db::table('itblog_admininfo')
            ->alias("admin")
            ->field("admin.*")
            ->field("IFNULL('未设置','admin.admin_name') as null_name")
            ->where(['admin_status' => $admin_status])
            ->paginate(6);

        $this->assign('admin_status',$admin_status);
        $this->assign('data',$data);
        return View();
    }

    public function addAdmin(Request $Request){
        if($Request->isPost()){
            /**
             * 接收数据
             * 构建数据
             */
            $data = $Request->post();
            $data['admin_status'] = 1;
            $data['admin_addtime'] = time();
            $data['admin_updatetime'] = time();

            /**
             * 验证器
             */
            $vali = new itblog_admininfo();

            if(!$vali->check($data)){
                $this->error($vali->getError());
            }

            $res = Db::table('itblog_admininfo')->insert($data,true);
            if($res){
                $this->redirect('/admin/Admin/showAdmin');
            }else{
                $this->error("添加失败");
            }
        }else{
            return View();
        }
    }

}