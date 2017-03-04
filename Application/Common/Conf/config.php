<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
	'DB_HOST'               =>  '', // 服务器地址
	'DB_NAME'               =>  '',          // 数据库名
	'DB_USER'               =>  '',      // 用户名
	'DB_PWD'                =>  '',          // 密码
	'DB_PREFIX'             =>  'bbs_',    // 数据库表前缀

	'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session

	'TMPL_TEMPLATE_SUFFIX'  =>  '.html',     // 默认模板文件后缀
	'TMPL_L_DELIM'          =>  '<{',            // 模板引擎普通标签开始标记
	'TMPL_R_DELIM'          =>  '}>',            // 模板引擎普通标签结束标记

	'URL_MODEL'             =>  2,				// URL访问模式,可选参数0、1、2、3,代表四种模式
	'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置

	'MODULE_ALLOW_LIST'        => array('Home', 'Admin')
);