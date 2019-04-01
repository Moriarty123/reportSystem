<?php
namespace app\teacher\controller;

use think\Controller;

use app\common\controller\Common;

class Test extends controller
{
	// 首页
    public function index()
    {
        return $this->fetch('test');
    }

    public function img()
    {
    	return $this->fetch('img');
    }

}
