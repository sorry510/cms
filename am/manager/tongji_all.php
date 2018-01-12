<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'tongji';

$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strfrom = api_value_get('from');
$strfrom2 = $gdb->fun_escape($strfrom);
$intfrom = strtotime($strfrom2);
$strto = api_value_get('to');
$strto2 = $gdb->fun_escape($strto);
$intto = strtotime($strto2);
$inttime = time();

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('income', get_income());
$gtemplate->fun_assign('shopping', get_shopping());
$gtemplate->fun_assign('card', get_card());
$gtemplate->fun_assign('goods', get_goods());
$gtemplate->fun_show('tongji_all');

function get_request() {
	$arr = array();
	$arr['shop_id'] = $GLOBALS['strshop_id'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	return $arr;
}

function get_shop() {
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) ." ORDER BY shop_id ";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

//收入
function get_income() {

	$strwhere = ' card_record_state = 1 ';

	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND card_record_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND card_record_atime < ' . ($GLOBALS['intto']+86400);
	}
	if($GLOBALS['intshop_id'] != 0){
		$strwhere = $strwhere . " AND shop_id = " .$GLOBALS['intshop_id'];
	}

	$arr = array();
	//现金付款总金额
	$arr_xianjin = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_xianjin FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_xianjin = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['xianjin_all'] = $arr_xianjin['sum_xianjin'] +0;//现金付款总金额

	//现金付款会员总金额
	$arr_xianjin_card = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_xianjin_card FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 1 AND card_id != 0";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_xianjin_card = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['xianjin_card'] = $arr_xianjin_card['sum_xianjin_card'] + 0;//现金付款会员总金额
	$arr['xianjin_normal'] = $arr['xianjin_all'] - $arr['xianjin_card'];//现金付款散客总额

	//银行卡付款总金额
	$arr_yinhang = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_yinhang FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 2";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_yinhang = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['yinhang_all'] = $arr_yinhang['sum_yinhang'] + 0;//银行卡付款总金额

	//银行卡付款总金额
	$arr_yinhang_card = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_yinhang_card FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 2 AND card_id != 0";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_yinhang_card = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['yinhang_card'] = $arr_yinhang_card['sum_yinhang_card'] + 0;//银行卡付款总金额
	$arr['yinhang_normal'] = $arr['yinhang_all'] - $arr['yinhang_card'];//现金付款散客总额

	//微信支付总金额
	$arr_weixin = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_weixin FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 3";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_weixin = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['weixin_all'] = $arr_weixin['sum_weixin'] + 0;//微信支付总金额

	//支付宝支付总金额
	$arr_zhifubao = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_zhifubao FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 4";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_zhifubao = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['zhifubao_all'] = $arr_zhifubao['sum_zhifubao'] + 0;//支付宝支付总金额

	//会员卡卡扣总金额
	$arr_kakou = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_kakou FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 5";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_kakou = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['kakou_all'] = $arr_kakou['sum_kakou'] + 0;//会员卡卡扣总金额

	//团购付款总金额
	$arr_tuan = array();
	$strsql = "SELECT sum(card_record_smoney) as sum_tuan FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE " . $strwhere ." AND card_record_pay = 6";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_tuan = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['tuan_all'] = $arr_tuan['sum_tuan'] + 0;//会员卡卡扣总金额

	$arr['all'] = $arr['xianjin_all'] + $arr['yinhang_all'] + $arr['weixin_all'] + $arr['zhifubao_all'] + $arr['kakou_all'] + $arr['tuan_all'];//收入总额

	return $arr;
}

//消费
function get_shopping() {

	$strwhere = '';

	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND card_record_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND card_record_atime < ' . ($GLOBALS['intto']+86400);
	}
	if($GLOBALS['intshop_id'] != 0){
		$strwhere = $strwhere . " AND shop_id = " .$GLOBALS['intshop_id'];
	}

	$arr = array();
	//会员消费
	$arr_card = array();
	$strsql = "SELECT count(card_record_id) as card_shopping_times , sum(card_record_smoney) as sum_card_shopping FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 3 AND card_id != 0" . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_card = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['card_shopping_times'] = $arr_card['card_shopping_times'] + 0;//会员消费次数
	$arr['card_shopping'] = $arr_card['sum_card_shopping'] + 0;//会员消费金额

	//散客消费
	$arr_normal = array();
	$strsql = "SELECT count(card_record_id) as normal_shopping_times , sum(card_record_smoney) as sum_normal_shopping FROM " . $GLOBALS['gdb']->fun_table2('card_record') . " WHERE (card_record_state = 1 OR card_record_state = 4) AND card_record_type = 3 AND card_id = 0" . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_normal = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['normal_shopping_times'] = $arr_normal['normal_shopping_times'] + 0;//散客消费次数
	$arr['normal_shopping'] = $arr_normal['sum_normal_shopping'] + 0;//散客消费金额
	$arr['all_shopping_times'] = $arr['card_shopping_times'] + $arr['normal_shopping_times'];//消费总次数

	return $arr;
}

