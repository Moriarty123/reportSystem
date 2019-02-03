<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Report as reportModel;

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

        $reportModel = new reportModel();

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
                                    ->join('report c', 'a.teacherNo = c.teacherNo')
                                    ->join('student d', 'c.studentNo = d.studentNo')
                                    ->join('task e', 'a.taskNo = e.taskNo')
			    				        ->count();

    	//3.页面渲染
		$this->assign('reportList', $reportList);
		$this->assign('reportNumber', $reportNumber);

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
            session('Reportearch', $search);
            $where['ReportName'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('Reportearch');
            $where['ReportName'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的实验报告
        $teacherModel = new teacherModel();

        $teacherNoWhere = "teacherNo = '$account'";

        $ReportList = $teacherModel ->Report()
                                    ->where($teacherNoWhere)
                                    ->where($where)
                                    ->paginate(15);

        $ReportNumber = $teacherModel   ->Report()
                                        ->where($teacherNoWhere)
                                        ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('ReportList', $ReportList);
        $this->assign('ReportNumber', $ReportNumber);


        return $this->fetch('ReportList');

    }


}
