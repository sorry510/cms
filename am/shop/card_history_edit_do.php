<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['history_module'] != 1) {
	return 1;
}

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
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
	$strsql = "SELECT card_history_id, card_history_photo1, card_history_photo2, card_history_photo3, card_history_photo4, card_history_photo5 FROM "
	. $gdb->fun_table2('card_history') . " WHERE card_history_id = " . $intid . " LIMIT 1";
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

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('card_history') . " SET worker_id = " . $arr2['worker_id'] . ", card_history_question = '" . $sqlquestion
	. "', card_history_result = '" . $sqlresult . "', card_history_plan = '" . $sqlplan . "', card_history_atime = " . $inttime
	. ", c_worker_name= '" . $gdb->fun_escape($arr2['worker_name']) . "' WHERE card_history_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
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
						$intkey2 = 0;
						if($arr['card_history_photo1'] == '') {
							$intkey2 = 1;
						} else if($arr['card_history_photo2'] == '') {
							$intkey2 = 2;
						} else if($arr['card_history_photo3'] == '') {
							$intkey2 = 3;
						} else if($arr['card_history_photo4'] == '') {
							$intkey2 = 4;
						} else if($arr['card_history_photo5'] == '') {
							$intkey2 = 5;
						}
						if($intkey2 > 0) {
							copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto),
							$GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_history'] . '/'
							. $intid . '_' . ($intkey2) . $str);
							unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto));
							$strsql = "UPDATE " . $gdb->fun_table2('card_history') . " SET card_history_photo" . ($intkey2) . " = '" . ($intid . '_' . ($intkey2) . $str)
							. "' WHERE card_history_id = " . $intid . " LIMIT 1";
							$gdb->fun_do($strsql);
							$arr['card_history_photo' . $intkey2] = $intid . '_' . ($intkey2) . $str;
						}
					}
				}
			}
		}
	}
}
echo $intreturn;
?>