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
    	return $this->fetch('login');
    }
}
