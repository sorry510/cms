<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'workbench';
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_show('workbench2');

function get_mcombo_list(){
	$arr = array();
	$arrgoods = array();
	$strsql = "SELECT mcombo_id,mcombo_name,mcombo_type,mcombo_price,mcombo_cprice,mcombo_act,mcombo_limit_type,mcombo_limit_days,mcombo_limit_months FROM ".$GLOBALS['gdb']->fun_table2('mcombo'). " where mcombo_state =1 order by mcombo_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		if($row['mcombo_limit_type'] == 1){
			$row['days'] = '无限期';
		}else if($row['mcombo_limit_type'] == 2){
			$row['days'] = $row['mcombo_limit_days'].'天';
		}
		$strsql = "SELECT a.*,b.mgoods_name FROM (SELECT mgoods_id,mcombo_goods_count FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods'). " where mcombo_id =".$row['mcombo_id'].") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['goods'] = $arrgoods;
	}
	return $arr;
}
function get_worker_list(){
	$arr = array();
	$strsql = "SELECT worker_id,worker_name FROM " . $GLOBALS['gdb']->fun_table2('worker')." where shop_id = ".$GLOBALS['_SESSION']['login_sid']." order by worker_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
function get_card_type_list(){
	$arr = array();
	$strsql = "SELECT card_type_id,card_type_name,card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card_type')." order by card_type_discount asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}