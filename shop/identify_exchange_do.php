<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$GLOBALS['_SESSION']['login_sid'] = 0;

echo '<script language="javascript">window.location="../manager/card.php";</script>';

