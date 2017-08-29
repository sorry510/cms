<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strgoods = api_value_get('goods');
$sqlgoods = $gdb->fun_escape($strgoods);

$strwhere = '';
if($GLOBALS['sqlgoods'] != '') {
	$strwhere = $strwhere . " AND (mgoods_code LIKE '%" . $GLOBALS['sqlgoods'] . "%' OR mgoods_name LIKE '%" . $GLOBALS['sqlgoods'] . "%' OR mgoods_jianpin LIKE '%" . $GLOBALS['sqlgoods'] . "%')";
}

$strsql = 'SELECT mgoods_name,mgoods_id FROM' . $GLOBALS['gdb']->fun_table2('mgoods') . ' WHERE mgoods_state = 1 AND mgoods_act = 1' . $strwhere .'  ORDER BY mgoods_id';

$hresult = $gdb->fun_do($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);

?>