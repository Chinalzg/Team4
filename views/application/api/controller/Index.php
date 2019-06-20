<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/27
 * Time: 9:07
 */
namespace app\api\controller;

use think\Request;

class Index
{

    public function index(Request $Request)
    {
        if($Request->isGet()){
            echo "Welcome to Itblog.io APi";
        }
    }



}