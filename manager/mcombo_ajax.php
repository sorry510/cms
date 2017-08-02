<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strmgoods_catalog_id = api_value_get('mgoods_catalog_id');
$intmgoods_catalog_id = api_value_int0($strmgoods_catalog_id);
$strmgoods_search = api_value_get('mgoods_search');

$intreturn = 0;
if($intreturn == 0) {
	$strwhere = "";
	$strwheremgoods = "";

	if($strmgoods_search != '') {
		$strwheremgoods = $strwheremgoods . " AND (mgoods_code LIKE '%" . $strmgoods_search . "%'";
		$strwheremgoods = $strwheremgoods . " or mgoods_name LIKE '%" . $strmgoods_search . "%'";
		$strwheremgoods = $strwheremgoods . " or mgoods_jianpin LIKE '%" . $strmgoods_search . "%')";
	}
	 
	if($intmgoods_catalog_id != 0) {
		$strwhere = $strwhere . " AND (mgoods_catalog_id=$intmgoods_catalog_id)";
	}

	$arr = array();
	$arrmgoods = array();
	$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." WHERE 1=1 ".$strwhere." ORDER BY mgoods_catalog_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	
	foreach($arr as $k=>$v){
		$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE 1=1 ". $strwheremgoods . " AND mgoods_catalog_id = ". $v['mgoods_catalog_id'] ." ORDER BY mgoods_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
		$arr[$k]['mgoods'] = $arrmgoods;
	}
	echo json_encode($arr);
}





?>