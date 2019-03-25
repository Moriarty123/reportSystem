<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\report\reportReviewPage.html";i:1553516099;}*/ ?>
<link rel="stylesheet" type="text/css" href="/static/css/common/common.css">
<link rel="stylesheet" type="text/css" href="/static/css/common/detail.css">
<link rel="stylesheet" type="text/css" href="/static/css/teacher/reportReview.css">

<script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>
<script type="text/javascript" src="/static/js/teacher/reportReview.js"></script>

<style type="text/css">
	body {
		background: #E2E2E2;
	}
</style>

<div class="reviewDiv" style="">
	<form action="/teacher/report/reportReview" method="post" onsubmit="return checkSubmit();">
		<input type="hidden" name="reportNo" value="<?php echo $reportNo; ?>">
		<div class="list">
			<label>实验报告评价</label>
			<textarea class="input" id="evaluation" style="height: 100px; " name="reviewComment"></textarea>
		</div>
	
		<div class="list">
			<label>分数</label>
			<div style="width: 560px; margin-top: 10px; " id="scoreDiv">
				
				<?php if($report['reviewType'] == '1'): ?>
				<input type="text" name="score" style="width: 560px;" id="score" onkeypress="keyPress(this);" onkeyup="keyUp(this);" onblur="onblur(this);">
				<?php else: ?>
				<select name="score" style="width: 560px;">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
				</select>
				<?php endif; ?>
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