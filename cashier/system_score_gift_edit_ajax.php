<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strgift_id = api_value_get('gift_id');
$intgift_id = api_value_int0($strgift_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT gift_id, gift_name, gift_score  FROM ". $GLOBALS['gdb']->fun_table2('gift')." WHERE gift_id = ". $intgift_id ." LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	
	echo json_encode($arr);
}


?>