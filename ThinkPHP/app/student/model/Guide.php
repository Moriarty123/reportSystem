<?php
namespace app\student\model;

use think\Model;

use app\student\model\Task as taskModel;

class Guide extends Model
{
    //实验任务名称获取器
    public function getTaskNoAttr($value)
    {
    	if($value == null) {
    		return '';
    	}
    	else {
    		$taskModel = new taskModel();

    		$where = "taskNo = '$value'";
    		$task = $taskModel->where($where)->find();

    		return $task['taskName'];
    	}
    }
}
