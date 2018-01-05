<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['score_module'] != 1) {
	return '';
}

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = "SELECT gift_id, gift_name, gift_score FROM " . $GLOBALS['gdb']->fun_table2('gift') . " WHERE gift_id = " . $intid . " LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

echo json_encode($arr);
?>