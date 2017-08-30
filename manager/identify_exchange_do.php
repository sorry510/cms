<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);

$GLOBALS['_SESSION']['login_sid'] = $intshop_id;

echo '<script language="javascript">window.location="../shop/card.php";</script>';

