<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strshop_name = api_value_post('shop_name');
$sqlshop_name = $gdb->fun_escape($strshop_name);
$strshop_name_old = api_value_post('shop_name_old');
$sqlshop_name_old = $gdb->fun_escape($strshop_name_old);
$strshop_phone = api_value_post('shop_phone');
$sqlshop_phone = $gdb->fun_escape($strshop_phone);
$strprovince = api_value_post('province');
$intprovince = api_value_int0($strprovince);
$strcity = api_value_post('city');
$intcity = api_value_int0($strcity);
$straddress = api_value_post('address');
$sqladdress = $gdb->fun_escape($straddress);
$strjing = api_value_post('jing');
$decjing = api_value_decimal($strjing,12);
$strwei = api_value_post('wei');
$decwei = api_value_decimal($strwei,12);

$intreturn = 0;
$arr = array();

$strsql = "SELECT shop_id FROM ".$gdb->fun_table('shop')." where company_id = ".$GLOBALS['_SESSION']['login_cid']." and shop_state = 1 and shop_edate>=".time();
// echo $strsql;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	if($sqlshop_name!=$sqlshop_name_old){
		$strsql = "SELECT shop_id FROM ".$gdb->fun_table('shop')." where shop_name='".$sqlshop_name."' and company_id = ".$GLOBALS['_SESSION']['login_cid'];
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intreturn = 2;
		}
	}
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table('shop')." SET shop_name='".$sqlshop_name."',shop_phone='".$sqlshop_phone."',shop_area_sheng=".$intprovince.",shop_area_shi=".$intcity.",shop_area_address='".$sqladdress."',shop_ctime=".time().",shop_area_jing=".$decjing.",shop_area_wei=".$decwei." where shop_id=".$intshop_id;
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 3;
	}
}
echo $intreturn;
