<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
      protected $table = 'order_detail';
      public $timestamps = false;

      public function getOrderGoodsList()
      {
      		$list = OrderGoods::select(['goods_name', 'num', 'order_id'])->get()->toArray();

      		return $list;
      }
}
