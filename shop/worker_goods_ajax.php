<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strtype = api_value_get('type');
$intgoods_catalog_id = api_value_int0($strtype);

$strsearch = api_value_get('search');

$strwherem = "";
$strwheremgoods = "";


if($strsearch != '') {
	$strwheremgoods .= " AND (mgoods_code LIKE '%" . $strsearch . "%'";
	$strwheremgoods .= " or mgoods_name LIKE '%" . $strsearch . "%'";
	$strwheremgoods .= " or mgoods_jianpin LIKE '%" . $strsearch . "%')";
}

if($intgoods_catalog_id != 0) {
	$strwherem .= " AND mgoods_catalog_id=".$intgoods_catalog_id;
}

$arr = array();
$arrmgoods = array();
$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." WHERE 1=1 ".$strwherem." ORDER BY mgoods_catalog_id";

$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);


foreach($arr as $k=>$v){
	$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE 1=1 ". $strwheremgoods . " AND mgoods_catalog_id = ". $v['mgoods_catalog_id'] ." AND mgoods_state=1 AND mgoods_reserve=1 ORDER BY mgoods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
	$arr[$k]['mgoods'] = $arrmgoods;
}

echo json_encode($arr);
?>