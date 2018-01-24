<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
require_once C_ROOT . '/sms/api_sdk/vendor/autoload.php';
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;

$strcard_id = api_value_post('card_id');
$intcard_id = api_value_int0($strcard_id);
$strcard_type_id = api_value_post('card_type_id');
$intcard_type_id = api_value_int0($strcard_type_id);
$strcard_type_discount = api_value_post('card_type_discount');
$deccard_type_discount = api_value_decimal($strcard_type_discount,1);
$strmoney = api_value_post('money');
$decmoney = api_value_decimal($strmoney, 2);//充值金额
$strcash = api_value_post('cash');
$deccash = api_value_decimal($strcash, 2);//实收金额
$strsmoney2 = api_value_post('relmoney');//实际付款价2
$decsmoney2 = api_value_decimal($strsmoney2, 2);
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);

$arr = array();
$struser_name = '';
$strsql = "SELECT user_name FROM ".$GLOBALS['gdb']->fun_table2('user'). " WHERE user_id=".api_value_int0($GLOBALS['_SESSION']['login_id']). " LIMIT 1";
$hresult = $GLOBALS['gdb']->fun_query($strsql);
$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
if(!empty($arr)){
	$struser_name = $arr['user_name'];//操作员姓名;
}
$intscore = 0;
if($GLOBALS['gtrade']['score_module'] == 1 && $GLOBALS['gtrade']['score_flag'] == 1){
	$intscore = floor($deccash);
}
$intnow = time();
// $card_record_code = api_value_int0($GLOBALS['_SESSION']['login_id']).time();//用户id+时间戳
$strout_trade_no = api_value_post('out_trade_no');
$card_record_code = $gdb->fun_escape($strout_trade_no);//用户id+时间戳

$intreturn = 0;

// 查询card分类信息
if($intreturn == 0){
	$strsql = "SELECT card_type_name,card_type_discount FROM ". $GLOBALS['gdb']->fun_table2('card_type') . " where card_type_id = ".$intcard_type_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$strcard_type_name =  $arr['card_type_name'];
		// $deccard_type_discount = $arr['card_type_discount'];
	}else{
		$intreturn = 4;
	}
}

// 更新card,记录积分
if($intreturn == 0) {
	$strsql = "UPDATE ".$gdb->fun_table2('card')." SET c_card_type_name='".$strcard_type_name."', card_type_id = ".$intcard_type_id.",c_card_type_discount=".$deccard_type_discount.",s_card_smoney=s_card_smoney+".$deccash.",s_card_ymoney=s_card_ymoney+".$decmoney.",s_card_sscore=s_card_sscore+".$intscore.",s_card_yscore=s_card_yscore+".$intscore.",card_ctime=".$intnow.",card_ltime=".$intnow." where card_id=".$intcard_id." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}
//查询card信息
if($intreturn == 0){
	$strsql = "SELECT card_id,card_okey,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrcard = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr)){
		$intreturn = 2;
	}
}
//插入消费记录
if($intreturn == 0){
	$card_pay = '';
	switch($intpay_type)
	{
		case 1:
			$card_pay = "card_record_xianjin";break;
		case 2:
			$card_pay = "card_record_yinhang";break;
		case 3:
			$card_pay = "card_record_weixin";break;
		case 4:
			$card_pay = "card_record_zhifubao";break;
		default:
			break;
	}

	$strsql = "INSERT INTO ".$gdb->fun_table2('card_record')." (card_id,shop_id,card_record_code,card_record_type,card_record_cmoney,card_record_smoney,card_record_smoney2,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".$card_record_code."',1,".$decmoney.",".$deccash.",".$decsmoney2.",".$arrcard['s_card_ymoney'].",".$intpay_type.",".$deccash.",".$intscore.",".$intnow.",".$arrcard['card_type_id'].",'".$arrcard['c_card_type_name']."',".$arrcard['c_card_type_discount'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrcard['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$struser_name."',1)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$record_id = $GLOBALS['gdb']->fun_insert_id();
	}
}

