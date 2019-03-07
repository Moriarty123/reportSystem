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

        //1.获取数据
        //1.1获取评分方式
        $scoreSystem = input("post.scoreSystem");
        //1.2.获取courseNo
        $courseNo = input("post.courseNo");
        //1.3获取学生学号
        $studentNo = session("account");

        //2.1.获取课程列表、任务列表
    	$electiveModel = new electiveModel();

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

        //2.2获取分数
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

        //评分方式
        if ($scoreSystem == 1) {
            foreach ($score as $key => $value) {
                $score[$key] = toFivePoint($score[$key]);
            }
        }

        $this->assign("score", $score);
        $this->assign("number", $number);
		$this->assign("courseList", $courseList);
		$this->assign("taskList", $taskList);


    	return $this->fetch('scoreShow');
    }

    //百分制转五分制
    public function toFivePoint($num)
    {
        if ($num >= 90) {
            return "A";
        }
        else if ($num >= 80 && $num < 90) {
            return "B";
        }
        else if ($num >= 70 && $num < 80) {
            return "C";
        }
        else if ($num >= 60 && $num < 70) {
            return "D";
        }
        else {
            return "E";
        }
    }

    //五分制转百分制
    public function toPercentage($num) {
        if ($num == "A") {
            return 95;
        }
        else if ($num == "B") {
            return 85;
        }
        else if ($num == "C") {
            return 75;
        }
        else if ($num == "D") {
            return 65;
        }
        else {
            return 30;
        }
    }
}
