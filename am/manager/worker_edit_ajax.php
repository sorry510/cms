<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$arr = array();
$strsql = "SELECT worker_id, worker_group_id, worker_code, worker_name, worker_sex, worker_birthday_date, worker_phone, worker_photo_file, worker_identity, worker_identity_file, "
. " worker_education, worker_join, worker_address, worker_wage FROM " . $GLOBALS['gdb']->fun_table2('worker') . " WHERE worker_id = " . $intid . " LIMIT 1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)) {
	$arr['mybirthday'] = '';
	if($arr['worker_birthday_date'] > 0) {
		$arr['mybirthday'] = date('Y-m-d', $arr['worker_birthday_date']);
	}
	$arr['myjoin'] = '';
	if($arr['worker_join'] > 0) {
		$arr['myjoin'] = date('Y-m-d', $arr['worker_join']);
	}
	$arr['worker_wage'] = $arr['worker_wage'] + 0;
}

echo json_encode($arr);
?>