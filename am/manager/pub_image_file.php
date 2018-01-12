<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
header("Content-Type:image/jpeg");

$strtype = api_value_get('type');
$strfile = api_value_get('file');
$strfile = basename($strfile);

$strimage = '';
if($strtype == 'weixin-card-background') {
	if($strfile == '') {
		$strimage = $GLOBALS['gconfig']['path']['upload'] . '/noimage2.jpg';
	} else {
		$strimage = $GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_background'] . '/' . $strfile;
	}
	$himage = file_get_contents($strimage);
	if($himage != FALSE) {
		echo $himage;
	}
} else if($strtype == 'worker-photo') {
	$strimage = $GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['worker_photo'] . '/' . $strfile;
	$himage = file_get_contents($strimage);
	if($himage != FALSE) {
		echo $himage;
	}
} else if($strtype == 'worker-identity') {
	$strimage = $GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['worker_identity'] . '/' . $strfile;
	$himage = file_get_contents($strimage);
	if($himage != FALSE) {
		echo $himage;
	}
} else if($strtype == 'card-photo') {
	if($strfile == '') {
		$strimage = $GLOBALS['gconfig']['path']['upload'] . '/noimage.jpg';
	} else {
		$strimage = $GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_photo'] . '/' . $strfile;
	}
	$himage = file_get_contents($strimage);
	if($himage != FALSE) {
		echo $himage;
	}
} else if($strtype == 'card-history') {
	if($strfile == '') {
		$strimage = $GLOBALS['gconfig']['path']['upload'] . '/noimage.jpg';
	} else {
		$strimage = $GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_history'] . '/' . $strfile;
	}
	$himage = file_get_contents($strimage);
	if($himage != FALSE) {
		echo $himage;
	}
}