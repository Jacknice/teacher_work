<?php
return array(
	//'配置项'=>'配置值'
	'URL_PATHINFO_DEPR'=>'/',//修改URL的分隔符
	'TMPL_L_DELIM'=>'<{', //修改左定界符
	'TMPL_R_DELIM'=>'}>', //修改右定界符
//	'DB_TYPE'=>'mysql',   //设置数据库类型
//	'DB_HOST'=>'localhost',//设置主机
//	'DB_NAME'=>'thinkphp',//设置数据库名
//	'DB_USER'=>'root',    //设置用户名
//	'DB_PWD'=>'',        //设置密码
//	'DB_PORT'=>'3306',   //设置端口号
	'DB_PREFIX'=>'te_',  //设置表前缀
	'DB_DSN'=>'mysql://root:@127.0.0.1:3306/teacher',//使用DSN方式配置数据库信息
	'SHOW_PAGE_TRACE'=>false,//开启页面Trace
	'TMPL_TEMPLATE_SUFFIX'=>'.html',//更改模板文件后缀名
	//'TMPL_FILE_DEPR'=>'_',//修改模板文件目录层次
	//'DEFAULT_THEME'=>'my',//设置默认模板主题
	//'TMPL_DETECT_THEME'=>true,//自动侦测模板主题
	//'THEME_LIST'=>'your,my',//支持的模板主题列表
	'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
		'__CSS__'=>__ROOT__.'/Public/Css',
		'__JS__'=>__ROOT__.'/Public/Js',
	),
);
?>
