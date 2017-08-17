<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


/*echo strtotime('1970-02-20');
echo "<br/>";
echo mktime(0, 0, 0, 2, 20, 0);
echo "<br/>";
echo mktime(0, 0, 0, 2, 20, 2017);*/

/*$arr = array();
$arr[0]['c_ticket_days'] = 1;
$now = time();
$now2 = strtotime(date('Y-m-d',$now))+86400;
$now3 = strtotime("+".$arr[0]['c_ticket_days']." day",$now2);

echo $now;
echo "<br/>";
echo $now2;
echo "<br/>";
echo $now3;
echo "<br/>";
echo $now3-$now2;*/


// $date = date('Y-m-d',time());
// echo $date;
// echo "</br>";
// echo strtotime($date);

$intmgoods_id = 4;
// 判断商品是否参加活动
$arrmgoods = array();
$strsql = "SELECT mgoods_id FROM ".$gdb->fun_table2('mgoods')." WHERE mgoods_id=".$intmgoods_id." and mgoods_act=2";
echo $strsql;
$hresult = $gdb->fun_query($strsql);
$arrmgoods = $gdb->fun_fetch_assoc($hresult);

var_dump($arrmgoods);