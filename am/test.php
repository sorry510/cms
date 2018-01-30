<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$GLOBALS['_SESSION']['login_type'] = 11;
$GLOBALS['_SESSION']['login_id'] = 7;
$GLOBALS['_SESSION']['login_openid'] = 'abc';
$GLOBALS['_SESSION']['login_code'] = 'am';
$GLOBALS['_SESSION']['login_cid'] = 1;
$GLOBALS['_SESSION']['login_sid'] = 0;
var_dump(laimi_company_trade());