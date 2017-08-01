<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'worker';

$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('group_reward_list', get_group_reward_list());
$gtemplate->fun_show('worker_reward');

function get_mgoods_catalog_list(){
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." ORDER BY mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}
function get_sgoods_catalog_list(){
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id, sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." ORDER BY sgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}

function get_mgoods_list() {
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	foreach($arr as $k=>$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$v['mgoods_catalog_id']." ORDER BY mgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr[$k]['mgoods'] = $arrmgoods;
	}
	return $arr;
} 

function get_sgoods_list() {
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." order by sgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	foreach($arr as $k=>$v){
		$strsql = "SELECT sgoods_id, sgoods_name, sgoods_price FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_catalog_id = ".$v['sgoods_catalog_id']." ORDER BY sgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr[$k]['sgoods'] = $arrsgoods;
	}
	return $arr;
} 

function get_group_reward_list(){
	$arr = array();
	$strsql = "SELECT a.worker_group_id, a.worker_group_name, b.worker_group_id, b.group_reward_ctime FROM " . $GLOBALS['gdb']->fun_table2('worker_group')."  AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('group_reward') . " AS b ON a.worker_group_id = b.worker_group_id ORDER BY a.worker_group_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}




?>