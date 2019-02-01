<?php
namespace app\common\controller;

use think\Controller;

class Common extends Controller
{
	// 初始化
    public function _initialize()
    {
    	//判断是否已经登录，未登录则转到登录页面
        $account = session('account');

        if(empty($account)) {
        	$this->error('请先登录','/index/index/login');
        }
    }

}
