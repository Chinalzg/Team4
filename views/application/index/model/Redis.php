<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/24
 * Time: 16:03
 */

namespace app\index\model;

class Redis extends \Redis
{

    public static function redis()
    {
        $redis = new \Redis();
        $redis->connect(config("cache.Redis.host"),config("cache.Redis.port"));
        return $redis;
    }

}