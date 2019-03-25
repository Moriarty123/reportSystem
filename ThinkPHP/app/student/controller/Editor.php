<?php
namespace app\student\controller;

use think\Controller;

class Editor extends Controller
{
	//index
	public function index()
	{
		return "hello world";
	}

	/**
	* wangeditor编辑器上传图片，可多图上传
	* 返回格式
	*
	* {
	// errno 即错误代码，0 表示没有错误。
	// 如果有错误，errno != 0，可通过下文中的监听函数 fail 拿到该错误码进行自定义处理
	"errno": 0,

	// data 是一个数组，返回若干图片的线上地址
	"data": [
	"图片1地址",
	"图片2地址",
	"……"
	]
	}
	*/
	public function upload()
	{
		$files = request()->file();
		$imags = [];
		$errors = [];
		foreach($files as $file){
		// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			if($info){
			// 成功上传后 获取上传信息
			// 输出 jpg
			//echo $info->getExtension();
			// 输出 42a79759f284b767dfcb2a0197904287.jpg
			//echo $info->getFilename();
				$path = '/uploads/'.$info->getSaveName();
				$path = str_replace('\\','/',$path);
				array_push($imags,$path);
			}else{
			// 上传失败获取错误信息
			//echo $file->getError();
				array_push($errors,$file->getError());
			}
		}
		if(!$errors){
			$msg['errno'] = 0;
			$msg['data'] = $imags;
			return json($msg);
		}else{ 
			$msg['errno'] = 1;
			$msg['data'] = $imags;
			$msg['msg'] = "上传出错";
			return json($msg);
		}

	}
}
