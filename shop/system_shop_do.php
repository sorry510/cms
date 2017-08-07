<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strshop_name = api_value_post('name');
$sqlshop_name = $gdb->fun_escape($strshop_name);
$strshop_phone = api_value_post('phone');
$sqlshop_phone = $gdb->fun_escape($strshop_phone);
$intmgoods_id = api_value_int0($strshop_name);

$intreturn = 0;