<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
      protected $table = 'order';
      public $timestamps = false;

      public function getOrderList()
      {
      		$list = Order::get()->toArray();

      		foreach ($list as $key => $value) {
      			if($value['trade_status'] == 1){
      				$list[$key]['trade_status'] = '已完成';
      			}else if($value['trade_status'] == 2){
      				$list[$key]['trade_status'] = '已发货';
      			}else{
      				$list[$key]['trade_status'] = '待发货';
      			}
      		}

                  // foreach ($list as $key => $value) {
                  //       if($value['pay_method'] == 1){
                  //             $list[$key]['pay_method'] = '微信';
                  //       }else if($value['pay_method'] == 2){
                  //             $list[$key]['pay_method'] = '支付宝';
                  //       }else{
                  //             $list[$key]['pay_method'] = '在线';
                  //       }
                  // }
      		return $list;
      }

      public function getOrderDetail($id)
      {     
            // var_dump($id);exit;
            $list = Order::where('id', $id)->first()->toArray();

            switch ($list['pay_method']) {
                  case 1:
                        $list['pay_method'] = '微信';
                        break;

                  case 2:
                        $list['pay_method'] = '支付宝';
                        break;

                  default:
                        $list['pay_method'] = '在线';
                        # code...
                        break;
            }

            switch ($list['pay_status']) {
                  case 1:
                        $list['pay_status'] = '已支付';
                        break;

                  default:
                        $list['pay_status'] = '等待付款';
                        # code...
                        break;
            }

            return $list;
      }

      public function changeOrderStatus($id, $status)
      {
            $order = Order::find($id);

            if($status == '待发货')
            {
                  $order->trade_status = 1;

            }else{
                  $order->trade_status = 0;
            }

            $result = $order->save();

            return $result;
      }

      public function updateUserInfo($data)
      {
            return order::where('id', $data['id'])->update($data);
            
      }

     
}
