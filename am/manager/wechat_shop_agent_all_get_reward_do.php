<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

if (empty($intid)) {
	$intreturn = 1;
}

if ($intreturn == 0) {
	$decreward1 = 0;
	$strsql = "SELECT sum(s_worder_reward) as sum_reward FROM " . $GLOBALS['gdb']->fun_table2('worder') . " WHERE (worder_state = 2 OR worder_state = 3) AND s_worder_reward != 0 AND card_parent_id = " . $intid ." GROUP BY card_parent_id";
	$hresult = $gdb->fun_query($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if (!empty($arr)) {
		$decreward1 = $arr['sum_reward'];
	}
}

if ($intreturn == 0) {
	$decreward2 = 0;
	$strsql = "SELECT sum(wmoney_value) as sum_value FROM ". $GLOBALS['gdb']->fun_table2('wmoney') ." WHERE card_id = ".$intid." GROUP BY card_id";
	$hresult = $gdb->fun_query($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if (!empty($arr)) {
		$decreward2 = $arr['sum_value'];
	}
}

if ($intreturn == 0 ) {
	$strsql = "SELECT user_name FROM ". $GLOBALS['gdb']->fun_table2('user') ." WHERE user_id = ".api_value_int0($GLOBALS['_SESSION']['login_id']);
	$hresult = $gdb->fun_query($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$sqluser_name = $arr['user_name'];
}

if ($intreturn == 0) {
	if ($decreward1 > $decreward2) {

		$decreal_reward = $decreward1 - $decreward2;

		$strsql = "INSERT INTO " . $gdb->fun_table2('wmoney') . " (card_id, user_id, c_user_name, wmoney_atime, wmoney_value) VALUES ("
	.$intid . " , " . api_value_int0($GLOBALS['_SESSION']['login_id']) . ", '" . $sqluser_name ."', " . time() ." , ".$decreal_reward." )";

		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 5;
		}
	}else{
		$intreturn = 4;
	}
}

echo $intreturn;

?>