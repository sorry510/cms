<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

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
$arract_give = api_value_post('arr_give');//满送活动
$arract_decrease = api_value_post('act_decrease');//1维数组，满减id

$now = time();
$now2 = strtotime(date('Y-m-d',$now))+86399;//当前天的最后一秒
$now3 = strtotime(date('Y-m-d',$now))+1;//当前天的第一秒
$arract_discount = array();

$stract_give_id = 0;
if(!empty($arract_give)){
	$stract_give_id = implode(",",$arract_give);
}

$intreturn = 0;

if(empty($arrinfo)&&empty($arrinfo2)&&empty($arrinfo3)){
	$intreturn = 30;
}

$arr = array();
//查询card信息,不是会员不用判断
if($intreturn == 0 && $intcard_id != 0){
	$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$intreturn = 1;
	}
}
//记录card_record
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
		case 5:
			$card_pay = "card_record_kakou";break;
		default:
			break;
	}
	if(!empty($arr)){
		// 有会员卡
		if($card_pay!='card_record_kakou'){
			//不是卡扣
			//插入card_record表
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".$now."',3,".$decmoney1.",".$decmoney2.",".$decgive.",".$decmoney3.",".$arr['s_card_ymoney'].",".$intpay_type.",".$decmoney3.",".floor($decmoney3).",".$now.",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";
			$hresult = $gdb->fun_do($strsql);
			$record_id = mysql_insert_id();

			if($hresult==false){
				$intreturn = 2;
			}
			//更新积分
			if($intreturn == 0 && $intcard_id != 0) {
				$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_smoney=s_card_smoney+".$decmoney3.",s_card_sscore=s_card_sscore+".floor($decmoney3).",s_card_yscore=s_card_yscore+".floor($decmoney3).",card_ctime=".$now.",card_ltime=".$now." where card_id=".$intcard_id." limit 1";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 3;
				}
			}
			//赠送优惠券,从最高先送起,记录总活动表
			if($intreturn == 0 && $stract_give_id != '0'){
				$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id,c_ticket_begin,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('act_give')." where act_give_id in (".$stract_give_id.") order by act_give_man desc";
				// echo $stract_give_id;
				$hresult = $gdb->fun_query($strsql);
				$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
				$decmoney_now = $decmoney3;
				if(!empty($arr)){
					for($i=0;$i<sizeof($arr);){
						if($decmoney_now >= $arr[$i]['act_give_man']){
							$decmoney_now = $decmoney_now - $arr[$i]['act_give_man'];
							$arract = array();
							$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). "where act_give_id=".$arr[$i]['act_give_id']." and act_type=3";
							$hresult = $gdb->fun_query($strsql);
							$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
							if(!empty($arract)){
								$intact_id = $arract['act_id'];
							}else{
								$intact_id = 0;
							}
							if($arr[$i]['c_ticket_begin']=='1'){
								$inttime = $now3;
							}else{
								$inttime = $now2;
							}
							$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket'). " (card_id,act_type,act_give_id,ticket_type,act_id,ticket_money_id,ticket_goods_id,card_ticket_state,card_ticket_atime,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name) VALUES (".$intcard_id.",3,".$arr[$i]['act_give_id'].",".$arr[$i]['act_give_ttype'].",".$intact_id.",".$arr[$i]['ticket_money_id'].",".$arr[$i]['ticket_goods_id'].",1,".$now.",".strtotime("+".$arr[$i]['c_ticket_days']." day",$inttime).",'".$arr[$i]['c_ticket_name']."',".$arr[$i]['c_ticket_value'].",".$arr[$i]['c_ticket_limit'].",".$arr[$i]['c_ticket_days'].",".$arr[$i]['c_ticket_begin'].",".$arr[$i]['c_mgoods_id'].",'".$arr[$i]['c_mgoods_name']."')";
							// echo $strsql;
							$hresult = $gdb->fun_do($strsql);
							if($hresult == FALSE) {
								$intreturn = 13;
							}else{
								$give_record_id = mysql_insert_id();
							}
							if($intreturn == 0){
								$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name,c_ticket_begin) VALUES (".$intcard_id.",3,".$intact_id.",".$arr[$i]['act_give_id'].",".$arr[$i]['act_give_ttype'].",".$arr[$i]['ticket_money_id'].",".$arr[$i]['ticket_goods_id'].",1,".$give_record_id.",".$record_id.",".$now.",'".$arr[$i]['c_ticket_name']."',".$arr[$i]['c_ticket_value'].",".$arr[$i]['c_ticket_limit'].",".$arr[$i]['c_ticket_days'].",".$arr[$i]['c_mgoods_id'].",'".$arr[$i]['c_mgoods_name']."',".strtotime("+".$arr[$i]['c_ticket_days']." day",$inttime).",'".$arr[$i]['act_give_name']."',".$arr[$i]['c_ticket_begin'].")";
								$hresult = $gdb->fun_do($strsql);
								if($hresult == FALSE) {
									$intreturn = 14;
								}
							}
							if($intreturn == 0){
								//记录act总表记录
								$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_aticket=act_relate_aticket+1 where act_id=".$intact_id;
								$hresult = $gdb->fun_do($strsql);
								if($hresult == FALSE) {
									$intreturn = 23;
								}
							}
						}else{
							$i++;
						}
					}
				}
			}
		}else{
			//用卡扣
			$card_ymoney = $arr['s_card_ymoney']-$decmoney3;
			$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=".$card_ymoney.",card_ctime=".$now.",card_ltime=".$now." where card_id=".$intcard_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 4;
			}
			if($intreturn == 0){
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".$now."',3,".$decmoney1.",".$decmoney2.",".$decgive.",".$decmoney3.",".$card_ymoney.",".$intpay_type.",".$decmoney3.",0,".$now.",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				$record_id = mysql_insert_id();
				if($hresult==false){
					$intreturn = 5;
				}
			}
		}
	}else{
		//没有会员卡，支付方式不是卡扣
		if($card_pay!='card_record_kakou'){
			//插入card_record表
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_pay,".$card_pay.",card_record_atime,c_user_id,c_user_name,card_record_state) VALUE (".$GLOBALS['_SESSION']['login_sid'].",'".time()."',3,".$decmoney1.",".$decmoney2.",".$decgive.",".$decmoney3.",".$intpay_type.",".$decmoney3.",".$now.",".$GLOBALS['_SESSION']['login_id'].",'".$GLOBALS['_SESSION']['login_account']."',1)";

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
/*//记录出库日志总表
if($intreturn == 0){
	$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('store')." (shop_id,store_type,store_money,store_operator,store_state,store_atime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",2,".$decmoney3.",'".$GLOBALS['_SESSION']['login_account']."',1,".$now.")";
	$hresult = $gdb->fun_do($strsql);
	$store_id = mysql_insert_id();
	if($hresult==false){
		$intreturn = 15;
	}
}*/
//消费商品遍历,记录card_record3_goods,记录库存出库
if($intreturn == 0 && !empty($arrinfo)){
	foreach($arrinfo as $v){
		//记录打折活动id
		if($v['act_discount_id']!='0'){
			$arract_discount[]=$v['act_discount_id'];
		}
		$intmgoods_id = 0;
		$intsgoods_id = 0;
		if(array_key_exists("mgoods_id",$v)){
			$intmgoods_id = $v['mgoods_id'];
		}
		if(array_key_exists("sgoods_id",$v)){
			$intsgoods_id = $v['sgoods_id'];
		}
		$intnum = api_value_int0($v['num']);
		$price = api_value_decimal($v['price'],2);

		if($intnum==0){
			continue;
		}
		if($intmgoods_id != 0){
			$strsql = "SELECT mgoods_type,mgoods_id,mgoods_code,mgoods_name,mgoods_price FROM ".$GLOBALS['gdb']->fun_table2('mgoods'). " where mgoods_id=".$intmgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)){
				$intreturn = 8;
			}else{
				//记录card_record3_goods
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." (card_record_id,card_id,shop_id,mgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_rprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intmgoods_id.",".$intnum.",'".$arr['mgoods_name']."',".$arr['mgoods_price'].",".$price.")";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult==false){
					$intreturn = 10;
				}
				// 记录库存日志,没有直接今日库存
				// if($intreturn==0 && $arr['mgoods_type']==2){
				// 	$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,mgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$store_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intmgoods_id.",".$intnum.",".$now.",'".$arr['mgoods_name']."')";
				// 	$hresult = $gdb->fun_do($strsql);
				// 	if($hresult==false){
				// 		$intreturn = 11;
				// 	}
				// }
				//第二种不做记录，直接修改库存
				if($intreturn==0 && $arr['mgoods_type']==2){
					$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where mgoods_id=".$arr['mgoods_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
					$hresult = $gdb->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$now." where store_info_id=".$arr['store_info_id'];
						$hresult = $gdb->fun_do($strsql);
						if($hresult==false){
							$intreturn = 12;
						}
					}
				}
			}
		}
		if($intsgoods_id != 0){
			$strsql = "SELECT sgoods_type,sgoods_id,sgoods_code,sgoods_name,sgoods_price FROM ".$GLOBALS['gdb']->fun_table2('sgoods'). " where sgoods_id=".$intsgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arr)){
				$intreturn = 9;
			}else{
				// 记录card_record3_goods
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." (card_record_id,card_id,shop_id,sgoods_id,card_record3_goods_count,c_sgoods_name,c_sgoods_price,c_sgoods_rprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intsgoods_id.",".$intnum.",'".$arr['sgoods_name']."',".$arr['sgoods_price'].",".$price.")";
				$hresult = $gdb->fun_do($strsql);
				if($hresult==false){
					$intreturn = 10;
				}
				//第二种不做记录，直接修改库存
				if($intreturn==0 && $arr['sgoods_type']==2){
					$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where sgoods_id=".$arr['sgoods_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
					$hresult = $gdb->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$now." where store_info_id=".$arr['store_info_id'];
						$hresult = $gdb->fun_do($strsql);
						if($hresult==false){
							$intreturn = 12;
						}
					}
				}
			}
		}
	}
}
//记录套餐使用情况,验证商品数量是否超标,记录库存
if($intreturn == 0 && !empty($arrinfo2)){
	foreach($arrinfo2 as $v){
		$intcard_mcombo_id = api_value_int0($v['card_mcombo_id']);
		$intnum = api_value_int0($v['num']);

		$strsql = "SELECT card_mcombo_id,mcombo_id,mgoods_id,card_mcombo_gcount,c_mcombo_name,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo'). " where card_mcombo_id=".$intcard_mcombo_id;
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
		// 添加card_record3_mcombo,记录本次使用的套餐商品
		if($intreturn == 0){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_mcombo'). " (card_record_id,card_id,shop_id,card_mcombo_id,mcombo_id,mgoods_id,card_record3_mgoods_count,c_mcombo_name,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$arr['card_mcombo_id'].",".$arr['mcombo_id'].",".$arr['mgoods_id'].",".$intnum.",'".$arr['c_mcombo_name']."','".$arr['c_mgoods_name']."',".$arr['c_mgoods_price'].",".$arr['c_mgoods_cprice'].")";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 20;
			}
		}

		//第二种不做记录，直接修改库存
		if($intreturn==0){
			$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where mgoods_id=".$arr['mgoods_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
			$hresult = $gdb->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$now." where store_info_id=".$arr['store_info_id'];
				$hresult = $gdb->fun_do($strsql);
				if($hresult==false){
					$intreturn = 12;
				}
			}
		}
	}
}
//记录优惠券使用情况,做日期检验
if($intreturn == 0 && !empty($arrinfo3)){
	foreach($arrinfo3 as $v){
		$intcard_ticket_id = api_value_int0($v['card_ticket_id']);
		// 查活动名称
		$strsql = " SELECT a.*,b.act_give_name FROM (SELECT act_id,act_give_id,act_ticket_id,card_ticket_id,act_type,ticket_type,ticket_money_id,ticket_goods_id,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('card_ticket'). " where card_ticket_id=".$intcard_ticket_id." and card_ticket_state=1 and card_ticket_edate>".$now.") as a left join".$GLOBALS['gdb']->fun_table2('act_give')." as b on a.act_give_id = b.act_give_id ";
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
		//更新card_ticket_record,记录活动名称
		if($intreturn == 0){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,act_ticket_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name) VALUES (".$intcard_id.",".$arr['act_type'].",".$arr['act_id'].",".$arr['act_give_id'].",".$arr['act_ticket_id'].",".$arr['ticket_type'].",".$arr['ticket_money_id'].",".$arr['ticket_goods_id'].",2,".$arr['card_ticket_id'].",".$record_id.",".$now.",'".$arr['c_ticket_name']."',".$arr['c_ticket_value'].",".$arr['c_ticket_limit'].",".$arr['c_ticket_days'].",".$arr['c_ticket_begin'].",".$arr['c_mgoods_id'].",'".$arr['c_mgoods_name']."',".$arr['card_ticket_edate'].",'".$arr['act_give_name']."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 23;
			}
		}
		//记录act总表记录,没有记录金额方面的东西
		if($intreturn == 0){
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_uticket=act_relate_uticket+1 where act_id=".$arr['act_id'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 25;
			}
		}
	}
}
//记录recrord3_ygoods,没有管到期时间
if($intreturn == 0 && $intcard_id!=0){
	$strsql = "SELECT SUM(card_mcombo_gcount)as sum,mgoods_id,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type=2 and card_id=".$intcard_id." group by c_mgoods_name";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// echo json_encode($arr);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_ygoods')." (card_record_id,card_id,shop_id,mgoods_id,card_record3_ygoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$v['mgoods_id'].",".$v['sum'].",'".$v['c_mgoods_name']."',".$v['c_mgoods_price'].",".$v['c_mgoods_cprice'].")";
			$hresult = $GLOBALS['gdb']->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 13;
			}
		}
	}
}
//记录满减活动产生的金额
if($intreturn == 0){
	if(!empty($arract_decrease)){
		$arract_decrease=array_unique($arract_decrease);
		//var_dump($arract_decrease);
		foreach($arract_decrease as $v){
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). "where act_decrease_id=".$v." and act_type=2";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." set act_relate_hmoney=act_relate_hmoney+".$decmoney1.",act_relate_smoney=act_relate_smoney+".$decmoney3." where act_id=".$arract['act_id'];
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 12;
				}
			}
		}
	}
}
//记录限时折扣活动产生的金额
if($intreturn == 0){
	if(!empty($arract_discount)){
		$arract_discount=array_unique($arract_discount);
		foreach($arract_discount as $v){
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). "where act_discount_id=".$v." and act_type=1";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." set act_relate_hmoney=act_relate_hmoney+".$decmoney1.",act_relate_smoney=act_relate_smoney+".$decmoney3." where act_id=".$arract['act_id'];
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 12;
				}
			}
		}
	}
}
echo $intreturn;
