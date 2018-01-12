<?php
if(!defined('C_CNFLY')) {
	exit();
}

function laimi_user_info() {
	$strname = '';
	$arr = array();
	$strsql = "SELECT user_id, user_name FROM " . $GLOBALS['gdb']->fun_table2('user') . " WHERE user_id = " . api_value_int0($GLOBALS['_SESSION']['login_id']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$strname = $arr['user_name'];
	}
	return $strname;
}
?>