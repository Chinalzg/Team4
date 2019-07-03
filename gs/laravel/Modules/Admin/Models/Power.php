<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/11 0011
 * Time: 14:26
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $table='power';
    public $timestamps = false;

    //通过获取到的点击菜单ID获取到其下的字目录
    public function powerinfo($id){
       return Power::where('pid',$id)->get()->toArray();
    }

    //通过获取到的菜单ID获取到它的信息
    public function powerShow($id){
        return Power::where('id',$id)->first()->toArray();
    }

    //获取到全部父级菜单
    public function power(){
        return Power::where('pid',0)->get()->toArray();
    }

    //获取全部菜单
    public function getPower(){
        return Power::all()->toArray();
    }

    //添加菜单
    public function addPower($data){

        return Power::insert($data);
    }

    //修改菜单
    public function updPower($id,$data){
        return Power::where('id',$id)->update($data);
    }

}