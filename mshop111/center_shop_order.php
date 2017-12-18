<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('worder', get_worder());
$gtemplate->fun_show('center_shop_order');

function get_worder(){
	$arr = array();
	$strsql = "SELECT worder_id,worder_atime,worder_ctime,worder_express_company,	worder_express_code,worder_money2,	worder_address_detail,worder_address_name,worder_address_phone,worder_get,worder_state,	worder_get_shop FROM " . $GLOBALS['gdb']->fun_table2('worder') ." WHERE card_id = " .api_value_int0($GLOBALS['_SESSION']['login_id']);

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['get'] = '';
		if($row['worder_get'] == 2) {
			$arr[$key]['get'] = '快递';
		} else if($row['worder_get'] == 3) {
			$arr[$key]['get'] = '自取';
		}
	}

	foreach($arr as $key => $row) {
		$arr[$key]['state'] = '';
		if($row['worder_state'] == 1 && $row['worder_get'] == 2) {
			$arr[$key]['state'] = '待处理';
		} else if($row['worder_state'] == 2) {
			$arr[$key]['state'] = '已发货';
		} else if($row['worder_state'] == 3) {
			$arr[$key]['state'] = '已自取';
		} else if($row['worder_state'] == 4) {
			$arr[$key]['state'] = '已退款';
		} else if($row['worder_state'] == 1 && $row['worder_get'] == 3) {
			$arr[$key]['state'] = '等待自取';
		} else if($row['worder_state'] == 11) {
			$arr[$key]['state'] = '订单异常';
		}
	}

	foreach($arr as $key => $row) {
		$strsql = "SELECT wgoods_id,c_wgoods_name,worder_goods_price,worder_goods_count,c_wgoods_photo1 FROM " . $GLOBALS['gdb']->fun_table2('worder_goods') . " WHERE worder_id = " . $row['worder_id'];

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr[$key]['wgoods'] = $arr2;
	}

	foreach($arr as $key => $row) {
		if (!empty($row['worder_get_shop'])) {
			$strsql = "SELECT shop_name FROM " . $GLOBALS['gdb']->fun_table('shop') . " WHERE shop_id = " . $row['worder_get_shop'];

			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr3 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			$arr[$key]['shop_name'] = $arr3['shop_name'];
		}else{
			$arr[$key]['shop_name'] = '--';
		}
	}
	return $arr;
}

?>