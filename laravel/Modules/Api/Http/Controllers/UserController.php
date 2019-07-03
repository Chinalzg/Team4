<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\User as U;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class UserController extends Controller
{
	public function register(StoreUserPost $request)
	{
		$validated = $request->validated();
 		if($request->input('password') !== $request->input('surePassword'))
 		{
 			return response()->json(['code' => 409, 'message' => '两次密码不一致']);
 		}
 		// $path = $request->image->store('user');
 		
 		$data = $request->only(['name', 'password', 'email']);
 		// $data['image'] = $path;
 		
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

		// session::put();
		$request->session()->put('user_id',$result['id']);
		$request->session()->put('user_name',$result['name']);
		$request->session()->put('token',$token);
		// session::put('name',$result['name']);

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
}