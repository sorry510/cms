<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strchannel = 'list';
$strcatalog = api_value_get('catalog');
$intcatalog = $gdb->fun_escape($strcatalog);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$gtemplate->fun_show('list');
?>