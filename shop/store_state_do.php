<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strstore_id = api_value_post('store_id');
$intstore_id = api_value_int0($strstore_id);

$intctime = time();

$intreturn = 0;
$arr = array();

$strsql = "UPDATE " . $gdb->fun_table2('store') . " SET store_state=2,store_ctime=".time()." WHERE store_id = " . $intstore_id . " LIMIT 1" ;
$hresult = $gdb->fun_do($strsql);
if($hresult == FALSE) {
	$intreturn = 1;
}
// 存入store_info，商品是负数时处理一下
$strsql = "SELECT mgoods_id,sgoods_id,store_goods_count FROM ".$gdb->fun_table2('store_goods')." WHERE store_id = " . $intstore_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_all($hresult);
if(!empty($arr)){
	foreach($arr as $row){
		if($row['mgoods_id'] != 0){
			$strsql = "UPDATE ".$gdb->fun_table2('store_info')." SET store_info_count=store_info_count+(".$row['store_goods_count']."),store_info_ctime=".$intctime." where mgoods_id=".$row['mgoods_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 2;
			}
		}
		if($row['sgoods_id'] != 0){
			$strsql = "UPDATE ".$gdb->fun_table2('store_info')." SET store_info_count=store_info_count+(".$row['store_goods_count']."),store_info_ctime=".$intctime." where sgoods_id=".$row['sgoods_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
			// echo $strsql;
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 3;
			}
		}
	}
}
echo $intreturn;
?>