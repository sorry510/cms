<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_name = api_value_post('shop_name');
$sqlshop_name = $gdb->fun_escape($strshop_name);
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
$intnow = time();
$intyear = strtotime('+1 year',$intnow);
$intmaxshop_id = 0;
$arr = array();

$strsql = "SELECT shop_id FROM ".$gdb->fun_table('shop')." order by shop_id desc limit 1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intmaxshop_id = $arr['shop_id']+1;
}else{
	$intmaxshop_id = 1;
}


//没有检测添加店铺最大数量限制
$strsql = "SELECT company_config_trade FROM ".$gdb->fun_table('company')." where company_id = ".$GLOBALS['_SESSION']['login_cid']." and company_state = 1";
// echo $strsql;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "SELECT shop_id FROM ".$gdb->fun_table('shop')." where shop_name='".$sqlshop_name."' and company_id = ".$GLOBALS['_SESSION']['login_cid'];
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intreturn = 2;
	}
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table('shop')." (shop_id,company_id,system_code,shop_name,shop_phone,shop_area_sheng,shop_area_shi,shop_area_address,shop_state,shop_atime,shop_limit_user,shop_edate,shop_area_jing,shop_area_wei) VALUES(".$intmaxshop_id.",".$GLOBALS['_SESSION']['login_cid'].",'".$GLOBALS['_SESSION']['login_code']."','".$sqlshop_name."','".$sqlshop_phone."',".$intprovince.",".$intcity.",'".$sqladdress."',1,".$intnow.",5,".$intyear.",".$decjing.",".$decwei.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == false){
		$intreturn = 3;
	}
}
echo $intreturn;
