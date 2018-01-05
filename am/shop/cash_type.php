<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'cash';
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('cash_type', get_cash_type());
$gtemplate->fun_show('cash_type');

function get_cash_type(){
	$arr = array();
	$strwhere = '';
	$strwhere .=" and shop_id=".$GLOBALS['intshop'];
	
	$strsql = "SELECT cash_type_id,cash_type_name FROM ".$GLOBALS['gdb']->fun_table2('cash_type')." WHERE 1=1 ".$strwhere." order by cash_type_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>