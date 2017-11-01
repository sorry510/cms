<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strname = api_value_post('txtname');
$sqlname = $gdb->fun_escape($strname);
$strappid = api_value_post('txtappid');
$sqlappid = $gdb->fun_escape($strappid);
$strappsecret = api_value_post('txtappsecret');
$sqlappsecret = $gdb->fun_escape($strappsecret);

$intreturn = 0;
$arr = array();

$arrweixin = laimi_config_weixin();

$arrweixin['name'] = $sqlname;
$arrweixin['appid'] = $sqlappid;
$arrweixin['appsecret'] = $sqlappsecret;

$strjson_weixin = json_encode($arrweixin, JSON_UNESCAPED_UNICODE);//不转义中文
// echo $strjson_weixin;return;
$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_weixin='" . $strjson_weixin . "' where company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
$hresult = $gdb->fun_do($strsql);

if(!$hresult){
	$intreturn = 1;
}

echo $intreturn;
?>