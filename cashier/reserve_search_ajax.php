<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strphone = api_value_get('phone');
$sqlphone = $gdb->fun_escape($strphone);
$time = time();

$strwhere = '';
if($GLOBALS['sqlphone'] != '') {
	$strwhere = $strwhere . " AND card_phone = '" . $sqlphone ."'";
}

$strsql = 'SELECT card_id,card_code FROM' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state = 1  '. $strwhere .'  LIMIT 1';

$hresult = $gdb->fun_do($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

echo json_encode($arr);
/*echo $strsql;
*/
?>