//会员
function get_card() {

	$strwhere = '';

	if($GLOBALS['intshop_id'] != 0){
		$strwhere = $strwhere . " AND shop_id = " .$GLOBALS['intshop_id'];
	}

	$arr = array();
	//正常会员
	$arr_card_normal = array();
	$strsql = "SELECT count(card_id) as card_normal_num FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_state = 1 AND (card_edate >". $GLOBALS['inttime']." OR card_edate = 0)" . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_card_normal = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['card_normal'] = $arr_card_normal['card_normal_num'] + 0;//正常会员数量

	//停用会员
	$arr_card_tingyong = array();
	$strsql = "SELECT count(card_id) as card_tingyong_num FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_state = 2 " . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_card_tingyong = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['card_tingyong'] = $arr_card_tingyong['card_tingyong_num'] + 0;//停用会员数量

	//过期会员
	$arr_card_expired = array();
	$strsql = "SELECT count(card_id) as card_expired_num FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_state = 1 AND card_edate !=0 AND card_edate < " . $GLOBALS['inttime'] . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_card_expired = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['card_expired'] = $arr_card_expired['card_expired_num'] + 0;//过期会员数量

	$arr['card_all'] = $arr['card_normal'] + $arr['card_tingyong'] + $arr['card_expired'];//会员总数量

	//会员卡余额总数
	$arr_card_ymoney = array();
	$strsql = "SELECT sum(s_card_ymoney) as sum_card_ymoney FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_state != 3 " . $strwhere;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr_card_ymoney= $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$arr['card_ymoney'] = $arr_card_ymoney['sum_card_ymoney'] + 0;//过期会员数量

	$arr['card_all'] = $arr['card_normal'] + $arr['card_tingyong'] + $arr['card_expired'];//会员总数量
	return $arr;
}

//商品
function get_goods() {

	$strwhere = '';

	if($GLOBALS['intfrom'] > 0) {
		$strwhere = $strwhere . ' AND card_record3_goods_atime >= ' . $GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] > 0) {
		$strwhere = $strwhere . ' AND card_record3_goods_atime < ' . ($GLOBALS['intto']+86400);
	}
	if($GLOBALS['intshop_id'] != 0){
		$strwhere = $strwhere . " AND shop_id = " .$GLOBALS['intshop_id'];
	}

	$arr = array();
	$strsql = "SELECT card_record3_goods_count, mgoods_id, sgoods_id ,c_mgoods_rprice,c_sgoods_rprice,card_record3_goods_state FROM " . $GLOBALS['gdb']->fun_table2('card_record3_goods') . " WHERE (card_record3_goods_state = 1 OR card_record3_goods_state = 4)" . $strwhere;
	// echo $strsql;exit();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	// echo "<pre>";
	// var_dump($arr);
	// echo "</pre>";exit;
	$intsales_volume = 0;
	$intsales_count = 0;

	foreach ($arr as $key => $row) {
		if ($row['card_record3_goods_state'] == 1) {
			if (!empty($row['mgoods_id'])) {
				$intsales_volume = $intsales_volume + ($row['c_mgoods_rprice'] * $row['card_record3_goods_count']);
			}else{
				$intsales_volume = $intsales_volume + ($row['c_sgoods_rprice'] * $row['card_record3_goods_count']);
			}
		}elseif($row['card_record3_goods_state'] == 4){
			$intsales_volume = $intsales_volume + 0;
		}
		$intsales_count = $intsales_count + $row['card_record3_goods_count'];
	}
	$arr['sales_volume'] = '';
	$arr['sales_count'] = '';
	$arr['sales_volume'] = $intsales_volume;//商品销售额
	$arr['sales_count'] = $intsales_count;//商品销售量

	return $arr;
}

?>