function checkSubmit() {
	return checkName() && checkInstitute() && checkMajor() && checkGrade() && checkClasses();
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
