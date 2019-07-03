<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\User as U;
use Modules\Api\Models\Message;
use Modules\Api\Models\Goods;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Modules\Api\Models\Order;
use Modules\Api\Models\Collect;


class UserController extends Controller
{
	public function register(StoreUserPost $request)
	{
    
		$validated = $request->validated();
 		if($request->input('password') !== $request->input('surePassword'))
 		{
 			return response()->json(['code' => 409, 'message' => '两次密码不一致']);
 		}
<<<<<<< HEAD
 		
 		
 		$data = $request->only(['name', 'password', 'email']);
 		
=======
<<<<<<< HEAD
 		// $path = $request->image->store('user');
 		
 		$data = $request->only(['name', 'password', 'email']);
 		// $data['image'] = $path;
=======
 		
 		
 		$data = $request->only(['name', 'password', 'email']);
 		
>>>>>>> a
>>>>>>> 3ce4f1bb282214f046971d70a428723b86d5d83a
 		
		$result = U::insertUser($data);

		if(!$result){
			return response()->json(['code' => 408, 'message' => '注册失败']);
		}	
		
		$id = base64_encode($result);
			$message = "点此链接激活http://laravel.test/api/invite?id=$id";

			$to = $request->input('email');
			$subject = '乐购欢迎您！';
			Mail::send(
			    'api::email', 
			    ['content' => $message], 
			    function ($message) use($to, $subject) { 
			        $message->to($to)->subject($subject); 
			    }
			);
			
		return response()->json(['code' => 200, 'message' => '注册成功,请前往邮箱激活']);
	}

	public function invite(Request $request)
	{
		$id = $request->input('id');
		$id = base64_decode($id);
		$url = $_SERVER['HTTP_REFERER'];
		$result = Db::table('user')->where('id', $id)->update(['status' => 1]);
		if($result){
			return view('admin::success')->with([
	   				//跳转信息
	                'message'=>'激活成功！',
	                //自己的跳转路径
	                'url' =>$url,
	                //跳转路径名称
	                'urlname' =>'您的邮箱',
	                //跳转等待时间（s）
	                'jumpTime'=>3,
            	]);
		}
	}

	public function login(Request $request)
	{
		// return $_POST;
		if(!$request->filled(['name', 'password'])){
    		return response()->json(['code' => 403, 'message' => '用户名和密码不可为空']);
		}

		$result = U::getUser($request->only(['name', 'password']));

		if(!$result){
			return response()->json(['code' => 404, 'message' => '此用户不存在']);
		}
		
		$token = $this->getToken($result->id, $result->name);
<<<<<<< HEAD
    
=======
<<<<<<< HEAD

		// session::put();
		$request->session()->put('user_id',$result['id']);
		$request->session()->put('user_name',$result['name']);
		$request->session()->put('token',$token);
		// session::put('name',$result['name']);

=======
    
>>>>>>> a
>>>>>>> 3ce4f1bb282214f046971d70a428723b86d5d83a
		return response()->json(['code' => 200, 'message' => '登陆成功', 'data' => $token]);


	}

	public function getToken($id, $name)
	{
		$builder = new Builder();
		$signer = new Sha256();
		$key='1608c';
		// 设置发行人
		$builder->setIssuer('legoapi'); 
		// 设置接收人
		$builder->setAudience($name); 
		// 设置id
		$builder->setId('4f1g23a12aa'.$id, true); 
		// 设置生成token的时间
		$builder->setIssuedAt(time()); 
		// 设置在10秒内该token无法使用
		// $builder->setNotBefore(time() + 10); 
		// 设置过期时间
		$builder->setExpiration(time() + 3600); 
		// 给token设置一个id
		$builder->set('uid', $id); 
		// 对上面的信息使用sha256算法签名
		$builder->sign($signer, $key);
		// 获取生成的token
		return (string)$builder->getToken();
	}

	public function message(Request $request)
	{
		$id = $request->input('id','');
		if(!$id){
			return response()->json(['code' => 408, 'message' => '用户id不存在']);
		}

		$message = Message::getMessage($id);
		return response()->json(['code' => 200, 'message' => '请求成功', 'data' => $message]);
	}

