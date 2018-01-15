<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
require_once C_ROOT . '/sms/api_sdk/vendor/autoload.php';
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strworker_guide_id = api_value_post('worker_guide_id');
$intworker_guide_id = api_value_int0($strworker_guide_id);
$strhmoney = api_value_post('hmoney');//原价
$dechmoney = api_value_decimal($strhmoney, 2);
$strymoney = api_value_post('ymoney');//各种优惠后
$decymoney = api_value_decimal($strymoney, 2);
$strsmoney = api_value_post('smoney');//实际付款价
$decsmoney = api_value_decimal($strsmoney, 2);
$strsmoney2 = api_value_post('relmoney');//实际付款价2
$decsmoney2 = api_value_decimal($strsmoney2, 2);
$strmmoney = api_value_post('decrease_money');//满减活动
$decmmoney = api_value_decimal($strmmoney, 2);
$strjmoney = api_value_post('jmoney');//手动优惠
$decjmoney = api_value_decimal($strjmoney, 2);
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$strpay_state = api_value_post('pay_state');
$intpay_state = api_value_int0($strpay_state);
$arrinfo = api_value_post('arr');//商品，格式[{"id":"2","num":"1"},{"id":"5","num":"4"}]
$arrinfo2 = api_value_post('arr2');//套餐
$arrinfo3 = api_value_post('arr3');//体验券
$strticketmoneyid = api_value_post('ticketmoneyid');//代金券
$intticketmoneyid = api_value_int0($strticketmoneyid);
$arract_give = api_value_post('act_give_use');//满送活动
$arract_decrease = api_value_post('act_decrease_use');//满减活动
$strout_trade_no = api_value_post('out_trade_no');
$card_record_code = $gdb->fun_escape($strout_trade_no);//用户id+时间戳

$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);
$user_id = api_value_int0($GLOBALS['_SESSION']['login_id']);
$intnow = time();
$intnow2 = strtotime(date('Y-m-d', $intnow)) + 86399;
$intnow3 = strtotime(date('Y-m-d', $intnow)) - 1;
$intscore = 0;
if($GLOBALS['gtrade']['score_module'] == 1 && $GLOBALS['gtrade']['score_flag'] == 1){
	$intscore = floor($decsmoney);
}
$arr = array();
$user_name = '';
$strsql = "SELECT user_name FROM ".$GLOBALS['gdb']->fun_table2('user'). " WHERE user_id=".api_value_int0($GLOBALS['_SESSION']['login_id']). " LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$user_name = $arr['user_name'];//操作员姓名;
}

$intreturn = 0;


if(empty($arrinfo) && empty($arrinfo2) && empty($arrinfo3)){
	$intreturn = 1;
}
if(empty($arrinfo)){
	$arrinfo = array();
}
if(empty($arrinfo3)){
	$arrinfo3 = array();
}


//检验价格是否正确,最终价=所有商品真实价格+满减+代金券+手动优惠，免单不算
//商品删除对消费有影响

// 检测体验券商品是否存在，同时封装到商品数组中
if($intreturn == 0 && !empty($arrinfo3)){
	foreach($arrinfo3 as $row){
		$arrtmgoods = array();
		$arrtmp = array();
		$strsql = "SELECT mgoods_id FROM ".$GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_id=".$row['mgoods_id']." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrtmgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arrtmgoods)){
			$arrtmp['mgoods_id'] = $arrtmgoods['mgoods_id'];
			$arrtmp['num'] = 1;
			$arrtmp['price'] = 0;
			$arrtmp['act_discount_id'] = 0;
			$arrtmp['worker_id'] = $row['worker_id'];
			array_push($arrinfo, $arrtmp);
		}else{
			$intreturn = 30;
		}
	}
}
//把代金券封装到体验券数组中
if($intreturn == 0 && $intticketmoneyid != 0){
	$arrtmp = array();
	$arrtmp['card_ticket_id'] = $intticketmoneyid;
	array_push($arrinfo3, $arrtmp);
}

$arrcard = array();
//查询card信息,不是会员不用判断
if($intreturn == 0){
	if($intcard_id != 0){
		$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrcard = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(empty($arrcard)){
			$intreturn = 2;
		}
	}
}

