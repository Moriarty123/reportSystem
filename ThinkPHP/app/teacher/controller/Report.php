<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Report as reportModel;
use app\teacher\model\Course as courseModel;
use app\teacher\model\Student as studentModel;

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
    	// $teacherModel = new teacherModel();

    	$where = "a.teacherNo = '$account'";
        $submitWhere = "a.submitStatus = 1";

        $reportModel = new reportModel();
        $courseModel = new courseModel();

    	$reportList = $reportModel	
                                    ->where($where)
                                    ->where($submitWhere)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'a.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
			    				    ->paginate(15);

		$reportNumber = $reportModel  
                                    ->where($where)
                                    ->where($submitWhere)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->join('report c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'c.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
			    				     ->count();

        $courseWhere = "teacherNo = '$account'";
        $courseList = $courseModel  ->where($courseWhere)
                                    ->select();

    	//3.页面渲染
		$this->assign('reportList', $reportList);
		$this->assign('reportNumber', $reportNumber);
        $this->assign('courseList', $courseList);

		return $this->fetch('reportList');
    }

    //模糊查找实验报告
    public function reportSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找实验报告','notice');

        //1.获取数据
        $search = input('post.search');
        $account = session('account');

        //2.获取该账号教师的实验实验报告
        //2.1构造搜索条件
        if(!empty($search)) {
            session('reportSearch', $search);
            $where['reportName'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('reportSearch');
            $where['reportName'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的实验报告
        $reportModel = new reportModel();
        $courseModel = new courseModel();

        $teacherNoWhere = "a.teacherNo = '$account'";

        $reportList = $reportModel 
                                    ->where($where)
                                    ->where($teacherNoWhere)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'a.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
                                    ->paginate(15);

        $reportNumber = $reportModel   
                                        ->where($where)
                                        ->where($teacherNoWhere)
                                        ->alias('a')
                                        ->join('course b', 'a.courseNo = b.courseNo')
                                        ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                        ->join('student d', 'a.studentNo = d.studentNo')
                                        ->join('task e', 'a.taskNo = e.taskNo')
                                        ->count();

        $courseWhere = "teacherNo = '$account'";
        $courseList = $courseModel  ->where($courseWhere)
                                    ->select();

        //3.页面渲染
        $this->assign('reportList', $reportList);
        $this->assign('reportNumber', $reportNumber);
        $this->assign('courseList', $courseList);


        return $this->fetch('ReportList');

    }

    //显示学生实验报告
    public function reportShow()
    {
        //0.测试
        // dump($_GET);
        Log::record("显示学生实验报告", "notice");
        //1.获取数据
        //1.1获取reportNo
        $reportNo = input("get.reportNo");
        //1.2获取report数据
        $reportModel = new reportModel();
        $reportWhere = "reportNo = '$reportNo'";
        $report = $reportModel->where($reportWhere)->find();
        $reportName = $report['reportName'];
        $testRequire = $report['testRequire'];
        $testAnalysis = $report['testAnalysis'];
        $testContent = $report['testContent'];
        $testScreen = $report['testScreen'];
        $testCode = $report['testCode'];
        $testSummary = $report['testSummary'];

        //获取student
        $studentNo = $report['studentNo'];
        $studentModel = new studentModel();
        $studentWhere = "studentNo = '$studentNo'";
        $student = $studentModel->where($studentWhere)->find();
        $studentName = $student['studentName'];

        //1.3拼接HTML
        $html = 
            '<p style="font-size:24px;"><strong>实验报告名称</strong></p>'
            .$reportName.
            '<p style="font-size:24px;"><strong>实验报告名称</strong></p>'
            .$studentName.
            '<p style="font-size:24px;"><strong>实验要求</strong></p>'.$testRequire.
            '<p style="font-size:24px;"><strong>实验分析</strong></p>'.$testAnalysis.
            '<p style="font-size:24px;"><strong>实验内容</strong></p>'.$testContent.
            '<p style="font-size:24px;"><strong>实验截图</strong></p>'.$testScreen.
            '<p style="font-size:24px;"><strong>实验代码</strong></p>'.$testCode.
            '<p style="font-size:24px;"><strong>实验总结</strong></p>'.$testSummary;
        // dump($html);
        reportPdf($html);
        //2.跳转到实验报告列表
        $this->redirect('teacher/report/reportList');
    }

}
