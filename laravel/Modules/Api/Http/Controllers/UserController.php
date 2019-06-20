<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\User as U;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
	public function register(StoreUserPost $request)
	{
		$validated = $request->validated();
 		if($request->input('password') !== $request->input('surePassword'))
 		{
 			return response()->json(['code' => 409, 'message' => '两次密码不一致']);
 		}
 		// $image = $request->file('image');
 		$logo = $request->file('image');

		$logos= "/static/images/".$logo;
 		$data = $request->only(['name', 'password', 'email', 'tel', 'nickName', 'bir' ,'sex']);
 		$data['image'] = $logos;
		$result = U::insertUser($data);

		if(!$result){
			return response()->json(['code' => 408, 'message' => '注册失败']);
		}	
		$request->photo->store('user/images');
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
}