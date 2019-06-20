<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/11
 * Time: 8:58
 */
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\controller\REST;

class Sendnote extends Controller{
    /**
     * @param string $to        接收短信人的手机号
     * @param array $datas   信息内容数组，两个参数。参数1：提示信息 参数2：过期时间
     * @param string $tempId 容联云模板id，当前测试环境只可使用1号模板
     * @return bool
     */
    public function sendNoteToAdmin($to = '',$datas = [],$tempId = ''){
        $accountSid = '8aaf0708679d082f0167aa5f29d60902';
        $accountToken = '3ca192b646464cd08ac3c4ea20c4c91f';
        $appId = '8aaf0708679d082f0167aa5f2a2c0908';
        $serverIP = 'sandboxapp.cloopen.com';
        $serverPort = "8883";
        $softVersion = "2013-12-26";

        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
//        echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
//            echo "result error!";die();
            return false;
        }
        if($result->statusCode!=0) {
//            echo "error code :" . $result->statusCode . "<br>";
//            echo "error msg :" . $result->statusMsg . "<br>";
            return false;
//            //TODO 添加错误处理逻辑
        }else{
//            echo "Sendind TemplateSMS success!<br/>";
//            // 获取返回信息
//            $smsmessage = $result->TemplateSMS;
//            echo "dateCreated:".$smsmessage->dateCreated."<br/>";
//            echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
//            //TODO 添加成功处理逻辑
            return true;
        }
    }




}