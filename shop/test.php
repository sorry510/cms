<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

// $gtemplate->fun_show('test');
// $strfromuser = 'ddd';
// $strtouser = 'gddaf';
// $strsql = "INSERT INTO " . $gdb->fun_table('company') . " (company_config_weixin) VALUES ('".$strfromuser."|".$strtouser. "')";
// echo $strsql;
// $hresult  = $gdb->fun_do($strsql);

// var_dump($hresult);

echo "<script>window.location='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxbeda5ab3d65c0ab1&secret=3cf9f320b7e34d082928219a7d521034';</script>";

