<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_record_id = api_value_post('card_record_id');
$intcard_record_id = api_value_int0($strcard_record_id);
$strpassword = api_value_post('password');

$now = time();

$intreturn = 0;
$arr = array();

if($strpassword != ''){
	//验证密码
	if(false){
		$intreturn = 1;
	}
}
if($intcard_record_id == 0){
	$intreturn = 2;
}
//查询card_record信息
if($intreturn == 0){
	$strsql = "SELECT card_id,shop_id,card_record_code, card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_score,card_record_state,card_record_atime,card_record_ctime,c_card_type_id FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where card_record_id = ".$intcard_record_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$intreturn = 3;
	}else{
		$pay_type = $arr['card_record_pay'];
		$smoney = $arr['card_record_smoney'];
		$card_id = $arr['card_id'];
	}
}
//更改card_record状态为退款
if($intreturn == 0){
	$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_record'). " SET card_record_state=3 where card_record_id=".$intcard_record_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult==false){
		$intreturn = 4;
	}
}
//退还卡的积分
if($intreturn == 0 && $card_id != 0 && $pay_type != 5){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_score=s_card_score-".floor($smoney).",card_ctime=".$now." where card_id=".$card_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}
//退还卡的余额
if($intreturn == 0 && $card_id != 0 && $pay_type == 5){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=s_card_ymoney+".$smoney.",card_ctime=".$now." where card_id=".$card_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}
//退还消费套餐商品,card_record3_mcombo
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT card_mcombo_id,card_record3_mgoods_count FROM ".$gdb->fun_table2('card_record3_mcombo')." where card_record_id=".$intcard_record_id;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('card_mcombo'). "SET card_mcombo_gcount=card_mcombo_gcount+".$v['card_record3_mgoods_count'].",card_mcombo_ctime=".$now." where card_mcombo_id=".$v['card_mcombo_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 7;
			}
		}
	}
}
//退还消费的优惠券
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=2";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('card_ticket')." SET card_ticket_state=1 where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 8;
			}
		}
	}
}
//退还赠送的优惠券
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "DELETE FROM ".$gdb->fun_table2('card_ticket')." where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 9;
			}
		}
	}
}
//退还总活动记录
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT act_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('act_id')." SET act_relate_aticket=act_relate_aticket-1 where act_id=".$v['act_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 9;
			}
		}
	}
}
echo $intreturn;
