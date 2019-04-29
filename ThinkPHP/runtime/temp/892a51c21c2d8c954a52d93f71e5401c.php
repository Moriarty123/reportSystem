<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\guide\guideEditor.html";i:1555779089;s:35:"../app/common/view/html/header.html";i:1554540536;s:36:"../app/teacher/view/common/menu.html";i:1554782303;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <script type="text/javascript" src="/static/js/teacher/guideEditor.js"></script>
    <script type="text/javascript" src="/static/js/wangEditor/wangEditor.js"></script>
    <!-- <script type="text/javascript" src="__WANGEDITOR__/release/wangEditor.js"></script> -->
    

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/guide.css" />
    <link rel="stylesheet" href="/static/css/teacher/display.css" />
    <link rel="stylesheet" href="/static/css/teacher/guideAdd.css" />
    <link rel="stylesheet" href="/static/css/teacher/add.css" />


    <link type="text/css" rel="Stylesheet" href="/static/xheditor/scp/scp.css"/>
    <link type="text/css" rel="stylesheet" href="/static/xheditor/scp/skygqbox.css" />
    <script type="text/javascript" src="/static/xheditor/scp/jquery-1.4.min.js"></script>
    <script type="text/javascript" src="/static/xheditor/scp/json2.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/xheditor/xheditor-1.2.2/xheditor-1.2.2.min.js"></script>
    <script type="text/javascript" src="/static/xheditor/scp/skygqbox.js"></script>
    <script type="text/javascript" src="/static/xheditor/scp/scp.app.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/xheditor/scp/scp.edge.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/xheditor/scp/scp.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8" src="/static/xheditor/xheditor-1.2.2/xheditor_lang/zh-cn.js"></script>
    <style type="text/css">
        .scp{background: transparent url(/static/xheditor/scp/screencapture.gif) no-repeat; background-position:3px 2px;}
    </style>


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
				<a href="/teacher/guide/editorPage" class="cks">撰写实验指导</a>
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
					学生报告
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
                <h2>撰写实验指导</h2>
            </div>
            <form action="/teacher/guide/guideEditor" method="post" onsubmit="return checkSubmit()">
                <div style="margin-top: 10px; margin-left: 20px;">
                    <label><span class="xing">*</span>实验课程：</label>
                    <select name="courseNo" id="courseNo" style="width: 25%; margin-bottom: 5px;">
                        <option value="-1">--请选择实验课程--</option>
                        <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $course['courseNo']; ?>"><?php echo $course['courseName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div style="margin-top: 10px; margin-left: 20px;">
                    <label><span class="xing">*</span>实验任务：</label>
                    <select name="taskNo" id="taskNo" style="width: 25%; margin-bottom: 5px;">
                        <option value="-1">--请选择实验任务--</option>
                        <?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $task['taskNo']; ?>"><?php echo $task['taskName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div style="margin-top: 10px; margin-left: 20px;">
                    <label><span class="xing">*</span>实验指导：</label>
                    <input type="text" name="guideName" id="guideName" style="width: 25%; margin-bottom: 5px; padding-left: 5px;" placeholder="实验指导名称">
                </div>
                
                <div style="margin-top: 10px; margin-left: 20px;">
                    <span>请在下面填写实验指导内容：</span></div>
                <textarea id="txtContent" name="txtContent" id="txtContent" rows="12" cols="80" style="width:1065px;height:665px;" ></textarea>
                <div id="scpPanel"></div>
                
                <div class="ButtonDiv" style="width: 300px; margin-bottom: 20px; ">
                    <!-- <input type="submit" name="" value="保存" class="Button" style="float: left; margin: 5px;"> -->
                    <input type="submit" name="" value="提交" class="Button" style="float: left; margin: 5px;">
                </div>
            </form>
        </div>
    </div>
    <!--课程列表结束-->

    <!-- 清除浮动 -->
    <div style="clear: both;height: 100px;"></div>

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

<!-- 编辑器配置 -->
<script type="text/javascript" language="javascript">
    var editor;
    $(pageInit);

    function test() {
        alert("sda");
    }
    function pageInit()
    {
        var allPlugin = {
            scp: { c: 'scp', t: '截屏', e: function () { scpMgr.Capture(); } }
        };
        editor = $('#txtContent').xheditor(
        {
            plugins: allPlugin, 
            tools: 'Cut,Copy,Paste,Pastetext,Blocktag,Fontface,FontSize,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,SelectAll,Removeformat,Align,List,Outdent,Indent,Link,Unlink,Img,Flash,Media,Emot,Table,scp,Source,Fullscreen,About',
            upBtnText: '上传', 
            upLinkUrl:"upload.php",
            upLinkExt:"zip,rar,txt",
            upImgUrl:"http://reportsystem/upload.php",
            upImgExt:"jpg,jpeg,gif,png",
            upFlashUrl:"upload.php",
            upFlashExt:"swf",
            upMediaUrl:"upload.php",
            upMediaExt:"avi",
            html5Upload:false,
            onUpload:'text'
        });  
        function show(msg) {
            alert(msg)
        }
    }




    var scpMgr = new CaptureManager();
    scpMgr.Config["PostUrl"] = "http://reportsystem/upload.php";
    scpMgr.event.postComplete = function (url) {
            // url = str_replace("../../", "./", url);
            // alert(url);
            url = url.substring(1)
            // alert(url);
            var img = '<img src="' + url + '"/>';
            editor.appendHTML(img);
        };
        scpMgr.loadAuto();
    </script>

    <script type="text/javascript">

    </script>
