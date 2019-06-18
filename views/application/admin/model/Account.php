<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/10
 * Time: 16:56
 */
namespace app\admin\model;

use think\Db;
use think\Model;

class Account extends Model{

    /**
     * 验证管理员账号重复
     */
    public function checkAdminRepeat($admin_phone = ''){
        $thisAdmin = Db::table('itblog_admininfo')
            ->field('admin_phone')
            ->where(['admin_phone' => $admin_phone])
            ->find();

        /**
         * 此电话号没注册
         */
        if(empty($thisAdmin)){
            //返回假
            return false;
        }else{
            return true;
        }
    }


}