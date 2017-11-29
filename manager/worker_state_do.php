<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtype = api_value_post('type');
$sqltype = $gdb->fun_escape($strtype);
$strid = api_value_post('id');
$intid = api_value_int0($strid);

$intreturn = 0;

$arr = array();
$strsql = "SELECT worker_id FROM " . $gdb->fun_table2('worker') . " where worker_id=".$intid;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
if(empty($arr)){
	$intreturn = 1;
}
if($intreturn == 0){
	if($sqltype == "restore"){
		$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('worker') . "SET worker_state=1 where worker_id = ".$intid." limit 1";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 2;
		}
	}else if($sqltype == "lizhi"){
		$strsql = "UPDATE" . $GLOBALS['gdb']->fun_table2('worker') . "SET worker_state=2 where worker_id = ".$intid." limit 1";
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 2;
		}
	}
}

echo $intreturn;
?>