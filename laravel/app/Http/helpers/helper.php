<?php
namespace App\Http\helpers;

class Helper{

    public static $code=[
        0=>'未知错误,请求失败!',
        1=>'请求成功',
        2=>'执行成功',
        3=>'执行失败',
        4=>'签名无效',
        5=>'签名已过期',
        6=>'账号密码为空',
        7=>'账号或密码错误',
        8=>'登陆成功',
        9=>'数据缺失',
        10=>'签名缺失',
        '1001'=>'填写 错误',
        '1002'=>'用户添加失败',
        '1003'=>'用户添加成功',
        '1004'=>'登陆成功',
        '1005'=>'密码不一致',
        '1006'=>'用户名或密码错误',
        '1007'=>'验证码错误',
        '1008'=>'未进行滑块验证',
        '2000'=>'',
    ];


    public static function Message($code,$data=array()){

        $arr=[
            'code' => $code,

            'msg' => self::$code[$code],

            'result' => $data
        ];

        header("content-type:text/html;charset=utf-8");

        echo  json_encode($arr,JSON_UNESCAPED_UNICODE);exit;
    }
}
?>