<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strymoney = api_value_post('ymoney');//合计
$decymoney = api_value_decimal($strymoney, 2);
$strmoney = api_value_post('money');//应付
$decmoney = api_value_decimal($strmoney, 2);
$strgive = api_value_post('give');//减免
$decgive = api_value_decimal($strgive, 2);
$decrel_money = $decmoney - $decgive;
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]

$intreturn = 0;
//查询card信息
if($intreturn == 0){
	$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intreturn = 0;
	}else{
		$intreturn = 1;
	}
}
//写人card_record
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
	if($card_pay!=''){
		//插入card_record表
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',2,".$decymoney.",".$decmoney.",".$decgive.",".$decrel_money.",".$arr['s_card_ymoney'].",".$intpay_type.",".$decrel_money.",".floor($decrel_money).",".time().",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";

		$hresult = $gdb->fun_do($strsql);
		$record_id = mysql_insert_id();

		if($hresult==false){
			$intreturn = 2;
		}
		//更新积分
		if($intreturn == 0) {
			$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_score=s_card_score+".floor($decrel_money).",card_ctime=".time()." where card_id=".$intcard_id." limit 1";
			// echo $strsql;
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 3;
			}
		}
	}else{
		//用卡扣
		$card_ymoney = $arr['s_card_ymoney']-$decrel_money;
		$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=".$card_ymoney.",card_ctime=".time()." where card_id=".$intcard_id." limit 1";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
		if($intreturn == 0){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',2,".$decymoney.",".$decmoney.",".$decgive.",0,".$card_ymoney.",".$intpay_type.",0,".time().",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";

			$hresult = $gdb->fun_do($strsql);
			$record_id = mysql_insert_id();
			if($hresult==false){
				$intreturn = 5;
			}
		}
	}
}
//购买的套餐遍历
if($intreturn == 0){
	foreach($arrinfo as $v){
		$strmcombo_id = $v['id'];
		$intmcombo_id = api_value_int0($strmcombo_id);
		$strnum = $v['num'];
		$intnum = api_value_int0($strnum);
		if($intreturn == 0){
			// 查询套餐信息
			$strsql = "SELECT mcombo_id,mcombo_name,mcombo_price,mcombo_cprice,mcombo_limit_type,mcombo_limit_days,mcombo_limit_months FROM ". $GLOBALS['gdb']->fun_table2('mcombo') . " where mcombo_id = ".$intmcombo_id." and mcombo_state = 1 limit 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$intmcombo_limit_type = $arr['mcombo_limit_type'];
				$intmcombo_limit_days = $arr['mcombo_limit_days'];
				$intmcombo_limit_months = $arr['mcombo_limit_months'];
				$intedate = 0;
			}else{
				$intreturn = 6;//套餐不存在或停用
				echo $intreturn;
				exit;
			}
			if($intmcombo_limit_type==1){
				$intedate = 0;
			}else if($intmcombo_limit_type==2){
				$intedate = strtotime("+".$intmcombo_limit_days." day");
			}else if($intmcombo_limit_type==3){
				$intedate = strtotime("+".$intmcombo_limit_months." month");
			}else{
				$intedate = 0;
			}
			// 插入套餐
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_mcombo')."(card_id,card_mcombo_type,mcombo_id,card_mcombo_ccount,card_mcombo_cedate,card_mcombo_atime) VALUES (".$intcard_id.",1,".$intmcombo_id.",".$intnum.",".$intedate.",".time().")";
			$hresult = $GLOBALS['gdb']->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 7;
			}
			// 插入record2表套餐
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record2_mcombo')."(card_record_id,card_id,shop_id,card_record2_mcombo_type,mcombo_id,card_record2_mcombo_ccount,card_record2_mcombo_cedate,c_mcombo_name,c_mcombo_price,c_mcombo_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",1,".$intmcombo_id.",".$intnum.",".$intedate.",'".$arr['mcombo_name']."',".$arr['mcombo_price'].",".$arr['mcombo_cprice'].")";
			$hresult = $GLOBALS['gdb']->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 8;
			}
			// 查询套餐商品
			$strsql = "SELECT a.mgoods_id,a.mcombo_goods_count,b.mgoods_name,b.mgoods_price,b.mgoods_cprice FROM (SELECT mgoods_id,mcombo_goods_count FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods')." where mcombo_id = ".$intmcombo_id.") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
			// echo json_encode($arr);
			if(!empty($arr)){
				foreach($arr as $v){
					$intmgoods_id = $v['mgoods_id'];
					$intmcombo_goods_count = $v['mcombo_goods_count']*$intnum;
					// 插入套餐商品
					$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_mcombo')."(card_id,card_mcombo_type,mcombo_id,mgoods_id,card_mcombo_gcount,card_mcombo_cedate,card_mcombo_atime) VALUES (".$intcard_id.",2,".$intmcombo_id.",".$intmgoods_id.",".$intmcombo_goods_count.",".$intedate.",".time().")";
					$hresult = $GLOBALS['gdb']->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 9;
					}

					// 插入record2表套餐商品
					$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record2_mcombo')."(card_record_id,card_id,shop_id,card_record2_mcombo_type,mcombo_id,mgoods_id,card_record2_mcombo_gcount,card_record2_mcombo_cedate,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",2,".$intmcombo_id.",".$intmgoods_id.",".$intmcombo_goods_count.",".$intedate.",'".$v['mgoods_name']."',".$v['mgoods_price'].",".$v['mgoods_cprice'].")";
					$hresult = $GLOBALS['gdb']->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 10;
					}
				}
			}else{
				$intreturn = 11;
			}
		}
	}
}
//记录recrord_ygoods,没有管到期时间
if($intreturn == 0){
	$strsql = "SELECT a.*,b.mgoods_name,b.mgoods_price,b.mgoods_cprice FROM (SELECT SUM(card_mcombo_gcount)as sum,mgoods_id FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type=2 and card_id=67 group by mgoods_id)as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
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
}
echo $intreturn;
?>