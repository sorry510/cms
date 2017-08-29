<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($intid)) {
		$intreturn = 1;
	}
}

/*if($intreturn == 0) {
	$strsql = 'SELECT ticket_goods_id,act_give_start,act_give_end FROM' . $GLOBALS['gdb']->fun_table2('act_give') .' WHERE  ticket_goods_id = ' . $intid;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}elseif (empty($arr) == true) {
		$intreturn = 0;
	}
	if (!empty($arr)) {
			if (time() > $arr['act_give_start']) {
			$intreturn = 100;
			}else{
				$intreturn = 0;
			}
	}
}*/

if($intreturn == 0) {
	$strsql = "DELETE FROM " . $gdb->fun_table2('ticket_goods') . " WHERE ticket_goods_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;

?>