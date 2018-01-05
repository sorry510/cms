<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

// // $gtemplate->fun_show('test');
// $str = '{"appid":"wxbeda5ab3d65c0ab1","attach":"{\"address\":4,\"paytype\":\"WX_JSAPI\",\"worder_get\":2,\"cid\":1,\"parentid\":1}","bank_type":"CCB_DEBIT","cash_fee":"1","fee_type":"CNY","is_subscribe":"Y","mch_id":"1244649802","nonce_str":"at77g10ruy2f4gojjllovw41u0bn15d4","openid":"oC8-sjl_agIH6gB9WvpOdf_jiDow","out_trade_no":"4T1513759453","result_code":"SUCCESS","return_code":"SUCCESS","sign":"15B1509D21B166FCBACA52C6E1B92C43","time_end":"20171220164424","total_fee":"1","trade_type":"JSAPI","transaction_id":"4200000015201712207822260151"}';
// // echo $str;

// $data = json_decode($str, true);
// echo laimi_pay_return($data);
// $strsql = "SELECT sum(wcart_wgoods_count) as count FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = 0";
// $hresult = $GLOBALS['gdb']->fun_query($strsql);
// $arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
// var_dump($arr);
// if(empty($arr['count'])){
// 	echo 1;
// }
echo laimi_cart_count()['count'];