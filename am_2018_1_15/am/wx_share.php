<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strgoto = api_value_get('goto');
$intgoto = api_value_int0($strgoto);
$strid = api_value_get('id');
$intid = api_value_int0($strid);
$strcid = api_value_get('cid');
$intcid = api_value_int0($strcid);
$struid = api_value_get('uid');
$intuid = api_value_int0($struid);
// echo $intid."--".$intgoto;exit;

if ($intgoto == 3) {
	header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxbeda5ab3d65c0ab1&redirect_uri=".$GLOBALS['gconfig']['project']['url_mobile']."/s_oauth2.php?goto=".$intgoto.",".$intcid.",".$intid.",".$intuid."&response_type=code&scope=snsapi_base#wechat_redirect");
}elseif($intgoto == 1){
	header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxbeda5ab3d65c0ab1&redirect_uri=".$GLOBALS['gconfig']['project']['url_mobile']."/s_oauth2.php?goto=".$intgoto.",".$intcid.",".$intuid."&response_type=code&scope=snsapi_base#wechat_redirect");
}



?>