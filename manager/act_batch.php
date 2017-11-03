<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'marketing';

$strtype = api_value_get('card');
$inttype = api_value_int0($strtype);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strsex = api_value_get('sex');
$intsex = api_value_int0($strsex);
$stratime = api_value_get('atime');
$stratime2 = $gdb->fun_escape($stratime);
$intatime = strtotime($stratime2);
$strlatime = api_value_get('latime');
$strlatime2 = $gdb->fun_escape($strlatime);
$intlatime = strtotime($strlatime2);
$stredate = api_value_get('edate');
$stredate2 = $gdb->fun_escape($stredate);
$intedate = strtotime($stredate2);
$strledate = api_value_get('ledate');
$strledate2 = $gdb->fun_escape($strledate);
$intledate = strtotime($strledate2);
$strbirthday = api_value_get('birthday');
$sqlbirthday = $gdb->fun_escape($strbirthday);
$strlbirthday = api_value_get('lbirthday');
$sqllbirthday = $gdb->fun_escape($strlbirthday);
$strldays =  api_value_get('ldays');
$intldays = api_value_int0($strldays);
$strphone = api_value_get('phone');
$sqlphone = $gdb->fun_escape($strphone);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$time = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('card_type', get_card_type());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('card_list', get_card_list());
$gtemplate->fun_assign('money', get_money());
$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_show('act_batch');

function get_request(){
	$arr = array();
	$arr['type'] = $GLOBALS['strtype'];
	$arr['sex'] = $GLOBALS['strsex'];
	$arr['atime'] = $GLOBALS['stratime'];
	$arr['latime'] = $GLOBALS['strlatime'];
	$arr['edate'] = $GLOBALS['stredate'];
	$arr['ledate'] = $GLOBALS['strledate'];
	$arr['birthday'] = $GLOBALS['strbirthday'];
	$arr['lbirthday'] = $GLOBALS['strlbirthday'];
	$arr['ldays'] = $GLOBALS['strldays'];
	$arr['phone'] = $GLOBALS['strphone'];
	return $arr;
}

function get_goods(){
	$arr = array();
	$strsql = 'SELECT ticket_goods_id,ticket_goods_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_goods') .' ORDER BY ticket_goods_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_money(){
	$arr = array();
	$strsql = 'SELECT ticket_money_id,ticket_money_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_money') .' ORDER BY ticket_money_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_type(){
	$arr = array();
	$strsql = 'SELECT card_type_id,card_type_name FROM' . $GLOBALS['gdb']->fun_table2('card_type') .' ORDER BY card_type_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_shop(){
	$arr = array();
	$strsql = 'SELECT shop_id,shop_name FROM' . $GLOBALS['gdb']->fun_table('shop') .' ORDER BY shop_id';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();
	
	$strwhere = '';
	if ($GLOBALS['strtype'] != '') {
		$strwhere = $strwhere . ' AND card_type_id = '. $GLOBALS['inttype'];
	}
	if($GLOBALS['intatime'] > 0) {
		$strwhere = $strwhere . ' AND card_atime >= ' . $GLOBALS['intatime'];
	}
	if($GLOBALS['intlatime'] > 0) {
		$strwhere = $strwhere . ' AND card_atime < ' . ($GLOBALS['intlatime']+86400);
	}
	if($GLOBALS['intedate'] > 0) {
		$strwhere = $strwhere . ' AND card_edate >= ' . $GLOBALS['intedate'];
	}
	if($GLOBALS['intledate'] > 0) {
		$strwhere = $strwhere . ' AND card_edate < ' . ($GLOBALS['intledate']+86400);
	}
	if($GLOBALS['sqlbirthday'] != '') {

		$arrbirthday = explode('-', $GLOBALS['sqlbirthday']);
		if (!empty($arrbirthday[0])) {
			$intmonth = api_value_int0($arrbirthday[0]);
		}else{$intmonth = 0 ;}
		
		if (!empty($arrbirthday[1])) {
			$intday = api_value_int0($arrbirthday[1]);
		}else{$intday = 0 ;}
		

		$strwhere = $strwhere . ' AND (card_birthday_month > ' . $intmonth . ' OR (card_birthday_month= ' . $intmonth . ' and card_birthday_day>=(case when card_birthday_month=' . $intmonth . ' then '. $intday .' end)))';
	}
	if($GLOBALS['sqllbirthday'] != '') {

		$arrbirthday2 = explode('-', $GLOBALS['sqllbirthday']);
		if (!empty($arrbirthday2[0])) {
			$intmonth2 = api_value_int1($arrbirthday2[0]);
		}

		if (!empty($arrbirthday2[1])) {
			$intday2 = api_value_int1($arrbirthday2[1]);
		}	

		$strwhere = $strwhere . ' AND (card_birthday_month < ' . $intmonth2 . ' OR (card_birthday_month= ' . $intmonth2 . ' and card_birthday_day<=(case when card_birthday_month=' . $intmonth2 . ' then '. $intday2 .' end)))';
	}
	if($GLOBALS['inttype'] !='') {
		if ($GLOBALS['inttype'] != 0) {
			$strwhere = $strwhere . ' AND card_type_id = ' . $GLOBALS['inttype'];
		}
	}
	if($GLOBALS['intsex'] !='') {
		if ($GLOBALS['intsex'] != 3) {
			$strwhere = $strwhere . ' AND card_sex = ' . $GLOBALS['intsex'];
		}
	}
	if($GLOBALS['intldays'] !='') {
		if ($GLOBALS['intldays'] != 0) {
			$days = $GLOBALS['time'] - (86400*($GLOBALS['intldays']-1));
			$strwhere = $strwhere . ' AND card_ltime <= ' . $days;
		}
	}
	if($GLOBALS['sqlphone'] !='') {
		$strwhere = $strwhere . ' AND card_phone = "' . $GLOBALS['sqlphone'] .'" OR card_name like "%'.$GLOBALS['sqlphone'].'%" OR card_code = "'.$GLOBALS['sqlphone'].'"';
	}
	if($GLOBALS['intshop'] !='') {
		$strwhere = $strwhere . ' AND shop_id = '.$GLOBALS['intshop'];
	}

	$arr = array();
	$strsql = 'SELECT count(card_id) as datcount FROM ' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state = 1' . $strwhere;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$intallcount = $arr['datcount'];
	if($intallcount == 0) {
		$arrpackage['allcount'] = 0;
		$arrpackage['pagecount'] = 0;
		$arrpackage['pagenow'] = 0;
		$arrpackage['pagepre'] = 0;
		$arrpackage['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}
	
	$intpagesize = 25;
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


	$strsql = 'SELECT card_id,card_name,card_code,card_sex,card_atime,card_ltime,card_phone,card_birthday_date,card_edate,c_card_type_name FROM' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state = 1 ' . $strwhere .' ORDER BY card_id DESC'.' LIMIT ' . $intoffset . ' , ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['leave_days'] = '';
		$arr[$key]['leave_days'] = ceil(($GLOBALS['time'] - $row['card_ltime'])/86400);
	}

	foreach($arr as $key => $row) {
		$arr[$key]['sex'] = '';
		if($row['card_sex'] == 1) {
			$arr[$key]['sex'] = '男';
		} else if($row['card_sex'] == 2) {
			$arr[$key]['sex'] = '女';
		} else if($row['card_sex'] == 3) {
			$arr[$key]['sex'] = '保密';
		}
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arr;

	return $arrpackage;
}
?>