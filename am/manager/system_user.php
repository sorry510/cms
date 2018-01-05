<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);

$gtemplate->fun_assign('user_list', get_user_list());
$gtemplate->fun_show('system_user');

function get_user_list() {
	$strwhere = '';
	if($GLOBALS['strshop'] != '') {
		$strwhere .= " AND shop_id = " . $GLOBALS['intshop'];
	}
	$strwhere .= " AND user_id <> 1";	//超管不能被查询和修改

	$arr = array();
	$strsql = "SELECT a.*, b.shop_name FROM (SELECT user_id, shop_id, user_type, user_account, user_name FROM " . $GLOBALS['gdb']->fun_table2('user')
	. " WHERE 1 = 1" . $strwhere. ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b on a.shop_id = b.shop_id ORDER BY a.user_type ASC, a.user_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$row['mytype'] = '';
		if($row['user_type'] == 1) {
			$row['mytype'] = '管理员';
		} else if($row['user_type'] == 2) {
			$row['mytype'] = '店长';
		} else if($row['user_type'] == 3) {
			$row['mytype'] = '收银员';
		}
	}
	return $arr;
}
?>