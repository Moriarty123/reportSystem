<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\course\courseList.html";i:1553186397;s:35:"../app/common/view/html/header.html";i:1552919072;s:36:"../app/teacher/view/common/menu.html";i:1552924895;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>计算机学院实验报告在线撰写系统</title>
	<link rel="shortcut icon" href="/static/images/school.ico" />

	<link rel="stylesheet" href="/static/fontawesome-5.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/static/fontawesome-5.5.0/css/all.css" />
	<link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

	<script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>
	<script type="text/javascript" src="/static/js/index/public.js"></script>
	<script type="text/javascript" src="/static/js/common/checkBox.js"></script>

	<link rel="stylesheet" href="/static/css/index/index.css" />
	<link rel="stylesheet" href="/static/css/common/common.css" />
	<link rel="stylesheet" href="/static/css/common/footer.css" />
	<link rel="stylesheet" href="/static/css/common/menu.css">
	<link rel="stylesheet" href="/static/css/common/detail.css">
	<link rel="stylesheet" href="/static/css/teacher/course.css" />
	<link rel="stylesheet" href="/static/css/teacher/display.css" />
</head>

<style type="text/css">
	a {
		text-decoration: none;
	}
	.courseMenuDiv a {
		text-decoration:none;
		color: #666;
	}

	.courseMenuDiv a:active {
		color: #FFF;
	}

	.courseMenuDiv a:visited {
		color: #666;
	}

	.courseMenuDiv a:hover {
		border-radius: 15px;
		background: #08bf91;
		color: #FFF;
	}

	.courseMenuDiv {
		color: #666;
		border-radius: 0px;
	}

	.courseMenuDiv .courseMenu{
		margin-left: 10px;
	}



	.courseMenuDiv a{
		list-style:none; /* 将默认的列表符号去掉 */
		float: left; /* 往左浮动 */
		display: inline-block;
		margin: -5px 15px 10px 0;
		padding: 4px 10px;
		font-size: 15px;
		cursor: pointer;
	}

	/*任务开始*/
	.courseMenu {
		height: 40px; margin-top: 10px;
	}

	.courseMenu .courseLabel {
		float: left; margin-right: 10px; margin-left: 20px;
	}

	.taskMenu {
		height: 40px; margin-left: 10px;
	}

	.taskMenu .taskLabel {
		float: left; margin-right: 10px; margin-left: 20px;
	}

	
	.showDiv {
		margin: 60px auto; width: 1000px;margin-bottom: 30px;
	}

	.showDiv .taskDiv {
		width: 220px; height: 267px;position: relative; top: 0px; left: 0px; border:2px #66666626 solid; float: left; margin-right: 20px; margin-bottom: 30px;
	}

	.taskDescribe {
		position: absolute; bottom: 0px; width: 100%; height: 80px; background: #FFF;
	}
	.taskNameDiv {
		width: 100%; height: 40px;
	}
	.taskNameDiv p {
		font-weight: bold; text-align: center;padding-top:5px;
	}


	.footDiv {
		width: 100%; height: 40px; position: relative; top: 0px; left: 0px;
	}
	.footDiv .leftDiv {
		width: 80px; height: 100%; position: absolute; top: 0px; left: 0px;
	}
	.footDiv .rightDiv {
		width: 80px; height: 100%; position: absolute; top: 0px; right: 5px;
	}
	.footDiv .rightDiv p {
		border-radius: 5px; background: #ffae0f; color: #FFF; padding: 2px;   text-align: center;
	}
	/*任务结束*/
</style>
<body>
	<!-- 头部开始-->
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

	<!-- 左边菜单开始-->
	

<div class="container" style="margin-top:20px; height: 500px;">
	<div class="leftsidebar_box">
		<dl class="system_log">
			<dt>
				<i class="fas fa-home a"></i>
					<a href="/teacher/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
			</dt>
		</dl>
		<!--实验课程开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-users  a"></i>
					实验任务
				<i class="fas fa-angle-down   b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/course/courseMenu">实验任务</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验课程结束-->
		<!--实验任务开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-book-open a"></i>
					实验任务
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/task/taskList">实验任务列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/task/addPage">添加实验任务</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验任务结束-->
		<!--实验指导开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-comments a"></i>
					 实验指导
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/teacher/guide/guideList" class="cks">实验指导列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/teacher/guide/addPage" class="cks">撰写实验指导</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/teacher/guide/importPage" class="cks">导入实验指导</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验指导结束-->
		<!--批阅报告开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-reply a"></i>
					批阅报告
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/teacher/report/reportList" class="cks">实验报告列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--批阅报告结束-->
		<!--统计资料开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-file-invoice-dollar a"></i>
					统计资料
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/teacher/score/scoreShow" class="cks">学生成绩分布</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--统计资料结束-->
		

		
	</div>
</div>
	<!-- 左边菜单结束-->

	<!--课程列表开始-->


	<div id="MainForm">
		<div class="form_boxA">
			<div class="a courseMenuDiv">
				<div id="courseMenu" class="courseMenu">
					<label class="courseLabel">实验课程：</label>
					<a href="/teacher/course/courseMenu">全部</a>
					<?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?>
					<a href="/teacher/course/showTask?courseNo=<?php echo $course['courseNo']; ?>"><?php echo $course['courseName']; ?></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div id="taskMenu" class="taskMenu">
					<label class="taskLabel">实验任务：</label>
					<a href="/teacher/course/courseMenu">全部</a>
					<?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
					<a href="/teacher/course/showTaskDetail?taskNo=<?php echo $task['taskNo']; ?>"><?php echo $task['taskName']; ?></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			
		</div>
		<div style="">
			<div class="showDiv">
				<?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
				<div class="taskDiv">
					<img src="/static/images/task.jpg" style="width: 100%; ">
					<div class="taskDescribe">
						<div class="taskNameDiv">
							<p><?php echo $task['taskName']; ?></p>
						</div>
						<div class="footDiv">
							<div class="leftDiv">
								<a href="/teacher/course/studentList?courseNo=<?php echo $task['courseNo']; ?>" style='margin-left: 5px;'>
									<i class="fa fa-user-graduate" title="查看学生" style="padding: 6px;"></i>
								</a>
							</div>
							<div class="rightDiv">
								<a href="/teacher/task/courseTask">
									<p>实验指导</p>
								</i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
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
		$("#termFilter").click(function(){
			$("#termFilterDiv").slideToggle();
		});

		$("#operateSelect").change(function() {
			var value = $("#operateSelect").val();

			if (value == 2) {
				$(window).attr('location','/teacher/excel/courseExcel');
			}
			
		});
	});
</script>
<!-- 筛选框结束 -->

<script type="text/javascript">
	function del(){
		return window.confirm("你确认要删除该实验课程吗？");
	}
	function checkdel(){
		return window.confirm("你确认要删除选中的实验课程吗？");
	}

</script>