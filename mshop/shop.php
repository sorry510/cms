<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$GLOBALS['_SESSION']['login_openid'] = '111';

$gtemplate->fun_assign('notice', get_notice());
$gtemplate->fun_show('shop');

function get_notice(){
	$arr = array();
	$strsql = "SELECT wnotice_id,wnotice_title FROM " . $GLOBALS['gdb']->fun_table2('wnotice')." order by wnotice_atime desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
