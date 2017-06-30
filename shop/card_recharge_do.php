<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strtype1 = api_value_get('type');
$strtype2 = api_value_post('type');

if($strtype1=="show"){
	$arr = array();
	$strcard_id = api_value_get('card_id');
	$intcard_id = api_value_int0($strcard_id);

	$strsql = "SELECT card_id,card_code, card_name,card_phone,card_sex,card_birthday,card_password_state,card_password,card_identity,card_edate,card_memo,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$arr['card_birthday'] = date("Y-m-d",$arr['card_birthday']);
	$arr['card_edate'] = date("Y-m-d",$arr['card_edate']);

	// $strsql = "SELECT card_type_name,card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card_type')." order by card_type_discount asc";
	// $hresult = $GLOBALS['gdb']->fun_query($strsql);
	// $arr['card_type'] = $GLOBALS['gdb']->fun_fetch_all($hresult);
	echo json_encode($arr);
}
if($strtype2 == "edit"){
	$strcard_id = api_value_post('card_id');
	$intcard_id = api_value_int0($strcard_id);
	$strcard_type_id = api_value_post('card_type_id');
	$intcard_type_id = api_value_int0($strcard_type_id);
	$strcard_type_name = api_value_post('card_type_name');
	$strcard_type_dicount = api_value_post('card_type_discount');
	$deccard_type_dicount = api_value_decimal($strcard_type_dicount, 1);
	$strmoney = api_value_post('money');
	$decmoney = api_value_decimal($strmoney, 2);
	//消费记录
	$strcash = api_value_post('cash');
	$deccash = api_value_decimal($strcash, 2);

	$intreturn = 0;
	if($intreturn == 0) {
		$strsql = "UPDATE ".$gdb->fun_table2('card')." SET c_card_type_name='".$gdb->fun_escape($strcard_type_name)."', card_type_id = ".$intcard_type_id.",c_card_type_discount=".$deccard_type_dicount.",s_card_ymoney=s_card_ymoney+".$decmoney.",card_ctime=".time()." where card_id=".$intcard_id." limit 1";
		// echo $strsql;
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 1;
		}
		//插入消费记录，未做
		//记录积分,未做
	}
	echo $intreturn;
}
?>