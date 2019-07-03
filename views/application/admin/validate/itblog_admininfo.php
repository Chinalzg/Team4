<?php

namespace app\admin\validate;

use think\Validate;

class itblog_admininfo extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    //管理员昵称
	    'admin_name' => 'require|max:18',
        //管理员密码
        'admin_pwd' => 'require|max:15|min:9',
        //管理员电话
        'admin_phone' => 'require|unique:itblog_admininfo|max:11',
        //管理员电邮
        'admin_email' => 'require|max:50|email',
        //添加 更新 时间戳
        'admin_addtime' => 'require',
        'admin_updatetime' => 'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        //管理员昵称
        'admin_name.require' => '请填写管理员昵称',
        'admin_name.max' => '昵称最大长度为6个汉字',
        //管理员密码
        'admin_pwd.require' => '请填写密码',
        'admin_pwd.max' => "密码最小长度为9个字符，最大长度为15个字符",
        //管理员手机号
        'admin_phone.require' => '请填写电话',
        'admin_phone.max' => '手机最大长度为11位',
        'admin_phone.unique' => '此手机号已被注册',
        //管理员电子邮箱
        'admin_email.require' => '请填写电子邮件',
        'admin_email.max' => '电邮最大为50个字符',
        //管理员账号添加更新时间
        'admin_addtime.require' => '请设置添加时间',
        'admin_updatetime.require' => '请设置更新时间',
    ];
}
