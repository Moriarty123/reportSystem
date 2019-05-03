<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\course\courseAdd.html";i:1556820251;s:35:"../app/common/view/html/header.html";i:1554540536;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <div class="container" style="margin-top:20px; min-height: 500px;">

        <div class="leftsidebar_box" id="leftMenu">
            <dl class="system_log">
                <dt>
                    <i class="fas fa-home a"></i>
                    <a href="/teacher/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
                </dt>
            </dl>
            <!--实验任务开始-->
            <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['children'])): ?>
            <dl class="system_log" id="menu1">
                <dt>
                    <?php echo $vo['html']; ?>
                    <span class="menu-text"><?php echo $vo['menuName']; ?></span>
                    <i class="fas fa-angle-down   b"></i>
                </dt>

                <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?>   
                <dd>
                    <img class="coin11" src="/static/images/coin111.png" />
                    <img class="coin22" src="/static/images/coin222.png" />
                    <a class="cks" href="<?php echo $no['href']; ?>"><?php echo $no['menuName']; ?></a>
                    <img class="icon5" src="/static/images/coin21.png" />
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </dl>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!-- 左边菜单结束-->

    <!--main开始-->
    <div id="MainForm">
      <div class="form_boxA">
         <div class="a">
            <h2><strong>添加课程信息</strong></h2>
        </div>
        <div style="position: relative; left: 0px; top: 0px;">
        <form action="/admin/course/courseAdd" method="post" class="add_form" onsubmit="return checkSubmit();">
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程号：</label>
                <input type="text" id="courseNum" name="courseNum" class="add_input" placeholder="请输入数字" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程名称：</label>
                <input type="text" id="courseName" name="courseName" class="add_input" placeholder="例：信息安全概论" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课教师：</label>
                <select id="teacherNo" style="width: 270px; margin-top:5px;" name="teacherNo">
                    <option value="-1">--请选择教师--</option>
                    <?php if(is_array($teacherList) || $teacherList instanceof \think\Collection || $teacherList instanceof \think\Paginator): $i = 0; $__LIST__ = $teacherList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $teacher['teacherNo']; ?>"><?php echo $teacher['teacherName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <input type="hidden" name="teacherName" id="teacherName" value="">
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课年级：</label>
                <select id="grade" style="width: 270px; margin-top:5px;" name="grade">
                    <option value="-1">--请选择年级--</option>
                    <?php if(is_array($gradeList) || $gradeList instanceof \think\Collection || $gradeList instanceof \think\Paginator): $i = 0; $__LIST__ = $gradeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['grade']; ?>"><?php echo $vo['grade']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课专业：</label>
                <select id="major" style="width: 270px; margin-top:5px;" name="major">
                    <option value="-1">--请选择专业--</option>
                    <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['majorName']; ?>" ><?php echo $vo['majorName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>任课班级：</label>
                <div>
                <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <span><input type="checkbox" name="classes[]/a" style="margin-top: 10px;" class="checkBox" value="<?php echo $vo['className']; ?>"><?php echo $vo['className']; ?></span>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>  
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程类型：</label>
                <select id="courseType" style="width: 270px; margin-top:5px;" name="courseType">
                    <option value="专业课">专业课</option>
                    <option value="公共数学">公共数学</option>
                    <option value="公共计算机">公共计算机</option>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>课程性质：</label>
                <select id="courseNature" style="width: 270px; margin-top:5px;" name="courseNature">
                    <option value="必修课" >必修课</option>
                    <option value="选修课" >选修课</option>
                </select>
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>理论课时：</label>
                <input type="text" id="coursePeriod" name="coursePeriod" class="add_input" placeholder="请输入正整数" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>实验课时：</label>
                <input type="text" id="testPeriod" name="testPeriod" class="add_input" placeholder="请输入正整数" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>开课时间：</label>
                <input type="text" id="openTime" name="openTime" class="add_input" placeholder="例：2018年春季学期" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>学分：</label>
                <input type="text" id="credit" name="credit" class="add_input" placeholder="请输入正整数或一位小数" />
            </div>
            <div class="add_list">
                <label class="add_label"><span class="xing">*</span>考查方式：</label>
                <select id="examType" style="width: 270px; margin-top:5px;" name="examType">
                    <option value="考查" >考查</option>
                    <option value="考试" >考试</option>
                </select>
            </div>
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
    $(document).ready(function(){
        $("#teacherNo").change(function() {
            var teacherName = $("#teacherNo option:selected").text();
            $("#teacherName").val(teacherName);
        });
    });
</script>



