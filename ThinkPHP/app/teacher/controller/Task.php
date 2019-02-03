<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;

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

}
