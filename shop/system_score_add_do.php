<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
// $strcard_yscore = api_value_post('card_yscore');
// $intcard_yscore = api_value_int0($strcard_yscore);
$strgift_score = api_value_post('gift_score');
$intgift_score = api_value_int0($strgift_score);
$arrgift = api_value_post('arr');

$arr = array();
$inttime = time();
$intreturn = 0;


$strsql = "SELECT user_name FROM ".$gdb->fun_table2('user'). " WHERE user_id=".$GLOBALS['_SESSION']['login_id'];
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
$user_name = $arr['user_name'];

$strsql = "SELECT card_id,card_code,card_name,card_phone,c_card_type_name,s_card_yscore FROM ".$gdb->fun_table2('card')." WHERE card_id=".$intcard_id." limit 1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}else{
	$intcard_yscore = $arr['s_card_yscore']-$intgift_score;//剩余的card积分
}

if(empty($arrgift)){
	$intreturn = 2;
}


if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('gift_record')." (card_id,shop_id,gift_score,c_card_name,c_card_code,c_card_phone,c_card_type_name,c_card_yscore,c_user_name,c_user_account,gift_record_atime) VALUES (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intgift_score.",'".$arr['card_name']."','".$arr['card_code']."','".$arr['card_phone']."','".$arr['c_card_type_name']."',".$intcard_yscore.",'".$user_name."','".$GLOBALS['_SESSION']['login_account']."',".$inttime.")";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult === false){
		$intreturn = 3;
	}else{
		$gift_record_id = mysql_insert_id();
	}
}

if($intreturn == 0){
	foreach($arrgift as $row){
		$strgift_id = $row['gift_id'];
		$intgift_id = api_value_int0($row['gift_id']);
		$strgift_score = $row['gift_score'];
		$intgift_score = api_value_int0($row['gift_score']);
		$strgift_count = $row['gift_num'];
		$intgift_count = api_value_int0($row['gift_num']);
		$strgift_name = $row['gift_name'];
		$sqlgift_name = $gdb->fun_escape($strgift_name);

		$strsql = "INSERT INTO ".$gdb->fun_table2('gift_record_goods')." (card_id,shop_id,gift_record_id,gift_id,c_gift_name,c_gift_score,gift_count) VALUES (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$gift_record_id.",".$intgift_id.",'".$sqlgift_name."',".$intgift_score.",".$intgift_count.")";
		$hresult = $gdb->fun_do($strsql);
		if($hresult === false){
			$intreturn = 4;
		}
	}
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." set s_card_yscore=".$intcard_yscore." where card_id=".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult === false){
		$intreturn = 5;
	}
}
echo $intreturn;