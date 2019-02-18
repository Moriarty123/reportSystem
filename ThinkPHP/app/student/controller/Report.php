<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\student\model\student as studentModel;
use app\student\model\Report as reportModel;
use app\student\model\Course as courseModel;
use app\student\model\Guide as guideModel;

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

    //撰写实验报告
    public function addPage()
    {
        $guideNo = input('get.guideNo');
        $this->assign('guideNo', $guideNo);

        return $this->fetch('reportAdd');
    }

    //显示实验报告
    public function reportPage()
    {
        return $this->fetch('reportPage');
    }

    //显示实验指导
    public function guideShow() 
    {
        //0.测试
        //dump($_GET);

        //1.获取该ID的实验指导
        $guideNo = input('get.guideNo');

        //1.1创建guideModel,获取实验指导
        $guideModel = new guideModel();
        $where = "guideNo = $guideNo";
        $guide = $guideModel->where($where)->find();

        //获取实验指导数据
        $guideName = $guide['guideName'];
        $testAim = $guide['testAim'];
        $testEnvironment = $guide['testEnvironment'];
        $testRequire = $guide['testRequire'];
        $testTask = $guide['testTask'];
        $testContent = $guide['testContent'];
        $courseNo = $guide['courseNo'];

        //1.2创建courseModel,获取课程名称
        $where = "courseNo = '$courseNo'";
        $courseModel = new courseModel();
        $course = $courseModel->where($where)->find();
        $courseName = $course['courseName'];

        //生成pdf
        $html = 
            '<p style="font-size:24px;"><strong>实验指导名称</strong></p>'
            .$guideName.
            '<p style="font-size:24px;"><strong>实验课程</strong></p>'.$courseName.
            '<p style="font-size:24px;"><strong>实验目的</strong></p>'.$testAim.
            '<p style="font-size:24px;"><strong>实验环境</strong></p>'.$testEnvironment.
            '<p style="font-size:24px;"><strong>实验要求</strong></p>'.$testRequire.
            '<p style="font-size:24px;"><strong>实验任务</strong></p>'.$testTask.
            '<p style="font-size:24px;"><strong>实验内容</strong></p>'.$testContent;

        guidePdf($html);
        //2.跳转到实验指导列表
        $this->redirect('student/report/reportList');

    }


}
