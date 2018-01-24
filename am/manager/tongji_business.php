<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'tongji';

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strdata_time = api_value_get('data_time');
$intdata_time = api_value_int0($strdata_time);

$strwhere = '';
if ($intshop_id != 0) {
	$strwhere = ' AND shop_id = ' . $intshop_id;
}

$inttoday = strtotime(date('Y-m-d'));
$intmonth = strtotime(date('Y-m'));

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('card_shopping', get_card_shopping());
$gtemplate->fun_assign('normal_shopping', get_normal_shopping());
$gtemplate->fun_assign('cmoney', get_cmoney());
$gtemplate->fun_assign('money', get_money());
$gtemplate->fun_assign('mcombo', get_buy_mcombo());
$gtemplate->fun_show('tongji_business');

function get_request() {
	$arr = array();
	$arr['shop_id'] = $GLOBALS['strshop_id'];
	$arr['data_time'] = $GLOBALS['intdata_time'];
	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30-$i;
			$data_x = date('m-d', strtotime("-$day day",$GLOBALS['inttoday']));
			if ($i == 0) {
				$arr['data_x'] = "'".$data_x."'";
			}else{
				$arr['data_x'] = $arr['data_x'] . "," . "'".$data_x."'";
			}
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12-$i;
			$data_x = date('Y-m', strtotime("-$month month",$GLOBALS['intmonth']));
			if ($i == 0) {
				$arr['data_x'] = "'".$data_x."'";
			}else{
				$arr['data_x'] = $arr['data_x'] . "," . "'".$data_x."'";
			}	
		}
	}
	return $arr;
}

function get_shop() {
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) ." ORDER BY shop_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_shopping() {
	$arr = array();

	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30 - $i;
			$day2 = $day - 1;
			$intfrom = strtotime("-$day day",$GLOBALS['inttoday']);
			$intto = strtotime("-$day2 day",$GLOBALS['inttoday']);

			$strsql = "SELECT sum(card_record_smoney) as sum_card_shopping FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 3 AND card_id != 0 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_card = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['card_shopping'] = $arr_card['sum_card_shopping'];
			}else{
				$arr['card_shopping'] = $arr['card_shopping'] . "," .$arr_card['sum_card_shopping'];
			}
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12-$i;
			$month2 = $month - 1;
			$intfrom = strtotime("-$month month",$GLOBALS['intmonth']);
			$intto = strtotime("-$month2 month",$GLOBALS['intmonth']);

			$strsql = "SELECT sum(card_record_smoney) as sum_card_shopping FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 3 AND card_id != 0 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_card = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['card_shopping'] = $arr_card['sum_card_shopping'];
			}else{
				$arr['card_shopping'] = $arr['card_shopping'] . "," .$arr_card['sum_card_shopping'];
			}
		}
	}
	return $arr;
}

function get_normal_shopping() {
	$arr = array();

	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30 - $i;
			$day2 = $day - 1;
			$intfrom = strtotime("-$day day",$GLOBALS['inttoday']);
			$intto = strtotime("-$day2 day",$GLOBALS['inttoday']);

			$strsql = "SELECT sum(card_record_smoney) as sum_normal_shopping FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 3 AND card_id = 0 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_normal = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['normal_shopping'] = $arr_normal['sum_normal_shopping'];
			}else{
				$arr['normal_shopping'] = $arr['normal_shopping'] . "," .$arr_normal['sum_normal_shopping'];
			}
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12-$i;
			$month2 = $month - 1;
			$intfrom = strtotime("-$month month",$GLOBALS['intmonth']);
			$intto = strtotime("-$month2 month",$GLOBALS['intmonth']);

			$strsql = "SELECT sum(card_record_smoney) as sum_normal_shopping FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 3 AND card_id = 0 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_normal = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['normal_shopping'] = $arr_normal['sum_normal_shopping'];
			}else{
				$arr['normal_shopping'] = $arr['normal_shopping'] . "," .$arr_normal['sum_normal_shopping'];
			}
		}
	}
	return $arr;
}

function get_cmoney() {
	$arr = array();

	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30 - $i;
			$day2 = $day - 1;
			$intfrom = strtotime("-$day day",$GLOBALS['inttoday']);
			$intto = strtotime("-$day2 day",$GLOBALS['inttoday']);
	
			$strsql = "SELECT sum(card_record_smoney) as sum_cmoney FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_type = 1 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_cmoney = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['cmoney'] = $arr_cmoney['sum_cmoney'];
			}else{
				$arr['cmoney'] = $arr['cmoney'] . "," .$arr_cmoney['sum_cmoney'];
			}
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12-$i;
			$month2 = $month - 1;
			$intfrom = strtotime("-$month month",$GLOBALS['intmonth']);
			$intto = strtotime("-$month2 month",$GLOBALS['intmonth']);

			$strsql = "SELECT sum(card_record_smoney) as sum_cmoney FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_type = 1 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];
			
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_cmoney = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['cmoney'] = $arr_cmoney['sum_cmoney'];
			}else{
				$arr['cmoney'] = $arr['cmoney'] . "," .$arr_cmoney['sum_cmoney'];
			}
		}
	}
	return $arr;
}

function get_money() {
	$arr = array();

	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30 - $i;
			$day2 = $day - 1;
			$intfrom = strtotime("-$day day",$GLOBALS['inttoday']);
			$intto = strtotime("-$day2 day",$GLOBALS['inttoday']);

			$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_money = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['money'] = $arr_money['sum_money'];
			}else{
				$arr['money'] = $arr['money'] . "," .$arr_money['sum_money'];
			}
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12-$i;
			$month2 = $month - 1;
			$intfrom = strtotime("-$month month",$GLOBALS['intmonth']);
			$intto = strtotime("-$month2 month",$GLOBALS['intmonth']);

			$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_money = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['money'] = $arr_money['sum_money'];
			}else{
				$arr['money'] = $arr['money'] . "," .$arr_money['sum_money'];
			}
		}
	}
	return $arr;
}

function get_buy_mcombo() {
	$arr = array();

	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30 - $i;
			$day2 = $day - 1;
			$intfrom = strtotime("-$day day",$GLOBALS['inttoday']);
			$intto = strtotime("-$day2 day",$GLOBALS['inttoday']);

			$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 2 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_money = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['mcombo'] = $arr_money['sum_money'];
			}else{
				$arr['mcombo'] = $arr['mcombo'] . "," .$arr_money['sum_money'];
			}
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12-$i;
			$month2 = $month - 1;
			$intfrom = strtotime("-$month month",$GLOBALS['intmonth']);
			$intto = strtotime("-$month2 month",$GLOBALS['intmonth']);

			$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 2 AND card_record_atime > " . $intfrom ." AND card_record_atime <= " .$intto . $GLOBALS['strwhere'];
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_money = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

			if ($i == 0) {
				$arr['mcombo'] = $arr_money['sum_money'];
			}else{
				$arr['mcombo'] = $arr['mcombo'] . "," .$arr_money['sum_money'];
			}
		}
	}
	return $arr;
}

?>