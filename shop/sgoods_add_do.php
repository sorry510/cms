<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'goods';

$strsgoods_catalog_id = api_value_post('txtsgoods_catalog_id');
$intsgoods_catalog_id = api_value_int0($strsgoods_catalog_id);
$strsgoods_name = api_value_post('txtsgoods_name');
$sqlsgoods_name = $gdb->fun_escape($strsgoods_name);
$strsgoods_jianpin = api_value_post('txtjianpin');
$sqlsgoods_jianpin = $gdb->fun_escape($strsgoods_jianpin);
$strsgoods_code = api_value_post('txtsgoods_code');
$sqlsgoods_code = $gdb->fun_escape($strsgoods_code);
$strsgoods_price = api_value_post('txtsgoods_price');
$decsgoods_price = api_value_decimal($strsgoods_price,2);
$strsgoods_cprice = api_value_post('txtsgoods_cprice');
$decsgoods_cprice = api_value_decimal($strsgoods_cprice,2);
$strsgoods_type = api_value_post('txtsgoods_type');
$intsgoods_type = api_value_int0($strsgoods_type);

$intreturn = 0;
$intatime = time();

if($decsgoods_price == 0 || $sqlsgoods_name=='' || $intsgoods_catalog_id == 0){
	$intreturn = 1;
}
//编码唯一
if($intreturn == 0){
	if($sqlsgoods_code != ''){
		$strsql = "SELECT sgoods_id FROM ".$gdb->fun_table2('sgoods'). " where sgoods_code='".$sqlsgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}
// 和sgoods编码唯一
if($intreturn == 0){
	if($sqlsgoods_code != ''){
		$strsql = "SELECT sgoods_id FROM ".$gdb->fun_table2('sgoods'). " where sgoods_code='".$sqlsgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('sgoods') . "( sgoods_catalog_id, sgoods_name, sgoods_jianpin, sgoods_code, sgoods_price, sgoods_cprice, sgoods_type, sgoods_state,sgoods_atime) VALUES ( $intsgoods_catalog_id  , '$sqlsgoods_name', '$sqlsgoods_jianpin', '$sqlsgoods_code', $decsgoods_price, $decsgoods_cprice, $intsgoods_type,1,$intatime)";
	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$intsgoods_id = mysql_insert_id();
	}
}

// 实物型商品添加一条库存信息到各个店铺中
if($intreturn == 0){
	if($intsgoods_type==2){
		$strsql = "INSERT INTO ".$gdb->fun_table2('store_info')."(sgoods_id,shop_id,store_info_count,store_info_atime) VALUES (".$intsgoods_id.",".api_value_int0($GLOBALS['_SESSION']['login_sid']).",0,".$intatime.")";
		$hresult = $gdb->fun_do($strsql);
		if($hresult === FALSE) {
			$intreturn = 4;
		}
	}
}
echo $intreturn;
?>