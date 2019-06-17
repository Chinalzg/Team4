<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/15 0015
 * Time: 18:37
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    public $timestamps = false;

    //查看所有角色信息
    public function showsRole(){
        return Role::all()->toArray();
    }

    //通过角色ID来查看角色的信息
    public function infoRole($id){
        return Role::where('id',$id)->first()->toArray();
    }

    public function addRole($data){
        return Role::insertGetId($data);
    }

    //修改角色信息
    public function updRole($id,$data){
        return Role::where('id',$id)->update($data);
    }
}