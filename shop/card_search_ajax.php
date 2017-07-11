<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strsearch = api_value_get('search');

$arr = array();

$strwhere = '';

if($GLOBALS['strsearch'] != '') {
	$strwhere = $strwhere . " AND (card_code = '" . $GLOBALS['strsearch'] . "'";
	$strwhere = $strwhere . " or card_name = '" . $GLOBALS['strsearch'] . "'";
	$strwhere = $strwhere . " or card_phone = '" . $GLOBALS['strsearch'] . "')";

	$strwhere .= " and card_state = 1 and shop_id=".$GLOBALS['_SESSION']['login_sid'];

	$strsql = "SELECT shop_id,card_id,card_code, card_name,card_phone,card_sex,card_birthday,card_atime,c_card_type_name,c_card_type_discount,card_edate,card_state,shop_id,s_card_smoney,s_card_ymoney,s_card_score FROM " . $GLOBALS['gdb']->fun_table2('card') . " where 1=1".$strwhere." ORDER BY card_id DESC LIMIT 1";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);

	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach ($arr as &$v){
		$strsql = "SELECT shop_name FROM ".$GLOBALS['gdb']->fun_table('shop')." where shop_id = ".$v['shop_id']." limit 1";
		// echo $strsql;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr1 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		$v['shop_name'] = $arr1['shop_name'];
		$v['birthday'] = date('Y-m-d',$v['card_birthday']);
		$v['edate'] = date('Y-m-d',$v['card_edate']);
	}
	echo json_encode($arr);
}