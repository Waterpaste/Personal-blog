<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="洛书 | BLOG">
    <meta name="author" content="洛书">
    <title>洛书 | 博客</title>
   <!-- Bootstrap core CSS -->
    <link href="/luoshublog/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/luoshublog/Public/css/base.css" rel="stylesheet">
    <link href="/luoshublog/Public/css/about.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/luoshublog/Public/css/offcanvas.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  </head>
 
  <body>
    <meta charset="utf-8"> 
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BLOG</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul name="nav" class="nav navbar-nav">
            <li class="<?php echo ($ui["index"]); ?>"><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="<?php echo ($ui["about"]); ?>"><a href="<?php echo U('About/index');?>"><span class="glyphicon glyphicon-info-sign"></span> 关于本站</a></li>
            <li class="<?php echo ($ui["essay"]); ?>"><a href="<?php echo U('Essay/index');?>"><span class="glyphicon glyphicon-pencil"></span> 随笔</a></li>
            <form id="searchform" class="navbar-form navbar-right" role="search" target="_blank" method="get" action="<?php echo U('Search/index');?>">
                <div class="form-group">
                    <input type="text" id="searchWords" name="searchWords" class="form-control" data-provide="typeahead" autocomplete="off" placeholder="请输入要搜索关键词">
                </div>
                <button type="submit" class="btn"  id="searchbtn">
                    搜索
                </button>
            </form>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	
 <div class="container"> 
  <article>
   
      <div class="col-md-8 col-sm-12">               
		<div class="panel panel-green-sea">
		    <div class="panel-heading">
		        <h2 class="panel-h1-title">
		            关于本站
		        </h2>
		    </div>
		    <div class="panel-body bg-white">
		    <img src="<?php echo ($img); ?>" class="img-responsive" alt="洛书的独立博客" width="140" height="125" />
		        <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ab): $mod = ($i % 2 );++$i; echo (htmlspecialchars_decode($ab["about"])); endforeach; endif; else: echo "" ;endif; ?>
		    </div>
		</div>
		</div>
	
      <div class="col-md-6 col-lg-4 >
        <meta charset="utf-8">
<div class="panel panel-default" >
			<?php if(is_array($about)): $i = 0; $__LIST__ = $about;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><div class="panel-heading"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;关于<?php echo ($a["s_name"]); ?></div>
			
			<div class="panel-body" style="margin-bottom:10px;">
				<img class="img-responsive pull-left mr15" src="<?php echo ($a["slogo"]); ?>" alt="洛书博客"  width="145" height="145">
				<?php echo ($a["sdescription"]); ?>
				<?php echo ($a["ps"]); ?>,更多信息请点击<?php endforeach; endif; else: echo "" ;endif; ?>
				<a href="<?php echo U('About/index');?>" target="_blank">关于本站</a>。
				<div class="gzwm">
					<ul>
						<li>
							<a class="github" href="https://github.com/Waterpaste" target="_blank" title="GitHub"></a>
						</li>
						<li>
							<a class="xlwb" href="http://weibo.com/u/2298628981" target="_blank" title="新浪微博"></a>
						</li>
						<li>
							<a class="twitter" href="http://www.twitter.com/" title="推特"></a>
						</li>
					</ul>
				</div>
			</div>		
		</div>
		
		
		<div class="panel panel-default" >
			<div class="panel-heading"><span class="glyphicon glyphicon-fire"></span>&nbsp;&nbsp;热门文章</div>
			<?php if(is_array($hotpost)): $i = 0; $__LIST__ = $hotpost;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?><ul class="list-group">
				<li class="list-group-item"><a href="<?php echo U('/n-'.$h['id']);?>"  ><?php echo ($h["p_title"]); ?></a><span class="badge"><?php echo ($h["count"]); ?></span></li>
				
			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;目录分类</div>
			  <ul class="catalog">
			  <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li class="list-group-item"> <a href="<?php echo U('/c-'.$c['id']);?>"><span class="label label-info"><?php echo ($i); ?></span>&nbsp;&nbsp;&nbsp;<?php echo ($c["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			  </ul>
		</div>
	
		<div class="panel panel-warning">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapseFour" class="title">
					<span class="glyphicon glyphicon-cloud newicon"></span>&nbsp;&nbsp;友情链接 >>
				</a>
			</h4>
		</div>
		<div id="collapseFour" class="panel-collapse collapse">
			<div class="panel-body">
            <div class="links">
				 <ul>
				 <?php if(is_array($friend)): $i = 0; $__LIST__ = $friend;if( count($__LIST__)==0 ) : echo "暂时木有数据" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($f["f_url"]); ?>"><?php echo ($f["f_title"]); ?></a></li><?php endforeach; endif; else: echo "暂时木有数据" ;endif; ?>	
      			</ul>
            </div>
			</div>
		</div>
		</div>
        </div>
	<!--r_box end --> 
	</article>
     </div>
    
  



   
      
    <!--tit01 end-->
    <div id="tbox"><a id="gotop" href="javascript:scroll(0,0)"></a> </div>
<?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?><footer id="zyn-footer">
	<div class="container">
	<?php echo ($f["scopyright"]); ?>
	</div>
</footer><?php endforeach; endif; else: echo "" ;endif; ?>  

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/luoshublog/Public/js/jquery.js"></script>
	<script src="/luoshublog/Public/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    
  </body>
</html>