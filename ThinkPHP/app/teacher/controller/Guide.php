<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;

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


}
