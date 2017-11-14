<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strstore_id = api_value_post('id');
$intstore_id = api_value_int0($strstore_id);
$intshop = $GLOBALS['_SESSION']['login_sid'];
$intctime = time();

$intreturn = 0;
$arr = array();
$strsql = "UPDATE " . $gdb->fun_table2('store') . " SET store_state=2,store_ctime=".$intctime." WHERE store_id = " . $intstore_id . " LIMIT 1" ;
$hresult = $gdb->fun_do($strsql);
if($hresult == FALSE) {
	$intreturn = 1;
}
// 存入store_info
$strsql = "SELECT mgoods_id,sgoods_id,store_goods_count FROM ".$gdb->fun_table2('store_goods')." WHERE store_id = " . $intstore_id;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_all($hresult);
if(!empty($arr)){
	foreach($arr as $row){
		$arrgoods = array();
		if($row['mgoods_id'] != 0){
			$strsql = "SELECT store_info_id FROM ".$gdb->fun_table2('store_info')." WHERE mgoods_id=".$row['mgoods_id']." and shop_id=".$intshop;
			$hresult = $gdb->fun_query($strsql);
			$arrgoods = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arrgoods)){
				$strsql = "UPDATE ".$gdb->fun_table2('store_info')." SET store_info_count=store_info_count+(".$row['store_goods_count']."),store_info_ctime=".$intctime." where store_info_id=".$arrgoods['store_info_id'];
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 2;
				}
			}else{
				$strsql = "INSERT INTO ".$gdb->fun_table2('store_info')." (mgoods_id,shop_id,store_info_count,store_info_atime) VALUES (".$row['mgoods_id'].",".$intshop.",".$row['store_goods_count'].",".$intctime.")";
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 2;
				}
			}
		}
		if($row['sgoods_id'] != 0){
			$strsql = "SELECT store_info_id FROM ".$gdb->fun_table2('store_info')." WHERE sgoods_id=".$row['sgoods_id']." and shop_id=".$intshop;
			$hresult = $gdb->fun_query($strsql);
			$arrgoods = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arrgoods)){
				$strsql = "UPDATE ".$gdb->fun_table2('store_info')." SET store_info_count=store_info_count+(".$row['store_goods_count']."),store_info_ctime=".$intctime." where store_info_id=".$arrgoods['store_info_id'];
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 3;
				}
			}else{
				$strsql = "INSERT INTO ".$gdb->fun_table2('store_info')." (sgoods_id,shop_id,store_info_count,store_info_atime) VALUES (".$row['sgoods_id'].",".$intshop.",".$row['store_goods_count'].",".$intctime.")";
				$hresult = $gdb->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 3;
				}
			}
		}
	}
}
echo $intreturn;
?>