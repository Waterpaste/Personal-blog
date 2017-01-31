<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="/luoshublog/Public/css/pintuer.css">
    <link rel="stylesheet" href="/luoshublog/Public/css/admin.css">
    <script src="/luoshublog/Public/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/luoshublog/Public/images/admin.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="<?php echo U('Home/Index/index');?>" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('/Adminls/Index/logout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="<?php echo U('Adminls/Info/index');?>" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="<?php echo U('Adminls/About/index');?>" target="right"><span class="icon-caret-right"></span>关于设置</a></li> 
    <li><a href="<?php echo U('Adminls/Pass/index');?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>    
    <li><a href="<?php echo U('Adminls/Book/index');?>" target="right"><span class="icon-caret-right"></span>留言管理</a></li>     
    
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>随笔管理</h2>
  <ul>
 	<li><a href="<?php echo U('/Adminls/Essay/index');?>" target="right"><span class="icon-caret-right"></span>随笔管理</a></li>
 	<li><a href="<?php echo U('/Adminls/Essay/add');?>" target="right"><span class="icon-caret-right"></span>随笔添加</a></li>         
  </ul>
  <h2><span class="icon-pencil-square-o"></span>分类管理</h2>
  <ul>
    <li><a href="<?php echo U('/Adminls/Cates/index');?>" target="right"><span class="icon-caret-right"></span>分类管理</a></li>
    <li><a href="<?php echo U('/Adminls/Cates/add');?>" target="right"><span class="icon-caret-right"></span>分类添加</a></li>
  </ul>
  <h2><span class="icon-pencil-square-o"></span>内容管理</h2>
  <ul>
    <li><a href="<?php echo U('Adminls/List/index');?>" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="<?php echo U('Adminls/List/add');?>" target="right"><span class="icon-caret-right"></span>添加内容</a></li>       
  </ul>
  <h2><span class="icon-pencil-square-o"></span>友情链接</h2>
  <ul>
 	<li><a href="<?php echo U('/Adminls/Friend/index');?>" target="right"><span class="icon-caret-right"></span>友链管理</a></li>
 	<li><a href="<?php echo U('/Adminls/Friend/add');?>" target="right"><span class="icon-caret-right"></span>友链添加</a></li>         
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Adminls/Info/index');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('Adminls/Info/index');?>" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>