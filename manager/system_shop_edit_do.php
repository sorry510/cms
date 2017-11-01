<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_id = api_value_post('txtid');
$intshop_id = api_value_int0($strshop_id);
$strshop_name = api_value_post('txttitle');
$sqlshop_name = $gdb->fun_escape($strshop_name);
$strshop_phone = api_value_post('txtphone');
$sqlshop_phone = $gdb->fun_escape($strshop_phone);
$strprovince = api_value_post('txtsheng');
$intprovince = api_value_int0($strprovince);
$strcity = api_value_post('txtshi');
$intcity = api_value_int0($strcity);
$straddress = api_value_post('txtaddress');
$sqladdress = $gdb->fun_escape($straddress);
$strjing = api_value_post('txtjing');
$decjing = api_value_decimal($strjing,12);
$strwei = api_value_post('txtwei');
$decwei = api_value_decimal($strwei,12);

$intreturn = 0;
$arr = array();

$strsql = "SELECT shop_id FROM ".$gdb->fun_table('shop')." where shop_id = ".$intshop_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table('shop')." SET shop_name='".$sqlshop_name."',shop_phone='".$sqlshop_phone."',shop_area_sheng=".$intprovince.",shop_area_shi=".$intcity.",shop_area_address='".$sqladdress."',shop_ctime=".time().",shop_area_jing=".$decjing.",shop_area_wei=".$decwei." where shop_id=".$intshop_id;
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 2;
	}
}
echo $intreturn;
