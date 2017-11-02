<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strtype = api_value_post('type');
$inttype = api_value_int0($strtype);

$arrreturn = array(
	'code' => 0,
	'msg' => '',
	'data' => [
		'photo' => ''
	]
);

// switch($inttype)
// {
// 	case 0:
// }
$intreturn = 0;
$arrfile = $_FILES['file'];
$new_name = "wxbg_".$GLOBALS['_SESSION']['login_cid'];
$strext = strtolower(strrchr($arrfile['name'], '.'));
$photo = $new_name.$strext;
// $arrreturn['data']['photo'] = $photo;
// echo json_encode($arrreturn);return;
$intlength = $_FILES['file']['size'];
if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
	if($intlength < 1024000) {
		$hresult = move_uploaded_file($arrfile['tmp_name'], $GLOBALS['gconfig']['photo'][$inttype].$photo);
		if(!$hresult) {
			$intreturn = 1;
		}
	}else{
		$intreturn = 2;
	}
}else{
	$intreturn = 3;
}

if($intreturn == 0){
	$arrreturn['code'] = '200';
	$arrreturn['msg'] = 'ok';
	$arrreturn['data']['photo'] = $photo;
}else if($intreturn == 1){
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err1';
}else if($intreturn == 2){
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err2';
}else if($intreturn == 2){
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err3';
}else{
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err4';
}
echo json_encode($arrreturn);


