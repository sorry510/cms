<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_record_id = api_value_post('record_id');
$intcard_record_id = api_value_int0($strcard_record_id);
$strtime = api_value_post('time');
$inttime = strtotime($strtime)?strtotime($strtime):0;
$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);
$strquestion = api_value_post('question');
$sqlquestion = $gdb->fun_escape($strquestion);
$strresult = api_value_post('result');
$sqlresult = $gdb->fun_escape($strresult);
$strplan = api_value_post('plan');
$sqlplan = $gdb->fun_escape($strplan);

$strimg1 = api_value_post('img0');
$sqlimg1 = $gdb->fun_escape($strimg1);
$strimg2 = api_value_post('img1');
$sqlimg2 = $gdb->fun_escape($strimg2);
$strimg3 = api_value_post('img2');
$sqlimg3 = $gdb->fun_escape($strimg3);
$strimg4 = api_value_post('img3');
$sqlimg4 = $gdb->fun_escape($strimg4);
$strimg5 = api_value_post('img4');
$sqlimg5 = $gdb->fun_escape($strimg5);


$intreturn = 0;
$arr = array();
$arrrecord = array();
$imgfile = array();

// for($i = 1; $i <= 5; $i++){
// 	$img = 'img'.$i;
// 	$imgfile[$i] = '';
// 	$strphoto_name = $intcard_record_id."-".$i;
// 	if(!empty($_FILES[$img]['name'])){
// 		$strext = strtolower(strrchr($_FILES[$img]['name'], '.'));
// 		$intlength = $_FILES[$img]['size'];
// 		if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
// 			if($intlength < 1024000) {
// 				$hresult = move_uploaded_file($_FILES[$img]['tmp_name'], $gconfig['path']['erecord_photo'] . '/'. $strphoto_name . $strext);
// 				if($hresult) {
// 					$imgfile[$i] = $strphoto_name;
// 				}else{
// 					$intreturn = $i;
// 				}
// 			}else{
// 				$intreturn = $i;
// 			}
// 		}else{
// 			$intreturn = $i;;
// 		}
// 	}
// }

// var_dump($imgfile);

$strsql = "SELECT card_id,card_record_code,c_card_type_id,c_card_type_name,c_card_type_discount,c_card_code,c_card_name,c_card_phone,c_card_sex FROM ".$gdb->fun_table2('card_record')." where card_record_id=".$intcard_record_id;
$hresult = $gdb->fun_query($strsql);
$arrrecord = $gdb->fun_fetch_assoc($hresult);
if(empty($arrrecord)){
	$intreturn = 10;
}

$strsql = "SELECT worker_name FROM ".$gdb->fun_table2('worker')." where worker_id=".$intworker_id;
$hresult = $gdb->fun_query($strsql);
$arr= $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 11;
}else{
	$worker_name = $arr['worker_name'];
}

if($intreturn == 0){
	$strsql = "INSERT INTO ".$gdb->fun_table2('card_history')." (card_id,card_record_id,worker_id,shop_id,card_history_question,card_history_result,card_history_plan,card_history_photo1,card_history_photo2,card_history_photo3,card_history_photo4,card_history_photo5,card_history_atime,c_card_type_id,c_card_type_name,c_card_code,c_card_name,c_card_phone,c_card_record_code,c_worker_name) VALUES(".$arrrecord['card_id'].",".$intcard_record_id.",".$intworker_id.",".$GLOBALS['_SESSION']['login_sid'].",'".$sqlquestion."','".$sqlresult."','".$sqlplan."','".$sqlimg1."','".$sqlimg2."','".$sqlimg3."','".$sqlimg4."','".$sqlimg5."',".$inttime.",".$arrrecord['c_card_type_id'].",'".$arrrecord['c_card_type_name']."','".$arrrecord['c_card_code']."','".$arrrecord['c_card_name']."','".$arrrecord['c_card_phone']."','".$arrrecord['card_record_code']."','".$worker_name."')";
	// echo $strsql;
	$hresult = $gdb->fun_do($strsql);
	if(!$hresult){
		$intreturn = 12;
	}
}

echo $intreturn;





