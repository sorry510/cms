<?php
if(!defined('C_CNFLY')) {
	exit();
}

define('C_PATH', '');
define('C_ROOT', str_replace(C_PATH . '/inc_path.php', '', str_replace('\\', '/', __FILE__)));
?>