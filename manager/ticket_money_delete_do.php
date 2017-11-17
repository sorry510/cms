<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['act_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($intid)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('ticket_money') . " WHERE ticket_money_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}
echo $intreturn;

?>