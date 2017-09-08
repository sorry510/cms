<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworker_group_id = api_value_post('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);

$intreturn = 0;
$intnow = time();
$arr = array();

// 总店提成
$strsql = "SELECT group_reward_create,group_reward_fill,group_reward_pfill,group_reward_guide,group_reward_pguide FROM ".$gdb->fun_table2('group_reward')." where worker_group_id=".$intworker_group_id." and shop_id = 0";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}else{
	$strsql = "SELECT mgoods_catalog_id,mgoods_id,sgoods_catalog_id,sgoods_id,mcombo_id,group_reward2_money,group_reward2_percent FROM ".$gdb->fun_table2('group_reward2')." where worker_group_id=".$intworker_group_id." and shop_id = 0";
	$hresult = $gdb->fun_query($strsql);
	$arrgoods = $gdb->fun_fetch_all($hresult);
}

if($intreturn == 0){
	//删除本店的提成方案不包含sgoods
	$strsql = "DELETE FROM ".$gdb->fun_table2('group_reward')." where worker_group_id=".$intworker_group_id." and shop_id = ".$GLOBALS['_SESSION']['login_sid'];
	$gdb->fun_do($strsql);
	$strsql = "DELETE FROM ".$gdb->fun_table2('group_reward2')." where worker_group_id=".$intworker_group_id." and shop_id = ".$GLOBALS['_SESSION']['login_sid']." and sgoods_id=0";
	$gdb->fun_do($strsql);


	$strsql = "INSERT INTO ".$gdb->fun_table2('group_reward')." (worker_group_id,shop_id,group_reward_create,group_reward_fill,group_reward_pfill,group_reward_guide,group_reward_pguide,group_reward_atime) VALUES (".$intworker_group_id.",".$GLOBALS['_SESSION']['login_sid'].",".$arr['group_reward_create'].",".$arr['group_reward_fill'].",".$arr['group_reward_pfill'].",".$arr['group_reward_guide'].",".$arr['group_reward_pguide'].",".$intnow.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
	foreach($arrgoods as $row){
		$strsql = "INSERT INTO ".$gdb->fun_table2('group_reward2')." (worker_group_id,shop_id,mgoods_catalog_id,mgoods_id,sgoods_catalog_id,sgoods_id,mcombo_id,group_reward2_money,group_reward2_percent,group_reward2_atime) VALUES (".$intworker_group_id.",".$GLOBALS['_SESSION']['login_sid'].",".$row['mgoods_catalog_id'].",".$row['mgoods_id'].",".$row['sgoods_catalog_id'].",".$row['sgoods_id'].",".$row['mcombo_id'].",".$row['group_reward2_money'].",".$row['group_reward2_percent'].",".$intnow.")";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == false){
			$intreturn = 3;
		}
	}
}

echo $intreturn;






