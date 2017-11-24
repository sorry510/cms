<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_record_id = api_value_post('id');
$intcard_record_id = api_value_int0($strcard_record_id);

$intreturn = 0;

$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card_record')." WHERE card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}
$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card_record2_mcombo')." WHERE card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}
$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card_record2_ygoods')." WHERE card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}
$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." WHERE card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}
$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card_record3_mcombo')." WHERE card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}
$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('card_record3_ygoods')." WHERE card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}

echo $intreturn;