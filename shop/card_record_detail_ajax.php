<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strcard_record_id = api_value_get('card_record_id');
$intcard_record_id = api_value_int0($strcard_record_id);

$strsql = "SELECT card_record_id,card_record_code,card_id,shop_id,card_record_type,card_record_cmoney,card_record_hmoney,card_record_ymoney,card_record_jmoney,card_record_smoney,card_record_emoney,card_record_pay,card_record_xianjin,card_record_yinhang,card_record_weixin,card_record_zhifubao,card_record_score,card_record_atime,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name FROM " . $gdb->fun_table2('card_record') . " where card_record_id = ".$intcard_record_id." limit 1";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
$arr['card_record_atime'] = date("Y-m-d H:i:s",$arr['card_record_atime']);

if($arr['card_record_type']==3){
	$strsql = "SELECT mgoods_id,sgoods_id,card_record3_goods_count,c_mgoods_name,c_mgoods_price,c_mgoods_cprice,c_sgoods_name,c_sgoods_price,c_sgoods_cprice FROM " .$gdb->fun_table2('card_record3_goods'). "where card_record_id=".$arr['card_record_id'];
	$hresult = $gdb->fun_query($strsql);
	$arrlist = $gdb->fun_fetch_all($hresult);
	$arr['goods_list'] = $arrlist;
}

if($arr['card_record_type']==2){
	$strsql = "SELECT mgoods_id,card_record2_mcombo_gcount,c_mgoods_name,c_mgoods_price,c_mgoods_cprice FROM " .$gdb->fun_table2('card_record2_mcombo'). "where card_record2_mcombo_type=2 and card_record_id=".$arr['card_record_id'];
	$hresult = $gdb->fun_query($strsql);
	$arrlist = $gdb->fun_fetch_all($hresult);
	$arr['mcombo_goods_list'] = $arrlist;
}
echo json_encode($arr);
