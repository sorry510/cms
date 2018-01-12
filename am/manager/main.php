<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = "main";
$inttoday = strtotime(date('Y-m-d'));
$intmonth = strtotime(date('Y-m'));
$inttime = time();

$gtemplate->fun_assign('goods_count_list', get_goods_count_list());
$gtemplate->fun_assign('day_money', get_day_money());
$gtemplate->fun_assign('week_money', get_week_money());
$gtemplate->fun_assign('month_money', get_month_money());
$gtemplate->fun_show('main');

function get_goods_count_list() {

	$strsql = 'SELECT a.sales_volume, a.sales_count ,a.mgoods_id ,a.sgoods_id,b.shop_name,c.mgoods_name,c.mgoods_price,c.mgoods_code,c.mgoods_cprice,d.sgoods_name,d.sgoods_code,d.sgoods_price,d.sgoods_cprice FROM (SELECT shop_id,mgoods_id,sgoods_id,c_mgoods_rprice,c_sgoods_rprice,c_sgoods_name,c_mgoods_name,card_record3_goods_count, sum(card_record3_goods_count * c_mgoods_rprice + card_record3_goods_count * c_sgoods_rprice) as sales_volume , sum(card_record3_goods_count) as sales_count FROM' . $GLOBALS['gdb']->fun_table2('card_record3_goods') . ' WHERE card_record3_goods_atime >= '.$GLOBALS['intmonth'].' AND card_record3_goods_atime <= '.$GLOBALS['inttime'].' GROUP BY mgoods_id,sgoods_id ORDER BY sales_count DESC) as a LEFT JOIN (SELECT shop_id, shop_name FROM '. $GLOBALS['gdb']->fun_table('shop') .' WHERE company_id = ' . $GLOBALS['_SESSION']['login_cid'] . ') as b on a.shop_id = b.shop_id LEFT JOIN ' . $GLOBALS['gdb']->fun_table2('mgoods') . ' as c on a.mgoods_id = c.mgoods_id LEFT JOIN ' . $GLOBALS['gdb']->fun_table2('sgoods') . ' as d on a.sgoods_id = d.sgoods_id ORDER BY sales_count DESC LIMIT 8';

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['goods_name'] = '';
		if($row['mgoods_id'] == 0) {
			$arr[$key]['goods_name'] = $row['sgoods_name'];
		}else if($row['sgoods_id'] == 0) {
			$arr[$key]['goods_name'] = $row['mgoods_name'];
		}
	}

	return $arr;

}

function get_day_money(){
	$arr = array();
	$arr_day1 = array();
	$arr_day2 = array();
	$arr_day3 = array();

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . $GLOBALS['inttoday'] ." AND card_record_atime <= ". $GLOBALS['inttime'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_day1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_day1['sum_money'] == null) {
		$int_day1 = 0;
	}else{
		$int_day1 = $arr_day1['sum_money'];
	}

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . ($GLOBALS['inttoday']-86400) ." AND card_record_atime <= ". $GLOBALS['inttoday'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_day2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_day2['sum_money'] == null) {
		$int_day2 = 0;
	}else{
		$int_day2 = $arr_day2['sum_money'];
	}

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . ($GLOBALS['inttoday']-172800) ." AND card_record_atime <= ". ($GLOBALS['inttoday']-86400);

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_day3 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_day3['sum_money'] == null) {
		$int_day3 = 0;
	}else{
		$int_day3 = $arr_day3['sum_money'];
	}

	$arr['money1'] = $int_day1;
	$arr['money2'] = $int_day2;
	$arr['money3'] = $int_day3;

	$intbalance = $int_day1 - $int_day2;

	if ($intbalance > 0) {
		$arr['money_balance'] = '↑ ¥'.$intbalance;
	}else if($intbalance == 0){
		$arr['money_balance'] = '--';
	}else if($intbalance < 0){
		$arr['money_balance'] = '↓ ¥'.$intbalance;
	}

	return $arr;
}

