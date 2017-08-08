<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gconfig = array();
$gconfig['path']['photo'] = C_ROOT.'/photo';
$gconfig['path']['photo_show'] = $_SERVER['HTTP_HOST'].'/cnflycms/photo';
$gconfig['system']['guimo'][1] = '0-10人';
$gconfig['system']['guimo'][2] = '10-30人';
$gconfig['system']['guimo'][3] = '30-100人';
$gconfig['system']['guimo'][4] = '100人以上';
$gconfig['system']['xingzhi'][1] = '服务业';
$gconfig['system']['xingzhi'][2] = '汽车业';
$gconfig['system']['xingzhi'][3] = '餐饮业';
$gconfig['worker']['education'][1] = '小学';
$gconfig['worker']['education'][2] = '初中';
$gconfig['worker']['education'][3] = '高中';
$gconfig['worker']['education'][4] = '专科';
$gconfig['worker']['education'][5] = '本科';
$gconfig['worker']['education'][6] = '研究生';
$gconfig['worker']['education'][7] = '博士';


require(C_ROOT . '/_include/cls_mysql.php');
// $gdb = new cls_mysql();
// $gdb->pub_host = 'nw132dbk.2278lan.dnstoo.com';
// $gdb->pub_user = 'ps930i_f';
// $gdb->pub_password = 'qaz123456';
// $gdb->pub_name = 'ps930i';
// $gdb->pub_prefix = 'cf_';
// $gdb->pub_charset = 'utf8';
// $gdb->fun_connect();

$gdb = new cls_mysql();
$gdb->pub_host = 'localhost';
$gdb->pub_user = 'root';
$gdb->pub_password = 'root';
$gdb->pub_name = 'cf_cms';
$gdb->pub_prefix = 'cf_';
$gdb->pub_charset = 'utf8';
$gdb->fun_connect();

$gsession = NULL;
if(!defined('C_NOSESSION')) {
	require(C_ROOT . '/_include/cls_session.php');
	$gsession = new cls_session();
	$gsession->fun_init($gdb);
}

$gtemplate = NULL;
if(!defined('C_NOTEMPLATE')) {
	require(C_ROOT . '/_include/cls_template.php');
	$gtemplate = new cls_template();
	$gtemplate->pub_nocache = true;
}
?>