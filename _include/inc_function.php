<?php
if(!defined('C_CNFLY')) {
	exit();
}

function laimi_prefix2_value() {
	$str = '';
	if(!empty($GLOBALS['_SESSION']['login_type'])) {
		$str = substr($GLOBALS['_SESSION']['login_code'], 0, 5) . "_"
		. str_pad(api_value_int0($GLOBALS['_SESSION']['login_cid']), 4, '0', STR_PAD_LEFT) . '_';
	}
	return $str;
}

function laimi_company_name() {
	$str = '';
	$arr = array();
	$strsql = "SELECT company_id, company_name FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$str = $arr['company_name'];
	return $str;
}

function laimi_shop_list(){
	$arr = array();
	$strsql = "SELECT shop_id, shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE shop_etime > " . time() . " ORDER BY shop_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

// 获取当前用户姓名
function laimi_user_name(){
	$str = '';
	$arr = array();
	$strsql = "SELECT user_name FROM ".$GLOBALS['gdb']->fun_table2('user'). " WHERE user_id=".api_value_int0($GLOBALS['_SESSION']['login_id']). " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$str = $arr['user_name'];
	return $str;
}

// get系统基础配置信息
function laimi_config_trade(){
	$arr = array();
	$arrtrade = array();
	$arrtrade_init = array(
					'sms_module' => 2,
					'score_module' => 2,
					'worker_module' => 2,
					'history_module' => 2,
					'act_module' => 2,
					'wmp_module' => 2,
					'wsc_module' => 2,
					'sms_flag' => 2,
					'score_flag' => 2,
					'worker_flag' => 2,
					'history_flag' => 2,
					'store_count' => 0
				);
	$strsql = "SELECT company_config_trade FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_trade'])){
			$arrtrade = json_decode($arr['company_config_trade'], true);
			if(!$arrtrade){
				$arrtrade = $arrtrade_init;
			}
		}else{
			$arrtrade = $arrtrade_init;
		}
	}
	return $arrtrade;
}

function laimi_config_weixin(){
	$arr = array();
	$arrweixin = array();
	$arrweixin_init = array(
					'name' => '',
					'appid' => '',
					'appsecret' => '',
					'reserve_flag' => 2,
					'line_flag' => 2,
					'card_image' => '',
				);
	$strsql = "SELECT company_config_weixin FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_weixin'])){
			$arrweixin = json_decode($arr['company_config_weixin'], true);
			if(!$arrweixin){
				$arrweixin = $arrweixin_init;
			}
		}else{
			$arrweixin = $arrweixin_init;
		}
	}
	return $arrweixin;
}

function laimi_config_wshop(){
	$arr = array();
	$arrwshop = array();
	$arrwshop_init = array(
					'wshop_flag' => 2,
					'send_method' => 3,
					'send_from' => 2,
					'fenxiao_flag' => 2,
				);
	$strsql = "SELECT company_config_wshop FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_wshop'])){
			$arrwshop = json_decode($arr['company_config_wshop'], true);
			if(!$arrwshop){
				$arrwshop = $arrwshop_init;
			}
		}else{
			$arrwshop = $arrwshop_init;
		}
	}
	return $arrwshop;
}

function laimi_config_wpay(){
	$arr = array();
	$arrwpay = array();
	$arrwpay_init = array(
					'pay_flag' => 2,
					'alipay_appid' => '',
					'alipay_key' => '',
					'alipay_rsa2' => '',
					'weixin_appid' => '',
					'weixin_appsecret' => '',
				);
	$strsql = "SELECT company_config_wpay FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id = " . $GLOBALS['_SESSION']['login_cid'] . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_wpay'])){
			$arrwpay = json_decode($arr['company_config_wpay'], true);
			if(!$arrwpay){
				$arrwpay = $arrwpay_init;
			}
		}else{
			$arrwpay = $arrwpay_init;
		}
	}
	return $arrwpay;
}

/**
 * 获取商品最低价格
 *
 * @param int $goods_id
 * @param int $type
 * @param int $card_id
 * @param array $act_id : 1.mgoods,2.sgoods,3.mcombo
 * @return array min_price,act_discount_id
 */
