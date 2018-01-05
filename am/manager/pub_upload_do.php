<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strtype = api_value_post('type');

$intreturn = 0;

$strext = '';
$intlength = 0;
if($intreturn == 0) {
	$strext = strrchr(basename($_FILES['file']['name']), '.');
	if($strext == FALSE) {
		$intreturn = 1;
	}
	if($intreturn == 0) {
		if($strtype == 'png') {
			if($strext != '.png') {
				$intreturn = 1;
			}
		} else if($strtype == 'image') {
			if($strext != '.jpg' && $strext != '.gif' && $strext != '.png') {
				$intreturn = 1;
			}
		} else {
			$intreturn = 1;
		}
	}
	if($intreturn == 0) {
		$intlength = $_FILES['file']['size'];
		if($intlength > 1024000) {
			$intreturn = 1;
		}
	}
}

$strname = '';
if($intreturn == 0) {
	$strname = uniqid() . $strext;
	$hresult = move_uploaded_file($_FILES['file']['tmp_name'],
	$GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strname);
	if(empty($hresult)) {
		$intreturn = 1;
	}
}

$arr = array();
if($intreturn == 0) {
	$arr['code'] = 0;
	$arr['image'] = $strname;
	echo json_encode($arr);
} else {
	$arr['code'] = $intreturn;
	$arr['image'] = '';
	echo json_encode($arr);
}