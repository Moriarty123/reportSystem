<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\course\courseEdit.html";i:1554575827;s:35:"../app/common/view/html/header.html";i:1554540536;s:34:"../app/admin/view/common/menu.html";i:1554540536;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <script type="text/javascript" src="/static/js/admin/courseAdd.js"></script>

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
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/admin/student/addPage">添加学生</a>
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
            <h2><strong>修改课程信息</strong></h2>
        </div>
        <div style="position: relative; left: 0px; top: 0px;">
        <form action="/admin/course/courseEdit" method="post" class="add_form" onsubmit="return checkSubmit();">
            <input type="hidden" name="courseNo" value="<?php echo $course['courseNo']; ?>">
            <input type="hidden" name="courseNum" value="<?php echo $course['courseNum']; ?>">
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程号：</label>
                <input type="text" id="courseNum" name="courseNum" class="add_input" value="<?php echo $course['courseNum']; ?>" disabled="disabled" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程名称：</label>
                <input type="text" id="courseName" name="courseName" class="add_input" value="<?php echo $course['courseName']; ?>" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课教师：</label>
                <select id="teacherNo" style="width: 270px; margin-top:5px;" name="teacherNo">
                    <option value="-1">--请选择教师--</option>
                    <?php if(is_array($teacherList) || $teacherList instanceof \think\Collection || $teacherList instanceof \think\Paginator): $i = 0; $__LIST__ = $teacherList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $teacher['teacherNo']; ?>" <?php if($course['teacherNo'] == $teacher['teacherNo']) {echo "selected";} ?>><?php echo $teacher['teacherName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <input type="hidden" name="teacherName" id="teacherName" value="<?php echo $course['teacherName']; ?>">
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课年级：</label>
                <select id="grade" style="width: 270px; margin-top:5px;" name="grade">
                    <option value="-1">--请选择年级--</option>
                    <?php if(is_array($gradeList) || $gradeList instanceof \think\Collection || $gradeList instanceof \think\Paginator): $i = 0; $__LIST__ = $gradeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['grade']; ?>" <?php if($course['courseGrade'] == $vo['grade']) {echo "selected";} ?>><?php echo $vo['grade']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课专业：</label>
                <select id="major" style="width: 270px; margin-top:5px;" name="major">
                    <option value="-1">--请选择专业--</option>
                    <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['majorName']; ?>" <?php if($course['courseMajor'] == $vo['majorName']) {echo "selected";} ?>><?php echo $vo['majorName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课班级：</label>
                <div>
                <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <span><input type="checkbox" name="classes[]/a" value="<?php echo $vo['className']; ?>" style="margin-top: 10px;" class="checkBox"><?php echo $vo['className']; ?></span>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>  
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程类型：</label>
                <select id="courseType" style="width: 270px; margin-top:5px;" name="courseType">
                    <option value="专业课" <?php if($course['courseType'] == '专业课') {echo "selected";} ?> >专业课</option>
                    <option value="公共数学" <?php if($course['courseType'] == '公共数学') {echo "selected";} ?> >公共数学</option>
                    <option value="公共计算机" <?php if($course['courseType'] == '公共计算机') {echo "selected";} ?> >公共计算机</option>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程性质：</label>
                <select id="courseNature" style="width: 270px; margin-top:5px;" name="courseNature">
                    <option value="必修课" <?php if($course['courseNature'] == '必修课') {echo "selected";} ?> >必修课</option>
                    <option value="选修课"<?php if($course['courseNature'] == '选修课') {echo "selected";} ?> >选修课</option>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>理论课时：</label>
                <input type="text" id="coursePeriod" name="coursePeriod" class="add_input" value="<?php echo $course['coursePeriod']; ?>" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>实验课时：</label>
                <input type="text" id="testPeriod" name="testPeriod" class="add_input" value="<?php echo $course['testPeriod']; ?>" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>开启时间：</label>
                <input type="text" id="openTime" name="openTime" class="add_input" value="<?php echo $course['openTime']; ?>" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>学分：</label>
                <input type="text" id="credit" name="credit" class="add_input" value="<?php echo $course['credit']; ?>" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>考查方式：</label>
                <select id="examType" style="width: 270px; margin-top:5px;" name="examType">
                    <option value="考查" <?php if($course['examType'] == '考查') {echo "selected";} ?> >考查</option>
                    <option value="考试" <?php if($course['examType'] == '考试') {echo "selected";} ?> >考试</option>
                </select>
            </div>
            <input type="submit" value="修改" class="add_submit" />
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
    $(document).ready(function(){
        $("#teacherNo").change(function() {
            var teacherName = $("#teacherNo option:selected").text();
            $("#teacherName").val(teacherName);
        });
    });
</script>



