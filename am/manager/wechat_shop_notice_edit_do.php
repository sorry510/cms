<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strwnotice_title = api_value_post('txtwnotice_title');
$sqlwnotice_title = $gdb->fun_escape($strwnotice_title);
$strwnotice_id = api_value_post('txtwnotice_id');
$intwnotice_id = api_value_int0($strwnotice_id);
$strwnotice_content = api_value_post('txtwnotice_content');
$sqlwnotice_content = $gdb->fun_escape($strwnotice_content);

$intreturn = 0;
$ctime = time();

if($intreturn == 0) {
  $strsql = "UPDATE " . $gdb->fun_table2('wnotice') . "  SET wnotice_title = '".$sqlwnotice_title . "' , wnotice_content = '". $sqlwnotice_content ."' , wnotice_ctime = ".$ctime." WHERE wnotice_id = " . $intwnotice_id;
  $hresult = $gdb->fun_do($strsql);
  if($hresult == FALSE) {
	$intreturn = 2;
  }
}

echo $intreturn;
?>