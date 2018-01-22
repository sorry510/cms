<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

if(laimi_config_trade()['wmp_module'] != 1){
	echo '<script> window.history.back();</script>';
	return;
}

$strtype = api_value_post('type');
$inttype = api_value_int0($strtype);
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strphone = api_value_post('phone');
$sqlphone = $gdb->fun_escape($strphone);
$straddress = api_value_post('address');
$sqladdress = $gdb->fun_escape($straddress);

$intreturn = 0;

if ($intreturn == 0) {
	if (empty($sqlname) || empty($sqlphone) || empty($sqladdress)) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	$strsql = "SELECT waddress_id FROM " . $gdb->fun_table2('waddress') . " WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id']);

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if($arr == FALSE) {
		$strsql = "INSERT INTO " . $gdb->fun_table2('waddress') . " (waddress_name, waddress_phone, waddress_detail, waddress_state,card_id) VALUES ('". $sqlname . "', '" . $sqlphone . "', '". $sqladdress ."' , 2 ,".api_value_int0($GLOBALS['_SESSION']['login_id'])." )";

		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 3;
		}
	}else{
		$strsql = "INSERT INTO " . $gdb->fun_table2('waddress') . " (waddress_name, waddress_phone, waddress_detail, waddress_state,card_id) VALUES ('". $sqlname . "', '" . $sqlphone . "', '". $sqladdress ."' , 1 ,".api_value_int0($GLOBALS['_SESSION']['login_id'])." )";

		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 3;
		}
	}
}

if ($intreturn == 0) {
	if ($inttype == 1) {
		echo "<script>window.location.href='address.php'</script>";
	}else if($inttype == 2){
		echo "<script>window.location.href='center_shop_address.php'</script>";
	}
}else{
	echo "<script>alert('新增地址失败');window.location.href='center_shop_address.php'</script>";
}

?>