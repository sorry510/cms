<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr = array();
$arrkey = array();
$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id );

$strsql = "SELECT card_ticket_id,ticket_type,ticket_money_id,ticket_goods_id,card_ticket_atime,card_ticket_edate,c_ticket_name,c_ticket_value,c_ticket_limit,c_ticket_days,c_ticket_begin,c_mgoods_id,c_mgoods_name FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id = ".$intcard_id." and card_ticket_state=1 and card_ticket_edate>".time()." order by ticket_type asc,card_ticket_edate asc";

// echo $strsql;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

if(!empty($arr)){
	for($i=0; $i<count($arr); $i++){
		if($arr[$i]['c_ticket_begin']=='2' && date('Y-m-d',$arr[$i]['card_ticket_atime'])==date('Y-m-d',time())){
			// unset($arr[$i]);
			// array_splice($arr, $i, 1);
			$arrkey[] = $i;
		}
	}
}
for($k=0;$k<count($arrkey);$k++){
	unset($arr[$arrkey[$k]]);
	// array_splice($arr, $arrkey[$k], 1);
}
echo json_encode($arr);
