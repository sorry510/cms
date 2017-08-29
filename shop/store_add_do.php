<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strstore_time = api_value_post('store_time');
$intstore_time = strtotime($strstore_time)==false?'0':strtotime($strstore_time);
$strstore_type = api_value_post('store_type');
$intstore_type = api_value_int0($strstore_type);
$strstore_money = api_value_post('store_money');
$decstore_money = api_value_sdecimal($strstore_money, 2);
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
	$strsql = "INSERT INTO ".$gdb->fun_table2('store')." (shop_id,store_type,store_money,store_operator,store_memo,store_state,store_time,store_atime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",".$intstore_type.",".$decstore_money.",'".$sqlstore_operator."','".$sqlstore_memo."',1,".$intstore_time.",".$intnow.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}else{
		$store_id = mysql_insert_id();
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
		// 商品可以是负数
		$intnum = api_value_sint($v['num']);
		// $price = api_value_decimal($v['price'],2);

		if($intnum==0){
			continue;
		}
		if($intmgoods_id != 0){
			// 记录库存日志,没有直接入库存
			$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,mgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$store_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intmgoods_id.",".$intnum.",".$intnow.",'".$strmgoods_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 3;
			}
			
			/*//第二种不做记录，直接修改库存
			if($intreturn==0 && $arr['mgoods_type']==2){
				$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where mgoods_id=".$arr['mgoods_id']." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
				$hresult = $gdb->fun_query($strsql);
				$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
				if(!empty($arr)){
					$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('store_info')." SET store_info_count=store_info_count-".$intnum.",store_info_ctime=".$now." where store_info_id=".$arr['store_info_id'];
					$hresult = $gdb->fun_do($strsql);
					if($hresult==false){
						$intreturn = 12;
					}
				}
			}*/
		}
		if($intsgoods_id != 0){
			// 记录库存日志,没有直接入库存
			$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,sgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$store_id.",".$GLOBALS['_SESSION']['login_sid'].",".$intsgoods_id.",".$intnum.",".$intnow.",'".$strsgoods_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 4;
			}
		}
	}
}

echo $intreturn;
?>