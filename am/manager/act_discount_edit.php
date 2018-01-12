<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return;
}

$strchannel = 'act';

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('act_discount_info', get_act_discount_info());
$gtemplate->fun_assign('mgoods_catalog_list', get_mgoods_catalog_list());
$gtemplate->fun_assign('mgoods_list', get_mgoods_list());
$gtemplate->fun_assign('mcombo_list', get_mcombo_list());
$gtemplate->fun_show('act_discount_edit');
/*$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('mcombo', get_mcombo());
$gtemplate->fun_assign('mgoods_catalog', get_mgoods_catalog());*/

function get_mgoods_catalog_list() {
	$arr = array();
	$strsql = " SELECT mgoods_catalog_id, mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . " ORDER BY mgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_list() {
	$arr = array();
	$strsql = "SELECT a.*, b.* FROM (SELECT mgoods_id, mgoods_name, mgoods_price, mgoods_catalog_id FROM " . $GLOBALS['gdb']->fun_table2('mgoods')
	. " WHERE mgoods_act = 1 AND mgoods_state = 1) AS a LEFT JOIN (SELECT act_discount_goods_id, mgoods_id, act_discount_goods_value, act_discount_goods_price FROM "
	. $GLOBALS['gdb']->fun_table2('act_discount_goods') . " WHERE act_discount_id = " . $GLOBALS['intid'] . " AND mgoods_id > 0) AS b ON a.mgoods_id = b.mgoods_id "
	. "ORDER BY a.mgoods_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row) {
		$row['myvalue'] = 0;
		if(!empty($row['act_discount_goods_value'])) {
			$row['myvalue'] = $row['act_discount_goods_value'] + 0;
		}
		$row['myprice'] = 0;
		if(!empty($row['act_discount_goods_price'])) {
			$row['myprice'] = $row['act_discount_goods_price'];
		}
	}
	return $arr;
}

function get_mcombo_list() {
	$arr = array();
	$strsql = "SELECT a.*, b.* FROM (SELECT mcombo_id, mcombo_name, mcombo_price FROM " . $GLOBALS['gdb']->fun_table2('mcombo')
	. " WHERE mcombo_act = 1 AND mcombo_state = 1) AS a LEFT JOIN (SELECT act_discount_goods_id, mcombo_id, act_discount_goods_value, act_discount_goods_price FROM "
	. $GLOBALS['gdb']->fun_table2('act_discount_goods') . " WHERE act_discount_id = " . $GLOBALS['intid'] . " AND mcombo_id > 0) AS b ON a.mcombo_id = b.mcombo_id "
	. "ORDER BY a.mcombo_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row) {
		$row['myvalue'] = 0;
		if(!empty($row['act_discount_goods_value'])) {
			$row['myvalue'] = $row['act_discount_goods_value'] + 0;
		}
		$row['myprice'] = 0;
		if(!empty($row['act_discount_goods_price'])) {
			$row['myprice'] = $row['act_discount_goods_price'];
		}
	}
	return $arr;
}

function get_act_discount_info() {
	$arr = array();
	$strsql = "SELECT act_discount_id, act_discount_name, act_discount_client, act_discount_start, act_discount_end, act_discount_memo FROM "
	. $GLOBALS['gdb']->fun_table2('act_discount') . " WHERE act_discount_id = ".$GLOBALS['intid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}

function get_goods_json() {
	$arr = array();
	$strsql = "SELECT act_discount_goods_id, mgoods_id, mcombo_id, act_discount_goods_value, act_discount_goods_price FROM " . $GLOBALS['gdb']->fun_table2('act_discount_goods')
	. " WHERE act_discount_id = " . $GLOBALS['intid'] . " ORDER BY act_discount_goods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$json = json_encode($arr);
	return $json;
}
/*function get_mgoods(){
	$arr = array();
	$strsql = ' SELECT mgoods_id, mgoods_name,mgoods_price, mgoods_catalog_id FROM ' . $GLOBALS['gdb']->fun_table2('mgoods') . 'WHERE mgoods_act = 1 AND mgoods_state = 1 order by mgoods_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods_catalog(){
	$arr = array();
	$strsql = ' SELECT mgoods_catalog_id, mgoods_catalog_name FROM ' . $GLOBALS['gdb']->fun_table2('mgoods_catalog') . ' order by mgoods_catalog_id ';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mcombo(){
	$arr = array();
	$strsql = 'SELECT mcombo_id,mcombo_price, mcombo_name FROM ' . $GLOBALS['gdb']->fun_table2('mcombo') . ' WHERE mcombo_act = 1 AND mcombo_state = 1 order by mcombo_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}*/

/*function get_goods(){
	$arr = array();
	$strsql = "SELECT mgoods_id,mcombo_id,act_discount_goods_value,act_discount_goods_price FROM " . $GLOBALS['gdb']->fun_table2('act_discount_goods') . " WHERE act_discount_id = " . $GLOBALS['intid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$json = json_encode($arr);
	return $json;
}*/
?>