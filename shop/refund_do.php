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
if($intreturn == 0 && $pay_type != 5){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_score=s_card_score-".floor($smoney).",card_ctime=".$now." where card_id=".$card_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}
//退还卡的余额
if($intreturn == 0 && $pay_type == 5){
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=s_card_ymoney+".$smoney.",card_ctime=".$now." where card_id=".$card_id." limit 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}
//退还消费套餐商品，只能从record3表入手，返回这条之前一条的记录,未完成
if($intreturn == 0){
	$strsql = "SELECT card_record3_ygoods_id FROM ".$gdb->fun_table2('card_record3_ygoods')." where card_record_id=".$intcard_record_id;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "select card_id,mgoods_id,card_record3_ygoods_count FROM ".$gdb->fun_table2('card_record3_ygoods'). "where card_record3_ygoods_id<".$v['card_record3_ygoods_id']." order by card_record3_ygoods_id desc limit 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			//商品没法知道退给哪个套餐
			$strsql = "UPDATE ".$gdb->fun_table2('card_mcombo');
		}
	}
}
//退还消费的优惠券
if($intreturn == 0){
	$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=2";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "UPDATE ".$gdb->fun_table2('card_ticket')." SET card_ticket_state=1 where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 7;
			}
		}
	}
}
//退还赠送的优惠券
if($intreturn == 0){
	$strsql = "SELECT card_ticket_id FROM ".$gdb->fun_table2('card_ticket_record')." where card_record_id=".$intcard_record_id." and card_ticket_record_utype=1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "DELETE FROM ".$gdb->fun_table2('card_ticket')." where card_ticket_id=".$v['card_ticket_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 8;
			}
		}
	}
}
/*if($intreturn == 0 && $arr){
	if(!empty($arr)){
			//赠送优惠券,暂时没有添加总活动ID
			if($intreturn == 0 && $stract_give_id != '0'){
				$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id,act_give_tdays,c_ticket_name,c_ticket_value,c_ticket_limit,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('act_give')." where act_give_id in (".$stract_give_id.")";
				$hresult = $gdb->fun_query($strsql);
				$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
				if(!empty($arr)){
					foreach($arr as $v){
						if($decmoney3 >= $v['act_give_man']){
							$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket'). " (card_id,act_type,act_give_id,ticket_type,ticket_money_id,ticket_goods_id,mgoods_id,card_ticket_state,card_ticket_atime,card_ticket_edate,c_mgoods_name) VALUES (".$intcard_id.",3,".$v['act_give_id'].",".$v['act_give_ttype'].",".$v['ticket_money_id'].",".$v['ticket_goods_id'].",".$v['c_mgoods_id'].",1,".$now.",".strtotime("+".$v['act_give_tdays']." day",$now).",'".$v['c_mgoods_name']."')";
							// echo $strsql;
							$hresult = $gdb->fun_do($strsql);
							if($hresult == FALSE) {
								$intreturn = 13;
							}else{
								$give_record_id = mysql_insert_id();
							}

							$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_give_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name) VALUES (".$intcard_id.",3,".$v['act_give_id'].",".$v['act_give_ttype'].",".$v['ticket_money_id'].",".$v['ticket_goods_id'].",1,".$give_record_id.",".$record_id.",".$now.",'".$v['c_ticket_name']."',".$v['c_ticket_value'].",".$v['c_ticket_limit'].",".$v['c_mgoods_id'].",'".$v['c_mgoods_name']."',".strtotime("+".$v['act_give_tdays']." day",$now).",'".$v['act_give_name']."')";
							$hresult = $gdb->fun_do($strsql);
							if($hresult == FALSE) {
								$intreturn = 14;
							}
						}
					}
				}else{
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
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',3,".$decmoney1.",".$decmoney2.",".$decgive.",".$decmoney3.",".$card_ymoney.",".$intpay_type.",0,".time().",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";

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
}*/

