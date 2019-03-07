<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\student\model\Elective as electiveModel;

class Score extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //显示学生成绩
    public function scoreShow()
    {
    	//0.测试
    	// dump($_POST);
    	Log::record("显示学生成绩", "notice");

    	$electiveModel = new electiveModel();

    	$studentNo = session("account");
    	$studentWhere = "studentNo = '$studentNo'";

    	$courseList = $electiveModel->where($studentWhere)
							    	->alias("a")
							    	->join("course b", "a.courseNo = b.courseNo")
							    	->select();

    	$taskList = $electiveModel	->where($studentWhere)
							    	->alias("a")
							    	->join("course b", "a.courseNo = b.courseNo")
							    	->join("task c", "b.courseNo = c.courseNo")
							    	->select();

		// dump($courseList);
		// dump($taskList);

		$this->assign("courseList", $courseList);
		$this->assign("taskList", $taskList);


    	return $this->fetch('scoreShow');
    }
}
