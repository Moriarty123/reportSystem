<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\score\scoreShow.html";i:1552205130;s:35:"../app/common/view/html/header.html";i:1553414474;s:36:"../app/teacher/view/common/menu.html";i:1553495316;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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
    <script type="text/javascript" src="/static/js/common/checkBox.js"></script>
    <script type="text/javascript" src="/static/js/Echarts/echarts.min.js"></script>

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/course.css" />
    <link rel="stylesheet" href="/static/css/teacher/display.css" />
</head>

<style type="text/css">
.title-right {
	width: 100px; float: right; margin-right: 30px;margin-top: 20px;
}

.selectDiv {
	height: 80px; position: relative; top: 0px; left: 0px;
}

.selectDiv .courseSelect {
	position: absolute; left: 100px; top: 30px;
}

.selectDiv .taskSelect {
	position: absolute; left: 350px; top: 30px;
}

.selectDiv .submit {
	position: absolute; left: 650px; top: 30px;
}


</style>
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
				<a href="/teacher/guide/addPage" class="cks">撰写实验指导</a>
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
				<h2>学生成绩分布</h2>
				
				<div class="title-right">
					<select onchange="window.location=this.value">
						<option value="-1">--其他操作--</option>
						<option>同步数据</option>
					</select>
				</div>
			</div>
			<div class="selectDiv">
				<form action="/teacher/score/scoreShow" method="post">
					<!-- <select class="courseSelect" name="courseNo" id="course">
						<option value="-1">--请选择实验课程--</option>
						<?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $course['courseNo']; ?>"><?php echo $course['courseName']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select> -->
					<div id="taskDiv">
					<select class="taskSelect" name="taskNo" id="task">
						<option value="-1">--请选择实验任务--</option>
						<?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $task['taskNo']; ?>"><?php echo $task['taskName']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					</div>
					<input type="submit" name="submit" value="确定" class="submit">
				</form>
			</div>

			<div style="width: 100%; height: 600px; ">
				<div style="width: 600px; height: 500px; margin:0 auto; " id="chart"></div>
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

        /*基于准备好的dom，初始化echarts实例*/
        var myChart = echarts.init(document.getElementById('chart'));

        /*指定图表的配置和数据*/
        var option = {
            title:{    //主标题
                text:'学生成绩分布图',
                textStyle:{    //标题样式
                    color:'red',
                    fontWeight:'bold'
                },
                padding:[5,10,5,10],    //标题内边距，默认5
                margin:[5,5,5,5],
                itemGap:5,    //主副标题纵向间隔，默认10
                left:'left',    //具体的像素值，百分比，
                backgroundColor:'#ccc',    //标题背景颜色，默认透明，支持RGB,十六进制数
                borderWidth:'3',    //边框
                borderColor:'rgb(98,52,51)',    //边框颜色
                //图形阴影的模糊大小，下面四个配合使用
                shadowBlur:'10',
                shadowColor:'rgba(0,0,0,0.5)',
                shadowOffsetX:'10',
                shadowOffsetY:'5'
            },
            tooltip:{},    //提示框
            legend:{    //图例组件，点击图例控制哪些不显示
                data:['分数'],
            },
        
            xAxis:{
                type:'category',    //坐标轴类型 类目(默认)，时间，数值
                // data:["衬衫","羊毛衫","手套","裤子","高跟鞋","袜子"],
                //数据可以从数据库提取
                data:["A", "B", "C", "D", "E"],
                
                name:'成绩',        //坐标轴名称
                nameTextStyle:{        //坐标轴名称的文字样式
                    color:'green',
                },
                nameRotate:'10',    //坐标轴名字旋转角度
                //inverse:true,        //反向坐标轴
                boundaryGap:true,    //坐标轴两边留白策略
            
                axisTick:{
                    alignWithLabel:true,    //刻度线和标签对其
                    inside:false,    //刻度是否朝内，默认朝外
                },
                position:'bottom',    //x轴的位置
                
            },
            yAxis:{},

            series:[{
                name:'人数',
                type:'bar',
                // data:[5,20,36,10,10,20]
                //数据可以从数据库提取
                data:[<?php echo $count[0]; ?>,<?php echo $count[1]; ?>,<?php echo $count[2]; ?>,<?php echo $count[3]; ?>,<?php echo $count[4]; ?>]
            }]
        };

        // 使用刚指定的配置项和数据显示图表
        myChart.setOption(option);
</script>


<!-- <script type="text/javascript">
	
	$(document).ready(function(){
	  $("#course").change(function(){
	  	var courseNo = $(this).val();
	  	alert(courseNo);
	  	console.log(courseNo);

	    

	    $("#task").html(html);
	  });
	});
</script> -->

