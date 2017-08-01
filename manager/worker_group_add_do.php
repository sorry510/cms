<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'worker';

$strworker_group_name = api_value_post('worker_group_name');

$intreturn = 0;
$atime = time();
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('worker_group') . "( worker_group_name ,worker_group_atime)VALUES ('".$strworker_group_name."',".$atime.")";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	echo '<script type="text/javascript">window.location="worker_group.php";</script>';
} else if($intreturn == 1) {
	echo '<script type="text/javascript">alert("操作异常！"); history.back();</script>';
}
?>