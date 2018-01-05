<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'card';

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

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('card_type_list', get_card_type_list());
$gtemplate->fun_assign('card_records_list', get_card_records_list());
$gtemplate->fun_show('record');

function get_request() {
	$arr = array();
	$arr['shop'] = $GLOBALS['intshop'];
	$arr['cardtype'] = $GLOBALS['intcardtype'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['key'] = $GLOBALS['strkey'];
	return $arr;
}

function get_card_type_list() {
	$arr = array();
	$strsql = "SELECT card_type_id, card_type_name FROM " . $GLOBALS['gdb']->fun_table2('card_type')." ORDER BY card_type_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_records_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

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
	$strsql = "SELECT COUNT(card_id) AS mycount FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE 1 = 1" . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$intallcount = $arr['mycount'];
	if($intallcount == 0) {
		$arrpackage['allcount'] = 0;
		$arrpackage['pagecount'] = 0;
		$arrpackage['pagenow'] = 0;
		$arrpackage['pagepre'] = 0;
		$arrpackage['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}
	
	$intpagesize = 50;
	$intpagecount = intval($intallcount / $intpagesize);
	if($intallcount % $intpagesize > 0) {
		$intpagecount = $intpagecount + 1;
	}
	$intpagenow = $GLOBALS['intpage'];
	if($intpagenow < 1) {
		$intpagenow = 1;
	}
	if($intpagenow > $intpagecount) {
		$intpagenow = $intpagecount;
	}
	$intpagepre = $intpagenow - 1;
	if($intpagepre < 1) {
		$intpagepre = 1;
	}
	$intpagenext = $intpagenow + 1;
	if($intpagenext > $intpagecount) {
		$intpagenext = $intpagecount;
	}
	$intoffset = ($intpagenow - 1) * $intpagesize;
	
	$strsql = "SELECT a.*,b.shop_name FROM (SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_kakou,card_record_tuan,card_record_score,card_record_state,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " where 1=1 ".$strwhere." ORDER BY card_record_id DESC LIMIT ". $intoffset . ", " . $intpagesize." ) as a left join ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id = b.shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arrlist as &$row){
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
	}
	
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>