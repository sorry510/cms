<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'worker';

$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$strshop_id = api_value_get('shop_id');
$intshop_id = api_value_int0($strshop_id);
$strfrom = api_value_get('from');
$intfrom = api_value_int0($strfrom);
$strto = api_value_get('to');
$intto = api_value_int0($strto);
$strsearch = api_value_get('search');


$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop_list', get_shop_list());
$gtemplate->fun_assign('worker_reward_count_list', get_worker_reward_count_list());//exit;
$gtemplate->fun_show('worker_reward_count');

function get_request(){
	$arr = array();
	$arr['shop_id'] = $GLOBALS['intshop_id'];
	$arr['from'] = $GLOBALS['strfrom'];
	$arr['to'] = $GLOBALS['strto'];
	$arr['search'] = $GLOBALS['strsearch'];
	return $arr;
}

function get_shop_list() {
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." order by shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_worker_reward_count_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';

	if($GLOBALS['intshop_id'] != 0){
		$strwhere .= " AND shop_id=".$GLOBALS['intshop_id'];
	}
	if($GLOBALS['intfrom'] != 0){
		$strwhere .= " AND worker_reward_atime > ".$GLOBALS['intfrom'];
	}
	if($GLOBALS['intto'] != 0){
		$strwhere .= " AND worker_reward_atime < ".$GLOBALS['intto'];
	}
	if($GLOBALS['strsearch'] != '') {
	  $strwhere = $strwhere . " AND worker_name LIKE '%" . $GLOBALS['strsearch'] . "%'";
	}
	//$strwhere .= " and shop_id=".$GLOBALS['_SESSION']['login_sid'];

	$arr = array();
	$strsql = "SELECT worker_reward_id as mycount FROM " . $GLOBALS['gdb']->fun_table2('worker_reward')  . " WHERE 1 = 1 " . $strwhere." group by worker_id";
	//echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);



	$intallcount = count($arr);
	if($intallcount == 0) {
		$arrpackage['allcount'] = 0;
		$arrpackage['pagecount'] = 0;
		$arrpackage['pagenow'] = 0;
		$arrpackage['pagepre'] = 0;
		$arrpackage['pagenext'] = 0;
		$arrpackage['list'] = array();
		return $arrpackage;
	}
	$intpagesize = 5;
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

	// 主表分类分组查询提成金额
	$strsql1 = "SELECT SUM(case when worker_reward_type=1 then worker_reward_money else 0 end)as sum_kk,SUM(case when worker_reward_type=2 then worker_reward_money else 0 end)as sum_cz,SUM(case when worker_reward_type=3 then worker_reward_money else 0 end)as sum_xf,SUM(case when worker_reward_type=4 then worker_reward_money else 0 end)as sum_dg,SUM(case when worker_reward_type=1 then 1 else 0 end)as num_kk,SUM(case when worker_reward_type=2 then 1 else 0 end)as num_cz,SUM(case when worker_reward_type=3 then 1 else 0 end)as num_xf,SUM(case when worker_reward_type=4 then 1 else 0 end)as num_dg,shop_id,worker_id,c_worker_name,c_worker_group_name,c_card_record_id,worker_reward_type,c_goods_name FROM ".$GLOBALS['gdb']->fun_table2('worker_reward')." where 1=1 ".$strwhere." group by worker_id ORDER BY worker_id DESC LIMIT ". $intoffset . ", " . $intpagesize;
	// echo $strsql1;exit;
	$strsql = "SELECT a.*, b.shop_name,c.worker_wage FROM (".$strsql1.") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b ON a.shop_id = b.shop_id LEFT JOIN " . $GLOBALS['gdb']->fun_table2('worker') . " AS c ON a.worker_id = c.worker_id";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);

	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;

	// echo '<pre>'; var_dump($arr); echo '</pre>';
	// exit;
	return $arrpackage;
}
?>