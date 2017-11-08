<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtxtname = api_value_post('txtname');
$sqltxtname = $gdb->fun_escape($strtxtname);

$intreturn = 0;
$intatime = time();

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('worker_group') . "(worker_group_name ,worker_group_atime) VALUES ('".$sqltxtname."',".$intatime.")";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;