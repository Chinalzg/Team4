<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/15
 * Time: 10:50
 */
namespace app\admin\model;

use think\Db;
use think\Model;
use think\Request;

class Ad extends Model{

    public function getAd(){
        $data = Db::table('itblog_ad')->paginate(6);
        return $data;
    }

    public function addAd($data = []){
        /**
         * 构建数据
         */
        $data['ad_link'] = $data['ad_link_type'].$data['ad_link'];
        unset($data['ad_link_type']);
        $data['ad_addtime'] = time();

        $res = Db::table('itblog_ad')->insert($data);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function updateIsshow($data = []){
        $ad_isshow = $data['ad_isshow'];
        if($ad_isshow == 1){
            $ad_isshow = 2;
        }else{
            $ad_isshow = 1;
        }

        $res = Db::table('itblog_ad')
            ->where(['ad_id' => $data['ad_id']])
            ->update(['ad_isshow' => $ad_isshow]);
        if($res){
            return true;
        }else{
            return false;
        }
    }

}