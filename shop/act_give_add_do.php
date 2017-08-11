<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strman = api_value_post('man');
$decman = api_value_decimal($strman,2);
$intclient = 2;
$strstart = api_value_post('start');
$strstart2 = $gdb->fun_escape($strstart);
$strend = api_value_post('end');
$strend2 = $gdb->fun_escape($strend);
$strttype = api_value_post('ttype');
$intttype = api_value_int0($strttype);
$strticket_money_id = api_value_post('ticket_money_id');
$intticket_money_id = api_value_int0($strticket_money_id);
$strticket_goods_id = api_value_post('ticket_goods_id');
$intticket_goods_id = api_value_int0($strticket_goods_id);
$strmemo = api_value_post('memo');
$sqlmemo = $gdb->fun_escape($strmemo);
$strshop = api_value_post('shop');
$strshop_id = api_value_post('shop_id');

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($decman) || empty($intttype) || empty($strshop_id)) {
		$intreturn = 1;
	}
}

if ($intttype == 1) {
	$intticket_goods_id = 0;
}elseif ($intttype == 2) {
	$intticket_money_id = 0;
}

if ($strshop == 'all') {
	$intshop = 1;
}else{
	$intshop = 2;
}

$intstart = 0;
if($intreturn == 0) {
	if(!empty($strstart2)) {
		$int = strtotime($strstart2);
		if($int > 0) {
			$intstart = $int;
		}
	}else{$intreturn = 1;}
}

$intend = 0;
if($intreturn == 0) {
	if(!empty($strend2)) {
		$int = strtotime($strend2);
		if($int > 0) {
			$intend = $int;
		}
	}else{$intreturn = 1;}
}

$intstate = 1;

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
		$intreturn = 2;
	}
}elseif ($intttype == 2) {
	/*$strsql = 'SELECT a.ticket_goods_name,a.ticket_goods_value,b.mgoods_id,b.mgoods_name FROM' . $GLOBALS['gdb']->fun_table2('ticket_goods') .'as a LEFT JOIN ' . $GLOBALS['gdb']->fun_table2('mgoods') . "as b ON a.mgoods_id = b.mgoods_id WHERE a.ticket_goods_id = " . $intticket_goods_id;*/
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
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act_give') . " (act_give_atime, act_give_name, act_give_client, act_give_man, act_give_start,  act_give_end, act_give_ttype, ticket_money_id, ticket_goods_id, act_give_state, act_give_memo,  act_give_shop , c_ticket_name , c_ticket_value, c_ticket_limit,c_ticket_days, c_mgoods_id, c_mgoods_name,c_ticket_begin) VALUES ("
	.time() . ", '" . $sqlname . "', " . $intclient .", " . $decman .", ". $intstart .",".$intend.",".$intttype.",".$intticket_money_id.",".$intticket_goods_id.",".$intstate. ", '" .$sqlmemo. "',". $intshop .",'".$sqlc_ticket_name."',".$decc_ticket_value.",".$decc_ticket_limit.",".$intc_ticket_days.",".$intc_mgoods_id.",'".$sqlc_mgoods_name."',". $intc_ticket_begin .")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}else{
		$id = mysql_insert_id();
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('act') . " (act_atime, act_type, act_give_id) VALUES (" .time() . ", 1 , " .$id . ")";

	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}

if($intreturn == 0) {
	foreach ($strshop_id as $key => $value) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('act_give_shop') . " (act_give_id,shop_id) VALUES (" .$id . " , " .$value . ")";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 6;
		}
	}
}

echo $intreturn;
?>