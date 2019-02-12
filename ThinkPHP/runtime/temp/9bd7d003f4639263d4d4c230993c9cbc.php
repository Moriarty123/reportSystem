<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\guide\guideAdd.html";i:1549988056;s:35:"../app/common/view/html/header.html";i:1549160695;s:36:"../app/teacher/view/common/menu.html";i:1549943010;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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

    <script type="text/javascript" src="/static/wangEditor-3.1.1/release/wangEditor.js"></script>

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
            <div class="a">
                <h2>撰写实验指导</h2>
            </div>
            <div style="width: 500px; margin-top: 20px;">
                <form action="/teacher/guide/guideAdd" method="post" onsubmit="return checkSubmit()">
                    <div style="margin-left: 20px; margin-bottom: 10px;">
                        <label style="font-size: 16px;">实验指导名称：</label>
                        <input type="text" id="guideName" name="guideName" style="width: 500px; " onblur="checkName();">
                    </div>
                    <div style="margin-left: 20px;margin-bottom: 10px;">
                        <label style="font-size: 16px;">实验目的：</label>
                        <div id="testAim" name="testAim" style="width: 500px; outline:0;">
                        </div>
                        <input type="hidden" id="aim" name="aim" value="">
                    </div>
                    <div style="margin-left: 20px;margin-bottom: 10px;">
                        <label style="font-size: 16px;">实验环境：</label>
                        <div id="testEnvironment" style="width: 500px;">
                        </div>
                        <input type="hidden" id="environment" name="environment" value="">
                    </div>
                    <div style="margin-left: 20px;margin-bottom: 10px;">
                        <label style="font-size: 16px;">实验要求：</label>
                        <div id="testRequest" style="width: 500px;">
                        </div>
                        <input type="hidden" id="request" name="request" value="">
                    </div>
                    <div style="margin-left: 20px;margin-bottom: 10px;">
                        <label style="font-size: 16px;">实验任务：</label>
                        <div id="testTask" style="width: 500px;">
                        </div>
                        <input type="hidden" id="task" name="task" value="">
                    </div>
                    <div style="margin-left: 20px;margin-bottom: 10px;">
                        <label style="font-size: 16px;">实验内容：</label>
                        <div id="testContent" style="width: 500px;">
                        </div>
                        <input type="hidden" id="content" name="content" value="">
                    </div>
                    <div class="ButtonDiv" style="width:100%; height: 30px; line-height: 30px;margin-bottom: 20px;">
                        <input type="submit" class="Button" name="save" value="保存" >
                        <input type="submit" class="Button" name="submit" value="提交" onclick="checkSubmit()">
                    </div>
                </form>
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
        $("#submitedFilter").click(function(){
            $("#submitedFilterDiv").slideToggle();
        });
    });
</script>
<!-- 筛选框结束 -->
<!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->

<script type="text/javascript">
    var E = window.wangEditor
    var testAim = new E('#testAim')
    var testEnvironment = new E('#testEnvironment');
    var testTask = new E('#testTask')
    var testContent = new E('#testContent');
    var testRequest = new E('#testRequest')

    testAim.create();
    testEnvironment.create();
    testTask.create();
    testContent.create();
    testRequest.create();

</script>

<script type="text/javascript">
    
    //一般情况下，onblur事件只在input等元素中才有，而div却没有，因为div没有tabindex属性，所以要给div加上此属性。定义tabindex属性后，元素是默认会加上焦点虚线的，那么在IE中可以通过hidefocus="true"去除！其他浏览器通过outline=0进行去除！
    $(document).ready(function(){
        $(".w-e-text").attr('tabindex',0);
        $(".w-e-text").attr('hidefocus','true');
        $(".w-e-text").css('outline',0);
    });

    //提交校验
    function checkSubmit() {

        // //判断保存或提交
        // $submit = 
        // if (true) {}
        //
        if(checkName() == true && checkAim() == true && checkEnvironment() == true && checkRequest() == true && checkTask() == true && checkContent() == true) {
            // alert('确认提交？');
            return true;
        }
        else {
            return false;
        }
    }

    //名称校验
    function checkName() {
        $guideName = $("#guideName").val();

        if($guideName == "") {
            alert("实验指导名称不能为空");
            return false;
        }
        else {
            return true;
        }
    }

    //实验目的校验
    function checkAim() {
        $testAimText = $("#testAim .w-e-text p").html();

        if ($testAimText == "<br>") {
           alert('实验目的不能为空');
           return false;
        }
        else {
            $('#aim').val($testAimText);
            return true;
        }
    }

    //实验环境校验
    function checkEnvironment() {
        $testEnvironmentText = $("#testEnvironment .w-e-text p").html();

        if ($testEnvironmentText == "<br>") {
           alert('实验环境不能为空');
           return false;
        }
        else {
            $('#environment').val($testEnvironmentText);
            return true;
        }
    }

    //实验要求校验
    function checkRequest() {
        $testRequestText = $("#testRequest .w-e-text p").html();

        if ($testRequestText == "<br>") {
           alert('实验要求不能为空');
           return false;
        }
        else {
            $('#request').val($testRequestText);
            return true;
        }
    }

    //实验任务校验
    function checkTask() {
        $testTaskText = $("#testTask .w-e-text p").html();

        if ($testTaskText == "<br>") {
           alert('实验任务不能为空');
           return false;
        }
        else {
            $('#task').val($testTaskText);
            return true;
        }
    }

    //实验内容校验
    function checkContent() {
        $testContentText = $("#testContent .w-e-text p").html();

        if ($testContentText == "<br>") {
           alert('实验内容不能为空');
           return false;
        }
        else {
            $('#content').val($testContentText);
            return true;
        }
    }
    

</script>