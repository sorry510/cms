<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtype = api_value_get('card');
$inttype = api_value_int0($strtype);
$strsex = api_value_post('sex');
$intsex = api_value_int0($strsex);
$stratime = api_value_post('atime');
$stratime2 = $gdb->fun_escape($stratime);
$strlatime = api_value_post('latime');
$strlatime2 = $gdb->fun_escape($strlatime);
$stredate = api_value_post('edate');
$stredate2 = $gdb->fun_escape($stredate);
$strledate = api_value_post('ledate');
$strledate2 = $gdb->fun_escape($strledate);
$strbirthday = api_value_post('birthday');
$sqlbirthday = $gdb->fun_escape($strbirthday);
$strlbirthday = api_value_post('lbirthday');
$sqllbirthday = $gdb->fun_escape($strlbirthday);
$strldays =  api_value_post('ldays');
$intldays = api_value_int0($strldays);
$strphone = api_value_get('phone');
$sqlphone = $gdb->fun_escape($strphone);
$stract_name = api_value_post('act_name');
$sqlact_name = $gdb->fun_escape($stract_name);
$strinfo = api_value_post('act_info');
$sqlinfo = $gdb->fun_escape($strinfo);
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlact_name)) {
		$intreturn = 1;
	}
}

$intatime = 0;
if($intreturn == 0) {
	if(!empty($stratime2)) {
		$int = strtotime($stratime2);
		if($int > 0) {
			$intatime = $int;
		}
	}
}

$intlatime = 0;
if($intreturn == 0) {
	if(!empty($strlatime2)) {
		$int = strtotime($strlatime2);
		if($int > 0) {
			$intlatime = $int;
		}
	}
}

$intedate = 0;
if($intreturn == 0) {
	if(!empty($stredate2)) {
		$int = strtotime($stredate2);
		if($int > 0) {
			$intedate = $int;
		}
	}
}

$intledate = 0;
if($intreturn == 0) {
	if(!empty($strledate2)) {
		$int = strtotime($strledate2);
		if($int > 0) {
			$intledate = $int;
		}
	}
}

if (!empty($sqlbirthday)) {
	$arrbirthday = explode('-', $sqlbirthday);
	$intmonth = api_value_int1($arrbirthday[0]);
	$intday = api_value_int1($arrbirthday[1]);
}

if (!empty($sqllbirthday)) {
	$arrbirthday2 = explode('-', $sqllbirthday);
	$intmonth2 = api_value_int1($arrbirthday2[0]);
	$intday2 = api_value_int1($arrbirthday2[1]);
}

if ($intreturn == 0) {
	$strwhere = '';
	if ($GLOBALS['strtype'] != '') {
		$strwhere = $strwhere . ' AND card_type_id = '. $GLOBALS['inttype'];
	}
	if($GLOBALS['intatime'] > 0) {
		$strwhere = $strwhere . ' AND card_atime >= ' . $GLOBALS['intatime'];
	}
	if($GLOBALS['intlatime'] > 0) {
		$strwhere = $strwhere . ' AND card_atime <= ' . ($GLOBALS['intlatime']+86400);
	}
	if($GLOBALS['intedate'] > 0) {
		$strwhere = $strwhere . ' AND card_edate >= ' . $GLOBALS['intedate'];
	}
	if($GLOBALS['intledate'] > 0) {
		$strwhere = $strwhere . ' AND card_edate <= ' . ($GLOBALS['intledate']+86400);
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
		if ($GLOBALS['intsex'] != 0) {
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

	$strsql = 'SELECT count(card_id) as act_relate_aticket FROM' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state = 1 ' . $strwhere .' ORDER BY card_id DESC';
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$act_relate_aticket = $arr['act_relate_aticket'];

	$strsql = 'SELECT card_id FROM' . $GLOBALS['gdb']->fun_table2('card') . ' WHERE card_state = 1 ' . $strwhere .' ORDER BY card_id DESC';

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if($hresult == FALSE) {
		$intreturn = 14;
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_ticket') . " (act_ticket_atime, act_ticket_name, shop_id ,act_ticket_search_cardtype, act_ticket_search_sex, act_ticket_search_fcreate, act_ticket_search_tcreate, act_ticket_search_fexpire ,act_ticket_search_texpire , act_ticket_search_fbirthday, 	act_ticket_search_tbirthday, act_ticket_search_days ,act_ticket_search_phone ,act_ticket_atype, act_ticket_info,s_act_ticket_count) VALUES ("
	.$time . ", '" . $sqlact_name . "', ". api_value_int0($GLOBALS['_SESSION']['login_sid']) . " , " . $inttype ." , " . $intsex ." , ". $intatime ." , ".$intlatime." , " . $intedate . " , ". $intledate ." , '".$sqlbirthday."' , '". $sqllbirthday ."' , " . $intldays ." ,'". $sqlphone . "', 2 , '". $sqlinfo ."' , ".$act_relate_aticket.")";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 12;
	}else{
		$act_ticket_id = mysql_insert_id();
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_atime, act_type) VALUES (" . $time . ", 4)";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 13;
	}else{
		$act_id = mysql_insert_id();
	}
}

echo $intreturn;
?>