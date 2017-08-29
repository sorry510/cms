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

$intnow = time().rand(1,5000)*rand(1,5000);//多次执行可能时间相同导致图片被覆盖

// echo $intnow;
$intreturn = 0;
$strext = strtolower(strrchr($_FILES[$sqlworker_photo_name]['name'], '.'));
$intlength = $_FILES[$sqlworker_photo_name]['size'];
if($strext == '.jpg' || $strext == '.gif') {
	if($intlength < 1024000) {
		$hresult = move_uploaded_file($_FILES[$sqlworker_photo_name]['tmp_name'], $gconfig['path']['photo'] . '/'. $intnow . $strext);
		if($hresult) {
			$strsql = "UPDATE " . $gdb->fun_table2('worker') . " SET ".$sqladdress." = '".$intnow.$strext."' WHERE worker_id = " . $intworker_id . " LIMIT 1";
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

