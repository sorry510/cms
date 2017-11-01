<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);

$intreturn = 0;
// 首先把所有置为2
$strsql = "UPDATE ".$gdb->fun_table('shop')." SET shop_center=2 where company_id=".$GLOBALS['_SESSION']['login_cid'];
$hresult = $gdb->fun_do($strsql);

$strsql = "UPDATE ".$gdb->fun_table('shop')." SET shop_center=1 where shop_id=".$intshop_id;
$hresult = $gdb->fun_do($strsql);
if(!$hresult){
	$intreturn = 1;
}
echo $intreturn;