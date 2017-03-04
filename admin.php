<?php
	//应用目录
	define('APP_PATH', './Application/');
	
	//默认模块
	define('BIND_MODULE','Admin');

	// 开启调试模式
	define('APP_DEBUG', true); 
	
	// 定义运行时目录
	define('RUNTIME_PATH','./Runtime/');

	require './ThinkPHP/ThinkPHP.php';
