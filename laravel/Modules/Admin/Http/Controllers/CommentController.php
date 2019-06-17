<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Admin\Model\Admin;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    //登录界面
    public function index()
    {
        return view('admin::login');
    }

    //电商首页
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

    public function review()
    {
   ;
        $admin = new Admin();

        $data = $admin -> review();

        return view('admin::review' , ['data'=> $data]);
    }

    public function reviewShow()
    {
        $id=$_GET['id'];


        $admin = new Admin();

        $data = $admin -> reviewShow($id);

         $image=$data['0']->cimage;

        $image = explode( ',', $image );

        return view('admin::reviewshow' , ['data' => $data , 'image' => $image]);
    }

    public function reviewupdate()
    {
        $id = $_GET['id'];

         $admin = new Admin();

         $data = $admin ->  reviewUpdate($id);

         if ($data)
         {
           return '已审核 ';
         }
    }

    public function commentReply()
    {
        $data=$_GET;

        $admin = new Admin();

        $data = $admin->commentReply($data);

        return redirect('admin/review');
    }

    public function commentDel()
    {
        $id=$_GET['id'];

        $admin = new Admin();

        $data = $admin->commentDel($id);

        if ($data)
        {
            echo '删除成功';
        }
    }

    public function service()
    {
        $admin = new Admin();

        $data = $admin ->service();

       return view('admin::service' , ['data' => $data]);

    }

    public function serviceShow()
    {
        $id=$_GET['id'];

        $admin = new Admin();

        $data = $admin ->serviceShow($id);

        return view('admin::serviceshow' , ['data' => $data]);

    }

    public function serviceInsert()
    {
        $data=$_GET;

        $admin = new Admin();

        $data = $admin -> serviceInsert($data);

        return redirect('admin/service');
    }

}
