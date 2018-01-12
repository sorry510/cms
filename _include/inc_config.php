<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gconfig = array();
$gconfig['system']['version'] = 'V2.0';
$gconfig['path']['upload'] = 'c:/wwwroot/upload.test';
$gconfig['path']['worker_photo'] = '/worker_photo';
$gconfig['path']['worker_identity'] = '/worker_identity';
$gconfig['path']['card_photo'] = '/card_photo';
$gconfig['path']['card_history'] = '/card_history';
$gconfig['path']['wgoods_image'] = '/wgoods_image';
$gconfig['path']['weixin'] = 'c:/wwwroot/weixin.test.laimisoft.com/upload';
$gconfig['path']['card_background'] = '/card_background';

$gconfig['project']['url_mobile'] = 'http://test.axin.cc/mshop';
$gconfig['image']['base'] = '..'.DIRECTORY_SEPARATOR.'am'.DIRECTORY_SEPARATOR.'manager'.DIRECTORY_SEPARATOR.'D:'.DIRECTORY_SEPARATOR.'UPUPW5.6'.DIRECTORY_SEPARATOR.'UPUPW_AP5.6'.DIRECTORY_SEPARATOR.'htdocs'.DIRECTORY_SEPARATOR.'photo'.DIRECTORY_SEPARATOR;
$gconfig['photo'][0] = C_ROOT.'/photo/temp/';
$gconfig['path']['photo'] = C_ROOT.'/photo';

$gconfig['worker']['education'][0] = '';
$gconfig['worker']['education'][1] = '小学';
$gconfig['worker']['education'][2] = '初中';
$gconfig['worker']['education'][3] = '高中';
$gconfig['worker']['education'][4] = '专科';
$gconfig['worker']['education'][5] = '本科';
$gconfig['worker']['education'][6] = '研究生';
$gconfig['worker']['education'][7] = '博士';

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
$gcompanyname = laimi_company_info();
$gshop = laimi_shop_list();
$gtrade = laimi_company_trade();

$gtemplate = NULL;
if(!defined('C_NOTEMPLATE')) {
	require(C_ROOT . '/_include/cls_template.php');
	$gtemplate = new cls_template();
	$gtemplate->pubnocache = true;
}
?>