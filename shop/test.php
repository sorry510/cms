<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

// $gtemplate->fun_show('test');
$strfromuser = 'ddd';
$strtouser = 'gddaf';
$strsql = "INSERT INTO " . $gdb->fun_table('company') . " (company_config_weixin) VALUES ('".$strfromuser."|".$strtouser. "')";
echo $strsql;
$hresult  = $gdb->fun_do($strsql);

var_dump($hresult);

