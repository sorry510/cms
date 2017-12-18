<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('reserve', get_reserve());
$gtemplate->fun_show('center_shop_myappointment');

function get_reserve(){
	$arr = array();
	$strsql = "SELECT reserve_id,reserve_atime,reserve_count,reserve_here,reserve_state,reserve_type,reserve_dtime FROM " . $GLOBALS['gdb']->fun_table2('reserve') ." WHERE card_id = " .api_value_int0($GLOBALS['_SESSION']['login_id']);

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$strsql = "SELECT mgoods_id,c_mgoods_name FROM " . $GLOBALS['gdb']->fun_table2('reserve_mgoods') . " WHERE reserve_id = " . $row['reserve_id'];

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$mgoods = array();
		foreach ($arr2 as $key2 => $row2) {
			array_push($mgoods, $row2['c_mgoods_name']);
		}
		$arr[$key]['mgoods'] = implode('，', $mgoods);
	}
	return $arr;
}

?>