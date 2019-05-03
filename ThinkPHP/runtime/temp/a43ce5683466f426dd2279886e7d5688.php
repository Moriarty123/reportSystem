<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\institute\index.html";i:1556820248;s:35:"../app/common/view/html/header.html";i:1554540536;s:35:"../app/common/view/html/footer.html";i:1554540536;}*/ ?>
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
    <script type="text/javascript" src="/static/js/admin/institute.js"></script>

    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/menu.css">
    <link rel="stylesheet" href="/static/css/common/detail.css">
    <link rel="stylesheet" href="/static/css/teacher/user.css" />
    <link rel="stylesheet" href="/static/css/teacher/add.css" />
    <link rel="stylesheet" href="/static/css/common/buttons.css">
</head>

<style type="text/css">
    .instituteMenu a {
        border: #666;
        text-decoration: none;
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
<!--             <div class="a">
                <h2><strong>学院、年级、专业、班级</strong></h2>
            </div> -->
            <div style="position: relative; left: 0px; top: 0px;">

                <!-- 导航栏开始 -->
                <div style="position: fixed; left: 310px; top: 160px;" id="instituteMenu" class="instituteMenu">
                    <div class="" style="width: 120px;">
                        <a href="#institutePage" class="button button-glow button-border button-rounded button-primary">学院</a>
                        <a href="#gradePage" class="button button-glow button-border button-rounded button-primary">年级</a>
                        <a href="#majorPage" class="button button-glow button-border button-rounded button-primary">专业</a>
                        <a href="#classPage" class="button button-glow button-border button-rounded button-primary">班级</a>
                    </div>
                </div>
                <!-- 导航栏结束 -->



                <div style="height: 100px;" id="institutePage"></div>
                <!-- 学院开始 -->
                <div style="width: 500px; margin: 0 auto;">
                    <h3>现有学院：</h3>
                    <table style="width: 500px; text-align: left;">
                        <thead>
                            <tr>
                                <th style="width:150px;">学院</th>
                                <th style="width: 150px;">操作</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php if(is_array($instituteList) || $instituteList instanceof \think\Collection || $instituteList instanceof \think\Paginator): $i = 0; $__LIST__ = $instituteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$institute): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <th><?php echo $institute['instituteName']; ?></th>
                                <th><a href="/admin/institute/instituteDelete?instituteNo=<?php echo $institute['instituteNo']; ?>" onclick="return del();">删除</a></th>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                        
                    </table>
                    <div style="margin: 20px 0px;">
                        <form action="/admin/institute/instituteAdd" method="post" class="searchform" style="margin-left: 0px;" onsubmit="return checkInstituteName();">
                            <input type="text" id="instituteName" class="search" placeholder="请输入学院名称,如，计算机科学与技术学院" name="instituteName" style="width: 500px;" />
                            <input type="submit" class="search_button" value="添加学院" style="margin-left:400px; width: 100px" />
                        </form>
                    </div>
                </div>
                <!-- 学院结束 -->

                <div style="height: 100px;" id="gradePage"></div>

                <!-- 年级开始 -->
                <div style="width: 500px; margin: 0 auto;">
                    <h3>现有年级：</h3>
                    <table style="width: 500px; margin: 0 auto; text-align: center;">
                        <thead>
                            <tr>
                                <th style="width:150px;">年级</th>
                                <th style="width: 150px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($gradeList) || $gradeList instanceof \think\Collection || $gradeList instanceof \think\Paginator): $i = 0; $__LIST__ = $gradeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$grade): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <th><?php echo $grade['grade']; ?></th>
                                <th><a href="/admin/institute/gradeDelete?grade=<?php echo $grade['grade']; ?>" onclick="return del();">删除</a></th>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                        
                    </table>
                    <div style="margin: 20px 0px;">
                        <form action="/admin/institute/gradeAdd" method="post" onsubmit="return checkSearch()" class="searchform" style="margin-left: 0px;" onsubmit="return checkGradeName();">
                            <input type="text" class="search" placeholder="请输入年级,如，2015" name="grade" style="width: 500px;" />
                            <input type="submit" class="search_button" value="添加年级" style="margin-left:400px; width: 100px" />
                        </form>
                    </div>
                </div>
                <!-- 年级结束 -->

                <div style="height: 100px;" id="majorPage"></div>

                <!-- 专业开始 -->
                <div style="width: 500px; margin: 0 auto;">
                    <h3>现有专业：</h3>
                    <table style="width: 500px; margin: 0 auto; text-align: center;">
                        <thead>
                            <tr>
                                <th style="width:150px;">专业</th>
                                <th style="width: 150px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($majorList) || $majorList instanceof \think\Collection || $majorList instanceof \think\Paginator): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$major): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <th><?php echo $major['majorName']; ?></th>
                                <th><a href="/admin/institute/majorDelete?majorNo=<?php echo $major['majorNo']; ?>" onclick="return del();">删除</a></th>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div style="margin: 20px 0px;">
                        <form action="/admin/institute/majorAdd" method="post" onsubmit="return checkMajor()" class="searchform" style="margin-left: 0px;">
                            <input type="text" class="search" placeholder="请输入专业名称,如，计算机科学与技术" name="majorName" style="width: 500px;" />
                            <input type="submit" class="search_button" value="添加专业" style="margin-left:400px; width: 100px" />
                        </form>
                    </div>
                </div>
                <!-- 专业结束 -->

                <div style="height: 100px;" id="classPage"></div>


                <!-- 班级开始 -->
                <div style="width: 500px; margin: 0 auto;">
                    <h3>现有班级：</h3>
                    <table style="width: 500px; margin: 0 auto; text-align: center;">
                        <thead>
                            <tr>
                                <th style="width:150px;">班级</th>
                                <th style="width: 150px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($classList) || $classList instanceof \think\Collection || $classList instanceof \think\Paginator): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$classes): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <th><?php echo $classes['className']; ?></th>
                                <th><a href="/admin/institute/classDelete?classNo=<?php echo $classes['classNo']; ?>" onclick="return del();">删除</a></th>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div style="margin: 20px 0px;">
                        <form action="/admin/institute/classAdd" method="post" onsubmit="return checkClass()" class="searchform" style="margin-left: 0px;">
                            <input type="text" class="search" placeholder="请输入班级,如，3" name="className" style="width: 500px;" />
                            <input type="submit" class="search_button" value="添加班级" style="margin-left:400px; width: 100px" />
                        </form>
                    </div>
                </div>
                <!-- 班级结束 -->

                <div style="height: 100px;"></div>

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


    $(document).ready(function(){
        $('#instituteNav').zlightMenu();
    });

</script>

<script>
  window.onscroll=function(){ 
  var sT=document.documentElement.scrollTop||document.body.scrollTop; 
  if(sT>=160){    
       $("#instituteMenu").css('position','fixed');
       $("#instituteMenu").css('top','310');
       $("#instituteMenu").css('left','160');      
       $("#instituteMenu").css('background','#fff');
  }else{
//        $("#instituteMenu").css('position','static');
        $("#instituteMenu").css('top','310');
       $("#instituteMenu").css('left','160');      
          
  }
}
</script>

<script type="text/javascript">
function del(){
    return window.confirm("确认删除吗？");
}

</script>