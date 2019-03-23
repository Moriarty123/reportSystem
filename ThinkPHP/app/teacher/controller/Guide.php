<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Guide as guideModel;
use app\teacher\model\Course as courseModel;
use app\teacher\model\Task as taskModel;

class Guide extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //实验指导列表
    public function guideList()
    {
        //0.测试
        // dump($_POST);
        Log::record('显示实验指导列表','notice');

    	//1.获取账号
    	$account = session('account');

    	//2.获取该账号教师的实验实验指导
    	$teacherModel = new teacherModel();

    	$where = "a.teacherNo = '$account'";

    	$guideList = $teacherModel	->guide()
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    // ->join('task c', 'a.taskNo = c.taskNo')
			    				    ->paginate(15);

		$guideNumber = $teacherModel    ->guide()
                                        ->where($where)
                                        ->alias('a')
                                        ->join('course b', 'a.courseNo = b.courseNo')
                                        // ->join('task c', 'a.taskNo = c.taskNo')
			    				        ->count();

    	//3.页面渲染
		$this->assign('guideList', $guideList);
		$this->assign('guideNumber', $guideNumber);

		return $this->fetch('guideList');
    }

    //模糊查找实验指导
    public function guideSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找实验指导','notice');

        //1.获取数据
        $search = input('post.search');
        $account = session('account');

        //2.获取该账号教师的实验实验指导
        //2.1构造搜索条件
        if(!empty($search)) {
            session('guideearch', $search);
            $where['guideName'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('guideearch');
            $where['guideName'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的实验指导
        $teacherModel = new teacherModel();

        $teacherNoWhere = "teacherNo = '$account'";

        $guideList = $teacherModel ->guide()
                                    ->where($teacherNoWhere)
                                    ->where($where)
                                    ->paginate(15);

        $guideNumber = $teacherModel   ->guide()
                                        ->where($teacherNoWhere)
                                        ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('guideList', $guideList);
        $this->assign('guideNumber', $guideNumber);


        return $this->fetch('guideList');

    }

    //查看实验指导
    public function taskGuide()
    {
        //0.测试
        // dump($_GET);
        Log::record('查看实验指导','notice');

        //1.获取账号
        $account = session('account');
        $taskNo = input('get.taskNo');

        //2.获取该账号教师的实验实验指导
        $teacherModel = new teacherModel();

        $where = "a.teacherNo = '$account' and taskNo = '$taskNo'";

        $guideList = $teacherModel  ->guide()
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    // ->join('task c', 'a.taskNo = c.taskNo')
                                    ->paginate(15);

        $guideNumber = $teacherModel    ->guide()
                                        ->where($where)
                                        ->alias('a')
                                        ->join('course b', 'a.courseNo = b.courseNo')
                                        // ->join('task c', 'a.taskNo = c.taskNo')
                                        ->count();

        //3.页面渲染
        $this->assign('guideList', $guideList);
        $this->assign('guideNumber', $guideNumber);

        return $this->fetch('guideList');
    }

    //撰写实验指导页面
    public function addPage() 
    {
        Log::record('撰写实验指导页面', 'notice');

        $courseModel = new courseModel();
        $taskModel = new taskModel();

        $teacherNo = session('account');
        $courseWhere = "teacherNo = '$teacherNo'";
        $taskWhere = "teacherNo = '$teacherNo' and status = 0";

        $courseList = $courseModel->where($courseWhere)->select();
        $taskList = $taskModel->where($taskWhere)->select();

        $this->assign('courseList', $courseList);
        $this->assign('taskList', $taskList);

        return $this->fetch('guideAdd');
    }

    //添加实验指导
    public function guideAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record('添加实验指导','notice');

        //1.获取数据
        $courseNo           = input('post.courseNo');
        $taskNo             = input('post.taskNo');
        $guideName          = input('post.guideName');
        $testAim            = input('post.aim');
        $testEnvironment    = input('post.environment');
        $testRequire        = input('post.request');
        $testTask           = input('post.task');
        $testContent        = input('post.content');

        $teacherNo = session('account');
        $createTime = time();

        if ($taskNo = -1) {
            $taskNo = Null;
        }

        $data = [
            'teacherNo'         => $teacherNo,
            'courseNo'          => $courseNo,
            'taskNo'            => $taskNo,
            'guideName'         => $guideName,
            'testAim'           => $testAim,
            'testEnvironment'   => $testEnvironment,
            'testRequire'       => $testRequire,
            'testTask'          => $testTask,
            'testContent'       => $testContent,
            'createTime'        => $createTime
        ];

        // dump($data);

        //2.保存数据库
        $guideModel = new guideModel();

        $guide = $guideModel->create($data);
        $guideNo = $guide->guideNo;

        if (empty($guide)) {
            Log::record('添加实验指导失败！', 'error');
            $this->error('添加实验指导失败！请稍后再试。', '/teacher/guide/guideList');
        }
        //3.生成文件


        //4.后续操作
        //4.1更新task表
        if($taskNo != null) {
            $taskModel = new taskModel();
            $taskWhere = "taskNo = '$taskNo'";
            $task['guideNo'] = $guideNo;
            $taskModel->update($task,$taskWhere);
        }
        
        
        $this->success('添加实验指导成功', "teacher/guide/guideList");
    }

    //导入实验指导页面
    public function importPage()
    {
        Log::record('导入实验指导页面', 'notice');

        $courseModel = new courseModel();
        $taskModel = new taskModel();

        $teacherNo = session('account');
        $courseWhere = "teacherNo = '$teacherNo'";
        $taskWhere = "teacherNo = '$teacherNo' and status = 0";

        $courseList = $courseModel->where($courseWhere)->select();
        $taskList = $taskModel->where($taskWhere)->select();

        $this->assign('courseList', $courseList);
        $this->assign('taskList', $taskList);

        return $this->fetch('guideImport');
    }

    //导入实验指导
    public function guideImport()
    {
        //0.测试
        // dump($_POST);
        Log::record('导入实验指导', 'notice');

        //1.获取数据
        $courseNo   = input("post.courseNo");
        $taskNo     = input("post.taskNo");
        $guideName  = input("post.guideName");
        $filePath   = input("post.filePath");


        $teacherNo = session('account');
        $createTime = time();

        if ($taskNo = -1) {
            $taskNo = Null;
        }

        $data = [
            'courseNo'  => $courseNo,
            'taskNo'    => $taskNo,
            'guideName' => $guideName,
            'teacherNo' => $teacherNo,
            'filePath'  => $filePath,
            'createTime'=> $createTime
        ];

        // dump($data);

        //2.保存数据库
        $guideModel = new guideModel();

        $guide = $guideModel->create($data);
        $guideNo = $guide->guideNo;

        if (empty($guide)) {
            Log::record('添加实验指导失败！', 'error');
            $this->error('添加实验指导失败！请稍后再试。', '/teacher/guide/guideList');
        }
        //3.生成文件


        //4.后续操作
        //4.1更新task表
        if($taskNo != null) {
            $taskModel = new taskModel();
            $taskWhere = "taskNo = '$taskNo'";
            $task['guideNo'] = $guideNo;
            $taskModel->update($task,$taskWhere);
        }
        
        
        $this->success('添加实验指导成功', "teacher/guide/guideList");
    }

    //显示实验指导
    public function guideShow() 
    {
        //0.测试
        // dump($_GET);
        Log::record("显示实验指导", "notice");

        //1.获取该ID的实验指导
        $guideNo = input('get.guideNo');

        // dump($guideNo);

        if ($guideNo == "" || empty($guideNo)) {
            return $this->fetch("guideEmpty");
        }

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
        $this->redirect('teacher/guide/guideList');

    }

    //显示实验指导
    public function guideExport() 
    {
        //0.测试
        // dump($_GET);
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

        exportPdf($html);
        //2.跳转到实验指导列表
        $this->redirect('teacher/guide/guideList');

    }

    //编辑实验指导
    public function editPage()
    {
        //0.测试
        // dump($_GET);
        // Log::record('撰写实验指导页面', 'notice');

        //1.获取guideNo
        $guideNo = input('get.guideNo');

        //2.获取guide
        $guideModel = new guideModel();
        $courseModel = new courseModel();
        $taskModel = new taskModel();

        $teacherNo = session('account');
        $courseWhere = "teacherNo = '$teacherNo'";
        $taskWhere = "teacherNo = '$teacherNo' and status = 0";
        $guideWhere = "guideNo = '$guideNo'";

        $guide = $guideModel->where($guideWhere)->find();
        $courseList = $courseModel->where($courseWhere)->select();
        $taskList = $taskModel->where($taskWhere)->select();

        // dump($guide);

        //3.渲染页面
        $this->assign('courseList', $courseList);
        $this->assign('taskList', $taskList);
        $this->assign('guide', $guide);
        
        return $this->fetch('guideEdit');
    }

    //编辑实验指导
    public function guideEdit()
    {
        //0.测试
        // dump($_POST);
        Log::record('编辑实验指导','notice');

        //1.获取数据
        $guideNo            = input('post.guideNo');
        $courseNo           = input('post.courseNo');
        $taskNo             = input('post.taskNo');
        $guideName          = input('post.guideName');
        $testAim            = input('post.aim');
        $testEnvironment    = input('post.environment');
        $testRequire        = input('post.request');
        $testTask           = input('post.task');
        $testContent        = input('post.content');

        $teacherNo = session('account');
        $createTime = time();

        if ($taskNo == -1) {
            $taskNo = Null;
        }

        $data = [
            'teacherNo'         => $teacherNo,
            'courseNo'          => $courseNo,
            'taskNo'            => $taskNo,
            'guideName'         => $guideName,
            'testAim'           => $testAim,
            'testEnvironment'   => $testEnvironment,
            'testRequire'       => $testRequire,
            'testTask'          => $testTask,
            'testContent'       => $testContent,
            'createTime'        => $createTime
        ];

        // dump($data);

        //2.保存数据库
        $guideModel = new guideModel();

        $guideWhere = "guideNo = '$guideNo'";
        $guide = $guideModel->update($data, $guideWhere);


        if (empty($guide)) {
            Log::record('编辑实验指导失败！', 'error');
            $this->error('编辑实验指导失败！请稍后再试。', '/teacher/guide/guideList');
        }
        //3.生成文件


        //4.后续操作
        //4.1更新task表
        if($taskNo != null) {
            $taskModel = new taskModel();
            $taskWhere = "taskNo = '$taskNo'";
            $task['guideNo'] = $guideNo;
            $taskModel->update($task,$taskWhere);
        }
        
        
        $this->success('编辑实验指导成功', "teacher/guide/guideList");
    }

    //实验指导删除（软删除）
    public function guideDelete()
    {
        //0.测试
        // dump($_POST);
        Log::record("实验指导删除");

        $guideNo = input("post.guideNo/a");

        //创建模型
        $guideModel = new guideModel();

        foreach ($guideNo as $key => $no) {
           $guideModel->destroy($no);
        }

        $this->success('删除成功！', '/teacher/guide/guideList');
    }
}
