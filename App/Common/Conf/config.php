<?php
return array(
	//'配置项'=>'配置值'
	//PDO专用定义
	'DB_TYPE'=>'pdo',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PREFIX'=>'think_',////数据库表前缀
	'DB_DSN'=>'mysql:host=localhost;dbname=blog;charset=UTF8',	

	//rewrite模式
	'URL_MODEL'=>2,	

	//成功错误页面
	'TMPL_ACTION_SUCCESS'=>'Public/success.html', 
	'TMPL_ACTION_ERROR'=> 'Public/error.html',
	
	
		
	'auto_timestamp' => true,
	
	//页面Trace   页面调试工具
	//'SHOW_PAGE_TRACE' =>true,

		
	'URL_ROUTER_ON' => TRUE,
	
	'MODULE_ALLOW_LIST' => array('Home','Adminls'),
	'DEFAULT_MODULE' => 'Home', // 默认模块，可以省去模块名输入
		
// 	'URL_ROUTE_RULES' => array(
// 			'/^c-(\d+)$/' => 'Index/content?id=:1'
// 	),
// 	'URL_ROUTER_ON '=>true,
// 	'URL_MODEL'          => '1',
	
// 	'URL_ROUTE_RULES'=>array(
// 			'/^p-(\d+)$/' => 'Home/New/index?id=:1',//意思是访问x.com/p-34 会访问的是x.com/Blog/index/id/34
// 			),

		
	'URL_ROUTE_RULES'=>array(
		'/^n-(\d+)$/'=>'New/index?id=:1', 
		'/^c-(\d+)$/'=>'Cates/index?id=:1',
	),
);