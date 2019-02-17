<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\student\model\Student as studentModel;
use app\student\model\Course as courseModel;
use app\student\model\Task as taskModel;
use app\student\model\Elective as electiveModel;

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
    	$electiveModel = new electiveModel();

    	$studentWhere = "a.studentNo = '$account'";
        $taskWhere = 'status = 1';

    	$taskList = $electiveModel	->alias('a')
                                    ->join('student b', 'a.studentNo = b.studentNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('course d', 'a.courseNo = d.courseNo')
                                    ->join('task e', 'e.courseNo = a.courseNo')
                                    ->where($taskWhere)
                                    ->where($studentWhere)
			    				    ->paginate(15);

		$taskNumber = $electiveModel->alias('a')
                                    ->join('student b', 'a.studentNo = b.studentNo')
                                    ->join('teacher c', 'a.teacherNo = c.teacherNo')
                                    ->join('course d', 'a.courseNo = d.courseNo')
                                    ->join('task e', 'e.courseNo = a.courseNo')
                                    ->where($taskWhere)
                                    ->where($studentWhere)
		    				        ->count();

    	//3.页面渲染
		$this->assign('taskList', $taskList);
		$this->assign('taskNumber', $taskNumber);

		return $this->fetch('taskList');
    }

    
}
