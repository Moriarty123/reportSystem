<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
	//验证规则	
    protected $rule = [
        'account|账号'  =>  'require|length:7,12',
        'password|密码' =>  'require|min:6|max:18',
    ];

    //验证信息
    protected $message = [
    	'account.require' 		=> '账号不能为空',
    	'account.length'		=> '请输入7位或12位账号',
    	'password.require' 		=> '密码不能为空',
    	'password.min' 			=> '密码最少为6位',
    	'password.max' 			=> '密码最多为18位'
    ];

}