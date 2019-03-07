<?php
namespace app\teacher\controller;

use think\Controller;

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
            // echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            // echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}

}
