<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

// $GLOBALS['_SESSION']['login_type'] = 11;
// $GLOBALS['_SESSION']['login_id'] = 1;
// $GLOBALS['_SESSION']['login_openid'] = 'abc';
// $GLOBALS['_SESSION']['login_code'] = 'am';
// $GLOBALS['_SESSION']['login_cid'] = 1;
// $GLOBALS['_SESSION']['login_sid'] = 1;
// header('Location: index.php');
// return;

$strcompany = api_value_get('company');
$intcompany = api_value_int0($strcompany);
$strwgoods = api_value_get('wgoods');
$intwgoods = api_value_int0($strwgoods);
$strparent = api_value_get('parent');
$intparent = api_value_int0($strparent);
$strgoto = api_value_get('goto');
$strcode = api_value_get('code');

$intreturn = 0;

$arrcompany = array();
if($intreturn == 0) {
	$strsql = "SELECT company_id, system_code, company_config_trade, company_config_weixin, company_config_wshop FROM " . $gdb->fun_table('company')
	. " WHERE company_id = " . $intcompany . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arrcompany = $gdb->fun_fetch_assoc($hresult);
	if(empty($arrcompany)) {
		$intreturn = 100;
	}
}

$arrcompany_config_trade = array();
if($intreturn == 0) {
	$arrcompany_config_trade = json_decode($arrcompany['company_config_trade'], true);
	if(empty($arrcompany_config_trade)) {
		$intreturn = 100;
	}
}

$arrcompany_config_weixin = array();
if($intreturn == 0) {
	$arrcompany_config_weixin = json_decode($arrcompany['company_config_weixin'], true);
	if(empty($arrcompany_config_weixin)) {
		$intreturn = 100;
	}
}

$arrcompany_config_wshop = array();
if($intreturn == 0) {
	$arrcompany_config_wshop = json_decode($arrcompany['company_config_wshop'], true);
	if(empty($arrcompany_config_wshop)) {
		$intreturn = 100;
	}
}

$arrcard_parent = array();
if($intreturn == 0) {
	$gdb->pub_prefix2 = $arrcompany['system_code'] . "_" . str_pad($arrcompany['company_id'], 4, '0', STR_PAD_LEFT) . "_";
	$strsql = "SELECT card_id FROM " . $gdb->fun_table2('card') . " WHERE card_id = " . $intparent . " LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arrcard_parent = $gdb->fun_fetch_assoc($hresult);
	if(empty($arrcard_parent)) {
		$intparent = 0;
	} else {
		$intparent = $arrcard_parent['card_id'];
	}
}

$stropenid = '';
$arraccess_token = array();
if($intreturn == 0) {
	$str = api_http_html('https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $arrcompany_config_weixin['appid'] . '&secret=' . $arrcompany_config_weixin['appsecret']
	. '&code=' . $strcode . '&grant_type=authorization_code');
	$arraccess_token = json_decode($str, TRUE);
	if(!empty($arraccess_token)) {
		if(!empty($arraccess_token['openid'])) {
			$stropenid = $arraccess_token['openid'];
		}
	}
	if(empty($stropenid)) {
		$intreturn = 100;
	}
}

$arrcard = array();
if($intreturn == 0) {
	$strsql = "SELECT card_id, card_okey FROM " . $gdb->fun_table2('card') . " WHERE card_okey = '" . $stropenid . "' LIMIT 1";
	$hresult = $gdb->fun_query($strsql);
	$arrcard = $gdb->fun_fetch_assoc($hresult);
	if(empty($arrcard)) {
		$GLOBALS['_SESSION']['login_type'] = 11;
		$GLOBALS['_SESSION']['login_id'] = 0;
		$GLOBALS['_SESSION']['login_openid'] = '';
		$GLOBALS['_SESSION']['login_code'] = $arrcompany['system_code'];
		$GLOBALS['_SESSION']['login_cid'] = $arrcompany['company_id'];
		$GLOBALS['_SESSION']['login_sid'] = $intparent;
	} else {
		$GLOBALS['_SESSION']['login_type'] = 11;
		$GLOBALS['_SESSION']['login_id'] = $arrcard['card_id'];
		$GLOBALS['_SESSION']['login_openid'] = $arrcard['card_okey'];
		$GLOBALS['_SESSION']['login_code'] = $arrcompany['system_code'];
		$GLOBALS['_SESSION']['login_cid'] = $arrcompany['company_id'];
		$GLOBALS['_SESSION']['login_sid'] = $intparent;
	}
}

if($intreturn == 0) {
	if($strgoto == 'index') {
		if($arrcompany_config_trade['wshop_module'] != 1) {
			header('Location: error.php');
		} else if($arrcompany_config_wshop['wshop_flag'] != 1) {
			header('Location: stop.php');
		} else {
			header('Location: index.php');
		}
	} else if($strgoto == 'goods') {
		if($arrcompany_config_trade['wshop_module'] != 1) {
			header('Location: error.php');
		} else if($arrcompany_config_wshop['wshop_flag'] != 1) {
			header('Location: stop.php');
		} else {
			header('Location: goods.php?id=' . $intwgoods);
		}
	} else if($strgoto == 'center') {
		if($arrcompany_config_trade['wshop_module'] != 1) {
			header('Location: error.php');
		} else if($arrcompany_config_wshop['wshop_flag'] != 1) {
			header('Location: stop.php');
		} else {
			header('Location: center.php');
		}
	} else if($strgoto == 'reserve') {
		if($arrcompany_config_trade['wmp_module'] != 1) {
			header('Location: error.php');
		} else {
			header('Location: center_shop.php');
		}
	}
} else {
	header('Location: error.php');
}
?>