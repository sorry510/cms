<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strstore_id = api_value_post('store_id');
$intstore_id = api_value_int0($strstore_id);

$intreturn = 0;

$strsql = "UPDATE " . $gdb->fun_table2('store') . " SET store_state=2,store_ctime=".time()." WHERE store_id = " . $intstore_id . " LIMIT 1" ;
$hresult = $gdb->fun_do($strsql);
if($hresult == FALSE) {
	$intreturn = 1;
}

echo $intreturn;
?>