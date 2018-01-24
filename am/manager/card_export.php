<?php
define('C_CNFLY', true);
//define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
/*require('inc_limit.php');*/
ini_set('max_execution_time', '0');
header("Content-type:application/vnd.ms-execl");
header("Content-Disposition:attachment;filename=card_" . date('Ymj') . ".csv");

$strstate = api_value_get('state');
$intstate = api_value_int0($strstate);
$strshop = api_value_get('shop');
$intshop = api_value_int0($strshop);
$strcardtype = api_value_get('cardtype');
$intcardtype = api_value_int0($strcardtype);
$strkey = api_value_get('key');
$sqlkey = $gdb->fun_escape($strkey);

$gtemplate->fun_assign('card_list', get_card_list());
$gtemplate->fun_show('card_export', '');

function get_card_list() {

	$strwhere = '';
	if($GLOBALS['intstate'] == 3) {
		$strwhere .= " AND card_state = 3";
	} else if($GLOBALS['intstate'] == 2) {
		$strwhere .= " AND (card_state = 1 OR card_state = 2) AND (card_edate < ".time()." AND card_edate != 0)";//过期
	} else {
		$strwhere .= " AND (card_state = 1 OR card_state = 2)";//正常
	}
	if($GLOBALS['intshop'] != 0) {
		$strwhere .= " AND shop_id = " . $GLOBALS['intshop'];
	}
	if($GLOBALS['intcardtype'] != 0) {
		$strwhere .= " AND card_type_id = " . $GLOBALS['intcardtype'];
	}
	if($GLOBALS['strkey'] != '') {
		$strwhere = $strwhere . " AND (card_code = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR card_name = '" . $GLOBALS['sqlkey'] . "'";
		$strwhere = $strwhere . " OR card_phone = '" . $GLOBALS['sqlkey'] . "')";
	}

	$strsql = "SELECT a.*, b.shop_name FROM (SELECT card_id, shop_id, card_okey, card_code, card_name, card_phone, card_sex, card_birthday_date, card_state, card_atime, card_edate, "
	. "c_card_type_name, c_card_type_discount, s_card_smoney, s_card_ymoney, s_card_sscore, s_card_yscore FROM " . $GLOBALS['gdb']->fun_table2('card')
	. " WHERE 1 = 1" . $strwhere . " ORDER BY card_id DESC) AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id ORDER BY a.card_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	
	$inttime = time();
	foreach($arr as &$row) {
		$row['mysex'] = '';
		if($row['card_sex'] == 1) {
			$row['mysex'] = '男';
		} else if($row['card_sex'] == 2) {
			$row['mysex'] = '女';
		} else if($row['card_sex'] == 3) {
			$row['mysex'] = '保密';
		} else {
			$row['mysex'] = '保密';
		}
		$row['mybirthday'] = '';
		if($row['card_birthday_date'] > 0) {
			$row['mybirthday'] = date('Y-m-d', $row['card_birthday_date']);
		}
		$row['mydiscount'] = $row['c_card_type_discount'] == 0 ? 10 : $row['c_card_type_discount'];
		$row['mystate'] = '';
		if($row['card_state'] == 1) {
			if($row['card_edate'] != 0 && $row['card_edate'] < time()) {
				$row['mystate'] = '过期';
			} else {
				$row['mystate'] = '正常';
			}
		} else if($row['card_state'] == 2) {
			$row['mystate'] = '停用';
		} else if($row['card_state'] == 3) {
			$row['mystate'] = '已删除';
		}
		$strsql = "SELECT card_mcombo_id, card_mcombo_gcount, card_mcombo_cedate, c_mgoods_name, c_mcombo_type FROM " . $GLOBALS['gdb']->fun_table2('card_mcombo')
		. " WHERE card_id = " . $row['card_id'] . " AND card_mcombo_type = 2 AND card_mcombo_cedate > " . $inttime . "  AND ((c_mcombo_type = 1 AND card_mcombo_gcount != 0) OR c_mcombo_type = 2) ORDER BY card_mcombo_id DESC";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$row['mymcombo'] = $GLOBALS['gdb']->fun_fetch_all($hresult);
	}

	return $arr;
}
?>