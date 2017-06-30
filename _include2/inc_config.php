<?php
if(!defined('C_CNFLY')) {
	exit();
}

/*$gconfig = array();
$gconfig['cnfly']['name'] = '郑州中扬计算机技术有限公司';
$gconfig['cnfly']['phone'] = '400-623-8860';
$gconfig['cnfly']['url'] = 'http://www.5ichina.com';
$gconfig['company']['name'] = '洛阳阿新奶业有限公司';
$gconfig['company']['phone'] = '0379-63188866';
$gconfig['branch']['name'] = '在线商城系统';
$gconfig['project']['name'] = '阿新在线商城系统';
$gconfig['project']['url_manager'] = 'http://manage.axzyd.com';
$gconfig['project']['url_pc'] = 'http://www.axzyd.com';
$gconfig['project']['url_weixin'] = 'http://weixin.axzyd.com';
$gconfig['project']['url_mobile'] = 'http://m.axzyd.com';
$gconfig['project']['version'] = 'V1.0';//2016-3-13 ~ 
$gconfig['other']['week'] = array('日','一','二','三','四','五','六');

$gconfig['channel']['a'][0] = '关于阿新';
$gconfig['channel']['a'][1] = '了解阿新';
$gconfig['channel']['a'][2] = '阿新自由订';
$gconfig['channel']['a'][3] = '企业文化';
$gconfig['channel']['b'][0] = '订购指南';
$gconfig['channel']['b'][1] = '订购方法';
$gconfig['channel']['b'][2] = '订购流程';
$gconfig['channel']['b'][3] = '退订流程';
$gconfig['channel']['c'][0] = '帮助中心';
$gconfig['channel']['c'][1] = '常见问题';
$gconfig['channel']['c'][2] = '联系客服';
$gconfig['channel']['d'][0] = '支付方式';
$gconfig['channel']['d'][1] = '支付宝支付';
$gconfig['channel']['d'][2] = '微信支付';
$gconfig['channel']['e'][0] = '配送中心';
$gconfig['channel']['e'][1] = '配送方式';
$gconfig['channel']['e'][2] = '配送区域';*/

require(C_ROOT . '/_include/cls_mysql.php');

$gdb = new cls_mysql();
// $gdb->pub_host = 'nw132dbk.2278lan.dnstoo.com';
// $gdb->pub_user = 'ps930i_f';
// $gdb->pub_password = 'qaz123456';
// $gdb->pub_name = 'ps930i';
// $gdb->pub_prefix = 'bgn_';

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