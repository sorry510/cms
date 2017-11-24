<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_record_id = api_value_post('id');
$intcard_record_id = api_value_int0($strcard_record_id);
$straccount = api_value_post('name');
$sqlaccount = $gdb->fun_escape($straccount);
$strpassword = api_value_post('password');
$sqlpassword = $gdb->fun_escape($strpassword);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$now = time();

$intreturn = 0;
$arr = array();
$arrmcombo = array();
$arrticket1 = array();
$arrticket2 = array();
$card_id = 0;

//验证账号和密码(暂时用的登录密码)
$strsql = "SELECT user_id, user_type, user_name, shop_id FROM " . $gdb->fun_table2('user')
	. " WHERE user_account = '" . $sqlaccount . "' AND user_password = '" . $sqlpassword . "' AND (user_type=2 or user_type = 1) LIMIT 1";
$hresult = $gdb->fun_query($strsql);
$arruser = $gdb->fun_fetch_assoc($hresult);
if(empty($arruser)) {
	$intreturn = 1;
}else {
	if($arruser['user_type'] == 2) {
		if($arruser['shop_id'] != $intshop){
			$intreturn = 1;
		}
	}
}

if($intcard_record_id == 0){
	$intreturn = 2;
}

//查询card_record信息
if($intreturn == 0){
	$strsql = "SELECT card_id,shop_id,card_record_code, card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_kakou,card_record_tuan,card_record_score,card_record_state,card_record_atime,card_record_ctime,c_card_type_id FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where card_record_id = ".$intcard_record_id." and card_record_state=1 limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$intreturn = 3;
	}else{
		$pay_type = $arr['card_record_pay'];
		$smoney = $arr['card_record_smoney'];
		$card_id = $arr['card_id'];
		$score = $arr['card_record_score'];
	}
}

//当是会员消费时，查询card是否存在
if($intreturn == 0 && $card_id != 0){
	$strsql ="SELECT card_id FROM ".$GLOBALS['gdb']->fun_table2('card')." WHERE card_id=".$card_id;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrcard = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arrcard)){
		$intreturn = 4;
	}
}
//查询套餐是否存在
$arrmcombo = array();
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT card_record3_mcombo_id,card_mcombo_id,card_record3_mgoods_count FROM ".$gdb->fun_table2('card_record3_mcombo')." where card_record_id=".$intcard_record_id;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrmcombo = $GLOBALS['gdb']->fun_fetch_all($hresult);
	/*if(!empty($arrmcombo)){
		foreach($arrmcombo as $v){
			$strsql = "SELECT card_mcombo_id FROM ".$gdb->fun_table2('card_mcombo'). " where card_mcombo_id=".$v['card_mcombo_id'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)) {
				$intreturn = 5;
				break;
			}
		}
	}*/
}
//查询使用的优惠券是否存在
$arrticket1 = array();
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=2";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrticket1 = $GLOBALS['gdb']->fun_fetch_all($hresult);
	/*if(!empty($arrticket1)){
		foreach($arrticket1 as $v){
			$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket')." where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)) {
				$intreturn = 6;
				break;
			}
		}
	}*/
}
//查询赠送的优惠券是否存在
$arrticket2 = array();
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrticket2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
	/*if(!empty($arrticket2)){
		foreach($arrticket2 as $v){
			$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket')." where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)) {
				$intreturn = 7;
				break;
			}
		}
	}*/
}
//更改card_record状态为退款,同时添加退款授权人信息
if($intreturn == 0){
	$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_record'). " SET card_record_state=5,c_user_id2=".$arruser['user_id'].",c_user_name2='".$arruser['user_name']."' where card_record_id=".$intcard_record_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult==false){
		$intreturn = 8;
	}
}
//退还卡的积分
if($intreturn == 0 && $card_id != 0 && $pay_type != 5){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_sscore=s_card_sscore-".$score.",s_card_yscore=s_card_yscore-".$score.",card_ctime=".$now." where card_id=".$card_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 9;
	}
}

//退还卡的金额
if($intreturn == 0 && $card_id != 0 && $pay_type == 5){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_smoney=s_card_smoney-".$smoney.",s_card_ymoney=s_card_ymoney+".$smoney.",card_ctime=".$now." where card_id=".$card_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 10;
	}
}
//修改消费商品状态
if($intreturn == 0 && $card_id != 0){
	$strsql = "UPDATE ".$gdb->fun_table2('card_record3_goods')." SET card_record3_goods_state=5,card_record3_goods_ctime=".$now." WHERE card_record_id=".$intcard_record_id;
	$hresult = $gdb->fun_do($strsql);
}
//退还消费套餐商品(计时套餐商品数量也被修改了),修改记录状态
if($intreturn == 0 && $card_id != 0){
	if(!empty($arrmcombo)){
		foreach($arrmcombo as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('card_mcombo'). " SET card_mcombo_gcount=card_mcombo_gcount+".$v['card_record3_mgoods_count'].",card_mcombo_ctime=".$now." where card_mcombo_id=".$v['card_mcombo_id'];
			$hresult = $gdb->fun_do($strsql);
			$strsql = "UPDATE ".$gdb->fun_table2('card_record3_mcombo')." SET card_record3_mcombo_state=5,card_record3_mcombo_ctime=".$now." WHERE card_record3_mcombo_id=".$v['card_record3_mcombo_id'];
			$hresult = $gdb->fun_do($strsql);
			/*if($hresult == FALSE) {
				$intreturn = 11;
			}*/
		}
	}
}

//退还消费的优惠券
if($intreturn == 0 && $card_id != 0){
	if(!empty($arrticket1)){
		foreach($arrticket1 as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('card_ticket')." SET card_ticket_state=1 where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $gdb->fun_do($strsql);
			/*if($hresult == FALSE) {
				$intreturn = 12;
			}*/
		}
	}
}

//退还赠送的优惠券(只删除未使用的),如果已经使用了，删除之后可能会有异常
if($intreturn == 0 && $card_id != 0){
	if(!empty($arrticket2)){
		foreach($arrticket2 as $v){
			$strsql = "DELETE FROM ".$gdb->fun_table2('card_ticket')." where card_ticket_id=".$v['card_ticket_id']." and card_ticket_state=1";
			$hresult = $gdb->fun_do($strsql);
			/*if($hresult == FALSE) {
				$intreturn = 13;
			}*/
		}
	}
}

//退还消费时使用优惠券总活动记录
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT act_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=2";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('act')." SET act_relate_uticket=act_relate_uticket+1 where act_id=".$v['act_id'];
			$hresult = $gdb->fun_do($strsql);
			/*if($hresult == FALSE) {
				$intreturn = 14;
			}*/
		}
	}
}

//退还消费时赠送优惠券总活动记录
if($intreturn == 0 && $card_id != 0){
	$strsql = "SELECT act_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('act')." SET act_relate_aticket=act_relate_aticket-1 where act_id=".$v['act_id'];
			$hresult = $gdb->fun_do($strsql);
			/*if($hresult == FALSE) {
				$intreturn = 15;
			}*/
		}
	}
}

//退还相关员工提成
if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('worker_reward')." SET worker_reward_state=2 WHERE c_card_record_id=".$intcard_record_id;
	$hresult = $gdb->fun_do($strsql);
	if(!$hresult){
		$intreturn = 16;
	}
}

//退款时参与相关活动的金额还原不做

echo $intreturn;