	public function recommend(Request $request)
	{
			$size = $request->input('size', 10);
		 	$p = $request->input('p', 1);
		 	$data = Goods::getRecommend($size, $p);

		 	return response()->json(['code' => 200, 'message' => '请求成功', 'data' => $data]);
	}
	 //个人信息接口
      public function userShow()
      {
          $id = $_GET['id'];
          $data = DB::table('user')->where('id',$id)->first();
          if(! $id){
              return response()->json([
                  'msg' => '请输入ID',
                  'status' => '1001'
              ]);
          }else{
              return response()->json([
                  'status' => 200,
                  'msg' => '成功',
                  'data' => $data
              ]);
          }
      }

      //个人信息修改
      public function userUpd(Request $request)
      {
          //用户ID
          $user_id = $request->post('id');
          //接收修改的值
          $data = $request->all();
          $info = DB::table('user')
              ->where('id',$user_id)
              ->update($data);
          if($info == 1){
              return response()->json([
                  'status' => 200,
                  'msg' => '修改成功',
              ]);
          }else{
              return response()->json([
                  'status' => 1005,
                  'msg' => '修改失败',
              ]);
          }
      }

      //我的收藏接口
      public function userCollect()
      {
          //用户ID
          $user_id = $_GET['user_id'];
          $obj = new Collect();
          $info = $obj->colSlect($user_id);

          foreach ($info as $k => $v){
              $goods = new Goods();
              $info[$k]['goods'] = $goods->goodsInfo($v['goods_id']);
          }
          if($info){
              return response()->json([
                  'status' => 200,
                  'msg' => '成功',
                  'data' => $info
              ]);
          }else{
              return response()->json([
                  'status' => 4001,
                  'msg' => '失败',
              ]);

          }
      }

      //删除收藏接口
      public function userColdel()
      {
          //用户ID
          $user_id = $_GET['user_id'];
          //商品ID
          $goods_id = $_GET['goods_id'];

          $obj = new Collect();
          $info = $obj->colDel($user_id,$goods_id);
          if($info == 1){
              return response()->json([
                 'status' => 200,
                  'msg' => '删除成功'
              ]);
          }else{
              return response()->json([
                  'status' => '4001',
                  'msg' => '删除失败，请查看数据是否存在'
              ]);
          }

      }

      //我的订单接口  全部订单
      public function orderShowall()
      {
          //接收用户ID
          $userid = $_GET['id'];
          $obj = new Order();
          $info = $obj->orderAll($userid);
//          print_r($info);die;
          if($info){
              return response()->json([
                  'status' => 200,
                  'msg' => '成功',
                  'data' => $info
              ]);
          }else{
              return response()->json([
                  'status' => 200,
                  'msg' => '空空如也',
              ]);
          }

      }

      //我的订单接口  待支付订单
      public function orderUnpaid()
      {
          //接收用户ID
          $userid = $_GET['id'];
          $obj = new Order();
          $info = $obj->unpaid($userid);
          if($info){
              return response()->json([
                  'status' => 200,
                  'msg' => '成功',
                  'data' => $info
              ]);
          }else{
              return response()->json([
                  'status' => 200,
                  'msg' => '空空如也',
              ]);
          }
      }

      //我的订单接口  待收货订单
      public function orderUndone()
      {
          //接收用户ID
          $userid = $_GET['id'];
          $obj = new Order();
          $info = $obj->undone($userid);
          if($info){
              return response()->json([
                  'status' => 200,
                  'msg' => '成功',
                  'data' => $info
              ]);
          }else{
              return response()->json([
                  'status' => 200,
                  'msg' => '空空如也',
              ]);
          }
      }

      //我的订单接口  待评价订单
      public function orderComment(){
          //接收用户ID
          $userid = $_GET['id'];
          $info = DB::select("select * from `order` AS o LEFT JOIN order_detail AS od on o.id=od.order_id where is_comment = 2  AND o.buyer in($userid)");
          if($info){
              return response()->json([
                  'status' => 200,
                  'msg' => '成功',
                  'data' => $info
              ]);
          }else{
              return response()->json([
                  'status' => 200,
                  'msg' => '空空如也',
              ]);
          }
      }

      public function coupon(Request $request)
      {
          $id = $request->input('id', '');

          if(!$id){
              return response()->json(['code' => 406 ,'message' => '无效访问']);
          }

          
          $coupon = U::getCoupon($id);

          return response()->json(['code' => 200 ,'message' => '请求成功', 'data' => $coupon]);
      }

      public function integ(Request $request)
      {
          $id = $request->input('id', '');

          if(!$id){
              return response()->json(['code' => 406 ,'message' => '无效访问']);
          }

          
          $integ = U::getInteg($id);

          return response()->json(['code' => 200 ,'message' => '请求成功', 'data' => $integ]);
      }
}