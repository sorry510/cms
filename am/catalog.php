<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$gtemplate->fun_assign('wgoods_catalog', get_wgoods_catalog());
$gtemplate->fun_show('catalog');

function get_wgoods_catalog() {
	$arr = array();
	$strsql = "SELECT wgoods_catalog_id, wgoods_catalog_name FROM " . $GLOBALS['gdb']->fun_table2('wgoods_catalog') . " ORDER BY wgoods_catalog_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}
?>