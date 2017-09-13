<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id);
$struser_type = api_value_get('user_type');
$intuser_type = api_value_int0($struser_type);

$arr = array();
$stract_give_id = '';
$now = time();

//满送活动
$strsql = "SELECT act_give_id FROM ".$GLOBALS['gdb']->fun_table2('act_give_shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arr as $v){
	$stract_give_id .=$v['act_give_id'].",";
}
$stract_give_id = substr($stract_give_id,0,strlen($stract_give_id)-1);
if($stract_give_id!=''){
	//非会员，期限内，正常
	if($intuser_type==0){
		$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id FROM " . $GLOBALS['gdb']->fun_table2('act_give')." where act_give_start<=".$GLOBALS['now']." and act_give_end>=".$GLOBALS['now']." and act_give_state=1 and act_give_client!=2 and act_give_id in (".$stract_give_id.") order by act_give_id desc";
	}else{
		$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id FROM " . $GLOBALS['gdb']->fun_table2('act_give')." where act_give_start<=".$GLOBALS['now']." and act_give_end>=".$GLOBALS['now']." and act_give_state=1 and act_give_client!=3 and act_give_id in (".$stract_give_id.") order by act_give_id desc";
	}

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
}
echo json_encode($arr);