<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
 
$strchannel = 'system';

$inttime1 = time();
$stryear1 = date('Y',$inttime1);

$gtemplate->fun_assign('company_info', get_company_info());
$gtemplate->fun_assign('province', get_province());
$gtemplate->fun_show('system_company');

function get_company_info() {
	$arr = array();
	$strsql = "SELECT company_id,company_code, company_name, company_phone, company_identity_info, company_area_sheng,company_area_shi,company_area_address,company_info_xingzhi, company_info_guimo, company_link_name, company_link_weixin,company_atime FROM " . $GLOBALS['gdb']->fun_table('company')." where company_id=".$GLOBALS['_SESSION']['login_cid']." and company_state = 1 limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$stryear2 = date('Y',$arr['company_atime']);//启用年
		$strmd = date('-m-d',$arr['company_atime']);//启用年的月日
		$strdate2 = $GLOBALS['stryear1'].$strmd;//今年的启用年日期
		$inttime2 = strtotime($strdate2);//
		if($GLOBALS['stryear1'] == $stryear2){
			$arr['years'] = 1;
		}else{
			if($GLOBALS['inttime1']-$inttime2>0){
				$arr['years'] = $GLOBALS['stryear1']-$stryear2+1;
			}else{
				$arr['years'] = $GLOBALS['stryear1']-$stryear2;
			}
		}
		$arr['company_info_xingzhi'] = $GLOBALS['gconfig']['system']['xingzhi'][$arr['company_info_xingzhi']];
		$arr['guimo'] = $GLOBALS['gconfig']['system']['guimo'][$arr['company_info_guimo']];

		$strsql = "SELECT region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where region_id =".$arr['company_area_sheng'];
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr['province'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];

		$strsql = "SELECT region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where region_id =".$arr['company_area_shi'];
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr['city'] = $GLOBALS['gdb']->fun_fetch_assoc($hresult)['region_name'];
	}
	// var_dump($arr);
	// exit;
	return $arr;
}

function get_province(){
	$arr = array();
	$strsql = "SELECT region_id,region_name FROM ".$GLOBALS['gdb']->fun_table('region')." where parent_id = 1 order by region_id asc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

?>