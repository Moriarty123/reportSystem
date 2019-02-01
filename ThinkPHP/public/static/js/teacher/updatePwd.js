function Bepwd(){
	var pwd = document.getElementsByName("bepwd")[0];
	pwd.style.border = "1px solid #a9a9a9";
}

function checkBepwd(){
	var pwd = document.getElementsByName("bepwd")[0];
	if(pwd.value.match( /(?!^\d+$)(?!^[A-Za-z]+$)(?!^_+$)^\w{6,16}$/ )){
		pwd.style.border = "1px solid #a9a9a9";
		document.getElementById('tip-bepwd').style.display = 'none';
		return true;
	}
	else{
		pwd.style.border = "1px solid #e71304";
		document.getElementById('tip-bepwd').style.display = 'block';
		return false;
	}
}

function Pwd(){
	var pwd = document.getElementsByName("pwd")[0];
	pwd.style.border = "1px solid #a9a9a9";
}

function checkPwd(){
	var pwd = document.getElementsByName("pwd")[0];
	if(pwd.value.match( /(?!^\d+$)(?!^[A-Za-z]+$)(?!^_+$)^\w{6,16}$/ )){
		pwd.style.border = "1px solid #a9a9a9";
		document.getElementById('tip-pwd').style.display = 'none';
		return true;
	}
	else{
		pwd.style.border = "1px solid #e71304";
		document.getElementById('tip-pwd').style.display = 'block';
		return false;
	}
}

function Repwd(){
	var repwd = document.getElementsByName("repwd")[0];
	repwd.style.border = "1px solid #a9a9a9";
}

function checkRepwd(){
	var repwd = document.getElementsByName("repwd")[0];
	var newpwd = document.getElementsByName("pwd")[0].value;
	if(newpwd != "" && repwd.value != "" && newpwd == repwd.value){
		repwd.style.border = "1px solid #a9a9a9";
		document.getElementById('tip-repwd').style.display = 'none';
		return true;
	}
	else{
		repwd.style.border = "1px solid #e71304";
		document.getElementById('tip-repwd').style.display = 'block';
		return false ;
	}
}

function checkUser(){
	if(checkPwd() == true && checkRepwd() == true){
		return true;
	}
	return false;
}
