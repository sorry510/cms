<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$gtemplate->fun_assign('user_list', get_user_list());
$gtemplate->fun_show('system_user');

function get_user_list() {
	$arr = array();
	$strsql = "SELECT user_id, user_type, user_account, user_name FROM " . $GLOBALS['gdb']->fun_table2('user')
	. " WHERE shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']) . " AND (user_type = 2 OR user_type = 3) ORDER BY user_type ASC, user_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$row['mytype'] = '';
		if($row['user_type'] == 2) {
			$row['mytype'] = '店长';
		} else if($row['user_type'] == 3) {
			$row['mytype'] = '收银员';
		}
	}
	return $arr;
}
?>