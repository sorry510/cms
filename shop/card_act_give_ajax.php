<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$inttype = 0;
$now = time();
$arrgive = array();

if($intid == 0){
	$inttype = 1;
}else{
	$strsql = "SELECT card_id FROM ". $GLOBALS['gdb']->fun_table2('card')." WHERE card_id=".$intid." and card_state = 1 and (card_edate = 0 or card_edate>=".time().")";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$inttype = 2;
	}else{
		$inttype = 1;
	}
}
if($inttype == 2){
	$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id,	c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin FROM " . $GLOBALS['gdb']->fun_table2('act_give')." where act_give_start<=".$GLOBALS['now']." and act_give_end>=".$GLOBALS['now']." and act_give_state=1 and act_give_client=2 order by act_give_man desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrgive = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrgive as &$row){
		$row['start'] = date('Y-m-d', time());
		$row['end'] = date('Y-m-d', time());
		if($row['c_ticket_begin'] == 1){
			$row['start'] = date('Y-m-d', time());
			$row['end'] = date('Y-m-d', strtotime('+'.$row['c_ticket_days'].' day'));
		}else if($row['c_ticket_begin'] == 2){
			$row['start'] = date('Y-m-d', strtotime('+1 day'));
			$row['end'] = date('Y-m-d', strtotime('+'.($row['c_ticket_days']+1).' day'));
		}
	}
}

echo json_encode($arrgive);