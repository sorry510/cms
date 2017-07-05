<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$arr = array();
$strsearch = api_value_get('search');


$strwhere = '';
if($GLOBALS['strsearch'] != '') {
	$strwhere = $strwhere . " AND (mcombo_code LIKE '%" . $GLOBALS['strsearch'] . "%'";
	$strwhere = $strwhere . " or mcombo_jianpin LIKE '%" . $GLOBALS['strsearch'] . "%'";
	$strwhere = $strwhere . " or mcombo_name LIKE '%" . $GLOBALS['strsearch'] . "%')";
}
$strsql = "SELECT mcombo_id,mcombo_name,mcombo_price,mcombo_cprice FROM ".$GLOBALS['gdb']->fun_table2('mcombo'). "where mcombo_state = 1 ".$strwhere." order by mcombo_id desc";
// echo $strsql;exit;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
echo json_encode($arr);
