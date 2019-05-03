<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\common\menu2.html";i:1556808550;}*/ ?>
<!-- <div class="page-sidebar" id="sidebar">
 
    <ul class="nav sidebar-menu">
    <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>     --> 
        <!--Dashboard-->
        <!-- <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"><?php echo $vo['menuName']; ?></span>
                <i class="menu-expand"></i>
            </a> 
            <?php if(isset($vo['children'])): ?>
            <ul class="submenu">
            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?>           
                <li>
                    <a href="<?php echo $no['href']; ?>">                    
                                    <span class="menu-text">
                                    <?php echo $no['menuName']; ?>                
                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; ?>
        </li>
 
      <?php endforeach; endif; else: echo "" ;endif; ?>
 
    </ul> -->
    <!-- /Sidebar Menu -->
<!-- </div> -->



<div class="container" style="margin-top:20px; height: 500px;">

    <div class="leftsidebar_box" id="leftMenu">
        <dl class="system_log">
            <dt>
                <i class="fas fa-home a"></i>
                    <a href="/teacher/index/index">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a>
            </dt>
        </dl>
        <!--实验任务开始-->
        <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <dl class="system_log" id="menu1">
            <dt>
                <i class="fas fa-users  a"></i>
                    <span class="menu-text"><?php echo $vo['menuName']; ?></span>
                <i class="fas fa-angle-down   b"></i>
            </dt>
            <?php if(isset($vo['children'])): if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?>   
            <dd>
                <img class="coin11" src="/static/images/coin111.png" />
                <img class="coin22" src="/static/images/coin222.png" />
                <a class="cks" href="<?php echo $no['href']; ?>">课程列表</a>
                <img class="icon5" src="/static/images/coin21.png" />
            </dd>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

