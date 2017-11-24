<?php
if(!defined('C_CNFLY')) {
	exit();
}

@ini_set('memory_limit', '64M');
@ini_set('session.auto_start', 0);//不自动开启session_start()
@ini_set('session.use_cookies', 1);//启用cookie记录客户端sessionid
@ini_set('session.use_trans_uid', 0);//不启用 每个urlsession名=sessionId
@ini_set('session.cache_expire', 180);//以分钟数指定缓冲的会话页面的存活期,
@ini_set('display_errors', 1);

if(PHP_VERSION >= '5.1') {
	date_default_timezone_set('PRC');
}
header('Expires: Fri, 31 Dec 1999 16:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s ') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-type: text/html; charset=utf-8');
mb_regex_encoding('UTF-8');

require(C_ROOT . '/_include/inc_api.php');
//get_magic_quotes_gpc() true时为get，post，cookie增加转义字符“\”
if(get_magic_quotes_gpc()) {
	$_GET = api_other_gpc($_GET);//去掉转义字符“\”
	$_POST = api_other_gpc($_POST);
	$_COOKIE = api_other_gpc($_COOKIE);
	$_REQUEST = api_other_gpc($_REQUEST);
}

require(C_ROOT . '/_include/inc_function.php');
require(C_ROOT . '/_include/inc_config.php');
require(C_ROOT . C_PATH . '/inc_function.php');
require(C_ROOT . C_PATH . '/inc_config.php');

if (function_exists('ob_gzhandler')) {
	ob_start('ob_gzhandler');
} else {
	ob_start();
}
?>