<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strworker_id = api_value_get('worker_id');
$intworker_id = api_value_int0($strworker_id);

$intreturn = 0;
if($intreturn == 0) {
	$arr = array();
	$strsql = "SELECT a.*, b.shop_name, c.worker_group_name FROM (SELECT shop_id, worker_id, worker_group_id, worker_name, worker_code, worker_sex, worker_birthday, worker_phone, worker_education, worker_join, worker_wage, worker_config_guide, worker_identity,worker_address, worker_config_reserve FROM " . $GLOBALS['gdb']->fun_table2('worker') . " WHERE worker_id = ". $intworker_id ." LIMIT 1) AS a ," . $GLOBALS['gdb']->fun_table('shop') . " AS b," . $GLOBALS['gdb']->fun_table2('worker_group') . " AS c WHERE a.shop_id = b.shop_id AND a.worker_group_id = c.worker_group_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	
	if($arr['worker_sex'] == 1){
		$arr['worker_sex1'] = '男';
	}else if($arr['worker_sex'] == 2){
		$arr['worker_sex1'] = '女';
	}else if($arr['worker_sex'] == 3){
		$arr['worker_sex1'] = '保密';
	}
	$arr['worker_birthday1'] = date("Y年m月d日",$arr['worker_birthday']);
	if($arr['worker_education'] == 1){
		$arr['worker_education1'] = '高中';
	}else if($arr['worker_education'] == 2){
		$arr['worker_education1'] = '本科';
	}else if($arr['worker_education'] == 3){
		$arr['worker_education1'] = '研究生';
	}
	$arr['worker_join1'] = date("Y年m月d日",$arr['worker_join']);
	if($arr['worker_config_reserve'] == 1){
		$arr['worker_config_reserve1'] = '参与';
	}else if($arr['worker_config_reserve'] == 2){
		$arr['worker_reserve1'] = '不参与';
	}
	if($arr['worker_config_guide'] == 1){
		$arr['worker_config_guide1'] = '参与';
	}else if($arr['worker_config_guide'] == 2){
		$arr['worker_config_guide1'] = '不参与';
	}
	echo json_encode($arr);
}


?>