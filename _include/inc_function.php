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
	$strsql = "SELECT shop_id, shop_name, shop_phone, shop_area_address FROM " . $GLOBALS['gdb']->fun_table('shop')
	. " WHERE shop_etime > " . time() . " and company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) ." ORDER BY shop_id DESC";
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
// get店铺配置信息
function laimi_config_shop_trade(){
	$arr = array();
	$arrtrade = array();
	$arrjson = array(
				'print_flag' => 2,
				'print_title' => '',
				'print_width' => 0,
				'print_memo' => '',
				'print_device' => '',
			);
	$strsql = "SELECT shop_config FROM " . $GLOBALS['gdb']->fun_table('shop')." where shop_id=".api_value_int0($GLOBALS['_SESSION']['login_sid'])." and company_id=" . api_value_int0($GLOBALS['_SESSION']['login_cid']);
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	if(!empty($arr)){
		if($arr['shop_config'] != ''){
			$arrtrade = json_decode($arr['shop_config'], true);
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

function laimi_config_wpay(){
	$arr = array();
	$arrwpay = array();
	$arrwpay_init = array(
					'pay_flag' => 2,
					'alipay_appid' => '',
					'alipay_key' => '',
					'alipay_rsa2' => '',
					'weixin_appid' => '',
					'weixin_mchid' => '',
					'weixin_key' => '',
					'weixin_appsecret' => '',
				);
	$strsql = "SELECT company_config_wpay FROM ". $GLOBALS['gdb']->fun_table('company')." WHERE company_id = " . api_value_int0($GLOBALS['_SESSION']['login_cid']) . " LIMIT 1";
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
				$cprice = $arrmgoods['mgoods_cprice'];
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
	$strsql = "SELECT sum(wcart_wgoods_count) as count FROM ".$GLOBALS['gdb']->fun_table2('wcart')." WHERE card_id = ".$GLOBALS['gdb']->fun_escape($GLOBALS['_SESSION']['login_id']);
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
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
	if(!empty($postarr['extra_common_param'])){
	    /*支付宝pc来源*/
	    //额外公共参数
	    $extra = explode('|',$postarr['extra_common_param']);
	    //买家收货地址
	    $addressid = $extra[0];
	    //支付渠道
	    $pay_channel = $extra[count($extra)-1];
	}else if(!empty($postarr['attach'])){
	    // /*微信渠道*/
	    $extra = explode('|',$postarr['attach']);
	    //买家收货地址
	    $addressid = $extra[0];
	    //支付渠道
	    $pay_channel = $extra[count($extra)-1];
	}else if(!empty($postarr['passback_params'])){
		/*支付宝wap来源*/
		$extra = explode('|',urldecode($postarr['passback_params']));
		//买家收货地址
		$addressid = $extra[0];
		//支付渠道
		$pay_channel = $extra[count($extra)-1];
	}

	if($pay_channel=='ALI_WEB'){
	    //订单号
	    $out_trade_no = $postarr['out_trade_no'];
	    //支付宝交易号
	    $trade_no = $postarr['trade_no'];
	    //交易状态
	    $trade_status = $postarr['trade_status'];
	    //交易金额
	    $total_fee = $postarr['total_fee'];
	    //卖家支付宝id
	    //$seller_id = $postarr['seller_id'];

	    /*支付宝验证*/ 
	 
	    if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
	       $intreturn = 0;
	    }else{
	       $intreturn = 1; 
	    }
	   
	}else if($pay_channel=='WX_NATIVE'){
	    $app_id = $postarr['appid'];

	    $out_trade_no = $postarr['out_trade_no'];

	    $total_fee = round($postarr['total_fee']/100, 2);
	   
	}else if($pay_channel=='WX_JSAPI'){
		$app_id = $postarr['appid'];

		$out_trade_no = $postarr['out_trade_no'];

		$total_fee = round($postarr['total_fee']/100, 2);
	}else if($pay_channel=='ALI_WAP'){
		//订单号
		$out_trade_no = $postarr['out_trade_no'];
		//支付宝交易号
		$trade_no = $postarr['trade_no'];
		//交易状态
		$trade_status = $postarr['trade_status'];
		//交易金额
		$total_fee = $postarr['total_amount'];
		//卖家支付宝id
		$seller_id = $postarr['seller_id'];

		/*支付宝验证*/ 
		
		if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
		   $intreturn = 0;
		}else{
		   $intreturn = 1; 
		}
	}

	$jsonstr = json_encode($postarr);
	// var_dump($postarr);
	// exit;

	if($intreturn == 0){
	        //验证客户id
	        $strclientid = substr($out_trade_no, 5, strpos($out_trade_no, 'T') - 5);
	        $arr = array();
	        if($intreturn == 0) {
	            $strsql = "SELECT client_id, client_name, client_phone, client_qq, client_weixin FROM " . $GLOBALS['gdb']->fun_table('client') . " WHERE client_id = "
	            . api_value_int0($strclientid) . " LIMIT 1";
	            $hresult = $GLOBALS['gdb']->fun_query($strsql);
	            $arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	            // var_dump($arr);
	            // exit;
	            if(empty($arr)) {
	                $intreturn = 1;
	            }
	        }
	            //验证订单是否已经存在，空继续,存在不在写入数据
	        $inttime = time();
	        $arr2 = array();
	        if($intreturn == 0) {
	            $strsql = "SELECT order_id FROM " . $GLOBALS['gdb']->fun_table('order') . " WHERE order_time > " . ($inttime - 86400) . " AND order_code = '"
	            . $GLOBALS['gdb']->fun_escape($out_trade_no) . "' LIMIT 1";
	            $hresult = $GLOBALS['gdb']->fun_query($strsql);
	            $arr2 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	            if(!empty($arr2)) {
	                $intreturn = 2;
	            }
	        }
	            //写一条订单异常记录
	        if($intreturn == 0){
	            $strsql = "INSERT INTO " . $GLOBALS['gdb']->fun_table('order_error') . " (order_error_type, order_error_json) VALUES (" . $intreturn . ", '" . $GLOBALS['gdb']->fun_escape($jsonstr)
	            . "')";
	            $GLOBALS['gdb']->fun_do($strsql);
	            $strid_error = $GLOBALS['gdb']->fun_insert_id();
	        }else{
	            $strid_error = 0;
	        }
	            

	            
	            //处理数据
	        $arr3 = array();
	        if($intreturn == 0) {
	            $intdate = strtotime(date('Y-n-j'));//当日的购物车清单
	            //查询购物车当天购物车
	            $strsql = "SELECT a.*, b.goods_type, b.goods_name, b.goods_price, b.goods_discount_price, b.goods_discount_from, b.goods_discount_to, b.goods_discount_price2, "
	            . "b.goods_discount_from2, b.goods_discount_to2 FROM (SELECT cart_id, goods_id, cart_goods_count, cart_goods_from, cart_goods_to FROM "
	            . $GLOBALS['gdb']->fun_table('cart') . " WHERE client_id = " . $arr['client_id'] . " AND cart_date = " . $intdate . ") AS a LEFT JOIN "
	            . $GLOBALS['gdb']->fun_table('goods') . " AS b ON a.goods_id = b.goods_id ORDER BY a.cart_id";
	            
	            $hresult = $GLOBALS['gdb']->fun_query($strsql);
	            $arr2 = $GLOBALS['gdb']->fun_fetch_all($hresult);
	           
	            if(!empty($arr2)) {
	                $decsum = 0;
	                foreach($arr2 as $intkey => $row) {
	                    $arr2[$intkey]['myprice'] = 0;
	                    //discount 打折

	                    if($row['goods_discount_price'] == 0 && $row['goods_discount_price2'] == 0) {
	                        $arr2[$intkey]['myprice'] = $row['goods_price'];//打折为零则为原价
	                    } else {
	                        if($row['goods_discount_price'] > 0 && $intdate >= $row['goods_discount_from'] && $intdate <= $row['goods_discount_to']) {
	                            $arr2[$intkey]['myprice'] = $row['goods_discount_price'];//打折在期限内则为打折价格
	                        } else if($row['goods_discount_price2'] > 0 && $intdate >= $row['goods_discount_from2'] && $intdate <= $row['goods_discount_to2']) {
	                            $arr2[$intkey]['myprice'] = $row['goods_discount_price2'];
	                        } else {
	                            $arr2[$intkey]['myprice'] = $row['goods_price'];
	                        }
	                    }
	                    $arr2[$intkey]['myall'] = 1;
	                    if($row['goods_type'] == 1) {
	                        //如果商品是每日送订，计算天数
	                        $arr2[$intkey]['myall'] = api_value_int0(($row['cart_goods_to'] - $row['cart_goods_from']) / 86400 + 1);
	                    }
	                    $decsum = $decsum + $arr2[$intkey]['myprice'] * $row['cart_goods_count'] * $arr2[$intkey]['myall'];
	                }

	                //总价
	                $decsum = api_value_decimal($decsum, 2);
	                
	                //查询订单客户的地址信息
	                $straddressname = '';
	                $straddressphone = '';
	                $straddressshi = '';
	                $straddressqu = '';
	                $straddressdetail = '';
	                $strsql = "SELECT client_address_id, client_address_name, client_address_phone, client_address_shi, client_address_qu, client_address_detail FROM "
	                . $GLOBALS['gdb']->fun_table('client_address') . " WHERE client_address_id = " . api_value_int0($addressid) . " AND client_id = " . $arr['client_id']
	                . " LIMIT 1";
	                $hresult = $GLOBALS['gdb']->fun_query($strsql);
	                $arr3 = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	                if(!empty($arr3)) {
	                    $straddressname = $arr3['client_address_name'];
	                    $straddressphone = $arr3['client_address_phone'];
	                    if(!empty($GLOBALS['gaddress']['shi'][$arr3['client_address_shi']])) {
	                        $straddressshi = $GLOBALS['gaddress']['shi'][$arr3['client_address_shi']]['name'];
	                    }
	                    if(!empty($GLOBALS['gaddress']['shi'][$arr3['client_address_shi']]['qu'][$arr3['client_address_qu']])) {
	                        $straddressqu = $GLOBALS['gaddress']['shi'][$arr3['client_address_shi']]['qu'][$arr3['client_address_qu']]['name'];
	                    }
	                    $straddressdetail = $arr3['client_address_detail'];
	                }

	                //判断价格是否有误
	                $inteflag = 0;
	                if(abs($decsum * 100 - $total_fee*100) < 1) {
	                    $inteflag = 1;
	                } else {
	                    $inteflag = 2;
	                }
	                
	                //支付来源渠道'ALI_WEB'
	                $intpay = 0;
	                $intflag = 0;
	                if($pay_channel == 'ALI_WEB') {
	                    $intpay = 11;
	                    $intflag = 1;
	                } else if($pay_channel == 'ALI_WAP') {
	                    $intpay = 12;
	                    $intflag = 3;
	                } else if($pay_channel == 'WX_JSAPI') {
	                    $intpay = 21;
	                    $intflag = 2;
	                } else if($pay_channel == 'WX_NATIVE') {
	                    $intpay = 22;
	                    $intflag = 1;
	                }
	               
	                

	                /***********写入到订单表order***************/
	                
	                     $strsql = "INSERT INTO " . $GLOBALS['gdb']->fun_table('order') . " (client_id, order_code, order_money, order_money2, order_pay, order_address_name, "
	                     . "order_address_phone, order_address_shi, order_address_qu, order_address_detail, order_flag, order_state, order_time, r_client_name, r_client_phone, "
	                     . "r_client_qq, r_client_weixin, o_order_dflag, o_order_eflag) VALUES (" . $arr['client_id'] . ", '" . $GLOBALS['gdb']->fun_escape($out_trade_no)
	                     . "', " . $decsum . ", " . api_value_decimal($total_fee, 2) . ", " . $intpay . ", '" . $GLOBALS['gdb']->fun_escape($straddressname) . "', '"
	                     . $GLOBALS['gdb']->fun_escape($straddressphone) . "', '" . $GLOBALS['gdb']->fun_escape($straddressshi) . "', '" . $GLOBALS['gdb']->fun_escape($straddressqu) . "', '"
	                     . $GLOBALS['gdb']->fun_escape($straddressdetail) . "', " . $intflag . ", 1, " . $inttime . ", '" . $GLOBALS['gdb']->fun_escape($arr['client_name']) . "', '"
	                     . $GLOBALS['gdb']->fun_escape($arr['client_phone']) . "', '" . $GLOBALS['gdb']->fun_escape($arr['client_qq']) . "', '" . $GLOBALS['gdb']->fun_escape($arr['client_weixin']) . "', 1, "
	                     . $inteflag . ")";
	                     /**************************************************************************************************************更新订单异常记录*************************************************************/
	                     if($strid_error!=0){
	                        $strsql_error = "UPDATE " . $GLOBALS['gdb']->fun_table('order_error') . " SET order_error_sql = '" . $GLOBALS['gdb']->fun_escape($strsql) . "' WHERE order_error_id = " . $strid_error . " LIMIT 1";
	                         $GLOBALS['gdb']->fun_do($strsql_error);
	                     }
	                     /**************************/
	                     $GLOBALS['gdb']->fun_do($strsql);
	                     $strid = $GLOBALS['gdb']->fun_insert_id();
	                     

	                     /*******写入order_goods表***********/

	                     $strtype = '';
	                     $strfrom = '';
	                     $strto = '';
	                     // arr2购物车信息+对应商品信息
	                    foreach($arr2 as $intkey => $row) {
	                         $strsql = "INSERT INTO " . $GLOBALS['gdb']->fun_table('order_goods') . " (client_id, order_id, goods_id, order_goods_type, order_goods_count, order_goods_price, "
	                         . "order_goods_from, order_goods_to, order_goods_time, r_goods_name) VALUES (" . $arr['client_id']  . ", " . $strid . ", " . $row['goods_id'] . ", "
	                         . $row['goods_type'] . ", " . $row['cart_goods_count'] . ", " . $row['myprice'] . ", " . $row['cart_goods_from'] . ", " . $row['cart_goods_to'] . ", "
	                         . $inttime . ", '" . $GLOBALS['gdb']->fun_escape($row['goods_name']) . "')";
	                        $GLOBALS['gdb']->fun_do($strsql);
	                        if($row['goods_type'] == 1 && $strfrom == '' && $strto == '') {
	                             $strfrom = date('Y-n-j', $row['cart_goods_from']);
	                             $strto = date('Y-n-j', $row['cart_goods_to']);
	                         }
	                        if($strtype == '') {
	                             $strtype = $row['goods_type'];
	                        } else if($strtype == 1) {
	                             if($row['goods_type'] == 2) {
	                                $strtype = 11;
	                            }
	                        } else if($strtype == 2) {
	                            if($row['goods_type'] == 1) {
	                                $strtype = 11;
	                            }
	                        }
	                   
	                    }
	                     //更新订单商品类型
	                     $strsql = "UPDATE " . $GLOBALS['gdb']->fun_table('order') . " SET order_type = " . $strtype . " WHERE order_id = " . $strid . " LIMIT 1";
	                     $GLOBALS['gdb']->fun_do($strsql);
	                     //删除购物车
	                     $strsql = "DELETE FROM " . $GLOBALS['gdb']->fun_table('cart') . " WHERE client_id = " . api_value_int0($strclientid);
	                     $GLOBALS['gdb']->fun_do($strsql);
	                     
	                     $strmessage = '';
	                     if($strtype == 1) {
	                         $strmessage = '您的订单已受理，配送日期' . $strfrom . '至' . $strto . '，近日会有送奶员和您联系，总部热线：63188866。【阿新自由订】';
	                     } else if($strtype == 2) {
	                         $strmessage = '您的订单已受理，48小时内给您配送，总部热线：63188866。【阿新自由订】';
	                     } else if($strtype == 11) {
	                         $strmessage = '您的订单已受理，近日会有送奶员和您联系，总部热线：63188866。【阿新自由订】';
	                     }
	                     /*发送短信提醒*/
	                     $hresult = curl_init();
	                     curl_setopt($hresult, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");
	                     curl_setopt($hresult, CURLOPT_CONNECTTIMEOUT, 30);
	                     curl_setopt($hresult, CURLOPT_RETURNTRANSFER, TRUE); 
	                     curl_setopt($hresult, CURLOPT_HEADER, FALSE);
	                     curl_setopt($hresult, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
	                     curl_setopt($hresult, CURLOPT_USERPWD  , 'api:key-4e855fc4dc0a3ecec9251a4717990b3e');
	                     curl_setopt($hresult, CURLOPT_POST, TRUE);
	                     curl_setopt($hresult, CURLOPT_POSTFIELDS, array('mobile' => $arr['client_phone'], 'message' => $strmessage));
	                     $hresource = curl_exec($hresult);
	                     curl_close($hresult);
	                     if($arr['client_phone'] != $straddressphone) {
	                         $hresult = curl_init();
	                         curl_setopt($hresult, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");
	                         curl_setopt($hresult, CURLOPT_CONNECTTIMEOUT, 30);
	                         curl_setopt($hresult, CURLOPT_RETURNTRANSFER, TRUE); 
	                         curl_setopt($hresult, CURLOPT_HEADER, FALSE);
	                         curl_setopt($hresult, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
	                         curl_setopt($hresult, CURLOPT_USERPWD  , 'api:key-4e855fc4dc0a3ecec9251a4717990b3e');
	                         curl_setopt($hresult, CURLOPT_POST, TRUE);
	                         curl_setopt($hresult, CURLOPT_POSTFIELDS, array('mobile' => $straddressphone, 'message' => $strmessage));
	                         $hresource = curl_exec($hresult);
	                         curl_close($hresult);
	                     }
	               
	           
	            }else{
	                $intreturn = 1;
	            }
	        }    
	}
}