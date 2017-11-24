<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('fileClass.php');
require('inc_limit.php');

$strid = api_value_post('id');
$intid = api_value_int0($strid);
$strphoto = api_value_post('photo');
$sqlphoto = $gdb->fun_escape($strphoto);

$intreturn = 0;
$arr = array();
$strplace = '';
$intkey = 0;
$strsql = "SELECT wgoods_id,wgoods_photo1,wgoods_photo2,wgoods_photo3,wgoods_photo4,wgoods_photo5 FROM ".$gdb->fun_table2('wgoods')." WHERE wgoods_id=".$intid;
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_assoc($hresult);
if(empty($arr)){
	$intreturn = 1;
}else{
	if($arr['wgoods_photo1'] == ''){
		$strplace = 'wgoods_photo1';
		$intkey = 1;
	}else if($arr['wgoods_photo2'] == ''){
		$strplace = 'wgoods_photo2';
		$intkey = 2;
	}else if($arr['wgoods_photo3'] == ''){
		$strplace = 'wgoods_photo3';
		$intkey = 3;
	}else if($arr['wgoods_photo4'] == ''){
		$strplace = 'wgoods_photo4';
		$intkey = 4;
	}else if($arr['wgoods_photo5'] == ''){
		$strplace = 'wgoods_photo5';
		$intkey = 5;
	}else{
		$intreturn = 2;
	}
}

//更新照片
if($intreturn == 0){
	$objfile = new FileClass();
	update_photo($objfile, $sqlphoto, $strplace, $intkey);
}

/**
 *
 * $objfile 文件操作对象
 * $photo 源文件
 * $place 数据库对应字段名
 * $fix 目标文件名前缀或(后缀)
 */
function update_photo($objfile, $photo, $place, $fix = ''){
	$strtmpfile = $GLOBALS['gconfig']['photo'][0].$photo;
	$strext = strtolower(strrchr($photo, '.'));
	$strnewpath = $GLOBALS['gconfig']['image']['base'].$GLOBALS['_SESSION']['login_cid'].DIRECTORY_SEPARATOR."wgoods".DIRECTORY_SEPARATOR;//目的文件夹
	$strnewfile = api_value_int0($GLOBALS['_SESSION']['login_cid'])."_".$GLOBALS['intid']."_".$fix.$strext;//新文件名
	$hresult = $objfile -> moveFile($strtmpfile, $strnewpath.$strnewfile, true);//move操作自带删除源文件
	if($hresult){
		$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('wgoods')." SET ".$place." = '".$strnewfile."' where wgoods_id=".$GLOBALS['intid'];
		$GLOBALS['gdb']->fun_do($strsql);
		// $objfile -> unlinkFile($strtmpfile);
	}
}
echo $intreturn;





