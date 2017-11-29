<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strchannel = 'worker';
$strstate = api_value_get('state');
$intstate = api_value_int0($strstate);
$strgroup = api_value_get('group');
$intgroup = api_value_int0($strgroup);
$strsearch = api_value_get('search');
$sqlsearch = $gdb->fun_escape($strsearch);
$strpage = api_value_get('page');
$intpage = api_value_int1($strpage);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$gtemplate->fun_assign('request', get_request());
$gtemplate->fun_assign('shop', get_shop());
$gtemplate->fun_assign('worker_group_list', get_worker_group_list());
$gtemplate->fun_assign('worker_list', get_worker_list());
$gtemplate->fun_show('worker');

function get_request(){
	$arr = array();
	$arr['state'] = $GLOBALS['intstate'];
	$arr['group'] = $GLOBALS['intgroup'];
	$arr['search'] = $GLOBALS['sqlsearch'];
	return $arr;
}
function get_shop() {
	$arr = array();
	$strsql = "SELECT shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')." where shop_id=".$GLOBALS['intshop'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	return $arr;
}
function get_worker_group_list() {
	$arr = array();
	$strsql = "SELECT worker_group_id,worker_group_name FROM " . $GLOBALS['gdb']->fun_table2('worker_group')." order by worker_group_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function get_worker_list() {
	$intallcount = 0;
	$intpagecount = 0;
	$intpagenow = 0;
	$intpagepre = 0;
	$intpagenext = 0;
	$arrlist = array();
	$arrpackage = array();

	$strwhere = '';
	if($GLOBALS['intgroup'] != 0){
		$strwhere .= " AND worker_group_id=".$GLOBALS['intgroup'];
	}
	if($GLOBALS['sqlsearch'] != '') {
	  $strwhere .= " AND (worker_name = '" . $GLOBALS['sqlsearch'] . "'";
	  $strwhere .= " or worker_code = '" . $GLOBALS['sqlsearch'] . "')";
	}
	if($GLOBALS['intstate'] == 1){
		$strwhere .= " and worker_state=1";
	}else if($GLOBALS['intstate'] == 2){
		$strwhere .= " and worker_state=2";
	}else{
		$strwhere .= " and worker_state=0";
	}
	$strwhere .= " AND shop_id=".$GLOBALS['intshop'];

	$arr = array();
	$strsql = "SELECT count(worker_id) as mycount FROM " . $GLOBALS['gdb']->fun_table2('worker')  . " WHERE 1 = 1 " . $strwhere;
	// echo $strsql;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);

	$intallcount = $arr['mycount'];
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

	$strsql = "SELECT a.*, b.shop_name, c.worker_group_name FROM (SELECT shop_id, worker_id, worker_group_id, worker_name, worker_code, worker_sex, worker_birthday_date, worker_phone, worker_education, worker_join, worker_wage, worker_state FROM " . $GLOBALS['gdb']->fun_table2('worker') . " where 1=1 ".$strwhere." ORDER BY worker_id DESC LIMIT ". $intoffset . ", " . $intpagesize . ") AS a LEFT JOIN " . $GLOBALS['gdb']->fun_table('shop') . " AS b on a.shop_id = b.shop_id LEFT JOIN " . $GLOBALS['gdb']->fun_table2('worker_group') . " AS c on a.worker_group_id = c.worker_group_id ";
	// echo $strsql;exit;
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arrlist = $GLOBALS['gdb']->fun_fetch_all($hresult);
	if(!empty($arrlist)){
		foreach($arrlist as &$row){
			$row['sex'] = $row['worker_sex'] == 1 ? '男' : '女';
			$row['birthday'] = $row['worker_birthday_date'] == 0 ? '--' : date("Y-m-d", $row['worker_birthday_date']);
			$row['join'] = $row['worker_join'] == 0 ? '--' : date("Y-m-d", $row['worker_join']);
			switch($row['worker_education'])
			{
				case '1':
					$row['education_name'] = $GLOBALS['gconfig']['education'][1];break;
				case '2':
					$row['education_name'] = $GLOBALS['gconfig']['education'][2];break;
				case '3':
					$row['education_name'] = $GLOBALS['gconfig']['education'][3];break;
				case '4':
					$row['education_name'] = $GLOBALS['gconfig']['education'][4];break;
				case '5':
					$row['education_name'] = $GLOBALS['gconfig']['education'][5];break;
				case '6':
					$row['education_name'] = $GLOBALS['gconfig']['education'][6];break;
				case '7':
					$row['education_name'] = $GLOBALS['gconfig']['education'][7];break;
				default:
					$row['education_name'] = '保密';break;
			}
		}
	}
	$arrpackage['allcount'] = $intallcount;
	$arrpackage['pagecount'] = $intpagecount;
	$arrpackage['pagenow'] = $intpagenow;
	$arrpackage['pagepre'] = $intpagepre;
	$arrpackage['pagenext'] = $intpagenext;
	$arrpackage['list'] = $arrlist;
	return $arrpackage;
}
?>