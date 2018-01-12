<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['worker_module'] != 1) {
	return 1;
}

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strgroup = api_value_post('txtgroup');
$intgroup = api_value_int0($strgroup);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strcode = api_value_post('txtcode');
$sqlcode = $gdb->fun_escape($strcode);
$strsex = api_value_post('txtsex');
$intsex = api_value_int0($strsex);
$strphone = api_value_post('txtphone');
$sqlphone = $gdb->fun_escape($strphone);
$strbirthday = api_value_post('txtbirthday');
$stridentity = api_value_post('txtidentity');
$sqlidentity = $gdb->fun_escape($stridentity);
$streducation = api_value_post('txteducation');
$inteducation = api_value_int0($streducation);
$strjoin = api_value_post('txtjoin');
$strphoto = api_value_post('txtphoto');
$stridentity2 = api_value_post('txtidentity2');
$straddress = api_value_post('txtaddress');
$sqladdress = $gdb->fun_escape($straddress);
$strwage = api_value_post('txtwage');
$decwage = api_value_decimal($strwage, 2);

$intreturn = 0;

$arr = array();
if($intreturn = 0) {
	$strsql = "SELECT worker_group_id, worker_group_name FROM " . $gdb->fun_table2('worker_group') . " WHERE worker_group_id = " . $intgroup . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	if($strcode != '') {
		$strsql = "SELECT worker_id FROM " . $gdb->fun_table2('worker') . " WHERE worker_code = '" . $sqlcode . "' AND worker_id <> " . $intid . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	if($intsex != 1 && $intsex != 2) {
		$intsex = 1;
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

$intjoin = 0;
if($intreturn == 0) {
	if($strjoin != '') {
		$int = strtotime($strjoin);
		if($int > 0) {
			$intjoin = $int;
		}
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worker') . " SET worker_group_id=" . $intgroup . ", worker_code='" . $sqlcode . "', worker_name = '" . $sqlname
	. "', worker_sex = " . $intsex . ", worker_birthday_date=" . $intbirthday . ", worker_birthday_month = " . $intmonth . ", worker_birthday_day = " . $intday
	. ",worker_phone = '" . $sqlphone . "', worker_identity = '" . $sqlidentity . "', worker_education = " . $inteducation . ", worker_join = " . $intjoin
	. ",worker_address='" . $sqladdress . "', worker_wage = " . $decwage . " WHERE worker_id = " . $intid . " LIMIT 1";
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
				copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto),
				$GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['worker_photo'] . '/' . $intid . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto));
				$strsql = "UPDATE " . $gdb->fun_table2('worker') . " SET worker_photo_file = '" . ($intid . $str) . "' WHERE worker_id = " . $intid . " LIMIT 1";
				$gdb->fun_do($strsql);
			}
		}
	}
	if($stridentity2 != '') {
		$int = strrpos($stridentity2, '.');
		if($int != FALSE) {
			$str = substr($stridentity2, $int);
			if($str == '.jpg' || $str == '.gif' || $str == '.png') {
				copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($stridentity2),
				$GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['worker_identity'] . '/' . $intid . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($stridentity2));
				$strsql = "UPDATE " . $gdb->fun_table2('worker') . " SET worker_identity_file = '" . ($intid . $str) . "' WHERE worker_id = " . $intid . " LIMIT 1";
				$gdb->fun_do($strsql);
			}
		}
	}
}

echo $intreturn;
?>