<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\report\reportReview.html";i:1554103251;s:35:"../app/common/view/html/header.html";i:1554052431;s:35:"../app/common/view/html/footer.html";i:1554052431;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>计算机学院实验报告在线撰写系统</title>
	<link rel="shortcut icon" href="/static/images/school.ico" />

	<link rel="stylesheet" href="/static/fontawesome-5.5.0/css/fontawesome.min.css" />
	<link rel="stylesheet" href="/static/fontawesome-5.5.0/css/all.css" />
	<link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

	<script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>
	<script type="text/javascript" src="/static/js/index/public.js"></script>
	<script type="text/javascript" src="/static/js/teacher/reportReview.js"></script>

	<link rel="stylesheet" href="/static/css/index/index.css" />
	<link rel="stylesheet" href="/static/css/common/common.css" />
	<link rel="stylesheet" href="/static/css/common/footer.css" />
	<link rel="stylesheet" href="/static/css/common/menu.css">
	<link rel="stylesheet" href="/static/css/common/detail.css">
	<link rel="stylesheet" href="/static/css/teacher/report.css" />
	<link rel="stylesheet" href="/static/css/teacher/display.css" />


	<link type="text/css" rel="Stylesheet" href="/static/xheditor/scp/scp.css"/>
	<link type="text/css" rel="stylesheet" href="/static/xheditor/scp/skygqbox.css" />
	<script type="text/javascript" src="/static/xheditor/scp/jquery-1.4.min.js"></script>
	<script type="text/javascript" src="/static/xheditor/scp/json2.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="/static/xheditor/xheditor-1.2.2/xheditor-1.2.2.min.js"></script>
	<script type="text/javascript" src="/static/xheditor/scp/skygqbox.js"></script>
	<script type="text/javascript" src="/static/xheditor/scp/scp.app.js" charset="utf-8"></script>
	<script type="text/javascript" src="/static/xheditor/scp/scp.edge.js" charset="utf-8"></script>
	<script type="text/javascript" src="/static/xheditor/scp/scp.js" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8" src="/static/xheditor/xheditor-1.2.2/xheditor_lang/zh-cn.js"></script>
	<style type="text/css">
		.scp{background: transparent url(/static/xheditor/scp/screencapture.gif) no-repeat; background-position:3px 2px;}
	</style>
</head>

<body>
	<!-- 头部开始-->
	<style type="text/css">
    
    a:hover {
        text-decoration: none;
    }
</style>


<!-- 头部 -->
<div class="head">
    <div class="headL">
        <img class="headLogo" src="/static/images/school.png" style="width: 100px; float: left;"/>
        <div class="titleDiv">
            <p class="title">计算机学院实验报告在线撰写系统</p>
        </div>
    </div>
    <div class="headR">

        <br />
        <div class="head_op">
            <?php if(\think\Session::get('user_id') == ''): ?>
            <a href="/index/index/login" >【登录】</a>
            <?php else: ?>
            <span>欢迎你，</span>
            <a href="" >【<?php echo \think\Session::get('account'); ?>】</a>
            <a href="/index/login/logout" >【安全退出】</a>
            <?php endif; ?>
            <a href="/index/index/toIndex">【首页】</a>
            <a href="/index/index/index">【转到后台】</a>
        </div>
    </div>
