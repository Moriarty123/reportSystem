function checkSubmit() {
	// var f1 = checkCourseName();
	// var f2 = checkTeacherNo();
	// var f3 = checkGrade();
	// var f4 = checkMajor();
	// var f5 = checkClasses();
	// var f6 = checkCoursePeriod();
	// var f7 = checkTestPeriod();
	// var f8 = checkOpenTime();
	// var f9 = checkCredit();

	// alert(f1&&f5);

	return checkCourseName() && checkTeacherNo() &&checkGrade() &&checkMajor() && checkClasses() && checkCoursePeriod() && checkTestPeriod() && checkOpenTime() && checkCredit();
}

function checkCourseName() {
	var courseName = $("#courseName").val();

	if (courseName == "") {
		alert("实验课程名称不能为空！'");
		return false;
	}

	return true;
}

function checkTeacherNo() {
	var teacherNo = $("#teacherNo").val();
	// alert(teacherNo);
	if (teacherNo == "-1") {
		alert("未选择任课老师'");
		return false;
	}

	return true;
}

function checkGrade() {
	var grade = $("#grade").val();

	if (grade == "-1") {
		alert("未选择任课年级'");
		return false;
	}

	return true;
}

function checkMajor() {
	var major = $("#major").val();

	if (major == "-1") {
		alert("未选择任课专业'");
		return false;
	}

	return true;
}

function checkClasses() {
    var isChecked = $(".checkBox").is(':checked');
    if (isChecked == false) {
    	alert("未选择任课班级");
    	return false;
    }

    return true;
}

function checkCoursePeriod() {
	var coursePeriod = $("#coursePeriod").val();

	if (coursePeriod == "") {
		alert("理论课时不能为空！");
		return false;
	}
	
	var reg = /^[0-9]*$/;
	if (!reg.test($("#coursePeriod").val())) {
		alert("理论课时为正整数");
		return false;
	}
	else {
		return true;
	}
}

function checkTestPeriod() {
	var testPeriod = $("#testPeriod").val();

	if (testPeriod == "") {
		alert("实验课时不能为空！");
		return false;
	}
	
	var reg = /^[0-9]*$/;
	if (!reg.test($("#testPeriod").val())) {
		alert("实验课时为正整数");
		return false;
	}
	else {
		return true;
	}
}

function checkOpenTime() {
	var openTime = $("#openTime").val();

	if (openTime == "") {
		alert("开课时间不能为空！");
		return false;
	}
	
	return true;
}

function checkCredit() {
	var credit = $("#credit").val();

	if (credit == "") {
		alert("课程学分不能为空！");
		return false;
	}
	
	var reg = /^[0-9]+([.]{1}[0-9]{1,2})?$/;
	if (!reg.test($("#credit").val())) {
		alert("课程学分为1位小数");
		return false;
	}
	else {
		return true;
	}
}