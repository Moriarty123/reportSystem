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

    //模糊查找教师
    public function teacherSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找教师','notice');

        //1.获取数据
        $search = input('post.search');
        $account = session('account');

        //2.获取该账号教师的实验课程
        //2.1构造搜索条件
        if(!empty($search)) {
            
            // if (is_numeric($search)) {
            //     # code...
            // }
            session('teacherSearch', $search);
            $where['teacherName|teacherNo|sex|title|email|degree|phoneNum'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('teacherSearch');
            $where['teacherName|teacherNo|sex|title|email|degree|phoneNum'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的课程
        $teacherModel = new teacherModel();

        $teacherList = $teacherModel ->where($where)
                                     ->paginate(15);

        $teacherNumber = $teacherModel   ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('teacherList', $teacherList);
        $this->assign('teacherNumber', $teacherNumber);


        return $this->fetch('teacherList');
    }

    //删除教师
    public function teacherDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除教师", "notice");

        //1.获取teacherNo
        $teacherNo = input("get.teacherNo");
        $teacherWhere = "teacherNo = '{$teacherNo}'";
        $teacherModel = new teacherModel();
        $teacher = $teacherModel->where($teacherWhere)->find();

        if (empty($teacher) || $teacher == null) {
            Log::record("该教师不存在！", "error");
            $this->error("该教师不存在！", "/admin/teacher/teacherList");
        }

        $teacherModel->where($teacherWhere)->delete();

        $this->success("删除教师信息成功", "/admin/teacher/teacherList");
    }

    //批量删除
    public function checkedDelete()
    {
        //0.测试
        // dump($_POST);
        Log::record("批量删除教师信息", "notice");

        //1.获取teacherNo数组
        $teacherNos = input("teacherNo/a");

        // dump($teacherNos);

        //创建模型
        $teacherModel = new teacherModel();

        foreach ($teacherNos as $key => $no) {
           $teacherModel->destroy($no);
        }

        $this->success('删除成功！', '/admin/teacher/teacherList');
    }

    //教师详细信息
    public function detailPage()
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
        return $this->fetch("teacherDetail");
    }
}
