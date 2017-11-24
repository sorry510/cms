<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'tongji';

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strgoods = api_value_get('goods');
$strgoods2 = $gdb->fun_escape($strgoods);
$strcount = api_value_get('count');
$intcount = api_value_int0($strcount);
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$inttime = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('mgoods', get_mgoods());
$gtemplate->fun_assign('sgoods', get_sgoods());
$gtemplate->fun_assign('goods_count_list', get_goods_count_list());
$gtemplate->fun_show('tongji_goods');

function get_request() {
	$arr = array();
	$arr['shop_id'] = $GLOBALS['strshop_id'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_shop() {
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." order by shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_mgoods() {
	$arr = array();
	$strsql = "SELECT mgoods_id,mgoods_name FROM " . $GLOBALS['gdb']->fun_table2('mgoods')." order by mgoods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_sgoods() {
	$arr = array();
	$strsql = "SELECT sgoods_id,sgoods_name FROM " . $GLOBALS['gdb']->fun_table2('sgoods')." order by sgoods_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_goods_count_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$sqlorder = '';

	$sqlorder = 'sales_volume';
	if (!empty($intcount)) {
		if ($intcount == 2) {
			$sqlorder = 'sum_count';
		}
	}

	$strwhere = '';

	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND card_record3_goods_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND card_record3_goods_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND card_record3_goods_atime < ' . ($GLOBALS['intto']+86400);
	}
	if($GLOBALS['intshop_id'] != 0){
		$strwhere = $strwhere . " AND shop_id = " .$GLOBALS['intshop_id'];
	}
	if ($GLOBALS['strgoods2'] != '') {
		$arrgoods = explode(",",$GLOBALS['strgoods2']);
		$intgoods_type = $arrticket[0];
		$intgoods_id = $arrticket[1];
		if ($intgoods_type == 1) {
			$strwhere = $strwhere . 'AND mgoods_id = '.$intgoods_id;
		}elseif($intgoods_type == 2){
			$strwhere = $strwhere . 'AND sgoods_id = '.$intgoods_id;
		}
	}

	$arr = array();
	$strsql = 'SELECT count(card_record3_goods_id) as datcount FROM' . $GLOBALS['gdb']->fun_table2('card_record3_goods') . ' WHERE 1 = 1' . $strwhere .' GROUP BY (CASE mgoods_id WHEN 0 THEN sgoods_id else mgoods_id end)';

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$intallcount = $arr['datcount'];
	if($intallcount == 0) {
		$arrpackage['allcount'] = 0;
		$arrpackage['pagecount'] = 0;
		$arrpackage['pagenow'] = 0;
		$arrpackage['pagepre'] = 0;
		$arrpackage['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}
	
	$intpagesize = 50;
	$intpagecount = intval($intallcount / $intpagesize);
	if($intallcount % $intpagesize > 0) {
		$intpagecount = $intpagecount + 1;
	}
	$intpagenow = $GLOBALS['intpage'];
	if($intpagenow < 1) {
		$intpagenow = 1;
	}
	if($intpagenow > $intpagecount) {
		$intpagenow = $intpagecount;
	}
	$intpagepre = $intpagenow - 1;
	if($intpagepre < 1) {
		$intpagepre = 1;
	}
	$intpagenext = $intpagenow + 1;
	if($intpagenext > $intpagecount) {
		$intpagenext = $intpagecount;
	}
	
	$intoffset = ($intpagenow - 1) * $intpagesize;

	$strsql = 'SELECT a.sales_volume, a.sales_count ,a.mgoods_id ,a.sgoods_id,b.shop_name,c.mgoods_name,c.mgoods_price,c.mgoods_code,c.mgoods_cprice,d.sgoods_name,d.sgoods_code,d.sgoods_price,d.sgoods_cprice FROM (SELECT shop_id,mgoods_id,sgoods_id,c_mgoods_rprice,c_sgoods_rprice,c_sgoods_name,c_mgoods_name,card_record3_goods_count, sum(card_record3_goods_count * c_mgoods_rprice + card_record3_goods_count * c_sgoods_rprice) as sales_volume , sum(card_record3_goods_count) as sales_count FROM' . $GLOBALS['gdb']->fun_table2('card_record3_goods') . ' WHERE 1 = 1 ' . $strwhere .' GROUP BY (CASE mgoods_id WHEN 0 THEN sgoods_id else mgoods_id end) ORDER BY ' . $sqlorder . ' DESC) as a LEFT JOIN '. $GLOBALS['gdb']->fun_table('shop') .' as b on a.shop_id = b.shop_id LEFT JOIN ' . $GLOBALS['gdb']->fun_table2('mgoods') . ' as c on a.mgoods_id = c.mgoods_id LEFT JOIN ' . $GLOBALS['gdb']->fun_table2('sgoods') . ' as d on a.sgoods_id = d.sgoods_id LIMIT ' . $intoffset . ' , ' . $intpagesize;

	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);

	foreach($arr as $key => $row) {
		$arr[$key]['goods_code'] = '';
		$arr[$key]['goods_price'] = '';
		$arr[$key]['goods_cprice'] = '';
		$arr[$key]['goods_name'] = '';
		$arr[$key]['goods_type'] = '';
		if($row['mgoods_id'] == 0) {
			$arr[$key]['goods_code'] = $row['sgoods_code'];
			$arr[$key]['goods_price'] = $row['sgoods_price'];
			$arr[$key]['goods_cprice'] = $row['sgoods_cprice'];
			$arr[$key]['goods_name'] = $row['sgoods_name'];
			$arr[$key]['goods_type'] = '单店通用商品';
		}else if($row['sgoods_id'] == 0) {
			$arr[$key]['goods_code'] = $row['mgoods_code'];
			$arr[$key]['goods_price'] = $row['mgoods_price'];
			$arr[$key]['goods_cprice'] = $row['mgoods_cprice'];
			$arr[$key]['goods_name'] = $row['mgoods_name'];
			$arr[$key]['goods_type'] = '多店通用商品';
		}
	}

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arr;
	return $arrpackage;

}
?>