<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Report as reportModel;
use app\teacher\model\Course as CourseModel;
use app\teacher\model\Task as taskModel;

class Score extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //显示学生成绩分布
    public function scoreShow()
    {
    	//0.测试
    	// dump($_POST);
    	Log::record("显示学生成绩分布", "notice");

        //获取taskNo
        $taskNo = input("post.taskNo");

        if (empty($taskNo)) {
            $taskWhere = "";
        }
        else {
            $taskWhere = "taskNo = '{$taskNo}'"; 
        }

        // dump($taskWhere);

        //获取课程列表、任务列表
        $teacherNo = session("account");
        $teacherWhere = "teacherNo = '{$teacherNo}'";

        $courseModel = new courseModel();
        $taskModel = new taskModel();

        $courseList = $courseModel->where($teacherWhere)->select();
        $taskList = $taskModel->where($teacherWhere)->select(); 

        $this->assign("courseList", $courseList);
        $this->assign("taskList", $taskList);

        //获取成绩人数
        $count = [];
        $where = [];
        $chars = ['A','B','C','D','E'];

        $reportModel = new reportModel();

        for ($i=0; $i<5 ; $i++) { 
            $where[$i] = "score = '".$chars[$i]."'";

            $count[$i] = $reportModel->where($taskWhere)->where($where[$i])->count();
        }

        // dump($count);

        $this->assign("count", $count);

        return $this->fetch("scoreShow");
    }

    //二级联动
    public function courseTask()
    {
        //0.测试
        // dump($_POST);
        Log::record("课程任务二级联动", "notice");

        $taskModel = new taskModel();

        $courseNo = input("post.courseNo");
        $courseWhere = "courseNo = '$courseNo'";
        $taskList = $taskModel->where($courseWhere)->select();

        $code = 1;



        return json($taskList);
    }

}
