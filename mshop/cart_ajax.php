<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strnum = api_value_post('num');
$intnum = api_value_int0($strnum);

$intreturn = 0;

$arr = array();
$strsql = "SELECT wcart_id FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE wcart_id=".$intid;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('wcart')." SET wcart_wgoods_count = ".$intnum." WHERE wcart_id=".$intid;
	$hresult = $GLOBALS['gdb']->fun_do($strsql);
	if(!$hresult){
		$intreturn = 2;
	}
}

echo $intreturn;
