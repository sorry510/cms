<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['score_module'] != 1) {
	return 1;
}

$strcard = api_value_post('card');
$intcard = api_value_int0($strcard);
$arr1 = api_value_post('arr1');

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT card_id, card_code, card_name, card_phone, s_card_yscore FROM" . $gdb->fun_table2('card') . " WHERE card_id = " . $intcard . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

$arr2 = array();
if($intreturn == 0) {
	$strsql = "SELECT user_id, user_account, user_name FROM " . $gdb->fun_table2('user') . " WHERE user_id = " . api_value_int0($GLOBALS['_SESSION']['login_id']) . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr2 = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr2)) {
		$intreturn = 1;
	}
}

$intid = 0;
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('gift_record') . " (card_id, shop_id, gift_record_score, gift_record_atime, gift_record_ctime, "
	. "c_card_code, c_card_name, c_card_phone, c_card_yscore, c_user_account, c_user_name) VALUES (" . $arr['card_id'] . ", " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
	. ", 0, " . time() . ", 0, '" . $gdb->fun_escape($arr['card_code']) . "', '" . $gdb->fun_escape($arr['card_name']) . "', '" . $gdb->fun_escape($arr['card_phone']) . "', 0, '"
	. $gdb->fun_escape($arr2['user_account']) . "', '" . $gdb->fun_escape($arr2['user_name']) . "')";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	} else {
		$intid = $gdb->fun_insert_id();
	}
}

$intsscore = 0;
$arr3 = array();
if($intreturn == 0) {
	if(!empty($arr1)) {
		foreach ($arr1 as $row) {
			$giftid = api_value_int0($row['gift_id']);
			$giftcount = api_value_int0($row['gift_count']);

			$giftname = '';
			$giftscore = 0;
			$strsql = "SELECT gift_id, gift_name, gift_score FROM " . $GLOBALS['gdb']->fun_table2('gift') . " WHERE gift_id = " . $giftid . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr3 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr3)) {
				$giftname = $arr3['gift_name'];
				$giftscore = $arr3['gift_score'];
			}

			$strsql = "INSERT INTO " . $gdb->fun_table2('gift_record_goods') . " (gift_record_id, card_id, shop_id, gift_id, gift_count, c_gift_name, c_gift_score) VALUES ("
			. $intid . ", " . $arr['card_id'] . ", ". api_value_int0($GLOBALS['_SESSION']['login_sid']) . ", " . $giftid . " , ". $giftcount . ", '" . $gdb->fun_escape($giftname)
			. "', " . $giftscore . ")";
			$gdb->fun_do($strsql);
			
			$intsscore = $intsscore + $giftscore * $giftcount;
		}
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('gift_record') . " SET gift_record_score = " . $intsscore . ", c_card_yscore = " . ($arr['s_card_yscore'] - $intsscore)
	. " WHERE gift_record_id = " . $intid . " LIMIT 1";
	$gdb->fun_do($strsql);
	
	$strsql = "UPDATE " . $gdb->fun_table2('card') . " set s_card_yscore=" . ($arr['s_card_yscore'] - $intsscore) . " WHERE card_id = " . $intcard . " LIMIT 1";
	$gdb->fun_do($strsql);
}

echo $intreturn;
?>