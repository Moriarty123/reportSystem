<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\admin\model\Student as studentModel;

class Student extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //学生列表
    public function studentList()
    {
        //0.测试
        // dump($_POST);

        $studentModel = new studentModel();
        $studentList = $studentModel->paginate(15);
        $studentNumber = $studentModel->count();

        $this->assign('studentList', $studentList);
        $this->assign('studentNumber', $studentNumber);

        return $this->fetch("studentList");
    }

    //模糊查找学生
    public function studentSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找学生','notice');

        //1.获取数据
        $search = input('post.search');

        //2.获取学生列表
        //2.1构造搜索条件
        if(!empty($search)) {
            session('studentSearch', $search);
            $where['studentName|studentNo|sex|insititutes|major|grade|classes|roleNo'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('studentSearch');
            $where['studentName|studentNo|sex|insititutes|major|grade|classes|roleNo'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的学生
        $studentModel = new studentModel();

        $studentList = $studentModel ->where($where)
                                     ->paginate(15);

        $studentNumber = $studentModel  ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('studentList', $studentList);
        $this->assign('studentNumber', $studentNumber);

        return $this->fetch('studentList');
    }

    //删除学生信息
    public function studentDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除学生信息", "notice");

        //1.获取teacherNo
        $studentNo = input("get.studentNo");
        $studentWhere = "studentNo = '{$studentNo}'";
        $studentModel = new studentModel();
        $student = $studentModel->where($studentWhere)->find();

        if (empty($student) || $student == null) {
            Log::record("该学生不存在！", "error");
            $this->error("该学生不存在！", "/admin/student/studentList");
        }

        $studentModel->where($studentWhere)->delete();

        $this->success("删除学生信息成功", "/admin/student/studentList");
    }
}
