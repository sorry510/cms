<?php
if(!defined('C_CNFLY')) {
	exit();
}

function laimi_prefix2_value() {
	$strprefix2 = '';
	if(!empty($GLOBALS['_SESSION']['login_type'])) {
		$strprefix2 = substr($GLOBALS['_SESSION']['login_code'], 0, 5) . "_" . str_pad(api_value_int0($GLOBALS['_SESSION']['login_cid']), 4, '0', STR_PAD_LEFT) . '_';
	}
	return $strprefix2;
}

function laimi_company_info() {
	$strname = '';
	$arr = array();
	$strsql = "SELECT company_id, company_name FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		$strname = $arr['company_name'];
	}
	return $strname;
}

function laimi_shop_list() {
	$arr = array();
	$strsql = "SELECT shop_id, shop_name ,shop_phone,shop_area_address FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE shop_etime > " . time() . " AND company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " ORDER BY shop_id DESC";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}

function laimi_company_trade() {
	$arrtrade = array(
		'sms_module' => 2,
		'score_module' => 2,
		'worker_module' => 2,
		'history_module' => 2,
		'act_module' => 2,
		'cash_module' => 2,
		'wmp_module' => 2,
		'wshop_module' => 2,
		'sms_flag' => 2,
		'sms_sign' => '',
		'score_flag' => 2,
		'worker_flag' => 2,
		'history_flag' => 2,
		'store_count' => 0
	);
	
	$arr = array();
	$arr2 = array();
	$strsql = "SELECT company_id, company_config_trade FROM " . $GLOBALS['gdb']->fun_table('company')
	. " WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)) {
		if(!empty($arr['company_config_trade'])) {
			$arr2 = json_decode($arr['company_config_trade'], true);
			if(!empty($arr2)) {
				$arrtrade = $arr2;
			}
		}
	}
	return $arrtrade;
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
	$strsql = "SELECT company_config_trade FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
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
// get系统支付配置信息
function laimi_config_pay(){
	$arr = array();
	$arrtrade = array();
	$arrtrade_init = array(
					'alipay_flag' => 2,
					'alipay_appid' => '',
					'alipaysign_type' => '',
					'alipay_public_key' => '',
					'alipay_private_key' => '',
					'weixin_flag' => 2,
					'weixin_appid' => '',
					'weixin_sub_appid' => '',
					'weixin_appsecret' => '',
					'weixin_mchid' => '',
					'weixin_sub_mchid' => '',
					'weixin_key' => '',
				);
	$strsql = "SELECT company_config_pay FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if(!empty($arr['company_config_pay'])){
			$arrtrade = json_decode($arr['company_config_pay'], true);
			if(!$arrtrade){
				$arrtrade = $arrtrade_init;
			}
		}else{
			$arrtrade = $arrtrade_init;
		}
	}
	return $arrtrade;
}
// get店铺配置信息
function laimi_config_shop_trade(){
	$arr = array();
	$arrtrade = array();
	$arrjson = array(
				'sprint_flag' => 2,
				'sprint_title' => '',
				'sprint_memo' => '',
				'sprint_width' => 0,
				'sprint_device' => '',
				'wprint_device' => ''
			);
	$strsql = "SELECT shop_config_print FROM " . $GLOBALS['gdb']->fun_table('shop')." where shop_id=".api_value_int0($GLOBALS['_SESSION']['login_sid'])." and company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']);
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if($arr['shop_config_print'] != ''){
			$arrtrade = json_decode($arr['shop_config_print'], true);
			if(!$arrtrade){
				$arrtrade = $arrjson;
			}
		}else{
			$arrtrade = $arrjson;
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
	$strsql = "SELECT company_config_weixin FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
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
	$strsql = "SELECT company_config_wshop FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
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

function laimi_config_wpay($cid){
	$arr = array();
	$arrwpay = array();
	$arrwpay_init = array(
					'pay_flag' => 2,
					'weixin_appid' => '',
					'weixin_sub_appid' => '',
					'weixin_mchid' => '',
					'weixin_sub_mchid' => '',
					'weixin_key' => '',
					'weixin_appsecret' => '',
				);
	$strsql = "SELECT company_config_wpay FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id = " . $cid . " LIMIT 1";
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
 * @param int $type 1.wgoods,2.sgoods,3.mcombo
 * @param int $card_id
 * @param array $act_id 
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
				$cprice = 0;
				//$act_price
				if(!empty($stract_id)){
					$strsql = "SELECT min(act_discount_goods_price) as min_price,act_discount_id,mgoods_id FROM ".$GLOBALS['gdb']->fun_table2('act_discount_goods')." where mgoods_id=".$goods_id." && act_discount_id in (".$stract_id.")";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$act_price = $arr['min_price'];
						$act_discount_id = $arr['act_discount_id'];
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
						$cprice = $arrmgoods['mgoods_cprice'];
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
				$cprice = 0;
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
						$cprice = $arrsgoods['sgoods_cprice'];
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
				$cprice = 0;
				//$act_price
				if(!empty($stract_id)){
					$strsql = "SELECT min(act_discount_goods_price) as min_price,act_discount_id,mcombo_id FROM ".$GLOBALS['gdb']->fun_table2('act_discount_goods')." where mcombo_id=".$goods_id." && act_discount_id in (".$stract_id.")";
					$hresult = $GLOBALS['gdb']->fun_query($strsql);
					$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
					if(!empty($arr)){
						$act_price = $arr['min_price'];
						$act_discount_id = $arr['act_discount_id'];
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
						$cprice = $arrmcombo['mcombo_cprice'];
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

/**
 * 获取微商品最低价格
 *
 * @param int $goods_id
 * @param str $act_id : '1,2,3'
 * @return array min_price,act_discount_id
 */
function laimi_wgoods_price($goods_id = 0, $price = 0, $cprice = 0){
	$arr = array();
	$act_price = 0;
	$act_discount_id = 0;
	$act_id = laimi_wact_discount();
	if(!empty($act_id) && $goods_id != 0){
		$strsql = "SELECT min(wact_discount_goods_price) as min_price,wgoods_id,wact_discount_id FROM ".$GLOBALS['gdb']->fun_table2('wact_discount_goods')." where wgoods_id=".$goods_id." && wact_discount_id in (".$act_id.")";
		$hresult = $GLOBALS['gdb']->fun_query($strsql);
		$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		if(!empty($arr)){
			$act_price = $arr['min_price'];
			$act_discount_id = $arr['wact_discount_id'];
		}
	}

	$arrprice = array();
	if($price != 0)
		$arrprice[] = $price;
	if($cprice != 0)
		$arrprice[] = $cprice;
	if($act_price != 0)
		$arrprice[] = $act_price;

	$arrgoods = array();
	$arrgoods['min_price'] = 0;
	$arrgoods['act_discount_id'] = 0;
	if(!empty($arrprice)){
		$arrgoods['min_price'] = min($arrprice);
		$arrgoods['act_discount_id'] = $arrgoods['min_price'] == $act_price ? $act_discount_id : 0;
	}
	return $arrgoods;
}

function laimi_cart_count(){
	$arr = array();
	$strsql = "SELECT sum(wcart_wgoods_count) as count FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id']);
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(empty($arr['count'])){
		$arr['count'] = 0;
	}
	return $arr;
}

function laimi_wact_discount(){
	$arr = array();
	$stract_id = '';
	$strsql = "SELECT wact_discount_id FROM ". $GLOBALS['gdb']->fun_table2('wact_discount')." WHERE wact_discount_state = 1 and wact_discount_start < ".time()." and wact_discount_end > ".time();
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as $v){
		$stract_id .= $v['wact_discount_id'].",";
	}
	if(!empty($stract_id)){
		$stract_id = substr($stract_id, 0, -1);
	}
	return $stract_id;
}

function laimi_wgoods_allprice(){
	$cart_money = 0;
	$arr = array();
	$strsql = "SELECT a.*,b.* FROM (SELECT wcart_id,wgoods_id,wcart_wgoods_count FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".api_value_int0($GLOBALS['_SESSION']['login_id'])." and wcart_wgoods_state = 1 order by wcart_id desc) AS a join (SELECT wgoods_id,wgoods_name,wgoods_price,wgoods_cprice FROM ".$GLOBALS['gdb']->fun_table2('wgoods')." WHERE wgoods_state = 1) AS b on a.wgoods_id = b.wgoods_id order by a.wcart_id desc";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	foreach($arr as &$row){
		$goodsinfo = laimi_wgoods_price($row['wgoods_id'], $row['wgoods_price'], $row['wgoods_cprice']);
		$row['min_price'] = $goodsinfo['min_price'];
		$cart_money += $row['wcart_wgoods_count'] * $row['min_price'];
	}
	return $cart_money;
}

function laimi_pay_return($postarr){
	$intreturn = 0;
	//公共回传参数
	$addressid = 0;
	$parent_id = 0;
	if(!empty($postarr['extra_common_param'])){
	    /*支付宝pc来源*/
	    //额外公共参数
	    // $extra = explode('|',$postarr['extra_common_param']);
	    // //买家收货地址
	    // $addressid = $extra[0];
	    // //支付渠道
	    // $pay_channel = $extra[count($extra)-1];
	}else if(!empty($postarr['attach'])){
	    /*微信渠道*/
		  $extra = json_decode($postarr['attach'], true);
	    //买家收货地址
	    $addressid = $extra['address'];
	    //支付渠道
	    $pay_channel = $extra['paytype'];
	    //取货方式
	    $worder_get = $extra['worder_get'];
	    $parent_id = $extra['parentid'];
	}else if(!empty($postarr['passback_params'])){
		/*支付宝wap来源*/
		// $extra = explode('|',urldecode($postarr['passback_params']));
		// //买家收货地址
		// $addressid = $extra[0];
		// //支付渠道
		// $pay_channel = $extra[count($extra)-1];
	}else{
		$addressid = $postarr['address'];
		//支付渠道
    $pay_channel = $postarr['paytype'];
    //取货方式
    $worder_get = $postarr['worder_get'];
    $parent_id = $postarr['parentid'];
	}

	if($pay_channel=='ALI_WEB'){
	    // //订单号
	    // $out_trade_no = $postarr['out_trade_no'];
	    // //支付宝交易号
	    // $trade_no = $postarr['trade_no'];
	    // //交易状态
	    // $trade_status = $postarr['trade_status'];
	    // //交易金额
	    // $total_fee = $postarr['total_fee'];
	    // //卖家支付宝id
	    // //$seller_id = $postarr['seller_id'];

	    // /*支付宝验证*/

	    // if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
	    //    $intreturn = 0;
	    // }else{
	    //    $intreturn = 1;
	    // }
	}else if($pay_channel=='WX_NATIVE'){
	    // $app_id = $postarr['appid'];

	    // $out_trade_no = $postarr['out_trade_no'];

	    // $total_fee = round($postarr['total_fee']/100, 2);
	}else if($pay_channel=='WX_JSAPI'){
		$app_id = $postarr['appid'];
		$out_trade_no = $postarr['out_trade_no'];
		$total_fee = round($postarr['total_fee'] / 100, 2);//元
		
	}else if($pay_channel=='ALI_WAP'){
		// //订单号
		// $out_trade_no = $postarr['out_trade_no'];
		// //支付宝交易号
		// $trade_no = $postarr['trade_no'];
		// //交易状态
		// $trade_status = $postarr['trade_status'];
		// //交易金额
		// $total_fee = $postarr['total_amount'];
		// //卖家支付宝id
		// $seller_id = $postarr['seller_id'];

		/*支付宝验证*/

		// if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
		//    $intreturn = 0;
		// }else{
		//    $intreturn = 1;
		// }
	}else if($pay_channel=='KAKOU'){
		$out_trade_no = $postarr['out_trade_no'];
		$total_fee = round($postarr['total_fee'] / 100, 2);//元
		
	}else{
		$intreturn = 2;
	}

	$jsonstr = json_encode($postarr);

	if($intreturn == 0){
    //验证客户id
    $strcard_id = substr($out_trade_no, 0, strpos($out_trade_no, 'T'));
    $intcard_id = api_value_int0($strcard_id);
    $arrcard = array();
    if($intreturn == 0) {
      $strsql = "SELECT card_id, card_name, card_phone, c_card_type_name, card_type_id,s_card_ymoney FROM " . $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id = ". $intcard_id . " LIMIT 1";
      $hresult = $GLOBALS['gdb']->fun_query($strsql);
      $arrcard = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
      if(empty($arrcard)) {
          $intreturn = 3;
          // return $strsql;
      }
    }
    //验证订单是否已经存在，空继续,存在不再写入数据
    $arr2 = array();
    if($intreturn == 0) {
      $strsql = "SELECT worder_id FROM " . $GLOBALS['gdb']->fun_table2('worder') . " WHERE worder_code = '"
      . $GLOBALS['gdb']->fun_escape($out_trade_no) . "' LIMIT 1";
      $hresult = $GLOBALS['gdb']->fun_query($strsql);
      $arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
      if(!empty($arr2)) {
        $intreturn = 4;
      }
    }
    //写一条订单记录
    /*if($intreturn == 0){
      $strsql = "INSERT INTO " . $GLOBALS['gdb']->fun_table2('order_error') . " (order_error_type, order_error_json) VALUES (" . $intreturn . ", '" . $GLOBALS['gdb']->fun_escape($jsonstr)
      . "')";
      $GLOBALS['gdb']->fun_do($strsql);
      $strid_error = $GLOBALS['gdb']->fun_insert_id();
    }else{
      $strid_error = 0;
    }*/
    //处理数据
		if($intreturn == 0) {
	    //查询购物车
	    $deccart_money = 0;
	    $decreward_money = 0;//提成奖金
	    $arrcart = array();
	    $strsql = "SELECT a.*,b.wgoods_name,b.wgoods_name2,b.wgoods_price,b.wgoods_cprice,b.wgoods_photo1,b.wgoods_photo2,b.wgoods_photo3,b.wgoods_photo4,b.wgoods_photo5,b.wgoods_reward FROM (SELECT wcart_id, card_id, wgoods_id, wcart_wgoods_count, wcart_wgoods_state FROM "
	    . $GLOBALS['gdb']->fun_table2('wcart') . " WHERE card_id = " . $intcard_id . " AND wcart_wgoods_state = 1) AS a LEFT JOIN "
	    . $GLOBALS['gdb']->fun_table2('wgoods') . " AS b ON a.wgoods_id = b.wgoods_id ORDER BY a.wcart_id";
	    $hresult = $GLOBALS['gdb']->fun_query($strsql);
	    $arrcart = $GLOBALS['gdb']->fun_fetch_all($hresult);
		  if(!empty($arrcart)){
		  	foreach($arrcart as &$row){
		  		$goodsinfo = laimi_wgoods_price($row['wgoods_id'], $row['wgoods_price'], $row['wgoods_cprice']);
		  		$row['min_price'] = $goodsinfo['min_price'];
		  		$row['act_discount_id'] = $goodsinfo['act_discount_id'];
		  		$row['reward'] = $row['wcart_wgoods_count'] * $row['wgoods_reward'];
		  		$row['photo'] = '';
		  		for($i = 1; $i <= 5; $i++){
		  			if($row['wgoods_photo'.$i] != ''){
		  				$row['photo'] = $row['wgoods_photo'.$i];
		  				break;
		  			}
		  		}
		  		$deccart_money += $row['wcart_wgoods_count'] * $row['min_price'];
		  		$decreward_money += $row['wcart_wgoods_count'] * $row['wgoods_reward'];
		  	}
		  	unset($row);
		  	
  	    //查询订单客户的地址信息
  	    $straddressname = '';
  	    $straddressphone = '';
  	    $straddresssheng = '';
  	    $straddressshi = '';
  	    $straddressdetail = '';
  	    $strsql = "SELECT waddress_name, waddress_phone, waddress_sheng, waddress_shi, waddress_detail FROM "
  	    . $GLOBALS['gdb']->fun_table2('waddress') . " WHERE waddress_id = " . api_value_int0($addressid) . " AND card_id = " . $intcard_id. " LIMIT 1";
  	    $hresult = $GLOBALS['gdb']->fun_query($strsql);
  	    $arraddress = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
  	    if(!empty($arraddress)){
  	        $straddressname = $arraddress['waddress_name'];
  	        $straddressphone = $arraddress['waddress_phone'];
  	        $straddresssheng = $arraddress['waddress_sheng'];
  	        $straddressshi = $arraddress['waddress_shi'];
  	        $straddressdetail = $arraddress['waddress_detail'];
  	    }

  	    //订单状态
  	    $intworder_state = 1;
  	    if(abs($deccart_money * 100 - $total_fee * 100) > 1) {
  	      $intworder_state = 11;
  	    }
	      $intpay = 0;
	      $intworder_from = 0;
				if($pay_channel == 'ALI_WEB') {
				    $intpay = 11;
				} else if($pay_channel == 'ALI_WAP') {
				    $intpay = 12;
				} else if($pay_channel == 'WX_JSAPI') {
				    $intpay = 21;
				    $intworder_from = 1;
				} else if($pay_channel == 'WX_NATIVE') {
				    $intpay = 22;
				} else if($pay_channel == 'KAKOU'){
					$intpay = 31;
					$intworder_from = 1;
				}
				$inttime = time();
				//卡扣方式付款
				if($intpay == 31){
					$card_ymoney = $arrcard['s_card_ymoney'] - $total_fee;
					if($card_ymoney < 0){
						$intreturn = 5;
						return $intreturn;
					}
					$strsql = "UPDATE ".$GLOBALS['gdb']->fun_table2('card')." SET s_card_ymoney=".$card_ymoney.",card_ctime=".$inttime.",card_ltime=".$inttime." where card_id=".$arrcard['card_id']." limit 1";
					$hresult = $GLOBALS['gdb']->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 4;
					}
				}

		  	//查询提成人的信息,记录提成
		  	$strparentname = '';
		  	$strparentphone = '';
		  	$strsql = "SELECT card_name,card_phone FROM "
		  	. $GLOBALS['gdb']->fun_table2('card') . " WHERE card_id=".$parent_id." LIMIT 1";
		  	$hresult = $GLOBALS['gdb']->fun_query($strsql);
		  	$arrparent = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
		  	if(!empty($arrparent)){
		  		$strparentname = $arrparent['card_name'];
		  		$strparentphone = $arrparent['card_phone'];
		  		$strsql = "UPDATE ". $GLOBALS['gdb']->fun_table2('card') ." SET s_card_reward = s_card_reward+".$decreward_money." WHERE card_id=".$parent_id." LIMIT 1";
		  		$hresult = $GLOBALS['gdb']->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 6;
					}
		  	}else{
		  		$decreward_money = 0;
		  	}
				//写入到订单表order
				$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('worder')." (card_id,worder_code,worder_money,worder_money2,worder_pay,worder_address_name,worder_address_phone,worder_address_detail,worder_get,worder_from,worder_state,worder_atime,c_card_type_id,c_card_type_name,c_card_name,c_card_phone,c_parent_card_name,c_parent_card_phone,s_worder_reward,card_parent_id) VALUES (".$arrcard['card_id'].",'".$out_trade_no."',".$deccart_money.",".$total_fee.",".$intpay.",'".$straddressname."','".$straddressphone."','".$straddressdetail."',".$worder_get.",".$intworder_from.",".$intworder_state.",".$inttime.",".$arrcard['card_type_id'].",'".$arrcard['c_card_type_name']."','".$arrcard['card_name']."','".$arrcard['card_phone']."','".$strparentname."','".$strparentphone."',".$decreward_money.",".$parent_id.")";
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 7;
				}

				$intworder_id = mysql_insert_id();
				// echo "<pre>";
				// var_dump($arrcart);
				// echo "</pre>";
				// exit;
				foreach($arrcart as $row2){
					$strsql = "INSERT INTO ".$GLOBALS['gdb']->fun_table2('worder_goods')." (card_id,worder_id,wgoods_id,worder_goods_count,worder_goods_price,worder_goods_state,worder_goods_atime,	c_wgoods_name,c_wgoods_photo1,c_wgoods_reward,card_parent_id) VALUES (".$arrcard['card_id'].",".$intworder_id.",".$row2['wgoods_id'].",".$row2['wcart_wgoods_count'].",".$row2['min_price'].",".$intworder_state.",".$inttime.",'".$row2['wgoods_name']."','".$row2['photo']."',".$row2['reward'].",".$parent_id.")";
					$hresult = $GLOBALS['gdb']->fun_do($strsql);
					if($hresult == FALSE) {
						$intreturn = 8;
					}
				}
				//删除购物车
				$strsql = "DELETE FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".$arrcard['card_id']." AND wcart_wgoods_state = 1";
				$hresult = $GLOBALS['gdb']->fun_do($strsql);
				if($hresult == FALSE) {
					$intreturn = 9;
				}
		  }
		}
	}
	return $intreturn;
}