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
header("Content-Disposition:attachment;filename=worker_reward_tongji_" . date('Ymj') . ".csv");

$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strfrom = api_value_get('from');
$strto = api_value_get('to');
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$gtemplate->fun_assign('worker_reward_tongji', get_worker_reward_tongji());
$gtemplate->fun_show('worker_reward_tongji_export');


function get_worker_reward_tongji() {
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

	//主表分类分组查询提成金额
	$strsql1 = "SELECT SUM(case when worker_reward_type=1 then worker_reward_money else 0 end) AS tc_kk, "
	. "SUM(case when worker_reward_type=2 then worker_reward_money else 0 end) AS tc_cz,"
	. "SUM(case when worker_reward_type=3 && c_goods_type=1 then worker_reward_money else 0 end) AS tc_fw, "
	. "SUM(case when worker_reward_type=3 && c_goods_type=2 then worker_reward_money else 0 end) AS tc_sw, "
	. "SUM(case when worker_reward_type=4 then worker_reward_money else 0 end) AS tc_dg, "
	. "SUM(case when worker_reward_type=1 then 1 else 0 end) AS num_kk, "
	. "SUM(case when worker_reward_type=3&&c_goods_type=1 then 1 else 0 end) AS num_fw, "
	. "SUM(case when worker_reward_type=3&&c_goods_type=2 then 1 else 0 end) AS num_sw, "
	. "SUM(case when worker_reward_type=4 then 1 else 0 end)as num_dg, "
	. "SUM(case when worker_reward_type=2 then c_card_record_smoney else 0 end) AS je_cz, "
	. "SUM(case when worker_reward_type=3&&c_goods_type=1 then c_goods_price*c_goods_count else 0 end) AS je_fw, "
	. "SUM(case when worker_reward_type=3&&c_goods_type=2 then c_goods_price*c_goods_count else 0 end) AS je_sw, "
	. "SUM(case when worker_reward_type=4 then c_goods_price*c_goods_count else 0 end) AS je_dg, "
	. "shop_id,worker_id,c_worker_name,c_worker_group_name,c_card_record_id,worker_reward_type,c_goods_name FROM "
	. $GLOBALS['gdb']->fun_table2('worker_reward')." WHERE 1 = 1" . $strwhere . " GROUP BY worker_id";
	//合并3个表为一表
	$strsql2 = "SELECT a.*, b.shop_name, c.worker_wage FROM (" . $strsql1 . ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id LEFT JOIN "
	. $GLOBALS['gdb']->fun_table2('worker') . " AS c ON a.worker_id = c.worker_id";
	//求实际工资，并排序
	$strsql ="SELECT SUM(d.tc_kk+d.tc_cz+d.tc_fw+d.tc_sw+d.tc_dg+d.worker_wage) AS sz_wage, d.* FROM (" . $strsql2
	. ") AS d GROUP BY d.worker_id ORDER BY sz_wage DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	return $arr;
}
?>