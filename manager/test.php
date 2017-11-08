<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');
$a = array('a','b','c');
foreach($a as &$v){}
// echo $v;
// echo "<br/>";
foreach($a as $v){

}
var_dump($a);
?>