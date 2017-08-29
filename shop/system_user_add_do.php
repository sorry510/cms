<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');


$strtype = api_value_post('type');
$inttype = api_value_int0($strtype);
$straccount = api_value_post('account');
$sqlaccount = $gdb->fun_escape($straccount);
$strpassword = api_value_post('password');
$sqlpassword = $gdb->fun_escape($strpassword);
$strpassword2 = api_value_post('password2');
$sqlpassword2 = $gdb->fun_escape($strpassword2);
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);

$intshop = $GLOBALS['_SESSION']['login_sid'];


$intreturn = 0;
$atime = time();

if($inttype==1){
  $intreturn = 5;//防止手动操作为管理员
}

if($sqlpassword!=$sqlpassword2){
  $intreturn = 1;
}

if($sqlpassword==''){
  $intreturn = 3;
}

if($intreturn == 0) {
  $strsql = "SELECT user_id FROM ".$gdb->fun_table2('user')." where user_account='".$sqlaccount."'";
  $hresult = $gdb->fun_query($strsql);
  $arr = $gdb->fun_fetch_assoc($hresult);
  if(!empty($arr)){
    $intreturn = 2;
  }
}
if($intreturn == 0) {
	  $strsql = "INSERT INTO " . $gdb->fun_table2('user') . "( shop_id, user_type, user_account, user_password, user_atime , user_name ) VALUES ( $intshop , $inttype, '$sqlaccount' , '$sqlpassword' , $atime ,'$sqlname')";
	  $hresult = $gdb->fun_do($strsql);
 	if($hresult == FALSE) {
 		$intreturn = 4;
 	}
}

echo $intreturn;
?>