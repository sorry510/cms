<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strworker_id = api_value_get('id');
$intworker_id = api_value_int0($strworker_id);

$strsql = "SELECT a.*, b.shop_name, c.worker_group_name FROM (SELECT shop_id, worker_id, worker_group_id, worker_name, worker_code, worker_sex, worker_birthday_date, worker_phone, worker_education, worker_join, worker_wage, worker_address,worker_identity,worker_identity_file,worker_photo_file FROM " . $GLOBALS['gdb']->fun_table2('worker') . " where worker_id=".$intworker_id." ) AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b on a.shop_id = b.shop_id LEFT JOIN " . $GLOBALS['gdb']->fun_table2('worker_group') . " AS c on a.worker_group_id = c.worker_group_id ";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
$arr['worker_birthday_date'] = $arr['worker_birthday_date']==0?'':date("Y-m-d",$arr['worker_birthday_date']);
$arr['worker_join'] = $arr['worker_join']==0?'':date("Y-m-d",$arr['worker_join']);
if($arr['worker_sex'] == '1'){
	$arr['worker_sex_name'] = '男';
}else if($arr['worker_sex'] == '2'){
	$arr['worker_sex_name'] = '女';
}else{
	$arr['worker_sex_name'] = '保密';
}

switch($arr['worker_education'])
{
	case '1':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][1];break;
	case '2':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][2];break;
	case '3':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][3];break;
	case '4':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][4];break;
	case '5':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][5];break;
	case '6':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][6];break;
	case '7':
		$arr['worker_education_name'] = $GLOBALS['gconfig']['education'][7];break;
	default:
		$arr['worker_education_name'] = '未知';
}

echo json_encode($arr);
