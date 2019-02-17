function checkSubmit()
{
	if(
		checkName() == true && 
		checkCourse() == true && 
		checkStartTime() == true &&
		checkEndTime() == true &&  
		checkDescribe() == true)
	{
		return true;
	}
	else {
		return false;
	}
}

//名称校验
function checkName()
{
	$taskName = $('#taskName').val();
	
	if($taskName == '') {
		alert("实验任务名称不能为空！");
		return false;
	}
	else {
		return true;
	}
}

//课程校验
function checkCourse()
{
	$courseNo = $('#courseNo').val();
	
	if($courseNo == '-1') {
		alert("未选择实验课程！");
		return false;
	}
	else {
		return true;
	}
}

//开始时间校验
function checkStartTime()
{
	$startTime = $('#startTime').val();
	
	if ($startTime == '') {
		alert('未设置开始时间！');
		return false;
	}
	else {
		return true;
	}
	
}

//结束时间校验
function checkEndTime()
{
	$endTime = $('#endTime').val();
	
	if ($endTime == '') {
		alert('未设置结束时间！');
		return false;
	}
	else {
		return true;
	}
	
}

//描述校验
function checkDescribe()
{
	$taskDescribe = $('#taskDescribe').val();
	
	if($taskDescribe == '') {
		alert("任务描述不能为空！");
		return false;
	}
	else {
		return true;
	}
}