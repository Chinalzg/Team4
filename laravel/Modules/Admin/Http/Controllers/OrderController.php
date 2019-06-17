<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Order as Ors;
use Modules\Admin\Models\OrderGoods;
use Modules\Admin\Models\OrderStatus;

class OrderController extends Controller
{

	public function list()
	{
		$order = new Ors;
		$orderList = $order->getOrderList(); //订单信息
		$orderGoods = new orderGoods();
		$orderGoodsList = $orderGoods->getOrderGoodsList();

		foreach ($orderGoodsList as $key => $value) {
			if($value['order_id'] == $orderList[$key]['id'])
			{
				$orderList[$key]['goods_name'] = $value['goods_name'];
				$orderList[$key]['num'] = $value['num'];

			}
		}

		return view('admin::order.order',['data' => $orderList]);
	}

	public function orderDetail(Request $request)
	{
		$id = $request->input('id');
		$order = new Ors;
		$orderList = $order->getOrderDetail($id); //订单信息
		return view('admin::order.orderDetail', ['order' => $orderList]);
	}

	public function orderChange(Request $request)
	{
		$id = $request->input('id');
		$status = $request->input('status');
		$order = new Ors;
		$result = $order->changeOrderStatus($id, $status);
		if($result)
		{
			$data = ['code' => 1 ,'msg' => 'success'];
		}else{
			$data = ['code' => 0 ,'msg' => 'error'];
		}

		return response()->json($data);
	}

	public function updateUserInfo(Request $request)
	{	
		$validatedData = $request->validate([
        'consignee' => 'required|between:2,10',
        'mobile' => 'required',
        'zipcode' => 'required',
        'address' => 'required'
    	]);
    	
    	$data = $request->input();

    	$order = new Ors;

    	$result = $order->updateUserInfo($data);
    	if($result)
		{
			$data = ['code' => 1 ,'msg' => 'success'];
		}else{
			$data = ['code' => 0 ,'msg' => 'error'];
		}

		return response()->json($data);
	}

	 public function orderStatusInsert(Request $request)
      {
            if($request->isMethod('post'))	
            {	
            	$validatedData = $request->validate([
			        'order_status' => 'required|regex:/\p{Han}/u|between:3,6|unique:order_Status',
			        
			    ]);

            	$orderStatus = new OrderStatus();
            	$result = $orderStatus->insertOrderStatus($request->input());

            	if($result){
            		return redirect('admin/order/orderStatusList');
            	}
	         }else{
	            	return view("admin::order.orderStatusInsert");
	            }
           
      	
      }

      public function orderStatusList(Request $request)
      {	

      	$list = OrderStatus::getOrderStatusList();
      	return view('admin::order.orderStatusList', ['list'=>$list]);
      }

      public function orderStatusDelete(Request $request)
      {
      		$result = OrderStatus::orderStatusDelete($request->input('id'));
      		if($result)
			{
				$data = ['code' => 1 ,'msg' => 'success'];
			}else{
				$data = ['code' => 0 ,'msg' => 'error'];
			}

			return response()->json($data);
      }

      public function orderStatusUpdate(Request $request)
      {
      		$id = $request->input('id');
      		if($request->isMethod('post')){
      			$validatedData = $request->validate([
			        'order_status' => 'required|regex:/\p{Han}/u|between:3,6|unique:order_Status',
			        
			    ]);

			    $result = OrderStatus::orderStatusUpdate($request->input());
			    if($result){
			    	return redirect('admin/order/orderStatusList');
			    }
      		}
      		$orderOneData = OrderStatus::getOrderStatusOne($id);

      		return view('admin::order.orderStatusUpdate',['order' => $orderOneData]);
      }
}