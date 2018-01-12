<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

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
		$strsql = "SELECT card_id FROM " . $gdb->fun_table2('card') . " WHERE card_code = '" . $sqlcode . "' LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	if($strcode != '') {
		$strsql = "SELECT card_id FROM " . $gdb->fun_table2('card') . " WHERE card_phone = '" . $sqlphone . "' LIMIT 1";
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
//默认会员卡类型为1
$strcard_type_name = '';
$intcard_type_discount = 10;
if($intreturn == 0) {
	$strsql = "SELECT card_type_name, card_type_discount FROM " . $gdb->fun_table2('card_type') . " WHERE card_type_id = 1 LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$strcard_type_name = $arr['card_type_name'];
		$intcard_type_discount = $arr['card_type_discount'];
	}
}

$inttime = time();
$intid = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (card_type_id, shop_id, card_okey, card_ikey, card_code, card_password, card_password_state, card_name, "
	. "card_photo_file, card_phone, card_identity, card_carcode, card_sex, card_birthday_date, card_birthday_month, card_birthday_day, card_link, card_memo, "
	. "worker_id, card_fenxiao, card_fenxiao2, card_state, card_atime, card_ctime, card_ftime, card_ltime, 	c_card_type_name, c_card_type_discount) VALUES (1, " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
	. ", '', '" . $sqlikey . "', '" . $sqlcode . "', '" . $sqlpassword . "', '" . $intpassswordstate . "', '" . $sqlname . "', '', '" . $sqlphone . "', '" . $sqlidentity
	. "', '', " . $intsex . ", " . $intbirthday . ", " . $intmonth . ", " . $intday . ", '" . $sqllink . "', '" . $sqlmemo . "', " . $intworker . ", 0, 0, 1, " . $inttime
	. ", 0, 0, 0, '" . $strcard_type_name . "', " . $intcard_type_discount . ")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	} else {
		$intid = $gdb->fun_insert_id();
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

// 开卡提成
$arr2 = array();
if($intreturn == 0) {
	if($gtrade['worker_module'] == 1 && $gtrade['worker_flag'] == 1) {
		if($intworker > 0) {
			$strsql = "SELECT a.*, b.worker_group_name FROM (SELECT worker_id, worker_group_id, worker_code, worker_name FROM " . $gdb->fun_table2('worker')
			. " WHERE worker_id = " . $intworker . ") AS a LEFT JOIN " . $gdb->fun_table2('worker_group') . " AS b ON a.worker_group_id = b.worker_group_id LIMIT 1";
			$hresult = $gdb->fun_query($strsql);
			$arr = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$strsql = "SELECT group_reward_id, group_reward_create FROM " . $gdb->fun_table2('group_reward')
				. " WHERE worker_group_id = " . $arr['worker_group_id'] . " AND shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " LIMIT 1";
				$hresult = $gdb->fun_query($strsql);
				$arr2 = $gdb->fun_fetch_assoc($hresult);
				if(!empty($arr2)) {
					if($arr2['group_reward_create'] > 0) {
						$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') . " (worker_id, shop_id, worker_reward_type, worker_reward_money, worker_reward_state, "
						. "worker_reward_atime, c_worker_group_id, c_worker_group_name, c_worker_code, c_worker_name, c_card_id, c_card_code, c_card_name, c_card_phone) VALUES ("
						. $intworker . ", " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . ", 1, " . $arr2['group_reward_create'] . ", 1, " . $inttime . ", "
						. $arr['worker_group_id'] . ", '" . $gdb->fun_escape($arr['worker_group_name']) . "', '" . $gdb->fun_escape($arr['worker_code']) . "', '"
						. $gdb->fun_escape($arr['worker_name']) . "', " . $intid . ", '" . $sqlcode . "', '" . $sqlname . "', '" . $sqlphone . "')";
						$gdb->fun_do("UPDATE cf_test SET myvalue = '" . $gdb->fun_escape($strsql) . "'");
						$gdb->fun_do($strsql);
					}
				}
			}
		}
	}
}

echo $intreturn;
?>