//消费商品遍历,记录card_record3_goods
/*if($intreturn == 0 && !empty($arrinfo)){
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

		if($intnum==0){
			continue;
		}
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
}*/
//记录套餐使用情况,验证商品数量是否超标
/*if($intreturn == 0 && !empty($arrinfo2)){
	foreach($arrinfo2 as $v){
		$intcard_mcombo_id = api_value_int0($v['card_mcombo_id']);
		$intnum = api_value_int0($v['num']);

		$strsql = "SELECT mgoods_id,card_mcombo_gcount FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo'). " where card_mcombo_id=".$intcard_mcombo_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(empty($arr)){
			$intreturn = 17;
		}else{
			if($intnum>$arr['card_mcombo_gcount']){
				$intreturn = 18;//购买数量超过套餐商品数量
			}else{
				$intcount_now = $arr['card_mcombo_gcount']-$intnum;
			}
		}
		//更新card_mcombo表
		if($intreturn == 0){
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_mcombo'). " SET card_mcombo_gcount=".$intcount_now." where card_mcombo_id=".$intcard_mcombo_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 19;
			}
		}
		// 添加card_record3_ygoods,只会更新当前使用的套餐商品
		// if($intreturn == 0){
		// 	$strsql= "SELECT mgoods_id,mgoods_name,mgoods_price,mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('mgoods'). "where mgoods_id=".$arr['mgoods_id'];
		// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
		// 	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

		// 	$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_ygoods'). " (card_record_id,card_id,shop_id,mgoods_id,card_record3_ygoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$arr['mgoods_id'].",".$intcount_now.",'".$arr['mgoods_name']."',".$arr['mgoods_price'].",".$arr['mgoods_cprice'].")";
		// 	$hresult = $gdb->fun_do($strsql);
		// 	if($hresult==false){
		// 		$intreturn = 20;
		// 	}
		// }
	}
}*/
//记录优惠券使用情况,没有做日期检验
/*if($intreturn == 0 && !empty($arrinfo3)){
	foreach($arrinfo3 as $v){
		$intcard_ticket_id = api_value_int0($v['card_ticket_id']);

		$strsql = "SELECT act_id,act_give_id,act_ticket_id,card_ticket_id,act_type,ticket_type,ticket_money_id,ticket_goods_id,mgoods_id,card_ticket_edate FROM ".$GLOBALS['gdb']->fun_table2('card_ticket'). " where card_ticket_id=".$intcard_ticket_id." and card_ticket_state=1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(empty($arr)){
			$intreturn = 21;
		}
		//更新card_ticket表
		if($intreturn == 0){
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_ticket'). " SET card_ticket_state=2 where card_ticket_id=".$intcard_ticket_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 22;
			}
		}
		//更新card_ticket_record,没有记录活动名称
		if($intreturn == 0){
			if($arr['ticket_type'] == 1){
				$strsql = "SELECT ticket_money_name,ticket_money_value,ticket_money_limit FROM ".$GLOBALS['gdb']->fun_table2('ticket_money')." where ticket_money_id=".$arr['ticket_money_id'];
				$hresult = $GLOBALS['gdb']->fun_query($strsql);
				$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(empty($arr2)){
					$intreturn = 23;
				}
				if($intreturn == 0){
					$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,act_ticket_id,card_ticket_record_ttype,ticket_money_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_edate) VALUES (".$intcard_id.",".$arr['act_type'].",".$arr['act_id'].",".$arr['act_give_id'].",".$arr['act_ticket_id'].",1,".$arr['ticket_money_id'].",2,".$arr['card_ticket_id'].",".$record_id.",".$now.",'".$arr2['ticket_money_name']."',".$arr2['ticket_money_value'].",".$arr2['ticket_money_limit'].",".$arr['card_ticket_edate'].")";
					$hresult = $gdb->fun_do($strsql);
					if($hresult==false){
						$intreturn = 24;
					}
				}
			}else if($arr['ticket_type'] == 2){
				$strsql = "SELECT a.*,b.mgoods_name FROM (SELECT mgoods_id,ticket_goods_name,ticket_goods_value FROM ".$GLOBALS['gdb']->fun_table2('ticket_goods')." where ticket_goods_id=".$arr['ticket_goods_id'].") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";
				$hresult = $GLOBALS['gdb']->fun_query($strsql);
				$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(empty($arr2)){
					$intreturn = 25;
				}
				if($intreturn == 0){
					$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,act_ticket_id,card_ticket_record_ttype,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_mgoods_id,c_mgoods_name,c_ticket_edate) VALUES (".$intcard_id.",".$arr['act_type'].",".$arr['act_id'].",".$arr['act_give_id'].",".$arr['act_ticket_id'].",2,".$arr['ticket_goods_id'].",2,".$arr['card_ticket_id'].",".$record_id.",".$now.",'".$arr2['ticket_goods_name']."',".$arr2['ticket_goods_value'].",".$arr2['mgoods_id'].",'".$arr2['mgoods_name']."',".$arr['card_ticket_edate'].")";
					$hresult = $gdb->fun_do($strsql);
					if($hresult==false){
						$intreturn = 26;
					}
				}
			}
		}
	}
}*/
//记录recrord3_ygoods,没有管到期时间
/*if($intreturn == 0 && $intcard_id!=0){
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
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_ygoods')." (card_record_id,card_id,shop_id,mgoods_id,card_record3_ygoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$v['mgoods_id'].",".$v['sum'].",'".$v['mgoods_name']."',".$v['mgoods_price'].",".$v['mgoods_cprice'].")";
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 13;
		}
	}
}*/
echo $intreturn;
