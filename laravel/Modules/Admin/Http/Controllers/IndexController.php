<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Model\Goods;
use App\Http\Requests\StoreGoodsPost;
use DB;
use session;
class IndexController extends Controller
{

    public function index()
    {
        return view("admin::index.index");
    }
    public function list()
    {
        $list = DB::table('category')->get();

        return \json_encode(['code'=>200, 'msg'=>'请求成功', 'data'=>$list]);
    }

    public function goods()
    {
        $list = DB::table('goods')->limit(4)->get();

        return \json_encode(['code'=>200, 'msg'=>'请求成功', 'data'=>$list]);
    }
    public function categoryList()
    {
        $list = DB::table('goods_category')->where('pid','=',0)->get();
        // var_dump($list);die;
        return \json_encode(['code'=>200, 'msg'=>'请求成功', 'data'=>$list]);
    }
    
    

    public function categoryShow()
    {
        $list = Goods::showCity();
        // echo "<pre>";
        // var_dump($list);die;
        return \json_encode(['code'=>200, 'msg'=>'请求成功', 'data'=>$list]);
    }

    public function productDetailed(Request $request)
    {
        $id = $request->input('id');

        $list = DB::table('category')->get();
        $data = DB::table('goods')->where('id',$id)->get();
        
        return view("admin::index.productDetailed", ['list'=>$list, 'data'=>$data]);
    }
    public function productList(Request $request)
    {
        $id = $request->input('id');

        $result = DB::table('goods')->where('category_id',$id)->get();

        return view("admin::index.productList", ['data'=>$result]);
    }


    /**
     * 电商首页
     */

    public function select(){

        $data=request::all();

        print_r($data);

    }

   

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
