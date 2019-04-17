<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\User as userModel;

class User extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //跳转修改密码页面
    public function updatePwdPage()
    {
    	Log::record('跳转修改密码页面', 'notice');
    	//获取登录账户
    	$user_id = session('user_id');

    	$userModel = new userModel();

    	$where = "user_id = '$user_id'";
    	$user = $userModel->where($where)->find();

    	if (empty($user)) {
    		Log::record('找不到该账号！', 'error');
    		$this->error('找不到该账号');
    	}

    	$this->assign('user', $user);

    	return $this->fetch('updatePwd');
    }

    //修改密码
    public function updatePwd()
    {
    	//0.测试
    	// dump($_POST);
    	Log::record('修改密码', 'notice');
    	
    	//1.初始操作
    	//1.1获取数据
    	$bepwd = input('post.bepwd');
    	$pwd = input('post.pwd');
    	$repwd = input('post.repwd');

    	//1.2创建模型
    	$userModel = new userModel();

        if ($bepwd == $repwd) {
            Log::record('原始密码和修改密码相同！', 'error');
            $this->error("原始密码和修改密码相同！");
        }

    	//2.验证原始密码
    	//2.1查询账号是否存在
		$password = md5($bepwd);
        $password = md5($password);
        // dump($password);die();

		$account = session('account');
		$where = "account = '$account' and password = '$password'";
		$login = $userModel	->where($where)
    						->find();

    	//2.2显示查询结果，查询错误则报错，查询正确继续执行
    	if (empty($login)) {
    		Log::record('原始密码错误！', 'error');
    		$this->error('原始密码错误！');
    	}

    	//2.修改数据库
        $pwd = md5($pwd);
        $pwd = md5($pwd);
    	$data = [
    		'password' => $pwd
    	];
        // dump($data);die();
    	$user_id = session('user_id');

    	$where = "user_id = '$user_id'";
    	$update = $userModel->where($where)->update($data);
        // dump($update);die();

    	if ($update != 1) {
    		Log::record('修改密码失败！', 'error');
    		$this->error('修改密码失败！');
    	}

    	$this->success('修改密码成功！', '/teacher/index/index');

    }

}
