<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\task\taskEdit.html";i:1554540536;s:35:"../app/common/view/html/header.html";i:1554540536;s:36:"../app/teacher/view/common/menu.html";i:1556777273;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <script type="text/javascript" src="/static/js/teacher/taskAdd.js"></script>

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/task.css" />
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

    <!--添加用户开始-->
    <div id="MainForm">
        <div class="form_boxA">
            <div class="a">
                <h2>修改实验任务</h2>
            </div>
            <form action="/teacher/task/taskEdit" method="post" enctype="multipart/form-data" class="add_form" onsubmit="return checkSubmit()">
                <input type="hidden" name="taskNo" value="<?php echo $task['taskNo']; ?>">
                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>任务名称：</label>
                    <input type="text" id="taskName" name="taskName" placeholder="输入实验任务名称" class="add_input" />
                </div>

                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>所属课程：</label>
                    <select name="courseNo" id="courseNo" class="add_input">
                            <option value="null">--请选择实验课程--</option>
                            <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['courseNo'] == $task['courseNo']): ?>
                                    <option value="<?php echo $vo['courseNo']; ?>" selected = "selected"><?php echo $vo['courseName']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $vo['courseNo']; ?>"><?php echo $vo['courseName']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                </div>
                <div><input type="hidden" name="courseNo" value="<?php echo $task['courseNo']; ?>"></div>

                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>开始时间：</label>
                    <input type="datetime-local" id="startTime" name="startTime" class="add_input" value="<?=date('Y-m-d',$task->startTime).'T'.date('H:i:s',$task->startTime)?>" />
                </div>

                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>截止时间：</label>
                    <input type="datetime-local" id="endTime" name="endTime" class="add_input" value="<?=date('Y-m-d',$task->endTime).'T'.date('H:i:s',$task->endTime)?>" />
                </div>

                <div class="add_list">
                    <label class="add_label">背景图片：</label>
                    <input type="file" name="imgFile" onchange="uploadsimage(this);" />
                    <div id="imgBox"></div>
                    <input type="hidden" name="taskImg" id="Img" value="">
                </div>

                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>实验指导：</label>
                    <select name="guideNo" class="add_input" id="guideNo">
                        <option value="null">--请选择实验指导--</option>
                            <?php if(is_array($guideList) || $guideList instanceof \think\Collection || $guideList instanceof \think\Paginator): $i = 0; $__LIST__ = $guideList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['guideNo'] == $task['guideNo']): ?>
                                    <option value="<?php echo $vo['guideNo']; ?>" selected = "selected"><?php echo $vo['guideName']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $vo['guideNo']; ?>"><?php echo $vo['guideName']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>

                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>评分方式：</label>
                    <select class="add_input" name="reviewType">
                        <option value="1">百分制</option>
                        <option value="2">五分制</option>
                    </select>
                </div>

                <div class="add_list">
                    <label class="add_label"><span class="xing">*</span>任务描述：</label>
                    <textarea name="taskDescribe" class="add_textarea" id="taskDescribe"><?php echo $task['taskDescribe']; ?></textarea>
                </div>
                <input type="submit" value="提交" class="add_submit" />
            </form>
        </div>
    </div>
    <!--添加用户结束-->

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
        $("#publishedFilter").click(function(){
            $("#publishedFilterDiv").slideToggle();
        });

        $("#taskName").val('<?php echo $task['taskName']; ?>');
        
        $("#taskDescribe'").html('<?php echo $task['taskDescribe']; ?>');
    });
</script>
<!-- 筛选框结束 -->


<!-- 处理时间戳转datatime-local -->
<script>
 
    Date.prototype.Format = function(fmt)     
{ //author: meizz  
  var o = {     
    "M+" : this.getMonth()+1,                 //月份  
    "d+" : this.getDate(),                    //日  
    "h+" : this.getHours(),                   //小时  
    "m+" : this.getMinutes(),                 //分  
    "s+" : this.getSeconds(),                 //秒  
    "q+" : Math.floor((this.getMonth()+3)/3), //季度  
    "S"  : this.getMilliseconds()             //毫秒  
  };     
  if(/(y+)/.test(fmt))     
    fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));     
  for(var k in o)     
    if(new RegExp("("+ k +")").test(fmt))     
  fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));     
  return fmt;     
};  
 
</script>

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
            var html = '<img src="'+ret+'" style="width:120px">';


            console.log(html);
            $('#imgBox').html(html);
            
            
            console.log(ret);
            // $('#headImg').val(ret);
            $('#Img').attr('value', ret);
        },
        error : function(){ 
            alert('图片上传失败');
        }
    });
}
</script>