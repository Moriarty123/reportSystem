<?php
namespace app\teacher\controller;

use think\Controller;
use think\Db;

use app\common\controller\Common;

class Chart extends controller
{
	// 首页
    public function index()
    {
        $info = Db::table('goods')->select();
        //var_dump($info);
        $this->assign('info',$info);
        return $this->fetch('index');
    }

    public function getData()
    {
    	$data = [
    		$categories => ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"],
            $data => [5, 20, 36, 10, 10, 20]
        ];
    	return json($data);
    }

}
