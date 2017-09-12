<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$struser_type = api_value_get('user_type');
$intuser_type = api_value_int0($struser_type);

$arr = array();
$stract_discount_id = '';
$now = time();
//限时打折活动
$strsql = "SELECT act_discount_id FROM ".$GLOBALS['gdb']->fun_table2('act_discount_shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arr as $v){
	$stract_discount_id .=$v['act_discount_id'].",";
}
$stract_discount_id = substr($stract_discount_id,0,strlen($stract_discount_id)-1);

if($stract_discount_id!=''){
	if($intuser_type != 1){
		//非会员，期限内，正常
		$strsql = "SELECT act_discount_id,act_discount_name FROM " . $GLOBALS['gdb']->fun_table2('act_discount')." where act_discount_start<=".$GLOBALS['now']." and act_discount_end>=".$GLOBALS['now']." and act_discount_state=1 and act_discount_client!=2 and act_discount_id in (".$stract_discount_id.") order by act_discount_id desc";
	}else{
		$strsql = "SELECT act_discount_id,act_discount_name FROM " . $GLOBALS['gdb']->fun_table2('act_discount')." where act_discount_start<=".$GLOBALS['now']." and act_discount_end>=".$GLOBALS['now']." and act_discount_state=1 and act_discount_client!=3 and act_discount_id in (".$stract_discount_id.") order by act_discount_id desc";
	}
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	echo json_encode($arr);
}