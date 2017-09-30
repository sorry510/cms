<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);


require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");

//计算得出通知验证结果

$postarr = $_POST;

$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功

    require('../inc_path.php');
    require(C_ROOT . '/_include/inc_init.php');
    //_include inc_function文件
    pay_result_do($postarr);
    
    if($intreturn == 0){
        echo "success";     //请不要修改或删除
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
?>