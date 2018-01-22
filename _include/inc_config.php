<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gconfig = array();
$gconfig['system']['version'] = 'V2.0';
$gconfig['path']['weixin'] = 'c:/wwwroot/weixin.test.laimisoft.com/upload';
$gconfig['path']['card_background'] = '/card_background';
$gconfig['path']['share_image'] = '/share_image';
$gconfig['path']['ad_image'] = '/ad_image';
$gconfig['path']['wgoods_image'] = '/wgoods_image';
$gconfig['url']['weixin'] = 'http://weixin.test.laimisoft.com';

require(C_ROOT . '/_include/cls_mysql.php');
$gdb = new cls_mysql();
$gdb->pubhost = 'rm-2ze3558769868i513.mysql.rds.aliyuncs.com:3306';
$gdb->pubuser = 'root';
$gdb->pubpassword = 'Laimisoft123';
$gdb->pubname = 'laimi';
$gdb->pubprefix = 'lm_';
$gdb->pubcharset = 'utf8';
$gdb->fun_connect();

$gsession = NULL;
if(!defined('C_NOSESSION')) {
	require(C_ROOT . '/_include/cls_session.php');
	$gsession = new cls_session();
	$gsession->fun_init($gdb);
}
$gdb->pubprefix2 = laimi_prefix2_value();
$gwshop = laimi_config_wshop();
$gcart = laimi_cart_count();

$gtemplate = NULL;
if(!defined('C_NOTEMPLATE')) {
	require(C_ROOT . '/_include/cls_template.php');
	$gtemplate = new cls_template();
	$gtemplate->pubnocache = true;
}
?>