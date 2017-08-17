<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gdb->pub_prefix2 = substr($GLOBALS['_SESSION']['login_code'], 0, 5) . '_' . str_pad($GLOBALS['_SESSION']['login_cid'], 4, '0' , STR_PAD_LEFT) . '_';


?>