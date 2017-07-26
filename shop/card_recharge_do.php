<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strcard_type_id = api_value_post('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);
$strcard_type_discount = api_value_post('card_type_discount');
$deccard_type_discount = api_value_decimal($strcard_type_discount,1);
$strmoney = api_value_post('money');
$decmoney = api_value_decimal($strmoney, 2);//充值金额
$strcash = api_value_post('cash');
$deccash = api_value_decimal($strcash, 2);//实收金额
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);

$intreturn = 0;
// 查询card分类信息
if($intreturn == 0){
	$strsql = "SELECT card_type_name,card_type_discount FROM ". $GLOBALS['gdb']->fun_table2('card_type') . " where card_type_id = ".$intcard_type_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$strcard_type_name =  $arr['card_type_name'];
		// $deccard_type_discount = $arr['card_type_discount'];
	}else{
		$intreturn = 4;
	}
}
// 更新card,记录积分
if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET c_card_type_name='".$gdb->fun_escape($strcard_type_name)."', card_type_id = ".$intcard_type_id.",c_card_type_discount=".$deccard_type_discount.",s_card_ymoney=s_card_ymoney+".$decmoney.",s_card_score=s_card_score+".floor($deccash).",card_ctime=".time().",card_ltime=".time()." where card_id=".$intcard_id." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}
//查询card信息
if($intreturn == 0){
	$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intreturn = 0;
	}else{
		$intreturn = 2;
	}
}
// 插入消费记录
if($intreturn == 0){
	$card_pay = '';
	switch($intpay_type)
	{
		case 1:
			$card_pay = "card_record_xianjin";break;
		case 2:
			$card_pay = "card_record_yinhang";break;
		case 3:
			$card_pay = "card_record_weixin";break;
		case 4:
			$card_pay = "card_record_zhifubao";break;
		default:
			break;
	}
	// 充值code码time()
	$strsql = "INSERT INTO ".$gdb->fun_table2('card_record')." (card_id,shop_id,card_record_code,card_record_type,card_record_cmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',1,".$decmoney.",".$deccash.",".$arr['s_card_ymoney'].",".$intpay_type.",".$deccash.",".floor($deccash).",".time().",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}
echo $intreturn;

?>