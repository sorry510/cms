<?php
if(!defined('C_CNFLY')) {
	exit();
}

class cls_mysql {
	var $pub_host = '';
	var $pub_user = '';
	var $pub_password = '';
	var $pub_name = '';
	var $pub_charset = '';
	var $pub_prefix = '';
	var $pub_connect = NULL;
	
	function __construct() {
		$this->cls_mysql();
	}
	
	function cls_mysql() {
	}
	
	function fun_connect() {
		$this->pub_connect = mysql_connect($this->pub_host, $this->pub_user, $this->pub_password, true);
		$this->pub_host = $this->pub_user = $this->pub_password = '';
		
		$strversion = mysql_get_server_info($this->pub_connect);
		if($strversion > '4.1') {
			mysql_query("set character_set_connection = '" . $this->pub_charset . "', character_set_results = '" . $this->pub_charset
			. "', character_set_client = 'binary'", $this->pub_connect);
		}
		if($strversion > '5.0.1') {
			mysql_query("set sql_mode = ''", $this->pub_connect);
		}
		if($strversion > '5.2.3') {
			mysql_set_charset($this->pub_charset, $this->pub_connect);
		}
		
		mysql_select_db($this->pub_name, $this->pub_connect);
	}
	
	function fun_close() {
		mysql_close($this->pub_connect);
	}
	
	function fun_query($strsql) {
		$hresult = mysql_query($strsql, $this->pub_connect);
		return $hresult;
	}
	
	function fun_do($strsql) {
		$hresult = mysql_query($strsql, $this->pub_connect);
		return $hresult;
	}
	
	function fun_fetch_row($hresult) {
		return mysql_fetch_row($hresult);
	}
	
	function fun_fetch_assoc($hresult) {
		return mysql_fetch_assoc($hresult);
	}
	
	function fun_fetch_array($hresult, $inttype = MYSQL_BOTH) {
		return mysql_fetch_array($hresult, $inttype);
	}
	
	function fun_fetch_all($hresult){
		$arrtable = array();
		while($arrrow = mysql_fetch_assoc($hresult)) {
			$arrtable[] = $arrrow;
		}
		return $arrtable;
	}
	
	function fun_num_fields($hresult) {
		return mysql_num_fields($hresult);
	}
	
	function fun_num_rows($hresult) {
		return mysql_num_rows($hresult);
	}
	
	function fun_affected_rows() {
		return mysql_affected_rows($this->pub_connect);
	}
	
	function fun_insert_id() {
		return mysql_insert_id($this->pub_connect);
	}
	
	function fun_escape($strvalue) {
		if(empty($strvalue)) {
			return '';
		}
		if(PHP_VERSION >= '4.3') {
			return mysql_real_escape_string($strvalue, $this->pub_connect);
		} else {
			return mysql_escape_string($strvalue);
		}
	}
	
	function fun_table($strtable) {
		return '`' . $this->pub_name . '`.`' . $this->pub_prefix . $strtable . '`';
	}
}
?>