<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_post('card_id');
$intcard_id = $gdb->fun_escape($strcard_id);

$intreturn = 0;
$ctime = time();

if($intreturn == 0) {
  $strsql = " UPDATE " . $gdb->fun_table2('card') . "  SET card_fenxiao = 2 , card_fenxiao2 = 2 , card_ftime = 0 , s_card_reward = 0 WHERE card_id = " . $intcard_id;
  //echo $strsql;exit();
  $hresult = $gdb->fun_do($strsql);
  if($hresult == FALSE) {
		$intreturn = 1;
  }
}

echo $intreturn;
?>