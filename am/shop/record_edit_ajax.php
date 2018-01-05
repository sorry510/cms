<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_record_id = api_value_get('id');
$intcard_record_id = api_value_int0($strcard_record_id);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_kakou,card_record_tuan,card_record_score,card_record_state,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $gdb->fun_table2('card_record') . " where card_record_id = ".$intcard_record_id." and shop_id = ".$intshop." limit 1) AS a LEFT JOIN ". $gdb->fun_table('shop') ." AS b on a.shop_id = b.shop_id";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

if(!empty($arr)){
	$arr['atime'] = date("Y-m-d H:i",$arr['card_record_atime']);
	$arr['free'] = $arr['card_record_state'] == '4' ? '免单' : '--';
	$arr['discount'] = $arr['c_card_type_discount'] != '0' ? $arr['c_card_type_discount'] : '10';
	$arr['cardtype'] = $arr['c_card_type_name'] != '' ? $arr['c_card_type_name'] : '无';
	switch($arr['card_record_state'])
	{
		case '1':
			$arr['state'] = '正常'; break;
		case '2':
			$arr['state'] = '挂单'; break;
		case '3':
			$arr['state'] = '取消'; break;
		case '4':
			$arr['state'] = '免单'; break;
		case '5':
			$arr['state'] = '退款'; break;
		default:
			$arr['state'] = '其它';
	}
	switch($arr['card_record_pay'])
	{
		case '1':
			$arr['paytype'] = '现金'; break;
		case '2':
			$arr['paytype'] = '银行卡'; break;
		case '3':
			$arr['paytype'] = '微信'; break;
		case '4':
			$arr['paytype'] = '支付宝'; break;
		case '5':
			$arr['paytype'] = '卡扣'; break;
		case '6':
			$arr['paytype'] = '团购'; break;
		default:
			$arr['paytype'] = '其它';
	}
	switch($arr['card_record_type'])
	{
		case '1':
			$arr['recordtype'] = '充值'; break;
		case '2':
			$arr['recordtype'] = '买套餐'; break;
		case '3':
			$arr['recordtype'] = '消费'; break;
		default:
			$arr['recordtype'] = '其它';
	}
	//消费
	if($arr['card_record_type'] == 3){
		//消费商品
		$strsql = "SELECT mgoods_id,sgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_rprice,c_sgoods_name,c_sgoods_price,c_sgoods_rprice FROM " .$gdb->fun_table2('card_record3_goods'). " where card_record_id=".$arr['card_record_id'];
		$hresult = $gdb->fun_query($strsql);
		$arrlist = $gdb->fun_fetch_all($hresult);
		$arr['goods_list'] = $arrlist;
		$arr['goods_count'] = 0;
		$arr['goods_money'] = 0;
		foreach($arrlist as $row){
			$arr['goods_count'] += $row['card_record3_goods_count'];
			$arr['goods_money'] += ($row['c_mgoods_price'] + $row['c_sgoods_price']) * $row['card_record3_goods_count'];
		}

		//消费套餐商品
		$strsql = "SELECT mgoods_id,card_record3_mgoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$gdb->fun_table2('card_record3_mcombo'). " where card_record_id=".$arr['card_record_id'];
		$hresult = $gdb->fun_query($strsql);
		$arrlist2 = $gdb->fun_fetch_all($hresult);
		$arr['mcombo_goods_list2'] = $arrlist2;
		$arr['mcombo_goods_count2'] = 0;
		$arr['mcombo_goods_money2'] = 0;
		foreach($arrlist2 as $row){
			$arr['mcombo_goods_count2'] += $row['card_record3_mgoods_count'];
			$arr['mcombo_goods_money2'] += $row['c_mgoods_price'] * $row['card_record3_mgoods_count'];
		}
	}
	//买套餐
	if($arr['card_record_type'] == 2){
		$strsql = "SELECT mgoods_id,card_record2_mcombo_gcount,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$gdb->fun_table2('card_record2_mcombo'). " where card_record2_mcombo_type=2 and card_record_id=".$arr['card_record_id'];
		$hresult = $gdb->fun_query($strsql);
		$arrlist = $gdb->fun_fetch_all($hresult);
		$arr['mcombo_goods_list'] = $arrlist;
		$arr['mcombo_goods_count'] = 0;
		$arr['mcombo_goods_money'] = 0;
		foreach($arrlist as $row){
			$arr['mcombo_goods_count'] += $row['card_record2_mcombo_gcount'];
			$arr['mcombo_goods_money'] += $row['c_mgoods_price'] * $row['card_record2_mcombo_gcount'];
		}
	}
	//赠送什么券
	$arrticket = array();
	$strsql = "SELECT count(case when card_ticket_record_ttype=1 then ticket_money_id else ticket_goods_id end) as count,act_give_id,card_ticket_record_ttype,c_ticket_name,c_ticket_value,c_act_name FROM " .$gdb->fun_table2('card_ticket_record'). " where card_ticket_record_utype=1 and card_record_id=".$arr['card_record_id']." GROUP BY (case when card_ticket_record_ttype=1 then ticket_money_id else ticket_goods_id end)";
	$hresult = $gdb->fun_query($strsql);
	$arrticket = $gdb->fun_fetch_all($hresult);
	$arr['ticket_list'] = $arrticket;
}
//缺少满减活动和代金券的使用情况，导致价格会对应不上
echo json_encode($arr);
