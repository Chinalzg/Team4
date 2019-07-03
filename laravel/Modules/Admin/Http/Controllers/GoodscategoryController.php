<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\Goodscategory;

class GoodscategoryController extends Controller
{	
	//商品分类添加
	public function goodscategoryAdd(Request $request)
	{
		$goodscategory = new Goodscategory();

		if ($request->isMethod('post')) {

			$post = $request->input();

			$data = [
				'name' => $post['name'],
				'code' => $post['code'],
				'pid' => $post['pid'],
				'status' => $post['status']
			];

			$res = $goodscategory->insert($data);

			if ($res) {

				return view('admin::success')->with([
	   				//跳转信息
	                'message'=>'添加成功！',
	                //自己的跳转路径
	                'url' =>'/admin/goodscategoryshow',
	                //跳转路径名称
	                'urlname' =>'商品分类列表',
	                //跳转等待时间（s）
	                'jumpTime'=>2,
            	]);
			} else {
				echo "添加失败";
			}
		}

		$data = $goodscategory->get();

		$datas = getChild($data);

		return view('admin::goodscategoryadd', ['data'=>$datas]);
	}


	//商品分类列表
	public function goodscategoryShow(Request $request)
	{
		$goodscategory = new Goodscategory();

		$res = $goodscategory->get()->toArray();

		$data = getTree($res);

     	return view('admin::goodscategoryShow', ['data'=>$data]);
	}


	//单删
	public function goodscategoryDel(Request $request)
    {
        $res=0;

        $id=$request->input('id');
        
        $goodscategory = Goodscategory::find($id);

        $datas = $goodscategory->toArray();

        $data = Goodscategory::where('pid',$datas['id'])->get()->toArray();
        
        if(empty($data)){

        	$result=$goodscategory->delete();
     
        	$result==true && $res=1;
        }
        
        return  $res;
    }


    //编辑品牌
    public function goodscategoryUpdate(Request $request)
    {	
    	$goodscategory = new Goodscategory();

    	if ($request->isMethod('post')) {

			$post = $request->input();

			$data = [
				'name' => $post['name'],
				'code' => $post['code'],
				'pid' => $post['pid']
			];

    		$datas = Goodscategory::where('id', $post['id'])->get()->toArray();

			$res = Goodscategory::where('id', $post['id'])->update($data, $datas);

			if ($res) {

				return view('admin::success')->with([
	   				//跳转信息
	                'message'=>'修改成功！',
	                //自己的跳转路径
	                'url' =>'/admin/goodscategoryshow',
	                //跳转路径名称
	                'urlname' =>'商品分类列表',
	                //跳转等待时间（s）
	                'jumpTime'=>2,
            	]);
			} else {
				echo "修改失败";
			}
		}

    	$id = $request->input('id');

    	$data = Goodscategory::where('id',$id)->first();

    	$datas = $goodscategory->get();

		$res = getChild($datas);

    	return view('admin::goodscategoryupdate', ['data'=>$data, 'res'=>$res]);
    }


    //修改品牌状态
    public function goodscategoryUpdsta(Request $request)
    {
    	$res = 0;

        $id = $request->input('id');
        
        $status = $request->input('status');

        if ($status ==1) {

        	$result = Goodscategory::where('id', $id)->update(['status'=>2]);

        	$result == true && $res = 2;

        }else if ($status == 2) {

			$result = Goodscategory::where('id', $id)->update(['status'=>1]);

			$result == true && $res = 1;
        }

        return  $res;
    }


}