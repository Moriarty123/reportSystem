<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\teacher\teacherAdd.html";i:1554392646;s:35:"../app/common/view/html/header.html";i:1554120095;s:34:"../app/admin/view/common/menu.html";i:1554306177;s:35:"../app/common/view/html/footer.html";i:1554052431;}*/ ?>
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
    <script type="text/javascript" src="/static/js/admin/teacherAdd.js"></script>

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/user.css" />
    <link rel="stylesheet" href="/static/css/teacher/add.css" />
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
    

<div class="container" style="margin-top:20px; height: 500px;">
	<div class="leftsidebar_box">
		<dl class="system_log">
			<dt>
				<i class="fas fa-home a"></i>
					<a href="/teacher/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
			</dt>
		</dl>
		<!--教师管理开始-->
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
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/admin/teacher/addPage">添加教师</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--教师管理结束-->
		<!--学生管理开始-->
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
		<!--学生管理结束-->
		<!--课程管理开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-comments a"></i>
					课程管理
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/admin/course/courseList" class="cks">实验课程列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--课程管理结束-->
		<!--专业班级开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-reply a"></i>
					专业班级
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/admin/major/majorList" class="cks">专业列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--专业班级结束-->
		<!--角色权限开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-file-invoice-dollar a"></i>
					角色权限
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/admin/role/roleList" class="cks">权限列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--角色权限结束-->
		

		
	</div>
</div>
    <!-- 左边菜单结束-->

	<!--main开始-->
	<div id="MainForm">
		<div class="form_boxA">
			<div class="a">
				<h2><strong>修改教师信息</strong></h2>
			</div>
            <div style="position: relative; left: 0px; top: 0px;">
			<form action="/admin/teacher/teacherAdd" method="post" class="add_form" style="margin-left: 220px;" onsubmit="return checkSubmit();">
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>职工号：</label>
                    <input type="text" id="teacherNo" name="teacherNo" class="add_input"/>
                </div>
				<div class="add_list">
                    <label class="add_label"><span class="xing">*</span>姓名：</label>
                    <input type="text" id="teacherName" name="teacherName" class="add_input"/>
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>职称：</label>
                    <input type="text" name="title" class="add_input"/>
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>学位：</label>
                    <input type="text" name="degree" class="add_input"/>
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>邮箱：</label>
                    <input type="text" id="email" name="email" class="add_input"/>
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>手机：</label>
                    <input type="text" id="phoneNum" name="phoneNum" class="add_input"/>
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>性别：</label>
                    <select style="width: 270px;" name="sex">
                        <option value="男">男</option>   
                        <option value="女">女</option> 
                    </select>
                </div>
                <div class="add_list">
                    <label class="add_label">头像：</label>
                    <input type="file" name="file" onchange="uploadsimage(this);" >
                </div>
                <div style="position: absolute; left: 720px; top: 50px; width: 150px;height: 150px;" id="imgBox">
                    <img src="/uploads/default/headImg.jpg" style="width: 100%;border-radius: 50%;" >
                </div>
                <input type="hidden" name="headImg" id="headImg">
				<input type="submit" value="提交" class="add_submit" />
			</form>
            </div>
		</div>
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

<script type="text/javascript">
//上传图片
function uploadsimage(obj) {
    if ( obj.value == "" ) return;

    var formdata = new FormData();

    formdata.append("image", $(obj)[0].files[0]);//$(obj)[0].files[0]为文件对象
    formdata.append("path", 'sale');

    console.log(formdata);

    $.ajax({
        type : 'post',
        url : '/teacher/common/upload',
        data : formdata,
        cache : false,
        processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
        contentType : false, // 不设置Content-type请求头
        success : function(ret){
            var html = '<img src="'+ret+'" style="width:100%; border-radius: 50%;">';


            console.log(html);
            $('#imgBox').html(html);
            
            
            console.log(ret);
            // $('#headImg').val(ret);
            $('#headImg').attr('value', ret);
        },
        error : function(){ 
            alert('图片上传失败');
        }
    });
}
</script>
