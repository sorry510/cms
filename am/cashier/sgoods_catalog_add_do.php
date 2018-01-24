<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);

$intreturn = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('sgoods_catalog') . " (shop_id, sgoods_catalog_name, sgoods_catalog_atime, sgoods_catalog_ctime) VALUES ("
	. api_value_int0($GLOBALS['_SESSION']['login_sid']) . ", '" . $sqlname . "', " . time() . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>