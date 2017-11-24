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
$gtemplate->fun_assign('card_type', get_card_type());
$gtemplate->fun_show('tongji_income');

function get_request() {
	$arr = array();
	$arr['shop_id'] = $GLOBALS['strshop_id'];
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
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." order by shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_card_type() {
	$arr = array();

	if ($GLOBALS['intdata_time'] == 1) {
		for($i = 0;$i < 30;$i++){
			$day = 30 - $i;
			$day2 = $day - 1;
			$intfrom = strtotime("-$day day",$GLOBALS['inttoday']);
			$intto = strtotime("-$day2 day",$GLOBALS['inttoday']);

			$strsql = "SELECT count(card_id) as card_num,card_type_id FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_state != 3 AND card_atime >". $intfrom ." AND card_atime <= " . $intto . " GROUP BY card_type_id order by card_type_id";

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_card_type = $GLOBALS['gdb']->fun_fetch_all($hresult);

			foreach ($arr_card_type as $key => $value) {
				if ($i == 0) {
					$arr[$key]['card_num'] = $arr_card_type[$key]['card_num'];
				}else{
					$arr[$key]['card_num'] = $arr[$key]['card_num'] . "," .$arr_card_type[$key]['card_num'];
				}
			}	
		}
	}else{
		for($i = 0;$i < 12;$i++){
			$month = 12 - $i;
			$month2 = $month - 1;
			$intfrom = strtotime("-$month month",$GLOBALS['intmonth']);
			$intto = strtotime("-$month2 month",$GLOBALS['intmonth']);

			$strsql = "SELECT count(card_id) as card_num,card_type_id FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_state != 3 GROUP BY card_type_id order by card_type_id";

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr_card_type = $GLOBALS['gdb']->fun_fetch_all($hresult);

			foreach ($arr_card_type as $key => $value) {
				if ($i == 0) {
					$arr[$key]['card_num'] = $arr_card_type[$key]['card_num'];
				}else{
					$arr[$key]['card_num'] = $arr[$key]['card_num'] . "," .$arr_card_type[$key]['card_num'];
				}
			}
		}
	}
	return $arr;
}

?>