<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strcard_name = api_value_post('txtname');
$sqlcard_name = $gdb->fun_escape($strcard_name);
$strcard_sex = api_value_post('txtsex');
$intcard_sex = api_value_int0($strcard_sex);
$strcard_phone = api_value_post('txtphone');
$sqlcard_phone = $gdb->fun_escape($strcard_phone);
$strcard_birthday = api_value_post('txtbirthday');
$intcard_birthday_date = strtotime($strcard_birthday) ? strtotime($strcard_birthday) : 0;
$strcard_passsword_state = api_value_post('txtpwdstate');
$intcard_passsword_state = api_value_int0($strcard_passsword_state);
$strcard_password = api_value_post('txtpassword');
$sqlcard_password = $gdb->fun_escape($strcard_password);
$strcard_code = api_value_post('txtcode');
$sqlcard_code = $gdb->fun_escape($strcard_code);
$strcard_ikey = api_value_post('txtikey');
$sqlcard_ikey = $gdb->fun_escape($strcard_ikey);
$strcard_edate = api_value_post('txtedate');
$intcard_edate = strtotime($strcard_edate) ? strtotime($strcard_edate) : 0;
$strcard_link = api_value_post('txtlink');
$sqlcard_link = $gdb->fun_escape($strcard_link);
$strcard_identity = api_value_post('txtidentity');
$sqlcard_identity = $gdb->fun_escape($strcard_identity);
$strcard_memo = api_value_post('txtmemo');
$sqlcard_memo = $gdb->fun_escape($strcard_memo);
// $strcard_carcode = api_value_post('card_carcode');
// $sqlcard_carcode = $gdb->fun_escape($strcard_carcode);
$strcard_worker_id = api_value_post('txtworker');
$intcard_worker_id = api_value_int0($strcard_worker_id);
$strphoto = api_value_post('txtphoto');
$sqlphoto = $gdb->fun_escape($strphoto);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$intreturn = 0;

$arrcard_birthday = explode("-", $strcard_birthday);
$intcard_birthday_month = 0;
if(isset($arrcard_birthday[1])){
	$intcard_birthday_month = api_value_int0($arrcard_birthday[1]);
}
$intcard_birthday_day = 0;
if(isset($arrcard_birthday[2])){
	$intcard_birthday_day = api_value_int0($arrcard_birthday[2]);
}

if($intcard_passsword_state != 1){
	$sqlcard_password = '';
}

$intnow = time();


if($strcard_name == '' || $strcard_phone == ''){
	$intreturn = 1;
}

if($intreturn == 0){
	$strsql = "INSERT INTO " . $gdb->fun_table2('card') . " (shop_id,card_name, card_sex, card_phone,	card_link,card_birthday_date, card_birthday_month,card_birthday_day, card_password_state, card_password, card_code, card_ikey, card_atime,card_edate,card_identity,card_memo, worker_id, card_state,card_ltime) VALUES (".$intshop.",'" . $sqlcard_name . "'," .$intcard_sex. ", '" . $sqlcard_phone . "','".$sqlcard_link."'," . $intcard_birthday_date . ", " . $intcard_birthday_month . ", ".$intcard_birthday_day.", ".$intcard_passsword_state.", '".$sqlcard_password."','".$sqlcard_code."','".$sqlcard_ikey."', ".$intnow.",".$intcard_edate.", '".$sqlcard_identity."','".$sqlcard_memo."',".$intcard_worker_id.",1,".$intnow.")";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if($hresult){
		$intcard_id = mysql_insert_id();
	}else{
		$intreturn = 2;
	}
}
// 更新照片
if($intreturn == 0){
	$objfile = new FileClass();
	if(!empty($sqlphoto)){
		update_photo($objfile, $sqlphoto, 'card_photo_file');
	}
}

/**
 * $objfile 文件操作对象
 * $photo 源文件
 * $place 数据库对应字段名
 * $fix 目标文件名前缀
 */
function update_photo($objfile, $photo, $place, $fix = ''){
	$strtmpfile = $GLOBALS['gconfig']['photo'][0].$photo;
	$strext = strtolower(strrchr($photo, '.'));
	$strnewpath = $GLOBALS['gconfig']['image']['base'].$GLOBALS['_SESSION']['login_cid'].DIRECTORY_SEPARATOR."card".DIRECTORY_SEPARATOR;//目的文件夹
	$strnewfile = $fix.$GLOBALS['intshop']."_".$GLOBALS['intcard_id'].$strext;
	$hresult = $objfile -> moveFile($strtmpfile, $strnewpath.$strnewfile, true);
	if($hresult){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card')." SET ".$place." = '".$strnewfile."' where card_id=".$GLOBALS['intcard_id'];
		$GLOBALS['gdb']->fun_do($strsql);
		$objfile -> unlinkFile($strtmpfile);
	}
}

// 开卡提成
if(laimi_config_trade()['worker_module'] == 1 && laimi_config_trade()['worker_flag'] == 1){
	if($intreturn == 0 && $intcard_worker_id != 0){
		$strsql = "SELECT a.*,b.worker_group_name FROM (SELECT worker_id,worker_group_id,worker_name FROM " . $gdb->fun_table2('worker') . " where worker_id=" . $intcard_worker_id .") as a left join " . $gdb->fun_table2('worker_group') . " as b on a.worker_group_id = b.worker_group_id";
		$hresult = $gdb->fun_query($strsql);
		$arr = $gdb->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$intcard_worker_id = $arr['worker_id'];
			$intworker_group_id = $arr['worker_group_id'];
			$strworker_name = $arr['worker_name'];
			$strworker_group_name = $arr['worker_group_name'];
			$decgroup_reward_create = 0;
			$strsql = "SELECT group_reward_create FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=".$intshop;
			$hresult = $gdb->fun_query($strsql);
			$arr = $gdb->fun_fetch_assoc($hresult);
			if(!empty($arr)){
				$decgroup_reward_create = $arr['group_reward_create'];
			}else{
				// 当分店没有设置提成时，去总店取
				$strsql = "SELECT group_reward_create FROM " .$gdb->fun_table2('group_reward') . " where worker_group_id=".$intworker_group_id." and shop_id=0";
				$hresult = $gdb->fun_query($strsql);
				$arr = $gdb->fun_fetch_assoc($hresult);
				if(!empty($arr)){
					$decgroup_reward_create = $arr['group_reward_create'];
				}
			}
			if($decgroup_reward_create != 0){
				$strsql = "INSERT INTO " . $gdb->fun_table2('worker_reward') ." (worker_id,shop_id,worker_reward_type,worker_reward_money,worker_reward_state,worker_reward_atime,c_worker_group_id,c_worker_group_name,c_worker_name,c_card_id,c_card_code,c_card_name,c_card_phone) VALUES (".$intcard_worker_id.",".$GLOBALS['_SESSION']['login_sid'].",1,".$decgroup_reward_create.",1,".$intnow.",".$intworker_group_id.",'".$strworker_group_name."','".$strworker_name."',".$intcard_id.",'".$gdb->fun_escape($strcard_code)."','".$gdb->fun_escape($strcard_name)."','".$gdb->fun_escape($strcard_phone)."')";
				$gdb->fun_do($strsql);
			}
		}
	}
}
echo $intreturn;
?>