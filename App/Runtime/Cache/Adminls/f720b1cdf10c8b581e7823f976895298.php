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
    <link rel="stylesheet" href="/luoshublog/Public/css/bootstrap.min.css">
    <script src="/luoshublog/Public/js/jquery.js"></script>
    <script src="/luoshublog/Public/js/pintuer.js"></script>  
    <script src="/luoshublog/Public/js/bootstrap.min.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="<?php echo U('/Adminls/Cates/add');?>"><span class="icon-plus-square-o"></span> 添加内容</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">排序</th>     
      <th>名称</th>  
      <th>内容</th>
      <th>ID</th> 
       <th>pid</th>   
      <th width="250">操作</th>
    </tr>
   <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "暂时木有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
  
      <td><?php echo ($i+$num); ?></td>      
      <td><?php echo ($vo["author"]); ?></td>  
      <td><?php echo ($vo["content"]); ?></td>
      <td><?php echo ($vo["id"]); ?></td> 
        <td><?php echo ($vo["pid"]); ?></td>
      <td>
      <div class="button-group">
      <a type="button" class="button border-main" href="<?php echo U('/Adminls/Essay/update',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>修改</a>
       <a class="button border-red" href="<?php echo U('/Adminls/Essay/delete',array('id'=>$vo['id']));?>" onclick="return del(17)"><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr><?php endforeach; endif; else: echo "暂时木有数据" ;endif; ?>
  </table>
  
</div>

	<nav style="text-align:center;">
		
			<?php echo ($page); ?>
        
	</nav>
<script>
function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}
</script>

</body></html>