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
if($strtype == 'weixin-card-image') {
	if($strfile == '') {
		$strimage = $GLOBALS['gconfig']['path']['upload'] . '/noimage2.jpg';
	} else {
		$strimage = $GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['card_image'] . '/' . $strfile;
	}
	$himage = file_get_contents($strimage);
	if($himage != FALSE) {
		echo $himage;
	}
}