<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/15
 * Time: 15:05
 */
namespace app\admin\model;
use think\Db;
use think\Model;

class Link extends Model{

    public function getLinkData(){
        $data = Db::table('itblog_link')->paginate(6);
        return $data;
    }

    public function addLink($data = []){
        /**
         * 构建数据
         */
        $data['link_link'] = $data['link_link_type'].$data['link_link'];
        unset($data['link_link_type']);
        $data['link_addtime'] = time();

        $res = Db::table('itblog_link')->insert($data);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function updateIsshow($data = []){
        if($data['link_isshow'] == 1){
            $link_isshow = 2;
        }else{
            $link_isshow = 1;
        }

        $res= Db::table('itblog_link')
            ->where(['link_id' => $data['link_id']])
            ->update(['link_isshow' => $link_isshow]);
        if($res){
            return true;
        }else{
            return false;
        }
    }

}