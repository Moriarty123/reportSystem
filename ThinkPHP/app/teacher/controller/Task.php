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


}
