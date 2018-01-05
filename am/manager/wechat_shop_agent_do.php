<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_post('card_id');
$intcard_id = $gdb->fun_escape($strcard_id);
$strtype = api_value_post('type');
$inttype = api_value_int0($strtype);

$intreturn = 0;

if($intreturn == 0) {
	if ($inttype == 1) {
		$strsql = "UPDATE " . $gdb->fun_table2('card') . "  SET card_fenxiao = 1 , card_fenxiao2 = 3, card_ftime = ".time()." WHERE card_id = " . $intcard_id;

	}elseif ($inttype == 2) {
		$strsql = "UPDATE " . $gdb->fun_table2('card') . "  SET card_fenxiao = 2 , card_fenxiao2 = 4 WHERE card_id = " . $intcard_id;
	}
  //echo $strsql;exit();
  $hresult = $gdb->fun_do($strsql);
  if($hresult == FALSE) {
		$intreturn = 1;
  }
}

echo $intreturn;
?>