<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
    <script src="js/mui.min.js"></script>
    <script src="js/iconfont.js"></script>
    <script src="js/layer.js"></script>
</head>
<body id="laimi-body">
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<div id="laimi-content" class="mui-content">
	<div class="mui-card" style="position:relative;border-radius:6px; height:200px; background-color:#0162CB; margin-bottom:0px; background-image:url('../upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']);?>/card_background/laimi.png'); background-size:100% 100%; ">
		<div class="mui-card-header laimi-card-header2" style="color:#75A6F2;font-size:14px;">尊敬的<?php echo $this->_data['card_info']['card_name'].'('.$this->_data['card_info']['card_phone'].')'; ?></div>
		<div style="position:absolute;width:100%;margin-top:120px; margin-right:15px;padding-right:15px; font-family:'Segoe UI'; color:#FFFFFF; text-align:right; font-size:14px;"><?php echo 'NO.'.$this->_data['card_info']['card_code']; ?></div>
		<div style="position:absolute;margin-top:120px; margin-left:15px; font-family:'Segoe UI'; color:#FFFFFF; text-align:right; font-size:14px;"><?php echo $this->_data['card_info']['c_card_type_name'].'('.$this->_data['card_info']['discount'].'折)'; ?></div>
	</div>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right">
				会员专享
			</a>
		</li>
		<li class="mui-table-view-cell mui-disabled">
			<div class="mui-row">
				<div class="mui-col-sm-3" style="width:25%;text-align:center;">
	        <a href="index.php">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-shangchengdingdanguanli"></use>
						</svg><br><span style="font-size:12px;color:#555555;">微商城</span>
					</a>
        </div>
        <div class="mui-col-sm-3" style="width:25%;text-align:center;">
        	<a href="center_shop.php">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-yuyue-"></use>
						</svg><br><span style="font-size:12px;color:#555555;">微信预约</span>
					</a>
        </div>
        <div class="mui-col-sm-3" style="width:25%;text-align:center;">
        	<a href="center_shop_coupon.php?id=<?php echo $this->_data['card_info']['card_id']; ?>">
	        	<svg class="laimi-icon3" aria-hidden="true">
				    <use xlink:href="#icon-youhuiquan2"></use>
						</svg><br><span style="font-size:12px;color:#555555;">优惠券</span>
					</a>
        </div>
        <div class="mui-col-sm-3" style="width:25%;text-align:center;">
        	<a href="center_shop_record.php?id=<?php echo $this->_data['card_info']['card_id']; ?>">
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
			<a class="mui-navigate-right" href="javascript:;">
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
			<a class="mui-navigate-right" href="javascript:;">
				<svg class="laimi-icon" aria-hidden="true">
				    <use xlink:href="#icon-jinbi"></use>
				</svg>
				<span class="mui-badge mui-badge-inverted" style="font-size:14px;"><?php echo $this->_data['card_info']['s_card_yscore']; ?></span>		
				我的积分
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_myappointment.php" class="mui-navigate-right">
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
			<a href="center_shop_my.php" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-wode"></use>
				</svg>
				会员信息
			</a>
		</li>
	</ul>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a href="center_shop_order.php" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-goumai1"></use>
				</svg>
				商城订单
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_address.php" class="mui-navigate-right">
				<svg class="laimi-icon" aria-hidden="true">
				    <use xlink:href="#icon-guiji"></use>
				</svg>
				收货地址
			</a>
		</li>
	</ul>
	<ul class="mui-table-view laimi-table-view" style="margin-top:15px;">
		<li class="mui-table-view-cell">
			<a class="mui-navigate-right" href="javascript:;">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-footer-commission"></use>
				</svg>
				<span class="mui-badge mui-badge-danger mui-badge-inverted" style="font-size:14px;font-family:'Segoe UI';"><?php if ($this->_data['card_info']['s_card_reward'] !=0) {
					echo '¥'.$this->_data['card_info']['s_card_reward'];
				}else{
					echo '暂无佣金';
					} ;?>
				</span>
				我的佣金
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_agent_money.html" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-tixian1"></use>
				</svg>
				提现记录
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="center_shop_agent_order.php" class="mui-navigate-right">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="#icon-wendang"></use>
				</svg>
				客户订单
			</a>
		</li>
	</ul>
</div>
</body>
<script src="js/bind_phone.js"></script>
<script type="text/javascript">
	mui.init();
	mui('body').on('tap', 'a', function(){document.location.href=this.href;});//mui阻止href跳转，模拟一下
	mui.ready(function(){
		bind_phone(mui, layer, <?php echo api_value_int0($GLOBALS['_SESSION']['login_id']); ?>);
	})
</script>
</html>