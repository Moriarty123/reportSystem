<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\student\model\Elective as electiveModel;
use app\student\model\Report as reportModel;
use app\student\model\Task as taskModel;

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

        //1.获取课程列表、任务列表
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

        //2.获取courseNo
        $courseNo = input("post.courseNo");
        $courseWhere = "courseNo = -1";
        if (!empty($courseNo)) {
            $courseWhere = "courseNo = '$courseNo'";
        }
        // dump($courseWhere);
        $reviewWhere = "reviewStatus = 1";
        $reportModel = new reportModel();
        $score = $reportModel   ->where($courseWhere)
                                ->where($studentWhere)
                                ->where($reviewWhere)
                                ->order("taskNo")
                                ->column('score');

        $taskModel = new taskModel();
        $number = $taskModel->where($courseWhere)->count();
        // dump($reportList);

        $this->assign("score", $score);
        $this->assign("number", $number);
		$this->assign("courseList", $courseList);
		$this->assign("taskList", $taskList);


    	return $this->fetch('scoreShow');
    }
}
