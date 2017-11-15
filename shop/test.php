<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

echo md5(uniqid(md5(microtime(true)),true));
echo "<br/>";
echo md5(uniqid(md5(microtime(true)),true));
echo "<br/>";
echo md5(uniqid(md5(microtime(true)),true));
