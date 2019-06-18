<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/30
 * Time: 17:08
 */
namespace app\api\controller;

use think\App;
use think\Db;

class Cate extends Basic
{

    public function __construct(App $app = null)
    {
        $msg = parent::__construct($app);
        if(!empty($msg)){
            return $msg;
        }
    }

    public function getCate()
    {
        if(!empty($this->__construct())){
            return json_encode($this->__construct(),JSON_UNESCAPED_UNICODE);
        }

        $cateData = Db::name('cate')->field("cate_id,cate_name")->select();

        return json_encode(
            [
                'errorCode' => 200,
                'errorMsg' => '查询分类信息成功',
                'errorCause' => [
                    'cateData' => $cateData,
                ],
            ],
            JSON_UNESCAPED_UNICODE
        );
    }


}