<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strworder_id = api_value_post('worder_id');
$intworder_id = api_value_int0($strworder_id);

$intreturn = 0;
$ctime = time();

if(empty($intworder_id)){
	$intreturn = 1;
}

if ($intreturn == 0) {
	$strsql = "SELECT worder_state FROM ". $gdb->fun_table2('worder') ." WHERE worder_id = ".$intworder_id ." LIMIT 1";
	//echo $strsql;exit();
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
	if ($arr['worder_state'] != 1) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worder') . " SET worder_ctime = ".$ctime.", worder_state = 3 WHERE worder_id = " . $intworder_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 4;
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('worder_goods') . " SET worder_goods_state = 3 , worder_goods_ctime = ".$ctime." WHERE worder_id = " . $intworder_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 5;
	}
}

if($intreturn == 0) {

	$strsql = "SELECT wgoods_id,worder_goods_count FROM ". $gdb->fun_table2('worder_goods') ." WHERE worder_id = ".$intworder_id;
	$hresult = $gdb->fun_do($strsql);
	$arr = $gdb->fun_fetch_all($hresult);
	if($hresult == FALSE) {
		$intreturn = 6;
	}
}

if ($intreturn ==0 ) {
	if (!empty($arr)) {
		foreach ($arr as $key => $row) {
			$strsql = "UPDATE " . $gdb->fun_table2('wgoods') . " SET wgoods_store = wgoods_store - " . $row['worder_goods_count'] . " WHERE wgoods_id = " . $row['wgoods_id'] . " LIMIT 1" ;
			@$hresult = $gdb->fun_do($strsql);
		}
	}
}

echo $intreturn;
?>