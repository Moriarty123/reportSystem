<?php
namespace app\teacher\controller;

use think\Controller;

use app\common\controller\Common;
use app\teacher\model\Menu as menuModel;
use app\teacher\model\Functions as functionsModel;

class Index extends controller
{
	// 首页
    public function index()
    {    
    	//0.测试
        //0.1获取左侧菜单
        $common = new Common();
        $menus = $common->getMenu();
        $this->assign("menus", $menus);

        return $this->fetch('index');
    }

}
