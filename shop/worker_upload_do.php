<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);
$strworker_photo_name = api_value_post('worker_photo_name');
$sqlworker_photo_name = $gdb->fun_escape($strworker_photo_name);
$straddress = api_value_post('address');
$sqladdress = $gdb->fun_escape($straddress);


if($sqladdress == 'worker_photo_file'){
	$photo_name = $GLOBALS['_SESSION']['login_sid'].'-'.$intworker_id.'-1';
}else if($sqladdress == 'worker_identity_file'){
	$photo_name = $GLOBALS['_SESSION']['login_sid'].'-'.$intworker_id.'-2';
}else{
	$photo_name = '0-'.$worker_id.'-2';
}
// echo $photo_name;
$intreturn = 0;
$strext = strtolower(strrchr($_FILES[$sqlworker_photo_name]['name'], '.'));
$intlength = $_FILES[$sqlworker_photo_name]['size'];
if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
	if($intlength < 1024000) {
		$hresult = move_uploaded_file($_FILES[$sqlworker_photo_name]['tmp_name'], $gconfig['path']['worker_photo'] . '/'. $photo_name . $strext);
		if($hresult) {
			$strsql = "UPDATE " . $gdb->fun_table2('worker') . " SET ".$sqladdress." = '".$photo_name.$strext."' WHERE worker_id = " . $intworker_id . " LIMIT 1";
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

