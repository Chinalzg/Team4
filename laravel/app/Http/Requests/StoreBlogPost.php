<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'name' => 'required|unique:attribute_key|max:3',
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
            'name.required' => '不能为空',
            'name.max' => '名字不能超过4个字符',
        ];
    }
}
