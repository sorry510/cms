<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['score_module'] != 1){
	// echo '<scirpt> window.location.href="#"</scirpt>';
	echo '<script> window.history.back();</script>';
	return;
}

$strchannel = 'system';

$strname = api_value_get('name');
$sqlname = $gdb->fun_escape($strname);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('gift_list', get_gift_list());
$gtemplate->fun_show('system_gift');


function get_request(){
	$arr = array();
	$arr['name'] = $GLOBALS['strname'];
	return $arr;
}
function get_gift_list(){
	$arr = array();
	$strwhere = '';
	if($GLOBALS['sqlname'] != ''){
		$strwhere .= " AND gift_name like '%".$GLOBALS['sqlname']."%'";
	}
	$strsql = "SELECT gift_id,gift_name,gift_score,gift_atime FROM ". $GLOBALS['gdb']->fun_table2('gift')." WHERE 1=1 ".$strwhere." ORDER BY gift_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$row['atime'] = date('Y-m-d H:i:s', $row['gift_atime']);
	}
	return $arr;
}
?>