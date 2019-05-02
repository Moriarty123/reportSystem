<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\guide\guideImport.html";i:1554540536;s:35:"../app/common/view/html/header.html";i:1554540536;s:36:"../app/teacher/view/common/menu.html";i:1556777273;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <script type="text/javascript" src="/static/js/teacher/guideImport.js"></script>
    <script type="text/javascript" src="/static/js/wangEditor/wangEditor.js"></script>
    <!-- <script type="text/javascript" src="__WANGEDITOR__/release/wangEditor.js"></script> -->
    

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/guide.css" />
    <link rel="stylesheet" href="/static/css/teacher/display.css" />
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

<script type="text/javascript">
	function onloadFunctions() {
		$.ajax({
    	// type : 'post',
    	url : '/teacher/common/onloadFunctions',
    	// data : {"data" : "qwe"},
    	cache : false,
        processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
        contentType : false, // 不设置Content-type请求头
        success : function(ret){
            // alert(ret);
        },
        error : function(){ 
        	// alert('图片上传失败');
        }
    });
	}

	onloadFunctions();
</script>
    <!-- 左边菜单结束-->

    <!--课程列表开始-->
    <div id="MainForm">
        <div class="form_boxA">
            <div class="a">
                <h2>导入实验指导</h2>
            </div>
            <div class="guideAddDiv" style="margin:0 auto;">
                <form action="/teacher/guide/guideImport" enctype="multipart/form-data" method="post" class="add_form" onsubmit="return checkSubmit()">
                
                <div class="add_list" style="padding-top: 5px;">
                    <label class="add_label"><span class="xing">*</span>实验课程：</label>
                    <select name="courseNo" id="courseNo" style="padding-top: 5px; width: 250px; ">
                            <option value="-1">--请选择实验课程--</option>
                            <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['courseNo']; ?>"><?php echo $vo['courseName']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                </div>
                <div class="add_list">
                    <label class="add_label">实验任务：</label>
                    <select name="taskNo" id="taskNo" style="padding-top: 5px; width: 250px;">
                            <option value="-1">--请选择实验任务--</option>
                            <?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['taskNo']; ?>"><?php echo $vo['taskName']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>指导名称：</label>
                    <input type="text" id="guideName" name="guideName" class="add_input"  style="padding-top: 5px; width: 250px;">
                </div>
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>实验指导：</label>
                    <input type="file" name="file" id="file" accept=".pdf" onchange="uploadPdf(this);" style="width: 250px;" multiple>
                    <input type="hidden" name="filePath" id="filePath">
                </div>
                <input type="submit" value="确定" class="add_submit" />
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

<script type="text/javascript">
//上传pdf
function uploadPdf(obj) {
    if ( obj.value == "" ) return;

    var formdata = new FormData();

    formdata.append("pdf" , $(obj)[0].files[0]);//$(obj)[0].files[0]为文件对象

    $.ajax({
        type : 'post',
        url : '/teacher/common/uploadPdf',
        data : formdata,
        cache : false,
        processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
        contentType : false, // 不设置Content-type请求头
        success : function(ret){
            $filePath = "/uploads/"+ret;
            $filePath = $filePath.replace("\\","/");

            $("#filePath").val($filePath);
            // alert($filePath);
        },
        error : function(){ 
            alert('pdf上传失败');
        }
    });
}
</script>




