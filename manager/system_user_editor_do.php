<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'system';

$struser_type = api_value_post('user_type');
$intuser_type = api_value_int0($struser_type);
$strshop_id = api_value_post('shop_id');
$intshop_id = api_value_int0($strshop_id);
$struser_account = api_value_post('user_account');
$struser_password = api_value_post('user_password');
$struser_name = api_value_post('user_name');
$struser_id = api_value_post('user_id');
$intuser_id = api_value_int0($struser_id);


$intreturn = 0;
$ctime = time();
if($intreturn == 0) {
	$strsql = "UPDATE " . $gdb->fun_table2('user') . " SET user_type = " . $intuser_type . " , shop_id = ".$intshop_id.", user_account ='".$struser_account."', user_password = '".$struser_password."' ,user_name = '".$struser_name."' ,user_ctime = ".$ctime." WHERE user_id = " . $intuser_id . " LIMIT 1" ;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

//var_dump($strsql);exit;

  if($intreturn == 0) {
  	echo '<script type="text/javascript">window.location="system_user.php";</script>';
  } else if($intreturn == 1) {
  	echo '<script type="text/javascript">alert("操作异常！"); history.back();</script>';
  }

?>