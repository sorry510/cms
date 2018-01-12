<?php
if(!defined('C_CNFLY')) {
	exit();
}

class cls_mysql {
	var $pubhost = '';
	var $pubuser = '';
	var $pubpassword = '';
	var $pubname = '';
	var $pubcharset = '';
	var $pubprefix = '';
	var $pubprefix2 = '';
	var $pubconnect = NULL;
	
	function __construct() {
		$this->cls_mysql();
	}
	
	function cls_mysql() {
	}
	
	function fun_connect() {
		$this->pubconnect = mysqli_connect($this->pubhost, $this->pubuser, $this->pubpassword, $this->pubname);
		$this->pubhost = $this->pubuser = $this->pubpassword = '';
		mysqli_query($this->pubconnect, "SET character_set_connection = '" . $this->pubcharset . "', character_set_results = '" . $this->pubcharset
		. "', character_set_client = 'binary'");	//MYSQL VERSION > 4.1
		mysqli_query($this->pubconnect, "SET sql_mode = ''");	//MYSQL VERSION > 5.0.1
		mysqli_set_charset($this->pubconnect, $this->pubcharset);	//MYSQL VERSION > 5.2.3
	}
	
	function fun_close() {
		mysqli_close($this->pubconnect);
	}
	
	function fun_query($strsql) {
		$hresult = mysqli_query($this->pubconnect, $strsql);
		return $hresult;
	}
	
	function fun_do($strsql) {
		$hresult = mysqli_query($this->pubconnect, $strsql);
		return $hresult;
	}
	
	function fun_fetch_row($hresult) {
		return mysqli_fetch_row($hresult);
	}
	
	function fun_fetch_assoc($hresult) {
		return mysqli_fetch_assoc($hresult);
	}
	
	function fun_fetch_array($hresult, $inttype = MYSQL_BOTH) {
		return mysqli_fetch_array($hresult, $inttype);
	}
	
	function fun_fetch_all($hresult) {
		$arrtable = array();
		while($arrrow = mysqli_fetch_assoc($hresult)) {
			$arrtable[] = $arrrow;
		}
		return $arrtable;
	}
	
	function fun_num_fields($hresult) {
		return mysqli_num_fields($hresult);
	}
	
	function fun_num_rows($hresult) {
		return mysqli_num_rows($hresult);
	}
	
	function fun_affected_rows() {
		return mysqli_affected_rows($this->pubconnect);
	}
	
	function fun_insert_id() {
		return mysqli_insert_id($this->pubconnect);
	}
	
	function fun_escape($strvalue) {
		if(empty($strvalue)) {
			return '';
		}
		return mysqli_real_escape_string($this->pubconnect, $strvalue);	//PHP VERSION >= 4.3
	}
	
	function fun_table($strtable) {
		return '`' . $this->pubname . '`.`' . $this->pubprefix . $strtable . '`';
	}
	
	function fun_table2($strtable) {
		return '`' . $this->pubname . '`.`' . $this->pubprefix2 . $strtable . '`';
	}
}
?>