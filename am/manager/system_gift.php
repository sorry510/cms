<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['score_module'] != 1) {
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
	$strwhere = '';
	if($GLOBALS['strname'] != ''){
		$strwhere .= " AND gift_name like '%" . $GLOBALS['sqlname'] . "%'";
	}
	
	$arr = array();
	$strsql = "SELECT gift_id, gift_name, gift_score FROM ". $GLOBALS['gdb']->fun_table2('gift') . " WHERE 1=1" . $strwhere . " ORDER BY gift_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>