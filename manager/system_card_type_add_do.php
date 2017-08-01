<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'system';
$strcard_type_name = api_value_post('card_type_name');
$strcard_type_discount = api_value_post('card_type_discount');
$deccard_type_discount = api_value_decimal($strcard_type_discount,2);
$strcard_type_info = api_value_post('card_type_info');


$intreturn = 0;
$atime = time();
if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('card_type') . "( card_type_name, card_type_discount, card_type_info , card_type_atime) VALUES ( '$strcard_type_name' , $deccard_type_discount, '$strcard_type_info' , $atime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

//var_dump($strsql);exit;

if($intreturn == 0) {
	echo '<script type="text/javascript">window.location="system_card_type.php";</script>';
} else if($intreturn == 1) {
	echo '<script type="text/javascript">alert("操作异常！"); history.back();</script>';
}


?>