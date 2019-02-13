<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Guide as guideModel;
use app\teacher\model\Course as courseModel;

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
        Log::record('显示实验指导列表','notice');

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

        $teacherNo = session('account');
        $where = "teacherNo = '$teacherNo'";

        $courseList = $courseModel->where($where)->select();

        $this->assign('courseList', $courseList);

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
        $guideName          = input('post.guideName');
        $testAim            = input('post.aim');
        $testEnvironment    = input('post.environment');
        $testRequire        = input('post.request');
        $testTask           = input('post.task');
        $testContent        = input('post.content');

        $teacherNo = session('account');
        $createTime = time();

        $data = [
            'teacherNo'         => $teacherNo,
            'courseNo'          => $courseNo,
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

        $res = $guideModel->create($data);
        // dump($res);
        if (empty($res)) {
            Log::record('添加实验指导失败！', 'error');
            $this->error('添加实验指导失败！请稍后再试。', '/teacher/guide/guideList');
        }
        //3.生成文件


        //4.后续操作
        $guideNo = $res->guideNo;
        $this->success('添加实验指导成功', "/teacher/guide/guideShow?guideNo='$guideNo'");
    }

    //显示实验指导
    public function guideShow() 
    {
        //0.测试
        //dump($_GET);

        //1.获取该ID的实验指导
        $guideNo = input('get.guideNo');

        //创建guideModel,获取实验指导
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

        //创建courseModel,获取课程名称
        $where = "courseNo = '$courseNo'";
        $courseModel = new courseModel();
        $course = $courseModel->where($where)->find();
        $courseName = $course['courseName'];

        $html = 
            '实验指导名称：'.$guideName.'<br>'.
            '实验课程：'.$courseName.'<br>'.
            '实验目的：'.$testAim.'<br>'.
            '实验环境：'.$testEnvironment.'<br>'.
            '实验要求：'.$testRequire.'<br>'.
            '实验任务：'.$testTask.'<br>'.
            '实验内容：'.$testContent.'<br>';

        guidePdf($html);
        //2.数据


    }

    public function test()
    {
        
        guidePdf('<h1>hello world</h1>');
    }
}
