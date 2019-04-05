<?php
namespace app\admin\controller;

use think\Controller;

use app\common\controller\Common;

use app\admin\model\Role as roleModel;

class Role extends Common
{
    // 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //权限列表
    public function roleList()
    {
        //0.测试
        // dump($_POST);

        $roleModel = new roleModel();

        $roleList = $roleModel->select();
        
        $this->assign('roleList', $roleList);

        return $this->fetch("roleList");
    }
}
