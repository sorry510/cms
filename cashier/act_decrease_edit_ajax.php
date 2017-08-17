<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
//require('inc_limit.php');

$strid = api_value_get('id');
$intid = api_value_int1($strid);

$arr = array();

/*$strsql = "SELECT a.act_decrease_id, a.act_decrease_name, a.act_decrease_client, a.act_decrease_man, a.act_decrease_jian, a.act_decrease_start, a.act_decrease_end, a.act_decrease_memo , a.act_decrease_shop , b.shop_id FROM " . $GLOBALS['gdb']->fun_table2('act_decrease') . "as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('act_decrease_shop')." as b on a.act_decrease_id =b.act_decrease_id WHERE b.act_decrease_id = ". $intid;*/
$strsql = "SELECT a.act_decrease_id, a.act_decrease_name, a.act_decrease_client, a.act_decrease_man, a.act_decrease_jian, a.act_decrease_start, a.act_decrease_end, a.act_decrease_memo , a.act_decrease_shop , b.shop_id FROM (SELECT act_decrease_id, act_decrease_name, act_decrease_client, act_decrease_man, act_decrease_jian, act_decrease_start, act_decrease_end, act_decrease_memo , act_decrease_shop FROM " . $GLOBALS['gdb']->fun_table2('act_decrease') . " WHERE act_decrease_id = ". $intid .") as a LEFT JOIN ".$GLOBALS['gdb']->fun_table2('act_decrease_shop')." as b on a.act_decrease_id = b.act_decrease_id ";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

foreach ($arr as $key => $value) {
	$arr[$key]['act_decrease_start'] = date('Y-m-d',$arr[$key]['act_decrease_start'] );
	$arr[$key]['act_decrease_end'] = date('Y-m-d',$arr[$key]['act_decrease_end'] );
}

echo json_encode($arr);
/*echo $strsql;*/

?>