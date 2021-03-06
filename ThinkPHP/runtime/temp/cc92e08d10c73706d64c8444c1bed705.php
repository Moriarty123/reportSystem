<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\index\index.html";i:1556820463;s:35:"../app/common/view/html/header.html";i:1554540536;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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

	<link rel="stylesheet" href="/static/css/index/index.css" />
	<link rel="stylesheet" href="/static/css/common/common.css" />
	<link rel="stylesheet" href="/static/css/common/footer.css" />
	<link rel="stylesheet" href="/static/css/common/menu.css">
	<link rel="stylesheet" href="/static/css/common/detail.css">
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

	<!--main开始-->
	<div style="position: absolute; left: 250px; top: 92px; height
	600px;">
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="main" style="width: 1050px;">
		<tr>
			<td colspan="2">
				<span class="time" style="color: black;">

					<?php if(\think\Session::get('user_id') == ''): ?>
					<a href="/index/index/login" class=""><i class="fa fa-plus-circle"></i> 登录</a>
					<?php else: ?>
					<span>账号：<?php echo \think\Session::get('account'); ?></span>&nbsp;&nbsp;
					<div class="top">
						<span class="left">您上次的登录时间： <?php echo date('Y-m-d H:i:s',\think\Session::get('lastTime')); ?> &nbsp;&nbsp;&nbsp;&nbsp;如非您本人操作，请及时</span>
						<a href="/teacher/user/updatePwdPage" style="color: #538ec6;">【更改密码】</a>
					</div>
					<div class="sec">这是您第<span class="num"><?php echo \think\Session::get('count'); ?></span>次登录！</div>
					<?php endif; ?>
				</span>

			</td>
		</tr>
		<tr>
			<td align="left" valign="top" colspan="2">
				<div class="main-tit">服务器信息</div>
				<div class="main-con">
					服务器软件：Apache/2.4.27(Win64) PHP/5.6.31<br/>
					PHP版本：5.6.31<br/>
					MYSQL版本： 5.7.19, for Win64 (x86)<br/>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left" valign="top">
				<div class="main-corpy">系统提示</div>
				<div class="main-order">1=>欢迎使用计算机学院实验报告在线撰写系统<br/>
					2=>强烈建议您使用IE7以上版本或其他的浏览器
				</div>
			</td>
		</tr>
	</table>
</div>
<!--main结束-->

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
