<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$strtype = api_value_get('type');
if($strtype!='0'){
	$arrtype = explode('-',$strtype);
	$strflag = $arrtype['0'];
	$strgoods_catalog_id = $arrtype['1'];
}else{
	$strflag = 'all';
	$strgoods_catalog_id = 0;
}

// echo $strflag.$strgoods_catalog_id;

$intgoods_catalog_id = api_value_int0($strgoods_catalog_id);
$strsearch = api_value_get('search');

$strwherem = "";
$strwheres = "";
$strwheremgoods = "";
$strwheresgoods = "";

switch($strflag){
	case 'all':
		if($strsearch != '') {
			$strwheremgoods .= " AND (mgoods_code LIKE '%" . $strsearch . "%'";
			$strwheremgoods .= " or mgoods_name LIKE '%" . $strsearch . "%'";
			$strwheremgoods .= " or mgoods_jianpin LIKE '%" . $strsearch . "%')";
		}
		 
		$arr = array();
		$arrmgoods = array();
		$strsql = "SELECT mgoods_catalog_id,mgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods_catalog')." ORDER BY mgoods_catalog_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		
		foreach($arr as $k=>$v){
			$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE 1=1 ". $strwheremgoods . " AND mgoods_catalog_id = ". $v['mgoods_catalog_id'] ." and mgoods_type=2 ORDER BY mgoods_id";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
			$arr[$k]['mgoods'] = $arrmgoods;
		}
		//s
		if($strsearch != '') {
			$strwheresgoods .= " AND (sgoods_code LIKE '%" . $strsearch . "%'";
			$strwheresgoods .= " or sgoods_name LIKE '%" . $strsearch . "%'";
			$strwheresgoods .= " or sgoods_jianpin LIKE '%" . $strsearch . "%')";
		}

		$arr2 = array();
		$arrsgoods = array();
		$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." ORDER BY sgoods_catalog_id";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);

		foreach($arr2 as $k=>$v){
			$strsql = "SELECT sgoods_id, sgoods_name, sgoods_price,sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE 1=1 ". $strwheresgoods . " AND sgoods_catalog_id = ". $v['sgoods_catalog_id'] ." and sgoods_type=2 ORDER BY sgoods_id";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
			$arr2[$k]['sgoods'] = $arrsgoods;
		}
		echo json_encode(array_merge($arr,$arr2));
		break;
	case 'm':
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
			$strsql = "SELECT mgoods_id, mgoods_name, mgoods_price,mgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." WHERE 1=1 ". $strwheremgoods . " AND mgoods_catalog_id = ". $v['mgoods_catalog_id'] ." AND mgoods_type=2 ORDER BY mgoods_id";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrmgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
			$arr[$k]['mgoods'] = $arrmgoods;
		}
		echo json_encode($arr);
		break;
	case 's':
		if($strsearch != '') {
			$strwheresgoods .= " AND (sgoods_code LIKE '%" . $strsearch . "%'";
			$strwheresgoods .= " or sgoods_name LIKE '%" . $strsearch . "%'";
			$strwheresgoods .= " or sgoods_jianpin LIKE '%" . $strsearch . "%')";
		}
		 
		if($intgoods_catalog_id != 0) {
			$strwheres .= " AND sgoods_catalog_id=".$intgoods_catalog_id;
		}

		$arr = array();
		$arrsgoods = array();
		$strsql = "SELECT sgoods_catalog_id,sgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods_catalog')." WHERE 1=1 ".$strwheres." ORDER BY sgoods_catalog_id";

		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
		
		
		foreach($arr as $k=>$v){
			$strsql = "SELECT sgoods_id, sgoods_name, sgoods_price,sgoods_cprice FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." WHERE 1=1 ". $strwheremgoods . " AND sgoods_catalog_id = ". $v['sgoods_catalog_id'] ." AND sgoods_type=2 ORDER BY sgoods_id";
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrsgoods = $GLOBALS['gdb']->fun_fetch_all($hresult);
			$arr[$k]['sgoods'] = $arrsgoods;
		}
		echo json_encode($arr);
		break;
	default:
		break;
}
?>