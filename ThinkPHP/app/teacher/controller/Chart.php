<?php
namespace app\teacher\controller;

use think\Controller;

use app\common\controller\Common;

class Chart extends controller
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

}
