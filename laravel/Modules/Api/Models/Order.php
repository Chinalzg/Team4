<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/21 0021
 * Time: 14:15
 */

namespace Modules\Api\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table='order';
   public $timestamps = false;

   //全部订单
    public function orderAll($id)
    {
        return Order::where('buyer',$id)->get()->toArray();
    }

    //未支付的订单
    public function unpaid($id)
    {
        return Order::where('buyer',$id)
            ->where('pay_status',0)
            ->get()->toArray();
    }

    //未收货的订单
    public function undone($id)
    {
        return Order::where('buyer',$id)
            ->where('trade_status','!=',1)
            ->get()->toArray();
    }


}