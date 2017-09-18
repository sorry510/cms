<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_type_name = api_value_post('name');
$sqlcash_type_name = $gdb->fun_escape($strcash_type_name);

$intreturn = 0;
$arr = array();

$strsql = "SELECT cash_type_id FROM ".$gdb->fun_table2('cash_type')." WHERE cash_type_name='".$sqlcash_type_name."' and shop_id=".$GLOBALS['_SESSION']['login_sid'];
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('cash_type')." (shop_id,cash_type_name,cash_type_atime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",'".$sqlcash_type_name."',".time().")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}

echo $intreturn;
