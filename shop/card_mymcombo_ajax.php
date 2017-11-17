<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$strcard_id = api_value_get('id');
$intcard_id = api_value_int0($strcard_id );

$strsql = "SELECT card_mcombo_id,card_mcombo_type,mcombo_id,card_mcombo_ccount,mgoods_id,card_mcombo_gcount,c_mcombo_name,c_mgoods_name,c_mgoods_price,c_mgoods_cprice,c_mcombo_type FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_id = ".$intcard_id." and (card_mcombo_cedate>=".time()." or card_mcombo_cedate=0) order by mcombo_id desc,card_mcombo_atime asc";
// echo $strsql;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

echo json_encode($arr);
