<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
      protected $table = 'order_status';
      public $timestamps = false;
      public $fillable = ['order_status'];

      public function insertOrderStatus($data)
      {
      		return OrderStatus::create(['order_status' => $data['order_status']]);
      }
      
      public static function getOrderStatusList()
      {
      		return OrderStatus::get()->toArray();
      }

      public static function orderStatusDelete($id)
      {
      		return OrderStatus::destroy($id);
      }

      public static function getOrderStatusOne($id)
      {
                  return OrderStatus::find($id)->toArray();
      }

      public static function orderStatusUpdate($data)
      {     
            echo $data['id'];exit;
                  $orderStatus = OrderStatus::find($data['id']);
                  $orderStatus->order_status = $data['order_status'];
                  return $order_status->save();
      }
}
