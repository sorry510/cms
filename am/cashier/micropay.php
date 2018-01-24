<?php
error_reporting(0);
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$arrwpay = laimi_config_pay();
require_once C_ROOT ."/paysdk/wx_pay/lib/WxPay.Api.php";
require_once C_ROOT ."/paysdk/wx_pay/WxPay.MicroPay.php";

$strauth_code = api_value_post('auth_code');
$strout_trade_no = api_value_post('out_trade_no');
$strtotal_fee = api_value_post('total_amount');//单位元

$input = new WxPayMicroPay();
$input->SetAuth_code($strauth_code);
$input->SetBody("支付信息");
$input->SetTotal_fee("1");
$input->SetOut_trade_no($strout_trade_no);

$microPay = new MicroPay();
$result = $microPay->pay($input);
echo json_encode($result);
// $result = WxPayApi::micropay($input, 5);
// var_dump($result);
// printf_info($result);
?>