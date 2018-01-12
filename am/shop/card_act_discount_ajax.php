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
$arrdiscount = array();

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

if($inttype == 1){
	//非会员，期限内，正常
	$strsql = "SELECT act_discount_id,act_discount_name,act_discount_start,act_discount_end FROM " . $GLOBALS['gdb']->fun_table2('act_discount')." where act_discount_start<=".$GLOBALS['now']." and act_discount_end>=".$GLOBALS['now']." and act_discount_state=1 and (act_discount_client=1 or act_discount_client=3) order by act_discount_id desc";
}else if($inttype == 2){
	$strsql = "SELECT act_discount_id,act_discount_name,act_discount_start,act_discount_end FROM " . $GLOBALS['gdb']->fun_table2('act_discount')." where act_discount_start<=".$GLOBALS['now']." and act_discount_end>=".$GLOBALS['now']." and act_discount_state=1 and (act_discount_client=1 or act_discount_client=2) order by act_discount_id desc";
}
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arrdiscount = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arrdiscount as &$row){
	$row['start'] = date("Y-m-d", $row['act_discount_start']);
	$row['end'] = date("Y-m-d", $row['act_discount_end']);
}

echo json_encode($arrdiscount);