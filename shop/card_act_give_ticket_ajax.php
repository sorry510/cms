<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strlimit_money = api_value_get('limit_money');
$declimit_money = api_value_decimal($strlimit_money,2);
$arract_give = api_value_get('act_give');
$stract_give_id = 0;
if(!empty($arract_give)){
	$stract_give_id = implode(",",$arract_give);
}

$arr = array();
// $arr =[1,2,3,4];
$arrticket = array();

//满送活动
if($stract_give_id != '0'){
	$strsql = "SELECT act_give_id,act_give_man,c_ticket_name FROM ".$GLOBALS['gdb']->fun_table2('act_give')." where act_give_id in (".$stract_give_id.") order by act_give_man desc";
	$hresult = $gdb->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		for($i=0;$i<sizeof($arr);){
			if($declimit_money >= $arr[$i]['act_give_man'] && $arr[$i]['act_give_man'] > 0){
				$act_give_number = floor($declimit_money/$arr[$i]['act_give_man']);//送券次数
				$declimit_money = $declimit_money%$arr[$i]['act_give_man'];//送过之后余额
				$arrticket[$arr[$i]['act_give_id']][$arr[$i]['c_ticket_name']] = $act_give_number;
				// $arrticket[$arr[$i]['c_ticket_name']] = $act_give_number;
			}else{
				$i++;
			}
		}
	}
}

echo json_encode($arrticket);
