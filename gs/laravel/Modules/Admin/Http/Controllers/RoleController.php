<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/16 0016
 * Time: 19:33
 */

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Power;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Role;

class RoleController extends Controller
{
    //添加
     public function roleAdd(){
         $obj=new Power();
         $info=$obj->getPower();
         return view('admin::roleadd',['data'=>$info]);
     }
     public function roleAdds(Request $request){
         $data['role_name']=$request->post('role_name');
         //接收到的角色ID
         $power_id=$request->post('power_name');
         $admin=new Role();
         DB::beginTransaction();
         try{
             $res=$admin->addRole($data);
             if($res){
                 foreach ($power_id as $k=>$v){
                     DB::table('r_p')->insert(['role_id'=>$res,'power_id'=>$v]);
                 }
             }
             DB::commit();
             return redirect('admin/role/roleShow')->with('添加成功');
         }catch (\Exception $e){
             DB::rollBack();
             return redirect('admin/role/roleShow')->with('添加失败');
         }
     }
     //展示
    public function roleShow(){
         $obj=new Role();
         $info=$obj->showsRole();
         foreach ($info as $k=>$v){
             $info[$k]['power']=DB::select("select power_name from power WHERE id in(select power_id from r_p where role_id in ($v[id]))");
         }
         return view('admin::roleShow',['data'=>$info]);
    }
    //删除
    public function roleDel(){
        $id=$_GET['id'];
        DB::beginTransaction();
        try{
            $res=DB::table('r_p')->where('role_id',$id)->delete();
            $arr=DB::table('role')->where('id',$id)->delete();
            if($arr && $res){
                DB::commit();
                return json_encode(['code'=>200,'msg'=>'删除成功']);
            }
        }catch (\Exception $e){
            DB::rollBack();
            return json_encode(['code'=>203,'msg'=>'删除失败']);
        }
    }
    //修改
    public function roleUpd(){
        $id=$_GET['id'];
        $obj=new Role();
        $data=$obj->infoRole($id);
        $power=new Power();
        $info=$power->getPower();
        return view('admin::roleupd',['data'=>$data,'info'=>$info]);
    }
    public function roleUpdate(Request $request){
        $data['role_name']=$request->post('role_name');
        $data['id']=$request->post('id');
        $obj=new Role();
        $obj->updRole($data['id'],$data);

        DB::table('r_p')->where('role_id',$data['id'])->delete();

        //接收到的角色ID
        $data['power_name']=$request->post('power_name');
        foreach ($data['power_name'] as $key=>$v){
            $res=DB::table('r_p')->insert(['role_id'=>$data['id'],'power_id'=>$v]);
        }
        if($res){
            return redirect('admin/role/roleShow')->with('修改成功');
        }else{
            return redirect('admin/role/roleShow')->with('修改失败');
        }

    }

    //查看成员列表
    public function roleSon(){
        $id=$_GET['id'];
        $data=DB::select("select * from admin where id in(SELECT admin_id FROM u_r where role_id in($id))");
        foreach ($data as $k=>$v){
            $data[$k]=(array)$v;
        }
        return view('admin::roleson',['data'=>$data]);
    }

    public function sonDel(){
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
}