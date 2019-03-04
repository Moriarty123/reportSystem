<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"F:\study\www\reportSystem\ThinkPHP\public/../app/teacher\view\chart\index.html";i:1551691496;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>销售柱状图</title>
    <!-- 引入ECharts文件 -->
    <script src="/static/js/Echarts/echarts.min.js"></script>
</head>
<body>

    <!-- 为ECharts准备一个具备大小（宽高）的DOM -->
    <div id="main" style="width: 400px; height: 400px;"></div>
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i2): $mod = ($i % 2 );++$i;?>
    <?php echo $i2['num']; ?>,
    <?php endforeach; endif; else: echo "" ;endif; if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i1): $mod = ($i % 2 );++$i;?><?php echo $i1['name']; ?>,<?php endforeach; endif; else: echo "" ;endif; ?>

    <script type="text/javascript">

        /*基于准备好的dom，初始化echarts实例*/
        var myChart = echarts.init(document.getElementById('main'));

        /*指定图表的配置和数据*/
        var option = {
            title:{    //主标题
                text:'销售柱状图',
                textStyle:{    //标题样式
                    color:'red',
                    fontWeight:'bold'
                },
                padding:[5,10,5,10],    //标题内边距，默认5
                itemGap:5,    //主副标题纵向间隔，默认10
                left:'left',    //具体的像素值，百分比，
                backgroundColor:'#ccc',    //标题背景颜色，默认透明，支持RGB,十六进制数
                borderWidth:'3',    //边框
                borderColor:'rgb(98,52,51)',    //边框颜色
                //图形阴影的模糊大小，下面四个配合使用
                shadowBlur:'10',
                shadowColor:'rgba(0,0,0,0.5)',
                shadowOffsetX:'2',
                shadowOffsetY:'5'
            },
            tooltip:{},    //提示框
            legend:{    //图例组件，点击图例控制哪些不显示
                data:['销量'],
            },
        
            xAxis:{
                type:'category',    //坐标轴类型 类目(默认)，时间，数值
                //data:["衬衫","羊毛衫","手套","裤子","高跟鞋","袜子"],
                //数据可以从数据库提取
                data:[<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i1): $mod = ($i % 2 );++$i;?>"<?php echo $i1['name']; ?>",<?php endforeach; endif; else: echo "" ;endif; ?>],
                
                name:'类别',        //坐标轴名称
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
                name:'销量',
                type:'bar',
                //data:[5,20,36,10,10,20]
                //数据可以从数据库提取
                data:[<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i2): $mod = ($i % 2 );++$i;?><?php echo $i2['num']; ?>,<?php endforeach; endif; else: echo "" ;endif; ?>]
            }]
        };

        // 使用刚指定的配置项和数据显示图表
        myChart.setOption(option);
    </script>

</body>
</html>