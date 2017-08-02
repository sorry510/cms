<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$gsession->fun_clear();
echo '<script language="javascript">window.location="login.php";</script>';
?>