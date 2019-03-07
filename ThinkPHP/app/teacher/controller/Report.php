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

    //实验课程筛选
    public function courseFilter()
    {
        //0.测试
        // dump($_POST);
        Log::record("实验课程筛选", "notice");

        //获取courseNo
        $courseNo = input('post.courseFilterNo');

        if ($courseNo == -1) {
            $courseWhere = "";
        }
        else {
            $courseWhere = "a.courseNo = '$courseNo'";    
        }
        
        $this->usefilter($courseWhere);
        return $this->fetch('reportList');
    }

    //提交结果筛选
    public function submitFilter() {
        //0.测试
        // dump($_POST);
        Log::record('提交结果筛选', 'notice');

        $submitResult = input('post.submitResult');

        $submitWhere = "a.submitResult = '$submitResult'";

        $this->usefilter($submitWhere);
        return $this->fetch('reportList');

    }

    //批阅状态筛选
    public function reviewFilter() {
        //0.测试
        // dump($_POST);
        Log::record('批阅状态筛选', 'notice');

        $reviewStatus = input('post.reviewStatus');

        $reviewWhere = "a.reviewStatus = '$reviewStatus'";

        $this->usefilter($reviewWhere);
        return $this->fetch('reportList');

    }

    //筛选操作
    public function usefilter($filterWhere="") {
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
                                    ->where($filterWhere)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'a.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
                                    ->paginate(15);



        $reportNumber = $reportModel  
                                    ->where($where)
                                    ->where($submitWhere)
                                    ->where($filterWhere)
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

        // return $this->fetch('reportList');
    
    }

    //批阅实验报告页面
    public function reviewPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("批阅实验报告页面", "notice");

        $reportNo = input("get.reportNo");

        $this->assign("reportNo", $reportNo);

        return $this->fetch("reportReview");
    }

    //批阅页面
    public function reportReviewPage() 
    {
        //0.测试
        // dump($_GET);

        $reportNo = input("get.reportNo");

        $this->assign("reportNo", $reportNo);
        return $this->fetch("reportReviewPage");
    }

    //批阅实验报告
    public function reportReview()
    {
        //0.测试
        // dump($_POST);
        Log::record("批阅实验报告", "notice");

        //1.获取数据
        $reportNo = input("post.reportNo");
        $reviewComment = input("post.reviewComment");
        $score = input("post.score");

        $data = [
            'reportNo' => $reportNo,
            'reviewComment' => $reviewComment,
            'score' => $score,
            'reviewStatus' => 1
        ];

        $reportWhere = "reportNo = '$reportNo'";

        $reportModel = new reportModel();
        $report = $reportModel->update($data, $reportWhere);

        if (empty($report)) {
            Log::record("批阅实验报告失败", "error");
            $this->error("批阅实验报告失败！请稍后再试", "/teacher/report/reviewResult");
        }

        //2.后续操作
        $this->success("批阅实验报告成功！", "/teacher/report/reviewResult");

    }

    //跳转页面
    public function reviewResult()
    {
        return $this->fetch("reviewResult");
    }

}
