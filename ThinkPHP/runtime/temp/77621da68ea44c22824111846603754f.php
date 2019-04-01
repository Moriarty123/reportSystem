<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"F:\study\www\reportSystem\ThinkPHP\public/../app/student\view\report\reportUpdate.html";i:1554053545;s:35:"../app/common/view/html/header.html";i:1554052431;s:35:"../app/common/view/html/footer.html";i:1554052431;}*/ ?>
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
            <a href="/index/index/index">【转到后台】</a>
        </div>
    </div>
</div>
<!-- 头部结束 -->
	<!-- 头部结束-->

	<!--课程列表开始-->
	<div id="MainForm" style="width: 1250px; margin-left: 50px; ">
		<div class="form_boxA">
			<div class="a" style="position: relative; left: 0px; top: 0px;">
				<h2>修改实验报告</h2>
				
			</div>

		</div>
		
		<div style="float: left; widows: 620px">
			<form action="/student/report/reportUpdate" method="post">
                <!-- <input type="hidden" name="courseNo" value="<?php echo $guide['courseNo']; ?>">
                <input type="hidden" name="taskNo" value="<?php echo $guide['taskNo']; ?>">
                <input type="hidden" name="teacherNo" value="<?php echo $guide['teacherNo']; ?>"> -->
                <input type="hidden" name="reportNo" value="<?php echo $report['reportNo']; ?>">
				<textarea id="reportContent" name="reportContent" id="reportContent" rows="12" cols="80" style="width:620px;height:665px;" ></textarea>
				<div id="scpPanel"></div>
                <!-- <input type="text" name="reportName" style="width: 100%; float: left; margin: 5px 0px;" placeholder="请输入实验报告名称"> -->
                <!-- <input type="hidden" name="reportName" value="<?php echo $guide['guideName']; ?>"> -->
				<input type="submit" name="save" class="Button" style="float: left; margin:5px;" value="保存">
				<input type="submit" name="submit" class="Button" style="float: left;margin: 5px; " value="提交">
			</form>
		</div>
		<div style="float: right; width: 620px;">

			<textarea id="txtContent" name="txtContent" id="txtContent" rows="12" cols="80" style="width:620px;height:665px;" ></textarea>
				<div id="scpPanel"></div>
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

<script type="text/javascript" language="javascript">
		//1.xheditor设置
        var reportEditor;
        var guideEditor;
        $(pageInit);

        function pageInit()
        {
            var allPlugin = {
                scp: { c: 'scp', t: '截屏', e: function () { scpMgr.Capture(); } }
            };
            reportEditor = $('#reportContent').xheditor(
                {
                    plugins: allPlugin, 
                    tools: 'Cut,Copy,Paste,Pastetext,Blocktag,Fontface,FontSize,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,Removeformat,Align,List,Outdent,Indent,Link,Unlink,Img,Emot,Table,Source,Fullscreen,scp',
                    upBtnText: '上传', 
                    upLinkUrl:"upload.php",
                    upLinkExt:"zip,rar,txt",
                    upImgUrl:"http://reportsystem/upload.aspx",
                    upImgExt:"jpg,jpeg,gif,png",
                    upFlashUrl:"upload.php",
                    upFlashExt:"swf",
                    upMediaUrl:"upload.php",
                    upMediaExt:"avi",
                    html5Upload:false,
                    readOnly:true
            });  

            guideEditor = $('#txtContent').xheditor(
            {
            	plugins:allPlugin,
            	tools:'Copy,Align,Outdent,Indent,Source,Fullscreen'
            });

            reportEditor.setSource('<?php echo $reportContent; ?>');            
			guideEditor.setSource('<?php echo $guideContent; ?>');

        }

		//2.scp(截图)设置
        var scpMgr = new CaptureManager();
        scpMgr.Config["PostUrl"] = "http://reportsystem/upload.php";
        scpMgr.event.postComplete = function (url) {
            // url = str_replace("../../", "./", url);
            // alert(url);
            url = url.substring(1)
            // alert(url);
            var img = '<img src="' + url + '"/>';
            reportEditor.appendHTML(img);
        };
        scpMgr.loadAuto();
</script>
