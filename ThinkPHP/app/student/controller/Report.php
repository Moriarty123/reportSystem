<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\student\model\Student as studentModel;
use app\student\model\Report as reportModel;
use app\student\model\Course as courseModel;
use app\student\model\Guide as guideModel;
use app\student\model\Task as taskModel;

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

    //添加实验报告
    public function reportAdd()
    {
        //0.测试
        // dump($_POST);

        //1.获取数据
        $courseNo       = input('post.courseNo');
        $teacherNo      = input('post.teacherNo');
        $studentNo      = input('post.studentNo');
        $taskNo         = input('post.taskNo');
        $reportName     = input('post.reportName');
        $testRequire    = input('post.testRequire');
        $testAnalysis   = input('post.testAnalysis');
        $testContent    = input('post.testContent');
        $testScreen     = input('post.testScreen');
        $testCode       = input('post.testCode');
        $testSummary    = input('post.testSummary');
        $testTime       = time();

        $data = [
            'courseNo'      => $courseNo,
            'teacherNo'     => $teacherNo,
            'studentNo'     => $studentNo,
            'taskNo'        => $taskNo,
            'reportName'    => $reportName,
            'testRequire'   => $testRequire,
            'testAnalysis'  => $testAnalysis,
            'testContent'   => $testContent,
            'testScreen'    => $testScreen,
            'testCode'      => $testCode,
            'testSummary'   => $testSummary,
            'testTime'      => $testTime,
        ];

        // dump($data);

        //2.存入数据库
        $reportModel = new reportModel();

        $report = $reportModel->create($data);

        if (empty($report)) {
            Log::record("添加实验报告失败！", "error");
            $this->error("添加实验报告失败！", "/student/task/addFail");
        }

        //3.后续操作
        $this->success("添加实验报告成功！", "/student/report/addSuccess");
    }

    //
    public function addSuccess()
    {
        return $this->fetch('addSuccess');
    }

    //
    public function addFail()
    {
        return $this->fetch('addFail');
    }

    //显示实验报告
    public function reportPage()
    {
        //0.测试
        // dump($_GET);
        Log::record('显示实验报告','notice');

        //1.获取teacherName、courseName、studentName
        //1.1获取student
        $studentNo = session('account');
        $studentModel = new studentModel();
        $studentWhere = "studentNo = '$studentNo'";
        $student = $studentModel->where($studentWhere)->find();

        //1.2获取guide
        $guideNo = input('get.guideNo');
        $guideModel = new guideModel();

        $guideWhere = "a.guideNo = '$guideNo'";
        $guide = $guideModel->where($guideWhere)
                            ->alias("a")
                            ->join("teacher b", "a.teacherNo = b.teacherNo")
                            ->join("course c", "a.courseNo = c.courseNo")
                            ->join("task d", "a.taskNo = d.taskNo")
                            ->field("a.*,b.teacherNo,b.teacherName,c.courseNo,c.courseName, d.taskNo, d.taskName")
                            ->find();

        //2.渲染
        $this->assign('student', $student);  
        $this->assign('guide', $guide);

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
