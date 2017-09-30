<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);

//require('../inc_path.php');
//require(C_ROOT . '/_include/inc_init.php');
require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");


//计算得出通知验证结果
//$postarr = $_GET;

$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();

if($verify_result) {//验证成功

	//pay_result_do($postarr);
  

	echo "<script language='javascript' type='text/javascript'>";  
	echo "window.location.href='".$GLOBALS['gconfig']['project']['url_pc_test']."/cart_finish.php'";  
	echo "</script>";  

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "支付失败请联系店家";
}
?>
      <!--  -->