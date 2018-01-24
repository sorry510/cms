<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcash_id = api_value_post('txtid');
$intcash_id = api_value_int0($strcash_id);
$strcash_state = api_value_post('txtstate');
$intcash_state = api_value_int0($strcash_state);
$strcash_name = api_value_post('txtname');
$sqlcash_name = $gdb->fun_escape($strcash_name);
$strcash_type_id = api_value_post('txttype');
$intcash_type_id= api_value_int0($strcash_type_id);
$strcash_money = api_value_post('txtmoney');
$deccash_money = api_value_sdecimal($strcash_money,2);
$strcash_time = api_value_post('txttime');
$intcash_time = strtotime($strcash_time) ? strtotime($strcash_time) : 0;
$strcash_memo = api_value_post('txtmemo');
$sqlcash_memo = $gdb->fun_escape($strcash_memo);

$intreturn = 0;
$arr = array();

$strsql = "SELECT cash_id FROM ".$gdb->fun_table2('cash')." WHERE cash_id=".$intcash_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($sqlcash_name == '' || $intcash_type_id == 0 || $deccash_money == 0 || $intcash_time == 0 || $sqlcash_memo == ''){
	$intreturn = 2;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('cash')." SET cash_state=".$intcash_state.",cash_name='".$sqlcash_name."',cash_type_id=".$intcash_type_id.",cash_money=".$deccash_money.",cash_time=".$intcash_time.",cash_memo='".$sqlcash_memo."',cash_ctime=".time()." where cash_id=".$intcash_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 3;
	}
}

echo $intreturn;
