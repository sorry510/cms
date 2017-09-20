<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strymoney = api_value_post('ymoney');//合计
$decymoney = api_value_decimal($strymoney, 2);
$strmoney = api_value_post('money');//应付
$decmoney = api_value_decimal($strmoney, 2);
$strgive = api_value_post('give');//减免
$decgive = api_value_decimal($strgive, 2);
$decrel_money = $decmoney - $decgive > 0 ? $decmoney - $decgive : 0;//实际付
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);
$strrecord_state = api_value_post('state');//默认1为正常，4免单
$intrecord_state = api_value_int0($strrecord_state);//是否免单
$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"}]
$arract_give = api_value_post('arr2');//[{"id":"2","num":"1"},{"id":"3","num":"1"}]
$arract_decrease = api_value_post('act_decrease');//1维数组，满减id

if($intrecord_state == 4){
	$decrel_money = 0;
}

$now = time();
$now2 = strtotime(date('Y-m-d',$now))+86399;//当前天的最后一秒
$now3 = strtotime(date('Y-m-d',$now))+1;//当前天的第一秒
$card_record_code = uniqid(time());//唯一编码

$struser_name = userName();//操作员姓名
$arrconfig = companyConfig();//!=1代表不启用
$reward_flag = $arrconfig['reward_flag'];
$score_flag = $arrconfig['score_flag'];
$intscore = 0;
if($score_flag == 1){
	$intscore = floor($decrel_money);
}

