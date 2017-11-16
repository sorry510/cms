<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gconfig = array();
$gconfig['system']['version'] = 'V2.0';
/*$gconfig['system']['code']['ty'] = '通用行业';
$gconfig['system']['hangye']['am'] = '推拿按摩';
$gconfig['system']['xingzhi']['gt'] = '个体';
$gconfig['system']['xingzhi']['gf'] = '股份有限公司';
$gconfig['system']['guimo']['x10'] = '0-10人';
$gconfig['system']['guimo']['x30'] = '10-30人';
$gconfig['system']['guimo']['x100'] = '30-100人';
$gconfig['system']['guimo']['d100'] = '100人以上';*/

$gconfig['image']['base'] = 'D:'.DIRECTORY_SEPARATOR.'UPUPW5.6'.DIRECTORY_SEPARATOR.'UPUPW_AP5.6'.DIRECTORY_SEPARATOR.'htdocs'.DIRECTORY_SEPARATOR.'photo'.DIRECTORY_SEPARATOR;
$gconfig['photo'][0] = C_ROOT.'/photo/temp/';
$gconfig['catalog'][0] = 'history';
$gconfig['catalog'][1] = 'worker';
$gconfig['catalog'][2] = 'shop';


$gconfig['photo'][1] = C_ROOT.'/photo/company/';
$gconfig['photo'][2] = C_ROOT.'/photo/shop/';
$gconfig['photo'][3] = C_ROOT.'/photo/worker/';
$gconfig['photo'][4] = C_ROOT.'/photo/card/';
$gconfig['photo'][5] = C_ROOT.'/photo/history/';//档案
$gconfig['show'][1] = $_SERVER['HTTP_HOST'].'/shop/photo/company/';
$gconfig['show'][2] = $_SERVER['HTTP_HOST'].'/shop/photo/shop/';
$gconfig['show'][3] = $_SERVER['HTTP_HOST'].'/shop/photo/worker/';
$gconfig['show'][4] = $_SERVER['HTTP_HOST'].'/shop/photo/card/';
$gconfig['show'][5] = $_SERVER['HTTP_HOST'].'/shop/photo/history/';

$gconfig['education'][1] = '小学';
$gconfig['education'][2] = '初中';
$gconfig['education'][3] = '高中';
$gconfig['education'][4] = '专科';
$gconfig['education'][5] = '本科';
$gconfig['education'][6] = '研究生';
$gconfig['education'][7] = '博士';


require(C_ROOT . '/_include/cls_mysql.php');
$gdb = new cls_mysql();
$gdb->pub_host = 'localhost';
$gdb->pub_user = 'root';
$gdb->pub_password = 'root';
$gdb->pub_name = 'cf_shop';
$gdb->pub_prefix = 'cf_';
$gdb->pub_charset = 'utf8';
$gdb->fun_connect();

// var_dump($gdb);exit;
$gsession = NULL;
if(!defined('C_NOSESSION')) {
	require(C_ROOT . '/_include/cls_session.php');
	$gsession = new cls_session();
	$gsession->fun_init($gdb);
}
$gdb->pub_prefix2 = laimi_prefix2_value();

$gtemplate = NULL;
if(!defined('C_NOTEMPLATE')) {
	require(C_ROOT . '/_include/cls_template.php');
	$gtemplate = new cls_template();
	$gtemplate->pub_nocache = true;
}
?>