<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strgoods_catalog_id = api_value_get('goods_catalog_id');
$strcatalog_type = substr($strgoods_catalog_id , 0 , 1);
$strcatalog_id = substr($strgoods_catalog_id,1);
$intcatalog_id = api_value_int0($str_catalog_id);

$intreturn = 0;
if($intreturn == 0) {
	if($strcatalog_type == m){
		$strwhere = "";
		if($intgoods_catalog_id != 0) {
			$strwhere = $strwhere . " AND (mgoods_catalog_id=$intgoods_catalog_id)";
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
	}



	echo json_encode($arr);
}





?>