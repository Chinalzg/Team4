<?php

namespace App\Http\Middleware;

use Closure;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Parser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $key = '1608c';
        
        $tokens = $_SERVER['HTTP_AUTHORIZATION'] ?? $request->input('token','');
        $token = explode('.', $tokens);

        if(count($token)!=3){
            return response()->json(['code' => 403, 'message' => 'token不合法']);
        }
        
        $parse = (new Parser())->parse($tokens);
        $signer = new Sha256();
        $res = $parse->verify($signer,$key);// 验证成功返回true 失败false
        if(!$res){
            return response()->json(['code' => 404, 'message' => 'token不存在']);
        }
        $obj = $parse->getClaims()['exp'];
        $str = substr($obj, strpos('(', 10));
        if($str<time()){
            return response()->json(['code' => 405, 'message' => 'token已过期']);
        }
        
        return $next($request);
    }
}
