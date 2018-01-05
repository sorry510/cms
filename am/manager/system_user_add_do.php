<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtype = api_value_post('txttype');
$inttype = api_value_int0($strtype);
$strshop = api_value_post('txtshop');
$intshop = api_value_int0($strshop);
$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$straccount = api_value_post('txtaccount');
$sqlaccount = $gdb->fun_escape($straccount);
$strpassword = api_value_post('password');
$sqlpassword = $gdb->fun_escape($strpassword);

$intreturn = 0;
if($intreturn == 0) {
	if($inttype != 1 && $inttype != 2 && $inttype != 3) {
		$intreturn = 1;
	} else {
		if($inttype == 1) {
		  $intshop = 0;
		}
	}
}

$arr = array();
if($intreturn == 0) {
	if($inttype != 1) {
		$strsql = "SELECT shop_id FROM " . $gdb->fun_table('shop')
		. " WHERE shop_id = " . $intshop . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(empty($arr)) {
			$intreturn = 1;
		}
	}
}

if($intreturn == 0) {
	if($inttype == 1) {
		$strsql = "SELECT COUNT(user_id) AS mycount FROM " . $gdb->fun_table2('user') . " WHERE user_type = 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			if(!empty($arr['mycount'])) {
				if($arr['mycount'] >= 5) {
					$intreturn = 2;
				}
			}
		}
	} else {
		$intlimit = 0;
		$strsql = "SELECT shop_id, shop_limit_user FROM " . $gdb->fun_table('shop')
		. " WHERE shop_id = " . $intshop . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			$intlimit = $arr['shop_limit_user'];
		}
		$strsql = "SELECT COUNT(user_id) AS mycount FROM " . $gdb->fun_table2('user') . " WHERE shop_id = " . $intshop;
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)) {
			if(!empty($arr['mycount'])) {
				if($arr['mycount'] >= $intlimit) {
					$intreturn = 2;
				}
			}
		}
	}
}

if($intreturn == 0) {
  $strsql = "SELECT user_id FROM " . $gdb->fun_table2('user') . " WHERE user_account = '" . $sqlaccount . "' LIMIT 1";
  $hresult = $gdb->fun_query($strsql);
  $arr = $gdb->fun_fetch_assoc($hresult);
  if(!empty($arr)) {
    $intreturn = 3;
  }
}

$inttime = time();
if($intreturn == 0) {
  $strsql = "INSERT INTO " . $gdb->fun_table2('user') . " (shop_id, user_type, user_account, user_password, user_name, user_atime, user_ctime) VALUES ("
  . $intshop . " , " . $inttype . ", '" . $sqlaccount . "' , '" . $sqlpassword . "' , '" . $sqlname . "', " . $inttime . ", 0)";
  $hresult = $gdb->fun_do($strsql);
 	if($hresult == FALSE) {
 		$intreturn = 1;
 	}
}

echo $intreturn;
?>