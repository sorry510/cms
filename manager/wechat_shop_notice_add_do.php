<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strwnotice_title = api_value_post('txtwnotice_title');
$sqlwnotice_title = $gdb->fun_escape($strwnotice_title);
$strwnotice_content = api_value_post('txtwnotice_content');
$sqlwnotice_content = $gdb->fun_escape($strwnotice_content);

$intreturn = 0;
$atime = time();

if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('wnotice') . "( wnotice_title, wnotice_content, wnotice_atime ) VALUES ( '$sqlwnotice_title', '$sqlwnotice_content' , $atime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
?>