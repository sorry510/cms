<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strtype = api_value_get('card');
$inttype = api_value_int0($strtype);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
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
$strticket = api_value_post('ticket');
$sqlticket = $gdb->fun_escape($strticket);
$strsms = api_value_post('sms');
$intsms = api_value_int0($strsms);
$strinfo = api_value_post('info');
$sqlinfo = $gdb->fun_escape($strinfo);
$strweixin = api_value_post('weixin');
$intweixin = api_value_int0($strweixin);
$time = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlact_name)) {
		$intreturn = 1;
	}
}

if ($intreturn == 0) {
	if (empty($intsms)) {
		$sqlinfo = '';
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

$arrticket = array();
if ($intreturn == 0) {
	$arrticket = explode(",",$sqlticket);
	$intttype = $arrticket[0];
}

$intticket_money_id = 0;
$intticket_goods_id = 0;

if ($intttype == 1) {
	$intticket_money_id = $arrticket[1];
}elseif ($intttype == 2) {
	$intticket_goods_id = $arrticket[1];
}

if ($intreturn == 0) {
	if (empty($intticket_money_id) && empty($intticket_goods_id)) {
		$intreturn == 9;
	}
}

$decc_ticket_limit = 0;
$intc_mgoods_id = 0;
$sqlc_mgoods_name = '';
if ($intttype == 1) {
	$strsql = 'SELECT ticket_money_name,ticket_money_value,ticket_money_limit,ticket_money_days,ticket_money_begin FROM' . $GLOBALS['gdb']->fun_table2('ticket_money') .' WHERE ticket_money_id = '.$intticket_money_id;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr =  $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$sqlc_ticket_name = $arr['ticket_money_name'];
	$decc_ticket_value =  $arr['ticket_money_value'];
	$intc_ticket_days =  $arr['ticket_money_days'];
	$intc_ticket_begin = $arr['ticket_money_begin'];
	$decc_ticket_limit =  $arr['ticket_money_limit'];
	if($hresult == FALSE) {
		$intreturn = 10;
	}
}elseif ($intttype == 2) {
	$strsql = 'SELECT a.ticket_goods_name,a.ticket_goods_value,a.ticket_goods_days,a.ticket_goods_begin,b.mgoods_id,b.mgoods_name FROM (SELECT ticket_goods_name,ticket_goods_value,mgoods_id,ticket_goods_days,ticket_goods_begin FROM ' . $GLOBALS['gdb']->fun_table2('ticket_goods') .' WHERE ticket_goods_id = '.$intticket_goods_id.') as a LEFT JOIN ' . $GLOBALS['gdb']->fun_table2('mgoods') . " as b ON a.mgoods_id = b.mgoods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr =  $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$sqlc_ticket_name = $arr['ticket_goods_name'];
	$decc_ticket_value =  $arr['ticket_goods_value'];
	$intc_mgoods_id=  $arr['mgoods_id'];
	$intc_ticket_days=  $arr['ticket_goods_days'];
	$intc_ticket_begin = $arr['ticket_goods_begin'];
	$sqlc_mgoods_name =  $arr['mgoods_name'];
	if($hresult == FALSE) {
		$intreturn = 11;
	}
}

if ($intc_ticket_begin == 1) {
	$newtime = date('Y-m-d',$time);
	$newtime2 = strtotime($newtime)+1;
	$intedate2 = $newtime2 + (86400 * $intc_ticket_days)-1;
}elseif ($intc_ticket_begin == 2) {
	$newtime = date('Y-m-d',$time);
	$newtime2 = strtotime($newtime)+1;
	$intedate2 = $newtime2 + (86400 * $intc_ticket_days) + 86399;
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
	if($GLOBALS['intshop'] !='') {
		$strwhere = $strwhere . ' AND shop_id = '.$GLOBALS['intshop'];
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
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_ticket') . " (act_ticket_atime, act_ticket_name, act_ticket_search_cardtype, act_ticket_search_sex, act_ticket_search_fcreate, act_ticket_search_tcreate, act_ticket_search_fexpire ,act_ticket_search_texpire , act_ticket_search_fbirthday, 	act_ticket_search_tbirthday, act_ticket_search_days,act_ticket_atype, act_ticket_ttype, ticket_money_id, ticket_goods_id,act_ticket_sms, act_ticket_info, act_ticket_weixin, c_ticket_name , c_ticket_value, c_ticket_limit, c_mgoods_id, c_mgoods_name,c_ticket_days,c_ticket_begin,s_act_ticket_count) VALUES ("
	.$time . ", '" . $sqlact_name . "', " . $inttype ." , " . $intsex ." , ". $intatime ." , ".$intlatime." , " . $intedate . " , ". $intledate ." , '".$sqlbirthday."' , '". $sqllbirthday ."' , " . $intldays . ", 4 , ". $intttype." , ".$intticket_money_id." , ".$intticket_goods_id. " , ". $intsms ." , '". $sqlinfo ." ', " .$intweixin ." , '".$sqlc_ticket_name."',".$decc_ticket_value.",".$decc_ticket_limit.",".$intc_mgoods_id.",'".$sqlc_mgoods_name ."',".$intc_ticket_days.",".$intc_ticket_begin.",".$act_relate_aticket.")";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 12;
	}else{
		$act_ticket_id = mysql_insert_id();
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_atime, act_type, act_ticket_id) VALUES (" . $time . ", 4 , " . $act_ticket_id . ")";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 13;
	}else{
		$act_id = mysql_insert_id();
	}
}

foreach ($arr as $key => $row) {
	if($intreturn == 0) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('card_ticket') . " (card_id, act_type, act_id,act_ticket_id,ticket_type,ticket_money_id,ticket_goods_id,card_ticket_state,card_ticket_atime,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name) VALUES (" .$row['card_id'] . " , 4 , " . $act_id."," .$act_ticket_id.",".$intttype.",".$intticket_money_id.",".$intticket_goods_id.", 1 ,".$time.",".$intedate2.",'".$sqlc_ticket_name."',".$decc_ticket_value.",".$decc_ticket_limit.",".$intc_ticket_days.",".$intc_ticket_begin.",".$intc_mgoods_id.",'".$sqlc_mgoods_name . "')";

		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 15;
		}else{
			$card_ticket_id = mysql_insert_id();
		}
	}
	if($intreturn == 0) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('card_ticket_record') . " (card_id, 	card_ticket_record_atype, act_id,act_ticket_id,card_ticket_record_ttype,ticket_money_id,ticket_goods_id,card_ticket_record_utype,card_ticket_id,card_ticket_record_atime,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name,c_ticket_edate,c_act_name) VALUES (" .$row['card_id'] . " , 4 , " . $act_id."," .$act_ticket_id.",".$intttype.",".$intticket_money_id.",".$intticket_goods_id.", 1 ,".$card_ticket_id.",".$time.",'".$sqlc_ticket_name."',".$decc_ticket_value.",".$decc_ticket_limit.",".$intc_ticket_days.",".$intc_ticket_begin.",".$intc_mgoods_id.",'".$sqlc_mgoods_name."'," .$intedate2 . ",'" . $sqlact_name . "')";

		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 16;
		}
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act') . " SET act_relate_aticket = " . $act_relate_aticket ." WHERE act_id = " . $act_id . " LIMIT 1";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 17;
	}
}

echo $intreturn;
?>