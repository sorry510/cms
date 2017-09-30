<?php
require_once "lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";


$notify = new NativePay();


//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$Body = $_POST['body'];
$Attach = $_POST['address']."|WX_NATIVE";
$Out_trade_no = $_POST['out_trade_no'];
$Total_fee = $_POST['total_fee'];
$Product_id = $_POST['product_id'];

//echo $Body.'|'.$Attach.'|'.$Out_trade_no.'|'.$Total_fee.'|'.$Product_id;

$input = new WxPayUnifiedOrder();
$input->SetBody($Body);
$input->SetAttach($Attach);
$input->SetOut_trade_no($Out_trade_no);
$input->SetTotal_fee($Total_fee);//以分为单位只能为整数
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
//$input->SetGoods_tag("test");

$input->SetNotify_url("http://test.360rj.net/paySDK/wx_pay/notify.php");
//$input->SetNotify_url("http://test.360rj.net/notify_url.php");
//$input->SetNotify_url("http://test.360rj.net/wx_notify.php");

$input->SetTrade_type("NATIVE");
$input->SetProduct_id($Product_id);
$result = $notify->GetPayUrl($input);

$url2 = $result["code_url"];
echo urlencode($url2);
?>
