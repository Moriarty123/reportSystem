<?php
namespace app\teacher\model;

use think\Model;

use app\teacher\model\Task as taskModel;

class Guide extends Model
{
    //
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
