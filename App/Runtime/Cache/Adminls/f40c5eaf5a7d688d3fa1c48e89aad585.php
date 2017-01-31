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
  
    <form method="post" name="infos" class="form-x" action="<?php echo U('Adminls/Info/update');?>" > 
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type = "hidden" name="id" value="<?php echo ($vo["id"]); ?>">
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="stitle" value="<?php echo ($vo["stitle"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>网站图片：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;" value="<?php echo ($vo["slogo"]); ?>" data-toggle="hover" data-place="right" data-image="<?php echo ($vo["slogo"]); ?>"  />
          <input type="button" class="button bg-blue margin-left" id="image1"  value="+ 浏览上传" onclick="centerWindow('<?php echo U('Adminls/Info/upload');?>','upfile',400,100 )"/>
         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站域名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="surl" value="<?php echo ($vo["surl"]); ?>" />
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea class="input" name="skeywords" style="height:80px"><?php echo ($vo["skeywords"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="sdescription"><?php echo ($vo["sdescription"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>ps描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="ps"><?php echo ($vo["ps"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>联系人：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_name" value="<?php echo ($vo["s_name"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_tel" value="<?php echo ($vo["s_tel"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>QQ：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qq" value="<?php echo ($vo["s_qq"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      
     
      <div class="form-group">
        <div class="label">
          <label>Email：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_email" value="<?php echo ($vo["s_email"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
       
              
      <div class="form-group">
        <div class="label">
          <label>底部信息：</label>
        </div>
        <div class="field">
          <textarea name="scopyright" class="input" style="height:120px;"><?php echo ($vo["scopyright"]); ?></textarea>
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