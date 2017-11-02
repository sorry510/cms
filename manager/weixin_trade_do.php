<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strreserve = api_value_post('txtreserve');
$intreserve = api_value_int0($strreserve);
$strline = api_value_post('txtline');
$intline = api_value_int0($strline);
$strimage = api_value_post('txtimage');
$sqlimage = $gdb->fun_escape($strimage);

$intreturn = 0;
$arr = array();

$intreserve == 0 ? 2 : $intreserve;
$intline == 0 ? 2 : $intline;

$arrweixin = laimi_config_weixin();

$arrweixin['reserve_flag'] = $intreserve;
$arrweixin['line_flag'] = $intline;
$arrweixin['card_image'] = $sqlimage;

$strjson_weixin = json_encode($arrweixin, JSON_UNESCAPED_UNICODE);//不转义中文
// echo $strjson_weixin;return;
$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_weixin='" . $strjson_weixin . "' where company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
$hresult = $gdb->fun_do($strsql);

if(!$hresult){
	$intreturn = 1;
}

echo $intreturn;
?>