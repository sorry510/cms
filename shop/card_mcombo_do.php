<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');


$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strmoney = api_value_post('money');
$decmoney = api_value_decimal($strmoney, 2);
$strcash = api_value_post('give');
$deccash = api_value_decimal($strcash, 2);
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$arrinfo = api_value_post('arr');//[{"id":"2","num":"1"},{"id":"3","num":"1"},{"id":"5","num":"4"}]

//echo json_encode($arrinfo);

$intreturn = 0;

//购买的套餐遍历
foreach($arrinfo as $v){
	$strmcombo_id = $v['id'];
	$intmcombo_id = api_value_int0($strmcombo_id);
	$strnum = $v['num'];
	$intnum = api_value_int0($strnum);
	if($intreturn == 0){
		// 查询套餐信息
		$strsql = "SELECT mcombo_id,mcombo_name,mcombo_price,mcombo_cprice,mcombo_limit_type,mcombo_limit_days,mcombo_limit_months FROM ". $GLOBALS['gdb']->fun_table2('mcombo') . " where mcombo_id = ".$intmcombo_id." and mcombo_state = 1 limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intmcombo_limit_type = $arr['mcombo_limit_type'];
			$intmcombo_limit_days = $arr['mcombo_limit_days'];
			$intmcombo_limit_months = $arr['mcombo_limit_months'];
			$intedate = 0;
		}else{
			$intreturn = 1;//套餐不存在或停用
		}
		if($intmcombo_limit_type==1){
			$intedate = 0;
		}else if($intmcombo_limit_type==2){
			$intedate = strtotime("+".$intmcombo_limit_days." day");
		}else if($intmcombo_limit_type==3){
			$intedate = strtotime("+".$intmcombo_limit_months." month");
		}else{
			$intedate = 0;
		}
		// 插入套餐
		$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_mcombo')."(card_id,card_mcombo_type,mcombo_id,card_mcombo_ccount,card_mcombo_cedate,card_mcombo_atime) VALUES (".$intcard_id.",1,".$intmcombo_id.",".$intnum.",".$intedate.",".time().")";
		$hresult = $GLOBALS['gdb']->fun_do($strsql);
		if($hresult == FALSE) {
			$intreturn = 2;
		}
		// 查询套餐商品
		$strsql = "SELECT mgoods_id,mcombo_goods_count FROM ".$GLOBALS['gdb']->fun_table2('mcombo_goods')." where mcombo_id = ".$intmcombo_id;
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		// echo json_encode($arr);
		if(!empty($arr)){
			foreach($arr as $v){
				$intmgoods_id = $v['mgoods_id'];
				$intmcombo_goods_count = $v['mcombo_goods_count']*$intnum;
				// 插入套餐商品
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('card_mcombo')."(card_id,card_mcombo_type,mcombo_id,card_mcombo_gcount,card_mcombo_atime) VALUES (".$intcard_id.",2,".$intmcombo_id.",".$intmcombo_goods_count.",".time().")";
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 3;
				}
			}
		}else{
			$intreturn = 4;//套餐不存在或停用
		}
	}
}
echo $intreturn;
?>