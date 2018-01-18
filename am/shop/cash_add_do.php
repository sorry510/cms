<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_state = api_value_post('txtstate');
$intcash_state = api_value_int0($strcash_state);
$strcash_name = api_value_post('txtname');
$sqlcash_name = $gdb->fun_escape($strcash_name);
$strcash_type_id = api_value_post('txttype');
$intcash_type_id = api_value_int0($strcash_type_id);
$strcash_money = api_value_post('txtmoney');
$deccash_money = api_value_sdecimal($strcash_money, 2);
$strcash_time = api_value_post('txttime');
$intcash_time = strtotime($strcash_time) ? strtotime($strcash_time) : 0;
$strcash_memo = api_value_post('txtmemo');
$sqlcash_memo = $gdb->fun_escape($strcash_memo);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$intreturn = 0;
$arr = array();

if($sqlcash_name == '' || $intcash_type_id == 0 || $deccash_money == 0 || $intcash_time == 0){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('cash')." (shop_id,cash_type_id,cash_name,cash_money,cash_memo,cash_state,cash_time,cash_atime) VALUES (".$intshop.",".$intcash_type_id.",'".$sqlcash_name."',".$deccash_money.",'".$sqlcash_memo."',".$intcash_state.",".$intcash_time.",".time().")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}

echo $intreturn;
