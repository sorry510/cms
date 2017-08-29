<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcompany_id = api_value_post('company_id');
$intcompany_id = api_value_int0($strcompany_id);
$stridentity = api_value_post('identity');
$sqlidentity = $gdb->fun_escape($stridentity);
$strprovince = api_value_post('province');
$intprovince = api_value_int0($strprovince);
$strcity = api_value_post('city');
$intcity = api_value_int0($strcity);
$straddress = api_value_post('address');
$sqladdress = $gdb->fun_escape($straddress);
$strguimo = api_value_post('guimo');
$intguimo = api_value_int0($strguimo);
$strname = api_value_post('name');
$sqlname = $gdb->fun_escape($strname);
$strweixin = api_value_post('weixin');
$sqlweixin = $gdb->fun_escape($strweixin);

$intreturn = 0;
$arr = array();

$strsql = "SELECT company_id FROM ".$gdb->fun_table('company')." where company_state!=1 and company_id=".$intcompany_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(!empty($arr)) {
	$intreturn = 1;
}	
if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table('company')." SET company_identity_info='".$sqlidentity."',company_area_sheng=".$intprovince.",company_area_shi=".$intcity.",company_area_address='".$sqladdress."',company_info_guimo=".$intguimo.",company_link_name='".$strname."',company_link_weixin='".$strweixin."',company_ctime=".time()." where company_id=".$intcompany_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

echo $intreturn;