</div>
<!-- 头部结束 -->
	<!-- 头部结束-->


	<!--课程列表开始-->
	<div id="MainForm" style="width: 1250px; height: 800px;margin:30px 50px 30px 50px;">
		<div class="form_boxA">
			<div class="a" style="position: relative; left: 0px; top: 0px;">
				<h2>批阅实验报告</h2>
				<input type="hidden" name="reportNo" value="<?php echo $reportNo; ?>">
				<div style="width: 100px; float: right; margin-right: 30px;margin-top: 20px; ">
					<select onchange="window.location=this.value">
						<option>--其他操作--</option>
						<option>同步数据</option>
					</select>
				</div>

			</div>
			<div>
				<form action="/teacher/report/reportReview" method="post" onsubmit="return checkSubmit();">
					<div style="width:620px; height: 665px; float: left;border:1px solid #CCC;">

						<input type="hidden" name="reportNo" value="<?php echo $reportNo; ?>">
						<div class="list" style="padding: 15px;">
							<label style="font-size:20px">教师评语：</label>
							<textarea class="input" id="evaluation" style="width:600px; height: 100px; " name="reviewComment"></textarea>
						</div>

						<div class="list" style="padding: 15px;">
							<label style="font-size:20px">分数：</label>
							<div style="width: 600px; margin-top: 10px; " id="scoreDiv">

								<?php if($report['reviewType'] == '1'): ?>
								<input type="text" name="score" style="width: 600px;" id="score" onkeypress="keyPress(this);" onkeyup="keyUp(this);" onblur="onblur(this);">
								<?php else: ?>
								<select name="score" style="width: 560px;">
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
								</select>
								<?php endif; ?>
							</div>
						</div>
						<div class="ButtonDiv" style="width: 560px;" class="list">
							<!-- <input type="submit" name="预览" class="Button" style="float: left;margin-right: 5px;" value="预览"> -->
							<input type="submit" name="提交" class="Button" style="float: left;" value="提交">
						</div>

					</div>
					<div style="width: 620px; height: 665px; float: right;">
						<textarea name="reportContent" id="reportContent" rows="12" cols="80" style="width:620px;height:665px;" ></textarea>
						<div id="scpPanel"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--课程列表结束-->

	<!-- 清除浮动 -->
	<div style="clear: both;"></div>

	<!-- 底部开始-->
	<!-- 底部开始 -->
<footer>
    <div class="footer-body">
        <div class="footer">
            <font class="footerText"><string>© 2018 DGUT All Rights Reserved</string></font>
        </div>
    </div>
</footer>
<!-- 底部结束 -->
	<!-- 底部结束-->

</body>
</html>

<!-- 筛选框开始-->
<script type="text/javascript">
	
	$(document).ready(function(){
		$("#submitedFilter").click(function(){
			$("#submitedFilterDiv").slideToggle();
		});

		$("#reviewedFilter").click(function(){
			$("#reviewedFilterDiv").slideToggle();
		});

		//实验课程筛选
		$("#courseFilter").change(function() {
			var courseNo = $("#courseFilter  option:selected").val();//获取实验课程No

			$("#courseFilterNo").val(courseNo);//填写表单
			$("#courseFilterForm").submit();//提交表单
		});
	});

	
</script>
<!-- 筛选框结束 -->

<script type="text/javascript" language="javascript">
		//1.xheditor设置
		var editor;
		$(pageInit);

		function pageInit()
		{
			var allPlugin = {
				scp: { c: 'scp', t: '截屏', e: function () { scpMgr.Capture(); } }
			};
			editor = $('#reportContent').xheditor(
			{
				plugins: allPlugin, 
				tools: 'Copy,Align,Outdent,Indent,Source,Fullscreen',
				upBtnText: '上传', 
				upLinkUrl:"upload.php",
				upLinkExt:"zip,rar,txt",
				upImgUrl:"http://reportsystem/upload.aspx",
				upImgExt:"jpg,jpeg,gif,png",
				upFlashUrl:"upload.php",
				upFlashExt:"swf",
				upMediaUrl:"upload.php",
				upMediaExt:"avi",
				html5Upload:false,
				readOnly:true
			});  
			editor.setSource('<?php echo $txtContent; ?>');
		}

		//2.scp(截图)设置
		var scpMgr = new CaptureManager();
		scpMgr.Config["PostUrl"] = "http://reportsystem/upload.php";
		scpMgr.event.postComplete = function (url) {
            // url = str_replace("../../", "./", url);
            // alert(url);
            url = url.substring(1)
            // alert(url);
            var img = '<img src="' + url + '"/>';
            editor.appendHTML(img);
        };
        scpMgr.loadAuto();
    </script>

<script type="text/javascript">
	function checkScoreData() {
		var score = $('#score').val();
		var r = /^([1]?\d{1,2})$/;　　//0-100的正整数  
		if(!r.test(score)){
			alert('填写的分数必须0-100的正整数 ');
			return false;
		}

		return true;
	}
</script>