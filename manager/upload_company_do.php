<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intnow = time();

$intreturn = 0;
$strext = strtolower(strrchr($_FILES['photo']['name'], '.'));
$intlength = $_FILES['photo']['size'];
if($strext == '.jpg' || $strext == '.gif') {
	if($intlength < 1024000) {
		$hresult = move_uploaded_file($_FILES['photo']['tmp_name'], $gconfig['path']['photo'] . '/'. $intnow . $strext);
		if($hresult) {
			$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_identity_photo = '".$intnow.$strext."' WHERE company_id = " . $intid . " LIMIT 1";
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

