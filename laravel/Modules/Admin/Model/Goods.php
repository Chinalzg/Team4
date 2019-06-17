<?php

namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Goods extends Model
{
    /**
     * @return mixed
     * 商品列表
     */
    public function category()
    {
        $list = DB::table('category')->get();

        return $list;
    }

    /**
     * @return mixed
     * 商品品牌
     */
    public function brand()
    {
        $data = DB::table('brand')->get();

        return $data;
    }

    /**
     * @return mixed
     * 供货商
     */
    public function supplier()
    {
        $supplier = DB::table('supplier')->get();

        return $supplier;
    }
    /**
     * 添加商品
     */
    public function addProduct($data,$path)
    {

        $number = mt_rand(100000,999999) . mt_rand(100000,999999);
        
        $arr = [
            'name'=>$data['name'],
            'number'=>$number,
            'subtitle'=>$data['subtitle'],
            'category'=>$data['category'],
            'brand'=>$data['brand'],
            'supplier'=>$data['supplier'],
            'image'=>$path,
            'price'=>$data['price'],
            'stock'=>$data['stock'],
            'is_hot'=>$data['is_hot'],
            'is_new'=>$data['is_new'],
            'start_time'=>$data['start_time'],
            'end_time'=>$data['end_time'],
            'purchase'=>$data['purchase'],
            'common'=>$data['common'],
            'copper'=>$data['copper'],
            'sliver'=>$data['sliver'],
            'gold'=>$data['gold'],
            'discounts'=>$data['discounts'],
            'discountsPrice'=>$data['discountsPrice'],
            'is_free'=>$data['is_free'],
            'marketPrice'=>$data['marketPrice'],
            'create_time'=>time(),
            'warehouse'=>$data['warehouse']
        ];

        $result = DB::table('goods')->insert($arr);

        return $result;
    }
    /**
     * 商品列表
     *
     * @return void
     */
    public function goods()
    {
        $res = DB::table('goods')->paginate(3);

        return $res;
    }
    public function goodsDelete($id)
    {
        $res = DB::table('goods')->where('id', '=', $id)->delete();

        return $res;
    }
    public function goodsUpdate($id)
    {
        $res = DB::table('goods')->where('id','=',$id)->get();

        return $res;
    }
    public function goodsUpdateCheck($data,$id,$path)
    {
        $number = mt_rand(100000,999999) . mt_rand(100000,999999);
        $arr = [
            'name'=>$data['name'],
            'number'=>$number,
            'subtitle'=>$data['subtitle'],
            'category'=>$data['category'],
            'brand'=>$data['brand'],
            'supplier'=>$data['supplier'],
            'image'=>$path,
            'price'=>$data['price'],
            'stock'=>$data['stock'],
            'is_hot'=>$data['is_hot'],
            'is_new'=>$data['is_new'],
            'start_time'=>$data['start_time'],
            'end_time'=>$data['end_time'],
            'purchase'=>$data['purchase'],
            'common'=>$data['common'],
            'copper'=>$data['copper'],
            'sliver'=>$data['sliver'],
            'gold'=>$data['gold'],
            'discounts'=>$data['discounts'],
            'discountsPrice'=>$data['discountsPrice'],
            'is_free'=>$data['is_free'],
            'marketPrice'=>$data['marketPrice'],
            'create_time'=>time()
        ];

        $result = DB::table('goods')->where('id','=',$id)->update($arr);

        return $result;
    }
    /**
     * 所属仓库
     *
     * @return void
     */
    public function wareHouse()
    {
        $res = DB::table('warehouse')->get();

        return $res;
    }
    /**
     * Undocumented function
     *检测属性
     * @param [type] $data
     * @return void
     */
    public function attributeCheck($data)
    {
        $arr = [
            'category'=>$data['category'],
            'name'=>$data['name'],
            'status'=>$data['status'],
            'create_time'=>time()
        ];

        $res = DB::table('attribute_key')->insert($arr);

        return $res;
    }
    /**
     * Undocumented function
     *添加属性值
     * @return void
     */
    public function attributeValue()
    {
        $res = DB::table('attribute_key')->get();

        return $res;
    }
    /**
     * Undocumented function
     *添加属性值检测
     * @param [type] $data
     * @return void
     */
    public function attributeValueCheck($data)
    {
        $arr = [
            'attribute_id'=>$data['id'],
            'attribute_val'=>$data['attribute_val'],
            'status'=>$data['status'],
            'create_time'=>time()
        ];

        $res = DB::table('attribute_value')->insert($arr);
        
        return $res;
    }
    /**
     * Undocumented function
     * sku 商品展示
     * @return void
     */
    public function good()
    {
        $res = DB::table('goods')->get();

        return $res;
    }
    /**
     * Undocumented function
     *商品属性
     * @return void
     */
    public function attributeKey()
    {
        $res = DB::table('attribute_key')->get();

        return $res;
    }
    /**
     * Undocumented function
     *商品属性值
     * @return void
     */
    public function attributeval()
    {
        $res = DB::table('attribute_value')->get();

        return $res;
    }
    /**
     * Undocumented function
     *生成sku 验证
     * @param [type] $data
     * @return void
     */
    public function createSkuCheck($data)
    {
        $attribute_val = json_encode($data['attribute_val']);

        $arr = [
            'name'=>$data['name'],
            'value'=>$attribute_val,
            'category'=>$data['category'],
            'create_time'=>time()
        ];

        // var_dump($arr);die;
        $res = DB::table('sku')->insert($arr);

        return $res;
    }
    /**
     * Undocumented function
     *属性列表
     * @return void
     */
    public function attributeList()
    {
        $res = DB::table('attribute_key')->paginate(2);

        return $res;
    }
    /**
     * Undocumented function
     *删除属性
     * @param [type] $id
     * @return void
     */
    public function attributeListDelete($id)
    {
        $res = DB::table('attribute_key')->where('id', '=', $id)->delete();

        return $res;
    }
    /**
     * Undocumented function
     *属性修改处理
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function attributeUpdateCheck($data,$id)
    {
        $arr = [
            'category'=>$data['category'],
            'name'=>$data['name'],
            'status'=>$data['status'],
            'create_time'=>time()
        ];

        $res = DB::table('attribute_key')->where('id','=',$id)->update($arr);

        return $res;

    }
    /**
     * Undocumented function
     *删除属性值
     * @param [type] $id
     * @return void
     */
    public function attributeValueDelete($id)
    {
        $res = DB::table('attribute_value')->where('id', '=', $id)->delete();

        return $res;
    }
    /**
     * Undocumented function
     *属性值修改处理
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function attributeValueUpdatec($data,$id)
    {
        $arr = [
            'attribute_id'=>$data['id'],
            'attribute_val'=>$data['attribute_val'],
            'status'=>$data['status'],
            'create_time'=>time()
        ];

        $res = DB::table('attribute_value')->where('id', '=', $id)->update($arr);
        
        return $res;
    }
    /**
     * Undocumented function
     *属性值修改
     * @param [type] $id
     * @return void
     */
    public function attributevalU($id)
    {
        $res = DB::table('attribute_value')->where('id','=',$id)->get();

        return $res;
    }
    /**
     * Undocumented function
     *属性修改检测
     * @param [type] $id
     * @return void
     */
    public function attributeListUpdatec($id)
    {
        $res = DB::table('attribute_key')->where('id','=',$id)->get();

        return $res;
    }
    


    




}
