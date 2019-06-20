<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/24
 * Time: 9:15
 */
namespace app\index\controller;


use think\App;
use think\Controller;
use think\Db;
use think\facade\Session;
use think\View;

class Link extends Controller
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);

        /**
         * 用户基本信息
         */
        global $thisUser;
        $thisUser = Session::get('thisUser');


        $this->assign('thisUser',   $thisUser);
    }


    /**
     * 友情链接展示
     */
    public function showLink()
    {
        $linkData = Db::table("itblog_link")->select();
        $this->assign('linkData',   $linkData);
        return View();
    }






}