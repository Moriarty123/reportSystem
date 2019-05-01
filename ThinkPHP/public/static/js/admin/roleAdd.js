function checkSubmit() {
	changeFunctions();
	return checkRoleName() && checkRoleDescribe() && checkPermission() && checkFunctions();
}

function checkRoleName() {
	var roleName = $("#roleName").val();
	if (roleName == "") {
		alert("请输入角色名!");
		return false;
	}
	return true;
}

function checkRoleDescribe() {
	var roleDescribe = $("#roleDescribe").val();
	if (roleDescribe == "") {
		alert("请输入角色描述!");
		return false;
	}
	return true;
}

function checkPermission() {
	var permission = $("#permission").val();
	if (permission == "") {
		alert("请输入权限号!");
		return false;
	}
	return true;
}

function checkFunctions() {
	var functionNos = $("#functionNos").val();
	if (functionNos == "") {
		alert("请选择角色权限!");
		return false;
	}
	return true;
}

function changeFunctions() {
	// var children = $('#functions').children();
	var values = "";
    $('#functions').children().each(
    	function() {
    		var success = $(this).attr('class');
    		if (success == "btn btn-primary btn-success") {
    			value = $(this).attr('value');
    			values += value;
    			values += ";";
    		}
    		$('#functionNos').attr('value', values);
    	}
    );
}