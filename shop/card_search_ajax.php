<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);

$arr = array();

if($sqlsearch == ''){
	echo json_encode($arr);
	return;
}

$strwhere = '';
$strwhere .= " AND (card_code = '" . $sqlsearch . "'";
$strwhere .= " or card_name = '" . $sqlsearch . "'";
$strwhere .= " or card_phone = '" . $sqlsearch . "')";
$strwhere .= " and card_state = 1";
$strwhere .= " and (card_edate = 0 or card_edate>=".time().")";

$strsql = "SELECT shop_id,card_id,card_code,card_photo_file,card_identity,card_name,card_phone,card_sex,card_birthday_date,worker_id,card_link,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_yscore,card_memo FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1 ".$strwhere." ORDER BY card_id DESC";
$hresult = $GLOBALS['gdb']->fun_query($strsql);

$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

foreach ($arr as &$row){
	$row['shop_name'] = '--';
	$strsql = "SELECT shop_name FROM ".$GLOBALS['gdb']->fun_table('shop')." where shop_id = ".$row['shop_id']." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr1)){
		$row['shop_name'] = $arr1['shop_name'];
	}
	if($row['worker_id'] != 0){
		$strsql = "SELECT worker_name FROM ".$GLOBALS['gdb']->fun_table2('worker')." where worker_id = ".$row['worker_id']." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr2)){
			$row['worker_name'] = $arr2['worker_name'];
		}
	}else{
		$row['worker_name'] = '无';
	}
	$row['type_name'] = $row['c_card_type_name'] != '' ? $row['c_card_type_name'] : '--';
	$row['type_discount'] = $row['c_card_type_discount'] != 0 ? $row['c_card_type_discount'] : 10;
	$row['birthday'] = $row['card_birthday_date'] != 0 ? date('Y-m-d', $row['card_birthday_date']) : '--';
	$row['age'] = $row['card_birthday_date'] != 0 ? date('Y', time()) - date('Y', $row['card_birthday_date']).'岁' : '保密';
	$row['edate'] = $row['card_edate'] != 0 ? date('Y-m-d', $row['card_edate']) : '--';
	$row['sex'] = $row['card_sex'] == 1 ? '男' : ($row['card_sex'] == 2 ? '女' : '保密');
}

echo json_encode($arr);
