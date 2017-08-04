<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strstore_id = api_value_get('store_id');
$intstore_id = api_value_int0($strstore_id);

$arr = array();

$strsql = "SELECT store_id,store_type,store_money,store_operator,store_memo,store_time FROM ".$gdb->fun_table2('store')." where store_id=".$intstore_id;

$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);

if(!empty($arr)){
	$arr['store_time'] = date('Y-m-d H:i:s',$arr['store_time']);
	$arrgoods = array();
	$strsql = "SELECT mgoods_id,sgoods_id,store_goods_count,c_goods_name FROM ".$gdb->fun_table2('store_goods')." where store_id=".$intstore_id;
	$hresult = $gdb->fun_query($strsql);
	$arrgoods = $gdb->fun_fetch_all($hresult);
	$arr['store_goods'] = $arrgoods;
}

echo json_encode($arr);
?>