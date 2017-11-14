<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

@header("Content-Type:image/jpeg");
$strimage = api_value_get('image');
$sqlimage = $gdb->fun_escape($strimage);
$strc = api_value_get('c');
$sqlc = $gdb->fun_escape($strc);
$strtype = api_value_get('type');
$sqltype = $gdb->fun_escape($strtype);
$image_path = $gconfig['image']['base'];
$imagefile = $image_path.$sqlc.DIRECTORY_SEPARATOR.$sqltype.DIRECTORY_SEPARATOR.$sqlimage;

// 如果不是文件，取默认图片
if(!@is_file($imagefile))
	$imagefile = $image_path.'no.jpg';

echo @file_get_contents($imagefile);

