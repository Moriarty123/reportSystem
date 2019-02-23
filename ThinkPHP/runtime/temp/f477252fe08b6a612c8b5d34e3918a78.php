<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\report\reportList.html";i:1550937015;s:35:"../app/common/view/html/header.html";i:1549160695;s:36:"../app/teacher/view/common/menu.html";i:1549943010;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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
    

<div class="container" style="margin-top:20px; height: 400px;">
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
					实验课程
				<i class="fas fa-angle-down   b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/teacher/course/courseList">实验课程列表</a>
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
				<a href="/admin/order/orderList" class="cks">学生成绩</a>
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
			<div class="a" style="position: relative; left: 0px; top: 0px;">
				<h2>实验指导列表</h2>
				<div style="position: absolute; left: 150px; top: 33px;">
					<select>
						<option>--请选择实验课程--</option>
						<?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?>
						<option><?php echo $course['courseName']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				
				<form action="/teacher/report/reportSearch" method="post" onsubmit="return checkSearch()" class="searchform">
					<input type="text" class="search" placeholder="实验报告名称" name="search" />
					<input type="submit" class="search_button" value="搜索" />
				</form>
				<div style="width: 100px; float: right; margin-right: 30px;margin-top: 20px; ">
					<select onchange="window.location=this.value">
						<option>--其他操作--</option>
						<option>同步数据</option>
					</select>
				</div>
			</div>
			<form action="/admin/user/checkedUserDelete" method="post">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th>实验课程</th>
					<th>实验任务</th>
					<th>实验报告</th>
					<th>提交学生</th>
					<th style="position: relative; top:0px; left:0px;">
						提交状态
						<span id="submitedFilter">
							<i class="fa fa-filter" title="筛选"></i>
						</span>
						<div id="submitedFilterDiv" class="submitedFilterDiv" >
							<form >
								<div class="submitedFilterRadio" style="margin-left: 5px;">	
									<label><input name="submited" type="radio"/>未提交</label>
								</div>
								<div class="submitedFilterRadio" style="margin-left: 5px;">
									<label><input name="submited" type="radio"/>已提交</label>
								</div>
								<div>
									<input type="submit" name="" class="submit" value="确定">
									<input type="reset" name="" class="reset" value="重置">
								</div>
							</form>
						</div>
					</th>
					<th style="position: relative; top:0px; left:0px;">
						批阅状态
						<span id="reviewedFilter">
							<i class="fa fa-filter" title="筛选"></i>
						</span>
						<div id="reviewedFilterDiv" class="reviewedFilterDiv" >
							<form >
								<div class="reviewedFilterRadio" style="margin-left: 5px;">	
									<label><input name="reviewed" type="radio"/>未批阅</label>
								</div>
								<div class="reviewedFilterRadio" style="margin-left: 5px;">
									<label><input name="reviewed" type="radio"/>已批阅</label>
								</div>
								<div>
									<input type="submit" name="" class="submit" value="确定">
									<input type="reset" name="" class="reset" value="重置">
								</div>
							</form>
						</div>
					</th>
					<th>提交时间</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($reportList) || $reportList instanceof \think\Collection || $reportList instanceof \think\Paginator): $i = 0; $__LIST__ = $reportList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $vo['courseName']; ?></td>
					<td><?php echo $vo['taskName']; ?></td>
					<td><?php echo $vo['reportName']; ?></td>
					<td><?php echo $vo['studentName']; ?></td>
					<td><?php echo $vo['submitStatus']; ?></td>
					<td><?php echo $vo['reviewStatus']; ?></td>
					<td><?php echo date("Y-m-d h:m:s",$vo['submitTime']); ?></td>
					<td>
						<a href="">
							<i class="fa fa-eye" title="查看"></i>
						</a>
					
						<a href="" style='margin-left: 5px;'>
							<i class="fa fa-edit" title="编辑"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<p class="msg">
				共找到<?php echo $reportNumber; ?>条课程信息，每页显示15条记录
			</p>
			<div class="" style="text-align: center;margin-bottom:20px; ">
			<?php echo $reportList->render(); ?>
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
  		$("#submitedFilter").click(function(){
  			$("#submitedFilterDiv").slideToggle();
		});

		$("#reviewedFilter").click(function(){
  			$("#reviewedFilterDiv").slideToggle();
		});
	});
</script>
<!-- 筛选框结束 -->
