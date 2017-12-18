<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// $arr = '1';
// class WxPayApi
// {
// 	// public $db = null;

// 	function __construct(&$obj) {
// 		// $this->db = $obj;
// 		// self::init();
// 		// echo $GLOBALS['arr'];
// 		// echo $this->a;
// 	}
// 	public static function init(){
// 		echo $GLOBALS['arr'];
// 	}
// 	// function test(){
// 	// 	$strsql = "select * from ".$this->db->fun_table2('card');
// 	// 	$hresult = $this->db->fun_query($strsql);
// 	// 	$arr = $this->db->fun_fetch_assoc($hresult);
// 	// 	return $arr;
// 	// }
// }
// $WxPayApi = new WxPayApi($gdb);
// var_dump($WxPayApi->test());
// echo WxPayApi::init();
// var_dump($GLOBALS['_SESSION']);
// $json = '{"appid":"wxbeda5ab3d65c0ab1","attach":"{\"address\":3,\"paytype\":\"WX_JSAPI\",\"worder_get\":2,\"cid\":1}","bank_type":"CCB_DEBIT","cash_fee":"1","fee_type":"CNY","is_subscribe":"Y","mch_id":"1244649802","nonce_str":"ht3v5abj6zv5x8i6x191t5hrnem2szki","openid":"oC8-sjl_agIH6gB9WvpOdf_jiDow","out_trade_no":"35T1513244303","result_code":"SUCCESS","return_code":"SUCCESS","sign":"BA6100BE9EBB522CC151BF0367081311","time_end":"20171214173829","total_fee":"1","trade_type":"JSAPI","transaction_id":"4200000026201712144154750288"}
// ';
// echo $json; return;
// $arr = json_decode($json, true);
// $out_trade_no = $arr['out_trade_no'];
// $strcardid = substr($out_trade_no, 0, strpos($out_trade_no, 'T'));
// echo $strcardid;

// echo laimi_pay_return($arr);

$arrweixin = laimi_config_weixin();

// var_dump($arrweixin);
// echo "<script>window.location='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$arrweixin['appid']."&secret=".$arrweixin['appsecret']."';</script>";
// var_dump($intid);