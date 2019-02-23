<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\guide\guideAdd.html";i:1550337339;s:35:"../app/common/view/html/header.html";i:1549160695;s:36:"../app/teacher/view/common/menu.html";i:1549943010;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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
    <script type="text/javascript" src="/static/js/teacher/guideAdd.js"></script>
    <script type="text/javascript" src="/static/js/wangEditor/wangEditor.js"></script>
    <!-- <script type="text/javascript" src="/static/wangEditor-3.1.1/release/wangEditor.js"></script> -->
    

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/guide.css" />
    <link rel="stylesheet" href="/static/css/teacher/display.css" />
    <link rel="stylesheet" href="/static/css/teacher/guideAdd.css" />

</head>
<style type="text/css">
    .guideAddDiv .test-text {
        width: 500px;
    }
    .guideAddDiv select {
        width: 500px;
    }
</style>
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
            <div class="guideAddDiv">
                <form action="/teacher/guide/guideAdd" method="post" onsubmit="return checkSubmit()">
                    <div class="add-list">
                        <label>实验课程：</label>
                        <br>
                        <select name="courseNo" id="courseNo">
                            <option value="null">--请选择实验课程--</option>
                            <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['courseNo']; ?>"><?php echo $vo['courseName']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="add-list">
                        <label>实验任务：</label>
                        <br>
                        <select name="taskNo" id="taskNo">
                            <option value="-1">--请选择实验任务--</option>
                            <?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['taskNo']; ?>"><?php echo $vo['taskName']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="add-list">
                        <label>实验指导名称：</label>
                        <input type="text" id="guideName" name="guideName" class="test-text">
                    </div>
                    <div class="add-list">
                        <label>实验目的：</label>
                        <div id="testAim" name="testAim" class="test-text">
                        </div>
                        <input type="hidden" id="aim" name="aim">
                    </div>
                    <div class="add-list">
                        <label>实验环境：</label>
                        <div id="testEnvironment" class="test-text">
                        </div>
                        <input type="hidden" id="environment" name="environment">
                    </div>
                    <div class="add-list">
                        <label>实验要求：</label>
                        <div id="testRequire" class="test-text">
                        </div>
                        <input type="hidden" id="request" name="request">
                    </div>
                    <div class="add-list">
                        <label>实验任务：</label>
                        <div id="testTask" class="test-text">
                        </div>
                        <input type="hidden" id="task" name="task">
                    </div>
                    <div class="add-list">
                        <label>实验内容：</label>
                        <div id="testContent" class="test-text">
                        </div>
                        <input type="hidden" id="content" name="content">
                    </div>
                    <div class="ButtonDiv submitDiv">
                        <input type="submit" class="Button" name="save" value="保存" >
                        <input type="submit" class="Button" name="submit" value="提交">
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

<!-- 创建编辑器 -->
<!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
<script type="text/javascript">
    var E = window.wangEditor
    var testAim = new E('#testAim')
    var testEnvironment = new E('#testEnvironment');
    var testTask = new E('#testTask')
    var testContent = new E('#testContent');
    var testRequire = new E('#testRequire')

    testAim.create();
    testEnvironment.create();
    testTask.create();
    testContent.create();
    testRequire.create();

</script>

