<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strcode = api_value_post('txtcode');
$sqlcode = $gdb->fun_escape($strcode);
$strikey = api_value_post('txtikey');
$sqlikey = $gdb->fun_escape($strikey);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strsex = api_value_post('txtsex');
$intsex = api_value_int0($strsex);
$strphone = api_value_post('txtphone');
$sqlphone = $gdb->fun_escape($strphone);
$strbirthday = api_value_post('txtbirthday');
$strpassswordstate = api_value_post('txtpasswordstate');
$intpassswordstate = api_value_int0($strpassswordstate);
$strpassword = api_value_post('txtpassword');
$sqlpassword = $gdb->fun_escape($strpassword);
$strlink = api_value_post('txtlink');
$sqllink = $gdb->fun_escape($strlink);
$stridentity = api_value_post('txtidentity');
$sqlidentity = $gdb->fun_escape($stridentity);
$strworker = api_value_post('txtworker');
$intworker = api_value_int0($strworker);
$strmemo = api_value_post('txtmemo');
$sqlmemo = $gdb->fun_escape($strmemo);
$strphoto = api_value_post('txtphoto');

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	if($strcode != '') {
		$strsql = "SELECT card_id FROM " . $gdb->fun_table2('card') . " WHERE card_code = '" . $sqlcode . "' AND card_id <> " . $intid . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	if($strcode != '') {
		$strsql = "SELECT card_id FROM " . $gdb->fun_table2('card') . " WHERE card_phone = '" . $sqlphone . "' AND card_id <> " . $intid . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intreturn = 3;
		}
	}
}

$intbirthday = 0;
$intmonth = 0;
$intday = 0;
if($intreturn == 0) {
	if($strbirthday != '') {
		$int = strtotime($strbirthday);
		if($int > 0) {
			$intbirthday = $int;
			$intmonth = date('n', $intbirthday);
			$intday = date('j', $intbirthday);
		}
	}
}

if($intreturn == 0) {
	if($intpassswordstate != 1 && $intpassswordstate != 2) {
		$intreturn = 1;
	} else if($intpassswordstate == 1) {
		if($strpassword == '') {
			$intreturn = 4;
		}
	} else if($intpassswordstate == 2) {
		$sqlpassword = '';
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('card') . " SET card_ikey = '" . $sqlikey . "', card_code = '" . $sqlcode . "', card_password = '" . $sqlpassword
	. "', card_password_state = " . $intpassswordstate . ", card_name = '" . $sqlname . "', card_phone = '" . $sqlphone . "', card_identity = '" . $sqlidentity
	. "', card_sex = " . $intsex . ", card_birthday_date = " . $intbirthday . ", card_birthday_month = " . $intmonth . ", card_birthday_day = " . $intday
	. ", card_link = '" . $sqllink . "', card_memo = '" . $sqlmemo . "', card_ctime = " . $inttime . " WHERE card_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	if($strphoto != '') {
		$int = strrpos($strphoto, '.');
		if($int != FALSE) {
			$str = substr($strphoto, $int);
			if($str == '.jpg' || $str == '.gif' || $str == '.png') {
				copy($GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '\\temp\\' . basename($strphoto),
				$GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_photo'] . '\\' . $intid . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '\\' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '\\temp\\' . basename($strphoto));
				$strsql = "UPDATE " . $gdb->fun_table2('card') . " SET card_photo_file = '" . ($intid . $str) . "' WHERE card_id = " . $intid . " LIMIT 1";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>