//记录card_record，赠送优惠券,记录导购提成
if($intreturn == 0){
	$card_pay = '';
	switch($intpay_type)
	{
		case 1:
			$card_pay = "card_record_xianjin"; break;
		case 2:
			$card_pay = "card_record_yinhang"; break;
		case 3:
			$card_pay = "card_record_weixin"; break;
		case 4:
			$card_pay = "card_record_zhifubao"; break;
		case 5:
			$card_pay = "card_record_kakou"; break;
		case 6:
			$card_pay = "card_record_tuan"; break;
		default:
			break;
	}
	if(!empty($arrcard)){
		// 有会员卡
		if($card_pay != 'card_record_kakou'){
			$card_ymoney = $arrcard['s_card_ymoney'];
			//不是卡扣
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_smoney2,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$intshop.",'".$card_record_code."',3,".$dechmoney.",".$decymoney.",".$decjmoney.",".$decsmoney.",".$decsmoney2.",".$arrcard['s_card_ymoney'].",".$intpay_type.",".$decsmoney.",".$intscore.",".$intnow.",".$arrcard['card_type_id'].",'".$arrcard['c_card_type_name']."',".$arrcard['c_card_type_discount'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrcard['card_sex'].",".$user_id.",'".$user_name."',".$intpay_state.")";
			$hresult = $gdb->fun_do($strsql);
			$record_id = $GLOBALS['gdb']->fun_insert_id();

			if($hresult==false){
				$intreturn = 3;
			}
			//更新积分
			if($intreturn == 0) {
				//启用积分模块
				if($GLOBALS['gtrade']['score_module'] == 1 && $GLOBALS['gtrade']['score_flag'] == 1){
					$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_smoney=s_card_smoney+".$decsmoney.",s_card_sscore=s_card_sscore+".$intscore.",s_card_yscore=s_card_yscore+".$intscore.",card_ctime=".$intnow.",card_ltime=".$intnow." where card_id=".$intcard_id." limit 1";
					// echo $strsql;
					$gdb->fun_do($strsql);
				}else{
					$strsql = "UPDATE ".$gdb->fun_table2('card')." card_ltime=".$intnow." where card_id=".$intcard_id." limit 1";
					$gdb->fun_do($strsql);
				}
			}
		}else{
			//用卡扣
			$card_ymoney = $arrcard['s_card_ymoney'] - $decsmoney;
			$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=".$card_ymoney.",card_ctime=".$intnow.",card_ltime=".$intnow." where card_id=".$intcard_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 4;
			}
			if($intreturn == 0){
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_smoney2,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$intshop.",'".$card_record_code."',3,".$dechmoney.",".$decymoney.",".$decjmoney.",".$decsmoney.",".$decsmoney2.",".$card_ymoney.",".$intpay_type.",".$decsmoney.",0,".$intnow.",".$arrcard['card_type_id'].",'".$arrcard['c_card_type_name']."',".$arrcard['c_card_type_discount'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrcard['card_sex'].",".$user_id.",'".$user_name."',".$intpay_state.")";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				$record_id = $GLOBALS['gdb']->fun_insert_id();
				if($hresult==false){
					$intreturn = 5;
				}
			}
		}
		//赠送优惠券,记录总活动表
		if($intreturn == 0 && !empty($arract_give)){
			foreach($arract_give as $row){
				$intact_give_id = api_value_int0($row['act_give_id']);
				$intact_number = api_value_int0($row['act_number']);
				$arract = array();
				$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). " where act_give_id=".$intact_give_id." and act_type=3";
				$hresult = $gdb->fun_query($strsql);
				$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(!empty($arract)){
					$intact_id = $arract['act_id'];
				}else{
					$intact_id = 0;
				}
				$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id,c_ticket_begin,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('act_give')." where act_give_id=".$intact_give_id;
				$hresult = $gdb->fun_query($strsql);
				$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(!empty($arr)){
					if($arr['c_ticket_begin'] == '1'){
						$inttime = $intnow3;
					}else{
						$inttime = $intnow2;
					}

					for($i = 0; $i < $intact_number; $i++){
						$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket'). " (card_id,act_type,act_give_id,ticket_type,act_id,ticket_money_id,ticket_goods_id,card_ticket_state,card_ticket_atime,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name) VALUES (".$intcard_id.",3,".$arr['act_give_id'].",".$arr['act_give_ttype'].",".$intact_id.",".$arr['ticket_money_id'].",".$arr['ticket_goods_id'].",1,".$intnow.",".strtotime("+".$arr['c_ticket_days']." day", $inttime).",'".$arr['c_ticket_name']."',".$arr['c_ticket_value'].",".$arr['c_ticket_limit'].",".$arr['c_ticket_days'].",".$arr['c_ticket_begin'].",".$arr['c_mgoods_id'].",'".$arr['c_mgoods_name']."')";
						// echo $strsql;
						$hresult = $gdb->fun_do($strsql);
						if($hresult) {
							$give_record_id = $GLOBALS['gdb']->fun_insert_id();
						}else{
							$give_record_id = 0;
						}
						if($give_record_id != 0){
							// card_record记录
							$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name,c_ticket_begin) VALUES (".$intcard_id.",3,".$intact_id.",".$arr['act_give_id'].",".$arr['act_give_ttype'].",".$arr['ticket_money_id'].",".$arr['ticket_goods_id'].",1,".$give_record_id.",".$record_id.",".$intnow.",'".$arr['c_ticket_name']."',".$arr['c_ticket_value'].",".$arr['c_ticket_limit'].",".$arr['c_ticket_days'].",".$arr['c_mgoods_id'].",'".$arr['c_mgoods_name']."',".strtotime("+".$arr['c_ticket_days']." day",$inttime).",'".$arr['act_give_name']."',".$arr['c_ticket_begin'].")";
							$gdb->fun_do($strsql);
							//记录act总表记录
							$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_aticket=act_relate_aticket+1,act_ctime=".$intnow." where act_id=".$intact_id;
							$gdb->fun_do($strsql);
						}
					}
				}
			}
		}
	}else{
		//没有会员卡，支付方式不是卡扣
		if($card_pay != 'card_record_kakou'){
			//插入card_record表
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_pay,".$card_pay.",card_record_atime,c_user_id,c_user_name,card_record_state) VALUE (".$intshop.",'".$card_record_code."',3,".$dechmoney.",".$decymoney.",".$decjmoney.",".$decsmoney.",".$intpay_type.",".$decsmoney.",".$intnow.",".$user_id.",'".$user_name."',".$intpay_state.")";

			$hresult = $gdb->fun_do($strsql);
			$record_id = $GLOBALS['gdb']->fun_insert_id();

			if($hresult==false){
				$intreturn = 6;
			}
		}else{
			$intreturn = 7;
		}
	}
	// 导购提成
	if($GLOBALS['gtrade']['worker_module'] == 1 && $GLOBALS['gtrade']['worker_flag'] == 1){
		if($intreturn == 0 && $intworker_guide_id != 0 && $intpay_state == 1){
			$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_guide_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
			$hresult = $gdb->fun_query($strsql);
			$arr = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$intworker_guide_id = $arr['worker_id'];
				$intworker_group_id = $arr['worker_group_id'];
				$strworker_name = $arr['worker_name'];
				$strworker_group_name = $arr['worker_group_name'];
				$strsql = "SELECT group_reward_guide,group_reward_pguide FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=".$intshop;
				$hresult = $gdb->fun_query($strsql);
				$arr = $gdb->fun_fetch_assoc($hresult);
				if(!empty($arr)){
					$decgroup_reward_guide = 0;
					if($arr['group_reward_guide'] != 0){
						$decgroup_reward_guide = $arr['group_reward_guide'];
					}
					if($arr['group_reward_pguide'] != 0){
						$decgroup_reward_guide = $arr['group_reward_pguide'] * $decsmoney / 100;
					}

					if($decgroup_reward_guide != 0){
						if(!empty($arrcard)){
							// 有会员卡提成
							$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_card_record_id,c_card_record_code,c_card_record_smoney) VALUES (".$intworker_guide_id.",".$intshop.",4,".$decgroup_reward_guide.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrcard['card_id'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$record_id.",'".$card_record_code."',".$decsmoney.")";
							// echo $strsql;
							$hresult = $gdb->fun_do($strsql);
							if($hresult == false){
								$intreturn = 8;
							}
						}else{
							$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_record_id,c_card_record_code,c_card_record_smoney) VALUES (".$intworker_guide_id.",".$intshop.",4,".$decgroup_reward_guide.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$record_id.",'".$card_record_code."',".$decsmoney.")";
							// echo $strsql;
							$hresult = $gdb->fun_do($strsql);
							if($hresult == false){
								$intreturn = 8;
							}
						}
					}
				}
			}
		}
	}
}
//消费商品遍历,记录card_record3_goods,记录库存出库,记录提成
if($intreturn == 0 && !empty($arrinfo)){
	$arract_discount = array();
	foreach($arrinfo as $row){
		//记录打折活动id
		if(array_key_exists("act_discount_id", $row)){
			if($row['act_discount_id'] != '0'){
				$arract_discount[] = $row['act_discount_id'];
			}
		}
		$intmgoods_id = 0;
		$intsgoods_id = 0;
		if(array_key_exists("mgoods_id",$row)){
			$intmgoods_id = $row['mgoods_id'];
		}
		if(array_key_exists("sgoods_id",$row)){
			$intsgoods_id = $row['sgoods_id'];
		}
		$intnum = api_value_int0($row['num']);
		$intworker_id = api_value_int0($row['worker_id']);
		$price = api_value_decimal($row['price'], 2);

		$strworker_name = '';
		$strsql = "SELECT worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrworker = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arrworker)){
			$strworker_name = $arrworker['worker_name'];
		}

		if($intnum==0){
			continue;
		}
		if($intmgoods_id != 0){
			$strsql = "SELECT mgoods_type,mgoods_id,mgoods_code,mgoods_name,mgoods_price FROM ".$GLOBALS['gdb']->fun_table2('mgoods'). " where mgoods_id=".$intmgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrmgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arrmgoods)){
				$intreturn = 9;
			}else{
				//记录card_record3_goods
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." (card_record_id,card_id,shop_id,mgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_rprice,	card_record3_goods_state,card_record3_goods_atime,worker_id,c_worker_name) VALUES (".$record_id.",".$intcard_id.",".$intshop.",".$intmgoods_id.",".$intnum.",'".$arrmgoods['mgoods_name']."',".$arrmgoods['mgoods_price'].",".$price.",".$intpay_state.",".$intnow.",".$intworker_id.",'".$strworker_name."')";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult==false){
					$intreturn = 10;
				}

				//直接修改库存
				if($intreturn == 0 && $arrmgoods['mgoods_type'] == 2){
					$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where mgoods_id=".$arrmgoods['mgoods_id']." and shop_id=".$intshop;
					$hresult = $gdb->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$intnow." where store_info_id=".$arr['store_info_id'];
						$hresult = $gdb->fun_do($strsql);
						if($hresult==false){
							$intreturn = 11;
						}
					}
				}
				// 商品提成
				if($GLOBALS['gtrade']['worker_module'] == 1 && $GLOBALS['gtrade']['worker_flag'] == 1){
					if($intreturn == 0 && $intworker_id != 0){
						$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
						$hresult = $gdb->fun_query($strsql);
						$arr = $gdb->fun_fetch_assoc($hresult);
						if(!empty($arr)){
							$intworker_id = $arr['worker_id'];
							$intworker_group_id = $arr['worker_group_id'];
							$strworker_name = $arr['worker_name'];
							$strworker_group_name = $arr['worker_group_name'];
							$strsql = "SELECT group_reward2_money FROM " .$gdb->fun_table2('group_reward2') . " where worker_group_id=".$intworker_group_id." and shop_id=".$intshop." and mgoods_id=".$intmgoods_id;
							$hresult = $gdb->fun_query($strsql);
							$arr = $gdb->fun_fetch_assoc($hresult);
							if(!empty($arr)){
								$decreward_money = $arr['group_reward2_money'] * $intnum;
								if($decreward_money != 0){
									if(!empty($arrcard)){
										// 有会员卡提成
										$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_mgoods_id,c_goods_name,c_goods_price,c_goods_count,c_card_record_id,c_card_record_code,c_card_record_smoney,c_goods_type) VALUES (".$intworker_id.",".$intshop.",3,".$decreward_money.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrcard['card_id'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrmgoods['mgoods_id'].",'".$arrmgoods['mgoods_name']."',".$arrmgoods['mgoods_price'].",".$intnum.",".$record_id.",'".$card_record_code."',".$decsmoney.",".$arrmgoods['mgoods_type'].")";
										// echo $strsql;
										$hresult = $gdb->fun_do($strsql);
										if($hresult == false){
											$intreturn = 12;
										}
									}else{
										$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_mgoods_id,c_goods_name,c_goods_price,c_goods_count,c_card_record_id,c_card_record_code,c_card_record_smoney,c_goods_type) VALUES (".$intworker_id.",".$intshop.",3,".$decreward_money.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrmgoods['mgoods_id'].",'".$arrmgoods['mgoods_name']."',".$arrmgoods['mgoods_price'].",".$intnum.",".$record_id.",'".$card_record_code."',".$decsmoney.",".$arrmgoods['mgoods_type'].")";
										// echo $strsql;
										$hresult = $gdb->fun_do($strsql);
										if($hresult == false){
											$intreturn = 12;
										}
									}
								}
							}
						}
					}
				}
			}
		}
		if($intsgoods_id != 0){
			$strsql = "SELECT sgoods_type,sgoods_id,sgoods_code,sgoods_name,sgoods_price FROM ".$GLOBALS['gdb']->fun_table2('sgoods'). " where sgoods_id=".$intsgoods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrsgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(empty($arrsgoods)){
				$intreturn = 9;
			}else{
				// 记录card_record3_goods
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_goods')." (card_record_id,card_id,shop_id,sgoods_id,card_record3_goods_count,c_sgoods_name,c_sgoods_price,c_sgoods_rprice,card_record3_goods_state,card_record3_goods_atime) VALUES (".$record_id.",".$intcard_id.",".$intshop.",".$intsgoods_id.",".$intnum.",'".$arrsgoods['sgoods_name']."',".$arrsgoods['sgoods_price'].",".$price.",".$intpay_state.",".$intnow.")";
				$hresult = $gdb->fun_do($strsql);
				if($hresult==false){
					$intreturn = 10;
				}
				//第二种不做记录，直接修改库存
				if($intreturn==0 && $arrsgoods['sgoods_type']==2){
					$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where sgoods_id=".$arrsgoods['sgoods_id']." and shop_id=".$intshop;
					$hresult = $gdb->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$intnow." where store_info_id=".$arr['store_info_id'];
						$hresult = $gdb->fun_do($strsql);
						if($hresult==false){
							$intreturn = 11;
						}
					}
				}
				// 商品提成
				if($GLOBALS['gtrade']['worker_module'] == 1 && $GLOBALS['gtrade']['worker_flag'] == 1){
					if($intreturn == 0 && $intworker_id != 0){
						$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
						$hresult = $gdb->fun_query($strsql);
						$arr = $gdb->fun_fetch_assoc($hresult);
						if(!empty($arr)){
							$intworker_id = $arr['worker_id'];
							$intworker_group_id = $arr['worker_group_id'];
							$strworker_name = $arr['worker_name'];
							$strworker_group_name = $arr['worker_group_name'];
							$strsql = "SELECT group_reward2_money FROM " .$gdb->fun_table2('group_reward2') . " where worker_group_id=".$intworker_group_id." and shop_id=".$intshop." and sgoods_id=".$intsgoods_id;
							$hresult = $gdb->fun_query($strsql);
							$arr = $gdb->fun_fetch_assoc($hresult);
							if(!empty($arr)){
								$decreward_money = $arr['group_reward2_money']*$intnum;
								if($decreward_money != 0){
									if(!empty($arrcard)){
										// 有会员卡提成
										$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_sgoods_id,c_goods_name,c_goods_price,c_goods_count,c_card_record_id,c_card_record_code,c_card_record_smoney,c_goods_type) VALUES (".$intworker_id.",".$intshop.",3,".$decreward_money.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrcard['card_id'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrsgoods['sgoods_id'].",'".$arrsgoods['sgoods_name']."',".$arrsgoods['sgoods_price'].",".$intnum.",".$record_id.",'".$card_record_code."',".$decsmoney.",".$arrsgoods['sgoods_type'].")";
										// echo $strsql;
										$hresult = $gdb->fun_do($strsql);
										if($hresult == false){
											$intreturn = 12;
										}
									}else{
										$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_sgoods_id,c_goods_name,c_goods_price,c_goods_count,c_card_record_id,c_card_record_code,c_card_record_smoney,c_goods_type) VALUES (".$intworker_id.",".$intshop.",3,".$decreward_money.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrsgoods['sgoods_id'].",'".$arrsgoods['sgoods_name']."',".$arrsgoods['sgoods_price'].",".$intnum.",".$record_id.",'".$card_record_code."',".$decsmoney.",".$arrsgoods['sgoods_type'].")";
										// echo $strsql;
										$hresult = $gdb->fun_do($strsql);
										if($hresult == false){
											$intreturn = 12;
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
//记录套餐使用情况,验证商品数量是否超标,记录库存,记录提成
if($intreturn == 0 && !empty($arrinfo2)){
	foreach($arrinfo2 as $row){
		// 记次套餐使用情况
		$intcard_mcombo_id = api_value_int0($row['card_mcombo_id']);
		$intnum = api_value_int0($row['num']);
		$intworker_id = api_value_int0($row['worker_id']);

		$strworker_name = '';
		$strsql = "SELECT worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrworker = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arrworker)){
			$strworker_name = $arrworker['worker_name'];
		}

		$strsql = "SELECT card_mcombo_id,mcombo_id,mgoods_id,card_mcombo_gcount,c_mcombo_type,c_mcombo_name,c_mgoods_name,c_mgoods_type,c_mgoods_price,c_mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo'). " where card_mcombo_id=".$intcard_mcombo_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmcombo = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(empty($arrmcombo)){
			$intreturn = 13;
		}else{
			//记次套餐,购买数量超过套餐商品数量时，把购买数量调整为套餐中剩余数量
			if($arrmcombo['c_mcombo_type'] == 1){
				if($intnum > $arrmcombo['card_mcombo_gcount']){
					// $intreturn = 14;
					$intcount_intnow = 0;
					$intnum = $arrmcombo['card_mcombo_gcount'];
				}else{
					$intcount_intnow = $arrmcombo['card_mcombo_gcount'] - $intnum;
				}
			}
		}
		//记次套餐时，更新card_mcombo表
		if($intreturn == 0 && $arrmcombo['c_mcombo_type'] == 1){
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_mcombo'). " SET card_mcombo_gcount=".$intcount_intnow.",card_mcombo_ctime=".$intnow." where card_mcombo_id=".$intcard_mcombo_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == false){
				$intreturn = 15;
			}
		}
		// 添加card_record3_mcombo,记录本次使用的套餐商品
		if($intreturn == 0){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_mcombo'). " (card_record_id,card_id,shop_id,card_mcombo_id,mcombo_id,mgoods_id,card_record3_mgoods_count,c_mcombo_name,c_mgoods_name,c_mgoods_price,c_mgoods_cprice,card_record3_mcombo_state,card_record3_mcombo_atime,worker_id,c_worker_name) VALUES (".$record_id.",".$intcard_id.",".$intshop.",".$arrmcombo['card_mcombo_id'].",".$arrmcombo['mcombo_id'].",".$arrmcombo['mgoods_id'].",".$intnum.",'".$arrmcombo['c_mcombo_name']."','".$arrmcombo['c_mgoods_name']."',".$arrmcombo['c_mgoods_price'].",".$arrmcombo['c_mgoods_cprice'].",".$intpay_state.",".$intnow.",".$intworker_id.",'".$strworker_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == false){
				$intreturn = 20;
			}
		}
		//直接修改库存
		if($intreturn == 0){
			$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where mgoods_id=".$arrmcombo['mgoods_id']." and shop_id=".$intshop;
			$hresult = $gdb->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$intnow." where store_info_id=".$arr['store_info_id'];
				$hresult = $gdb->fun_do($strsql);
				// if($hresult == false){
				// 	$intreturn = 12;
				// }
			}
		}
		// 商品提成
		if($GLOBALS['gtrade']['worker_module'] == 1 && $GLOBALS['gtrade']['worker_flag'] == 1){
			if($intreturn == 0 && $intworker_id != 0){
				$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
				$hresult = $gdb->fun_query($strsql);
				$arr = $gdb->fun_fetch_assoc($hresult);
				if(!empty($arr)){
					$intworker_id = $arr['worker_id'];
					$intworker_group_id = $arr['worker_group_id'];
					$strworker_name = $arr['worker_name'];
					$strworker_group_name = $arr['worker_group_name'];
					$strsql = "SELECT group_reward2_money FROM " .$gdb->fun_table2('group_reward2') . " where worker_group_id=".$intworker_group_id." and shop_id=".$intshop." and mgoods_id=".$arrmcombo['mgoods_id'];
					$hresult = $gdb->fun_query($strsql);
					$arr = $gdb->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$decreward_money = $arr['group_reward2_money']*$intnum;
						if($decreward_money != 0){
							if(!empty($arrcard)){
								// 有会员卡提成
								$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_mgoods_id,c_goods_name,c_goods_price,c_goods_count,c_card_record_id,c_card_record_code,c_card_record_smoney,c_goods_type) VALUES (".$intworker_id.",".$intshop.",3,".$decreward_money.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrcard['card_id'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrmcombo['mgoods_id'].",'".$arrmcombo['c_mgoods_name']."',".$arrmcombo['c_mgoods_price'].",".$intnum.",".$record_id.",'".$card_record_code."',".$decsmoney.",".$arrmcombo['c_mgoods_type'].")";
								// echo $strsql;
								$hresult = $gdb->fun_do($strsql);
								if($hresult == false){
									$intreturn = 13;
								}
							}
						}
					}
				}
			}
		}
	}
}
//发送短信
if($GLOBALS['gtrade']['sms_module'] == 1 && $GLOBALS['gtrade']['sms_flag'] == 1){
	if($intreturn == 0 && $intcard_id!=0){
	  $intsms_ycount = 0;
	  $strsql = "SELECT company_sms_ycount FROM ".$GLOBALS['gdb']->fun_table('company')." WHERE company_id=".api_value_int0($GLOBALS['_SESSION']['login_cid']);
	  $hresult = $GLOBALS['gdb']->fun_query($strsql);
	  $arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	  if(!empty($arr)){
	    $intsms_ycount = $arr['company_sms_ycount'];
	  }

		if($intsms_ycount > 0){
		  // 加载区域结点配置
		  Config::load();

		  /**
		   * Class SmsDemo
		   *
		   * @property \Aliyun\Core\DefaultAcsClient acsClient
		   */
		  class SmsDemo
		  {

		      /**
		       * 构造器
		       *
		       * @param string $accessKeyId 必填，AccessKeyId
		       * @param string $accessKeySecret 必填，AccessKeySecret
		       */
		      public function __construct($accessKeyId, $accessKeySecret)
		      {

		          // 短信API产品名
		          $product = "Dysmsapi";

		          // 短信API产品域名
		          $domain = "dysmsapi.aliyuncs.com";

		          // 暂时不支持多Region
		          $region = "cn-hangzhou";

		          // 服务结点
		          $endPointName = "cn-hangzhou";

		          // 初始化用户Profile实例
		          $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

		          // 增加服务结点
		          DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

		          // 初始化AcsClient用于发起请求
		          $this->acsClient = new DefaultAcsClient($profile);
		      }

		      /**
		       * 发送短信范例
		       *
		       * @param string $signName <p>
		       * 必填, 短信签名，应严格"签名名称"填写，参考：<a href="https://dysms.console.aliyun.com/dysms.htm#/sign">短信签名页</a>
		       * </p>
		       * @param string $templateCode <p>
		       * 必填, 短信模板Code，应严格按"模板CODE"填写, 参考：<a href="https://dysms.console.aliyun.com/dysms.htm#/template">短信模板页</a>
		       * (e.g. SMS_0001)
		       * </p>
		       * @param string $phoneNumbers 必填, 短信接收号码 (e.g. 12345678901)
		       * @param array|null $templateParam <p>
		       * 选填, 假如模板中存在变量需要替换则为必填项 (e.g. Array("code"=>"12345", "product"=>"阿里通信"))
		       * </p>
		       * @param string|null $outId [optional] 选填, 发送短信流水号 (e.g. 1234)
		       * @return stdClass
		       */
		      public function sendSms($signName, $templateCode, $phoneNumbers, $templateParam = null, $outId = null) {

		          // 初始化SendSmsRequest实例用于设置发送短信的参数
		          $request = new SendSmsRequest();

		          // 必填，设置雉短信接收号码
		          $request->setPhoneNumbers($phoneNumbers);

		          // 必填，设置签名名称
		          $request->setSignName($signName);

		          // 必填，设置模板CODE
		          $request->setTemplateCode($templateCode);

		          // 可选，设置模板参数
		          if($templateParam) {
		              $request->setTemplateParam(json_encode($templateParam));
		          }

		          // 可选，设置流水号
		          if($outId) {
		              $request->setOutId($outId);
		          }

		          // 发起访问请求
		          $acsResponse = $this->acsClient->getAcsResponse($request);

		          // 打印请求结果
		          // var_dump($acsResponse);

		          return $acsResponse;

		      }

		      /**
		       * 查询短信发送情况范例
		       *
		       * @param string $phoneNumbers 必填, 短信接收号码 (e.g. 12345678901)
		       * @param string $sendDate 必填，短信发送日期，格式Ymd，支持近30天记录查询 (e.g. 20170710)
		       * @param int $pageSize 必填，分页大小
		       * @param int $currentPage 必填，当前页码
		       * @param string $bizId 选填，短信发送流水号 (e.g. abc123)
		       * @return stdClass
		       */
		      public function queryDetails($phoneNumbers, $sendDate, $pageSize = 10, $currentPage = 1, $bizId=null) {

		          // 初始化QuerySendDetailsRequest实例用于设置短信查询的参数
		          $request = new QuerySendDetailsRequest();

		          // 必填，短信接收号码
		          $request->setPhoneNumber($phoneNumbers);

		          // 选填，短信发送流水号
		          $request->setBizId($bizId);

		          // 必填，短信发送日期，支持近30天记录查询，格式Ymd
		          $request->setSendDate($sendDate);

		          // 必填，分页大小
		          $request->setPageSize($pageSize);

		          // 必填，当前页码
		          $request->setCurrentPage($currentPage);

		          // 发起访问请求
		          $acsResponse = $this->acsClient->getAcsResponse($request);

		          // 打印请求结果
		          // var_dump($acsResponse);

		          return $acsResponse;
		      }

		  }

		  if($intreturn == 0){
		      $demo = new SmsDemo(
		          "GWZek0XmIcJAOKnD",
		          "pnHKa0sCZunORgfxYDdKqTwOVc1WUB"
		      );

		      $response = $demo->sendSms(
		          $GLOBALS['gtrade']['sms_sign'], // 短信签名
		          'SMS_121910761', // 短信模板编号
		          $arrcard['card_phone'], // 短信接收者
		          Array(  // 短信模板中字段的值
		              "cardname"=> $arrcard['card_name'],
		              "cardcode"=> $arrcard['card_code'],
		              "money"=> $decsmoney,
		              "cardymoney"=> $card_ymoney,
		          )
		          // "123"
		      );
		      if($response->Message == 'OK'){
	          $strsql = "UPDATE ".$GLOBALS['gdb']->fun_table('company'). " SET company_sms_ycount=company_sms_ycount-1 WHERE company_id=".api_value_int0($GLOBALS['_SESSION']['login_cid']);
	          $hresult = $gdb->fun_do($strsql);
		      }else{
		      	// var_dump($response->Message);
		      }
		  }
		}
	}
}
//记录优惠券使用情况
if($intreturn == 0 && !empty($arrinfo3)){
	$arract_id_use = array();
	foreach($arrinfo3 as $row){
		$intcard_ticket_id = api_value_int0($row['card_ticket_id']);
		// 查活动名称
		$strsql = " SELECT a.*,b.act_give_name FROM (SELECT act_id,act_give_id,act_ticket_id,card_ticket_id,act_type,ticket_type,ticket_money_id,ticket_goods_id,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('card_ticket'). " where card_ticket_id=".$intcard_ticket_id." and card_ticket_state=1 and card_ticket_edate>".$intnow.") as a left join".$GLOBALS['gdb']->fun_table2('act_give')." as b on a.act_give_id = b.act_give_id ";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(empty($arr)){
			// $intreturn = 21;
		}else{
			$arract_id_use[] = $arr['act_id'];
		}
		//更新card_ticket表
		if($intreturn == 0){
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_ticket'). " SET card_ticket_state=2 where card_ticket_id=".$intcard_ticket_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			// if($hresult==false){
			// 	$intreturn = 22;
			// }
		}
		//更新card_ticket_record,记录活动名称
		if($intreturn == 0){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,act_ticket_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name) VALUES (".$intcard_id.",".$arr['act_type'].",".$arr['act_id'].",".$arr['act_give_id'].",".$arr['act_ticket_id'].",".$arr['ticket_type'].",".$arr['ticket_money_id'].",".$arr['ticket_goods_id'].",2,".$arr['card_ticket_id'].",".$record_id.",".$intnow.",'".$arr['c_ticket_name']."',".$arr['c_ticket_value'].",".$arr['c_ticket_limit'].",".$arr['c_ticket_days'].",".$arr['c_ticket_begin'].",".$arr['c_mgoods_id'].",'".$arr['c_mgoods_name']."',".$arr['card_ticket_edate'].",'".$arr['act_give_name']."')";
			$hresult = $gdb->fun_do($strsql);
			// if($hresult == FALSE) {
			// 	$intreturn = 23;
			// }
		}
		//记录act总表记录
		if($intreturn == 0){
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_uticket=act_relate_uticket+1,act_ctime=".$intnow." where act_id=".$arr['act_id'];
			$hresult = $gdb->fun_do($strsql);
			// if($hresult == FALSE) {
			// 	$intreturn = 25;
			// }
		}
	}
	$arract_id_use = array_unique($arract_id_use);//去重
	foreach($arract_id_use as $row){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_hmoney=act_relate_hmoney+".$dechmoney.",act_relate_smoney=act_relate_smoney+".$decsmoney.",act_ctime=".$intnow." where act_id=".$row;
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 26;
		}
	}
}
//记录recrord3_ygoods,没有考虑到期时间
if($intreturn == 0 && $intcard_id!=0){
	$strsql = "SELECT SUM(card_mcombo_gcount)as sum,mgoods_id,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type=2 and card_id=".$intcard_id." group by c_mgoods_name";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// echo json_encode($arr);
	if(!empty($arr)){
		foreach($arr as $row){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record3_ygoods')." (card_record_id,card_id,shop_id,mgoods_id,card_record3_ygoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$intshop.",".$row['mgoods_id'].",".$row['sum'].",'".$row['c_mgoods_name']."',".$row['c_mgoods_price'].",".$row['c_mgoods_cprice'].")";
			$hresult = $GLOBALS['gdb']->fun_do($strsql);
			// if($hresult == FALSE) {
			// 	$intreturn = 13;
			// }
		}
	}
}
//记录满减活动产生的金额,没有对这次消费中参加的满减活动做记录
if($intreturn == 0){
	if(!empty($arract_decrease)){
		foreach($arract_decrease as $row){
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). " where act_decrease_id=".$row['act_decrease_id']." and act_type=2";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." set act_relate_hmoney=act_relate_hmoney+".$dechmoney.",act_relate_smoney=act_relate_smoney+".$decsmoney.",act_ctime=".$intnow." where act_id=".$arract['act_id'];
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				// if($hresult == FALSE) {
				// 	$intreturn = 12;
				// }
			}
		}
	}
}
//记录限时折扣活动产生的金额
if($intreturn == 0){
	if(!empty($arract_discount)){
		$arract_discount = array_unique($arract_discount);
		foreach($arract_discount as $row){
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). "where act_discount_id=".$row." and act_type=1";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." set act_relate_hmoney=act_relate_hmoney+".$dechmoney.",act_relate_smoney=act_relate_smoney+".$decsmoney.",act_ctime=".$intnow." where act_id=".$arract['act_id'];
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				// if($hresult == FALSE) {
				// 	$intreturn = 12;
				// }
			}
		}
	}
}

if($intreturn == 0){
	$arr = array(
		'type' => '2',
		'id' => $record_id
		);
	echo json_encode($arr);
}else{
	$arr = array(
		'int' => $intreturn
		);
	echo json_encode($arr);
}
