<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$GLOBALS['_SESSION']['login_cid'] = 1;

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$gtemplate->fun_assign('worder', get_worder());
$gtemplate->fun_show('center_shop_agent_order');

function get_worder(){
	$arr = array();
	$strsql = "SELECT worder_id , c_card_name , worder_atime , c_card_phone,	s_worder_reward,worder_state,	worder_money2 ,	worder_pay FROM " . $GLOBALS['gdb']->fun_table2('worder') . " WHERE card_parent_id = ". $GLOBALS['_SESSION']['login_id'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['pay'] = '';
		if($row['worder_pay'] == 11) {
			$arr[$key]['pay'] = '支付宝';
		} else if($row['worder_pay'] == 21 || $row['worder_pay'] == 22) {
			$arr[$key]['pay'] = '微信';
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
	
	return $arr;
}

?>