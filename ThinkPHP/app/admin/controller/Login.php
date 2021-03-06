<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

use app\index\validate\User as userValidate;
use app\index\model\User as userModel;

class Login extends Controller
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    // 登录系统
    public function login() 
    {
    	//0.测试
    	// dump($_POST);
        Log::record('管理员登录系统','notice');

    	//1.获取数据
    	$account 	= input('post.account');
    	$password 	= input('post.password');
        $rememberMe = input('post.rememberMe');

        //判断是否记住我
        if (!empty($rememberMe)) {
            session('rememberMe', $rememberMe);
            session('reaccount', $account);
            session('repassword', $password);
        }
        else {
            session('isRemember', 'false');
            session('reaccount', null);
            session('repassword', null);
        }

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
            Log::record($userValidate->getError(),'error');
		    $this->error($userValidate->getError());
		}

    	//3.查找账号
    	//3.1创建模型
		$userModel = new userModel();

		//3.2查询账号是否存在
		$password = md5($password);
        $password = md5($password);
        $isAdmin = "permission >= 100";
		$where = "account = '$account' and password = '$password'";
		$login = $userModel	->where($where)
                            ->where($isAdmin)
    						->find();

    	//2.3显示查询结果，查询错误则报错，查询正确继续执行
    	if (empty($login)) {
            Log::record('账号或密码错误！','error');
    		$this->error('账号或密码错误！');
    	}

    	//4.登录系统
    	//4.1保存账号信息
        //登录次数递增1
        $userModel->where($where)->setInc('count');
        $userModel->where($where)->setField('lastTime', time());

    	session('account', $account);
        session('user_id', $login['user_id']);
        session('lastTime',$login['lastTime']);
        session('count', $login['count']+1);
        session('isAdmin', true);

        //4.2登录角色
        $this->success('管理员登录成功','/admin/index/index');
    }

    //退出登录
    public function logout()
    {
        session('account', null);
        session('user_id', null);
        session('lastTime',null);
        session('count', null);
        session('isAdmin', null);

        $this->success('退出登录成功！', '/index/index/index');
    }
}
