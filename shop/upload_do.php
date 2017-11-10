<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arrreturn = array(
	'code' => 0,
	'msg' => '',
	'data' => [
		'photo' => ''
	]
);

$intreturn = 0;
$arrfile = $_FILES['file'];
$new_name = uniqid(time());
$strext = strtolower(strrchr($arrfile['name'], '.'));
$photo = $new_name.$strext;
// $arrreturn['data']['photo'] = $photo;
// echo json_encode($arrreturn);return;
$intlength = $_FILES['file']['size'];
if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
	if($intlength < 1024000) {
		$hresult = move_uploaded_file($arrfile['tmp_name'], $GLOBALS['gconfig']['photo'][0].$photo);
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


