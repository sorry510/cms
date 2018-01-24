<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return;
}
ini_set('max_execution_time', '0');
header("Content-type:application/vnd.ms-execl");
header("Content-Disposition:attachment;filename=worker_reward_detail_" . date('Ymj') . ".csv");

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$gtemplate->fun_assign('worker_reward_list', get_worker_reward_list());
$gtemplate->fun_show('worker_reward_detail_export');

function get_worker_reward_list() {
	$intfrom = 0;
	$intto = 0;
	if($GLOBALS['strfrom'] != '') {
		$int = strtotime($GLOBALS['strfrom']);
		if($int > 0) {
			$intfrom = $int;
		}
	}
	if($GLOBALS['strto'] != '') {
		$int = strtotime($GLOBALS['strto'] . ' 23:59:59');
		if($int > 0) {
			$intto = $int;
		}
	}

	$strwhere = '';
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND shop_id = " . $GLOBALS['intshop'];
	}
	if($GLOBALS['strfrom'] != '') {
		$strwhere .= " AND worker_reward_atime >= " . $intfrom;
	}
	if($GLOBALS['strto'] != ''){
		$strwhere .= " AND worker_reward_atime <= " . $intto;
	}
	if($GLOBALS['strkey'] != '') {
	  $strwhere = $strwhere . " AND (c_worker_code = '" . $GLOBALS['sqlkey'] . "'";
	  $strwhere = $strwhere . " or c_worker_name = '" . $GLOBALS['sqlkey'] . "')";
	}

	$strsql = "SELECT a.*, b.shop_name FROM (SELECT worker_reward_id, shop_id, worker_reward_type, worker_reward_money, worker_reward_atime, c_worker_name, "
	. "c_card_code, c_card_name, c_goods_name, c_goods_count, c_card_record_id, c_card_record_code FROM " . $GLOBALS['gdb']->fun_table2('worker_reward')
	. " WHERE 1 = 1" . $strwhere . " ORDER BY worker_reward_id DESC) AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id ORDER BY a.worker_reward_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row) {
		$row['mytype'] = '';
		if($row['worker_reward_type'] == 1) {
			$row['mytype'] = '开卡';
		} else if($row['worker_reward_type'] == 2) {
			$row['mytype'] = '充值';
		} else if($row['worker_reward_type'] == 3) {
			$row['mytype'] = '商品';
		} else if($row['worker_reward_type'] == 4) {
			$row['mytype'] = '导购';
		}
	}
	return $arr;
}
?>