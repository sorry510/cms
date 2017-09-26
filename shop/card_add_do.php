<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_name = api_value_post('card_name');
$sqlcard_name = $gdb->fun_escape($strcard_name);
$strcard_sex = api_value_post('card_sex');
$intcard_sex = api_value_int0($strcard_sex);
$strcard_phone = api_value_post('card_phone');
$sqlcard_phone = $gdb->fun_escape($strcard_phone);
$strcard_birthday = api_value_post('card_birthday');
$intcard_birthday_date = strtotime($strcard_birthday)?strtotime($strcard_birthday):0;
$arrcard_birthday = explode("-", $strcard_birthday);
if(isset($arrcard_birthday[1])){
	$intcard_birthday_month = api_value_int0($arrcard_birthday[1]);
}else{
	$intcard_birthday_month = 0;
}
if(isset($arrcard_birthday[2])){
	$intcard_birthday_day = api_value_int0($arrcard_birthday[2]);
}else{
	$intcard_birthday_day = 0;
}
$strcard_passsword_state = api_value_post('pwd_state');
$intcard_passsword_state = api_value_int0($strcard_passsword_state);
$strcard_password = api_value_post('card_password');
$sqlcard_password = $gdb->fun_escape($strcard_password);
$strcard_code = api_value_post('card_code');
$sqlcard_code = $gdb->fun_escape($strcard_code);
$strcard_ikey = api_value_post('card_ikey');
$sqlcard_ikey = $gdb->fun_escape($strcard_ikey);
$strcard_edate = api_value_post('card_edate');
$intcard_edate = strtotime($strcard_edate)?strtotime($strcard_edate):0;;

$strcard_identity = api_value_post('card_identity');
$sqlcard_identity = $gdb->fun_escape($strcard_identity);
$strcard_memo = api_value_post('card_memo');
$sqlcard_memo = $gdb->fun_escape($strcard_memo);
$strcard_carcode = api_value_post('card_carcode');
$sqlcard_carcode = $gdb->fun_escape($strcard_carcode);
$strcard_worker_id = api_value_post('worker_id');
$intcard_worker_id = api_value_int0($strcard_worker_id);

$intnow = time();
$intreturn = 0;

if($strcard_name == '' || $strcard_phone == ''){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (shop_id,card_name, card_sex, card_phone,card_carcode,card_birthday_date, card_birthday_month,card_birthday_day, card_password_state, card_password, card_code, card_ikey, card_atime,card_edate,card_identity,card_memo, worker_id, card_state,card_ltime) VALUES (".$GLOBALS['_SESSION']['login_sid'].",'" . $sqlcard_name . "'," .$intcard_sex. ", '" . $sqlcard_phone . "','".$sqlcard_carcode."'," . $intcard_birthday_date . ", " . $intcard_birthday_month . ", ".$intcard_birthday_day.", ".$intcard_passsword_state.", '".$sqlcard_password."','".$sqlcard_code."','".$sqlcard_ikey."', ".$intnow.",".$intcard_edate.", '.".$sqlcard_identity."','".$sqlcard_memo."',".$intcard_worker_id.",1,".$intnow.")";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult){
		$intcard_id = mysql_insert_id();
	}else{
		$intreturn = 2;
	}
}

if($intreturn == 0){
	$strphoto_name = $GLOBALS['_SESSION']['login_sid'].'-'.$intcard_id;
	$strext = strtolower(strrchr($_FILES['card_photo']['name'], '.'));
	$intlength = $_FILES['card_photo']['size'];
	if(!empty($strext)){
		if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
			if($intlength < 1024000) {
				$hresult = move_uploaded_file($_FILES['card_photo']['tmp_name'], $gconfig['path']['card_photo'] . '/'. $strphoto_name . $strext);
				if($hresult) {
					$strsql = "UPDATE " . $gdb->fun_table2('card') . " SET card_photo_file = '".$strphoto_name.$strext."' WHERE card_id = " . $intcard_id . " LIMIT 1";
					// echo $strsql;
					$hresult = $gdb->fun_do($strsql);
					if(!$hresult) {
						$intreturn = 3;
					}
				}else{
					$intreturn = 4;//移动文件失败
				}
			}else{
				$intreturn = 5;//文件过大
			}
		}else{
			$intreturn = 6;//文件后缀不对
		}
	}
}
// 开卡提成
if($intreturn == 0 && $intcard_worker_id != 0){
	$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intcard_worker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$intcard_worker_id = $arr['worker_id'];
		$intworker_group_id = $arr['worker_group_id'];
		$strworker_name = $arr['worker_name'];
		$strworker_group_name = $arr['worker_group_name'];
		$strsql = "SELECT group_reward_create FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=".$GLOBALS['_SESSION']['login_sid'];
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$decgroup_reward_create = $arr['group_reward_create'];
		}else{
			$strsql = "SELECT group_reward_create FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=0";
			$hresult = $gdb->fun_query($strsql);
			$arr = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$decgroup_reward_create = $arr['group_reward_create'];
			}else{
				$decgroup_reward_create = 0;
			}
		}
		// echo $decgroup_reward_create;
		if($decgroup_reward_create != 0){
			$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone) VALUES (".$intcard_worker_id.",".$GLOBALS['_SESSION']['login_sid'].",1,".$decgroup_reward_create.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$intcard_id.",'".$gdb->fun_escape($strcard_code)."','".$gdb->fun_escape($strcard_name)."','".$gdb->fun_escape($strcard_phone)."')";
			// echo $strsql;
			$gdb->fun_do($strsql);
		}
	}
}
echo $intreturn;
?>