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
				<div class="mui-col-sm-3" style="width:25%;text-align:center;">
	        <a href="shop.php">
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
			<a class="mui-navigate-right">
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
			<a href="center_shop_agent_money.php" class="mui-navigate-right">
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
<script type="text/javascript">
	mui.init();
	mui('body').on('tap', 'a', function(){document.location.href=this.href;});//mui阻止href跳转，模拟一下
	var phoneis = '<?php echo $this->_data['card_info']['card_phone']; ?>';
	mui.ready(function(){
		if(phoneis == ''){
			show();
		}
	})
	mui('body').on('tap', '.laimi-valid', function(){
	  var _this = this;
	  var maxtime = 60;
	  var phone = mui('.laimi-tel')[0].value;
	  if(!isPhone(phone)){
	    alert('请填写正确的手机号码');
	    return false;
	  }
	  // 获取验证码
	  _this.disabled = true;
	  _this.innerHTML = maxtime+'秒后重试';
	  var time = setInterval(function() {
	    maxtime--;
	    _this.innerHTML = maxtime+'秒后重试';
	    if(maxtime <= 0){
	      clearInterval(time);
	      _this.innerHTML = '获取验证码';
	      _this.disabled = false;
	    }
	  }, 1000);
	  
	  mui.post('phone_sms_ajax.php', {phone: phone}, function(res){
	    if(res == 0){
	      alert('短信已发出请及时接收');
	    }else if(res=='2'){
	      alert('短信余额已不足');
	    }else{
	      alert('异常错误');
	    }
	  });
	});
	mui('body').on('tap', '.laimi-btn-phone', function(){
	  var phone = mui('.laimi-tel')[0].value || '';
	  var verify = mui('.laimi-verify')[0].value || '';
	  if(phone == '' || verify == ''){
	    return false;
	  }
	  mui.ajax({
	    url: './phone_bind_ajax.php',
	    data: {
	      phone: phone,
	      verify: verify
	    },
	    dataType:"text",
	    type:"post",
	    timeout:5000,
	    success: function(res){
	      if(res == 0){
	        alert('绑定成功');
	        window.location.reload();
	      }else if(res == 1){
	        alert('验证码错误');
	      }else if(res == 2){
	        alert('验证码超时');
	      }else if(res == 3){
	        alert('没有此用户');
	      }else if(res == 4){
	        alert('您已经绑定过了');
	      }else{
	        alert('绑定失败');
	      }
	    },
	    error: function(xhr, type, errorThrown){
	      mui.alert("网络不给力，请稍后重试！", "提示信息");
	    }
	  })
	})
	function show() { //信息框
	  layer.open({
	    title: ['绑定手机号','background-color:#0162CB; color:#ffffff; height:36px; margin-top:0px;line-height:36px;'],
	    Boolean: 'true',
      content: '<div style=text-align:left;><input class="laimi-tel" type="text" placeholder="手机号码" style="font-size:14px; width:160px;height:28px;padding:3px;padding-left:10px;"/></div><div style=text-align:left;><input type="text" class="laimi-verify" placeholder="验证码" style="font-size:14px; width:80px;height:28px;padding:3px;padding-left:10px;"/>&nbsp;&nbsp;<button type="button" class="mui-btn mui-btn-warning laimi-valid" style="padding:7px 8px;font-size:14px;">获取验证码</button></div><div style=text-align:left;margin-right:16px;><button type="button" class="mui-btn mui-btn-primary mui-btn-block laimi-btn-phone" style="font-size:14px;padding:8px;width:100%;">绑定手机号</button></div>',
      style: 'width:80%; height:auto;',
      end: function () {
        // window.history.go(-1);
        window.location.reload();
      }
	  });
	}
	function isPhone(phone) {
	  var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
	  if (!myreg.test(phone)) {
	      return false;
	  } else {
	      return true;
	  }
	}
</script>
</html>