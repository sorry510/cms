<?php
if(!defined('C_CNFLY')) {
	exit();
}

function api_value_int0($strvalue) {
	if(empty($strvalue)) {
		return 0;
	}
	$int0 = intval($strvalue);
	if($int0 < 0) {
		return 0;
	} else {
		return $int0;
	}
}

function api_value_int1($strvalue) {
	if(empty($strvalue)) {
		return 1;
	}
	$int1 = intval($strvalue);
	if($int1 < 1) {
		return 1;
	} else {
		return $int1;
	}
}

function api_value_nint($strvalue) {
	if(empty($strvalue)) {
		return 0;
	}
	$int = intval($strvalue);
	if($int > 0) {
		return 0;
	} else {
		return $int;
	}
}

function api_value_sint($strvalue) {
	if(empty($strvalue)) {
		return 0;
	}
	$int = intval($strvalue);
	return $int;
}

function api_value_decimal($strvalue, $intprecision = 0) {
	if(empty($strvalue)) {
		return 0;
	}
	$float0 = round($strvalue, $intprecision);
	if($float0 < 0) {
		return 0;
	} else {
		return $float0;
	}
}

function api_value_ndecimal($strvalue, $intprecision = 0) {
	if(empty($strvalue)) {
		return 0;
	}
	$float2 = round($strvalue, $intprecision);
	if($float2 > 0) {
		return 0;
	} else {
		return $float2;
	}
}

function api_value_sdecimal($strvalue, $intprecision = 0) {
	if(empty($strvalue)) {
		return 0;
	}
	$float3 = round($strvalue, $intprecision);
	return $float3;
}

function api_value_get($strvalue) {
	if(!isset($_GET[$strvalue])) {
		return '';
	}
	return $_GET[$strvalue];
}

function api_value_post($strvalue) {
	if(!isset($_POST[$strvalue])) {
		return '';
	}
	return $_POST[$strvalue];
}

function api_value_query($arrquery, $strpage = '') {
	if(empty($arrquery)) {
		return '';
	}
	$str = http_build_query($arrquery);
	if(!empty($strpage)) {
		$str = $str . '&page=' . $strpage;
	}
	return $str;
}

function api_http_html($strurl, $arrinput = NULL, $arrcookie = NULL) {
	$hurl = curl_init();
	curl_setopt($hurl, CURLOPT_URL, $strurl);
	curl_setopt($hurl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($hurl, CURLOPT_SSL_VERIFYHOST, FALSE);
	if(!empty($arrinput)) {
		curl_setopt($hurl, CURLOPT_POST, 1);
		if(is_array($arrinput)) {
			curl_setopt($hurl, CURLOPT_POSTFIELDS, http_build_query($arrinput));
		} else {
			curl_setopt($hurl, CURLOPT_POSTFIELDS, $arrinput);
		}
	}
	if(!empty($arrcookie)) {
		$strcookie = implode(';', $arrcookie);
		curl_setopt($hurl, CURLOPT_COOKIE, $strcookie);
	}
	curl_setopt($hurl, CURLOPT_RETURNTRANSFER, 1);
	$str = curl_exec($hurl);
	curl_close($hurl);
	return $str;
}

function api_http_ip() {
	static $strip = NULL;
	if($strip !== NULL) {
		return $strip;
	}
	
	if(!empty($_SERVER)) {
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$arrip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			foreach($arrip as $strvalue) {
				$strvalue = trim($strvalue);
				if($strvalue != 'unknown') {
					$strip = $strvalue;
					break;
				}
			}
		} else if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$strip = $_SERVER['HTTP_CLIENT_IP'];
		} else if(!empty($_SERVER['REMOTE_ADDR'])) {
			$strip = $_SERVER['REMOTE_ADDR'];
		} else {
			$strip = '0.0.0.0';
		}
	} else {
		$strenv = getenv('HTTP_X_FORWARDED_FOR');
		$strenv2 = getenv('HTTP_CLIENT_IP');
		$strenv3 = getenv('REMOTE_ADDR');
		if(!empty($strenv)) {
			$strip = $strenv;
		} else if(!empty($strenv2)) {
			$strip = $strenv2;
		} else if(!empty($strenv3)) {
			$strip = $strenv3;
		} else {
			$strip = '0.0.0.0';
		}
	}
	
	preg_match("/[\d\.]{7,15}/", $strip, $arrmatch);
	if(empty($arrmatch)) {
		$strip = '0.0.0.0';
	} else {
		$strip = $arrmatch[0];
	}
	
	return $strip;
}

function api_other_gpc($strdata) {
	if(empty($strdata)) {
		return $strdata;
	} else {
		if(is_array($strdata)) {
			return array_map('api_other_gpc', $strdata);
		} else {
			return stripslashes($strdata);
		}
	}
}
?>