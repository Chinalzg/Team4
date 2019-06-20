<?php

namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
class House extends Model
{
 public function house()
 {
     return DB::table('warehouse')

             ->paginate(4);;
 }

 public function houseSelect($key)
 {
     return DB::table('warehouse')

         ->where('name', 'like', "%$key%")

         ->paginate(4);
 }

 public function china()
 {

     return DB::table('china')->get();
 }

 public function houseInsert($data)
 {
   $code = rand ('000000000','99999999');

   $time = time();

   $data = [
           'code' => $code ,
           'create_time' => $time ,
           'status' => $data['status'] ,
           'area' => $data['area'] ,
           'service' => $data['service'] ,
           'name' => $data['name']
   ];

   return DB::table('warehouse')->insert($data);
 }

 public function houseShow($id)
 {

    $data = DB::table('warehouse')

        -> where('id' , $id)

        ->first();
 
    $status = $data ->status;

     if ($status == 1)
     {
         return DB::table('warehouse')

             -> where('warehouse.id' , $id)

             ->join('goods', 'warehouse.g_id', '=', 'goods.id')

             ->join('user', 'warehouse.user_id', '=', 'user.id')
             
             ->select('warehouse.create_time as wcreate_time' ,'warehouse.id as cid' ,'warehouse.status as wstatus' , 'goods.name as pname'    ,'warehouse.*' , 'goods.*' , 'user.*' )

             ->get();


     }else{

         return "此仓库未启用";
     }
 }

 public function houses()
 {
     return DB::table('warehouse')->get();
 }

 public function houseFind($id)
 {
     return DB::table('warehouse')

         -> where('warehouse.id' , $id)

         ->join('goods', 'warehouse.g_id', '=', 'goods.id')

         ->join('user', 'warehouse.user_id', '=', 'user.id')

         ->select('warehouse.name as wname' ,'warehouse.id as wid' ,'warehouse.status as wstatus' , 'goods.name as pname'    ,'warehouse.*' , 'goods.*' , 'user.*' )

         ->first();
 }
 public function houseUpdate($data)
 {

     $res = $this ->houseFind($data['wid']);

     $number = ($res->number)-$data['number'];

     $code = $data['zname'];

     $result = DB::table('warehouse')

               ->where('code' , $code)

               ->first();

     $num= $result->number;


     $numbers =$num + $data['number'];


     DB::beginTransaction($number , $numbers ,$code , $data);

     try{
         Db::table('warehouse')

             ->where('id' ,$data['wid'])

             ->update(['number' => $number]);



         Db::table('warehouse')

             ->where('code' , $code)

             ->update(['number' => $numbers  , 'g_id'=>$res->product_id , 'status' => 1]);

         return  DB::commit();
     } catch (\Exception $e){
         DB::rollback();//事务回滚
         echo $e->getMessage();
         echo $e->getCode();
     }

 }

 public function houseNumber($data)
 {

   $res=DB::table('warehouse')

           -> where('id' , $data['wid'])

           ->first();

   $number = $res->number;

   if ($data['number'] > $number){

       return "超出库存";

   }else{

       return "未超出库存";
   }

 }

 public function houseStop()
 {
     return DB::table('warehouse')

         -> where('warehouse.status' , 0)

         ->join('goods', 'warehouse.g_id', '=', 'goods.id')

         ->join('user', 'warehouse.user_id', '=', 'user.id')

         ->select('warehouse.create_time as wcreate_time' ,'warehouse.id as wid' ,'warehouse.status as wstatus' , 'goods.name as pname'    ,'warehouse.*' , 'goods.*' , 'user.*' )

         ->get();
 }

 public function statusUpdate($id)
 {
    return Db::table('warehouse')

            ->where('id' , $id)

        ->update(['status' => 1]);
 }
    public function statusUpdates($id)
    {
        return Db::table('warehouse')

            ->where('id' , $id)

            ->update(['status' => 0]);
    }

    public function houseDelete($id)
    {
        return Db::table('warehouse')

            ->where('id' , $id)

            ->delete();
    }
}