<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/15 0015
 * Time: 15:33
 */

namespace Modules\Admin\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Admin\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Modules\Admin\Models\Role;

class UserController extends Controller
{

    //管理员添加页面
    public function userAdd(){
        $obj=new Role();
        $data=$obj->showsRole();
        return view('admin::useradd',['data'=>$data]);
    }

    //实现添加同时赋角色
    public function userAdds(Request $request){
        $data['admin_name']=$request->post('admin_name');
        $data['pwd']=$request->post('pwd');

        $time=time();
        $data['create']=date("Y-m-d",$time);

        //接收到的角色ID
        $role_id=$request->post('role_name');
        $admin=new Admin();

        DB::beginTransaction();
        try{
            $res=$admin->addAdmin($data);
            if($res){
                foreach ($role_id as $k=>$v){
                    DB::table('u_r')->insert(['admin_id'=>$res,'role_id'=>$v]);
                }
            }
            DB::commit();
            return redirect('admin/user/userShow')->with('添加成功');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect('admin/user/userShow')->with('添加失败');
        }
    }

    //管理员展示
     public function userShow(){
         $obj=new Admin();
         $data=$obj->adminShow();
         return view('admin::usershow',['data'=>$data]);
     }

     //管理员删除
    public function userDel(){
        $id=$_GET['id'];
        DB::beginTransaction();
        try{
            $res=DB::table('u_r')->where('admin_id',$id)->delete();
            $arr=DB::table('admin')->where('id',$id)->delete();
            if($arr && $res){
                DB::commit();
                return json_encode(['code'=>200,'msg'=>'删除成功']);
            }
        }catch (\Exception $e){
            DB::rollBack();
            return json_encode(['code'=>203,'msg'=>'删除失败']);
        }
    }

    //管理员修改
    public function userUpd(){
        $id=$_GET['id'];
        $arr=new Role();
        $info=$arr->showsRole();
        $obj=new Admin();
        $data=$obj->info($id);
        return view('admin::userupd',['data'=>$data,'info'=>$info]);
    }

    //修改实现
    public function userUpdate(Request $request){

        $data['admin_name']=$request->post('admin_name');
        $data['id']=$request->post('id');
        $obj=new Admin();
        $obj->updAdmin($data['id'],$data);

        DB::table('u_r')->where('admin_id',$data['id'])->delete();

        //接收到的角色ID
        $data['role_name']=$request->post('role_name');
        
        foreach ($data['role_name'] as $key=>$v){
            $res=DB::table('u_r')->insert(['admin_id'=>$data['id'],'role_id'=>$v]);
        }
        if($res){
            return redirect('admin/role/roleShow')->with('修改成功');
        }else{
            return redirect('admin/role/roleShow')->with('修改失败');
        }


    }
}