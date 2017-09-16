<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);

$arr = array();
$strwhere = '';
$strwhere .= " and (c_card_code='".$sqlsearch."' or c_card_name='".$sqlsearch."' or c_card_phone='".$sqlsearch."')";
$strsql = "SELECT card_record_id,card_id,card_record_code,c_card_type_name,c_card_code,c_card_name,c_card_phone,c_card_sex,card_record_atime FROM".$gdb->fun_table2('card_record')." where card_record_type=3 and card_id!=0 ".$strwhere;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_all($hresult);

foreach($arr as &$row){
	$row['sex'] = $row['c_card_sex'] == 1 ? '男':($row['c_card_sex'] == 2 ? '女' : '保密');
	$row['date'] = date('Y-m-d H:i:s', $row['card_record_atime']);
}

echo json_encode($arr);
