<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_type_name = api_value_post('card_type_name');
$strcard_type_discount = api_value_post('card_type_discount');
$intcard_type_discount = api_value_int0($strcard_type_discount);
$strcard_type_info = api_value_post('card_type_info');
$strcard_type_id = api_value_post('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);


$intreturn = 0;
$ctime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('card_type') . " SET card_type_name = '". $strcard_type_name ."' , card_type_discount = ".$intcard_type_discount.", card_type_info = '".$strcard_type_info."',card_type_ctime = ".$ctime." WHERE card_type_id = " . $intcard_type_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}


if($intreturn == 0) {
	echo '<script type="text/javascript">window.location="system_card_type.php";</script>';
} else if($intreturn == 1) {
	echo '<script type="text/javascript">alert("操作异常！"); history.back();</script>';
}

?>