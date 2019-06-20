<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\Brand;

class BrandController extends Controller
{	
	//品牌添加
	public function brandAdd(Request $request)
	{
		if ($request->isMethod('post')) {

			$post = $request->input();

			$validatedData = $request->validate([
		        'name' => 'required|max:255',
		        'web' => 'required',
		        'desc' => 'required',
		        'order' => 'required',
		        'status' => 'required',
		    ]);

			$logo = $request->file('logo')->store('public');

			$logos = str_replace('public', '', $logo);

			$data = [
				'name' => $post['name'],
				'web' => $post['web'],
				'logo' => $logos,
				'desc' => $post['desc'],
				'order' => $post['order'],
				'status' => $post['status']
			];

			$res = Brand::insert($data);

			if ($res) {

				return view('admin::success')->with([
	   				//跳转信息
	                'message'=>'添加成功！',
	                //自己的跳转路径
	                'url' =>'/admin/brandshow',
	                //跳转路径名称
	                'urlname' =>'品牌列表',
	                //跳转等待时间（s）
	                'jumpTime'=>2,
            	]);
			} else {
				echo "添加失败";
			}
		}
		return view('admin::brandAdd');
	}


	//单删
	public function brandDel(Request $request)
    {
        $res=0;

        $id=$request->input('id');
        
        $brand = Brand::find($id);

        $result=$brand->delete();
     
        $result==true && $res=1;
        
        return  $res;
    }


    //批删
    public function brandDelall(Request $request)
    {
     	$res = 0;

        $id = $request->input('str');

        $str = explode(",", $id);

        foreach ($str as $v) {

        	$result = Brand::where('id', $v)->delete();
        }

        $result==true && $res=1;
        
        return  $res;
    }


    //编辑品牌
    public function brandUpdate(Request $request)
    {	
    	if ($request->isMethod('post')) {

			$post = $request->input();

			$logo = $request->file('logo')->store('public');

			$logos = str_replace('public', '', $logo);

			$data = [
				'name' => $post['name'],
				'web' => $post['web'],
				'logo' => $logos,
				'desc' => $post['desc'],
				'order' => $post['order']
			];

    		$datas = Brand::where('id', $post['id'])->get()->toArray();

			$res = Brand::where('id', $post['id'])->update($data, $datas);

			if ($res) {

				return view('admin::success')->with([
	   				//跳转信息
	                'message'=>'修改成功！',
	                //自己的跳转路径
	                'url' =>'/admin/brandshow',
	                //跳转路径名称
	                'urlname' =>'品牌列表',
	                //跳转等待时间（s）
	                'jumpTime'=>2,
            	]);
			} else {
				echo "修改失败";
			}
		}

    	$id = $request->input('id');

    	$data = Brand::where('id',$id)->get()->toArray();

    	return view('admin::brandUpdate', ['data'=>$data]);
    }


    //修改品牌状态
    public function brandUpdsta(Request $request)
    {
    	$res = 0;

        $id = $request->input('id');
        
        $status = $request->input('status');

        if ($status ==1) {

        	$result = Brand::where('id', $id)->update(['status'=>2]);

        	$result == true && $res = 2;

        }else if ($status == 2) {

			$result = Brand::where('id', $id)->update(['status'=>1]);

			$result == true && $res = 1;
        }

        return  $res;
    }


    //品牌列表
	public function brandShow(Request $request)
	{	
		$key_name = $request->input('key_name');

		$key_name = !empty($key_name) ? $key_name : '';

    	$data = Brand::where('name', 'like', "%$key_name%")
    				 ->orWhere('id', 'like', "$key_name")
    				 ->orWhere('status', 'like', "$key_name")
    				 ->paginate(5);

     	return view('admin::brandShow', ['data'=>$data]);
	}
}