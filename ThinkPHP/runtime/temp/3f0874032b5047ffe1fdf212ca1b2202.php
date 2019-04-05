<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"F:\study\www\reportSystem\ThinkPHP\public/../app/admin\view\login\index.html";i:1554120095;s:35:"../app/common/view/html/header.html";i:1554120095;s:35:"../app/common/view/html/footer.html";i:1554052431;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>计算机学院实验报告在线撰写系统</title>
    <link rel="shortcut icon" href="/static/images/school.ico" />
    <link rel="stylesheet" href="/static/css/index/index.css" />
    <link rel="stylesheet" href="/static/css/index/login.css" />
    <link rel="stylesheet" href="/static/css/common/common.css" />
    <link rel="stylesheet" href="/static/css/common/footer.css" />
    <link rel="stylesheet" href="/static/css/common/detail.css" />
    <link rel="stylesheet" href="/static/fontawesome-5.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/fontawesome-5.5.0/css/all.css" />
    <link rel="stylesheet" href="/static/bootstrap-3.3.7/css/bootstrap.min.css">

    <script type="text/javascript" src="/static/js/jquery3.2.1.min.js"></script>
    <script type="text/javascript" src="/static/js/index/public.js"></script>
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

    <!-- 主体开始 -->
    <div class="loginContainer">
        <div class="loginDiv">
            <h2 style="margin: 0 auto; position: absolute; left: 180px; top:0px;">管理员登录</h2>
            <form class="loginForm" action="/admin/login/login" method="post">
                <div class="sectionDiv">
                    <label class="sectionLabel">账号：</label>
                    <?php if(\think\Session::get('isRemember') == 'false'): ?>
                    <input type="text" name="account" class="form-control sectionInput">
                    <?php else: ?>
                    <input type="text" name="account" class="form-control sectionInput" value="<?php echo \think\Session::get('reaccount'); ?>">
                    <?php endif; ?>
                </div>
                <br>
                <div class="sectionDiv">
                    <label class="sectionLabel">密码：</label>
                    <?php if(\think\Session::get('isRemember') == 'false'): ?>
                    <input type="password" name="password" class="form-control sectionInput">
                    <?php else: ?>
                    <input type="password" name="password" class="form-control sectionInput" value="<?php echo \think\Session::get('repassword'); ?>">
                    <?php endif; ?>
                </div>
                <div style="clear: both;"></div>
                <div class="sectionCheckBoxDiv">
                    <?php if(\think\Session::get('isRemember') == 'false'): ?>
                    <input type="checkbox" name="rememberMe">
                    <?php else: ?>
                    <input type="checkbox" name="rememberMe" checked="true">
                    <?php endif; ?>
                    <label style="font-size: 16px;">记住我</label>
                </div>

                <div class="ButtonDiv sectionSubmitDiv">
                    <input type="submit" name="" class="Button">
                </div>
            </form>
        </div>
    </div>
    <!-- 主体结束 -->

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
