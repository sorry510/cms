<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if(laimi_config_trade()['worker_module'] != 1){
	echo '<script> window.history.back();</script>';
	return false;
}
$strid = api_value_get('id');
$intid = api_value_int0($strid);
$intshop = $GLOBALS['_SESSION']['login_sid'];
$strchannel = 'worker';

$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('sgoods_list', get_sgoods_list());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('sgoods_catalog_list', get_sgoods_catalog_list());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_assign('reward_list', get_group_reward_list());
$gtemplate->fun_show('worker_group_reward_edit');


function get_mgoods_catalog_list(){
	$arr = array();
	$strsql = "SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}
function get_sgoods_catalog_list(){
	$arr = array();
	$strsql = "SELECT sgoods_catalog_id, sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." ORDER BY sgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_list() {
	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$strsql = "SELECT a.*,b.group_reward2_money,b.group_reward2_percent FROM (SELECT mgoods_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_catalog_id = ".$row['mgoods_catalog_id']." and mgoods_state=1 ORDER BY mgoods_id desc) as a LEFT JOIN (SELECT mgoods_id,group_reward2_money,group_reward2_percent FROM ".$GLOBALS['gdb']->fun_table2('group_reward2')." WHERE worker_group_id=".$GLOBALS['intid']." and shop_id = ".$GLOBALS['intshop'].") as b on a.mgoods_id = b.mgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['mgoods'] = $arrmgoods;
	}
	return $arr;
}
function get_sgoods_list() {
	$arr = array();
	$arrsgoods = array();
	$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." WHERE shop_id=".$GLOBALS['intshop']." order by sgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$strsql = "SELECT a.*,b.group_reward2_money,b.group_reward2_percent FROM (SELECT sgoods_id, sgoods_name, sgoods_price FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_catalog_id = ".$row['sgoods_catalog_id']." and sgoods_state=1 ORDER BY sgoods_id desc) as a LEFT JOIN (SELECT sgoods_id,group_reward2_money,group_reward2_percent FROM ".$GLOBALS['gdb']->fun_table2('group_reward2')." WHERE worker_group_id=".$GLOBALS['intid']." and shop_id = ".$GLOBALS['intshop'].") as b on a.sgoods_id = b.sgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$row['sgoods'] = $arrsgoods;
	}
	return $arr;
}

function get_mcombo_list(){
	$arr = array();
	$strsql = "SELECT a.*,b.group_reward2_money,b.group_reward2_percent FROM (SELECT mcombo_id,mcombo_price, mcombo_name FROM " . $GLOBALS['gdb']->fun_table2('mcombo') . " WHERE mcombo_state = 1 order by mcombo_id desc) as a LEFT JOIN (SELECT mcombo_id,group_reward2_money,group_reward2_percent FROM ".$GLOBALS['gdb']->fun_table2('group_reward2')." WHERE worker_group_id=".$GLOBALS['intid']." and shop_id = ".$GLOBALS['intshop'].") as b on a.mcombo_id = b.mcombo_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_group_reward_list(){
	$arr = array();
	$strsql = "SELECT group_reward_create,group_reward_fill,group_reward_pfill,group_reward_guide,group_reward_pguide FROM ".$GLOBALS['gdb']->fun_table2('group_reward')." where worker_group_id=".$GLOBALS['intid']." and shop_id = ".$GLOBALS['intshop'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$arr['group_reward_create'] = 0;
		$arr['group_reward_fill'] = 0;
		$arr['group_reward_pfill'] = 0;
		$arr['group_reward_guide'] = 0;
		$arr['group_reward_pguide'] = 0;
	}
	return $arr;
}
?>