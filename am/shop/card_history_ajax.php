<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$arr = array();
if($strkey == '') {
	echo json_encode($arr);
	return;
}

$strwhere = '';
$strwhere .= " AND (card_code = '" . $sqlkey . "'";
$strwhere .= " OR card_phone = '" . $sqlkey . "')";
$strwhere .= " AND card_state = 1";

$strsql = "SELECT card_id, card_code, card_name, card_phone, card_sex, card_birthday_date, c_card_type_name FROM " . $GLOBALS['gdb']->fun_table2('card')
. " WHERE 1 = 1" . $strwhere . " LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)) {
	$arr['mysex'] = '';
	if($arr['card_sex'] == 1) {
		$arr['mysex'] = '男';
	} else if($arr['card_sex'] == 2) {
		$arr['mysex'] = '女';
	} else if($arr['card_sex'] == 3) {
		$arr['mysex'] = '保密';
	}
	$arr['myage'] = '';
	if($arr['card_birthday_date'] > 0) {
		$arr['myage'] = api_value_int0((time() - $arr['card_birthday_date']) / 86400);
	} else {
		$arr['myage'] = '保密';
	}
}
echo json_encode($arr);
?>