<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

// $gtemplate->fun_assign('record_info', record_info());
$gtemplate->fun_show('center_shop_record');

// function record_info(){
// 	$arr = array();
// 	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_kakou,card_record_tuan,card_record_score,card_record_state,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where card_id = ".$GLOBALS['intid'].") AS a LEFT JOIN ". $GLOBALS['gdb']->fun_table('shop') ." AS b on a.shop_id = b.shop_id order by card_record_atime desc";
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
// 	foreach($arr as &$row){
// 		$row['atime'] = date("Y-m-d H:i",$row['card_record_atime']);
// 		$row['free'] = $row['card_record_state'] == '4' ? '免单' : '--';
// 		$row['discount'] = $row['c_card_type_discount'] != '0' ? $row['c_card_type_discount'] : '10';
// 		$row['cardtype'] = $row['c_card_type_name'] != '' ? $row['c_card_type_name'] : '无';
// 		// $row['address'] = implode(mbStrSplit($row['shop_area_address'] ,10),"<br/>");
// 		// chunk_split($row['shop_area_address'], 20, "<br/>")
// 		switch($row['card_record_state'])
// 		{
// 			case '1':
// 				$row['state'] = '正常'; break;
// 			case '2':
// 				$row['state'] = '挂单'; break;
// 			case '3':
// 				$row['state'] = '取消'; break;
// 			case '4':
// 				$row['state'] = '免单'; break;
// 			case '5':
// 				$row['state'] = '退款'; break;
// 			default:
// 				$row['state'] = '其它';
// 		}
// 		switch($row['card_record_pay'])
// 		{
// 			case '1':
// 				$row['paytype'] = '现金'; break;
// 			case '2':
// 				$row['paytype'] = '银行卡'; break;
// 			case '3':
// 				$row['paytype'] = '微信'; break;
// 			case '4':
// 				$row['paytype'] = '支付宝'; break;
// 			case '5':
// 				$row['paytype'] = '卡扣'; break;
// 			case '6':
// 				$row['paytype'] = '团购'; break;
// 			default:
// 				$row['paytype'] = '其它';
// 		}
// 		switch($row['card_record_type'])
// 		{
// 			case '1':
// 				$row['recordtype'] = '充值'; break;
// 			case '2':
// 				$row['recordtype'] = '买套餐'; break;
// 			case '3':
// 				$row['recordtype'] = '消费'; break;
// 			default:
// 				$row['recordtype'] = '其它';
// 		}
// 		//消费
// 		$row['goods_list'] = array();
// 		$row['goods_count'] = 0;
// 		$row['goods_money'] = 0;//原价
// 		$row['goods_money2'] = 0;//真实价格
// 		if($row['card_record_type'] == 3){
// 			//消费商品
// 			$strsql = "SELECT mgoods_id,sgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_rprice,c_sgoods_name,c_sgoods_price,c_sgoods_rprice FROM " .$GLOBALS['gdb']->fun_table2('card_record3_goods'). " where card_record_id=".$row['card_record_id'];
// 			$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 			$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
// 			$row['goods_list'] = $arrlist;
// 			foreach($arrlist as $row2){
// 				$row['goods_count'] += $row2['card_record3_goods_count'];
// 				if(!($row2['c_mgoods_name'] != '' && $row2['c_mgoods_rprice'] == 0)){
// 					$row['goods_money'] += ($row2['c_mgoods_price'] + $row2['c_sgoods_price']) * $row2['card_record3_goods_count'];
// 				}
// 				$row['goods_money2'] += ($row2['c_mgoods_rprice'] + $row2['c_sgoods_rprice']) * $row2['card_record3_goods_count'];
// 			}

// 			//消费套餐商品
// 			$strsql = "SELECT mgoods_id,card_record3_mgoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$GLOBALS['gdb']->fun_table2('card_record3_mcombo'). " where card_record_id=".$row['card_record_id'];
// 			$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 			$arrlist2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
// 			$row['mcombo_goods_list2'] = $arrlist2;
// 			$row['mcombo_goods_count2'] = 0;
// 			$row['mcombo_goods_money2'] = 0;
// 			foreach($arrlist2 as $row3){
// 				$row['mcombo_goods_count2'] += $row3['card_record3_mgoods_count'];
// 				$row['mcombo_goods_money2'] += $row3['c_mgoods_price'] * $row3['card_record3_mgoods_count'];
// 			}
// 		}
// 		//买套餐
// 		$row['mcombo_goods_list'] = array();
// 		$row['mcombo_goods_count'] = 0;
// 		$row['mcombo_goods_money'] = 0;
// 		if($row['card_record_type'] == 2){
// 			$strsql = "SELECT mgoods_id,card_record2_mcombo_gcount,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$GLOBALS['gdb']->fun_table2('card_record2_mcombo'). " where card_record2_mcombo_type=2 and card_record_id=".$row['card_record_id'];
// 			$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 			$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
// 			$row['mcombo_goods_list'] = $arrlist;
// 			foreach($arrlist as $row4){
// 				$row['mcombo_goods_count'] += $row4['card_record2_mcombo_gcount'];
// 				$row['mcombo_goods_money'] += $row4['c_mgoods_price'] * $row4['card_record2_mcombo_gcount'];
// 			}
// 		}
// 		//赠送什么券
// 		$rowticket = array();
// 		$strsql = "SELECT count(case when card_ticket_record_ttype=1 then ticket_money_id else ticket_goods_id end) as count,act_give_id,card_ticket_record_ttype,c_ticket_name,c_ticket_value,c_act_name,c_ticket_limit FROM " .$GLOBALS['gdb']->fun_table2('card_ticket_record'). " where card_ticket_record_utype=1 and card_record_id=".$row['card_record_id']." GROUP BY (case when card_ticket_record_ttype=1 then ticket_money_id else ticket_goods_id end)";
// 		$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 		$arrticket = $GLOBALS['gdb']->fun_fetch_all($hresult);
// 		$row['ticket_list'] = $arrticket;
// 	}
// 	return $arr;
// }