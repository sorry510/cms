<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
/*require('inc_limit.php');*/
ini_set('max_execution_time', '0');
header("Content-type:application/vnd.ms-execl");
header("Content-Disposition:attachment;filename=worker_" . date('Ymj') . ".csv");

$strstate = api_value_get('state');
$intstate = api_value_int0($strstate);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strgroup = api_value_get('group');
$intgroup = api_value_int0($strgroup);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('worker_export', '');

function get_worker_list() {
	$strwhere = '';
	$strwhere = $strwhere . " AND a.worker_state = " . $GLOBALS['intstate'] . " AND a.shop_id IN (SELECT shop_id FROM " . $GLOBALS['gdb']->fun_table('shop') . " WHERE company_id = "
	. api_value_int0($GLOBALS['_SESSION']['login_id']) . " AND shop_etime > " . time() . ")";
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND a.shop_id = " . $GLOBALS['intshop'];
	}
	if($GLOBALS['intgroup'] != 0) {
		$strwhere .= " AND a.worker_group_id = " . $GLOBALS['intgroup'];
	}
	if($GLOBALS['strkey'] != '') {
	  $strwhere .= " AND (a.worker_name = '" . $GLOBALS['strkey'] . "'";
	  $strwhere .= " OR a.worker_code = '" . $GLOBALS['strkey'] . "')";
	}

	$strsql = "SELECT a.worker_id, a.worker_code, a.worker_name, a.worker_sex, a.worker_birthday_date, a.worker_phone, a.worker_education, a.worker_join, a.worker_wage, "
	. "a.worker_state, b.worker_group_name, c.shop_name FROM " . $GLOBALS['gdb']->fun_table2('worker')
	. " AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table2('worker_group') . " AS b ON a.worker_group_id = b.worker_group_id"
	. " LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS c ON a.shop_id = c.shop_id WHERE 1 = 1" . $strwhere
	. " ORDER BY a.worker_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row) {
		$row['mysex'] = '';
		if($row['worker_sex'] == 1) {
			$row['mysex'] = '男';
		} else if($row['worker_sex'] == 2) {
			$row['mysex'] = '女';
		}
		$row['mybirthday'] = '';
		if($row['worker_birthday_date'] == 0) {
			$row['mybirthday'] = '--';
		} else {
			$row['mybirthday'] = date('Y-m-d', $row['worker_birthday_date']);
		}
		$row['myjoin'] = '';
		if($row['worker_join'] == 0) {
			$row['myjoin'] = '--';
		} else {
			$row['myjoin'] = date('Y-m-d', $row['worker_join']);
		}
	}
	
	return $arr;
}
?>