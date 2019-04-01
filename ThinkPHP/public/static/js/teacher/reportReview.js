//改变评分方式
	function changeScoreSelect() {
		$text = $("#scoreSelect").find("option:selected").text();
		$input = $("#scoreDiv");

		if ($text == "百分制") {
			$html = "<input type='text' name='score' style='width: 560px;' id='score' onkeypress='keyPress(this);' onkeyup='keyUp(this);' onblur='onblur(this);'>";
			$input.html($html);
		}
		else if($text == "五分制"){
			$html = "<select name='score' style='width: 560px;' id='score'><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option></select>";
			$input.html($html);
		}		
	}

	//数字校验
	function keyPress(ob) {
	 if (!ob.value.match(/^[\+\-]?\d*?\.?\d*?$/)) ob.value = ob.t_value; else ob.t_value = ob.value; if (ob.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?)?$/)) ob.o_value = ob.value;
	}
	function keyUp(ob) {
	 if (!ob.value.match(/^[\+\-]?\d*?\.?\d*?$/)) ob.value = ob.t_value; else ob.t_value = ob.value; if (ob.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?)?$/)) ob.o_value = ob.value;
	        }
	function onBlur(ob) {
	if(!ob.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?|\.\d*?)?$/))ob.value=ob.o_value;else{if(ob.value.match(/^\.\d+$/))ob.value=0+ob.value;if(ob.value.match(/^\.$/))ob.value=0;ob.o_value=ob.value};
	}


	//评价校验
	function checkEvaluation() {
		$evaluation = $("#evaluation").val();

		if ($evaluation == "") {
			alert("实验报告评价不能为空！");
			return false;
		}
		else {
			return true;
		}
	}

	//分数校验
	function checkScore() {
		$score = $("#score").val();

		if ($score == "") {
			alert("请输入实验分数。");
			return false;
		}
		else {
			return true;
		}
	}

	function checkScoreData() {
		var score = $('#score').val();

		var r = /^100|([1-9]?\d)(\.\d+)?$/;　　//0-100的正整数  
		if(!r.test(score)){
			alert('填写的分数必须0-100的正整数 ');
			return false;
		}

		return true;
	}

	//提交校验
	function checkSubmit() {
		return checkScoreData() && checkEvaluation() && checkScore();
	}
