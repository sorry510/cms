<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['history_module'] != 1) {
	return 1;
}

$strcard = api_value_post('txtcard');
$intcard = api_value_int0($strcard);
$strquestion = api_value_post('txtquestion');
$sqlquestion = $gdb->fun_escape($strquestion);
$strresult = api_value_post('txtresult');
$sqlresult = $gdb->fun_escape($strresult);
$strplan = api_value_post('txtplan');
$sqlplan = $gdb->fun_escape($strplan);
$strworker = api_value_post('txtworker');
$intworker = api_value_int0($strworker);
$strtime = api_value_post('txttime');
$arrphoto = api_value_post('photo');

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT card_id, card_type_id, card_code, card_name, card_phone, card_sex, card_birthday_date, c_card_type_name FROM " . $gdb->fun_table2('card')
	. " WHERE card_id = " . $intcard . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

$arr2 = array();
if($intreturn == 0) {
	$strsql = "SELECT worker_id, worker_name FROM " . $gdb->fun_table2('worker') . " WHERE worker_id = " . $intworker . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr2 = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr2)) {
		$intreturn = 1;
	}
}

$inttime = 0;
if($intreturn == 0) {
	if($strtime != '') {
		$int = strtotime($strtime);
		if($int > 0) {
			$inttime = $int;
		}
	}
	if($inttime == 0) {
		$intreturn = 1;
	}
}

$intid = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('card_history') . " (card_id, worker_id, shop_id, card_history_question, card_history_result, card_history_plan, card_history_atime, "
	. "c_card_type_id, c_card_type_name, c_card_code, c_card_name, c_card_phone, c_card_sex, c_card_age, c_worker_name) VALUES (" . $arr['card_id'] . ", " . $intworker
	. ", " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . ", '" . $sqlquestion . "', '" . $sqlresult . "', '" . $sqlplan."' , " . $inttime . ", " . $arr['card_type_id']
	. ", '" . $gdb->fun_escape($arr['c_card_type_name']) . "', '" . $gdb->fun_escape($arr['card_code']) . "', '" . $gdb->fun_escape($arr['card_name'])
	. "', '" . $gdb->fun_escape($arr['card_phone']) . "', " . $arr['card_sex'] . ", " . api_value_int0(($inttime - $arr['card_birthday_date']) / 86400)
	. ", '" . $gdb->fun_escape($arr2['worker_name']) . "')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	} else {
		$intid = $gdb->fun_insert_id();
	}
}

if($intreturn == 0) {
	if($arrphoto != '') {
		foreach($arrphoto as $intkey => $strphoto) {
			if($strphoto != '' && $intkey < 5) {
				$int = strrpos($strphoto, '.');
				if($int != FALSE) {
					$str = substr($strphoto, $int);
					if($str == '.jpg' || $str == '.gif' || $str == '.png') {
						copy($GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '\\temp\\' . basename($strphoto),
						$GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_history'] . '\\'
						. $intid . '_' . ($intkey + 1) . $str);
						unlink($GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '\\temp\\' . basename($strphoto));
						$strsql = "UPDATE " . $gdb->fun_table2('card_history') . " SET card_history_photo" . ($intkey + 1) . " = '" . ($intid . '_' . ($intkey + 1) . $str)
						. "' WHERE card_history_id = " . $intid . " LIMIT 1";
						$gdb->fun_do("update cf_test set myvalue = '" . $gdb->fun_escape($strsql) . "'");
						$gdb->fun_do($strsql);
					}
				}
			}
		}
	}
}

echo $intreturn;
?>