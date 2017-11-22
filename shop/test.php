<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

// $time = time();
// echo strtotime('-1 day', $time);
// echo "<br/>";
// echo strtotime(date('Y-m-d', time()));
// echo "<br/>";
// echo md5(uniqid(md5(microtime(true)),true));
// echo "<br/>";
// echo md5(uniqid(md5(microtime(true)),true));
// $arr = [1,3, 5, 6];
// foreach($arr as $row){
// 	$a = $row;
// }


$strsql = "SELECT card_mcombo_atime FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." WHERE card_id = 4 group by card_mcombo_atime having sum(card_mcombo_gcount)!=0";
echo $strsql;

