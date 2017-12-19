<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$intreturn = 0;

if(empty($_POST['out_trade_no']) != ''){
	$intreturn = 1;
}

echo $intreturn;