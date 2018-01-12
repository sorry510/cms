<?php
if(!defined('C_CNFLY')) {
	exit();
}

class cls_session {
	var $pubdb = NULL;
	var $pubnow = 0;
	var $publast = 0;
	var $pubsession_life = 18000;
	var $pubsession_key = '';
	var $pubsession_md5 = '';
	var $pubip = '';
	var $pubip2 = '';
	
	function __construct() {
		$this->cls_session();
	}
	
	function cls_session() {
		$this->pubnow = time();
	}
	
	function fun_init(&$objdb) {
		$GLOBALS['_SESSION'] = array();
		$GLOBALS['_SESSION']['login_type'] = 0;
		$GLOBALS['_SESSION']['login_id'] = 0;
		$GLOBALS['_SESSION']['login_openid'] = '';
		$GLOBALS['_SESSION']['login_code'] = '';
		$GLOBALS['_SESSION']['login_cid'] = 0;
		$GLOBALS['_SESSION']['login_sid'] = 0;
		
		$this->pubsession_md5 = md5(serialize($GLOBALS['_SESSION']));
		$this->pubdb = &$objdb;
		//$this->pubip = api_http_ip();
		//$this->pubip2 = substr($this->pubip, 0, strrpos($this->pubip, '.'));
		
		if(!empty($_COOKIE['CF_SKEY'])) {
			$strcookie = $_COOKIE['CF_SKEY'];
			$strcookie1 = substr($strcookie, 0, 32);
			$strcookie2 = substr($strcookie, 32);
			if($this->fun_get_crc32($strcookie1) == $strcookie2) {
				$this->pubsession_key = $strcookie1;
			}
		}
		
		if(empty($this->pubsession_key)) {
			$this->pubsession_key = md5(uniqid(mt_rand(), true));
			$this->fun_insert();
			setcookie('CF_SKEY', $this->pubsession_key . $this->fun_get_crc32($this->pubsession_key), 0, '/', '', false);
		} else {
			$this->fun_load();
		}
		
		register_shutdown_function(array(&$this, 'fun_unload'));
	}
	
	function fun_get_crc32($strkey) {
		$strcrc = '';
		/*if(empty($_SERVER['HTTP_USER_AGENT'])) {
			$strcrc = C_ROOT . $this->pubip2 . $strkey;
		} else {
			$strcrc = $_SERVER['HTTP_USER_AGENT'] . C_ROOT . $this->pubip2 . $strkey;
		}*/
		$strcrc = C_ROOT . $strkey . 'a9c901455f34ca' . '165e23968c7683c5f1';
		return sprintf('%08x', crc32($strcrc));
	}
	
	function fun_insert() {
		$this->pubdb->fun_do('INSERT INTO ' . $this->pubdb->fun_table('session') . " (session_key, session_ip, session_last) VALUES ('"
		. $this->pubdb->fun_escape($this->pubsession_key) . "', '" . $this->pubip . "', " . $this->pubnow . ")");
	}
	
	function fun_load() {
		$arr = array();
		$strsql = "SELECT session_login_type, session_login_id, session_login_openid, session_login_code, session_login_cid, session_login_sid, session_last FROM "
		. $this->pubdb->fun_table('session') . " WHERE session_key = '" . $this->pubdb->fun_escape($this->pubsession_key) . "' LIMIT 1";
		$hresult = $this->pubdb->fun_query($strsql);
		$arr = $this->pubdb->fun_fetch_assoc($hresult);
		if(empty($arr)) {
			$this->fun_insert();
		} else {
			if($this->pubnow < $arr['session_last'] + $this->pubsession_life) {
				$GLOBALS['_SESSION']['login_type'] = $arr['session_login_type'];
				$GLOBALS['_SESSION']['login_id'] = $arr['session_login_id'];
				$GLOBALS['_SESSION']['login_openid'] = $arr['session_login_openid'];
				$GLOBALS['_SESSION']['login_code'] = $arr['session_login_code'];
				$GLOBALS['_SESSION']['login_cid'] = $arr['session_login_cid'];
				$GLOBALS['_SESSION']['login_sid'] = $arr['session_login_sid'];
				$this->pubsession_md5 = md5(serialize($GLOBALS['_SESSION']));
				$this->publast = $arr['session_last'];
			}
		}
	}
	
	function fun_update() {
		$this->pubnow = time();
		$strmd5 = md5(serialize($GLOBALS['_SESSION']));
		if($this->pubsession_md5 == $strmd5 && $this->pubnow < $this->publast + 10) {
			return;
		}
		
		$strsql = "UPDATE " . $this->pubdb->fun_table('session')
		. " SET session_login_type = " . api_value_int0($GLOBALS['_SESSION']['login_type'])
		. ", session_login_id = " . api_value_int0($GLOBALS['_SESSION']['login_id'])
		. ", session_login_openid = '" . $this->pubdb->fun_escape($GLOBALS['_SESSION']['login_openid'])
		. "', session_login_code = '" . $this->pubdb->fun_escape($GLOBALS['_SESSION']['login_code'])
		. "', session_login_cid = " . api_value_int0($GLOBALS['_SESSION']['login_cid'])
		. ", session_login_sid = " . api_value_int0($GLOBALS['_SESSION']['login_sid'])
		. ", session_ip = '" . $this->pubip . "', session_last = " . $this->pubnow
		. " WHERE session_key = '" . $this->pubdb->fun_escape($this->pubsession_key) . "' LIMIT 1";
		$this->pubdb->fun_do($strsql);
	}
	
	function fun_unload() {
		$this->fun_update();
		
		if(time() % 2 == 0) {
			$strsql = "DELETE FROM " . $this->pubdb->fun_table('session') . " WHERE session_last < " . ($this->pubnow - $this->pubsession_life);
			$this->pubdb->fun_do($strsql);
		}
	}
	
	function fun_clear() {
		$GLOBALS['_SESSION'] = array();
		$GLOBALS['_SESSION']['login_type'] = 0;
		$GLOBALS['_SESSION']['login_id'] = 0;
		$GLOBALS['_SESSION']['login_openid'] = '';
		$GLOBALS['_SESSION']['login_code'] = '';
		$GLOBALS['_SESSION']['login_cid'] = 0;
		$GLOBALS['_SESSION']['login_sid'] = 0;
		
		setcookie('CF_SKEY', $this->pubsession_key, 1, '/', '', false);
		$strsql = "DELETE FROM " . $this->pubdb->fun_table('session') . " WHERE session_key = '" . $this->pubdb->fun_escape($this->pubsession_key) . "' LIMIT 1";
		$this->pubdb->fun_do($strsql);
	}
}
?>