<?php
if(!defined('C_CNFLY')) {
	exit();
}

class cls_session {
	var $pub_db = NULL;
	var $pub_now = 0;
	var $pub_last = 0;
	var $pub_session_life = 18000;
	var $pub_session_key = '';
	var $pub_session_md5 = '';
	var $pub_ip = '';
	var $pub_ip2 = '';
	
	function __construct() {
		$this->cls_session();
	}
	
	function cls_session() {
		$this->pub_now = time();
	}
	
	function fun_init(&$objdb) {
		$GLOBALS['_SESSION'] = array();
		$GLOBALS['_SESSION']['login_type'] = 0;
		$GLOBALS['_SESSION']['login_id'] = 0;
		$GLOBALS['_SESSION']['login_account'] = '';
		
		$this->pub_session_md5 = md5(serialize($GLOBALS['_SESSION']));
		$this->pub_db = &$objdb;
		$this->pub_ip = api_http_ip();
		$this->pub_ip2 = substr($this->pub_ip, 0, strrpos($this->pub_ip, '.'));
		
		if(!empty($_COOKIE['CF_SKEY'])) {
			$strcookie = $_COOKIE['CF_SKEY'];
			$strcookie1 = substr($strcookie, 0, 32);
			$strcookie2 = substr($strcookie, 32);
			if($this->fun_get_crc32($strcookie1) == $strcookie2) {
				$this->pub_session_key = $strcookie1;
			}
		}
		
		if(empty($this->pub_session_key)) {
			$this->pub_session_key = md5(uniqid(mt_rand(), true));
			$this->fun_insert();
			setcookie('CF_SKEY', $this->pub_session_key . $this->fun_get_crc32($this->pub_session_key), 0, '/', '', false);
		} else {
			$this->fun_load();
		}
		
		register_shutdown_function(array(&$this, 'fun_unload'));
	}
	
	function fun_get_crc32($strkey) {
		$strcrc = '';
		if(empty($_SERVER['HTTP_USER_AGENT'])) {
			$strcrc = C_ROOT . $this->pub_ip2 . $strkey;
		} else {
			$strcrc = $_SERVER['HTTP_USER_AGENT'] . C_ROOT . $this->pub_ip2 . $strkey;
		}
		return sprintf('%08x', crc32($strcrc));
	}
	
	function fun_insert() {
		$this->pub_db->fun_query('INSERT INTO ' . $this->pub_db->fun_table('session') . " (session_key, session_ip, session_last) VALUES ('"
		. $this->pub_db->fun_escape($this->pub_session_key) . "', '" . $this->pub_ip . "', " . $this->pub_now . ")");
	}
	
	function fun_load() {
		$arr = array();
		$strsql = "SELECT session_login_type, session_login_id, session_login_account, session_last FROM " . $this->pub_db->fun_table('session')
		. " WHERE session_key = '" . $this->pub_db->fun_escape($this->pub_session_key) . "' LIMIT 1";
		$hresult = $this->pub_db->fun_query($strsql);
		$arr = $this->pub_db->fun_fetch_assoc($hresult);
		if(empty($arr)) {
			$this->fun_insert();
		} else {
			if($this->pub_now < $arr['session_last'] + $this->pub_session_life) {
				$GLOBALS['_SESSION']['login_type'] = $arr['session_login_type'];
				$GLOBALS['_SESSION']['login_id'] = $arr['session_login_id'];
				$GLOBALS['_SESSION']['login_account'] = $arr['session_login_account'];
				$this->pub_session_md5 = md5(serialize($GLOBALS['_SESSION']));
				$this->pub_last = $arr['session_last'];
			}
		}
	}
	
	function fun_update() {
		$this->pub_now = time();
		$strmd5 = md5(serialize($GLOBALS['_SESSION']));
		if($this->pub_session_md5 == $strmd5 && $this->pub_now < $this->pub_last + 10) {
			return;
		}
		
		$strsql = "UPDATE " . $this->pub_db->fun_table('session') . " SET session_login_type = " . api_value_int0($GLOBALS['_SESSION']['login_type'])
		. ", session_login_id = " . api_value_int0($GLOBALS['_SESSION']['login_id']) . ", session_login_account = '"
		. $this->pub_db->fun_escape($GLOBALS['_SESSION']['login_account']) . "', session_ip = '" . $this->pub_ip . "', session_last = " . $this->pub_now
		. " WHERE session_key = '" . $this->pub_db->fun_escape($this->pub_session_key) . "' LIMIT 1";
		$this->pub_db->fun_do($strsql);
	}
	
	function fun_unload() {
		$this->fun_update();
		
		if(time() % 2 == 0) {
			$strsql = "DELETE FROM " . $this->pub_db->fun_table('session') . " WHERE session_last < " . ($this->pub_now - $this->pub_session_life);
			$this->pub_db->fun_do($strsql);
		}
	}
	
	function fun_clear() {
		$GLOBALS['_SESSION'] = array();
		$GLOBALS['_SESSION']['login_type'] = 0;
		$GLOBALS['_SESSION']['login_id'] = 0;
		$GLOBALS['_SESSION']['login_account'] = '';
		
		setcookie('CF_SKEY', $this->pub_session_key, 1, '/', '', false);
		$strsql = "DELETE FROM " . $this->pub_db->fun_table('session') . " WHERE session_key = '" . $this->pub_db->fun_escape($this->pub_session_key)
		. "' LIMIT 1";
		$this->pub_db->fun_do($strsql);
	}
}
?>