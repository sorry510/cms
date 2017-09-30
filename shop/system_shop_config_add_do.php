<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strprint_flag = api_value_post('print_flag');
$intprint_flag = api_value_int0($strprint_flag);
$strprint_title= api_value_post('print_title');
$sqlprint_title = $gdb->fun_escape($strprint_title);
$strprint_width = api_value_post('print_width');
$intprint_width = api_value_int0($strprint_width);
$strprint_memo= api_value_post('print_memo');
$sqlprint_memo = $gdb->fun_escape($strprint_memo);
$strphoto_name = $GLOBALS['_SESSION']['login_sid'].'-ewm';

$intreturn = 0;

$strext = strtolower(strrchr($_FILES['ewm']['name'], '.'));
$intlength = $_FILES['ewm']['size'];
if(!empty($strext)){
	if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
		if($intlength < 1024000) {
			$hresult = move_uploaded_file($_FILES['ewm']['tmp_name'], $gconfig['path']['shop_photo'] . '/'. $strphoto_name . $strext);
			if($hresult) {
				$strphoto_name = $strphoto_name.$strext;
			}else{
				$intreturn = 1;//移动文件失败
			}
		}else{
			$intreturn = 2;//文件过大
		}
	}else{
		$intreturn = 3;//文件后缀不对
	}
}
// $_FILES[];//print_ewm
// var_dump($_FILES['ewm']); return;

if($intreturn == 0){
	$arr = array(
			'print_flag' => $intprint_flag,
			'print_title' => $sqlprint_title,
			'print_width' => $intprint_width,
			'print_memo' => $sqlprint_memo,
			'print_ewm' => $strphoto_name,
		);
	$strjson_config = json_encode($arr);

	$strsql = "UPDATE " . $gdb->fun_table('shop') . " SET shop_config='" . $strjson_config . "' where shop_id=" . $GLOBALS['_SESSION']['login_sid'];
	$hresult = $gdb->fun_do($strsql);

	if(!$hresult){
		$intreturn = 4;
	}

}

echo $intreturn;