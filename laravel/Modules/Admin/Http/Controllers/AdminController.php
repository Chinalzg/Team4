<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Admin;
class AdminController extends Controller
{
    //登录界面
    public function index()
    {
        return view('admin::login');
    }

    //登录实现
    public function login(Request $request){

        $data=$request->all();
        $data['pwd'] = md5($data['pwd']);
        unset($data['_token']);
        $admin=new Admin();

        $arr=$admin->logins($data['name']);
        

        if($arr){
            if($arr[0]->pwd==$data['pwd']){
                Session::put('admin_id',$arr[0]->id);
                return json_encode(['code'=>200,'msg'=>'登录成功']);
            }else{
                return json_encode(['code'=>202,'msg'=>'密码错误']);
            }
        }else{
            return json_encode(['code'=>201,'msg'=>'用户名错误']);
        }
    }

    //取消登录
    public function logout(){
        Session::flush();
        return redirect('/admin/index');
    }

    //电商左边菜单
    public function select(){
        $id=Session::get('admin_id');
        if($id){
            $admin=new Admin();
            $data=$admin->shows();

            foreach ($data as $k=>$v){
                $data[$k]=(array)$v;
            }

            $res=$this->recursion($data);
            // echo "<pre>";
            // var_dump($res);die;
            return view('admin::index',['data'=>$res]);
        }else{
            return redirect('/admin/index');
        }
    }

    //电商首页 欢迎页
    public function welcome(){
        $id=Session::get('admin_id');
        $admin=new Admin();
        $role=$admin->roleinfo($id);
        foreach ($role as $k=>$v){
            $role[$k]=(array)$v;
        }
        foreach ($role  as $key => $val)
        {
            $arr[] = $val['role_name'];
        }
        if($id){
            $data=$admin->info($id);
            $data['role'] = $arr;
            return view('admin::welcome',['data'=>$data]);
        }else{
            return redirect('/admin/index');
        }

    }

    //递归
    public function recursion($data,$pid=0){
        $menu=[];
        foreach ($data as $v){
            $v['url']=$v['controller_name'].'/'.$v['action_name'];
            if($v['pid']==$pid){
                $v['child']=$this->recursion($data,$v['id']);
                $menu[]=$v;
            }
        }
        return $menu;
    }
}
