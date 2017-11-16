<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strid = api_value_post('txtid');
$intid = api_value_int0($strid);
$strtime = api_value_post('txttime');
$inttime = strtotime($strtime) ? strtotime($strtime) : 0;
$strworker_id = api_value_post('txtworker');
$intworker_id = api_value_int0($strworker_id);
$strquestion = api_value_post('txtquestion');
$sqlquestion = $gdb->fun_escape($strquestion);
$strresult = api_value_post('txtresult');
$sqlresult = $gdb->fun_escape($strresult);
$strplan = api_value_post('txtplan');
$sqlplan = $gdb->fun_escape($strplan);
$arrphoto = api_value_post('photo');
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$intreturn = 0;
$arr = array();
$arrcard = array();
$intage = 0;

$strsql = "SELECT card_id,card_type_id,c_card_type_name,c_card_type_discount,card_code,card_name,card_phone,card_sex,card_birthday_date FROM ".$gdb->fun_table2('card')." where card_id=".$intid;
$hresult = $gdb->fun_query($strsql);
$arrcard = $gdb->fun_fetch_assoc($hresult);
if(empty($arrcard)){
	$intreturn = 1;
}else{
	$intage = $arrcard['card_birthday_date'] != 0 ? date('Y', time()) - date('Y', $arrcard['card_birthday_date']) : 0;
}

$strsql = "SELECT worker_name FROM ".$gdb->fun_table2('worker')." where worker_id=".$intworker_id;
$hresult = $gdb->fun_query($strsql);
$arr= $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 2;
}else{
	$strworker_name = $arr['worker_name'];
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('card_history')." (card_id,card_record_id,worker_id,shop_id,card_history_question,card_history_result,card_history_plan,card_history_atime,c_card_type_id,c_card_type_name,c_card_code,c_card_name,c_card_phone,c_card_sex,c_card_age,c_worker_name) VALUES(".$arrcard['card_id'].",0,".$intworker_id.",".$intshop.",'".$sqlquestion."','".$sqlresult."','".$sqlplan."',".$inttime.",".$arrcard['card_type_id'].",'".$arrcard['c_card_type_name']."','".$arrcard['card_code']."','".$arrcard['card_name']."','".$arrcard['card_phone']."',".$arrcard['card_sex'].",".$intage.",'".$strworker_name."')";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if(!$hresult){
		$intreturn = 3;
	}else{
		$inthistory_id = mysql_insert_id();
	}
}

//更新照片
if($intreturn == 0){
	if(!empty($arrphoto)){
		$objfile = new FileClass();
		foreach($arrphoto as $key => $row){
			if($key > 4){
				break;
			}
			update_photo($objfile, $row['photo'], 'card_history_photo'.($key+1), ($key+1));
		}
	}
}

/**
 * $objfile 文件操作对象
 * $photo 源文件
 * $place 数据库对应字段名
 * $fix 目标文件名前缀或(后缀)
 */
function update_photo($objfile, $photo, $place, $fix = ''){
	$strtmpfile = $GLOBALS['gconfig']['photo'][0].$photo;
	$strext = strtolower(strrchr($photo, '.'));
	$strnewpath = $GLOBALS['gconfig']['image']['base'].$GLOBALS['_SESSION']['login_cid'].DIRECTORY_SEPARATOR."history".DIRECTORY_SEPARATOR;//目的文件夹
	$strnewfile = $GLOBALS['intshop']."_".$GLOBALS['inthistory_id']."_".$fix.$strext;//新文件名
	$hresult = $objfile -> moveFile($strtmpfile, $strnewpath.$strnewfile, true);
	if($hresult){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_history')." SET ".$place." = '".$strnewfile."' where card_history_id=".$GLOBALS['inthistory_id'];
		$GLOBALS['gdb']->fun_do($strsql);
		$objfile -> unlinkFile($strtmpfile);
	}
}

echo $intreturn;





