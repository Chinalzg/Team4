<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\helpers\helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class IndexController extends Controller
{
    public function index()
    {
        return view('index/index');
    }


    public function addressShow()
  {

      return view('index/addressShow');
  }

  public function header()
  {
      return view('index/header');
  }

  public function addressUpdate()
  {
      $id = $_GET['id'];


      return view('index/addressUpdate',['id'=>$id]);
  }

    public function infomation()
    {



        return view('index/infomation' );
    }

    public function myCollection()
    {
        $id = $_GET['id'];


        return view('index/myCollection',['id'=>$id]);
    }

    public function order()
    {
        return view('index/order');
    }



    public function upload(Request $request )
    {


        if ($request->isMethod('post')) {

            $data = $_POST;
            $file = $request->file('picture');

            if (empty($file))
            {

                 $data = ['g_id'=>$data['goodsId'],
                          'user_id'=>$data['userId'],
                          'content'=>$data['content'],
                          'time' =>time(),
                 ];

                $data = DB::table('comment')->insert($data);die;

                return redirect('index/order');
            }else{


            $count = count($file);

            for ($i=0;$i<$count;$i++)
            {

            // 文件是否上传成功
            if ($file[$i]->isValid()) {

                // 获取文件相关信息
                $originalName = $file[$i]->getClientOriginalName(); // 文件原名
                $ext = $file[$i]->getClientOriginalExtension();     // 扩展名
                $realPath = $file[$i]->getRealPath();   //临时文件的绝对路径
                $type = $file[$i]->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename =$originalName;
                // 使用我们新建的uploads本地存储空间（目录）
                //这里的uploads是配置文件的名称
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

                $arr[]=$originalName;
            }

            }
                $image = implode(",", $arr);

                $data = ['g_id'=>$data['goodsId'],
                    'user_id'=>$data['userId'],
                    'content'=>$data['content'],
                    'image' => $image,
                    'time' =>time(),
                ];

                $data = DB::table('comment')->insert($data);die;

                return redirect('index/order');
            }
        }
    }

    public function comment()
    {
         $res = $_GET;

          return view('index/comment',['res' => $res]);
    }

    public function personal()
    {
        $id =$_GET['user_id'];
        return view('index/personal' ,['id'=>$id]);
    }

    public function collect ()
    {
        $id =$_GET['user_id'];

        return view('index/collect' ,['id'=>$id]);
    }

    public function recommend()
    {

        return view('index/recommend');
    }

    public function information ()
    {
        $id = $_GET['user_id'];

        return view('index/information' ,['id'=>$id]);
    }

    public function informationShow()
    {
        $data = $_GET;

        return view('index/informationShow' ,['data'=>$data]);
    }

    public function myMoney()
    {
        $id = $_GET['user_id'];

        return view('index/myMoney' ,['user_id'=>$id]);
    }
}