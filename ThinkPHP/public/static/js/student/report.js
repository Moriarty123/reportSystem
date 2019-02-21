
//一般情况下，onblur事件只在input等元素中才有，而div却没有，因为div没有tabindex属性，所以要给div加上此属性。定义tabindex属性后，元素是默认会加上焦点虚线的，那么在IE中可以通过hidefocus="true"去除！其他浏览器通过outline=0进行去除！
$(document).ready(function(){
    $(".w-e-text").attr('tabindex',0);
    $(".w-e-text").attr('hidefocus','true');
    $(".w-e-text").css('outline',0);
});

function checkSubmit() {
	if (
		checkTask() == true &&
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

//实验任务校验
function checkTask() {
    $taskNo = $("#taskNo").val();

    if($taskNo == "-1") {
        alert("请选择实验任务");
        return false;
    }
    else {
        return true;
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

