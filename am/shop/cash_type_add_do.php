<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_type_name = api_value_post('txtname');
$sqlcash_type_name = $gdb->fun_escape($strcash_type_name);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$intreturn = 0;
$arr = array();

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('cash_type')." (shop_id,cash_type_name,cash_type_atime) VALUES (".$intshop.",'".$sqlcash_type_name."',".time().")";
	$hresult = $gdb->fun_do($strsql);
	if(!$hresult){
		$intreturn = 1;
	}
}

echo $intreturn;
