<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/13 0013
 * Time: 9:05
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
     protected $table='shop_cat';
     public $timestamps = false;

     public function shopCreate(){

     }

     public function shopShow(){
         return Shop::all()->toArray();
     }
}