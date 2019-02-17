<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\student\model\student as studentModel;
use app\student\model\Report as reportModel;
use app\student\model\Course as courseModel;

class Report extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //实验报告列表
    public function reportList()
    {
        //0.测试
        // dump($_POST);
        Log::record('显示实验报告列表','notice');

    	//1.获取账号
    	$account = session('account');

    	//2.获取该账号教师学生的实验实验报告
    	// $studentModel = new studentModel();

    	$where = "a.studentNo = '$account'";

        $reportModel = new reportModel();
        $courseModel = new courseModel();

    	$reportList = $reportModel	
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'a.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
			    				    ->paginate(15);

		$reportNumber = $reportModel  
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'a.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
			    				     ->count();

        

    	//3.页面渲染
		$this->assign('reportList', $reportList);
		$this->assign('reportNumber', $reportNumber);


		return $this->fetch('reportList');
    }

    


}
