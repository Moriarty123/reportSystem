<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\student\studentList.html";i:1552580929;s:35:"../app/common/view/html/header.html";i:1552491382;s:34:"../app/admin/view/common/menu.html";i:1552579795;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/common/display.css">
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
            <!-- <a href="/admin/login/index">【管理员登录】</a> -->
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
					教师管理
				<i class="fas fa-angle-down   b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/admin/teacher/teacherList">教师列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验课程结束-->
		<!--实验任务开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-book-open a"></i>
					学生管理
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/admin/student/studentList">学生列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验任务结束-->
		<!--实验指导开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-comments a"></i>
					 用户权限
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
				<h2>学生列表</h2>
				<form action="/teacher/course/courseSearch" method="post" onsubmit="return checkSearch()" class="searchform">
					<input type="text" class="search" placeholder="学生姓名" name="search" />
					<input type="submit" class="search_button" value="搜索" />
				</form>
				<div style="width: 100px; float: right; margin-right: 30px;margin-top: 20px; ">
					<select id="operateSelect">
						<option value="-1">--其他操作--</option>
						<option value="1">同步数据</option>
					</select>
				</div>
			</div>
			<form action="/teacher/course/courseDelete" method="post">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th style="width: 30px;"><input type="checkbox" name="fullChoose" onclick="fullChecked(this)" /></th>
					<th style="width: 100px;">学号</th>
					<th style="width: 100px;">姓名</th>
					<th style="width: 50px;">性别</th>
					<th style="width: 100px;">年级</th>
					<th style="width: 180px;">学院</th>
					<th style="width: 150px;">专业班级</th>
					<th style="width: 100px;">权限</th>
					<th style="width: 100px;">操作</th>
				</tr>
				<?php if(is_array($studentList) || $studentList instanceof \think\Collection || $studentList instanceof \think\Paginator): $i = 0; $__LIST__ = $studentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td style="width: 30px;"><input type="checkbox" name="teacherNo[]/a" onclick="eachChecked()" class="eachChoose" value="<?php echo $vo['studentNo']; ?>"/></td>
					<td><?php echo $vo['studentNo']; ?></td>
					<td><?php echo $vo['studentName']; ?></td>
					<td><?php echo $vo['sex']; ?></td>
					<td><?php echo $vo['grade']; ?></td>
					<td><?php echo $vo['insititutes']; ?></td>
					<td><?php echo $vo['major']; ?><?php echo $vo['classes']; ?>班</td>
					<td><?php echo $vo['roleNo']; ?></td>
					<td>
						<a href="/admin/student/editPage?studentNo=<?php echo $vo['studentNo']; ?>" style='margin-left: 5px;'>
							<i class="fa fa-edit" title="编辑"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<p class="msg">
				<span id="notdisplay" style="display: none;"></span>
				<input type="submit" value="删除选中" class="delBtn" id="delBtn" disabled="disabled" onclick='return checkdel();'/>
				共找到<?php echo $studentNumber; ?>条信息，每页显示15条记录
			</p>
			<div class="" style="text-align: center;margin-bottom:20px; ">
			<?php echo $studentList->render(); ?>
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