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
 	<script type="text/JavaScript" src="/luoshublog/Public/ckeditor/ckeditor.js"></script> 
    <script>
    function centerWindow(ulr,name,width,height){
    	var left = (screen.width - width) / 2;
    	var top = (screen.height - height) / 2 - 50;
    	window.open(ulr,name,'width='+width+',height='+height+',top='+top+',left='+left);
    	}
    </script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
  
    <form method="post" name="infos" class="form-x" action="<?php echo U('Adminls/About/update');?>" > 
    <?php if(is_array($about)): $i = 0; $__LIST__ = $about;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type = "hidden" name="id" value="<?php echo ($vo["id"]); ?>">
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea id="TextArea1" name="about" class="ckeditor" ><?php echo ($vo["about"]); ?></textarea>
          <script >
          	CKEDITOR.replace( 'content', {
              	filebrowserImageUploadUrl  :  "<?php echo U('Adminls/Ckeup/upload');?>"
          	});
          </script>
          <div class="tips"></div>
        </div>
      </div>
       
      <div class="form-group">
        <div class="label">
          <label>个人描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="only"><?php echo ($vo["only"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      
     
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
  </div>
</div>
</body></html>