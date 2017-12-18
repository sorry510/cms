<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$GLOBALS['_SESSION']['login_openid'] = '111';
// $GLOBALS['_SESSION']['login_cid'] = 1;0
// $gdb->pub_prefix2 = 'am_0001_';
$strchannel = "index";

$sqlopen_id = $gdb->fun_escape($GLOBALS['_SESSION']['login_openid']);

$gtemplate->fun_assign('card_info', get_card_info());
$gtemplate->fun_show('index');

function get_card_info(){
	$arr = array();
	$strsql = "SELECT card_id,card_okey,card_ikey,card_code,card_state,card_name,card_photo_file,card_phone,card_carcode,card_sex,card_birthday_date,card_password_state,card_password,card_identity,card_atime,card_edate,card_memo,s_card_ymoney,s_card_yscore,s_card_smoney,s_card_sscore,c_card_type_name,c_card_type_discount,worker_id,card_link,s_card_reward FROM " . $GLOBALS['gdb']->fun_table2('card') . " where card_okey = '".$GLOBALS['sqlopen_id']."' limit 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		$arr['sex'] = $arr['card_sex'] == '3' ? '保密' : ($arr['card_sex'] == '1' ? '男':'女');
		$arr['birthday'] = $arr['card_birthday_date'] == 0 ? '--' : date("Y-m-d",$arr['card_birthday_date']);
		$arr['atime'] = date("Y-m-d H:i",$arr['card_atime']);
		$arr['discount'] = $arr['c_card_type_discount'] == 0 ? 10 : $arr['c_card_type_discount'];
		$arr['edate'] = $arr['card_edate'] == 0 ? '--' : date("Y-m-d",$arr['card_edate']);
		$arr['state'] = $arr['card_state'] == '1' ? '正常' : '停用';

		$arr['mcount'] = 0;
		$strsql1 = "SELECT card_mcombo_parent FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." WHERE card_id = ".$arr['card_id']." and (card_mcombo_cedate>=".time()." or card_mcombo_cedate=0) and card_mcombo_parent!=0 group by card_mcombo_parent having sum(card_mcombo_gcount)!=0";
		$strsql = "SELECT count(card_mcombo_id) as count FROM ".$GLOBALS['gdb']->fun_table2('card_mcombo')." where card_mcombo_type = 1 and card_mcombo_id in(".$strsql1.") order by card_mcombo_id asc";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$intmcount = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($intmcount)){
			$arr['mcount'] = $intmcount['count'];
		}

		$arr['tcount'] = 0;
		$strsql = "SELECT count(card_ticket_id) as count FROM ".$GLOBALS['gdb']->fun_table2('card_ticket')." where card_id=".$arr['card_id']." and card_ticket_state=1 and card_ticket_edate>".time();
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$inttcount = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($inttcount)){
			$arr['tcount'] = $inttcount['count'];
		}
	}
	return $arr;
}