<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strgoods_id = api_value_get('goods_id');
$intgoods_id = api_value_int0($strgoods_id);
$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);

$arrcompanyconfig = $gtrade;
$intworker_module = $arrcompanyconfig['worker_module'];
$intworker_flag = $arrcompanyconfig['worker_flag'];
$intshop = $GLOBALS['_SESSION']['login_sid'];

if($intworker_module == 1 && $intworker_flag == 1){
	if($inttype == 1){
		$strsql1 = "SELECT worker_group_id FROM ".$gdb->fun_table2('group_reward2')." WHERE mgoods_id=".$intgoods_id." and group_reward2_money>0 and shop_id=".$intshop;
		$strsql = "SELECT worker_id,worker_name FROM ".$gdb->fun_table2('worker')." WHERE worker_group_id in (".$strsql1.") and shop_id = ".$intshop;
	}else if($inttype == 2){
		$strsql1 = "SELECT worker_group_id FROM ".$gdb->fun_table2('group_reward2')." WHERE sgoods_id=".$intgoods_id." and group_reward2_money>0 and shop_id=".$GLOBALS['_SESSION']['login_sid'];
		$strsql = "SELECT worker_id,worker_name FROM ".$gdb->fun_table2('worker')." WHERE worker_group_id in (".$strsql1.") and shop_id = ".$intshop;
	}
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_all($hresult);
}

echo json_encode($arr);

