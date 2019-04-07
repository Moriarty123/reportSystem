<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\admin\model\Institute as instituteModel;
use app\admin\model\Grade as gradeModel;
use app\admin\model\Major as majorModel;
use app\admin\model\Classes as classModel;

class Institute extends Common
{
    
	// 首页
    public function index()
    {
        //0.测试
        // dump();
        Log::record("显示学院年级专业班级");

        //1.获取teacherList
        $instituteModel = new instituteModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classModel = new classModel();

        $instituteList = $instituteModel->alias("a")->join("institute b", "a.instituteNo = b.instituteNo")->select();
        $gradeList = $gradeModel->select();
        $majorList = $majorModel->select();
        $classList = $classModel->select();

        //2.渲染页面
        $this->assign("instituteList", $instituteList);
        $this->assign("gradeList", $gradeList);
        $this->assign("majorList", $majorList);
        $this->assign("classList", $classList);

        return $this->fetch('index');
    }

    //删除学院
    public function instituteDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除学院", "notice");

        $instituteModel = new instituteModel($_GET);
        $instituteModel->delete();

        $this->redirect("/admin/institute/index");
    }

    //添加学院
    public function instituteAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加学院", "notice");

        $instituteModel = new instituteModel($_POST);
        $instituteModel->allowField(true)->save();

         $this->redirect("/admin/institute/index");
    }


    //删除年级
    public function gradeDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除年级", "notice");

        $gradeModel = new gradeModel($_GET);
        $gradeModel->delete();

        $this->redirect("/admin/institute/index");
    }

    //添加年级
    public function gradeAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加年级", "notice");

        $gradeModel = new gradeModel($_POST);
        $gradeModel->allowField(true)->save();

         $this->redirect("/admin/institute/index");
    }

    //删除专业
    public function majorDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除专业", "notice");

        $majorModel = new majorModel($_GET);
        $majorModel->delete();

        $this->redirect("/admin/institute/index");
    }

    //添加专业
    public function majorAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加专业", "notice");

        $majorModel = new majorModel($_POST);
        $majorModel->allowField(true)->save();

         $this->redirect("/admin/institute/index");
    }


    //删除班级
    public function classDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除班级", "notice");

        $classModel = new classModel($_GET);
        $classModel->delete();

        $this->redirect("/admin/institute/index");
    }

    //添加班级
    public function classAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加班级", "notice");

        $classModel = new classModel($_POST);
        $classModel->allowField(true)->save();

         $this->redirect("/admin/institute/index");
    }

}
