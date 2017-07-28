<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gconfig = array();
$gconfig['path']['pic'] = C_ROOT.'/photo';


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