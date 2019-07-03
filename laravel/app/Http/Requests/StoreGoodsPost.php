<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodsPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required:Goods|max:3',
            'subtitle' => 'required:Goods',
            'category' => 'required:Goods',
            'brand' => 'required:Goods',
            'warehouse' => 'required:Goods',
            'price' => 'required:Goods',
            'stock' => 'required:Goods',
        ];
    }
    /**
     * Undocumented function
     *表单验证
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => '名称不能为空',
            'name.max' => '名字不能超过3个字符',
            'subtitle.required' => '副标题不能为空',
            'category.required' => '请选择商品分类',
            'brand.required' => '请选择品牌',
            'warehouse.required' => '请选择仓库',
            'price.required' => '请选择当前售价',
            'stock.required' => '请输入库存',

        ];
    }
}
