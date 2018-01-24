<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
/*require('inc_limit.php');*/
ini_set('max_execution_time', '0');
header("Content-type:application/vnd.ms-execl");
header("Content-Disposition:attachment;filename=record_" . date('Ymj') . ".csv");

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strcardtype = api_value_get('cardtype');
$intcardtype = api_value_int0($strcardtype);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);

$gtemplate->fun_assign('card_records_list', get_card_records_list());
$gtemplate->fun_show('record_export');


function get_card_records_list() {
	$intfrom = 0;
	$intto = 0;
	if($GLOBALS['strfrom'] != '') {
		$int = strtotime($GLOBALS['strfrom']);
		if($int > 0) {
			$intfrom = $int;
		}
	}
	if($GLOBALS['strto'] != '') {
		$int = strtotime($GLOBALS['strto'] . ' 23:59:59');
		if($int > 0) {
			$intto = $int;
		}
	}

	$strwhere = '';
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND shop_id = " . $GLOBALS['intshop'];
	}
	if($GLOBALS['intcardtype'] != 0) {
		$strwhere .= " AND c_card_type_id = " . $GLOBALS['intcardtype'];
	}
	if($intfrom > 0) {
		$strwhere = $strwhere . ' AND card_record_atime >= ' . $intfrom;
	}
	if($intto > 0) {
		$strwhere = $strwhere . ' AND card_record_atime < ' . $intto;
	}
	if($GLOBALS['strkey'] != '') {
		$strwhere = $strwhere . " AND (c_card_code = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR c_card_name = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR c_card_phone = '" . $GLOBALS['sqlkey'] . "')";
	}

	$arr = array();
	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_kakou,card_record_tuan,card_record_score,card_record_state,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where 1=1 ".$strwhere." ORDER BY card_record_id DESC) as a left join ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id = b.shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$row['mysex'] = '';
		if($row['c_card_sex'] == 1) {
			$row['mysex'] = '男';
		} else if($row['c_card_sex'] == 2) {
			$row['mysex'] = '女';
		} else if($row['c_card_sex'] == 3) {
			$row['mysex'] = '保密';
		}
		switch($row['card_record_state'])
		{
			case '1':
				$row['state'] = '正常'; break;
			case '2':
				$row['state'] = '挂单'; break;
			case '3':
				$row['state'] = '取消'; break;
			case '4':
				$row['state'] = '免单'; break;
			case '5':
				$row['state'] = '退款'; break;
			default:
				$row['state'] = '其它';
		}
		switch($row['card_record_pay'])
		{
			case '1':
				$row['paytype'] = '现金'; break;
			case '2':
				$row['paytype'] = '银行卡'; break;
			case '3':
				$row['paytype'] = '微信'; break;
			case '4':
				$row['paytype'] = '支付宝'; break;
			case '5':
				$row['paytype'] = '卡扣'; break;
			case '6':
				$row['paytype'] = '团购'; break;
			default:
				$row['paytype'] = '其它';
		}
		switch($row['card_record_type'])
		{
			case '1':
				$row['recordtype'] = '充值'; break;
			case '2':
				$row['recordtype'] = '买套餐'; break;
			case '3':
				$row['recordtype'] = '消费'; break;
			default:
				$row['recordtype'] = '其它';
		}
		//消费
		// if($row['card_record_type'] == 3){
		// 	//消费商品
		// 	$strsql = "SELECT mgoods_id,sgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_rprice,c_sgoods_name,c_sgoods_price,c_sgoods_rprice,c_worker_name FROM " .$gdb->fun_table2('card_record3_goods'). " where card_record_id=".$row['card_record_id'];
		// 	$hresult = $gdb->fun_query($strsql);
		// 	$arrlist = $gdb->fun_fetch_all($hresult);
		// 	$row['goods_count'] = 0;
		// 	$row['goods_money'] = 0;
		// 	foreach($arrlist as &$row2){
		// 		$row2['worker'] = $row2['c_worker_name'] == '' ? '无' : $row2['c_worker_name'];
		// 		$row['goods_count'] += $row2['card_record3_goods_count'];
		// 		$row['goods_money'] += ($row2['c_mgoods_price'] + $row2['c_sgoods_price']) * $row2['card_record3_goods_count'];
		// 	}
		// 	unset($row2);
		// 	$row['goods_list'] = $arrlist;

		// 	//消费套餐商品
		// 	$strsql = "SELECT mgoods_id,card_record3_mgoods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice,c_worker_name FROM " .$gdb->fun_table2('card_record3_mcombo'). " where card_record_id=".$arr['card_record_id'];
		// 	$hresult = $gdb->fun_query($strsql);
		// 	$arrlist2 = $gdb->fun_fetch_all($hresult);
		// 	$arr['mcombo_goods_count2'] = 0;
		// 	$arr['mcombo_goods_money2'] = 0;
		// 	foreach($arrlist2 as &$row2){
		// 		$row['worker'] = $row['c_worker_name'] == '' ? '无' : $row['c_worker_name'];
		// 		$arr['mcombo_goods_count2'] += $row['card_record3_mgoods_count'];
		// 		$arr['mcombo_goods_money2'] += $row['c_mgoods_price'] * $row['card_record3_mgoods_count'];
		// 	}
		// 	unset($row);
		// 	$arr['mcombo_goods_list2'] = $arrlist2;
		// }
		//买套餐
		// if($row['card_record_type'] == 2){
		// 	$strsql = "SELECT mgoods_id,card_record2_mcombo_gcount,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$gdb->fun_table2('card_record2_mcombo'). " where card_record2_mcombo_type=2 and card_record_id=".$arr['card_record_id'];
		// 	$hresult = $gdb->fun_query($strsql);
		// 	$arrlist = $gdb->fun_fetch_all($hresult);
		// 	$arr['mcombo_goods_count'] = 0;
		// 	$arr['mcombo_goods_money'] = 0;
		// 	foreach($arrlist as &$row){
		// 		$arr['mcombo_goods_count'] += $row['card_record2_mcombo_gcount'];
		// 		$arr['mcombo_goods_money'] += $row['c_mgoods_price'] * $row['card_record2_mcombo_gcount'];
		// 	}
		// 	unset($row);
		// 	$arr['mcombo_goods_list'] = $arrlist;
		// }
	}
	return $arr;
}
?>