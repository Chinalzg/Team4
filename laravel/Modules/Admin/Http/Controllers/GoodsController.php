<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Model\Goods;
use App\Http\Requests\StoreGoodsPost;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {   
        
        return view('index');
    }

    /**
     * 商品管理
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function goods()
    {
        $model = new Goods();

        $list = $model->category();

        $data = $model->brand();

        $res = $model->goods();

        $supplier = $model->supplier();

        $warehouse = $model->warehouse();

        return view('admin::goods', ['list'=>$list, 'data'=>$data, 'res'=>$res, 'supplier'=>$supplier,'warehouse'=>$warehouse]);
        
    }

    /**
     * 添加商品
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addProduct()
    {   

        $model = new Goods();

        $list = $model->goods();

        $data = $model->brand();

        $res = $model->supplier();

        $result = $model->warehouse();

        return view('admin::addProduct', ['list'=>$list,'data'=>$data,'res'=>$res,'result'=>$result]);
    }

    /**
     * 添加商品处理页面
     */
    public function addProductCheck(StoreGoodsPost $request)
    {
        

        $validated = $request->validated();

        $file = $request->file('img');

        $path = $request->img->path();

        $extension = $request->img->extension();

        $path = $request->img->store('');
        
        $path = "/static/images/".$path;

        $data = $_POST;

        $model = new Goods();

        $result = $model->addProduct($data,$path);

        if($result){

            echo "<script>alert('商品添加成功');location.href='goods';</script>";

        }else{

            echo "<script>alert('商品添加失败')</script>";

        }

    }
    /**
     * 生成SKU
     */
    public function createSku()
    {
        $model = new Goods;

        $res = $model->good();

        $data = $model->category();

        $list = $model->attributeKey();

        $value = $model->attributeval();
        
        return view('admin::createSku', ['data'=>$data,'list'=>$list,'value'=>$value,'res'=>$res]);
        
    }
    /**
     * Undocumented function
     *生成SKU处理
     * @param Request $request
     * @return void
     */
    public function createSkuCheck()
    {
        $data = $_POST;
       
        $model = new Goods;

        $result = $model->createSkuCheck($data);

        if($result){

            echo "<script>alert('生成SKU成功');location.href='goods';</script>";

        }else{

            echo "<script>alert('生成失败')</script>";

        }
    }
    /**
     * 商品删除
     *
     * @return void
     */
    public function goodsDelete()
    {
        $id = $_GET['id'];
        
        $model = new Goods();

        $result = $model->goodsDelete($id);

        if($result){
            return 1;
        }else{
            return 0;
        }

    }
    /**
     * Undocumented function
     *商品修改页面
     * @return void
     */
    public function goodsUpdate()
    {
        $id = $_GET['id'];

        $model = new Goods();

        $result = $model->goodsUpdate($id);

        // echo "<pre>";
        // var_dump($result);die;

        $list = $model->category();

        $data = $model->brand();

        $res = $model->supplier();

        $resu = $model->warehouse();

        return view('admin::goodsUpdate', ['list'=>$list,'data'=>$data,'res'=>$res,'result'=>$result,'resu'=>$resu]);

    }
    /**
     * Undocumented function
     *商品修改检测
     * @param Request $request
     * @return void
     */
    public function goodsUpdateCheck(Request $request)
    {

        $file = $request->file('img');

        $path = $request->img->path();

        $extension = $request->img->extension();

        $path = $request->img->store('');

        $path = "/static/images/".$path;

        $data = $_POST;

        $id = $data['id'];
        
        $model = new Goods();

        $result = $model->goodsUpdateCheck($data,$id,$path);

        if($result){

            echo "<script>alert('商品修改成功');location.href='goods';</script>";

        }else{

            echo "<script>alert('商品修改失败')</script>";

        }
        
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
