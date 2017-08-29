<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strstore_id = api_value_post('store_id');
$intstore_id = api_value_int0($strstore_id);
$strstore_time = api_value_post('store_time');
$intstore_time = strtotime($strstore_time)==false?'0':strtotime($strstore_time);
$strstore_type = api_value_post('store_type');
$intstore_type = api_value_int0($strstore_type);
$strstore_money = api_value_post('store_money');
$decstore_money = api_value_decimal($strstore_money, 2);
$strstore_operator = api_value_post('store_operator');
$sqlstore_operator = $gdb->fun_escape($strstore_operator);
$strstore_memo = api_value_post('store_memo');
$sqlstore_memo = $gdb->fun_escape($strstore_memo);

$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]


$arr = array();
$intreturn = 0;
$intnow = time();

if(empty($arrinfo)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "UPDATE ".$gdb->fun_table2('store')." SET store_type=".$intstore_type.",store_money=".$decstore_money.",store_operator='".$sqlstore_operator."',store_memo='".$sqlstore_memo."',store_time=".$intstore_time.",store_ctime=".$intnow." where store_id=".$intstore_id;
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}
}

if($intreturn == 0){
	$strsql = "DELETE FROM ".$gdb->fun_table2('store_goods')." where store_id=".$intstore_id;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}
}
if($intreturn == 0){
	foreach($arrinfo as $v){
		$intmgoods_id = 0;
		$intsgoods_id = 0;
		if(array_key_exists("mgoods_id",$v)){
			$intmgoods_id = $v['mgoods_id'];
			$strmgoods_name = $v['mgoods_name'];
		}
		if(array_key_exists("sgoods_id",$v)){
			$intsgoods_id = $v['sgoods_id'];
			$strsgoods_name = $v['sgoods_name'];
		}
		$intnum = api_value_int0($v['num']);
		// $price = api_value_decimal($v['price'],2);

		if($intnum==0){
			continue;
		}
		if($intmgoods_id != 0){
			// 记录库存日志,没有直接入库存
			$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,mgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$intstore_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intmgoods_id.",".$intnum.",".$intnow.",'".$strmgoods_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 4;
			}
		}
		if($intsgoods_id != 0){
			// 记录库存日志,没有直接入库存
			$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,sgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$intstore_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intsgoods_id.",".$intnum.",".$intnow.",'".$strsgoods_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 4;
			}
		}
	}
}

echo $intreturn;
?>