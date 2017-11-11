<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strstore_time = api_value_post('store_time');
$intstore_time = strtotime($strstore_time) ? strtotime($strstore_time) : '0';
$strstore_type = api_value_post('store_type');
$intstore_type = api_value_int0($strstore_type);
$strstore_money = api_value_post('store_money');
$decstore_money = api_value_sdecimal($strstore_money, 2);
$strstore_operator = api_value_post('store_operator');
$sqlstore_operator = $gdb->fun_escape($strstore_operator);
$strstore_memo = api_value_post('store_memo');
$sqlstore_memo = $gdb->fun_escape($strstore_memo);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]


$arr = array();
$intreturn = 0;
$intnow = time();

if(empty($arrinfo)){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('store')." (shop_id,store_type,store_money,store_operator,store_memo,store_state,store_time,store_atime) VALUES (".$intshop.",".$intstore_type.",".$decstore_money.",'".$sqlstore_operator."','".$sqlstore_memo."',1,".$intstore_time.",".$intnow.")";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 2;
	}else{
		$store_id = mysql_insert_id();
	}
}

if($intreturn == 0){
	foreach($arrinfo as $row){
		$intmgoods_id = 0;
		$intsgoods_id = 0;
		if(array_key_exists("mgoods_id",$row)){
			$intmgoods_id = $row['mgoods_id'];
			$strmgoods_name = $row['mgoods_name'];
		}
		if(array_key_exists("sgoods_id",$row)){
			$intsgoods_id = $row['sgoods_id'];
			$strsgoods_name = $row['sgoods_name'];
		}
		// 商品可以是负数
		$intnum = api_value_sint($row['num']);
		// $price = api_value_decimal($row['price'],2);

		if($intnum==0){
			continue;
		}
		if($intmgoods_id != 0){
			$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,mgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$store_id.",".$intshop.",".$intmgoods_id.",".$intnum.",".$intnow.",'".$strmgoods_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 3;
			}
			
			/*//在确认之后，直接修改库存，没有做库存改变日志
			if($intreturn==0 && $arr['mgoods_type']==2){
				$strsql = "SELECT store_info_id FROM ".$GLOBALS['gdb']->fun_table2('store_info')." where mgoods_id=".$arr['mgoods_id']." and shop_id=".$intshop;
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
			$strsql = "INSERT INTO " .$GLOBALS['gdb']->fun_table2('store_goods'). "(store_id,shop_id,sgoods_id,store_goods_count,store_goods_atime,c_goods_name) VALUES (".$store_id.",".$intshop.",".$intsgoods_id.",".$intnum.",".$intnow.",'".$strsgoods_name."')";
			$hresult = $gdb->fun_do($strsql);
			if($hresult==false){
				$intreturn = 4;
			}
		}
	}
}

echo $intreturn;
?>