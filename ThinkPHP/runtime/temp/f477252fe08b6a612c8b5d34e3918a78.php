<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\report\reportList.html";i:1553510244;s:35:"../app/common/view/html/header.html";i:1553414474;s:36:"../app/teacher/view/common/menu.html";i:1553495316;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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
			<div class="a" style="position: relative; left: 0px; top: 0px;">
				<h2>实验报告列表</h2>

				<div style="position: absolute; left: 150px; top: 35px;">
					<select id="courseFilter">
						<option value="-1">--请选择实验课程--</option>
						<?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $course['courseNo']; ?>"><a href="/teacher/report/courseFilter?$courseNo=<?php echo $course['courseNo']; ?>"><?php echo $course['courseName']; ?></a></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>

				<form action="/teacher/report/courseFilter" method="post" id="courseFilterForm" style="display: none;">
					<input type="hidden" name="courseFilterNo" id="courseFilterNo">
				</form>
				
				<form action="/teacher/report/reportSearch" method="post" onsubmit="return checkSearch()" class="searchform">
					<input type="text" class="search" placeholder="实验报告名称" name="search" />
					<input type="submit" class="search_button" value="搜索" />
				</form>
				<div style="width: 100px; float: right; margin-right: 30px;margin-top: 20px; ">
					<select id="operateSelect">
						<option value="-1">--其他操作--</option>
						<option value="1">同步数据</option>
						<option value="2">导出学生成绩</option>
					</select>
				</div>
			</div>
			<!-- 提交状态筛选表单 -->
			<form action="/teacher/report/submitFilter" method="post" id="submitFilterForm"></form>
			<!-- 批阅状态筛选表单 -->
			<form action="/teacher/report/reviewFilter" method="post" id="reviewFilterForm"></form>

			<form action="" method="post">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<!-- <th style="width: 30px;"><input type="checkbox" name="fullChoose" onclick="fullChecked(this)" /></th> -->
					<th style="width: 150px;">实验课程</th>
					<th style="width: 150px;">实验任务</th>
					<th style="width: 150px;">实验报告</th>
					<th>提交学生</th>
					<th style="position: relative; top:0px; left:0px;">
						提交结果
						<span id="submitedFilter">
							<i class="fa fa-filter" title="筛选"></i>
						</span>
						<div id="submitedFilterDiv" class="submitedFilterDiv" >
							
							<div class="submitedFilterRadio" style="margin-left: 5px;">	
								<label><input name="submitResult" type="radio" value="0" form="submitFilterForm"/>正常提交</label>
							</div>
							<div class="submitedFilterRadio" style="margin-left: 5px;">
								<label><input name="submitResult" type="radio" value="1" form="submitFilterForm"/>迟交</label>
							</div>
							<div>
								<input type="submit" name="" class="submit" value="确定" form="submitFilterForm">
								<input type="reset" name="" class="reset" value="重置" form="submitFilterForm">
							</div>
							
						</div>
					</th>
					<th style="position: relative; top:0px; left:0px;">
						批阅状态
						<span id="reviewedFilter">
							<i class="fa fa-filter" title="筛选"></i>
						</span>
						<div id="reviewedFilterDiv" class="reviewedFilterDiv" >
							
							<div class="reviewedFilterRadio" style="margin-left: 5px;">	
								<label><input name="reviewStatus" type="radio" value="0" form="reviewFilterForm"/>未批阅</label>
							</div>
							<div class="reviewedFilterRadio" style="margin-left: 5px;">
								<label><input name="reviewStatus" type="radio" value="1" form="reviewFilterForm"/>已批阅</label>
							</div>
							<div>
								<input type="submit" name="" class="submit" value="确定" form="reviewFilterForm">
								<input type="reset" name="" class="reset" value="重置" form="reviewFilterForm">
							</div>
						</div>
					</th>
					<th style="width: 200px;">提交时间</th>
					<th>实验成绩</th>
					<th>操作</th>
				</tr>
				<tbody id="tbody">
				<?php if(is_array($reportList) || $reportList instanceof \think\Collection || $reportList instanceof \think\Paginator): $i = 0; $__LIST__ = $reportList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<!-- <td style="width: 30px;"><input type="checkbox" name="reportNo[]/a" onclick="eachChecked()" class="eachChoose" value="<?php echo $vo['reportNo']; ?>"/></td> -->
					<td style="width: 150px;"><?php echo $vo['courseName']; ?></td>
					<td style="width: 150px;"><?php echo $vo['taskName']; ?></td>
					<td style="width: 150px;"><?php echo $vo['reportName']; ?></td>
					<td><?php echo $vo['studentName']; ?></td>
					<?php if($vo['submitResult'] == '正常提交'): ?>
					<td style="color: rgb(16, 142, 233)"><?php echo $vo['submitResult']; ?></td>
					<?php else: ?>
					<td style="color: rgb(220,20,60)"><?php echo $vo['submitResult']; ?></td>
					<?php endif; if($vo['reviewStatus'] == '未批阅'): ?>
					<td style="color: rgb(16, 142, 233)"><?php echo $vo['reviewStatus']; ?></td>
					<?php else: ?>
					<td style="color: rgb(32, 163, 15)"><?php echo $vo['reviewStatus']; ?></td>
					<?php endif; ?>
					<td style="width: 200px;"><?php echo date("Y-m-d h:m:s",$vo['submitTime']); ?></td>
					<td><?php echo $vo['score']; ?></td>
					<td>
						<a href="/teacher/report/reportShow?reportNo=<?php echo $vo['reportNo']; ?>" target="_blank">
							<i class="fa fa-eye" title="查看"></i>
						</a>
						<a href="/teacher/report/reviewPage?reportNo=<?php echo $vo['reportNo']; ?>" style='margin-left: 5px;'>
							<i class="fa fa-user-edit" title="批阅"></i>
						</a>
						<a href="/teacher/report/reportExport?repoortNo='<?php echo $vo['reportNo']; ?>'" style='margin-left: 5px;'>
							<i class="fa fa-file-export" title="导出"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<p class="msg">
				<!-- <span id="notdisplay" style="display: none;"></span>
				<input type="submit" value="删除选中" class="delBtn" id="delBtn" disabled="disabled" onclick='return checkdel();'/> -->
				共找到<?php echo $reportNumber; ?>条信息，每页显示15条记录
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

		//实验课程筛选
		$("#courseFilter").change(function() {
			var courseNo = $("#courseFilter  option:selected").val();//获取实验课程No

			$("#courseFilterNo").val(courseNo);//填写表单
			$("#courseFilterForm").submit();//提交表单
		});

		//导出学生成绩
		$("#operateSelect").change(function() {
			var value = $("#operateSelect").val();

			if (value == 2) {
				$(window).attr('location','/teacher/excel/reportExcel');
			}
			
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

