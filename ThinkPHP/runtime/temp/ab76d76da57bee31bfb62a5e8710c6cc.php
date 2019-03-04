<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\report\reportReviewPage.html";i:1551450545;}*/ ?>
<link rel="stylesheet" type="text/css" href="/static/css/common/common.css">
<link rel="stylesheet" type="text/css" href="/static/css/common/detail.css">
<link rel="stylesheet" type="text/css" href="/static/css/teacher/reportReview.css">

<script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>
<script type="text/javascript" src="/static/js/teacher/reportReview.js"></script>

<div class="reviewDiv">
	<form action="/teacher/report/reportReview" method="post" onsubmit="return checkSubmit();">
		<input type="hidden" name="reportNo" value="<?php echo $reportNo; ?>">
		<div class="list">
			<label>实验报告评价</label>
			<textarea class="input" id="evaluation" style="height: 100px; " name="reviewComment"></textarea>
		</div>
		<div class="list">
			<label style="font-size: 20px;">评分方式</label>
			<select class="input" id="scoreSelect">
				<option>百分制</option>
				<option>五分制</option>
			</select>
		</div>
		<div class="list">
			<label>分数</label>
			<div style="width: 560px; margin-top: 10px; " id="scoreDiv">
				<input type="text" name="score" style="width: 560px;" id="score" onkeypress="keyPress(this);" onkeyup="keyUp(this);" onblur="onblur(this);">
			</div>
		</div>
		<div class="ButtonDiv" style="width: 560px;" class="list">
			<input type="submit" name="保存" class="Button" style="float: left; margin-right: 5px;">
			<input type="submit" name="提交" class="Button" style="float: left;">
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#scoreSelect").change(function(){
			changeScoreSelect();
		});
	});

</script>