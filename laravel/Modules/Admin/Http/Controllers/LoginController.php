<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Model\Goods;
use App\Http\Requests\StoreGoodsPost;
use DB;
class LoginController extends Controller
{
    /**
     * Undocumented function
     *注册
     * @return void
     */
    public function login(Request $request)
    {
        // $data = $_GET;
        // // return $data;
        // if($request->isMethod('post')){
        //     // $data = DB::table('user')->where('name', '=', $data['name'])->select();
            
        //     return $data;
        // }else{

         return view("admin::login.login");

        // }
    }
    public function loginCheck()
    {
        return $_POST;
    }
    /**
     * Undocumented function
     * 注册
     * @return void
     */
    public function registered()
    {
        return view("admin::registered");
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
