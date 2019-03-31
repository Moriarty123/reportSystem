<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\report\reportReview.html";i:1553518658;s:35:"../app/common/view/html/header.html";i:1553414474;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/report.css" />
    <link rel="stylesheet" href="/static/css/teacher/display.css" />
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
				<iframe src="/teacher/report/reportReviewPage?reportNo=<?php echo $reportNo; ?>" style="width: 600px; height: 800px; float: left; background: #FFF;" frameborder="0"></iframe>
				<iframe src="/teacher/report/reportShow?reportNo=<?php echo $reportNo; ?>" style="width: 650px; height: 800px; float: left; " frameborder="0"></iframe>
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

<script type="text/javascript">
function del(){
	return window.confirm("你确认要删除该实验报告吗？");
}
function checkdel(){
	return window.confirm("你确认要删除选中的实验报告吗？");
}

</script>

