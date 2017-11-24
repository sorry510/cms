<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtype = api_value_post('txttype');
$inttype = api_value_int0($strtype);
$straccount = api_value_post('txtaccount');
$sqlaccount = $gdb->fun_escape($straccount);
$strpassword = api_value_post('password');
$sqlpassword = $gdb->fun_escape($strpassword);
$strpassword2 = api_value_post('password2');
$sqlpassword2 = $gdb->fun_escape($strpassword2);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$intreturn = 0;
$atime = time();

// 判断
if (!empty($GLOBALS['_SESSION']['login_sid'])) {
  $strsql = "SELECT shop_id FROM ".$gdb->fun_table('shop')." where shop_id = ".$intshop;
  // echo $strsql;
  $hresult = $gdb->fun_query($strsql);
  $arr = $gdb->fun_fetch_assoc($hresult);
  if(empty($arr)){
    $intreturn = 6;
  }
}
// 判断是否超过最大用户数量限制
$intuser_max_count = 0;

//检测添加操作员最大数量限制
$strsql = "SELECT shop_limit_user FROM ".$gdb->fun_table('shop')." where shop_id = ".$intshop;
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
if($intuser_max_count - $arr['user_count'] < 1){
  $intreturn = 4;
}

if($sqlpassword != $sqlpassword2){
  $intreturn = 1;
}

if($intreturn == 0) {
  $strsql = "SELECT user_id FROM ".$gdb->fun_table2('user')." where user_account='".$sqlaccount."'";
  $hresult = $gdb->fun_query($strsql);
  $arr = $gdb->fun_fetch_assoc($hresult);
  if(!empty($arr)){
    $intreturn = 3;
  }
}

if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('user') . "( shop_id, user_type, user_account, user_password, user_atime , user_name ) VALUES ( ".$intshop.", $inttype, '$sqlaccount' , '$sqlpassword' , $atime ,'$sqlname')";
	  $hresult = $gdb->fun_do($strsql);
 	if($hresult == FALSE) {
 		$intreturn = 5;
 	}
}

echo $intreturn;
?>