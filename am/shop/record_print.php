<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);
$strtype = api_value_get('type');

if(laimi_config_shop_trade()['sprint_flag'] != 1){
	echo '<script type="text/javascript">history.back();</script>';
	return false;
}

$gtemplate->fun_assign('print_info', laimi_config_shop_trade());
$gtemplate->fun_assign('record_info', record_info());
$gtemplate->fun_assign('card_info', card_info());
$gtemplate->fun_show('record_print');

// if($strtype == '1') {
// 	echo '<script type="text/javascript">alert("充值成功");window.location.href = "workbench.php";</script>';
// } else if($strtype == '2') {
// 	echo '<script type="text/javascript">alert("买套餐成功");window.location.href = "workbench2.php";</script>';
// } else if($strtype == '3') {
// 	echo '<script type="text/javascript">alert("消费成功");window.location.href = "workbench.php";</script>';
// } else {
// 	echo '<script type="text/javascript">window.location.href = "record.php";</script>';
// }

function record_info(){
	$arr = array();
	$strsql = "SELECT a.*,b.shop_name,b.shop_phone,b.shop_area_address FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_mmoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_kakou,card_record_tuan,card_record_score,card_record_state,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where card_record_id = ".$GLOBALS['intid']." limit 1) AS a LEFT JOIN ". $GLOBALS['gdb']->fun_table('shop') ." AS b on a.shop_id = b.shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$arr['atime'] = date("Y-m-d H:i",$arr['card_record_atime']);
		$arr['free'] = $arr['card_record_state'] == '4' ? '免单' : '--';
		$arr['discount'] = $arr['c_card_type_discount'] != '0' ? $arr['c_card_type_discount'] : '10';
		$arr['cardtype'] = $arr['c_card_type_name'] != '' ? $arr['c_card_type_name'] : '无';
		$arr['address'] = implode(mbStrSplit($arr['shop_area_address'] ,10),"<br/>");
		// chunk_split($arr['shop_area_address'], 20, "<br/>")
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
			$strsql = "SELECT mgoods_id,sgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_rprice,c_sgoods_name,c_sgoods_price,c_sgoods_rprice FROM " .$GLOBALS['gdb']->fun_table2('card_record3_goods'). " where card_record_id=".$arr['card_record_id'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
			$arr['goods_list'] = $arrlist;
			$arr['goods_count'] = 0;
			$arr['goods_money'] = 0;//原价
			$arr['goods_money2'] = 0;//真实价格
			foreach($arrlist as $row){
				$arr['goods_count'] += $row['card_record3_goods_count'];
				$arr['goods_money'] += ($row['c_mgoods_price'] + $row['c_sgoods_price']) * $row['card_record3_goods_count'];
				$arr['goods_money2'] += ($row['c_mgoods_rprice'] + $row['c_sgoods_rprice']) * $row['card_record3_goods_count'];
			}

			//消费套餐商品
			$strsql = "SELECT mgoods_id,card_record3_mgoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$GLOBALS['gdb']->fun_table2('card_record3_mcombo'). " where card_record_id=".$arr['card_record_id'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrlist2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
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
			$strsql = "SELECT mgoods_id,card_record2_mcombo_gcount,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$GLOBALS['gdb']->fun_table2('card_record2_mcombo'). " where card_record2_mcombo_type=2 and card_record_id=".$arr['card_record_id'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
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
		$strsql = "SELECT count(case when card_ticket_record_ttype=1 then ticket_money_id else ticket_goods_id end) as count,act_give_id,card_ticket_record_ttype,c_ticket_name,c_ticket_value,c_act_name,c_ticket_limit FROM " .$GLOBALS['gdb']->fun_table2('card_ticket_record'). " where card_ticket_record_utype=1 and card_record_id=".$arr['card_record_id']." GROUP BY (case when card_ticket_record_ttype=1 then ticket_money_id else ticket_goods_id end)";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrticket = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr['ticket_list'] = $arrticket;
	}
	return $arr;
}

function card_info(){
	$arr = array();
	$strsql = "SELECT c_mgoods_name,card_record3_ygoods_count FROM " . $GLOBALS['gdb']->fun_table2('card_record3_ygoods') . " where card_record_id = ".$GLOBALS['intid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$str = '';
	foreach($arr as $row){
		$str .= $row['c_mgoods_name']."x".$row['card_record3_ygoods_count'].",";
	}
	$str = substr($str, 0, -1);
	$str1 = mb_substr($str, 0, 8)."<br/>";
	$str2 = mb_substr($str, 9);
	if(!empty($str2)){
		$str = $str1.implode(mbStrSplit($str2 ,13), "<br/>");//一行最多13个汉字
	}
	if($str == ''){
		$str = '<br/>';//为空，不为换行时打印机报错
	}
	return $str;
}

function mbStrSplit($string, $len = 1) {
  $start = 0;
  $strlen = mb_strlen($string);
  while ($strlen) {
    $array[] = mb_substr($string,$start,$len,"utf8");
    $string = mb_substr($string, $len, $strlen,"utf8");
    $strlen = mb_strlen($string);
  }
  return $array;
}

