<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$arrwpay = laimi_config_wpay();

require_once "wx_pay/WxPay.Api.php";
require_once "wx_pay/WxPay.JsApiPay.php";

//接收数据,openid是get接收，保持一致用get
$straddress = api_value_get('address');
$intaddress = api_value_int0($straddress);
/*$strtotal_fee = api_value_get('total_fee');
$inttotal_fee = api_value_int1($strtotal_fee);*/

$arrattach = array(
	'address' => $intaddress
	);
//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

$strbody = '我的世界';
$strattach = json_encode($arrattach);
$strout_trade_no = 'abcd' . api_value_int0($GLOBALS['_SESSION']['login_id']) . 'T' . time();//订单号，需要保证唯一性
// $inttotal_fee = laimi_wgoods_allprice();
$inttotal_fee = 1;//测试的1分钱

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($strbody);
$input->SetAttach($strattach);
$input->SetOut_trade_no($strout_trade_no);
$input->SetTotal_fee($inttotal_fee);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
// $input->SetGoods_tag("test");
$input->SetNotify_url("http://test.axin.cc/mshop/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
// $editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>微信支付</title>
<script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				// alert(res.err_code+res.err_desc+res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:ok"){
          window.location.href = "./cart_ok.php";
        }else{
          //返回跳转到订单详情页面
          alert('支付失败');
          window.location.href = "./cart.php";
        }
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall);
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	window.onload = function(){
		callpay();
	}
</script>
<script type="text/javascript">
	//获取共享地址
	// function editAddress()
	// {
	// 	WeixinJSBridge.invoke(
	// 		'editAddress',
	// 		<?php //echo $editAddress; ?>,
	// 		function(res){
	// 			var value1 = res.proviceFirstStageName;
	// 			var value2 = res.addressCitySecondStageName;
	// 			var value3 = res.addressCountiesThirdStageName;
	// 			var value4 = res.addressDetailInfo;
	// 			var tel = res.telNumber;
				
	// 			alert(value1 + value2 + value3 + value4 + ":" + tel);
	// 		}
	// 	);
	// }
	
	// window.onload = function(){
	// 	if (typeof WeixinJSBridge == "undefined"){
	// 	    if( document.addEventListener ){
	// 	        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
	// 	    }else if (document.attachEvent){
	// 	        document.attachEvent('WeixinJSBridgeReady', editAddress); 
	// 	        document.attachEvent('onWeixinJSBridgeReady', editAddress);
	// 	    }
	// 	}else{
	// 		editAddress();
	// 	}
	// };
	
</script>
</head>
<body>
<!--     <br/>
    <font color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px">1分</span>钱</b></font><br/><br/>
	<div align="center">
		<button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
	</div> -->
</body>
</html>