$intreturn = 0;
$arr = array();
$arract_discount = array();
//购买为空时
if(empty($arrinfo)){
	$intreturn = 10;
}
//查询card信息
if($intreturn == 0){
	$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
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
		case 5:
			$card_pay = "card_record_kakou";break;
		default:
			break;
	}
	if($card_pay!='card_record_kakou'){
		//插入card_record表
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".$card_record_code."',2,".$decymoney.",".$decmoney.",".$decgive.",".$decrel_money.",".$arr['s_card_ymoney'].",".$intpay_type.",".$decrel_money.",".$intscore.",".$now.",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$struser_name."',".$intrecord_state.")";

		$hresult = $gdb->fun_do($strsql);
		if($hresult==false){
			$intreturn = 2;
		}else{
			$record_id = mysql_insert_id();
		}
		//更新积分
		if($intreturn == 0 && $intrecord_state == 1) {
			$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_smoney=s_card_smoney+".$decrel_money.",s_card_sscore=s_card_sscore+".$intscore.",s_card_yscore=s_card_yscore+".$intscore.",card_ctime=".$now.",card_ltime=".$now." where card_id=".$intcard_id." limit 1";
			// echo $strsql;
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 3;
			}
		}
	}else{
		//用卡扣
		$card_ymoney = $arr['s_card_ymoney'] - $decrel_money;
		if($card_ymoney<0){
			$intreturn = 15;
		}

		if($intreturn == 0){
			$strsql = "UPDATE ".$gdb->fun_table2('card')." SET s_card_ymoney=".$card_ymoney.",card_ctime=".time().",card_ltime=".time()." where card_id=".$intcard_id." limit 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 4;
			}
		}
		
		if($intreturn == 0){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record'). "(card_id,shop_id,card_record_code,card_record_type,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".time()."',2,".$decymoney.",".$decmoney.",".$decgive.",".$decrel_money.",".$card_ymoney.",".$intpay_type.",".$decrel_money.",0,".$now.",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$struser_name."',".$intrecord_state.")";

			$hresult = $gdb->fun_do($strsql);
			$record_id = mysql_insert_id();
			if($hresult==false){
				$intreturn = 5;
			}
		}
	}
	//赠送优惠券
	if($intreturn == 0 && !empty($arract_give) && $intrecord_state == 1){
		foreach($arract_give as $row){
			$intact_give_id = api_value_int0($row['id']);//满送id
			$intnum = api_value_int0($row['num']);//赠送次数

			$strsql = "SELECT act_give_id,act_give_name,act_give_man,act_give_ttype,ticket_money_id,ticket_goods_id,c_ticket_begin,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('act_give')." where act_give_id =".$intact_give_id;
			$hresult = $gdb->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$arract = array();
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). " where act_give_id=".$intact_give_id." and act_type=3";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$intact_id = $arract['act_id'];
			}else{
				$intact_id = 0;
			}
			if($arr['c_ticket_begin']=='1'){
				$inttime = $now3;
			}else{
				$inttime = $now2;
			}
			for($i = 0; $i < $intnum; $i++){
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket'). " (card_id,act_type,act_give_id,ticket_type,act_id,ticket_money_id,ticket_goods_id,card_ticket_state,card_ticket_atime,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name) VALUES (".$intcard_id.",3,".$arr['act_give_id'].",".$arr['act_give_ttype'].",".$intact_id.",".$arr['ticket_money_id'].",".$arr['ticket_goods_id'].",1,".$now.",".strtotime("+".$arr['c_ticket_days']." day",$inttime).",'".$arr['c_ticket_name']."',".$arr['c_ticket_value'].",".$arr['c_ticket_limit'].",".$arr['c_ticket_days'].",".$arr['c_ticket_begin'].",".$arr['c_mgoods_id'].",'".$arr['c_mgoods_name']."')";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 13;
				}else{
					$give_record_id = mysql_insert_id();
				}
				if($intreturn == 0){
					$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_ticket_record'). " (card_id,card_ticket_record_atype,act_id,act_give_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_record_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name,c_ticket_begin) VALUES (".$intcard_id.",3,".$intact_id.",".$arr['act_give_id'].",".$arr['act_give_ttype'].",".$arr['ticket_money_id'].",".$arr['ticket_goods_id'].",1,".$give_record_id.",".$record_id.",".$now.",'".$arr['c_ticket_name']."',".$arr['c_ticket_value'].",".$arr['c_ticket_limit'].",".$arr['c_ticket_days'].",".$arr['c_mgoods_id'].",'".$arr['c_mgoods_name']."',".strtotime("+".$arr['c_ticket_days']." day",$inttime).",'".$arr['act_give_name']."',".$arr['c_ticket_begin'].")";
					$hresult = $gdb->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 14;
					}
				}
				if($intreturn == 0){
					//记录act总表记录,记录发券次数
					$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_aticket=act_relate_aticket+1 where act_id=".$intact_id;
					$hresult = $gdb->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 23;
					}
				}
			}
			// 更新这次满送活动
			$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." SET act_relate_hmoney=act_relate_hmoney+".$decymoney.",act_relate_smoney=act_relate_smoney+".$decrel_money." where act_id=".$intact_id;
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 24;
			}
		}
	}
}
//导购提成
if($intreturn == 0 && $intworker_id != 0 && $reward_flag == 1 && $intrecord_state == 1){
	$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
	$hresult = $gdb->fun_query($strsql);
	$arrworker = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arrworker)){
		$intworker_id = $arrworker['worker_id'];
		$intworker_group_id = $arrworker['worker_group_id'];
		$strworker_name = $arrworker['worker_name'];
		$strworker_group_name = $arrworker['worker_group_name'];
		$strsql = "SELECT group_reward_guide,group_reward_pguide FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
		$hresult = $gdb->fun_query($strsql);
		$arrreward = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arrreward)){
			$decgroup_reward_guide = 0;
			if($arrreward['group_reward_guide'] != 0){
				$decgroup_reward_guide = $arrreward['group_reward_guide'];
			}
			if($arrreward['group_reward_pguide'] != 0){
				$decgroup_reward_guide = $arrreward['group_reward_pguide'] * $decsmoney/100;
			}
	
			if($decgroup_reward_guide != 0){
				$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_type_id,c_card_type_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_card_record_id,c_card_record_code,c_card_record_smoney) VALUES (".$intworker_id.",".$GLOBALS['_SESSION']['login_sid'].",4,".$decgroup_reward_guide.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['card_id'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$record_id.",'".$card_record_code."',".$decrel_money.")";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult == false){
					$intreturn = 13;
				}
			}
		}
	}
}
//购买的套餐遍历
if($intreturn == 0){
	foreach($arrinfo as $v){
		//记录打折活动id
		if($v['act_discount_id']!='0'){
			$arract_discount[]=$v['act_discount_id'];
		}
		$strmcombo_id = $v['id'];
		$intmcombo_id = api_value_int0($strmcombo_id);
		$strnum = $v['num'];
		$intnum = api_value_int0($strnum);
		
		//查询套餐信息
		$strsql = "SELECT mcombo_id,mcombo_type,mcombo_name,mcombo_price,mcombo_cprice,mcombo_limit_type,mcombo_limit_days,mcombo_limit_months FROM ". $GLOBALS['gdb']->fun_table2('mcombo') . " where mcombo_id = ".$intmcombo_id." and mcombo_state = 1 limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intmcombo_limit_type = $arr['mcombo_limit_type'];
			$intmcombo_limit_days = $arr['mcombo_limit_days'];
			$intmcombo_limit_months = $arr['mcombo_limit_months'];
			$strmcombo_name = $arr['mcombo_name'];
			$intmcombo_type = $arr['mcombo_type'];
			$intedate = 0;
		}else{
			$intreturn = 6;//套餐不存在或停用
			// echo $intreturn;
			// exit;
			continue;
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
		//插入套餐
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_mcombo')."(card_id,card_mcombo_type,mcombo_id,card_mcombo_ccount,card_mcombo_cedate,card_mcombo_atime,c_mcombo_name,c_mcombo_type) VALUES (".$intcard_id.",1,".$intmcombo_id.",".$intnum.",".$intedate.",".time().",'".$strmcombo_name."',".$intmcombo_type.")";
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 7;
		}
		//插入record2表套餐
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record2_mcombo')."(card_record_id,card_id,shop_id,card_record2_mcombo_type,mcombo_id,card_record2_mcombo_ccount,card_record2_mcombo_cedate,c_mcombo_name,c_mcombo_price,c_mcombo_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",1,".$intmcombo_id.",".$intnum.",".$intedate.",'".$arr['mcombo_name']."',".$arr['mcombo_price'].",".$arr['mcombo_cprice'].")";
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 8;
		}
		//查询套餐商品
		$strsql = "SELECT a.mgoods_id,a.mcombo_goods_count,b.mgoods_name,b.mgoods_price,b.mgoods_cprice,b.mgoods_type FROM (SELECT mgoods_id,mcombo_goods_count FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods')." where mcombo_id = ".$intmcombo_id.") as a left join ".$GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id";

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		// echo json_encode($arr);
		if(!empty($arr)){
			foreach($arr as $v){
				$intmgoods_id = $v['mgoods_id'];
				$intmcombo_goods_count = $v['mcombo_goods_count']*$intnum;
				// 插入套餐商品
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_mcombo')."(card_id,card_mcombo_type,mcombo_id,mgoods_id,card_mcombo_gcount,card_mcombo_cedate,card_mcombo_atime,c_mgoods_name,c_mgoods_price,c_mgoods_cprice,c_mcombo_type,c_mgoods_type) VALUES (".$intcard_id.",2,".$intmcombo_id.",".$intmgoods_id.",".$intmcombo_goods_count.",".$intedate.",".time().",'".$v['mgoods_name']."',".$v['mgoods_price'].",".$v['mgoods_cprice'].",".$intmcombo_type.",".$v['mgoods_type'].")";
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 9;
				}
				//$card_mcombo_id = mysql_insert_id();

				// 插入record2表套餐商品，应该记录card_mcombo_id(现没有)
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

//记录recrord2_ygoods,没有考虑到期时间
if($intreturn == 0){
	$strsql = "SELECT SUM(card_mcombo_gcount)as sum,mgoods_id,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type=2 and card_id=".$intcard_id." group by c_mgoods_name";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// echo json_encode($arr);
	if(!empty($arr)){
		foreach($arr as $v){
			$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_record2_ygoods')." (card_record_id,card_id,shop_id,mgoods_id,card_record2_ygoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice) VALUES (".$record_id.",".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",".$v['mgoods_id'].",".$v['sum'].",'".$v['c_mgoods_name']."',".$v['c_mgoods_price'].",".$v['c_mgoods_cprice'].")";
			$hresult = $GLOBALS['gdb']->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 13;
			}
		}
	}
}

