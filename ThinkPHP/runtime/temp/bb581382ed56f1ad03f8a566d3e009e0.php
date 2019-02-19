<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/student\view\report\reportPage.html";i:1550564761;}*/ ?>
<link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="/static/css/student/reportPage.css">
<link rel="stylesheet" href="/static/css/common/common.css">
<link rel="stylesheet" href="/static/css/common/detail.css">

<script type="text/javascript" src="/static/js/wangEditor/wangEditor.js"></script>
<script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>

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

    testRequire.create();
    testAnalysis.create();
    testContent.create();
    testScreen.create();
    testCode.create();
    testSummary.create();

</script>

<script type="text/javascript">
	//一般情况下，onblur事件只在input等元素中才有，而div却没有，因为div没有tabindex属性，所以要给div加上此属性。定义tabindex属性后，元素是默认会加上焦点虚线的，那么在IE中可以通过hidefocus="true"去除！其他浏览器通过outline=0进行去除！
	$(document).ready(function(){
	    $(".w-e-text").attr('tabindex',0);
	    $(".w-e-text").attr('hidefocus','true');
	    $(".w-e-text").css('outline',0);
	});

	function checkSubmit() {
		if (
			checkReportName() == true &&
			checkTestRequire() == true &&
			checkTestAnalysis() == true &&
			checkTestContent() == true &&
			checkTestScreen() == true &&
			checkTestCode() == true &&
			checkTestSummary() == true
			) {
			return true;
		}
		else {
			return false;
		}
	}

	//名称校验
	function checkReportName() {
	    $reportName = $("#reportName").val();

	    if($reportName == "") {
	        alert("实验报告名称不能为空");
	        return false;
	    }
	    else {
	        return true;
	    }
	}

	//实验要求校验
	function checkTestRequire() {
		$testRequire = $("#testRequire .w-e-text").html();

		if ($testRequire == "<p><br></p>") {
			alert("实验要求不能为空！");
			return false;
		}
		else {
			$("#require").val($testRequire);
			return true;
		}
	}

	//实验分析校验
	function checkTestAnalysis() {
		$testAnalysis = $("#testAnalysis .w-e-text").html();

		if ($testAnalysis == "<p><br></p>") {
			alert("实验分析不能为空！");
			return false;
		}
		else {
			$("#analysis").val($testAnalysis);
			return true;
		}
	}

	//实验内容校验
	function checkTestContent() {
		$testContent = $("#testContent .w-e-text").html();

		if ($testContent == "<p><br></p>") {
			alert("实验内容不能为空！");
			return false;
		}
		else {
			$("#content").val($testContent);
			return true;
		}
	}

	//实验截图校验
	function checkTestScreen() {
		$testScreen = $("#testScreen .w-e-text").html();

		if ($testScreen == "<p><br></p>") {
			alert("实验截图不能为空！");
			return false;
		}
		else {
			$("#screen").val($testScreen);
			return true;
		}
	}

	//实验代码校验
	function checkTestCode() {
		$testCode = $("#testCode .w-e-text").html();

		if ($testCode == "<p><br></p>") {
			alert("实验代码不能为空！");
			return false;
		}
		else {
			$("#code").val($testCode);
			return true;
		}
	}

	//实验总结校验
	function checkTestSummary() {
		$testSummary = $("#testSummary .w-e-text").html();

		if ($testSummary == "<p><br></p>") {
			alert("实验总结不能为空！");
			return false;
		}
		else {
			$("#summary").val($testSummary);
			return true;
		}
	}
</script>
