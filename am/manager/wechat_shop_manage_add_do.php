<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strwgoods_catalog_id = api_value_post('txtwgoods_catalog_id');
$intwgoods_catalog_id = api_value_int0($strwgoods_catalog_id);
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
$strwgoods_commend = api_value_post('txtwgoods_commend');
$intwgoods_commend = api_value_int0($strwgoods_commend);
$strwgoods_content = api_value_post('txtwgoods_content');
$sqlwgoods_content = $gdb->fun_escape($strwgoods_content);
$arrphoto = api_value_post('photo');
$intatime = time();

$intreturn = 0;

if($decwgoods_price == 0 || $sqlwgoods_name=='' || $intwgoods_catalog_id == 0){
	$intreturn = 1;
}
//编码唯一
if($intreturn == 0){
	if($sqlwgoods_code != ''){
		$strsql = "SELECT wgoods_id FROM ".$gdb->fun_table2('wgoods'). " where wgoods_code='".$sqlwgoods_code."'";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "INSERT INTO " . $gdb->fun_table2('wgoods') . "( wgoods_catalog_id, wgoods_name,wgoods_name2, wgoods_code, wgoods_price, wgoods_cprice, wgoods_store ,wgoods_type, wgoods_act, wgoods_commend, wgoods_content , wgoods_state,wgoods_atime) VALUES ( $intwgoods_catalog_id  , '$sqlwgoods_name','$sqlwgoods_name2' ,'$sqlwgoods_code', $decwgoods_price, $decwgoods_cprice, $intwgoods_store , 2 , $intwgoods_act , $intwgoods_commend , '$sqlwgoods_content' , 1 , $intatime)";

	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$intid = $GLOBALS['gdb']->fun_insert_id();
	}
}

//更新照片
if($intreturn == 0) {
	if($arrphoto != '') {
		foreach($arrphoto as $intkey => $strphoto) {
			if($strphoto != '' && $intkey < 5) {
				$int = strrpos($strphoto, '.');
				if($int != FALSE) {
					$str = substr($strphoto, $int);
					if($str == '.jpg' || $str == '.gif' || $str == '.png') {
						$ii = copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto),
						$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/'
						. $intid . '_' . ($intkey + 1) . $str);
						unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto));
						$strsql = "UPDATE " . $gdb->fun_table2('wgoods') . " SET wgoods_photo" . ($intkey + 1) . " = '" . ($intid . '_' . ($intkey + 1) . $str)
						. "' WHERE wgoods_id = " . $intid . " LIMIT 1";
						$gdb->fun_do("update cf_test set myvalue = '" . $gdb->fun_escape($strsql) . "'");
						$gdb->fun_do($strsql);
					}
				}
			}
		}
	}
}

echo $intreturn;
?>