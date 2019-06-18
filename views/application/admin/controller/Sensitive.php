<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/17
 * Time: 9:00
 */
namespace app\admin\controller;

use think\Db;
use think\View;

class Sensitive extends Test{

    public function showSen(){
        $data = Db::table('itblog_sensitive')->paginate(10);
        $this->assign('data',$data);
        return View();
    }



}