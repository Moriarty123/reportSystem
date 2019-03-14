<?php
namespace app\admin\controller;

use think\Controller;

use app\common\controller\Common;

use app\admin\model\Student as StudentModel;

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
}
