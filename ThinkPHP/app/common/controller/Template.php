<?php
namespace app\common\controller;

use think\Controller;

class Template extends Controller
{
	//index
	public function index()
	{
		return $this->fetch("success");
	}

}
