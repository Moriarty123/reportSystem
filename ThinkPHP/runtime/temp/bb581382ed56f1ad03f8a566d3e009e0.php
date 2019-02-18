<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/student\view\report\reportPage.html";i:1550483117;}*/ ?>
<link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="/static/css/student/reportPage.css">
<link rel="stylesheet" href="/static/css/common/common.css">
<link rel="stylesheet" href="/static/css/common/detail.css">

<script type="text/javascript" src="/static/js/wangEditor/wangEditor.js"></script>

<div class="reportAddDiv">
	<form action="" method="post" onsubmit="return checkSubmit()">
		<div class="add-list">
			<label>实验报告名称：</label>
			<input type="text" id="reportName" name="reportName" class="test-text">
		</div>
		<!-- <div class="add-list">
			<label>实验课程：</label>
			<input type="text" id="reportName" name="reportName" class="test-text">
		</div> -->
		<!-- <div class="add-list">
			<label>指导老师：</label>
			<div id="teacher" name="testAim" class="test-text">
			</div>
			<input type="hidden" id="aim" name="aim">
		</div> -->
		<!-- <div class="add-list">
			<label>实验报告作者：</label>
			<div id="testEnvironment" class="test-text">
			</div>
			<input type="hidden" id="environment" name="environment">
		</div> -->
		<div class="add-list">
			<label>实验要求：</label>
			<div id="testRequire" class="test-text">
			</div>
			<input type="hidden" id="require" name="testRequire">
		</div>
		<div class="add-list">
			<label>实验分析：</label>
			<div id="testAnalysis" class="test-text">
			</div>
			<input type="hidden" id="content" name="content">
		</div>
		<div class="add-list">
			<label>实验内容：</label>
			<div id="testContent" class="test-text">
			</div>
			<input type="hidden" id="task" name="task">
		</div>
		<div class="add-list">
			<label>实验截图：</label>
			<div id="testScreen" class="test-text">
			</div>
			<input type="hidden" id="content" name="content">
		</div>
		<div class="add-list">
			<label>实验代码：</label>
			<div id="testCode" class="test-text">
			</div>
			<input type="hidden" id="content" name="content">
		</div>
		<div class="add-list">
			<label>实验总结：</label>
			<div id="testSummary" class="test-text">
			</div>
			<input type="hidden" id="content" name="content">
		</div>
		<div class="ButtonDiv submitDiv">
			<input type="submit" class="Button" name="save" value="保存" >
			<input type="submit" class="Button" name="submit" value="提交">
		</div>
	</form>
</div>

<!-- 创建编辑器 -->
<!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
<script type="text/javascript">
    var E = window.wangEditor

    var testRequire = new E('#testRequire');
    var testAnalysis = new E('#testAnalysis');
    var testContent = new E('#testContent');
    var testScreen = new E('#testScreen');
    var testCode = new E('#testCode');
    var testSummary = new E('#testSummary');

    testRequire.create();
    testAnalysis.create();
    testContent.create();
    testScreen.create();
    testCode.create();
    testSummary.create();

</script>
