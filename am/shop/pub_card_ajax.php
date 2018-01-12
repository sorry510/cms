<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$intreturn = 0;
if($intreturn == 0) {
	if($strkey == '') {
		$intreturn = 1;
	}
}

$inttime = time();
$arr = array();
if($intreturn == 0) {
	$strwhere = '';
	$strwhere .= " AND card_state = 1";
	$strwhere .= " AND (card_edate = 0 OR card_edate > " . $inttime . ")";
	$strwhere .= " AND (card_code = '" . $sqlkey . "'";
	$strwhere .= " OR card_phone = '" . $sqlkey . "')";
	$strsql = "SELECT card_id, shop_id, card_type_id, card_id, card_code, card_name, card_photo_file, card_phone, card_identity, card_carcode, card_sex, "
	. "card_birthday_date, card_link, worker_id, card_atime, c_card_type_name, c_card_type_discount, s_card_smoney, s_card_ymoney, s_card_sscore, s_card_yscore FROM "
	. $gdb->fun_table2('card') . " where 1 = 1" . $strwhere . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo json_encode($arr);
} else {
	$arr2 = array();
	echo json_encode($arr2);
}
?>