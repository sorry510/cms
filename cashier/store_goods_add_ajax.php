<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strgoods_code = api_value_get('goods_code');
$sqlgoods_code = $gdb->fun_escape($strgoods_code);

$arr = array();

$strsql = "SELECT mgoods_id,mgoods_name FROM ".$gdb->fun_table2('mgoods')." where mgoods_code='".$sqlgoods_code."' and mgoods_state=1 and mgoods_type=2";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$strsql = "SELECT sgoods_id,sgoods_name FROM ".$gdb->fun_table2('sgoods')." where sgoods_code='".$sqlgoods_code."' and sgoods_state=1 and sgoods_type=2";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$arr['goods_type'] = 2;
	}
}else{
	$arr['goods_type'] = 1;
}

echo json_encode($arr);