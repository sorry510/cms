<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');


$strworker_group_id = api_value_get('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);

$arr = array();
$arrgoods = array();
$strsql = "SELECT group_reward_create,group_reward_fill,group_reward_pfill,group_reward_guide,group_reward_pguide,group_reward_ctime FROM ".$gdb->fun_table2('group_reward')." where worker_group_id=".$intworker_group_id." and shop_id = ".$GLOBALS['_SESSION']['login_sid'];
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

$strsql = "SELECT mgoods_catalog_id,mgoods_id,sgoods_catalog_id,sgoods_id,mcombo_id,group_reward2_money,group_reward2_percent,group_reward2_ctime FROM ".$gdb->fun_table2('group_reward2')." where worker_group_id=".$intworker_group_id." and shop_id = ".$GLOBALS['_SESSION']['login_sid'];
$hresult = $gdb->fun_query($strsql);
$arrgoods = $gdb->fun_fetch_all($hresult);
$arr['goods'] = $arrgoods;

echo json_encode($arr);


