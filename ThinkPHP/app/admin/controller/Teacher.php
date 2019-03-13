<?php
namespace app\admin\controller;

use think\Controller;

use app\common\controller\Common;

use app\admin\model\Teacher as teacherModel;

class Teacher extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //教师列表
    public function teacherList()
    {
        //0.测试
        // dump($_POST);

        $teacherModel = new teacherModel();
        $teacherList = $teacherModel->paginate(15);
        $teacherNumber = $teacherModel->count();

        $this->assign('teacherList', $teacherList);
        $this->assign('teacherNumber', $teacherNumber);

        return $this->fetch("teacherList");
    }
}
