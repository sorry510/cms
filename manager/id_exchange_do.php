<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_id = api_value_get('id');
$intshop_id = api_value_int0($strshop_id);

$arr = array();
$strsql = "SELECT company_id FROM ".$GLOBALS['gdb']->fun_table('shop')." WHERE shop_id = ".$intshop_id;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

if($arr['company_id'] == $GLOBALS['_SESSION']['login_cid']){
	$GLOBALS['_SESSION']['login_sid'] = $intshop_id;
	echo '<script language="javascript">window.location="../shop/main.php";</script>';
}else{
	echo '<script language="javascript">window.history.back(-1);</script>';
}
