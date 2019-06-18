<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/31
 * Time: 16:36
 */
namespace app\admin\controller;

use think\Db;
use think\Request;
use think\View;

class Node extends Test
{

    public function showNode()
    {
        $nodeData = Db::name('node')
            ->alias('node')
            ->field("node.*")

            ->join("node b","node.node_pid = b.id","LEFT")
            ->field("b.node_name as parent_name")

            ->select();

        $nodeData = getTree($nodeData,0);

        $this->assign('nodeData',   $nodeData);
        return View();
    }

    public function addNode(Request $Request)
    {
        if($Request->isPost()){
            $data = $Request->post();
            $data['addtime'] = time();
            $res = Db::name('node')->insert($data);
            if($res){
                $this->redirect("/admin/Node/showNode");
            }else{
                $this->error('添加权限失败');
            }
        }else{
            //查询父级权限
            $parentNode = Db::name('node')
                ->where(['node_pid' => 0])
                ->select();

            $this->assign('parentNode',$parentNode);
            return View();
        }
    }


    public function allocNode(Request $Request)
    {
        if($Request->isPost()){

            $data = $Request->post();



        }else{
            //接收数据
            $data = $Request->get();

            //查询所有权限信息
            $nodeData = Db::name('node')->select();
            $nodeData = getSon($nodeData,0);

            //查询此角色已经拥有的权限
            $roleNode = Db::name('rolenode')
                ->where(['role_id' => $data['role_id']])
                ->field("node_id")
                ->select();

            //查询此角色信息
            $thisRole = Db::name('role')
                ->where(['id' => $data['role_id']])
                ->field("role_name")
                ->find();


            $this->assign('thisRole', $thisRole);
            $this->assign('role_id',$data['role_id']);
            $this->assign('nodeData',$nodeData);
            $this->assign('roleNode',$roleNode);

            return View();
        }

    }



}