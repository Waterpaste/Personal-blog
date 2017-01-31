<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="/luoshublog/Public/css/pintuer.css">
    <link rel="stylesheet" href="/luoshublog/Public/css/admin.css">
    <script src="/luoshublog/Public/js/jquery.js"></script>
    <script src="/luoshublog/Public/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Adminls/Essay/addattr');?>">   
      <div class="form-group">
        <div class="label">
          <label>昵称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="author" value="<?php echo ($admin); ?>" data-validate="required:请输入名称" />         
          <div class="tips"></div>
        </div>
      </div> 
      <div class="form-group">
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="content" style="height:100px;" ></textarea>        
        </div>
     </div> 
     <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>