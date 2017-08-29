<?php
if(!defined('C_CNFLY')) {
	exit();
}

if($GLOBALS['_SESSION']['login_type'] != 3) {
	echo '<script language="javascript">alert("没有此权限，请重新登录！"); window.location="../login.php";</script>';
	exit();
}
if(companyState() != 1){
	echo '<script language="javascript">alert("注册企业已停用，请联系管理员！"); window.location="../login.php";</script>';
	exit();
}
if(shopEdate() < time()){
	echo '<script language="javascript">alert("店铺已过期，请联系管理员！"); window.location="../login.php";</script>';
	exit();
}
if(shopState() != 1){
	echo '<script language="javascript">alert("店铺已停用，请联系管理员！"); window.location="../login.php";</script>';
	exit();
}
?>