<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strmgoods_id = api_value_post('mgoods_id');
$intmgoods_id = api_value_int0($strmgoods_id);
$strsgoods_id = api_value_post('sgoods_id');
$intsgoods_id = api_value_int0($strsgoods_id);
$strmcombo_id = api_value_post('mcombo_id');
$intmcombo_id = api_value_int0($strmcombo_id);
$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$arract_id = api_value_post('act_discount_id');
if(!empty($arract_id)){
	$stract_id = implode(',',$arract_id);
}


$act_mgoods_price = 0;
$act_mcombo_price = 0;
$card_discount = 0;
$mgoods_price = 0;
$mgoods_cprice = 0;
$sgoods_price = 0;
$sgoods_cprice = 0;
$mcombo_price = 0;
$mcombo_cprice = 0;
$act_discount_id = 0;
//多店通用商品活动价格,
if(1){
	// 如果商品突然不参与活动了，不用取这个价格
	if($intmgoods_id!=0&&!empty($stract_id)){
		$strsql = "SELECT act_discount_id,mgoods_id,act_discount_goods_price,c_mgoods_name,c_mgoods_price FROM ".$GLOBALS['gdb']->fun_table2('act_discount_goods')." where mgoods_id=".$intmgoods_id." && act_discount_id in (".$stract_id.")";

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		if(!empty($arr)){
			$act_mgoods_price = $arr[0]['act_discount_goods_price'];
			foreach($arr as $v){
				if($act_mgoods_price>=$v['act_discount_goods_price']){
					$act_mgoods_price=$v['act_discount_goods_price'];
					$act_discount_id = $v['act_discount_id'];
				}
			}
		}
	}
}
//套餐活动价格
if(1){
	if($intmcombo_id!=0&&!empty($stract_id)){
		$strsql = "SELECT act_discount_id,mcombo_id,act_discount_goods_price,c_mcombo_name,c_mcombo_price FROM ".$GLOBALS['gdb']->fun_table2('act_discount_goods')." where mcombo_id=".$intmcombo_id." && act_discount_id in (".$stract_id.")";
		// echo $strsql;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		if(!empty($arr)){
			$act_mcombo_price = $arr[0]['act_discount_goods_price'];
			// echo $act_mcombo_price;
			foreach($arr as $v){
				if($act_mcombo_price>=$v['act_discount_goods_price']){
					$act_mcombo_price=$v['act_discount_goods_price'];
					$act_discount_id=$v['act_discount_id'];
				}
			}
		}
	}
}

//会员折扣
if($intcard_id!=0){
	$strsql = "SELECT c_card_type_discount FROM ".$GLOBALS['gdb']->fun_table2('card')." where card_id=".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$card_discount = $arr['c_card_type_discount'];
}
//通用商品价格和会员价
if($intmgoods_id!=0){
	$strsql = "SELECT mgoods_price,mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('mgoods')." where mgoods_id=".$intmgoods_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$mgoods_price = $arr['mgoods_price'];
	if($intcard_id!=0){
		$mgoods_cprice = $arr['mgoods_cprice'];
	}
}
//单店商品价格和会员价
if($intsgoods_id!=0){
	$strsql = "SELECT sgoods_price,sgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('sgoods')." where sgoods_id=".$intsgoods_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$sgoods_price = $arr['sgoods_price'];
	if($intcard_id!=0){
		$sgoods_cprice = $arr['sgoods_cprice'];
	}
}
//套餐价格和会员价
if($intmcombo_id!=0){
	$strsql = "SELECT mcombo_price,mcombo_cprice FROM ".$GLOBALS['gdb']->fun_table2('mcombo')." where mcombo_id=".$intmcombo_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$mcombo_price = $arr['mcombo_price'];
	if($intcard_id!=0){
		$mcombo_cprice = $arr['mcombo_cprice'];
	}
}
$arrprice = array();
if($act_mgoods_price!=0){
	$arrprice[] = $act_mgoods_price;
	// echo $act_mgoods_price."/1/ ";
}
if($act_mcombo_price!=0){
	$arrprice[] = $act_mcombo_price;
	// echo $act_mgoods_price."/1/ ";
}
if($card_discount!=0&&$card_discount<10&&$intmgoods_id!=0){
	$arrprice[] = $mgoods_price*$card_discount/10;
	// echo $mgoods_price*$card_discount/10 ."/3/ ";
}
if($card_discount!=0&&$card_discount<10&&$intsgoods_id!=0){
	$arrprice[] = $sgoods_price*$card_discount/10;
	// echo $sgoods_price*$card_discount/10 ."/4/ ";
}
if($card_discount!=0&&$card_discount<10&&$intmcombo_id!=0){
	$arrprice[] = $mcombo_price*$card_discount/10;
	// echo $mgoods_price*$card_discount/10 ."/5/ ";
}
if($mgoods_price!=0){
	$arrprice[] = $mgoods_price;
	// echo $mgoods_price."/5/ ";
}
if($mgoods_cprice!=0){
	$arrprice[] = $mgoods_cprice;
	// echo $mgoods_cprice."/6/ ";
}
if($sgoods_price!=0){
	$arrprice[] = $sgoods_price;
	// echo $sgoods_price."/7/ ";
}
if($sgoods_cprice!=0){
	$arrprice[] = $sgoods_cprice;
}
if($mcombo_price!=0){
	$arrprice[] = $mcombo_price;
}
if($mcombo_cprice!=0){
	$arrprice[] = $mcombo_cprice;
}

$arr = array();
$arr['min_price'] = min($arrprice);
$arr['act_discount_id'] = $act_discount_id;

echo json_encode($arr);





