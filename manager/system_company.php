<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
 
$strchannel = 'system';

//echo $GLOBALS['_SESSION']['login_sid'];
//$gtemplate->fun_assign('company_info', get_company_info());
$gtemplate->fun_show('system_company');

function get_company_info() {
	$arr = array();
	$strsql = "SELECT company_code, company_name, company_identity_info, company_phone, company_info_guimo, company_info_xingzhi, company_atime, company_link_name, company_link_weixin, FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." order by mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}


?>