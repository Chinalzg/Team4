<?php

namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Admin extends Model
{
    public function review()
    {

       return DB::table('comment')

          ->join('product', 'comment.product_id', '=', 'product.id')

          ->join('user', 'comment.user_id', '=', 'user.id')

         ->select('comment.id as cid' ,'comment.status as cstatus' ,'comment.time as ctime' ,  'product.name as pname'    ,'comment.*' , 'product.*' , 'user.*' )

           ->paginate(4);

    }

    public function reviewShow($id)
    {

           return DB::table('comment')

           ->where('comment.id' , $id)

            ->join('product', 'comment.product_id', '=', 'product.id')

            ->join('user', 'comment.user_id', '=', 'user.id')

            ->select('comment.id as cid' ,'comment.image as cimage','comment.*' ,'product.name as pname', 'product.*' , 'user.*')

            ->get();

    }

    public function reviewUpdate($id)
    {
       return DB::table('comment')

               ->where('id' , $id)

               ->update(['status' => 1]);

    }

    public function commentReply($data)
    {
         $user_id = '1';

        return DB::table('comment')

                -> where('id' , $data['id'])

                ->update(['contents' => $data['contents'] , 'status' => 1]);

    }

    public function commentDel($id)
    {
         return DB::table('comment')

                ->delete(['id' => $id]);
    }

    public function service()
    {
        return DB::table('feedback')

              ->join('user', 'feedback.user_id', '=', 'user.id')

              ->join('users', 'feedback.users_id', '=', 'users.id')

              ->select('feedback.id as fid' ,'feedback.*' ,'user.*' ,'users.*' )

                ->get();
    }

    public function serviceShow($id)
    {
     return   DB::table('feedback')

            ->where('feedback.id' , $id)

            ->join('user', 'feedback.user_id', '=', 'user.id')

            ->join('users', 'feedback.users_id', '=', 'users.id')

            ->select('feedback.id as fid' ,'feedback.*' ,'user.*' ,'users.*' )

            ->get();
    }

    public function serviceInsert($data)
    {
        $id=$data['id'];

         return DB::table('feedback')

                ->where('feedback.id' , $id)

                ->update(['contents' => $data['contents'] , 'status' => 1]);

    }


    public function response($id)
    {
       $contents="你的请求已接受";

       $data = DB::table('feedback')

               ->where('id' , $id)

               ->update(['contents' => $contents]);


    }


}
