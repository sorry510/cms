<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strprint_flag = api_value_post('print_flag');
$intprint_flag = api_value_int0($strprint_flag);
$strprint_title= api_value_post('print_title');
$sqlprint_title = $gdb->fun_escape($strprint_title);
$strprint_width = api_value_post('print_width');
$intprint_width = api_value_int0($strprint_width);
$strprint_memo= api_value_post('print_memo');
$sqlprint_memo = $gdb->fun_escape($strprint_memo);
$strprint_device= api_value_post('print_device');
$sqlprint_device = $gdb->fun_escape($strprint_device);

$intreturn = 0;

if($intreturn == 0){
	$arr = array(
		'print_flag' => $intprint_flag,
		'print_title' => $sqlprint_title,
		'print_width' => $intprint_width,
		'print_memo' => $sqlprint_memo,
		'print_device' => $sqlprint_device
	);
	$strjson_config = json_encode($arr);

	$strsql = "UPDATE " . $gdb->fun_table('shop') . " SET shop_config='" . $strjson_config . "' where shop_id= " . $GLOBALS['_SESSION']['login_sid'];
	$hresult = $gdb->fun_do($strsql);

	if(!$hresult){
		$intreturn = 1;
	}

}

echo $intreturn;