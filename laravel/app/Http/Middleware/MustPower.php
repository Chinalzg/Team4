<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Models\Admin;
class MustPower
{

    public function handle($request, Closure $next)
    {
        $url=Route::current()->getActionName();
        
        $c=strtolower(substr($url,strrpos($url,'\\')+1));

        $controller=substr($c,0,strpos($c,'controller'));

        $action=substr($url,strpos($url,'@')+1);
        $admin=new Admin();
        $power=$admin->shows();
        $num = count($power);
        $i = 0;
        foreach ($power as $k=>$v){
            $controllers=$v->controller_name;
            $actions=$v->action_name;
            if($controller == $controllers && $action == $actions){
                break;
            }
            $i++;
        }
        if($i == $num)
        {
            echo 201;die;
        }
        return $next($request);
    }
}
