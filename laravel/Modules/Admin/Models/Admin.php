<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admin extends Model
{
    protected $table='admin';
    public $timestamps = false;

    //通过查询用户名判断用户是否正确登录
     public function logins($name){
        
         return Admin::where('admin_name', $name)->get();
     }

     //通过登录人的ID获取登录人的权限
     public function shows(){
         return $data=DB::select("SELECT * from power where id in(SELECT power_id from r_p where role_id in(select id from role where id in(select role_id from u_r where admin_id IN ('".Session::get('admin_id')."') and status = 1)))");
     }


     //通过登录人的ID获取个人信息
     public function info($id){
         return Admin::where('id',$id)->first()->toArray();
     }


     //通过登录人ID获取其角色名
     public function roleinfo($id){
         return DB::select("select role_name from role where id in(SELECT role_id from u_r where admin_id in ($id))");
     }


    //通过登录人ID获取其角色全部信息
    public function roleinfos($id){
        return DB::select("select * from role where id in(SELECT role_id from u_r where admin_id in ($id))");
    }

    //管理员添加
    public function addAdmin($data){
        return Admin::insertGetId($data);
    }

    //管理员展示
    public function adminShow(){
        return Admin::all()->toArray();
    }

    //管理员修改
    public function updAdmin($id,$data){
        return Admin::where('id',$id)->update($data);
    }

    //判断用户是否存在
    public function name($name){

         return Admin::where('admin_name',$name)->first();
    }



}