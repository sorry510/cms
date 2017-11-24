<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$gtemplate->fun_assign('user_list', get_user_list());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_show('system_user');

function get_user_list(){
	$arr = array();

	$strsql = "SELECT a.*,b.shop_name FROM (SELECT user_id,shop_id,user_type,user_account,user_name FROM ". $GLOBALS['gdb']->fun_table2('user')." WHERE shop_id = ". $GLOBALS['_SESSION']['login_sid'] . " AND user_id!=1 ORDER BY user_type asc,user_id DESC) AS a LEFT JOIN ". $GLOBALS['gdb']->fun_table('shop') . " AS b on a.shop_id = b.shop_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as &$row){
		switch($row['user_type'])
		{
			case 2:
				$row['type_name'] = '店长';
				break;
			case 3:
				$row['type_name'] = '收银员';
				break;
			default:
				$row['type_name'] = '其他';
		}
	}
	return $arr;
}

function get_shop_list(){
	$arr = array();
	$strsql = "SELECT shop_name ,shop_id FROM ". $GLOBALS['gdb']->fun_table('shop')." WHERE company_id = ".api_value_int0($GLOBALS['_SESSION']['login_cid'])." and shop_id = " . api_value_int0($GLOBALS['_SESSION']['login_sid']);
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}

?>