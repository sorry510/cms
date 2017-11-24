<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

if(laimi_config_trade()['score_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strgift_score = api_value_post('gift_score');
$intgift_score = api_value_int0($strgift_score);
$arrgift = api_value_post('arr');
$intlogin_id = api_value_int0($GLOBALS['_SESSION']['login_id']);

$arr = array();
$inttime = time();
$intreturn = 0;

$strsql = "SELECT user_name,user_account FROM ".$GLOBALS['gdb']->fun_table2('user'). " WHERE user_id=".$intlogin_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
$struser_name = $arr['user_name'];
$struser_account = $arr['user_account'];

$strsql = "SELECT card_id,card_code,card_name,card_phone,s_card_yscore FROM ".$gdb->fun_table2('card')." WHERE card_id=".$intcard_id." limit 1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}else{
	$intcard_yscore = $arr['s_card_yscore'] - $intgift_score;//剩余的card积分
	if($intcard_yscore < 0){
		$intreturn = 2;
	}
}

if(empty($arrgift)){
	$intreturn = 3;
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('gift_record')." (card_id,shop_id,gift_score,c_card_name,c_card_code,c_card_phone,c_card_yscore,c_user_name,c_user_account,gift_record_atime) VALUES (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intgift_score.",'".$arr['card_name']."','".$arr['card_code']."','".$arr['card_phone']."',".$intcard_yscore.",'".$struser_name."','".$struser_account."',".$inttime.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult){
		$gift_record_id = mysql_insert_id();
	}else{
		$intreturn = 4;
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
		if(!$hresult){
			$intreturn = 5;
		}
	}
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." set s_card_yscore=".$intcard_yscore." where card_id=".$intcard_id;
	$hresult = $gdb->fun_do($strsql);
	if(!$hresult){
		$intreturn = 6;
	}
}

echo $intreturn;