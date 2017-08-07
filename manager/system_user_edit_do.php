<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'system';

$struser_account = api_value_post('user_account');
$sqluser_account = $gdb->fun_escape($struser_account);
$struser_account_old = api_value_post('user_account_old');
$sqluser_account_old = $gdb->fun_escape($struser_account_old);
$struser_name = api_value_post('user_name');
$sqluser_name = $gdb->fun_escape($struser_name);
$struser_password_old = api_value_post('user_password_old');
$sqluser_password_old = $gdb->fun_escape($struser_password_old);
$struser_password = api_value_post('user_password');
$sqluser_password = $gdb->fun_escape($struser_password);
$struser_password2 = api_value_post('user_password2');
$sqluser_password2 = $gdb->fun_escape($struser_password2);
$struser_id = api_value_post('user_id');
$intuser_id = api_value_int0($struser_id);


$intreturn = 0;
$ctime = time();


// 验证2次输入密码
if($sqluser_password!=$sqluser_password2){
		$intreturn = 1;
}
// 验证用户名唯一
if($intreturn == 0) {
	if($sqluser_account != $sqluser_account_old){
		$strsql = "SELECT user_id FROM ".$gdb->fun_table2('user')." where user_account='".$sqluser_account."'";
		// echo $strsql;
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)){
		  $intreturn = 2;
		}
	}
}
//验证旧密码
if($sqluser_password_old!=''){
	$strsql = "SELECT user_id FROM ".$gdb->fun_table2('user')." where user_password='".$sqluser_password_old."'";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)){
	  $intreturn = 3;
	}
}
if($intreturn == 0) {
	if($sqluser_password_old==''){
		$strsql = "UPDATE " . $gdb->fun_table2('user') . " SET user_account ='".$sqluser_account."' ,user_name = '".$sqluser_name."' ,user_ctime = ".$ctime." WHERE user_id = " . $intuser_id . " LIMIT 1" ;
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}else{
		$strsql = "UPDATE " . $gdb->fun_table2('user') . " SET user_account ='".$sqluser_account."', user_password = '".$sqluser_password."' ,user_name = '".$sqluser_name."' ,user_ctime = ".$ctime." WHERE user_id = " . $intuser_id . " LIMIT 1" ;
		$hresult = $gdb->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 4;
		}
	}
	
}

echo $intreturn;
?>