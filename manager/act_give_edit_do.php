<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');


$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strman = api_value_post('txtman');
$decman = api_value_decimal($strman,2);
$intclient = 2;
$strstart = api_value_post('txtstart');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('txtend');
$strend2 = $gdb->fun_escape($strend);
$strquiz = api_value_post('quiz');
$sqlquiz = $gdb->fun_escape($strquiz);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);
$inttime = time();

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($decman) || empty($sqlquiz) || empty($intid)) {
		$intreturn = 1;
	}
}

if ($intreturn == 0) {
	$strsql = "SELECT act_give_start,act_give_end FROM " . $gdb->fun_table2('act_give') . " WHERE act_give_id = " . $intid ;
	$hresult = $gdb->fun_do($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if($arr['act_give_end'] < $inttime){
		$intreturn = 101;
	}else{
		$intreturn = 0;
	}
}

$arrticket = array();
if ($intreturn == 0) {
	$arrticket = explode(",",$sqlquiz);
	$intttype = $arrticket[0];
}

$intticket_money_id = 0;
$intticket_goods_id = 0;

if ($intttype == 1) {
	$intticket_money_id = $arrticket[1];
}elseif ($intttype == 2) {
	$intticket_goods_id = $arrticket[1];
}

$intstart = 0;
if($intreturn == 0) {
	if(!empty($strstart2)) {
		$int = strtotime($strstart2);
		if($int > 0) {
			$intstart = $int;
		}
	}else{$intreturn = 4;}
}

$intend = 0;
if($intreturn == 0) {
	if(!empty($strend2)) {
		$int = strtotime($strend2);
		if($int > time()) {
			$intend = $int;
		}else{$intreturn = 100;}
	}else{$intreturn = 5;}
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
		$intreturn = 6;
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
		$intreturn = 7;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('act_give') . " SET  act_give_name = '" . $sqlname . "', act_give_client = " . $intclient . ", act_give_man = " . $decman . ", act_give_ttype = " . $intttype .",  act_give_start = "
	. $intstart . ", act_give_end = " . $intend .", ticket_money_id = " . $intticket_money_id .", ticket_goods_id = " . $intticket_goods_id . ", act_give_memo = '" . $sqlmemo . "', c_ticket_name = '". $sqlc_ticket_name ."' , c_ticket_value = ". $decc_ticket_value ." , c_ticket_limit = ". $decc_ticket_limit." , c_ticket_days = ". $intc_ticket_days." , c_ticket_begin = ". $intc_ticket_begin ." , c_mgoods_id = ". $intc_mgoods_id." , c_mgoods_name = '". $sqlc_mgoods_name ."', act_give_ctime =". $inttime ." WHERE act_give_id = " . $intid . " LIMIT 1"; 
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 8;
	}
}

echo $intreturn;

?>