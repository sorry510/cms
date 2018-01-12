<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$arrpayconfig = laimi_config_pay();

$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => $arrpayconfig['alipaysign_type'],

		//支付宝公钥
		'alipay_public_key' => $arrpayconfig['alipay_public_key'],

		//商户私钥
		'merchant_private_key' => $arrpayconfig['alipay_private_key'],

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID
		'app_id' => $arrpayconfig['alipay_appid'],

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => "http://www.baidu.com",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);