<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strkey = api_value_post('key');
$intkey = api_value_int0($strkey);
$strphoto = api_value_post('photo');
$sqlphoto = $gdb->fun_escape($strphoto);
$intshop = api_value_int0($GLOBALS['_SESSION']['login_sid']);

$intreturn = 0;
$arr = array();

$strsql = "SELECT card_history_id FROM ".$gdb->fun_table2('card_history')." WHERE card_history_id=".$intid." and shop_id=".$intshop;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}

//更新照片
if($intreturn == 0){
	$objfile = new FileClass();
	update_photo($objfile, $sqlphoto, 'card_history_photo'.$intkey);
}

/**
 * $objfile 文件操作对象
 * $photo 源文件
 * $place 数据库对应字段名
 * $fix 目标文件名前缀或(后缀)
 */
function update_photo($objfile, $photo, $place, $fix = ''){
	$strnewpath = $GLOBALS['gconfig']['image']['base'].$GLOBALS['_SESSION']['login_cid'].DIRECTORY_SEPARATOR."history".DIRECTORY_SEPARATOR;//目的文件夹
	$strnewfile = $photo;
	$hresult = $objfile -> unlinkFile($strnewpath.$strnewfile);
	$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card_history')." SET ".$place." = '' where card_history_id=".$GLOBALS['intid'];
	$GLOBALS['gdb']->fun_do($strsql);
}

echo $intreturn;





