<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$arr = array();
$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id );

$strsql = "SELECT card_mcombo_id,card_mcombo_type,mcombo_id,card_mcombo_ccount,mgoods_id,card_mcombo_gcount FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_id = ".$intcard_id." order by mcombo_id desc,card_mcombo_id asc";
// echo $strsql;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
foreach($arr as &$v){
	if($v['card_mcombo_type']==1){
		$strsql = "SELECT mcombo_name FROM ".$GLOBALS['gdb']->fun_table2('mcombo')." where mcombo_id = ".$v['mcombo_id']." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmcombo = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		$v['mcombo_name'] = $arrmcombo['mcombo_name'];
	}else
	if($v['card_mcombo_type']==2){
		$strsql = "SELECT mgoods_name,mgoods_price,mgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('mgoods')." where mgoods_id = ".$v['mgoods_id']." limit 1";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		$v['mgoods_name'] = $arrgoods['mgoods_name'];
		$v['mgoods_price'] = $arrgoods['mgoods_price'];
		$v['mgoods_cprice'] = $arrgoods['mgoods_cprice'];
	}
}
echo json_encode($arr);
