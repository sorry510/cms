<?php
if(!defined('C_CNFLY')) {
	exit();
}

class cls_template {
	var $_data = array();
	var $pubnow = 0;
	var $pubnocache = false;
	var $pubiscache = false;
	var $pubcache_life = 7200;
	var $pubcache_content = '';
	var $pubcod_file = array();
	var $pubhash = 'a9c901455f34ca';
	
	function __construct() {
		$this->cls_template();
	}
	
	function cls_template() {
		$this->pubnow = time();
		$this->pubhash = $this->pubhash . '165e23968c7683c5f1';
	}
	
	function fun_assign($strkey, $strvalue) {
		if(!empty($strkey)) {
			$this->_data[$strkey] = $strvalue;
		}
	}
	
	function fun_cache($strname, $strname2) {
		if($this->pubnocache) {
			return false;
		}
		
		if(!file_exists(C_ROOT . C_PATH . '/_cache/' . $strname . $strname2 . '.cac.php')) {
			return false;
		}
		$strcontent = file_get_contents(C_ROOT . C_PATH . '/_cache/' . $strname . $strname2 . '.cac.php');
		if(empty($strcontent)) {
			return false;
		}
		
		$strcontent = substr($strcontent, 16);
		$intpos = strpos($strcontent, '<');
		$strinfo = substr($strcontent, 0, $intpos);
		$arrinfo = unserialize($strinfo);
		$strcontent = substr($strcontent, $intpos);
		if(empty($arrinfo)) {
			return false;
		}
		
		if($arrinfo['etime'] < $this->pubnow) {
			return false;
		}
		foreach($arrinfo['file'] as $strfile) {
			$arrstat = stat($strfile);
			if($arrinfo['mtime'] < $arrstat['mtime']) {
				return false;
			}
		}
		
		$this->pubcache_content = $strcontent;
		$this->pubiscache = true;
		return true;
	}
	
	function fun_show($strname, $strname2 = '') {
		$strcontent = $this->fun_fetch($strname, $strname2, true);
		if(strpos($strcontent, $this->pubhash) !== FALSE) {
			$arr = explode($this->pubhash, $strcontent);
			foreach($arr as $strkey => $strvalue) {
				if($strkey % 2 == 1) {
					$arr[$strkey] = $this->fun_realtime($strvalue);
				}
			}
			$strcontent = implode('', $arr);
		}
		echo $strcontent;
	}
	
	function fun_fetch($strname, $strname2, $bview = false) {
		$strcontent = '';
		if($this->pubnocache) {
			$strcontent = $this->fun_code($strname);
		} else {
			if($this->pubiscache && $bview) {
				$strcontent = $this->pubcache_content;
			} else {
				if(!in_array(C_ROOT . C_PATH . '/' . $strname . '.cod.php', $this->pubcod_file)) {
					$this->pubcod_file[] = C_ROOT . C_PATH . '/' . $strname . '.cod.php';
				}
				$strcontent = $this->fun_code($strname);
				if($bview) {
					$arrinfo = array('file' => $this->pubcod_file, 'mtime' => $this->pubnow, 'etime' => $this->pubnow + $this->pubcache_life);
					$strinfo = serialize($arrinfo);
					$strcontent2 = '<?php exit(); ?>' . $strinfo . $strcontent;
					file_put_contents(C_ROOT . C_PATH . '/_cache/' . $strname . $strname2 . '.cac.php', $strcontent2, LOCK_EX);
				}
			}
		}
		return $strcontent;
	}
	
	function fun_code($strname) {
		$strcontent = '';
		ob_start();
		include(C_ROOT . C_PATH . '/' . $strname . '.cod.php');
		$strcontent = ob_get_contents();
		ob_end_clean();
		return $strcontent;
	}
	
	function fun_realtime($strvalue) {
		list($fun, $strpara) = explode('|', $strvalue);
		if(empty($strpara)) {
			return $fun();
		} else {
			$arr = unserialize($strpara);
			return $fun($arr);
		}
	}
	
	/*--------------------------------*/
	function fun_code_label($strlabel) {
		$arr = explode('|', $strlabel);
		$i = count($arr);
		if($i == 1) {
			$strfun = 'fun_' . $arr[0];
			return $strfun();
		} else if ($i == 2) {
			$strfun = 'fun_' . $arr[0];
			$arr2 = unserialize($arr[1]);
			return $strfun($arr2);
		}
		return '';
	}
	/*--------------------------------*/
}
?>