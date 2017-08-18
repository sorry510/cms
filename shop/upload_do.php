<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);

$strcard_photo = '';
$intnow = time();

$intreturn = 0;
$strext = strtolower(strrchr($_FILES['card_photo']['name'], '.'));
$intlength = $_FILES['card_photo']['size'];
if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
	if($intlength < 1024000) {
		$hresult = move_uploaded_file($_FILES['card_photo']['tmp_name'], $gconfig['path']['photo'] . '/'. $intnow . $strext);
		if($hresult) {
			$strsql = "UPDATE " . $gdb->fun_table2('card') . " SET card_photo_file = '".$intnow.$strext."' WHERE card_id = " . $intcard_id . " LIMIT 1";
			// echo $strsql;
			$hresult = $gdb->fun_do($strsql);
			if(!$hresult) {
				$intreturn = 1;
			}
		}else{
			$intreturn = 2;
		}
	}else{
		$intreturn = 3;
	}
}else{
	$intreturn = 4;
}
echo $intreturn;

