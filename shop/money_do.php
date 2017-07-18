<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strmoney1 = api_value_post('money1');//原价
$decmoney1 = api_value_decimal($strmoney1, 2);
$strmoney2 = api_value_post('money2');//各种优惠后
$decmoney2 = api_value_decimal($strmoney2, 2);
$strmoney3 = api_value_post('money3');//实际付款价
$decmoney3 = api_value_decimal($strmoney3, 2);
$decgive = $decmoney2 - $decmoney3;
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]
$arrinfo2 = api_value_post('arr2');//套餐
$arrinfo3 = api_value_post('arr3');//优惠券

$intreturn = 0;
$arr = array();
//查询card信息
if($intcard_id != 0){
	$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$intreturn = 1;
	}
}
// 写人card_record
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
	if(!empty($arr)){
		if($card_pay!=''){
			//插入card_record表
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',3,".$decmoney1.",".$decmoney2.",".$decgive.",".$decmoney3.",".$arr['s_card_ymoney'].",".$intpay_type.",".$decmoney3.",".floor($decmoney3).",".time().",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";
			$hresult = $gdb->fun_do($strsql);
			$record_id = mysql_insert_id();

			if($hresult==false){
				$intreturn = 2;
			}
			//更新积分
			if($intreturn == 0) {
				$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_score=s_card_score+".floor($decmoney3).",card_ctime=".time()." where card_id=".$intcard_id." limit 1";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 3;
				}
			}
		}else{
			//用卡扣
			$card_ymoney = $arr['s_card_ymoney']-$decmoney3;
			$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=".$card_ymoney.",card_ctime=".time()." where card_id=".$intcard_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 4;
			}
			if($intreturn == 0){
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',3,".$decmoney1.",".$decmoney2.",".$decgive.",0,".$card_ymoney.",".$intpay_type.",0,".time().",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";

				$hresult = $gdb->fun_do($strsql);
				$record_id = mysql_insert_id();
				if($hresult==false){
					$intreturn = 5;
				}
			}
		}	
	}else{
		if($card_pay!=''){
			//插入card_record表
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_pay,".$card_pay.",card_record_atime,c_user_id,c_user_name,card_record_state) VALUE (".$GLOBALS['_SESSION']['login_sid'].",'".time()."',3,".$decmoney1.",".$decmoney2.",".$decgive.",".$decmoney3.",".$intpay_type.",".$decmoney3.",".time().",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";

			$hresult = $gdb->fun_do($strsql);
			$record_id = mysql_insert_id();

			if($hresult==false){
				$intreturn = 6;
			}
		}else{
			$intreturn = 7;
		}
	}
}
// 消费商品遍历
if($intreturn == 0){
	foreach($arrinfo as $v){
		$intmgoods_id = 0;
		$intsgoods_id = 0;
		if(array_key_exists("mgoods_id",$v)){
			$intmgoods_id = $v['mgoods_id'];
		}
		if(array_key_exists("sgoods_id",$v)){
			$intsgoods_id = $v['sgoods_id'];
		}
		$intnum = $v['num'];

		if($intmgoods_id != 0){
			$strsql = "SELECT mgoods_id,mgoods_name,mgoods_price,mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('mgoods'). " where mgoods_id=".$intmgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)){
				$intreturn = 8;
			}else{
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." (card_record_id,card_id,shop_id,mgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intmgoods_id.",".$intnum.",'".$arr['mgoods_name']."',".$arr['mgoods_price'].",".$arr['mgoods_cprice'].")";
			}
		}
		if($intsgoods_id != 0){
			$strsql = "SELECT sgoods_id,sgoods_name,sgoods_price,sgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('sgoods'). " where sgoods_id=".$intsgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)){
				$intreturn = 9;
			}else{
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." (card_record_id,card_id,shop_id,sgoods_id,card_record3_goods_count,c_sgoods_name,c_sgoods_price,c_sgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intsgoods_id.",".$intnum.",'".$arr['sgoods_name']."',".$arr['sgoods_price'].",".$arr['sgoods_cprice'].")";
			}
		}
		$hresult = $gdb->fun_do($strsql);
		if($hresult==false){
			$intreturn = 10;
		}
	}
}
echo $intmgoods_id;
echo $intsgoods_id;
/*//记录recrord_ygoods,没有管到期时间
if($intreturn == 0){
	$strsql = "SELECT a.*,b.mgoods_name,b.mgoods_price,b.mgoods_cprice FROM (SELECT SUM(card_mcombo_gcount)as sum,mgoods_id FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type=2 and card_id=".$intcard_id." group by mgoods_id)as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// echo json_encode($arr);
	if(!empty($arr)){
		$intreturn = 0;
	}else{
		$intreturn = 12;
	}
	foreach($arr as $v){
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record2_ygoods')." (card_record_id,card_id,shop_id,mgoods_id,card_record2_ygoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$v['mgoods_id'].",".$v['sum'].",'".$v['mgoods_name']."',".$v['mgoods_price'].",".$v['mgoods_cprice'].")";
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 13;
		}
	}
}*/
// echo $intreturn;
