<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/10 0010
 * Time: 20:59
 */

namespace Modules\Admin\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Admin;
use Modules\Admin\Models\Power;
use Illuminate\Http\Request;
use App\Http\Middleware\MustPower;
use Illuminate\Support\Facades\Session;
class MenuController extends Controller
{
    //菜单添加页面
    public function menuAdd(){
        $obj=new Power();
        $power=$obj->getPower();
        $arr=$this->getTree($power);
        return view('admin::menuadd',['data'=>$arr]);
    }

    //添加功能
    public function menuAdds(Request $request){
        $data=$request->all();
        unset($data['_token']);
        $obj=new Power();
        $info=$obj->addPower($data);
        if($info){
            return redirect('admin/menu/menuShow');
        }
    }

    //菜单展示
    public function menuShow(){
        $power=new Power();
        $data=$power->power();
        return view('admin::menushow',['data'=>$data]);
    }

    //子菜单展示
    public function childPower(){
        $id=$_GET['id'];
        $power=new Power();
        $info=$power->powerShow($id);
        $res=$power->powerinfo($id);
        if(empty($res)){
            return json_encode(['code'=>201,'msg'=>'没有更多的子菜单了']);
        }else{
            return json_encode(['code'=>200,'msg'=>'成功','data'=>$res,'info'=>$info]);
        }
    }

    //菜单删除
    public function menuDel(){
        $id=$_GET['id'];
        $obj=new Power();
        $power=$obj->powerShow($id);
        $arr=$obj->powerinfo($power['id']);
        if($arr){
            return json_encode(['code'=>'202','msg'=>'该菜单下有子级菜单,不能删除!']);
        }else{
            DB::beginTransaction();
            try{
                $res=DB::table('r_p')->where('power_id',$power['id'])->delete();
                $arr=DB::table('power')->where('id',$power['id'])->delete();
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


    //菜单修改
    public function menuUpd(Request $request){
        $id=$request->get('id');
        $obj=new Power();
        $info=$obj->powerinfo($id);
        if($info){
            return redirect('admin/menu/menuShow')->with('不能修改父级菜单');
        }else{
            $data=$obj->powerShow($id);
            return view('admin::menuupd',['data'=>$data]);
        }
    }

    //修改实现
    public function menuUpdate(Request $request){
        $data=$request->all();
        unset($data['_token']);
        $obj=new Power();
        $info=$obj->updPower($data['id'],$data);
        if($info){
            return redirect('admin/menu/menuShow')->with('修改成功');
        }else{
            return redirect('admin/menu/menuShow')->with('修改失败');
        }

    }

    //递归
    public function getTree($array,$pid=0,$level=0){
        static $list=[];
        foreach ($array as $key =>$v){
            if($v['pid'] == $pid){
                $v['level']=$level;
                $list[]=$v;
                unset($array[$key]);
                $this->getTree($array,$v['id'],$level+1);
            }
        }
        return $list;
    }

}