<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    // 登录页面
    public function login() 
    {
        //判断是否记住我
        $isRemember = session('rememberMe');
        if (!empty($isRemember)) {
            session('isRemember', 'true');
        }
        else {
            session('isRemember', 'false');
            session('reaccount', null);
            session('repassword', null);
        }

    	return $this->fetch('login');
    }
}
