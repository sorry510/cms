<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$intid = 0;
$xml = file_get_contents('php://input');
libxml_disable_entity_loader(true);//阻止外部xml注入
$arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
if($arrattach = json_decode($arr['attach'], true)){
	$intid = $arrattach['cid'];
}
$strsystem_code = '';
$strsql = "SELECT system_code FROM ".$gdb->fun_table('company')." WHERE company_id=".$intid;
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arrcompany = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arrcompany)){
	$strsystem_code = $arrcompany['system_code'];
}
$GLOBALS['_SESSION']['login_cid'] = $intid;
$strprefix2 = substr($strsystem_code, 0, 5) . "_"
		. str_pad(api_value_int0($intid), 4, '0', STR_PAD_LEFT) . '_';
$gdb->pubprefix2 = $strprefix2;
$arrwpay = laimi_config_wpay($intid);
require_once C_ROOT . "/wx_pay/lib/WxPay.Api.php";
require_once C_ROOT . '/wx_pay/lib/WxPay.Notify.php';
require_once C_ROOT . '/wx_pay/log.php';

//初始化日志
$logHandler= new CLogFileHandler(C_ROOT ."/wx_pay/logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
// Log::DEBUG(json_encode($arr));

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		// Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		//业务逻辑
		laimi_pay_return($data);
		echo exit('<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>');
		return true;
	}
}

// Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
