<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'tongji';

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strdata_time = api_value_get('data_time');
$intdata_time = api_value_int0($strdata_time);
$inttime = time();

$inttoday = strtotime(date('Y-m-d'));
$intmonth = strtotime(date('Y-m'));

$strwhere = '';
if ($intshop_id != 0) {
	$strwhere = ' AND shop_id = ' . $intshop_id;
}

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('money', get_money());
$gtemplate->fun_show('tongji_shop_revenue');

function get_request() {
	$arr = array();
	$arr['shop_id'] = $GLOBALS['strshop_id'];
	$arr['data_time'] = $GLOBALS['intdata_time'];
	return $arr;
}

function get_shop() {
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) ." ORDER BY shop_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_money() {
	$arr = array();
	if ($GLOBALS['intdata_time'] == 1) {
		$intfrom = strtotime("-30 day",$GLOBALS['inttoday']);
	}else{
		$intfrom = strtotime("-12 month",$GLOBALS['intmonth']);
	}
	$strsql = "SELECT a.shop_id,a.shop_name,sum(card_record_smoney) as sum_money FROM (SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop') . " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) .$GLOBALS['strwhere']. ") as a LEFT JOIN (SELECT card_record_smoney,shop_id FROM ". $GLOBALS['gdb']->fun_table2('card_record')." WHERE card_record_state = 1 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$GLOBALS['inttime'].") as b on a.shop_id = b.shop_id GROUP BY a.shop_id order by a.shop_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>