<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strsearch = api_value_get('search');

$arr = array();
$strwhere = '';

$strwhere = $strwhere . " AND (card_code = '" . $GLOBALS['strsearch'] . "'";
$strwhere = $strwhere . " or card_name = '" . $GLOBALS['strsearch'] . "'";
$strwhere = $strwhere . " or card_phone = '" . $GLOBALS['strsearch'] . "')";

$strwhere .= " and card_state = 1";

$strsql = "SELECT shop_id,card_id,card_code,card_photo_file,card_carcode,card_name,card_phone,card_sex,card_birthday_date,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_yscore,card_memo FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1".$strwhere." ORDER BY card_id DESC";
// echo $strsql;
$hresult = $GLOBALS['gdb']->fun_query($strsql);

$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

foreach ($arr as &$v){
	$strsql = "SELECT shop_name FROM ".$GLOBALS['gdb']->fun_table('shop')." where shop_id = ".$v['shop_id']." limit 1";
	// echo $strsql;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$v['shop_name'] = $arr1['shop_name'];
	if($v['c_card_type_name'] == ''){
		$v['c_card_type_name'] = '--';
	}
	if($v['c_card_type_discount'] == 0){
		$v['c_card_type_discount'] = 10;
	}
	if($v['card_birthday_date'] != 0){
		$v['birthday'] = date('Y-m-d',$v['card_birthday_date']);
	}else{
		$v['birthday'] = '--';
	}
	if($v['card_edate'] != 0){
		$v['edate'] = date('Y-m-d',$v['card_edate']);
	}else{
		$v['edate'] = '--';
	}
	
}
echo json_encode($arr);
