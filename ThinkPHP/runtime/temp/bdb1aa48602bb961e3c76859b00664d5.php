<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"F:\study\www\reportSystem\ThinkPHP\public/../app/student\view\score\scoreShow.html";i:1554022597;s:35:"../app/common/view/html/header.html";i:1554022704;s:36:"../app/student/view/common/menu.html";i:1554022597;s:35:"../app/common/view/html/footer.html";i:1548946076;}*/ ?>
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


    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">

    <link rel="stylesheet" href="/static/css/student/display.css" />
    <link rel="stylesheet" href="/static/css/student/score.css">
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

    <!-- 左边菜单开始-->
    

<div class="container" style="margin-top:20px; height: 400px;">
	<div class="leftsidebar_box">
		<dl class="system_log">
			<dt>
				<i class="fas fa-home a"></i>
					<a href="/student/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
			</dt>
		</dl>
		<!--实验课程开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-users  a"></i>
					我的课程
				<i class="fas fa-angle-down   b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/student/course/courseList">实验课程列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验课程结束-->
		<!--实验任务开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-book-open a"></i>
					我的任务
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a class="cks" href="/student/task/taskList">实验任务列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验任务结束-->
		<!--实验指导开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-comments a"></i>
					我的报告
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/student/report/reportList" class="cks">实验报告列表</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/student/report/writePage" class="cks">撰写实验报告</a>
				<img class="icon5" src="/static/images/coin21.png" />
			</dd>
		</dl>
		<!--实验指导结束-->
		<!--批阅报告开始-->
		<dl class="system_log">
			<dt>
				<i class="fas fa-reply a"></i>
					我的成绩
				<i class="fas fa-angle-down b"></i>
			</dt>
			<dd>
				<img class="coin11" src="/static/images/coin111.png" />
				<img class="coin22" src="/static/images/coin222.png" />
				<a href="/student/score/scoreShow" class="cks">实验课程成绩</a>
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
				<a href="/student/score/scoreShow" class="cks">实验课程成绩</a>
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
                <form action="/student/score/scoreShow" method="post">
                    <select class="courseSelect" name="courseNo" id="course">
                        <option value="-1">--请选择实验课程--</option>
                        <?php if(is_array($courseList) || $courseList instanceof \think\Collection || $courseList instanceof \think\Paginator): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $course['courseNo']; ?>"><?php echo $course['courseName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <div id="taskDiv">
                    <!-- <select class="taskSelect" name="taskNo" id="task">
                        <option value="-1">--请选择实验任务--</option>
                        <?php if(is_array($taskList) || $taskList instanceof \think\Collection || $taskList instanceof \think\Paginator): $i = 0; $__LIST__ = $taskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $task['taskNo']; ?>"><?php echo $task['taskName']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select> -->
                    <!-- <select class="taskSelect" name="scoreSystem" id="task">
                        <option value="-1">--请选择评分方式--</option>
                        <option value="0">百分制</option>
                        <option value="1">五分制</option>
                        {/volist}
                    </select> -->
                    </div>
                    <div class="ButtonDiv" >
                        <input type="submit" name="submit" value="确定" class="submit Button" style="width: 60px; height: 30px;">    
                    </div>
                    
                </form>
            </div>

            <div style="width: 100%; height: 600px; ">
                <div style="width: 800px; height: 500px; margin:0 auto; " id="chart"></div>
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



<script src="/static/js/Echarts/echarts.js" charset="utf-8" type="text/javascript"></script>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('chart'));

    // 指定图表的配置项和数据
    var option = {
        backgroundColor: '#FBFBFB',
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['分数']
        },

        calculable : true,


        xAxis : [
            {
                axisLabel:{
                    rotate: 30,
                    interval:0
                },
                axisLine:{
                  lineStyle :{
                      color: '#CECECE'
                  }
                },
                type : 'category',
                boundaryGap : false,
                data : function (){
                    var list = [];
                    for (var i = 1; i <= <?php echo $number; ?>; i++) {
                        list.push("第"+i+"次实验");
                    }
                    return list;
                }()
            }
        ],
        yAxis : [
            {

                type : 'value',
                axisLine:{
                    lineStyle :{
                        color: '#CECECE'
                    }
                }
            }
        ],
        series : [
            {
                name:'分数',
                type:'line',
                symbol:'none',
                smooth: 0.2,
                color:['#66AEDE'],
                data:[<?php if(is_array($score) || $score instanceof \think\Collection || $score instanceof \think\Paginator): $i = 0; $__LIST__ = $score;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><?php echo $s; ?>,<?php endforeach; endif; else: echo "" ;endif; ?>]
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
