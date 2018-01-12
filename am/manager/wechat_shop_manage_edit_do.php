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
		$strsql = "SELECT wgoods_id FROM ".$gdb->fun_table2('wgoods'). " where wgoods_code='".$sqlwgoods_code."' and wgoods_id != ".$intwgoods_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('wgoods')." SET wgoods_catalog_id=".$intwgoods_catalog_id.",wgoods_name='".$sqlwgoods_name."',wgoods_name2 ='".$sqlwgoods_name2."',wgoods_code='".$sqlwgoods_code."',wgoods_price=".$decwgoods_price.", wgoods_cprice = ". $decwgoods_cprice ." , wgoods_store = ". $intwgoods_store ." , wgoods_act = ".$intwgoods_act ." , wgoods_commend = ".$intwgoods_commend." , wgoods_content = '". $sqlwgoods_content ."' where wgoods_id=".$intwgoods_id;

	  $hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}

if($intreturn == 0) {
	if($arrphoto != '') {
		foreach($arrphoto as $intkey => $strphoto) {
			if($strphoto != '' && $intkey < 5) {
				$int = strrpos($strphoto, '.');
				if($int != FALSE) {
					$str = substr($strphoto, $int);
					if($str == '.jpg' || $str == '.gif' || $str == '.png') {
						$intkey2 = 0;
						if($arr['wgoods_photo1'] == '') {
							$intkey2 = 1;
						} else if($arr['wgoods_photo2'] == '') {
							$intkey2 = 2;
						} else if($arr['wgoods_photo3'] == '') {
							$intkey2 = 3;
						} else if($arr['wgoods_photo4'] == '') {
							$intkey2 = 4;
						} else if($arr['wgoods_photo5'] == '') {
							$intkey2 = 5;
						}
						if($intkey2 > 0) {
							copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto),
							$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/'
							. $intwgoods_id . '_' . ($intkey2) . $str);
							unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . basename($strphoto));
							$strsql = "UPDATE " . $gdb->fun_table2('wgoods') . " SET wgoods_photo" . ($intkey2) . " = '" . ($intwgoods_id . '_' . ($intkey2) . $str)
							. "' WHERE wgoods_id = " . $intwgoods_id . " LIMIT 1";
							$gdb->fun_do($strsql);
							$arr['wgoods_photo' . $intkey2] = $intwgoods_id . '_' . ($intkey2) . $str;
						}
					}
				}
			}
		}
	}
}

echo $intreturn;

?>