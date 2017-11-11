<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_id = api_value_post('id');
$intcash_id = api_value_int0($strcash_id);

$intreturn = 0;
$arr = array();

if($intreturn == 0){
	$strsql = "DELETE FROM ".$gdb->fun_table2('cash')." where cash_id=".$intcash_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 1;
	}
}

echo $intreturn;
