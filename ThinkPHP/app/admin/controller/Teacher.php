<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

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
        $teacherList = $teacherModel->order("teacherNo asc")->paginate(15);
        $teacherNumber = $teacherModel->count();

        $this->assign('teacherList', $teacherList);
        $this->assign('teacherNumber', $teacherNumber);

        return $this->fetch("teacherList");
    }

    //教师信息修改页面
    public function editPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("教师信息修改页面", "notice");

        //1.获取教师信息
        $teacherNo = input("get.teacherNo");
        $teacherWhere = "teacherNo = '{$teacherNo}'";
        $teacherModel = new teacherModel();

        $teacher = $teacherModel->where($teacherWhere)->find();

        if (empty($teacher)) {
            Log::record("不存在该教师！", "notice");
            $this->error("不存在该教师！", "/admin/teacher/teacherList");
        }
        // dump($teacher);

        //2.渲染
        $this->assign("teacher", $teacher);

        //3.后续操作
        return $this->fetch("teacherEdit");
    }

    //教师信息修改
    public function teacherEdit()
    {
        //0.测试
        // dump($_POST);
        Log::record("教师信息修改", "notice");

        //1.获取数据
        $teacherNo = input("post.teacherNo");
        $teacherName = input("post.teacherName");
        $title = input("post.title");
        $degree = input("post.degree");
        $email = input("post.email");
        $phoneNum = input("post.phoneNum");
        $sex = input("post.sex");
        $headImg = input("post.headImg");

        if ($headImg == "") {
            $headImg = "/uploads/default/headImg.jpg";
        }

        $data = [
            'teacherName' => $teacherName,
            'title' => $title,
            'degree' => $degree,
            'email' => $email,
            'phoneNum' => $phoneNum,
            'sex' => $sex,
            'headImg' => $headImg
        ];

        // dump($data);

        //2.保存到数据库
        $teacherModel = new teacherModel();
        $teacherWhere = "teacherNo = '{$teacherNo}'";
        $teacher = $teacherModel->update($data, $teacherWhere);

        if (empty($teacher)) {
            Log::record("修改教师信息失败！", "error");
            $this->error("修改教师信息失败！请稍后再试。", "/admin/teacher/teacherList");
        }

        //3.后续操作
        $this->success("修改教师信息成功！", "/admin/teacher/teacherList");
    }

    //添加教师页面
    public function addPage()
    {
        //0.测试
        Log::record("添加教师页面", "notice");

        return $this->fetch("teacherAdd");
    }

    //添加教师
    public function teacherAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加教师页面", "notice"); 

        //1.获取数据
        $teacherNo = input("post.teacherNo");
        $teacherName = input("post.teacherName");
        $title = input("post.title");
        $degree = input("post.degree");
        $email = input("post.email");
        $phoneNum = input("post.phoneNum");
        $sex = input("post.sex");
        $headImg = input("post.headImg");

        if ($headImg == "") {
            $headImg = "/uploads/default/headImg.jpg";
        }


        //1.2 判断teacherNo是否存在
        $teacherModel = new teacherModel();
        $teacherWhere = "teacherNo = '{$teacherNo}'";
        $teacher = $teacherModel->where($teacherWhere)->find();

        // dump($teacher);
        if (!empty($teacher) || $teacher != null) {
            Log::record("该职工号已存在！", "notice");
            $this->error("该职工号已存在！", "/admin/teacher/addPage");
        }

        //2. 构造数据
        $data = [
            'teacherNo' => $teacherNo,
            'teacherName' => $teacherName,
            'title' => $title,
            'degree' => $degree,
            'email' => $email,
            'phoneNum' => $phoneNum,
            'sex' => $sex,
            'headImg' => $headImg,
            'roleNo' => 1,
            'password' => md5('dgut'.$teacherNo),
            'createTime' => time()
        ];

        $teacher = $teacherModel->create($data);

        if (empty($teacher) || $teacher == null) {
            Log::record("添加教师失败！", "notice");
            $this->error("添加教师失败！请稍后再试", "/admin/teacher/addPage");
        }

        //3. 后续操作
        $this->success("添加教师成功！", "/admin/teacher/teacherList");

    }
}
