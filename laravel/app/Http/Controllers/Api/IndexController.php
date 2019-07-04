<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\helpers\helper;
class IndexController extends Controller
{
    public function index()
    {

        $data = DB::table('user')->get();

        $data = [

            'data' => $data,

        ];
        Helper::Message('1' , $data);
    }

    public function personalShow()
    {

     $user_id='1';

    $data = DB::table('user')
           ->where('user.id','1')
           ->join('address', 'user.id', '=', 'address.user_id')
           ->select('user.*', 'address.id as a_id','address.*')
           ->get();
   var_dump($data);die;
        $data = [

            'data' => $data,
            'user_id'=>$user_id,
        ];
        Helper::Message('1' , $data);

    }

    public function addressCreate()
    {
        $data = $_GET;

        $res = [
            'name' => $data['name'] ,
            'address' => $data['address'] ,
            'email' => $data['email'] ,
            'tel' => $data['tel'] ,
            'phone' => $data['phone'] ,
            'postal' => $data['postal'] ,
            'sex' => $data['sex'] ,
            'user_id' => $data['id'],
            'create_time' => time(),
        ];


        $result = DB::table('address')->where('user_id' , $data['id'])->get();

        $count = count($result);


       if ($count >= 5){

           helper::Message('3');
       }else{
           $data = DB::table('address')->insert($res);

           if ($data)
           {
               Helper::Message('1');
           }else{
               helper::Message('3');
           }
       }

    }

    public function  addressFind()
    {

        $id = $_GET['id'];

        $data = DB::table('address') ->where('id',$id)->first();
        Helper::Message('1',$data);


    }

    public function addressUpdate()
    {
        $data = $_GET;

        $data = DB::table('address')
                ->where('id' , $data['id'])
               ->update(['name' => $data['name'] , 'address' => $data['address'] ,'sex' => $data['sex'] ,'tel' => $data['tel'] ,'phone' => $data['phone'] ,'postal' => $data['postal'] ]);
        if ($data)
        {
            Helper::Message('1');
        }else{
            helper::Message('3');
        }
    }

    public function order()
    {
     $id = $_GET['id'];

     $data = DB::table('user')

         ->where('user.id', $id)

         ->leftJoin('order', 'user.id', '=', 'order.buyer')

         ->leftJoin('order_detail', 'order.id', '=', 'order_detail.order_id')

         ->select( 'order.*','order_detail.*')

         ->get();

        Helper::Message('1',$data);
    }

    public function unpaid()
    {
        $id = $_GET['id'];

        $data = DB::table('users')

            ->where('users.id', $id)

            ->leftJoin('order', 'users.id', '=', 'order.buyer')

            ->where('order.pay_status','0')

            ->leftJoin('order_detail', 'order.id', '=', 'order_detail.order_id')

            ->select( 'order.*','order_detail.*')

            ->get();
        Helper::Message('1',$data);
    }

    public function unreceived()
    {
        $id = $_GET['id'];

        $data = DB::table('users')

            ->where('users.id', $id)

            ->leftJoin('order', 'users.id', '=', 'order.buyer')

            ->where('order.trade_status','2')

            ->leftJoin('order_detail', 'order.id', '=', 'order_detail.order_id')

            ->select( 'order.*','order_detail.*')

            ->get();
        Helper::Message('1',$data);
    }

    public function noComment()
    {
        $id = $_GET['id'];


        $data = DB::table('order')

            ->where('order.buyer', $id)

            ->Join('order_detail', 'order.id', '=', 'order_detail.order_id')

            ->where('order_detail.is_comment','0')

            ->where('trade_status' , '1')

            ->select( 'order.*','order_detail.*')

            ->get();


        Helper::Message('1',$data);
    }



    public function personal()
    {
        $id = $_GET['id'];

        $data = DB::table('user')

                ->where('user.id' , $id)

               ->first();
        Helper::Message('1',$data);
    }

    public function personalUpdate()
    {
        $data = $_GET;

        $res = DB::table('user')
               ->where('id',$data['id'])
               ->update(['email'=>$data['email'],
                   'name'=>$data['name'],
                   'nickName'=>$data['nickName'],
                   'password'=>$data['password'],
                    'sex'=>$data['sex'],
                    'bir'=>$data['bir'],
                         ]);

        if ($res)
        {
            Helper::Message('1');
        }

    }

    public function collect()
    {
        $id =$_GET['id'];

        $data = DB::table('collect')
                ->where('user_id',$id)
                ->join('goods','collect.goods_id','=','goods.id')
                ->select('collect.id as cid','collect.*' ,'goods.*')
                ->get();
        Helper::Message('1',$data);
    }

    public function collectDelete()
    {
        $id = $_GET['id'];

        $data = DB::table('collect')
                ->where('id',$id)
               ->delete();

        if ($data){
            Helper::Message('1');
        }

    }

    public function recommend()
    {
        $data = DB::table('goods')

                ->where('is_hot','1')

                ->get();
        Helper::Message('1',$data);
    }

    public function information ()
    {
      $id = $_GET['id'];
        $data = DB::table('feedback')
        ->where('users_id',$id)
        ->join('admin','feedback.admin_id', '=', 'admin.id')
        ->select('admin_id', 'users_id', 'content', 'status',  'admin.shopname')
        ->groupBy('admin_id')
        ->orderBy('time','DESC')
        ->get();


        Helper::Message('1',$data);
    }

    public function addressDelete()
    {
      $id = $_GET['id'];

      $data = DB::table('address')

              -> where('id' , $id)

              ->delete();

       if ($data) {
           Helper::Message('2');
              }else{
          Helper::Message('3');
              }      
    }

    public function informationShow()
    {
        $data =$_GET;
        $id =$data['id'];
        $admin_id =$data['admin_id'];

        $data = DB::table('feedback')
                ->select('feedback.*' ,'admin.shopname')
                ->join('admin','feedback.admin_id', '=', 'admin.id')
                ->where('users_id', $id)
                ->where('admin_id', $admin_id)
                ->get();
        Helper::Message('1',$data);
    }

    public function informationCreate()
    {
        $data = $_GET;

        $data = [
            'users_id' => $data['id'],
            'admin_id' => $data['admin_id'],
            'content' => $data['content'],
            'time' => time(),
               ];

        $res = DB::table('feedback')->insert($data);

        if ($res){
            Helper::Message('2');

            }else{

            Helper::Message('3');

            }
        }

    public function myMoney()
    {
        $user_id = $_GET['user_id'];

        $data = DB::table('purse')
                 ->join('user','purse.user_id', '=', 'user.id')
                 ->where('user_id', $user_id)
                 ->select('purse.*' ,'user.name','user.nickName')
                ->get();

        Helper::Message('1',$data);
    }
}