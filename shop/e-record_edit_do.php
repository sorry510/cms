<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_history_id = api_value_post('card_history_id');
$intcard_history_id = api_value_int0($strcard_history_id);
$strtime = api_value_post('time');
$inttime = strtotime($strtime)?strtotime($strtime):0;
$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);
$strquestion = api_value_post('question');
$sqlquestion = $gdb->fun_escape($strquestion);
$strresult = api_value_post('result');
$sqlresult = $gdb->fun_escape($strresult);
$strplan = api_value_post('plan');
$sqlplan = $gdb->fun_escape($strplan);

$intreturn = 0;
$arr = array();
$arrrecord = array();
$imgfile = array();

$strsql = "SELECT card_history_id FROM ".$gdb->fun_table2('card_history')." WHERE card_history_id=".$intcard_history_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}
$strsql = "SELECT worker_name FROM ".$gdb->fun_table2('worker')." where worker_id=".$intworker_id;
$hresult = $gdb->fun_query($strsql);
$arr= $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 2;
}else{
	$worker_name = $arr['worker_name'];
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('card_history')." SET worker_id=".$intworker_id.",card_history_question='".$sqlquestion."',card_history_result='".$sqlresult."',card_history_plan='".$sqlplan."' where card_history_id=".$intcard_history_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 3;
	}
}

echo $intreturn;