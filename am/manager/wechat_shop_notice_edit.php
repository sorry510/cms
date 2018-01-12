<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return;
}

$strchannel = 'wshop';
$strid = api_value_get('id');
$intid = api_value_int0($strid);

$gtemplate->fun_assign('edit', get_edit());
$gtemplate->fun_show('wechat_shop_notice_edit');

function get_edit(){
	$arr = array();

	$strsql = "SELECT wnotice_id,wnotice_content,wnotice_title FROM " . $GLOBALS['gdb']->fun_table2('wnotice')." where wnotice_id = " .$GLOBALS['intid'];

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}
?>