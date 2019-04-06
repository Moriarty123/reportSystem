function checkSubmit() {
	return checkNo() && checkName() && checkInstitute() && checkMajor() && checkGrade() && checkClasses();
}

function checkNo() {
	var studentNo = $("#studentNo").val();

	if (studentNo == "") {
		alert("学生学号不能为空！");
		return false;
	}
	
	var reg = /^[0-9]*$/;
	if (!reg.test($("#studentNo").val())) {
		alert("请输入正确的学号");
		return false;
	}
	else {
		return true;
	}
}

function checkName() {
	var studentName = $("#studentName").val();
	// alert(studentName);
	if (studentName == "") {
		alert("学生姓名不能为空");
		return false;
	}
	else {
		return true;
	}
}

function checkInstitute() {
	var institute = $("#institute").val();

	if (institute == "-1") {
		alert("未选择学院");
		return false;
	}
	else {
		return true;
	}
}

function checkMajor() {
	var major = $("#major").val();

	if (major == "-1") {
		alert("未选择专业");
		return false;
	}
	else {
		return true;
	}
}

function checkGrade() {
	var grade = $("#grade").val();

	if (grade == "-1") {
		alert("未选择年级");
		return false;
	}
	else {
		return true;
	}
}

function checkClasses() {
	var classes = $("#classes").val();

	if (classes == "-1") {
		alert("未选择班级");
		return false;
	}
	else {
		return true;
	}
}
