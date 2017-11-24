<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strwgoods_catalog_id = api_value_post('txtwgoods_catalog_id');
$intwgoods_catalog_id = api_value_int0($strwgoods_catalog_id);
$strwgoods_id = api_value_post('txtwgoods_id');
$intwgoods_id = api_value_int0($strwgoods_id);
$strwgoods_name = api_value_post('txtwgoods_name');
$sqlwgoods_name = $gdb->fun_escape($strwgoods_name);
$strwgoods_name2 = api_value_post('txtwgoods_name2');
$sqlwgoods_name2 = $gdb->fun_escape($strwgoods_name2);
$strwgoods_code = api_value_post('txtwgoods_code');
$sqlwgoods_code = $gdb->fun_escape($strwgoods_code);
$strwgoods_price = api_value_post('txtwgoods_price');
$decwgoods_price = api_value_decimal($strwgoods_price,2);
$strwgoods_cprice = api_value_post('txtwgoods_cprice');
$decwgoods_cprice = api_value_decimal($strwgoods_cprice,2);
$strwgoods_store = api_value_post('txtwgoods_store');
$intwgoods_store = api_value_int0($strwgoods_store);
$strwgoods_act = api_value_post('txtwgoods_act');
$intwgoods_act = api_value_int0($strwgoods_act);
$strwgoods_content = api_value_post('txtwgoods_content');
$sqlwgoods_content = $gdb->fun_escape($strwgoods_content);
$intatime = time();

$intreturn = 0;

if($decwgoods_price == 0 || $sqlwgoods_name=='' || $intwgoods_catalog_id == 0){
	$intreturn = 1;
}

//编码唯一
if($intreturn == 0){
	if($sqlwgoods_code != ''){
		$strsql = "SELECT wgoods_id FROM ".$gdb->fun_table2('wgoods'). " where wgoods_code='".$sqlwgoods_code."' and wgoods_id != ".$intwgoods_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('wgoods')." SET wgoods_catalog_id=".$intwgoods_catalog_id.",wgoods_name='".$sqlwgoods_name."',wgoods_name2 ='".$sqlwgoods_name2."',wgoods_code='".$sqlwgoods_code."',wgoods_price=".$decwgoods_price.", wgoods_cprice = ". $decwgoods_cprice ." , wgoods_store = ". $intwgoods_store ." , wgoods_act = ".$intwgoods_act ." , wgoods_content = '". $sqlwgoods_content ."' where wgoods_id=".$intwgoods_id;

	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

echo $intreturn;
?>