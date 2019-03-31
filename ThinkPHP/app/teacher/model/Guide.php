<?php
namespace app\teacher\model;

use think\Model;
use traits\model\SoftDelete;

use app\teacher\model\Task as taskModel;

class Guide extends Model
{
    use SoftDelete;//使用软删除

    protected $autoWriteTimeStamp = true;//自动写入时间戳
    protected $createTime = "createTime";//创建时间字段
    protected $updateTime = "updateTime";//更新时间字段
    protected $deleteTime = "deleteTime";//删除时间字段

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
