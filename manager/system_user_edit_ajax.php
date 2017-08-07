<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$struser_id = api_value_get('user_id');
$intuser_id = api_value_int0($struser_id);


$strsql = "SELECT a.*, b.shop_name FROM (SELECT user_id, shop_id, user_type, user_account, user_name FROM ". $GLOBALS['gdb']->fun_table2('user')." WHERE user_id = " . $GLOBALS['intuser_id'].") as a left join ".$GLOBALS['gdb']->fun_table('shop')." as b on a.shop_id = b.shop_id";
// echo $strsql;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

if(!empty($arr)){
	if($arr['user_type']==1){
		$arr['type'] = '管理员';
	}else if($arr['user_type']==2){
		$arr['type'] = '店长';
	}else{
		$arr['type'] = '收银员';
	}
}

echo json_encode($arr);
?>