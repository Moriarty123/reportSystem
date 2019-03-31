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

    //跳转到首页
    public function toIndex()
    {
        $account = session('account');

        if (!empty($account)) {
            if (strlen($account) == 7) {
                $this->redirect('/teacher/index/index');
            }
            else if(strlen($account) == 12){
                $this->redirect('/student/index/index');
            }
        }
        else {
            $this->redirect('/index/index/index');
        }
    }

}
