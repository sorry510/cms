<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id);
$strworder_id = api_value_get('worder_id');
$intworder_id = api_value_int0($strworder_id);

$intreturn = 0;
$arr = array();
$arrgoods = array();
if($intreturn == 0) {
	
	$strsql = "SELECT a.*, b.card_code FROM (SELECT worder_id, card_id , c_card_type_name,c_card_name,c_card_phone,worder_money,worder_pay,worder_address_name,worder_address_phone,worder_address_detail,worder_express_company,worder_express_code,worder_get,worder_state,worder_ctime,c_parent_card_name,c_parent_card_phone,s_worder_reward FROM " . $GLOBALS['gdb']->fun_table2('worder')." WHERE worder_id = " . $GLOBALS['intworder_id'] .") AS a LEFT JOIN (SELECT card_code,card_id FROM " . $GLOBALS['gdb']->fun_table2('card')." WHERE card_id = ".$GLOBALS['intcard_id'].") AS b on a.card_id = b.card_id";
	//echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	if ($hresult) {
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	}else{
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	
	$strsql = "SELECT worder_goods_count,worder_goods_price,c_wgoods_name FROM " . $GLOBALS['gdb']->fun_table2('worder_goods')." WHERE worder_id = " . $GLOBALS['intworder_id'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	if ($hresult){
		$arrgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}else{
		$intreturn = 2;
	}

}

if ($intreturn == 0 && !empty($arr)) {

	$arr['pay'] = '';
	$arr['get'] = '';
	$arr['state'] = '';
	$arr['order_company'] = '';
	$arr['order_code'] = '';
	$arr['order_company'] = '';
	$arr['send_time'] = '';
	$arr['wgoods'] = array();

	if($arr['worder_pay'] == 11) {
		$arr['pay'] = '支付宝';
	} else if($arr['worder_pay'] == 21 || $arr['worder_pay'] == 22) {
		$arr['pay'] = '微信';
	}

	if($arr['worder_get'] == 2) {
		$arr['get'] = '邮寄';
	} else if($arr['worder_get'] == 3) {
		$arr['get'] = '用户自取';
	}

	if($arr['worder_state'] == 1 && $arr['worder_get'] == 2) {
		$arr['state'] = '待处理';
	} else if($arr['worder_state'] == 2) {
		$arr['state'] = '已发货';
	} else if($arr['worder_state'] == 3) {
		$arr['state'] = '已自取';
	} else if($arr['worder_state'] == 4) {
		$arr['state'] = '已退款';
	} else if($arr['worder_state'] == 1 && $arr['worder_get'] == 3) {
		$arr['state'] = '等待自取';
	} else if($arr['worder_state'] == 11) {
		$arr['state'] = '订单异常';
	}

	if ($arr['worder_express_code'] == '') {
		$arr['order_code'] = '--';
	}else{
		$arr['order_code'] = $arr['worder_express_code'];
	}

	if ($arr['worder_express_company'] == '') {
		$arr['order_company'] = '--';
	}else{
		$arr['order_company'] = $arr['worder_express_company'];
	}

	if (!empty($arr['worder_ctime']) && $arr['worder_state'] == 2) {
		$arr['send_time'] = date('Y-m-d H:i',$arr['worder_ctime']);
	}else{
		$arr['send_time'] = '--';
	}

	if (!empty($arrgoods)) {
		$arr['wgoods'] = $arrgoods;
	}

}

echo json_encode($arr);

?>