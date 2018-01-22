<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strtoken = '';
$strjson = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxbeda5ab3d65c0ab1&secret=3cf9f320b7e34d082928219a7d521034');
var_dump($strjson);
// $objjson = json_decode($strjson);
// $strtoken = $objjson->access_token;

// echo $strtoken;