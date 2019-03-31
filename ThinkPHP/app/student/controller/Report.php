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
use app\student\model\Elective as electiveModel;

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
        Log::record("添加实验报告", "notice");

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

    //添加实验报告成功
    public function addSuccess()
    {
        return $this->fetch('addSuccess');
    }

    //添加实验报告失败
    public function addFail()
    {
        return $this->fetch('addFail');
    }

    //实验报告页面
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
        Log::record("显示实验指导", "notice");

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
        $this->redirect('student/guide/guideList');

    }

    //编辑实验报告页面
    public function editPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("编辑实验报告页面", "notice");

        //1.获取数据
        //1.1获取reportNo
        $reportNo = input('get.reportNo');

        //1.2获取guide对象
        $reportModel = new reportModel();
        $reportWhere = "a.reportNo = '$reportNo'";

        $report = $reportModel  ->where($reportWhere)
                                ->alias("a")
                                ->join("teacher b", "a.teacherNo = b.teacherNo")
                                ->join("student c", "a.studentNo = c.studentNo")
                                ->join("course d", "a.courseNo = d.courseNo")
                                ->join("task e", "a.taskNo = e.taskNo")
                                ->field("a.*,b.teacherNo,b.teacherName, c.studentNo, c.studentName, d.courseNo,d.courseName, e.taskNo, e.taskName")
                                ->find();
 
        // dump($report);

        //2.页面渲染
        $this->assign("report", $report);


        return $this->fetch('reportEdit');
    }

    //编辑实验报告
    public function reportEdit()
    {
        //0.测试
        // dump($_POST);
        Log::record("编辑实验报告", "notice");

        //1.获取数据
        $reportNo       = input('post.reportNo');
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

        //2.更新数据
        $reportWhere = "reportNo = '{$reportNo}'";
        // dump($reportWhere);
        $reportModel = new reportModel();
        $report = $reportModel->update($data, $reportWhere);

        if (empty($report)) {
            Log::record("修改实验报告失败！", "error");
            $this->error("修改实验报告失败！请稍后再试。", "/student/report/reportList");
        }

        //3.后续操作
        $this->success("修改实验报告成功！", "/student/report/reportList");
    }

    //撰写实验报告页面
    public function writePage()
    {
        //0.测试
        // dump($_GET);
        Log::record("撰写实验报告页面", "notice");

        //1.获取选择框选项
        $account = session('account');

        $electiveModel = new electiveModel();
        $studentWhere = "a.studentNo = '$account'";
        $taskWhere = 'status = 1';

        $taskList = $electiveModel  ->alias('a')
                                    ->join('student b', 'a.studentNo = b.studentNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('course d', 'a.courseNo = d.courseNo')
                                    ->join('task e', 'e.courseNo = a.courseNo')
                                    ->where($taskWhere)
                                    ->where($studentWhere)
                                    ->select();

        $this->assign("task", $taskList);

        return $this->fetch('reportWrite');
    }

    //撰写实验报告
    public function reportWrite()
    {
        //0.测试
        // dump($_POST);
        Log::record("撰写实验报告", "notice");

        //1.获取数据
        //1.1获取表单数据
        $taskNo         = input('post.taskNo');
        $reportName     = input('post.reportName');
        $testRequire    = input('post.testRequire');
        $testAnalysis   = input('post.testAnalysis');
        $testContent    = input('post.testContent');
        $testScreen     = input('post.testScreen');
        $testCode       = input('post.testCode');
        $testSummary    = input('post.testSummary');
        $testTime       = time();

        //1.2获取teacher、courseNo、studentNo
        $studentNo      = session("account");

        $taskWhere = "taskNo = '$taskNo'";
        $taskModel = new taskModel();
        $task = $taskModel->where($taskWhere)->find();

        $teacherNo = $task['teacherNo'];
        $courseNo = $task['courseNo'];

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
            $this->error("添加实验报告失败！", "/student/report/reportList");
        }

        //3.后续操作
        $this->success("添加实验报告成功！", "/student/report/reportList");
    }

    // //显示实验报告
    // public function reportShow()
    // {
    //     //0.测试
    //     // dump($_GET);
    //     Log::record("显示实验报告", "notice");

    //     //1.获取数据
    //     //1.1获取reportNo
    //     $reportNo = input("get.reportNo");

    //     //1.2获取report数据
    //     $reportModel = new reportModel();
    //     $reportWhere = "reportNo = '$reportNo'";
    //     $report = $reportModel->where($reportWhere)->find();

    //     $reportName = $report['reportName'];
    //     $testRequire = $report['testRequire'];
    //     $testAnalysis = $report['testAnalysis'];
    //     $testContent = $report['testContent'];
    //     $testScreen = $report['testScreen'];
    //     $testCode = $report['testCode'];
    //     $testSummary = $report['testSummary'];

    //     //1.3拼接HTML
    //     $html = 
    //         '<p style="font-size:24px;"><strong>实验报告名称</strong></p>'
    //         .$reportName.
    //         '<p style="font-size:24px;"><strong>实验要求</strong></p>'.$testRequire.
    //         '<p style="font-size:24px;"><strong>实验分析</strong></p>'.$testAnalysis.
    //         '<p style="font-size:24px;"><strong>实验内容</strong></p>'.$testContent.
    //         '<p style="font-size:24px;"><strong>实验截图</strong></p>'.$testScreen.
    //         '<p style="font-size:24px;"><strong>实验代码</strong></p>'.$testCode.
    //         '<p style="font-size:24px;"><strong>实验总结</strong></p>'.$testSummary;

    //     // dump($html);

    //     reportPdf($html);

    //     //2.跳转到实验报告列表
    //     $this->redirect('student/report/reportList');
    //     // $this->success('跳转到实验报告列表', '/student/report/reportList');

    // }

    //显示实验报告
    public function reportShow()
    {
        //0.测试
        // dump($_GET);
        Log::record("显示实验报告", "notice");

        //1.获取数据
        //1.1获取reportNo
        $reportNo = input("get.reportNo");

        //1.2获取report数据
        $reportModel = new reportModel();
        $reportWhere = "reportNo = '$reportNo'";
        $report = $reportModel->where($reportWhere)->find();

        $reportName = $report['reportName'];
        $txtPath = $report['txtPath'];

        //2.2读取文件
        if(file_exists($txtPath)){

            $fp= fopen($txtPath,"r");
            $html = fread($fp,filesize($txtPath));//指定读取大小，这里把整个文件内容读取出来
            fclose($fp);
        }
        else {
            $html = "";
        }


        reportPdf($html);

        //2.跳转到实验报告列表
        // $this->redirect('student/report/reportList');
        // $this->success('跳转到实验报告列表', '/student/report/reportList');

    }

    //删除实验报告
    public function reportDelete()
    {
        //0.测试
        // dump($_POST);

        //1.获取reportNo
        //TP5的post方法不能提交数组，在表单name添加/a表示要提交有关数组，获取时同样要添加/a
        $reportNo = input("post.reportNo/a");
        
        try {
            foreach ($reportNo as $key => $no) {
                $where = "reportNo = '$no'";
                //暂时取消外链，删除后恢复
                $reportModel = new reportModel();

                $reportModel->query('SET FOREIGN_KEY_CHECKS = 0;');
                $ret = $reportModel->where($where)->delete();
                $reportModel->query('SET FOREIGN_KEY_CHECKS = 1;');
            }
        }
        catch (\Exception $e){
            Log::record("删除实验报告失败！", "error");
            $this->error('删除实验报告失败！', '/student/report/reportList');
        }
        

        $this->success('删除实验报告成功！', '/student/report/reportList');
    }

    //提交实验报告
    public function reportSubmit()
    {
        //0.测试
        // dump($_GET);
        Log::record("提交实验报告", "notice");

        //提交实验报告
        $reportNo = input("get.reportNo");
        $taskNo = input("get.taskNo");
        $studentNo = session("account");

        //1.1查询是否已经有实验报告提交
        $reportModel = new reportModel();
        //1.2判断是否已有实验报告提交
        $taskWhere = "taskNo = '$taskNo'";
        $studentWhere = "studentNo = '$studentNo'";
        $submitWhere = "submitStatus = 1";
        $count = $reportModel->where($taskWhere)
                                ->where($studentWhere)
                                ->where($submitWhere)
                                ->count();

        if ($count > 0) {
            Log::record("此实验任务已有报告提交,提交实验报告失败！", "error");
            $this->error("此实验任务已有报告提交，提交实验报告失败！", "/student/report/reportList");
        }

        //1.3查询report
        $reportWhere = "reportNo = '$reportNo'";

        $taskModel = new taskModel();
        $task = $taskModel->where($taskWhere)->find();

        //判断是否超过时间提交
        $submitResult = 0;
        $nowTime = time();

        if($task['endTime'] < $nowTime) {
            Log::record("超过时间提交", "notice");
            $submitResult = 1;
        }

        //更新提交状态
        $update = [
            'submitStatus' => 1,
            'submitTime'   => $nowTime,
            'submitResult' => $submitResult
        ];

        //2.更新操作
        $report = $reportModel->update($update, $reportWhere);

        if (empty($report)) {
            Log::record("提交实验报告失败！", "error");
            $this->error("提交实验报告失败！请稍后再试。", "/student/report/reportList");
        }

        $this->success("提交实验报告成功！", "/student/report/reportList");  

    }

    //筛选实验报告
    public function reportFilter()
    {
        //0.测试
        // dump($_POST);

    }

    //撰写实验报告页面
    public function editorPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("撰写实验报告页面");

        //1.获取guide
        //1.1构建模型
        $guideNo = input("get.guideNo");
        $guideModel = new guideModel();
        $guideWhere = "guideNo = '{$guideNo}'";

        //1.2获取guide
        $guide = $guideModel->where($guideWhere)->find();

        // dump($guide);
        //1.3获取文本
        $txtPath = $guide['txtPath'];
        // dump($txtPath);
        //读取文本
        if(file_exists($txtPath)){

            $fp= fopen($txtPath,"r");
            $txtContent = fread($fp,filesize($txtPath));//指定读取大小，这里把整个文件内容读取出来
            fclose($fp);
        }
        else {
            $txtContent = "";
        }

        $txtContent = str_replace("'", "\'", $txtContent);

        //2.渲染
        $this->assign("guide", $guide);
        $this->assign("txtContent", $txtContent);

        //3.后续操作
        return $this->fetch("reportEditor");

    }

    //撰写实验报告
    public function reportEditor()
    {
        //0.测试
        // dump($_POST);
        Log::record("撰写实验报告", "notice");

        //1.获取数据
        //1.1获取页面数据
        $studentNo = session("account");
        $teacherNo = input("post.teacherNo");
        $courseNo = input("post.courseNo");
        $taskNo = input("post.taskNo");
        $reportName = input("post.reportName");
        $reportContent = input("post.reportContent");

        //2.保存为txt文件
        //2.1构建TXT路径
        $time = time();
        $txtName = $time.".txt";
        $tempPath = "./uploads/file/report/".$txtName;
        // dump($txtPath);

        //2.2保存TXT
        $file_pointer = fopen($tempPath,"w");       
        fwrite($file_pointer,$reportContent);
        fclose($file_pointer);

        //3.构建模型
        $data = [
            'courseNo'      => $courseNo,
            'teacherNo'     => $teacherNo,
            'studentNo'     => $studentNo,
            'taskNo'        => $taskNo,
            'reportName'    => $reportName
        ];

        // dump($data);

        $reportModel = new reportModel();
        $report = $reportModel->create($data);

        if (empty($report)) {
            Log::record("创建实验报告失败！", "error");
            $this->error("创建实验报告失败！请稍后再试。", "/student/task/taskList");
        }

        //4.后续操作        
        //保存文本文件，并删除临时文件
        $reportNo = $report['reportNo'];//获取reportNo

        $txtPath = "./uploads/file/report/".$reportNo.".txt";
        copy($tempPath, $txtPath);//复制文件
        unlink($tempPath);//删除临时文件

        //更新数据库
        $reportModel->save([
            'txtPath'  => $txtPath
        ],['reportNo' => $reportNo]);

        $this->success("创建实验报告成功！", "/student/report/reportList");

    }

    //编辑实验报告页面
    public function updatePage()
    {
        //0.测试
        // dump($_GET);
        Log::record("编辑实验报告页面", "notice");

        //1.获取数据
        $reportNo = input("get.reportNo");
        $guideNo = input("get.guideNo");

        //2.获取report数据
        //2.1获取report对象
        $reportModel = new reportModel();
        $reportWhere = "reportNo = '{$reportNo}'";
        $report = $reportModel->where($reportWhere)->find();

        //2.2获取report文本
        $reportPath = $report['txtPath'];
        //2.2读取文本
        if(file_exists($reportPath)){

            $fp= fopen($reportPath,"r");
            $reportContent = fread($fp,filesize($reportPath));//指定读取大小，这里把整个文件内容读取出来
            fclose($fp);
        }
        else {
            $reportContent = "";
        }

        $reportContent = str_replace("'", "\'", $reportContent);

        //3.获取guide数据
        //3.1获取guide对象
        $guideModel = new guideModel();
        $guideWhere = "guideNo = '{$guideNo}'";
        $guide = $guideModel->where($guideWhere)->find();

        //3.2获取guide文本
        $guidePath = $guide['txtPath'];
        //2.2读取文本
        if(file_exists($guidePath)){

            $fp= fopen($guidePath,"r");
            $guideContent = fread($fp,filesize($guidePath));//指定读取大小，这里把整个文件内容读取出来
            fclose($fp);
        }
        else {
            $guideContent = "";
        }

        $guideContent = str_replace("'", "\'", $guideContent);

        //4.页面渲染
        $this->assign("report", $report);
        $this->assign("guide", $guide);
        $this->assign("reportContent", $reportContent);
        $this->assign("guideContent", $guideContent);

        //5.后续操作
        return $this->fetch("reportUpdate");

    }

    //实验报告编辑
    public function reportUpdate()
    {
        //0.测试
        // dump($_POST);
        Log::record("实验报告编辑", "notice");

        //1.获取文本
        $reportContent = input("post.reportContent");

        //2.保存为txt文件
        //2.1构建TXT路径
        $reportNo   = input("post.reportNo");
        $txtName = $reportNo.".txt";
        $txtPath = "./uploads/file/report/".$txtName;
        // dump($txtPath);

        //2.2保存TXT
        $file_pointer = fopen($txtPath,"w");       
        fwrite($file_pointer,$reportContent);
        fclose($file_pointer);

        //3.后续操作
        return $this->success("修改实验报告成功！", "/student/report/reportList");
    }
}
