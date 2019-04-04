function checkSubmit() {
	return checkTeacherNo() && checkName() && checkEmail() && checkPhoneNum();
}

function checkTeacherNo() {
	
	if ($("#teacherNo").val() == "") {
		alert("职工号不能为空！");
		return false;
	}

	var reg = /^[0-9]*$/;
	if (!reg.test($("#teacherNo").val())) {
		alert("请输入正确的职工号");
		return false;
	}
	else {
		return true;
	}
}

function checkEmail(){
　　
　　if ($("#email").val() == "") {
		alert("邮箱不能为空！");
		return false;
	}

	var reg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/; //正则表达式
	if (!reg.test($("#email").val())) {
		alert("请输入正确的邮箱");
		return false;
	}
	else {
		return true;
	}
}

function checkPhoneNum() {

	if ($("#phoneNum").val() == "") {
		alert("手机号码不能为空！");
		return false;
	}

	var reg = /^1[3-578]\d{9}$/; //正则表达式
	if (!reg.test($("#phoneNum").val())) {
		alert("请输入正确的手机号");
		return false;
	}
	else {
		return true;
	}
}

function checkName() {
	
	if ($("#teacherName").val() == "") {
		alert("教师姓名不能为空！");
		return false;
	}
	return true;
}