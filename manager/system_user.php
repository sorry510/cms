<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'system';

$strshop_id = api_value_get('shop');
$intshop_id = api_value_int0($strshop_id);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('user_list', get_user_list());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_show('system_user');

function get_request(){
	$arr = array();
	$arr['shop'] = $GLOBALS['intshop_id'];
	return $arr;
}

function get_user_list(){
	$arr = array();
	$strwhere = '';
	if($GLOBALS['intshop_id'] > 0) {
		$strwhere .= " AND shop_id = " . $GLOBALS['intshop_id'];
	}
	$strwhere .= " AND user_id!=1";//超管不能被查询和修改

	$strsql = "SELECT a.*,b.shop_name FROM (SELECT user_id,shop_id,user_type,user_account,user_name FROM ". $GLOBALS['gdb']->fun_table2('user')." WHERE 1=1 ". $strwhere. " ORDER BY user_type asc,user_id DESC) AS a LEFT JOIN ". $GLOBALS['gdb']->fun_table('shop') . " AS b on a.shop_id = b.shop_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as &$row){
		switch($row['user_type'])
		{
			case 1:
				$row['type_name'] = '管理员';
				break;
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
	$strsql = "SELECT shop_name ,shop_id FROM ". $GLOBALS['gdb']->fun_table('shop')." WHERE company_id = ".$GLOBALS['_SESSION']['login_cid']." ORDER BY shop_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

?>