<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/student\view\report\reportPage.html";i:1551939337;}*/ ?>
<link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="/static/css/student/reportPage.css">
<link rel="stylesheet" href="/static/css/common/common.css">
<link rel="stylesheet" href="/static/css/common/detail.css">

<script type="text/javascript" src="/static/js/wangEditor/wangEditor.js"></script>
<script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>

<script type="text/javascript" src="/static/js/student/reportPage.js"></script>

<div class="reportAddDiv">
	<form action="/student/report/reportAdd" method="post" onsubmit="return checkSubmit()">
		<div class="add-list">
			<label>实验课程：<?php echo $guide['courseName']; ?></label>
			<input type="hidden" id="courseName" name="courseNo" value="<?php echo $guide['courseNo']; ?>">
		</div>
		<div class="add-list">
			<label>指导老师：<?php echo $guide['teacherName']; ?></label>
			<input type="hidden" id="teacherNo" name="teacherNo" value="<?php echo $guide['teacherNo']; ?>">
		</div>
		
		<div class="add-list">
			<label>实验报告作者：<?php echo $student['studentName']; ?></label>
			<input type="hidden" id="studentNo" name="studentNo" value="<?php echo $student['studentNo']; ?>">
		</div>
		<div class="add-list">
			<label>实验任务：<?php echo $guide['taskName']; ?></label>
			<input type="hidden" id="taskNo" name="taskNo" value="<?php echo $guide['taskNo']; ?>">
		</div>
		<div class="add-list">
			<label>实验报告名称：</label>
			<input type="text" id="reportName" name="reportName" class="test-text">
		</div>
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
			<input type="hidden" id="analysis" name="testAnalysis">
		</div>
		<div class="add-list">
			<label>实验内容：</label>
			<div id="testContent" class="test-text">
			</div>
			<input type="hidden" id="content" name="testContent">
		</div>
		<div class="add-list">
			<label>实验截图：</label>
			<div id="testScreen" class="test-text">
			</div>
			<input type="hidden" id="screen" name="testScreen">
		</div>
		<div class="add-list">
			<label>实验代码：</label>
			<div id="testCode" class="test-text">
			</div>
			<input type="hidden" id="code" name="testCode">
		</div>
		<div class="add-list">
			<label>实验总结：</label>
			<div id="testSummary" class="test-text">
			</div>
			<input type="hidden" id="summary" name="testSummary">
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

    testRequire.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
    testAnalysis.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
    testContent.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
    testScreen.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
    testCode.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
    testSummary.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;

    testRequire.customConfig.uploadImgServer = "<?php echo url('/student/editor/upload'); ?>" ; // 上传图片到服务器
    testAnalysis.customConfig.uploadImgServer = "<?php echo url('/student/editor/upload'); ?>" ; // 上传图片到服务器
    testContent.customConfig.uploadImgServer = "<?php echo url('/student/editor/upload'); ?>" ; // 上传图片到服务器
    testScreen.customConfig.uploadImgServer = "<?php echo url('/student/editor/upload'); ?>" ; // 上传图片到服务器
    testCode.customConfig.uploadImgServer = "<?php echo url('/student/editor/upload'); ?>" ; // 上传图片到服务器
    testSummary.customConfig.uploadImgServer = "<?php echo url('/student/editor/upload'); ?>" ; // 上传图片到服务器

    testRequire.create();
    testAnalysis.create();
    testContent.create();
    testScreen.create();
    testCode.create();
    testSummary.create();

</script>

