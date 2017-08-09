<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strworker_group_id = api_value_post('worker_group_id');
$intworker_group_id = api_value_int0($strworker_group_id);
$strreward_create = api_value_post('reward_create');
$decreward_create = api_value_decimal($strreward_create, 2);
$strreward_fill = api_value_post('reward_fill');
$decreward_fill = api_value_decimal($strreward_fill, 2);
$strreward_guide = api_value_post('reward_guide');
$decreward_guide = api_value_decimal($strreward_guide, 2);
$strfill_type = api_value_post('fill_type');
$intfill_type = api_value_int0($strfill_type);
$strguide_type = api_value_post('guide_type');
$intguide_type = api_value_int0($strguide_type);
$arrgoods = api_value_post($arr);

$intnow = time();
$decgroup_reward_fill = 0;
$decgroup_reward_pfill = 0;
$decgroup_reward_guide = 0;
$decgroup_reward_pguide = 0;
if($intfill_type=='1'){
	$decgroup_reward_pfill = $decreward_fill;
}else if($intfill_type=='2'){
	$decgroup_reward_fill = $decreward_fill;
}
if($intguide_type=='1'){
	$decgroup_reward_pguide = $decreward_guide;
}else if($intguide_type=='2'){
	$decgroup_reward_guide = $decreward_guide;
}
$intreturn = 0;


if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('group_reward')." (worker_group_id,shop_id,group_reward_fill,group_reward_pfill,group_reward_guide,group_reward_pguide,group_reward_atime,group_reward_ctime) VALUES (".$intworker_group_id.",".$GLOBALS['_SESSION']['login_sid'].",".$decgroup_reward_fill.",".$decgroup_reward_pfill.",".$decgroup_reward_guide .",".$decgroup_reward_pguide .",".$intnow.",".$intnow.")";
	$hresult = $GLOBALS['gdb']->fun_do($strsql);
	if($hresult == false){
		$intreturn = 1;
	}
}

if($intreturn == 0){
	if(!empty($arrgoods)){
		foreach($arrgoods as $v){
			$intmgoods_id = 0;
			$intmgoods_catalog_id = 0;
			$intsgoods_id = 0;
			$intsgoods_catalog_id = 0;
			if(array_key_exists("mgoods_id",$v)){
				$intmgoods_id = $v['mgoods_id'];
				$intmgoods_catalog_id = $v['mgoods_catalog_id'];
			}
			if(array_key_exists("sgoods_id",$v)){
				$intsgoods_id = $v['sgoods_id'];
				$intsgoods_catalog_id = $v['sgoods_catalog_id'];
			}
			$decmoney = api_value_decimal($v['money'],2);
			$decpercent = api_value_decimal($v['percent'],2);

			if($intnum==0){
				continue;
			}
			if($intmgoods_id != 0){
				$strsql = "INSERT INTO ".$gdb->fun_table2('group_reward2').""
			}
		}
	}
}
