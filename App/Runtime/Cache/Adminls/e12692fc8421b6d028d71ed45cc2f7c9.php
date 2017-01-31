<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/luoshublog/Public/css/pintuer.css">
<link rel="stylesheet" href="/luoshublog/Public/css/admin.css">
<script src="/luoshublog/Public/js/jquery.js"></script>
<script src="/luoshublog/Public/js/pintuer.js"></script>
<script type="text/JavaScript" src="/luoshublog/Public/ckeditor/ckeditor.js"></script> 

</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Adminls/List/addattr');?>">  
      
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="p_title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
           
      
     
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="cate_id" class="input w50">
            <option value="">请选择分类</option>	
            <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?> 
            </select>
            <div class="tips"></div>
          </div>
        </div>
       
      
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="note" style=" height:90px;" ></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea id="TextArea1" name="content" class="ckeditor" ></textarea>
          <script >
          	CKEDITOR.replace( 'content', {
              	filebrowserImageUploadUrl  :  "<?php echo U('Adminls/Ckeup/upload');?>"
          	});
          </script>
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>关键字：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_title" value="" data-validate="required:请填写关键字" />（以”;“分隔）
        </div>
      </div>
      
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>文章来源：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="source" value="" />
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="authour" value="<?php echo ($username); ?>" data-validate="required:请填作者名" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>浏览量：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="count" value="0" data-validate="member:只能为数字"  />
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
      </div>
    </form>
  </div>
</div>

</body></html>