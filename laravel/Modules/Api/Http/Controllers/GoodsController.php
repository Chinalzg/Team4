<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\Goods;
use Modules\Api\Models\Cart;
use Modules\Api\Models\Collect;

class GoodsController extends Controller
{
	public function goods(Request $request)
	{
		$id = $request->input('id','');
		if(!$id){
			return response()->json(['code' => 403, 'message' => '请输入商品id']);
		}
		return response()->json(['code' => 200, 'message' => '请求成功', 'data'=> Goods::getOneGoods($id)]);

	}


 public function colSlect($id)
    {
         return Collect::where('user_id',$id)
             ->get()
             ->toArray();
    }

    public function colDel($id,$goods_id){
        return Collect::where('user_id',$id)
            ->where('goods_id',$goods_id)
            ->delete();
    }


//购物车
    public function cartShow()
   {
       $page = $_GET['page'] ?? 1;
       $size = 5;
       $count = DB::table('cart')
           ->count();
           
       if($page > ceil($count/$size)){
           return response()->json([
               'status' => 203 ,
               'msg' => '页码数有误，请重新输入'
           ]);
       }
       $limit = ($page-1)*$size;

       //获取用户ID
       $userid = $_GET['id'];
       $obj = new Cart();

       $info = $obj->cartSelect($userid,$limit,$size);

       $goods = new Goods();
       foreach ($info as $k => $v){
          $info[$k]['goodsinfo'] = $goods->goodsInfo($v['goods_id']);
       }
       if ( empty($info) ) {
           return response()->json([
               'status' => 201,
               'msg' => '空空如也'
           ]);
       }else{
          
          return response()->json([
               'status' => '200',
               'msg' => '成功',
               'data' => $info,
               'count'=> ceil($count/$size)
               
           ]);
          
       }
   }


    //购物车删除商品
    public function cartDel()
    {
       //接收购物车商品 的ID
        $id = $_GET['id'];
        $obj = new Cart();
        $info = $obj->cartDelete($id);
        if($info){
            return response()->json([
                'status' => '200',
                'msg' => '删除成功',
            ]);
        }else{
            return response()->json([
                'status' => '201',
                'msg' => '删除失败',
            ]);
        }
    }

    //购物车修改商品数量
    public function cartUpd()
    {
        //接收购物车商品 的ID
        $id = $_POST['id'];
        $type = $_POST['type'] ?? '';
        if($type){
            $data=DB::table('cart')->where('id', $id)->increment('goods_num');
        }else{
            $data=DB::table('cart')->where('id', $id)->decrement('goods_num');
        }

        if($data){
            return response()->json([
                'status' => '200',
                'msg' => '修改成功',
            ]);
        }else{
            return response()->json([
                'status' => '456',
                'msg' => '修改失败',
            ]);
        }
    }

}