function get_week_money(){
	$arr = array();
	$arr_week1 = array();
	$arr_week2 = array();
	$arr_week3 = array();

  $intthis_week1_start = strtotime(date('Y-m-d', strtotime("this week Monday", $GLOBALS['inttime'])));
  $intthis_week1_end = strtotime(date('Y-m-d', strtotime("this week Sunday", $GLOBALS['inttime']))) + 86400 - 1;
  $intthis_week2_start = $intthis_week1_start - 7*86400;
  $intthis_week2_end = $intthis_week1_start - 1;
  $intthis_week3_start = $intthis_week2_start - 7*86400;
  $intthis_week3_end = $intthis_week2_start - 1;

  /*echo $intthis_week1_start;
  echo '</br>';
  echo $intthis_week2_start;
  echo '</br>';
  echo $intthis_week3_start;
  echo '</br>';
  exit();*/
	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime >= " . $intthis_week1_start ." AND card_record_atime <= ". $GLOBALS['inttime'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_week1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_week1['sum_money'] == null) {
		$int_week1 = 0;
	}else{
		$int_week1 = $arr_week1['sum_money'];
	}

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime >= " . $intthis_week2_start ." AND card_record_atime <= ". $intthis_week2_end;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_week2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_week2['sum_money'] == null) {
		$int_week2 = 0;
	}else{
		$int_week2 = $arr_week2['sum_money'];
	}

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime >= " . $intthis_week3_start ." AND card_record_atime <= ". $intthis_week3_end;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_week3 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_week3['sum_money'] == null) {
		$int_week3 = 0;
	}else{
		$int_week3 = $arr_week3['sum_money'];
	}

	$arr['money1'] = $int_week1;
	$arr['money2'] = $int_week2;
	$arr['money3'] = $int_week3;
	$intbalance = $int_week1 - $int_week2;
	if ($intbalance > 0) {
		$arr['money_balance'] = '↑ ¥'.$intbalance;
	}else if($intbalance == 0){
		$arr['money_balance'] = '--';
	}else if($intbalance < 0){
		$arr['money_balance'] = '↓ ¥'.$intbalance;
	}

	return $arr;
}

function get_month_money(){
	$arr = array();
	$arr_month1 = array();
	$arr_month2 = array();
	$arr_month3 = array();

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . $GLOBALS['intmonth'] ." AND card_record_atime <= ". $GLOBALS['inttime'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_month1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_month1['sum_money'] == null) {
		$int_month1 = 0;
	}else{
		$int_month1 = $arr_month1['sum_money'];
	}

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " . strtotime('-1 month',$GLOBALS['intmonth']) ." AND card_record_atime <= ". $GLOBALS['intmonth'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_month2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_month2['sum_money'] == null) {
		$int_month2 = 0;
	}else{
		$int_month2 = $arr_month2['sum_money'];
	}

	$strsql = "SELECT sum(card_record_smoney) as sum_money FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE card_record_state = 1 AND card_record_atime > " .strtotime('-2 month',$GLOBALS['intmonth']) ." AND card_record_atime <= ". strtotime('-1 month',$GLOBALS['intmonth']);

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_month3 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	if ($arr_month3['sum_money'] == null) {
		$int_month3 = 0;
	}else{
		$int_month3 = $arr_month3['sum_money'];
	}

	$arr['money1'] = $int_month1;
	$arr['money2'] = $int_month2;
	$arr['money3'] = $int_month3;
	$intbalance = $int_month1 - $int_month2;
	if ($intbalance > 0) {
		$arr['money_balance'] = '↑ ¥'.$intbalance;
	}else if($intbalance == 0){
		$arr['money_balance'] = '--';
	}else if($intbalance < 0){
		$arr['money_balance'] = '↓ ¥'.$intbalance;
	}

	return $arr;
}

?>