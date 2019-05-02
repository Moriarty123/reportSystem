<?php
namespace app\common\controller;

use think\Controller;
use think\Log;

use app\teacher\model\User as userModel;
use app\teacher\model\Role as roleModel;
use app\teacher\model\Functions as functionsModel;
use app\teacher\model\Menu as menuModel;

class Common extends Controller
{
	//index
	public function index()
	{
		return "hello world";
	}

	// 初始化
    public function _initialize()
    {
    	//判断是否已经登录，未登录则转到登录页面
        $account = session('account');

        if(empty($account)) {
        	$this->error('请先登录','/index/index/login');
        }
    }

    //上传文件
    public function upload(){
	    // 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('image');
	    
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    if($file){
	        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	            // 成功上传后 获取上传信息
	            // 输出 jpg
	            echo $info->getExtension();
	            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	            echo $info->getSaveName();
	            // 输出 42a79759f284b767dfcb2a0197904287.jpg
	            echo $info->getFilename(); 
	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
        	}
    	}
	}

	public function uploadPdf(){
        $file = request()->file('pdf');
        
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getFilename(); 
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    //获取左边菜单
    public function getMenu()
    {
        //0.测试
        // dump($_POST);
        Log::record("菜单方法列表", "notice");

        //1.获取当前账号的权限方法
        //1.1获取角色
        $account = session("account");
        $userModel = new userModel();
        $userWhere = "account = {$account}";
        $user = $userModel->where($userWhere)->find();
        $roleNo = $user->roleNo;

        //1.2获取权限方法
        $roleModel = new roleModel();
        $roleWhere = "roleNo = {$roleNo}";
        $role = $roleModel->where($roleWhere)->find();
        $functions = $role->functions;
        $functions = substr($functions,0,strlen($functions)-1); 

        //2.获取所有一级菜单
        $menuModel = new menuModel();
        $functionMenu = menuModel::all($functions);//获取角色所有方法（二级菜单）
        $authRule = menuModel::all();//获取所有菜单
        $menus = array();      

        foreach ($authRule as $key => $value) {
            $menu = $value->toArray();
            if ($menu['parentNo'] == 0) {
                $menus[] = $menu;
            }     
        } 

        //3.遍历所有菜单，查找所有二级菜单
        foreach ($menus as $k=>$v){
            foreach ($functionMenu as $kk=>$vv){
                if($v['menuNo']==$vv['parentNo']){
                    $temp = $vv->toArray();
                    // dump($temp);
                    $menus[$k]['children'][] = $temp;
                }
            }
        }
        return $menus;
    }

}
