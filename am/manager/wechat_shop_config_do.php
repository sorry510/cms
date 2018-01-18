<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');
if($GLOBALS['gtrade']['wshop_module'] != 1) {
	return 1;
}

$strwshop_flag = api_value_post('wshop_flag');
$intwshop_flag = api_value_int0($strwshop_flag);
$strwshop_title = api_value_post('wshop_title');
$strwshop_phone = api_value_post('wshop_phone');
$strsend_method = api_value_post('send_method');
$intsend_method = api_value_int0($strsend_method);
$strfenxiao_flag = api_value_post('fenxiao_flag');
$intfenxiao_flag = api_value_int0($strfenxiao_flag);
$strshare_title = api_value_post('share_title');
$strshare_image = api_value_post('share_image');
$strshare_image = basename($strshare_image);
$strad_image1 = api_value_post('ad_image1');
$strad_image1 = basename($strad_image1);
$strad_image2 = api_value_post('ad_image2');
$strad_image2 = basename($strad_image2);
$strad_image3 = api_value_post('ad_image3');
$strad_image3 = basename($strad_image3);

$intreturn = 0;
if($intreturn == 0) {
	if($intwshop_flag != 0 && $intwshop_flag != 1) {
		$intreturn = 1;
	}
	if($intreturn == 0) {
		if($intwshop_flag == 0) {
			$intwshop_flag = 2;
		}
	}
}

if($intreturn == 0) {
	if($intsend_method != 1 && $intsend_method != 2 && $intsend_method != 3) {
		$intreturn = 1;
	}
}

if($intreturn == 0) {
	if($intfenxiao_flag != 0 && $intfenxiao_flag != 1) {
		$intreturn = 1;
	}
}

$intreturn2 = 1;
if($intreturn == 0) {
	if($strshare_image != '') {
		$int = strrpos($strshare_image, '.');
		if($int != FALSE) {
			$str = substr($strshare_image, $int);
			if($str == '.jpg' || $str == '.gif' || $str == '.png') {
				copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strshare_image,
				$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['share_image'] . '/laimi' . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strshare_image);
				$strshare_image = 'laimi' . $str;
				$intreturn2 = 0;
			}
		}
	}
	if($intreturn2 != 0) {
		$strshare_image = '';
	}
	if($strad_image1 != '') {
		$int = strrpos($strad_image1, '.');
		if($int != FALSE) {
			$str = substr($strad_image1, $int);
			if($str == '.jpg' || $str == '.gif' || $str == '.png') {
				copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strad_image1,
				$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['ad_image'] . '/laimi1' . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strad_image1);
				$strad_image1 = 'laimi1' . $str;
				$intreturn2 = 0;
			}
		}
	}
	if($intreturn2 != 0) {
		$strad_image1 = '';
	}
	if($strad_image2 != '') {
		$int = strrpos($strad_image2, '.');
		if($int != FALSE) {
			$str = substr($strad_image2, $int);
			if($str == '.jpg' || $str == '.gif' || $str == '.png') {
				copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strad_image2,
				$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['ad_image'] . '/laimi2' . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strad_image2);
				$strad_image2 = 'laimi2' . $str;
				$intreturn2 = 0;
			}
		}
	}
	if($intreturn2 != 0) {
		$strad_image2 = '';
	}
	if($strad_image3 != '') {
		$int = strrpos($strad_image3, '.');
		if($int != FALSE) {
			$str = substr($strad_image3, $int);
			if($str == '.jpg' || $str == '.gif' || $str == '.png') {
				copy($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strad_image3,
				$GLOBALS['gconfig']['path']['weixin'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['ad_image'] . '/laimi3' . $str);
				unlink($GLOBALS['gconfig']['path']['upload'] . '/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . '/temp/' . $strad_image3);
				$strad_image3 = 'laimi3' . $str;
				$intreturn2 = 0;
			}
		}
	}
	if($intreturn2 != 0) {
		$strad_image3 = '';
	}
}

if($intreturn == 0) {
	$arrwshop = get_company_wshop();
	$arrwshop['wshop_flag'] = $intwshop_flag;
	$arrwshop['wshop_title'] = $strwshop_title;
	$arrwshop['wshop_phone'] = $strwshop_phone;
	$arrwshop['send_method'] = $intsend_method;
	$arrwshop['fenxiao_flag'] = $intfenxiao_flag;
	$arrwshop['share_title'] = $strshare_title;
	if($strshare_image != '') {
		$arrwshop['share_image'] = $strshare_image;
	}
	if($strad_image1 != '') {
		$arrwshop['ad_image1'] = $strad_image1;
	}
	if($strad_image2 != '') {
		$arrwshop['ad_image2'] = $strad_image2;
	}
	if($strad_image3 != '') {
		$arrwshop['ad_image3'] = $strad_image3;
	}
	$strjson = json_encode($arrwshop, JSON_UNESCAPED_UNICODE);
	$strsql = "UPDATE " . $gdb->fun_table('company') . " SET company_config_wshop = '" . $gdb->fun_escape($strjson)
	. "' WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $gdb->fun_do($strsql);
	if($hresult == FALSE) {
		$intreturn = 1;
	}
}

echo $intreturn;

function get_company_wshop() {
	$arrwshop = array(
		'wshop_flag' => 0,
		'wshop_title' => '',
		'send_method' => 0,
		'send_from' => 1,
		'fenxiao_flag' => 0,
		'share_title' => '',
		'share_image' => '',
		'ad_image1' => '',
		'ad_image2' => '',
		'ad_image3' => ''
	);
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT company_id, company_config_wshop FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		if(!empty($arr['company_config_wshop'])) {
			$arr2 = json_decode($arr['company_config_wshop'], true);
			if(!empty($arr2)) {
				$arrwshop = $arr2;
			}
		}
	}
	return $arrwshop;
}
?>