//记录满减活动产生的金额
if($intreturn == 0 && $intrecord_state == 1){
	if(!empty($arract_decrease)){
		$arract_decrease=array_unique($arract_decrease);//除去重复值
		//var_dump($arract_decrease);
		foreach($arract_decrease as $v){
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). "where act_decrease_id=".$v." and act_type=2";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." set act_relate_hmoney=act_relate_hmoney+".$decymoney.",act_relate_smoney=act_relate_smoney+".$decrel_money." where act_id=".$arract['act_id'];
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 12;
				}
			}
		}
	}
}

//记录限时折扣活动产生的金额
if($intreturn == 0 && $intrecord_state == 1){
	if(!empty($arract_discount)){
		$arract_discount=array_unique($arract_discount);
		foreach($arract_discount as $v){
			$strsql = "SELECT act_id FROM ".$GLOBALS['gdb']->fun_table2('act'). "where act_discount_id=".$v." and act_type=1";
			$hresult = $gdb->fun_query($strsql);
			$arract = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arract)){
				$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('act')." set act_relate_hmoney=act_relate_hmoney+".$decymoney.",act_relate_smoney=act_relate_smoney+".$decrel_money." where act_id=".$arract['act_id'];
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 12;
				}
			}
		}
	}
}

echo $intreturn;
?>