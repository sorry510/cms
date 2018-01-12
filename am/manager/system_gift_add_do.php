<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['score_module'] != 1) {
	return 1;
}

$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strscore = api_value_post('txtscore');
$intscore = api_value_int0($strscore);

$intreturn = 0;

$inttime = time();
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('gift') . " (gift_name, gift_score, gift_atime, gift_ctime) VALUES ('" . $sqlname . "', " . $intscore . ", " . $inttime . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE){
		$intreturn = 1;
	}
}

echo $intreturn;
?>