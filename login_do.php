<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');

require(C_ROOT . '/_include/inc_init.php');

$strcode = api_value_post('txtcode');
$sqlcode = $gdb->fun_escape($strcode);
$straccount = api_value_post('txtaccount');
$strpassword = api_value_post('txtpassword');

$strsql = "select company_id,system_code from ".$gdb->fun_table('company'). " where company_code='".$sqlcode."'";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

$gdb->pub_prefix2 = $arr['system_code']."_".STR_PAD($arr['company_id'],4,'0',STR_PAD_LEFT)."_";
$system_code = $arr['system_code'];
$company_id = $arr['company_id'];

$intreturn = 0;
$arr = array();
if($intreturn == 0) {
	$strsql = "SELECT user_id, user_type, user_account,shop_id FROM " . $gdb->fun_table2('user') . " WHERE user_account = '" . $gdb->fun_escape($straccount)
	. "' AND user_password = '" . $gdb->fun_escape($strpassword) . "' LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(empty($arr)) {
		$intreturn = 2;
	}
}

if($intreturn == 0) {
	$GLOBALS['_SESSION']['login_type'] = $arr['user_type'];
	$GLOBALS['_SESSION']['login_id'] = $arr['user_id'];
	$GLOBALS['_SESSION']['login_account'] = $arr['user_account'];
	$GLOBALS['_SESSION']['login_code'] = $system_code;
	$GLOBALS['_SESSION']['login_cid'] = $company_id;
	$GLOBALS['_SESSION']['login_sid'] = $arr['shop_id'];
}
if($intreturn == 0) {
	switch($arr['user_type'])
	{
		case '1':
			echo '<script language="javascript">window.location="manager/card.php";</script>';
			break;
		case '2':
			echo '<script language="javascript">window.location="shop/card.php";</script>';
			break;
		case '3':
			echo '<script language="javascript">window.location="cashier/card.php";</script>';
			break;
		default:
			echo '<script language="javascript">alert("没有此类型用户！"); history.back();</script>';
	}
	echo '<script language="javascript">window.location="shop/card.php";</script>';
} else if($intreturn == 1) {
	echo '<script language="javascript">alert("操作异常！"); history.back();</script>';
} else if($intreturn == 2) {
	echo '<script language="javascript">alert("登录帐号或密码错误！"); history.back();</script>';
}
?>