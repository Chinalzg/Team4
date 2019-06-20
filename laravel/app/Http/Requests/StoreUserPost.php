<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_dash|between:4,10',
            'password' => 'required|between:6,20',
            'email' => 'required|email'
        ];
    }

     public function messages()
    {
        return [
            'name.required' => '名称不能为空',
            'name.alpha_dash' => '名称可以是字母，数字下划线等',
            'name.between' => '名称长度在4-10个字符',
            'password.required' => '密码不能为空',
            'password.between' => '密码长度在6-20之间',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不合法'
        ];
    }
}
