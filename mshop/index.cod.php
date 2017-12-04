<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
     <script src="http://at.alicdn.com/t/font_485373_jtxfnkz96dlblnmi.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
</head>
<body id="laimi-body">
<div id="laimi-content" class="mui-content">
	<div class="mui-card" style="border-radius:6px; height:200px; background-color:#0162CB; margin-bottom:0px;">
		<div class="mui-card-header laimi-card-header2" style="color:#75A6F2;font-size:14px;"><?php echo $this->_data['card_info']['c_card_type_name']; ?></div>
		<div style="margin-top:120px; margin-right:15px; font-family:'Segoe UI'; color:#FFFFFF; text-align:right; font-size:14px;"><?php echo 'NO.'.$this->_data['card_info']['card_code']; ?></div>
	</div>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right">
				会员专享
			</a>
		</li>
		<li class="mui-table-view-cell mui-disabled">
			<div class="mui-row">
        <div class="mui-col-sm-4" style="width:33%;text-align:center;">
        	<a href="center_shop.php">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-yuyue-"></use>
						</svg><br><span style="font-size:12px;color:#555555;">微信预约</span>
					</a>
        </div>
        <!--div class="mui-col-sm-3" style="width:25%;text-align:center;">
        	<a href="cnter_shop_line.html">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-chaxun_paiduiqingkuang"></use>
						</svg><br><span style="font-size:12px;color:#555555;">排队叫号</span>
					</a>
        </div-->
        <div class="mui-col-sm-4" style="width:33%;text-align:center;">
        	<a href="center_shop_coupon.php">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-youhuiquan2"></use>
						</svg><br><span style="font-size:12px;color:#555555;">优惠券</span>
					</a>
        </div>
        <div class="mui-col-sm-4" style="width:33%;text-align:center;">
        	<a href="center_shop_record.php">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-yuyuejilu"></use>
						</svg><br><span style="font-size:12px;color:#555555;">消费记录</span>
					</a>
        </div>
		   </div>
		</li>
	</ul>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right">
				<svg class="laimi-icon" aria-hidden="true">
				    <use xlink:href="#icon-zijinlicai"></use>
				</svg>
				<span class="mui-badge mui-badge-danger mui-badge-inverted" style="font-size:14px;font-family:'Segoe UI';">¥<?php echo $this->_data['card_info']['s_card_ymoney']; ?></span>
				会员卡余额
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="center_shop_card.php?id=<?php echo $this->_data['card_info']['card_id']; ?>">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-goumai"></use>
				</svg>
				<span class="mui-badge mui-badge-danger"><?php echo $this->_data['card_info']['mcount']; ?></span>
				会员卡套餐
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_coupon.php?id=<?php echo $this->_data['card_info']['card_id']; ?>" class="mui-navigate-right">
				<svg class="laimi-icon" aria-hidden="true">
				    <use xlink:href="#icon-youhuiquan"></use>
				</svg>
				<span class="mui-badge mui-badge-danger"><?php echo $this->_data['card_info']['tcount']; ?></span>
				我的优惠券
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right">
				<svg class="laimi-icon" aria-hidden="true">
				    <use xlink:href="#icon-jinbi"></use>
				</svg>
				<span class="mui-badge mui-badge-inverted" style="font-size:14px;"><?php echo $this->_data['card_info']['s_card_yscore']; ?></span>		
				我的积分
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="cnter_shop_myappointment.html" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-Group"></use>
				</svg>
				我的预约
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_record.php?id=<?php echo $this->_data['card_info']['card_id']; ?>" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-shangchengdingdanguanli"></use>
				</svg>
				消费记录
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_my.php?id=<?php echo $this->_data['card_info']['card_id']; ?>" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-wode"></use>
				</svg>
				会员信息
			</a>
		</li>
	</ul>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a href="cnter_shop_order.html" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-goumai1"></use>
				</svg>
				商城订单
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_address.html" class="mui-navigate-right">
				<svg class="laimi-icon" aria-hidden="true">
				    <use xlink:href="#icon-guiji"></use>
				</svg>
				收货地址
			</a>
		</li>
	</ul>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-footer-commission"></use>
				</svg>
				<span class="mui-badge mui-badge-danger mui-badge-inverted" style="font-size:14px;font-family:'Segoe UI';">¥150.00</span>
				我的佣金
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="cnter_shop_agent_money.html" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-tixian1"></use>
				</svg>
				提现记录
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="cnter_shop_agent_order.html" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-wendang"></use>
				</svg>
				客户订单
			</a>
		</li>
	</ul>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>