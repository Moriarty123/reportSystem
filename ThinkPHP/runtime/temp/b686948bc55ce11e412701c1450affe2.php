<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"F:\study\www\reportSystem\ThinkPHP\public/../app/common\view\html\fail.html";i:1555340660;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>跳转提示</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    操作结果
                </h4>
            </div>
            <div class="modal-body">
                <?php echo(strip_tags($msg));?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<p class="jump" style="display: none;">
            页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
</p>

</body>
</html>

<script type="text/javascript">
    $(function(){
         $("#myModal").modal({
            keyboard: true
        });
    });
</script>
<script>
   $(function () { $('#myModal').modal('hide')});
   var href = document.getElementById('href').href;
   alert(href);
   $(function () { $('#myModal').on('hide.bs.modal', function () {
      var href = document.getElementById('href').href;

      location.href = href;
   });
</script>

    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>