<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strcatalog = api_value_post('txtcatalog');
$intcatalog = api_value_int0($strcatalog);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strjianpin = api_value_post('txtjianpin');
$sqljianpin = $gdb->fun_escape($strjianpin);
$strcode = api_value_post('txtcode');
$sqlcode = $gdb->fun_escape($strcode);
$strprice = api_value_post('txtprice');
$decprice = api_value_decimal($strprice, 2);
$strcprice = api_value_post('txtcprice');
$deccprice = api_value_decimal($strcprice, 2);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT sgoods_catalog_id FROM " . $gdb->fun_table2('sgoods_catalog') . " WHERE sgoods_catalog_id = " . $intcatalog . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 1;
	}
}

//编码唯一
if($intreturn == 0) {
	if($strcode != '') {
		$strsql = "SELECT mgoods_id FROM " . $gdb->fun_table2('mgoods') . " WHERE mgoods_code = '" . $sqlcode . "' LIMIT 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intreturn = 2;
		}
		if($intreturn == 0) {
			$strsql = "SELECT sgoods_id FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_code = '" . $sqlcode . "' AND sgoods_id <> " . $intid . " LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$intreturn = 2;
			}
		}
	}
}

$inttime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('sgoods') . " SET sgoods_catalog_id = " . $intcatalog . ", sgoods_name = '" . $sqlname . "', sgoods_jianpin = '" . $sqljianpin
	. "', sgoods_code = '" . $sqlcode . "', sgoods_price = " . $decprice . ", sgoods_cprice = " . $deccprice . ", sgoods_ctime = " . $inttime
	. " WHERE sgoods_id = " . $intid . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;
?>