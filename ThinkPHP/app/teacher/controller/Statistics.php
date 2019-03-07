<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

class Statistics extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //显示学生成绩分布
    public function scoreShow()
    {
    	//0.测试
    	dump($_POST);
    	Log::record("显示学生成绩分布", "notice");
    }

}
