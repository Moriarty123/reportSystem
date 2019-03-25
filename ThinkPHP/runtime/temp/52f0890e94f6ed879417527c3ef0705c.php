<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\course\courseList.html";i:1553358396;s:35:"../app/common/view/html/header.html";i:1553414474;s:36:"../app/teacher/view/common/menu.html";i:1553495316;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/common/buttons.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/course.css" />
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

    <!-- 左边菜单开始-->
    

<div class="container" style="margin-top:20px; height: 500px;">
	<div class="leftsidebar_box">
		<dl class="system_log">
			<dt>
				<i class="fas fa-home a"></i>
					<a href="/teacher/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
			</dt>
		</dl>
		<!--实验任务开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-users  a"></i>
					实验任务
				<i class="fas fa-angle-down   b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/course/courseList">课程列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/course/courseMenu">实验任务</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/task/addPage">发布任务</a>
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
			<div class="a">
				<h2>实验课程列表</h2>
				<form action="/teacher/course/courseSearch" method="post" onsubmit="return checkSearch()" class="searchform">
					<input type="text" class="search" placeholder="课程名" name="search" />
					<input type="submit" class="search_button" value="搜索" />
				</form>
				<div style="width: 100px; float: right; margin-right: 20px;margin-top: 20px; ">
					<div class="btn-group">
						<button type="button" class="btn" style="background:#19a97b; color: #FFF;">其他</button>
						<button type="button" id="regButton" class="btn dropdown-toggle" style="background:#19a97b" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
							<span style="color: #FFF;" class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" id="selectMenu">
							<li><a href="#">同步数据</a></li>
						</ul>
					</div>
				</div>
			</div>
			<form action="/teacher/course/courseDelete" method="post">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th style="width: 30px;"><input type="checkbox" name="fullChoose" onclick="fullChecked(this)" /></th>
					<th style="width:100px;">课程编号</th>
					<th>课程名称</th>
					<th style="width: 80px;">任课老师</th>
					<th style="width: 220px;">任课班级</th>
					<th style="position: relative; top:0px; left:0px;">
						任课时间
						<span id="termFilter">
							<i class="fa fa-filter" title="筛选"></i>
						</span>
						<div id="termFilterDiv" class="termFilterDiv" >
							<form >
								<div class="termFilterRadio" style="text-align: left;">	
									<label><input name="term" type="radio"/>本学期</label>
								</div>
								<div class="termFilterRadio" style="text-align: left;">
									<label><input name="term" type="radio"/>之前学期</label>
								</div>
								<div>
									<input type="submit" name="" class="submit">
									<input type="reset" name="" class="reset">
								</div>
							</form>
						</div>
					</th>
					<th style="width: 80px;">课程类型</th>
					<th style="width: 80px;">实验课时</th>
					<th style="width: 80px;">考查方式</th>
					<th style="width: 80px;">操作</th>
				</tr>
				<?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td style="width: 30px;"><input type="checkbox" name="courseNo[]/a" onclick="eachChecked()" class="eachChoose" value="<?php echo $vo['courseNo']; ?>"/></td>
					<td><?php echo $vo['courseNo']; ?></td>
					<td><?php echo $vo['courseName']; ?></td>
					<td><?php echo $vo['teacherName']; ?></td>
					<td><?php echo $vo['courseGrade'].'级'.$vo['courseMajor'].$vo['courseClass']; ?>班</td>
					<td><?php echo $vo['openTime']; ?></td>
					<td><?php echo $vo['courseNature']; ?></td>
					<td><?php echo $vo['coursePeriod']; ?></td>
					<td><?php echo $vo['examType']; ?></td>
					<td>
						<a href="/teacher/task/courseTask?courseNo=<?php echo $vo['courseNo']; ?>">
							<i class="fa fa-eye" title="查看实验任务"></i>
						</a>
						<a href="/teacher/course/studentList?courseNo=<?php echo $vo['courseNo']; ?>" style='margin-left: 5px;'>
							<i class="fa fa-user-graduate" title="查看学生"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<p class="msg">
				<span id="notdisplay" style="display: none;"></span>
				<input type="submit" value="删除选中" class="delBtn" id="delBtn" disabled="disabled" onclick='return checkdel();'/>
				共找到<?php echo $courseNumber; ?>条课程信息，每页显示15条记录
			</p>
			<div class="" style="text-align: center;margin-bottom:20px; ">
			<?php echo $courseList->render(); ?>
			</div>
			</form>
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

<script type="text/javascript">
	$(document).ready(function(){
		$("#regButton").click(function(){
			$("#selectMenu").toggle();
		});
	});
</script>
