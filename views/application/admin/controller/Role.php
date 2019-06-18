<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/31
 * Time: 16:07
 */
namespace app\admin\controller;

use think\Db;
use think\Request;
use think\View;

class Role extends Test
{

    public function showRole()
    {
        $data = Db::name('role')->select();
        $this->assign('roleData',$data);
        return View();
    }

    public function addRole(Request $Request)
    {
        if($Request->isPost()){
            $role_name = $Request->post('role_name');
            $res = Db::name('role')->insert(['role_name' => $role_name,'addtime' => time()]);
            if($res){
                $this->redirect("/admin/Role/showRole");
            }else{
                $this->error("添加角色信息失败");
            }
        }else{
            return View();
        }

    }




}