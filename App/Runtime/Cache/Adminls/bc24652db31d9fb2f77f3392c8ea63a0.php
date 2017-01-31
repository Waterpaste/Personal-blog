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
    <link rel="stylesheet" href="/luoshublog/Public/css/bootstrap.min.css">
    <script src="/luoshublog/Public/js/jquery.js"></script>
    <script src="/luoshublog/Public/js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="<?php echo U('Book/deletes');?>">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <input type="submit" value="批量删除" name="deletes" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()">
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>昵称</th>       
        <th>url</th>
        <th>邮箱</th>
        <th>ip</th>
        <th width="25%">内容</th>
         <th width="120">留言时间</th>
        <th>操作</th>       
      </tr>
         <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" />
            <?php echo ($vo["id"]); ?></td>
          <td><?php echo ($vo["author"]); ?></td>
          <td><?php echo ($vo["url"]); ?></td>
          <td><?php echo ($vo["email"]); ?></td>  
           <td><?php echo ($vo["ip"]); ?></td>         
          <td><?php echo ($vo["content"]); ?></td>
          <td><?php echo ($vo["date"]); ?></td>
          <td><div class="button-group"> <a class="button border-red" href="<?php echo U('Book/delete',array('id'=>$vo['id']));?>" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
    </table>
  </div>
</form>
<nav style="text-align:center;">
		
			<?php echo ($page); ?>
        
</nav>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>