<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$name = api_value_post('name');
$file = $_FILES['file'];
$text = api_value_post('text');
echo $name;
echo $text;
var_dump($file);
?> 