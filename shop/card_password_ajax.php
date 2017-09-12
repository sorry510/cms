<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id);

$arr = array();
$intreturn = 0;
$arrcompanyconfig = companyConfig();
$intpassword_flag = $arrcompanyconfig['password_flag'];

//启用状态下检测
if($intpassword_flag == 1){
	$strsql = "SELECT card_password_state FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	// echo $strsql;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if($arr['card_password_state'] == 1){
			$intreturn = 1;//启用
		}else{
			$intreturn = 0;
		}
	}else{
		$intreturn = 0;
	}
}
echo $intreturn;