function laimi_goods_price($goods_id = 0, $type = 0, $card_id = 0, $act_id = array()){
	$arr = array();
	$price = 0;
	$cprice = 0;
	$act_price = 0;
	$discount_price = 0;
	$stract_id = '';
	if(!empty($act_id) && is_array($act_id)){
		$stract_id = implode(',', $act_id);
	}
	$act_discount_id = 0;

	if($goods_id != 0){
		if($type == 1){
			// 判断商品是否参加活动
			$arrmgoods = array();
			$strsql = "SELECT mgoods_id,mgoods_price,mgoods_cprice,mgoods_act FROM ".$GLOBALS['gdb']->fun_table2('mgoods')." WHERE mgoods_id=".$goods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrmgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arrmgoods)){
				$price = $arrmgoods['mgoods_price'];
				$cprice = $arrmgoods['mgoods_cprice'];
				//$act_price
				if($arrmgoods['mgoods_act'] == 1 && !empty($stract_id)){
					$strsql = "SELECT act_discount_id,mgoods_id,act_discount_goods_price FROM ".$GLOBALS['gdb']->fun_table2('act_discount_goods')." where mgoods_id=".$goods_id." && act_discount_id in (".$stract_id.")";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
					if(!empty($arr)){
						$act_price = $arr[0]['act_discount_goods_price'];
						$act_discount_id = $arr[0]['act_discount_id'];
						foreach($arr as $v){
							if($act_price > $v['act_discount_goods_price']){
								$act_price = $v['act_discount_goods_price'];
								$act_discount_id = $v['act_discount_id'];
							}
						}
					}
				}
				//$discount_price
				if(!empty($card_id)){
					$strsql = "SELECT c_card_type_discount FROM ".$GLOBALS['gdb']->fun_table2('card')." where card_id=".$card_id." limit 1";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$card_discount = $arr['c_card_type_discount'];
						if($card_discount <= 0 || $card_discount > 10){
							$card_discount = 10;
						}
						$discount_price = round($price * $card_discount / 10, 2);//四舍五入
					}
				}
			}
		}else if($type == 2){
			$arrsgoods = array();
			$strsql = "SELECT sgoods_id,sgoods_price,sgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('sgoods')." WHERE sgoods_id=".$goods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrsgoods = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arrsgoods)){
				$price = $arrsgoods['sgoods_price'];
				$cprice = $arrsgoods['sgoods_cprice'];
				//$discount_price
				if(!empty($card_id)){
					$strsql = "SELECT c_card_type_discount FROM ".$GLOBALS['gdb']->fun_table2('card')." where card_id=".$card_id." limit 1";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$card_discount = $arr['c_card_type_discount'];
						if($card_discount <= 0 || $card_discount > 10){
							$card_discount = 10;
						}
						$discount_price = round($price * $card_discount / 10, 2);//四舍五入
					}
				}
			}
		}else if($type == 3){
			// 判断商品是否参加活动
			$arrmcombo = array();
			$strsql = "SELECT mcombo_id,mcombo_price,mcombo_cprice,mcombo_act FROM ".$GLOBALS['gdb']->fun_table2('mcombo')." WHERE mcombo_id=".$goods_id;
			$hresult = $GLOBALS['gdb']->fun_query($strsql);
			$arrmcombo = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
			if(!empty($arrmcombo)){
				$price = $arrmcombo['mcombo_price'];
				$cprice = $arrmcombo['mcombo_cprice'];
				//$act_price
				if($arrmcombo['mcombo_act'] == 1 && !empty($stract_id)){
					$strsql = "SELECT act_discount_id,mcombo_id,act_discount_goods_price,c_mcombo_name,c_mcombo_price FROM ".$GLOBALS['gdb']->fun_table2('act_discount_goods')." where mcombo_id=".$goods_id." && act_discount_id in (".$stract_id.")";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
					if(!empty($arr)){
						$act_price = $arr[0]['act_discount_goods_price'];
						$act_discount_id = $arr[0]['act_discount_id'];
						foreach($arr as $v){
							if($act_price > $v['act_discount_goods_price']){
								$act_mcombo_price = $v['act_discount_goods_price'];
								$act_discount_id = $v['act_discount_id'];
							}
						}
					}
				}
				//$discount_price
				if(!empty($card_id)){
					$strsql = "SELECT c_card_type_discount FROM ".$GLOBALS['gdb']->fun_table2('card')." where card_id=".$card_id." limit 1";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$card_discount = $arr['c_card_type_discount'];
						if($card_discount <= 0 || $card_discount > 10){
							$card_discount = 10;
						}
						$discount_price = round($price * $card_discount / 10, 2);//四舍五入
					}
				}
			}
		}
	}

	$arrprice = array();
	if($price != 0)
		$arrprice[] = $price;
	if($cprice != 0)
		$arrprice[] = $cprice;
	if($act_price != 0)
		$arrprice[] = $act_price;
	if($discount_price != 0)
		$arrprice[] = $discount_price;

	$arrgoods = array();
	$arrgoods['min_price'] = 0;
	$arrgoods['act_discount_id'] = 0;
	if(!empty($arrprice)){
		$arrgoods['min_price'] = min($arrprice);
		$arrgoods['act_discount_id'] = $arrgoods['min_price'] == $act_price ? $act_discount_id : 0;
	}
	return $arrgoods;
}