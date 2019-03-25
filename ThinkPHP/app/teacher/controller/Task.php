<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Course as courseModel;
use app\teacher\model\Task as taskModel;
use app\teacher\model\Guide as guideModel;

class Task extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //实验任务列表
    public function taskList()
    {
    	Log::record('显示实验任务列表','notice');

    	//1.获取账号
    	$account = session('account');

    	//2.获取该账号教师的实验任务
    	$teacherModel = new teacherModel();

    	$where = "a.teacherNo = '$account'";

    	$taskList = $teacherModel	->task()
    								->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
			    				    ->paginate(15);

		$taskNumber = $teacherModel ->task()
									->where($where)
                                	->alias('a')
                                	->join('course b', 'a.courseNo = b.courseNo')
		    				        ->count();

    	//3.页面渲染
		$this->assign('taskList', $taskList);
		$this->assign('taskNumber', $taskNumber);

		return $this->fetch('taskList');
    }

    //查看实验任务
    public function courseTask()
    {
        //0.测试
        // dump($_GET);

        Log::record('显示实验任务列表','notice');

        //1.获取账号
        $account = session('account');
        $courseNo = input('get.courseNo');

        //2.获取该账号教师的实验任务
        $teacherModel = new teacherModel();

        $where = "a.teacherNo = '$account' and b.courseNo = '$courseNo'";

        $taskList = $teacherModel   ->task()
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->paginate(15);

        $taskNumber = $teacherModel ->task()
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->count();

        //3.页面渲染
        $this->assign('taskList', $taskList);
        $this->assign('taskNumber', $taskNumber);

        return $this->fetch('taskList');
    }

    // //显示实验任务细节
    // public function taskDetail() 
    // {
    //     //0.测试
    //     // dump($_GET);
    //     Log::record("显示实验任务细节", "notice");

    //     //1.获取页面数据
    //     $taskNo = input("get.taskNo");
    //     $taskWhere = "taskNo = '{$taskNo}'";

    //     //2.获取task
    //     $taskModel = new taskModel();
    //     $task = $taskModel->where($taskWhere)
    //                         ->alias("a")
    //                         ->join("course b", "a.courseNo = b.courseNo")
    //                         ->find();

    //     //3.页面渲染
    //     $this->assign("task", $task);

    //     return $this->fetch("taskDetail");
    // }

    //模糊查找实验任务
    public function taskSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找实验任务','notice');

        //1.获取数据
        $search = input('post.search');
        $account = session('account');

        //2.获取该账号教师的实验实验指导
        //2.1构造搜索条件
        if(!empty($search)) {
            session('taskSearch', $search);
            $where['taskName'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('taskSearch');
            $where['taskName'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的实验指导
        $teacherModel = new teacherModel();

        $teacherNoWhere = "a.teacherNo = '$account'";

        $guideList = $teacherModel ->task()
                                    ->where($where)
                                    ->where($teacherNoWhere)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    ->paginate(15);

        $guideNumber = $teacherModel    ->task()
                                        ->where($where)
                                        ->where($teacherNoWhere)
                                        ->alias('a')
                                        ->join('course b', 'a.courseNo = b.courseNo')
                                        ->count();

        //3.页面渲染
        $this->assign('taskList', $guideList);
        $this->assign('taskNumber', $guideNumber);


        return $this->fetch('taskList');

    }

    //添加实验任务页面
    public function addPage()
    {
        Log::record('添加实验任务页面', 'notice');

        //获取课程
        $courseModel = new courseModel();

        $teacherNo = session('account');
        $where = "teacherNo = '$teacherNo'";
        $courseList = $courseModel->where($where)->select();

        $this->assign('courseList', $courseList);

        return $this->fetch('taskAdd');
    }

    //添加实验任务
    public function taskAdd()
    {
        //0.测试
        // dump($_POST);
        // $shijian=str_replace("T"," ",$_POST['startTime']);
        // dump($shijian);
        // dump(strtotime($shijian));
        Log::record('添加实验任务', 'notice');

        //1.获取数据
        $teacherNo  = session('account');
        $taskName   = input('post.taskName');
        $courseNo   = input('post.courseNo');
        $startTime   = input('post.startTime');
        $endTime  = input('post.endTime');
        $describe   = input('post.taskDescribe');

        //格式转换
        $startTime = str_replace("T"," ",$startTime);
        $startTime = strtotime($startTime);
        $endTime = str_replace("T"," ",$endTime);
        $endTime = strtotime($endTime);

        $data = [
            'teacherNo'     => $teacherNo,
            'taskName'      => $taskName,
            'courseNo'      => $courseNo,
            'startTime'      => $startTime,
            'endTime'     => $endTime,
            'taskDescribe'  => $describe,
        ];
        // dump($data);

        //2.保存到数据库
        $taskModel = new taskModel();
        $taskModel->data($data);
        $taskModel->save();
        // dump($taskModel->taskNo);

        //3.跳转到实验任务列表页面
        $this->redirect('/teacher/task/taskList');
    }

    //发布实验任务
    public function taskPublish()
    {
        //0.测试
        // dump($_GET);
        Log::record('发布实验任务', 'notice');

        //获取taskNo
        $taskNo = input('get.taskNo');

        //判断是否设置实验指导
        $taskModel = new taskModel();
        $where = "taskNo = '$taskNo'";
        $task = $taskModel->where($where)->find();
        $guideNo = $task['guideNo'];

        if (empty($guideNo)) {
            Log::record('未设置实验指导！', 'error');
            $this->error('未设置实验指导！', '/teacher/task/taskList');
        }

        //修改发布状态
        $data = [
            'status' => 1
        ];

        $update = $taskModel->update($data, $where);

        if (empty($update)) {
            Log::record('发布实验指导失败！', 'error');
            $this->error('发布实验指导失败！请稍后再试。', '/teacher/task/taskList');
        }

        //发布成功
        $this->success('发布实验指导成功！', '/teacher/task/taskList');

    }

    // //实验任务删除(软删除)
    // public function taskDelete()
    // {
    //     //0.测试
    //     // dump($_POST);
    //     Log::record("实验课程删除");

    //     $taskNo = input("post.taskNo/a");

    //     //创建模型
    //     $taskModel = new taskModel();

    //     foreach ($taskNo as $key => $no) {
    //        $res = $taskModel->destroy($no);
    //     }

    //     $this->success('删除成功！', '/teacher/task/taskList');
    // }

    //实验任务删除(软删除)
    public function taskDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("实验课程删除");

        $taskNo = input("get.taskNo");

        //创建模型
        $taskModel = new taskModel();

        $res = $taskModel->destroy($taskNo);
    

        $this->success('删除成功！', '/teacher/course/courseMenu');
    }

    //编辑实验任务页面
    public function editPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("编辑实验任务页面", "notice");


        //1.获取taskNo 
        $teacherNo = session("account");
        $teacherWhere = "teacherNo = '{$teacherNo}'";

        $taskNo = input("get.taskNo");

        if ($taskNo == "" || empty($taskNo)) {
            
        }

        //2.获取task
        $taskWhere = "taskNo = '{$taskNo}'";
        $taskModel = new taskModel();
        $task = $taskModel->where($teacherWhere)->where($taskWhere)->find();

        // dump($task);

        //3.获取courseList
        $courseModel = new courseModel();
        $courseList = $courseModel->where($teacherWhere)->select();

        //4.获取guideList
        $guideModel = new guideModel();
        $guideList = $guideModel->where($teacherWhere)->select();

        //5.渲染
        $this->assign("task", $task);
        $this->assign("courseList", $courseList);
        $this->assign("guideList", $guideList);

        return $this->fetch("taskEdit");
    }

    //实验任务详细页面
    public function detailPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("详细实验任务页面", "notice");


        //1.获取taskNo 
        $teacherNo = session("account");
        $teacherWhere = "teacherNo = '{$teacherNo}'";

        $taskNo = input("get.taskNo");

        if ($taskNo == "" || empty($taskNo)) {
            
        }

        //2.获取task
        $taskWhere = "taskNo = '{$taskNo}'";
        $taskModel = new taskModel();
        $task = $taskModel->where($teacherWhere)->where($taskWhere)->find();

        // dump($task);

        //3.获取courseList
        $courseModel = new courseModel();
        $courseList = $courseModel->where($teacherWhere)->select();

        //4.获取guideList
        $guideModel = new guideModel();
        $guideList = $guideModel->where($teacherWhere)->select();

        //5.渲染
        $this->assign("task", $task);
        $this->assign("courseList", $courseList);
        $this->assign("guideList", $guideList);

        return $this->fetch("taskDetail");
    }

    //实验任务操作
    public function taskDetail()
    {
        //0.测试
        // dump($_POST);
        Log::record("实验任务操作", "notice");

        //1.判断操作方式
        $edit = input("post.edit");
        $delete = input("post.delete");
        $taskNo = input("post.taskNo");
        $taskWhere = "taskNo = '{$taskNo}'";

        if ($edit != "" || !empty($edit)) {
            $this->redirect("/teacher/task/editPage?taskNo={$taskNo}");
        }

        if ($delete != "" || empty($delete)) {
            $this->redirect("/teacher/task/taskDelete?taskNo={$taskNo}");   
        }

    }

    //编辑实验任务
    public function taskEdit()
    {
        //0.测试
        // dump($_POST);
        Log::record("编辑实验任务");


        //1.获取数据
        //1.1获取页面数据
        $teacherNo  = session('account');
        $taskNo = input('post.taskNo');
        $taskName   = input('post.taskName');
        $courseNo   = input('post.courseNo');
        $startTime   = input('post.startTime');
        $endTime  = input('post.endTime');
        $taskImg = input('post.taskImg');
        $guideNo = input('post.guideNo');
        $describe   = input('post.taskDescribe');

        //1.2默认值
        if ($taskImg == "" || empty($taskImg)) {
            $taskImg = "/uploads/default/taskImg.jpg";
        }

        if ($guideNo == "" || empty($guideNo)) {
            $guideNo = null;
        }

        //1.3格式转换
        $startTime = str_replace("T"," ",$startTime);
        $startTime = strtotime($startTime);
        $endTime = str_replace("T"," ",$endTime);
        $endTime = strtotime($endTime);

        //2.设置修改数据
        $data = [
            'teacherNo'     => $teacherNo,
            'taskName'      => $taskName,
            'courseNo'      => $courseNo,
            'startTime'     => $startTime,
            'endTime'       => $endTime,
            'taskImg'       => $taskImg,
            'guideNo'       => $guideNo,
            'taskDescribe'  => $describe,
        ];

        // dump($data);

        //3.修改数据
        $taskWhere = "taskNo = '{$taskNo}'";

        $taskModel = new taskModel();
        $task = $taskModel->update($data, $taskWhere);


        if (empty($task)) {
            Log::record('编辑实验任务失败！', 'error');
            $this->error('编辑实验任务失败！请稍后再试。', '/teacher/course/courseMenu');
        }


        //4.后续操作
        return $this->success("编辑实验任务成功！", "/teacher/course/courseMenu");
    }

}
