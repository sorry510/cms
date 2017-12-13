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
$arrwpay = laimi_config_wpay();
var_dump($arrwpay);