// 充值提成
if($GLOBALS['gtrade']['worker_module'] == 1 && $GLOBALS['gtrade']['worker_flag'] == 1){
	if($intreturn == 0 && $intworker_id != 0){
		$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intworker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
		$hresult = $gdb->fun_query($strsql);
		$arrworker = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arrworker)){
			$intworker_id = $arrworker['worker_id'];
			$intworker_group_id = $arrworker['worker_group_id'];
			$strworker_name = $arrworker['worker_name'];
			$strworker_group_name = $arrworker['worker_group_name'];
			$strsql = "SELECT group_reward_fill,group_reward_pfill FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
			$hresult = $gdb->fun_query($strsql);
			$arrreward = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arrreward)){
				$decgroup_reward_fill = 0;
				if($arrreward['group_reward_fill'] != 0){
					$decgroup_reward_fill = $arrreward['group_reward_fill'];
				}
				if($arrreward['group_reward_pfill'] != 0){
					$decgroup_reward_fill = $arrreward['group_reward_pfill'] * $deccash/100;
				}
		
				if($decgroup_reward_fill != 0){
					$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_card_record_id,c_card_record_code,c_card_record_smoney) VALUES (".$intworker_id.",".$GLOBALS['_SESSION']['login_sid'].",2,".$decgroup_reward_fill.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$arrcard['card_id'].",'".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$record_id.",'".$card_record_code."',".$deccash.")";
					$hresult = $gdb->fun_do($strsql);
					if($hresult == false){
						$intreturn = 6;
					}
				}
			}
		}
	}
}
//发送短信
if($GLOBALS['gtrade']['sms_module'] == 1 && $GLOBALS['gtrade']['sms_flag'] == 1){
	if($intreturn == 0){
	  $intsms_ycount = 0;
	  $strsql = "SELECT company_sms_ycount FROM ".$GLOBALS['gdb']->fun_table('company')." WHERE company_id=".api_value_int0($GLOBALS['_SESSION']['login_cid']);
	  $hresult = $GLOBALS['gdb']->fun_query($strsql);
	  $arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	  if(!empty($arr)){
	    $intsms_ycount = $arr['company_sms_ycount'];
	  }

		if($intsms_ycount > 0){
		  // 加载区域结点配置
		  Config::load();

		  /**
		   * Class SmsDemo
		   *
		   * @property \Aliyun\Core\DefaultAcsClient acsClient
		   */
		  class SmsDemo
		  {

		      /**
		       * 构造器
		       *
		       * @param string $accessKeyId 必填，AccessKeyId
		       * @param string $accessKeySecret 必填，AccessKeySecret
		       */
		      public function __construct($accessKeyId, $accessKeySecret)
		      {

		          // 短信API产品名
		          $product = "Dysmsapi";

		          // 短信API产品域名
		          $domain = "dysmsapi.aliyuncs.com";

		          // 暂时不支持多Region
		          $region = "cn-hangzhou";

		          // 服务结点
		          $endPointName = "cn-hangzhou";

		          // 初始化用户Profile实例
		          $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

		          // 增加服务结点
		          DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

		          // 初始化AcsClient用于发起请求
		          $this->acsClient = new DefaultAcsClient($profile);
		      }

		      /**
		       * 发送短信范例
		       *
		       * @param string $signName <p>
		       * 必填, 短信签名，应严格"签名名称"填写，参考：<a href="https://dysms.console.aliyun.com/dysms.htm#/sign">短信签名页</a>
		       * </p>
		       * @param string $templateCode <p>
		       * 必填, 短信模板Code，应严格按"模板CODE"填写, 参考：<a href="https://dysms.console.aliyun.com/dysms.htm#/template">短信模板页</a>
		       * (e.g. SMS_0001)
		       * </p>
		       * @param string $phoneNumbers 必填, 短信接收号码 (e.g. 12345678901)
		       * @param array|null $templateParam <p>
		       * 选填, 假如模板中存在变量需要替换则为必填项 (e.g. Array("code"=>"12345", "product"=>"阿里通信"))
		       * </p>
		       * @param string|null $outId [optional] 选填, 发送短信流水号 (e.g. 1234)
		       * @return stdClass
		       */
		      public function sendSms($signName, $templateCode, $phoneNumbers, $templateParam = null, $outId = null) {

		          // 初始化SendSmsRequest实例用于设置发送短信的参数
		          $request = new SendSmsRequest();

		          // 必填，设置雉短信接收号码
		          $request->setPhoneNumbers($phoneNumbers);

		          // 必填，设置签名名称
		          $request->setSignName($signName);

		          // 必填，设置模板CODE
		          $request->setTemplateCode($templateCode);

		          // 可选，设置模板参数
		          if($templateParam) {
		              $request->setTemplateParam(json_encode($templateParam));
		          }

		          // 可选，设置流水号
		          if($outId) {
		              $request->setOutId($outId);
		          }

		          // 发起访问请求
		          $acsResponse = $this->acsClient->getAcsResponse($request);

		          // 打印请求结果
		          // var_dump($acsResponse);

		          return $acsResponse;

		      }

		      /**
		       * 查询短信发送情况范例
		       *
		       * @param string $phoneNumbers 必填, 短信接收号码 (e.g. 12345678901)
		       * @param string $sendDate 必填，短信发送日期，格式Ymd，支持近30天记录查询 (e.g. 20170710)
		       * @param int $pageSize 必填，分页大小
		       * @param int $currentPage 必填，当前页码
		       * @param string $bizId 选填，短信发送流水号 (e.g. abc123)
		       * @return stdClass
		       */
		      public function queryDetails($phoneNumbers, $sendDate, $pageSize = 10, $currentPage = 1, $bizId=null) {

		          // 初始化QuerySendDetailsRequest实例用于设置短信查询的参数
		          $request = new QuerySendDetailsRequest();

		          // 必填，短信接收号码
		          $request->setPhoneNumber($phoneNumbers);

		          // 选填，短信发送流水号
		          $request->setBizId($bizId);

		          // 必填，短信发送日期，支持近30天记录查询，格式Ymd
		          $request->setSendDate($sendDate);

		          // 必填，分页大小
		          $request->setPageSize($pageSize);

		          // 必填，当前页码
		          $request->setCurrentPage($currentPage);

		          // 发起访问请求
		          $acsResponse = $this->acsClient->getAcsResponse($request);

		          // 打印请求结果
		          // var_dump($acsResponse);

		          return $acsResponse;
		      }

		  }

		  if($intreturn == 0){
		      $demo = new SmsDemo(
		          "GWZek0XmIcJAOKnD",
		          "pnHKa0sCZunORgfxYDdKqTwOVc1WUB"
		      );

		      $strphone = $arrcard['card_phone'];
					$strsmscode = 'SMS_122284337';
		      $strcard_name = $arrcard['card_name'];
		      $strcard_code = $arrcard['card_code'];
		      $dechmoney = $decmoney;
		      $decymoney = $arrcard['s_card_ymoney'];
		      $response = $demo->sendSms(
		          $GLOBALS['gtrade']['sms_sign'], // 短信签名
		          $strsmscode, // 短信模板编号
		          $strphone, // 短信接收者
		          Array(  // 短信模板中字段的值
		              "cardname"=> $strcard_name,
		              "cardcode"=> $strcard_code,
		              "cardhmoney"=> $dechmoney,
		              "cardymoney"=> $decymoney,
		              "shop"=> "(".$GLOBALS['gshopname'].")"
		          )
		          // "123"
		      );
		      if($response->Message == 'OK'){
	          $strsql = "UPDATE ".$GLOBALS['gdb']->fun_table('company'). " SET company_sms_ycount=company_sms_ycount-1 WHERE company_id=".api_value_int0($GLOBALS['_SESSION']['login_cid']);
	          $hresult = $gdb->fun_do($strsql);
		      }
		  }
		}
	}
}
//微信推送
if($GLOBALS['gtrade']['wmp_module'] == 1 && $arrcard['card_okey'] != '') {
	$arrwechat_config = laimi_config_weixin();
	$ac = api_value_https('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$arrwechat_config['appid'].'&secret='.$arrwechat_config['appsecret']);
	$wxt = json_decode($ac, true);
	$arrwx_data = array(
	  'open_id' => $arrcard['card_okey'],
	  'token' => $wxt['access_token'],
	  'template_id' => '28xbLti0nk9ERasD1kKQBp2p_QM1oWTuyC9LiIIgios',
	  'url' => 'http://weixin.test.laimisoft.com/'.$GLOBALS['_SESSION']['login_code'].'/s_push.php?company='.$GLOBALS['_SESSION']['login_cid'].'&goto=center'
	  // 'url' => 'http://weixin.test.laimisoft.com/am/center_shop_record.php?id=7'
	);
	$arrtpl_data = array(
	    'first' => array(
	        'value' => '尊敬的' . $arrcard['card_name'].'，您已充值成功！',
	        // 'color' => '#FF0000'
	    ),
	    'keyword1' => array(
	        'value' => $arrcard['card_code'],
	    ),
	    'keyword2' => array(
	        'value' => $decmoney . "元",
	    ),
	    'keyword3' => array(
	        'value' => $arrcard['s_card_ymoney'] . "元",
	    ),
	    'keyword4' => array(
	        'value' => $GLOBALS['gcompanyname'] . "——" . $GLOBALS['gshopname'],//仅限shop目录用
	    ),
	    'keyword5' => array(
	        'value' => date("Y-m-d H:i", $intnow),
	    ),
	    'remark' => array(
	        'value' => '更多请点击查看详情',
	    )
	);
	laimi_wx_template_msg($arrwx_data, $arrtpl_data);
}
if($intreturn == 0){
	$arr = array(
		'type' => '1',
		'id' => $record_id
		);
	echo json_encode($arr);
}else{
	$arr = array(
		'int' => $intreturn
		);
	echo json_encode($arr);
}

?>