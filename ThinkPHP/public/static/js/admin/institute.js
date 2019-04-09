function checkInstituteName() {
	var instituteName = $("#instituteName").val();

	if (instituteName == "") {
		alert("学院名称不能为空！");
		return false;
	}

	return true;
}

function checkGrade() {
	var grade = $("#grade").val();

	if (grade == "") {
		alert("年级不能为空！");
		return false;
	}

	return true;
}

function checkMajoreName() {
	var majorName = $("#majorName").val();

	if (majorName == "") {
		alert("专业名称不能为空！");
		return false;
	}

	return true;
}

function checkClassName() {
	var className = $("#className").val();

	if (className == "") {
		alert("班级不能为空！");
		return false;
	}

	return true;
}