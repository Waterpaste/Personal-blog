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
<style>
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: 1px solid #ddd;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: middle;
}
</style>
</head>
<body>
<form method="post" action="<?php echo U('Adminls/List/deletes');?>" id="listform" >
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    
    <table class="table table-hover text-center">
      <tr>
      	<th>序号</th>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
       	<th>名称</th>
       	<th>描述</th>
        
        
        <th>浏览次数</th>	
        <th>分类名称</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时木有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($i+$num); ?></td>	
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" />
           <?php echo ($vo["id"]); ?></td>
          
          <td><?php echo ($vo["p_title"]); ?></td>
          <td><?php echo ($vo["note"]); ?></td>
          <td><?php echo ($vo["count"]); ?></td>	
          <td><?php echo ($vo["title"]); ?></td>
          <td><?php echo ($vo["date"]); ?></td>
          <td><div class="button-group"> <a class="button border-main" href="<?php echo U('Adminls/List/update',array('id'=>$vo[id],'cate_id'=>$vo[cate_id]));?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="<?php echo U('Adminls/List/delete',array('id'=>$vo['id']));?>" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
       </tr><?php endforeach; endif; else: echo "暂时木有数据" ;endif; ?>	 
      <tr>
        <td style="text-align:left; padding:19px 0; width:70px; padding-left:20px;"><input type="checkbox" id="checkall"/>全选</td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><input type="submit" value="删除" name="deletes" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()">   
      </tr>
      <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
       
        <li style="margin-left:730px;">
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    </table>
  </div>
</form>
<nav style="text-align:center;">
		
			<?php echo ($page); ?>
        
</nav>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
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

//批量删除
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
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>