<?php
  define('C_CNFLY', true);
  define('C_NOTEMPLATE', true);
  require('inc_path.php');
  require(C_ROOT . '/_include/inc_init.php');
 

  $strtype = api_value_post('type');
  $inttype = api_value_int0($strtype);
  $strshop = api_value_post('shop');
  $intshop = api_value_int0($strshop);
  $straccount = api_value_post('account');
  $strpassword = api_value_post('password');
  $strname = api_value_post('name');

  $intreturn = 0;
  $atime = time();
  if($intreturn == 0) {
 	  $strsql = "INSERT INTO " . $gdb->fun_table2('user') . "( shop_id, user_type, user_account, user_password, user_atime , user_name ) VALUES ( $intshop , $inttype, '$straccount' , '$strpassword' , $atime ,'$strname')";
 	  $hresult = $gdb->fun_do($strsql);
   	if($hresult == FALSE) {
   		$intreturn = 1;
   	}
  }

  if($intreturn == 0) {
  	echo '<script type="text/javascript">window.location="system_user.php";</script>';
  } else if($intreturn == 1) {
  	echo '<script type="text/javascript">alert("操作异常！"); history.back();</script>';
  }
?>