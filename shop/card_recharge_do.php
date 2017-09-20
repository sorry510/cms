<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

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
$strpay_type = api_value_post('pay_type');
$intpay_type = api_value_int0($strpay_type);
$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);

$struser_name = userName();//操作员姓名
$arrconfig = companyConfig();//!=1代表不启用
$reward_flag = $arrconfig['reward_flag'];
$score_flag = $arrconfig['score_flag'];
$intscore = 0;
if($score_flag == 1){
	$intscore = floor($deccash);
}
$intnow = time();
$card_record_code = uniqid(time());//唯一编码

$intreturn = 0;

if($strmoney == '' || $strcash == ''){
	$intreturn = 5;
}

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
	$strsql = "SELECT card_id,card_code,card_sex, card_name,card_phone,s_card_ymoney,card_type_id,c_card_type_name,c_card_type_discount FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_id = ".$intcard_id." limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
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
	// 充值code码uniqid(time())
	$strsql = "INSERT INTO ".$gdb->fun_table2('card_record')." (card_id,shop_id,card_record_code,card_record_type,card_record_cmoney,card_record_smoney,card_record_emoney,card_record_pay,".$card_pay.",card_record_score,card_record_atime,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex,c_user_id,c_user_name,card_record_state) VALUE (".$intcard_id.",".$GLOBALS['_SESSION']['login_sid'].",'".$card_record_code."',1,".$decmoney.",".$deccash.",".$arr['s_card_ymoney'].",".$intpay_type.",".$deccash.",".$intscore.",".$intnow.",".$arr['card_type_id'].",'".$arr['c_card_type_name']."',".$arr['c_card_type_discount'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$arr['card_sex'].",".$GLOBALS['_SESSION']['login_id'].",'".$struser_name."',1)";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 3;
	}else{
		$record_id = mysql_insert_id();
	}
}
// 充值提成
if($intreturn == 0 && $intworker_id != 0 && $reward_flag == 1){
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
				$decgroup_reward_fill = $arrreward['group_reward_pfill'] * $decsmoney/100;
			}
	
			if($decgroup_reward_fill != 0){
				$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_type_id,c_card_type_name,c_card_id,c_card_code,c_card_name,c_card_phone,c_card_record_id,c_card_record_code,c_card_record_smoney) VALUES (".$intworker_id.",".$GLOBALS['_SESSION']['login_sid'].",2,".$decgroup_reward_fill.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$intcard_type_id.",'".$strcard_type_name."',".$arr['card_id'].",'".$arr['card_code']."','".$arr['card_name']."','".$arr['card_phone']."',".$record_id.",'".$card_record_code."',".$deccash.")";
				// echo $strsql;
				$hresult = $gdb->fun_do($strsql);
				if($hresult == false){
					$intreturn = 6;
				}
			}
		}
	}
}

echo $intreturn;
?>