<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$sqlname = $gdb->fun_escape('年后');
$sqlappid = $gdb->fun_escape('我是谁');
$sqlappsecret = $gdb->fun_escape('好');

$intreturn = 0;
$arr = array();

$arrweixin = laimi_config_weixin();

// echo '<pre>';
// var_dump($arrweixin);
// echo '</pre>';
echo json_encode($arrweixin);
// $sqlname = iconv("GBK", "UTF-8", $sqlname);
// $arrweixin['name'] = $sqlname;
// $arrweixin['appid'] = $sqlappid;
// $arrweixin['appsecret'] = $sqlappsecret;
// echo json_encode($arrweixin);
// echo '<pre>';
// var_dump($arrweixin);
// echo '</pre>';
?>