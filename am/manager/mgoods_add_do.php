<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

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
$strtype = api_value_post('txttype');
$inttype = api_value_int0($strtype);
$stract = api_value_post('txtact');
$intact = api_value_int0($stract);
$strreserve = api_value_post('txtreserve');
$intreserve = api_value_int0($strreserve);

$intreturn = 0;

$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT mgoods_catalog_id FROM " . $gdb->fun_table2('mgoods_catalog') . " WHERE mgoods_catalog_id = " . $intcatalog . " LIMIT 1";
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
			$strsql = "SELECT sgoods_id FROM " . $gdb->fun_table2('sgoods') . " WHERE sgoods_code = '" . $sqlcode . "' LIMIT 1";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arr)) {
				$intreturn = 2;
			}
		}
	}
}

if($intreturn == 0) {
	if($inttype != 1 && $inttype != 2) {
		$inttype = 2;
	}
	if($intact != 1 && $intact != 2) {
		$intact = 2;
	}
	if($intreserve != 1 && $intreserve != 2) {
		$intreserve = 2;
	}
}

$inttime = time();
$strid = '';
if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('mgoods')
	. " (mgoods_catalog_id, mgoods_type, mgoods_name, mgoods_jianpin, mgoods_code, mgoods_price, mgoods_cprice, mgoods_act,mgoods_reserve, mgoods_state, mgoods_atime, mgoods_ctime) "
	. "VALUES (" . $intcatalog . ", " . $inttype . ", '" . $sqlname . "', '" . $sqljianpin . "', '" . $sqlcode . "', " . $decprice . ", " .  $deccprice . ", " .  $intact . ", "
	.  $intreserve . ", 1, " .  $inttime . ", 0)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
	if($intreturn == 0) {
		$strid = mysql_insert_id();
	}
}

// 实物型商品添加一条库存信息到各个店铺中
if($intreturn == 0){
	if($inttype == 2) {
		$strsql = "SELECT shop_id FROM ". $gdb->fun_table('shop') . " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " ORDER BY shop_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		foreach($arr as $row) {
			$strsql = "INSERT INTO " . $gdb->fun_table2('store_info') . "(mgoods_id, sgoods_id, shop_id, store_info_count, store_info_atime, store_info_ctime) VALUES ("
			. $strid . ", 0, " . $row['shop_id'] . ", 0, " . $inttime . ", 0)";
			$gdb->fun_do($strsql);
		}
	}
}

echo $intreturn;
?>