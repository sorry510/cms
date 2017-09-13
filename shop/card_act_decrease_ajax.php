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
$stract_decrease_id = '';
$now = time();

//满减活动
$strsql = "SELECT act_decrease_id FROM ".$GLOBALS['gdb']->fun_table2('act_decrease_shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arr as $v){
	$stract_decrease_id .=$v['act_decrease_id'].",";
}
$stract_decrease_id = substr($stract_decrease_id,0,strlen($stract_decrease_id)-1);
if($stract_decrease_id!=''){
	//非会员，期限内，正常
	if($intuser_type==0){
		$strsql = "SELECT act_decrease_id,act_decrease_name,act_decrease_man,act_decrease_jian FROM " . $GLOBALS['gdb']->fun_table2('act_decrease')." where act_decrease_start<=".$GLOBALS['now']." and act_decrease_end>=".$GLOBALS['now']." and act_decrease_state=1 and act_decrease_client!=2 and act_decrease_id in (".$stract_decrease_id.") order by act_decrease_man desc";
	}else{
		$strsql = "SELECT act_decrease_id,act_decrease_name,act_decrease_man,act_decrease_jian FROM " . $GLOBALS['gdb']->fun_table2('act_decrease')." where act_decrease_start<=".$GLOBALS['now']." and act_decrease_end>=".$GLOBALS['now']." and act_decrease_state=1 and act_decrease_client!=3 and act_decrease_id in (".$stract_decrease_id.") order by act_decrease_man desc";
	}
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
}
echo json_encode($arr);