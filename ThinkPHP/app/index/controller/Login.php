<?php
namespace app\index\controller;

use think\Controller;

use app\index\validate\User as userValidate;
use app\index\model\User as userModel;

class Login extends Controller
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    // 登录页面
    public function login() 
    {
    	//0.测试
    	// dump($_POST);

    	//1.获取数据
    	$account 	= input('post.account');
    	$password 	= input('post.password');

    	//2.验证数据
    	//2.1创建验证器
		$userValidate = new userValidate();

		//2.2创建验证数据
    	$data = [
		    'account'  => $account,
		    'password' => $password
		];

		//2.3显示验证结果，验证错误则报错，验证正确继续执行
		if (!$userValidate->check($data)) {
		    $this->error($userValidate->getError());
		}

    	//3.查找账号
    	//3.1创建模型
		$userModel = new userModel();

		//3.2查询账号是否存在
		$password = md5($password);
		$where = "account = '$account' and password = '$password'";
		$login = $userModel	->where($where)
    						->find();

    	//2.3显示查询结果，查询错误则报错，查询正确继续执行
    	if (empty($login)) {
    		$this->error('账号或密码错误！');
    	}

    	//4.登录系统
    	//4.1保存账号信息
    	session('account', $account);
        session('user_id', $login['user_id']);

    	//4.2判断登录角色，账号长度为7是教师，为12是学生
    	if (strlen($account) == 7) {
    		$this->success('教师登录成功','/teacher/index/index');
    	}
    	else if (strlen($account) == 12) {
    		$this->success('学生登录成功','/index/index/index');
    	}
    }

    //退出登录
    public function logout()
    {
        session('account', null);
        session('user_id', null);

        $this->success('退出登录成功！', '/index/index/index');
    }
}
