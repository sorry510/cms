<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['act_module'] != 1) {
	return 1;
}

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strman = api_value_post('txtman');
$decman = api_value_decimal($strman, 2);
$strstart = api_value_post('txtstart');
$strend = api_value_post('txtend');
$strticket = api_value_post('txtticket');
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);

$intreturn = 0;

$inttime = time();
$intstart = 0;
if($intreturn == 0) {
	if($strstart != '') {
		$int = strtotime($strstart);
		if($int > 0) {
			$intstart = $int;
		}
	}
	if($intstart == 0) {
		$intreturn = 2;
	}
}

$intend = 0;
if($intreturn == 0) {
	if($strend != '') {
		$int = strtotime($strend . ' 23:59:59');
		if($int > 0 && $int > $inttime) {
			$intend = $int;
		}
	}
	if($intend == 0) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	if($intstart > $intend) {
		$intreturn = 2;
	}
}

$arr = array();
$intttype = 0;
$intmoneyid = 0;
$intgoodsid = 0;
if($intreturn == 0) {
	$arr = explode(",", $strticket);
	if(count($arr) == 2) {
		$intttype = api_value_int0($arr[0]);
		if($intttype == 1) {
			$intmoneyid = api_value_int0($arr[1]);
		} else if($intttype == 2) {
			$intgoodsid = api_value_int0($arr[1]);
		}
	}
	if($intttype != 1 && $intttype != 2) {
		$intreturn = 1;
	}
}

$arr2 = array();
$strid = 0;
if($intreturn == 0) {
	if($intttype == 1) {
		$strsql = "SELECT ticket_money_id, ticket_money_name, ticket_money_value, ticket_money_limit, ticket_money_days, ticket_money_begin FROM "
		. $GLOBALS['gdb']->fun_table2('ticket_money') . " WHERE ticket_money_id = " . $intmoneyid . " LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(empty($arr)) {
			$intreturn = 1;
		}
		
		if($intreturn == 0) {
			$strsql = "UPDATE " . $gdb->fun_table2('act_give') . " SET act_give_name = '" . $sqlname . "', act_give_man = " . $decman . ", act_give_ttype = 1, ticket_money_id = "
			. $intmoneyid . ", ticket_goods_id = 0, act_give_start = " . $intstart . ", act_give_end = " . $intend . ", act_give_memo = '" . $sqlmemo . "', act_give_ctime = "
			. $inttime . ", c_ticket_name = '" . $gdb->fun_escape($arr['ticket_money_name']) . "', c_ticket_value = " . $arr['ticket_money_value'] . ", c_ticket_limit = "
			. $arr['ticket_money_limit'] . ", c_ticket_days = " . $arr['ticket_money_days'] . ", c_ticket_begin = " . $arr['ticket_money_begin']
			. ", c_mgoods_id = 0, c_mgoods_name = '' WHERE act_give_id = " . $intid . " LIMIT 1";
			$gdb->fun_do("UPDATE cf_test SET myvalue = '" . $gdb->fun_escape($strsql) . "'");
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 1;
			}
		}
		
		if($intreturn == 0) {
			$strsql = "UPDATE " . $gdb->fun_table2('act') . " SET act_ctime = " . $inttime . " WHERE act_give_id = " . $intid . " LIMIT 1";
			$gdb->fun_do($strsql);
		}
	} else if($intttype == 2) {
		$strsql = "SELECT ticket_goods_id, mgoods_id, ticket_goods_name, ticket_goods_value, ticket_goods_days, ticket_goods_begin FROM "
		. $GLOBALS['gdb']->fun_table2('ticket_goods') . " WHERE ticket_goods_id = " . $intgoodsid . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(empty($arr)) {
			$intreturn = 1;
		}
		if($intreturn == 0) {
			$strsql = "SELECT mgoods_id, mgoods_name FROM " . $gdb->fun_table2('mgoods') . " WHERE mgoods_id = " . $arr['mgoods_id'] . " LIMIT 1";
			$hresult = $gdb->fun_query($strsql);
			$arr2 = $gdb->fun_fetch_assoc($hresult);
			if(empty($arr2)) {
				$intreturn = 1;
			}
		}
		
		if($intreturn == 0) {
			$strsql = "UPDATE " . $gdb->fun_table2('act_give') . " SET act_give_name = '" . $sqlname . "', act_give_man = " . $decman . ", act_give_ttype = 2, ticket_money_id = 0, "
			. "ticket_goods_id = " . $intgoodsid . ", act_give_start = " . $intstart . ", act_give_end = " . $intend . ", act_give_memo = '" . $sqlmemo . "', act_give_ctime = "
			. $inttime . ", c_ticket_name = '" . $gdb->fun_escape($arr['ticket_goods_name']) . "', c_ticket_value = " . $arr['ticket_goods_value'] . ", c_ticket_limit = 0, "
			. "c_ticket_days = " . $arr['ticket_goods_days'] . ", c_ticket_begin = " . $arr['ticket_goods_begin'] . ", c_mgoods_id = " . $arr2['mgoods_id'] . ", c_mgoods_name = '"
			. $gdb->fun_escape($arr2['mgoods_name']) . "' WHERE act_give_id = " . $intid . " LIMIT 1";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 1;
			}
		}
		
		if($intreturn == 0) {
			$strsql = "UPDATE " . $gdb->fun_table2('act') . " SET act_ctime = " . $inttime . " WHERE act_give_id = " . $intid . " LIMIT 1";
			$gdb->fun_do($strsql);
		}
	}
}

echo $intreturn;
?>