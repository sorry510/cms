<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$struser_password_old = api_value_post('user_password_old');
$sqluser_password_old = $gdb->fun_escape($struser_password_old);
$struser_password = api_value_post('user_password');
$sqluser_password = $gdb->fun_escape($struser_password);
$struser_password2 = api_value_post('user_password2');
$sqluser_password2 = $gdb->fun_escape($struser_password2);
$struser_id = api_value_post('user_id');
$intuser_id = api_value_int0($struser_id);


$intreturn = 0;

// 验证2次输入密码
if($sqluser_password!=$sqluser_password2){
	$intreturn = 1;
}

//验证旧密码
if($intreturn == 0){
	$strsql = "SELECT user_id FROM ".$gdb->fun_table2('user')." where user_password='".$sqluser_password_old."' and user_id = ".$intuser_id;
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)){
	  $intreturn = 2;
	}
}
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('user') . " SET user_password = '".$sqluser_password."',user_ctime = ".time()." WHERE user_id = " . $intuser_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
	
}

echo $intreturn;
?>