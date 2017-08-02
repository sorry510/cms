<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$struser_id = api_value_get('user_id');
$intuser_id = api_value_int0($struser_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strwhere = '';
	if($GLOBALS['intuser_id'] > 0) {
		$strwhere = $strwhere . " AND user_id = " . $GLOBALS['intuser_id'];
	}

	$strsql = "SELECT user_id, shop_id, user_type, user_account, user_password, worker_id, user_name  FROM ". $GLOBALS['gdb']->fun_table2('user')." WHERE 1=1 ". $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	echo json_encode($arr);
}

?>