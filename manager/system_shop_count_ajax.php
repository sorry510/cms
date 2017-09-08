<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$intreturn = 0;
$intshop_max_count = 0;
//检测添加店铺最大数量限制
$strsql = "SELECT company_shop_acount FROM ".$gdb->fun_table('company')." where company_id = ".$GLOBALS['_SESSION']['login_cid']." and company_state = 1";
// echo $strsql;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$intshop_max_count = $arr['company_shop_acount'];
}
// 现有数量
$strsql = "SELECT count(shop_id) as shop_count FROM ".$gdb->fun_table('shop')." where company_id = ".$GLOBALS['_SESSION']['login_cid'];
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if($intshop_max_count - $arr['shop_count'] < 1){
	$intreturn = 1;
}

echo $intreturn;