<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\guide\guideList.html";i:1556820464;s:35:"../app/common/view/html/header.html";i:1554540536;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <link rel="stylesheet" href="/static/css/teacher/guide.css" />
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
            <!-- <a href="/admin/login/index">【管理员登录】</a> -->
        </div>
    </div>
</div>
<!-- 头部结束 -->
    <!-- 头部结束-->

    <!-- 左边菜单开始-->
	<div class="container" style="margin-top:20px; min-height: 500px;">

		<div class="leftsidebar_box" id="leftMenu">
			<dl class="system_log">
				<dt>
					<i class="fas fa-home a"></i>
					<a href="/teacher/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
				</dt>
			</dl>
			<!--实验任务开始-->
			<?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['children'])): ?>
			<dl class="system_log" id="menu1">
				<dt>
					<?php echo $vo['html']; ?>
					<span class="menu-text"><?php echo $vo['menuName']; ?></span>
					<i class="fas fa-angle-down   b"></i>
				</dt>
				
				<?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?>   
				<dd>
					<img class="coin11" src="/static/images/coin111.png" />
					<img class="coin22" src="/static/images/coin222.png" />
					<a class="cks" href="<?php echo $no['href']; ?>"><?php echo $no['menuName']; ?></a>
					<img class="icon5" src="/static/images/coin21.png" />
				</dd>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				
			</dl>
			<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>

	<!-- 左边菜单结束-->

	<!--课程列表开始-->
	<div id="MainForm">
		<div class="form_boxA">
			<div class="a">
				<h2>实验指导列表</h2>
				<form action="/teacher/guide/guideSearch" method="post" onsubmit="return checkSearch()" class="searchform">
					<input type="text" class="search" placeholder="实验指导名称" name="search" />
					<input type="submit" class="search_button" value="搜索" />
				</form>
				<div style="width: 100px; float: right; margin-right: 30px;margin-top: 20px; ">
					<select onchange="window.location=this.value">
						<option>--其他操作--</option>
						<option>同步数据</option>
					</select>
				</div>
			</div>
			<form action="/teacher/guide/guideDelete" method="post">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th style="width: 30px;"><input type="checkbox" name="fullChoose" onclick="fullChecked(this)" /></th>
					<th>实验课程</th>
					<th>实验任务</th>
					<th>实验指导</th>
					<th style="position: relative; top:0px; left:0px;">
						归属状态
						<span id="submitedFilter">
							<i class="fa fa-filter" title="筛选"></i>
						</span>
						<div id="submitedFilterDiv" class="submitedFilterDiv" >
							<form >
								<div class="submitedFilterRadio" style="margin-left: 5px;">	
									<label><input name="submited" type="radio"/>未归属</label>
								</div>
								<div class="submitedFilterRadio" style="margin-left: 5px;">
									<label><input name="submited" type="radio"/>已归属</label>
								</div>
								<div>
									<input type="submit" name="" class="submit" value="确定">
									<input type="reset" name="" class="reset" value="重置">
								</div>
							</form>
						</div>
					</th>
					<th>创建时间</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($guideList) || $guideList instanceof \think\Collection || $guideList instanceof \think\Paginator): $i = 0; $__LIST__ = $guideList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td style="width: 30px;"><input type="checkbox" name="guideNo[]/a" onclick="eachChecked()" class="eachChoose" value="<?php echo $vo['guideNo']; ?>"/></td>
					<td><?php echo $vo['courseName']; ?></td>
					<td><?php echo $vo['taskNo']; ?></td>
					<td><?php echo $vo['guideName']; ?></td>
					<?php if($vo['taskNo'] == ''): ?>
						<td style="color: rgb(16, 142, 233)">未归属</td>
					<?php else: ?>
						<td style="color: rgb(32, 163, 15)">已归属</td>	
					<?php endif; ?>
					
					<td><?php echo date("Y-m-d H:m:s",$vo['createTime']); ?></td>
					<td>
						<a href="/teacher/guide/guideShow?guideNo=<?php echo $vo['guideNo']; ?>" target="_blank">
							<i class="fa fa-eye" title="查看"></i>
						</a>
					
						<a href="/teacher/guide/updatePage?guideNo=<?php echo $vo['guideNo']; ?>" style='margin-left: 5px;'>
							<i class="fa fa-edit" title="编辑"></i>
						</a>

						<a href="/teacher/guide/guideExport?guideNo=<?php echo $vo['guideNo']; ?>" style='margin-left: 5px;' target="_blank">
							<i class="fa fa-file-export" title="导出"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>	<p class="msg">
				<span id="notdisplay" style="display: none;"></span>
				<input type="submit" value="删除选中" class="delBtn" id="delBtn" disabled="disabled" onclick='return checkdel();'/>
				共找到<?php echo $guideNumber; ?>条记录，每页显示15条记录
			</p>
			<div class="" style="text-align: center;margin-bottom:20px; ">
			<?php echo $guideList->render(); ?>
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
	});
	
</script>
<!-- 筛选框结束 -->

<script type="text/javascript">
function del(){
	return window.confirm("你确认要删除该实验指导吗？");
}
function checkdel(){
	return window.confirm("你确认要删除选中的实验指导吗？");
}

</script>