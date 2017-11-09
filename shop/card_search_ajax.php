<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);

$arr = array();
$strwhere = '';
$strwhere .= " AND (card_code = '" . $sqlsearch . "'";
$strwhere .= " or card_name = '" . $sqlsearch . "'";
$strwhere .= " or card_phone = '" . $sqlsearch . "')";
$strwhere .= " and card_state = 1";

$strsql = "SELECT shop_id,card_id,card_code,card_photo_file,card_carcode,card_name,card_phone,card_sex,card_birthday_date,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_yscore,card_memo FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1 ".$strwhere." ORDER BY card_id DESC";
$hresult = $GLOBALS['gdb']->fun_query($strsql);

$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

// foreach ($arr as &$row){
// 	$strsql = "SELECT shop_name FROM ".$GLOBALS['gdb']->fun_table('shop')." where shop_id = ".$row['shop_id']." limit 1";
// 	$hresult = $GLOBALS['gdb']->fun_query($strsql);
// 	$arr1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// 	$row['shop_name'] = $arr1['shop_name'];
// 	if($row['c_card_type_name'] == ''){
// 		$row['c_card_type_name'] = '--';
// 	}
// 	if($row['c_card_type_discount'] == 0){
// 		$row['c_card_type_discount'] = 10;
// 	}
// 	if($row['card_birthday_date'] != 0){
// 		$row['birthday'] = date('Y-m-d', $row['card_birthday_date']);
// 	}else{
// 		$row['birthday'] = '--';
// 	}
// 	if($row['card_edate'] != 0){
// 		$row['edate'] = date('Y-m-d', $row['card_edate']);
// 	}else{
// 		$row['edate'] = '--';
// 	}
// }

echo json_encode($arr);
