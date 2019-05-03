<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\role\roleList.html";i:1556873785;s:35:"../app/common/view/html/header.html";i:1554540536;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>计算机学院实验报告在线撰写系统</title>
    <link rel="shortcut icon" href="/static/images/school.ico" />

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="/static/fontawesome-5.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/fontawesome-5.5.0/css/all.css" />
    <link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

    <script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>
    <script type="text/javascript" src="/static/js/index/public.js"></script>
    <script type="text/javascript" src="/static/js/common/checkBox.js"></script>
    <script type="text/javascript" src="/static/js/admin/roleAdd.js"></script>

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/common/display.css">


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
				<h2>角色列表</h2>
				
				<div style="width: 100px; float: right; margin-right: 50px;">
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					<i class="fas fa-plus"></i>&nbsp;添加系统角色
					</button>
				</div>
			</div>
			<div>
				<table>
					<tr>
						<th style="width: 50px; ">角色号</th>
						<th style="width: 100px; ">角色名称</th>
						<th style="width: 200px; ">角色描述</th>
						<th style="width: 100px; ">权限号</th>
						<th style="width: 50px; ">操作</th>
					</tr>
					<?php if(is_array($roleList) || $roleList instanceof \think\Collection || $roleList instanceof \think\Paginator): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<tr>
						<td><?php echo $vo['roleNo']; ?></td>
						<td><?php echo $vo['roleName']; ?></td>
						<td><?php echo $vo['roleDescribe']; ?></td>
						<td><?php echo $vo['permission']; ?></td>
						<td><a href="/admin/role/roleDelete?roleNo=<?php echo $vo['roleNo']; ?>" style="color: #FFF;" class="btn btn-danger btn-xs" onclick="return del();">删除</a></td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
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

    <!-- 模态框（Modal） -->
	<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="width:400px;margin:0 auto;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
							aria-hidden="true">×
					</button>
					<h4 class="modal-title" id="myModalLabel">
						请在下面填写系统角色信息
					</h4>
				</div>
				<form action="/admin/role/roleAdd" method="post" onsubmit="return checkSubmit();">
				<div class="modal-body">
					<div>
					    角色名称：
					    <input type="text" id="roleName" name="roleName" style="width: 100%; margin-top: 10px; margin-bottom: 10px; border-radius: 5px;">
					</div>
					<div>
						权限号：
						<input type="text" id="permission" name="permission" style="width: 100%; margin-top: 10px; margin-bottom: 10px; border-radius: 5px; ">
					</div>
					<div>
						角色基本类型
						<select style="width: 100%; margin-top: 10px; margin-bottom: 10px; border-radius: 5px; ">
							<option>管理员</option>
							<option>教师</option>
							<option>学生</option>
						</select>
					</div>
					<div>
						角色描述：
						<textarea id="roleDescribe" name="roleDescribe" style="width: 100%; margin-top: 10px; margin-bottom: 10px; height: 70px; border-radius: 5px;" value="">	
						</textarea>
					</div>
					<div>
						选择角色权限：
						<div style="width: 100%; margin-top: 10px; margin-bottom: 10px;text-align: center;" class="btn-group-xs" id="functions" style="height: auto;">
							<?php if(is_array($functionsList) || $functionsList instanceof \think\Collection || $functionsList instanceof \think\Paginator): $i = 0; $__LIST__ = $functionsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$function): $mod = ($i % 2 );++$i;?>
							<a class="btn btn-primary" style="float: left; border: 1px solid #000; " onclick="$(this).toggleClass('btn-success');" value="<?php echo $function['functionNo']; ?>"><?php echo $function['functionName']; ?></a>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<input type="text" name="functions" value="" id="functionNos" style="display: none;">
					</div>
				</div>
				<div class="modal-footer">
					<input style="margin-top: 10px;" type="submit" name="" class="btn btn-success" value="提交更改">
				</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</body>
</html>


<script type="text/javascript">
function del(){
	return window.confirm("你确认要删除该系统角色吗？");
}
</script>