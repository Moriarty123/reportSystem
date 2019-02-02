<?php
namespace app\teacher\controller;

use think\Controller;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;

class Course extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //课程列表
    public function courseList()
    {
    	//1.获取账号
    	$account = session('account');

    	//2.获取该账号教师的实验课程
    	$teacherModel = new teacherModel();

    	$where = "teacherNo = '$account'";

    	$courseList = $teacherModel	->courses()
			    				->where($where)
			    				->paginate(15);

		$courseNumber = $teacherModel	->courses()
			    				->where($where)
			    				->count();

    	//3.页面渲染
		$this->assign('courseList', $courseList);
		$this->assign('courseNumber', $courseNumber);

		return $this->fetch('courseList');
    }

}
