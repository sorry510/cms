<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$intreturn = 0;
$intuser_max_count = 0;

//检测添加操作员最大数量限制
$strsql = "SELECT shop_limit_user FROM ".$gdb->fun_table('shop')." where shop_id = ".$GLOBALS['_SESSION']['login_sid'];
// echo $strsql;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)){
  $intuser_max_count = $arr['shop_limit_user'];
}
// 现有数量
$strsql = "SELECT count(user_id) as user_count FROM ".$gdb->fun_table2('user')." where shop_id = ".$intshop;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if($arr['user_count'] >= $intuser_max_count){
  $intreturn = 1;
}