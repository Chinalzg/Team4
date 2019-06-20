<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function getTree($data = [],$pid = 0)
{

    static $resultData = [];

    foreach ($data as $k => $v) {

        if($v['node_pid'] == $pid){
            $resultData[] = $v;
            getTree($data,$v['id']);
        }

    }

    return $resultData;
}

function getSon($data = [],$pid = 0)
{
    $result = [];

    foreach ($data as $k => $v){

        if($v['node_pid'] == $pid){
            $v['child'] = getSon($data,$v['id']);
            $result[] = $v;
        }

    }
    return $result;
}