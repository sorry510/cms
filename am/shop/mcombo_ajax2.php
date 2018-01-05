<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strid = api_value_get('id');
$intid = api_value_int0($strid);

$intreturn = 0;
$arr = array();
$arrgoods = array();
if($intreturn == 0) {
	
	$strsql = "SELECT mcombo_id,mcombo_type,mcombo_code,mcombo_name,mcombo_price,mcombo_cprice,mcombo_limit_days,mcombo_act,mcombo_state FROM " . $GLOBALS['gdb']->fun_table2('mcombo')." WHERE mcombo_id = " . $intid;

	//echo $strsql;exit();

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	if ($hresult) {
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	}else{
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	
	$strsql = " SELECT b.mgoods_name,a.mcombo_goods_count,b.mgoods_price FROM ". $GLOBALS['gdb']->fun_table2('mcombo_goods')." as a LEFT JOIN ". $GLOBALS['gdb']->fun_table2('mgoods')." as b on a.mgoods_id = b.mgoods_id WHERE mcombo_id = " .$GLOBALS['intid'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	if ($hresult){
		$arrgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}else{
		$intreturn = 2;
	}

}

if ($intreturn == 0) {
	if (!empty($arrgoods)) {
		$arr['mgoods'] = $arrgoods;
	}
}

echo json_encode($arr);

?>