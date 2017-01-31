<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bootstrap 实例 - 警告框（Alert）插件 alert() 方法</title>
  <link rel="stylesheet" href="/luoshublog/Public/css/bootstrap.min.css">
  <script src="/luoshublog/Public/js/bootstrap.min.js"></script>
</head>
<body>

<div id="myAlert" class="alert alert-warning">
  <a href="<?php echo($jumpUrl); ?>" class="close" data-dismiss="alert">&times;</a>
  <strong>警告！</strong><?php echo($error); ?><br/>
  <b id="wait"><?php echo($waitSecond); ?></b> 秒后页面将自动<a id="href" href="<?php echo($jumpUrl)?>">跳转</a>
</div>
<script type="text/javascript">
$(function(){
  $(".close").click(function(){
    $("#myAlert").alert();
  });
});  
</script> 
<script type="text/javascript">
(function(){
 var wait = document.getElementById('wait'),href = document.getElementById('href').href;
 var interval = setInterval(function(){
      var time = --wait.innerHTML;
      if(time <= 0) {
      location.href = href;
      clearInterval(interval);
      };
     }, 1000);
  window.stop = function (){
         console.log(111);
            clearInterval(interval);
 }
 })();
</script> 

</body>