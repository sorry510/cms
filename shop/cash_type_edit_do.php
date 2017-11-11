<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_type_id = api_value_post('txtid');
$intcash_type_id = api_value_int0($strcash_type_id);
$strcash_type_name = api_value_post('txtname');
$sqlcash_type_name = $gdb->fun_escape($strcash_type_name);

$intreturn = 0;
$arr = array();

$strsql = "SELECT cash_type_id FROM ".$gdb->fun_table2('cash_type')." WHERE cash_type_id=".$intcash_type_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('cash_type')." SET cash_type_name='".$sqlcash_type_name."' where cash_type_id=".$intcash_type_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}
echo $intreturn;
