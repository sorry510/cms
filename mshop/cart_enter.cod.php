<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-font14">确认订单</h1>
</header>
<nav class="mui-bar mui-bar-tab">
	<a href="javascript:;" class="mui-tab-item mui-active laimi-font14 laimi-color-gray">
		共<?php echo $GLOBALS['cart_count']; ?>件商品
	</a>
	<a href="javascript:;" class="mui-tab-item mui-active laimi-font14 laimi-color-gray" style="width:1.3%;">
		合计：<span class="mui-tab-label laimi-font16" style="color:#CF2D28;">¥<?php echo $GLOBALS['cart_money']; ?></span>
	</a>
	<a class="mui-tab-item laimi-pay" style="background-color:#CF2D28;width:1.4%;" href="javascript:;">
		<span class="laimi-color-white laimi-font16">去付钱</span>
	</a>
</nav>
<div id="laimi-content" class="mui-content">
	<div class="mui-card mui-table-view mui-table-view-cell" style="margin:0px;padding:10px 12px;margin-top:6px;">
		<svg class="laimi-icon5 mui-pull-left" aria-hidden="true" style="height:14px;color:#1F84D1;margin-top:28px;">
		    <use xlink:href="#icon-dingwei1"></use>
		</svg>
		<div class="mui-media-body mui-navigate-right laimi-address" style="white-space:normal;">
			<a href="javascript:;">
				<span class="laimi-font14" style="font-weight:bold;line-height:24px;"><?php if($address = $this->_data['address']) echo $address['waddress_name']."，".$address['waddress_phone']; ?></span>&nbsp;&nbsp;<?php if($address['waddress_state'] == 2){ ?><span class="laimi-font10" style="border:1px solid #FF5053;border-radius:3px;padding:1px 4px; color:#FF5053;">默认地址</span><?php } ?>
			</a>
			<div class="laimi-color-gray laimi-font12" style="margin-right:30px;">
			<?php if($address) echo $address['waddress_detail']; ?>
			</div>
		</div>
	</div>
	<div style="height:3px;background-image: url('./img/address.png');"></div>
	<?php foreach($this->_data['cart_list'] as $row){ ?>
	<div class="mui-card mui-table-view mui-table-view-cell" style="margin:0px;padding:10px 12px;margin-top:8px">
		<img class="mui-media-object mui-pull-left" src="<?php echo 'read_image.php?c='.$GLOBALS['_SESSION']['login_cid'].'&type=wgoods&image='.$row['photo'];?>"  style="max-width:75px;height:75px;border-radius:2px;">
		<div class="mui-media-body" style="white-space:normal;">
			<?php echo $row['wgoods_name']; ?>
			<p class='laimi-font10'><?php echo $row['wgoods_name2']; ?></p>
			<p>
				<div style="float:left;color:#CF2D28;font-size:12px;margin-top:3px;line-height:30px;">
					¥<span style="font-size:20px;"><?php echo $row['min_price']; ?></span>
				</div>
				<div style="float:right;margin-top:10px;">
					× <?php echo $row['wcart_wgoods_count']; ?>
				</div>
			</p>
		</div>
	</div>
	<?php } ?>
	<div class="mui-card" style="margin:0px;margin-top:6px;">
		<ul class="mui-table-view laimi-font12 laimi-color-gray">
	    <li class="mui-table-view-cell">
		    <a href="javascript:;" class="mui-navigate-right">
           <span class="mui-badge mui-badge-inverted">0.00（免运费）</span>
            	运费
        </a>
	    </li>
	    <li class="mui-table-view-cell">
		    <a href="javascript:;" class="mui-navigate-right">
		    	<span class="mui-badge mui-badge-inverted" style="margin-right:80px;">
		    		<input class="laimi-gettype" name="gettype" type="radio" value="3">
		    		用户自取
		    	</span>
		    	<span class="mui-badge mui-badge-inverted">
		    		<input class="laimi-gettype" name="gettype" type="radio" value="2" checked>
		    		商城发货
		    	</span>
          	请选择取货方式
        </a>
	    </li>
		</ul>
	</div>
	<div style="height:3px;background-image: url('./img/address.png');"></div>
	<div class="mui-card" style="margin:0px;margin-top:6px;">
		<ul class="mui-table-view laimi-font12 laimi-color-gray">
	    <li class="mui-table-view-cell">
		    <a href="javascript:;" class="mui-navigate-right">
		    <?php if($this->_data['card_info']){ ?>
          <span class="mui-badge mui-badge-inverted" style="margin-right:80px;">
          	<input class="laimi-paytype" name="paytype" type="radio" value="1" <?php if($this->_data["card_info"]["s_card_ymoney"] - $GLOBALS["cart_money"] < 0) echo "disabled"; ?> />
          	会员卡余额（¥<?php echo $this->_data['card_info']['s_card_ymoney']; ?>）&nbsp;&nbsp;&nbsp;&nbsp;
          </span>
        <?php } ?>
          <span class="mui-badge mui-badge-inverted">
          	<input class="laimi-paytype" name="paytype" type="radio" value="2" checked />
          	微信支付
          </span>
          	付款方式
        </a>
	    </li>
		</ul>
	</div>
</div>
<script src="./js/mui.min.js"></script>
<script src="js/iconfont.js"></script>
<script type="text/javascript" charset="utf-8">
  mui.init();
  var intuseragent = 0;
  mui.ready(function() {
  	var struseragent = window.navigator.userAgent.toLowerCase();
  	if(struseragent.match(/MicroMessenger/i) == 'micromessenger') {
  		intuseragent = 1; //is微信
  	} else {
  		intuseragent = 3;
  	}
  });
  mui('body').on('tap', 'a', function(){document.location.href=this.href;});//mui阻止href跳转，模拟一下
  mui('.laimi-address')[0].addEventListener('tap', function() {
  	window.location.href = './address.php';
  });
  mui('.laimi-pay')[0].addEventListener('tap', function() {
  	var paytype = getRadioRes('laimi-paytype');
  	var gettype = getRadioRes('laimi-gettype');
  	var address = <?php if($address) echo $address['waddress_id']; else echo 0; ?>;
  	if(address ==  0){
  		mui.alert("请选择一个地址！", "提示信息");
  		return false;
  	}
		mui.ajax("cart_enter_ajax.php", {
			data: {},
			dataType: "json",
			type: "post",
			timeout: 5000,
			success: function(jsondata) {
				if(jsondata.msg == "1") {
					mui.alert("账号异常！", "提示信息");
				} else if(jsondata.msg == "2") {
					mui.alert("没有此用户！", "提示信息");
				}  else if(jsondata.msg == "3") {
					window.location = "cart_regist.php";
				} else if(jsondata.msg == "200") {
					if(jsondata.money - <?php echo $GLOBALS["cart_money"]; ?> < 0.01){
						if(paytype == 2){
							if(intuseragent == 1){
								//微信支付
								window.location.href = "jsapi.php?gettype="+gettype+"&address="+address;
								// document.getElementById("wx_pay").submit();
							}
						}else if(paytype == 1){
							//卡扣支付
							window.location.href = "cart_center_do.php?gettype="+gettype+"&address="+address;
						}
					}else{
						mui.alert("商品价格已改变，请刷新页面！", "提示信息", "", function(){
							window.location.reload();
						});
					}
				} else {
					mui.alert("操作异常！", "提示信息");
				}
			},
			error: function(xhr,type,errorThrown) {
				mui.alert("网络不给力，请稍后重试！", "提示信息");
			}
		});
  });
  function getRadioRes(className){
    var rdsObj = document.getElementsByClassName(className);
    var checkVal = null;
    for(i = 0; i < rdsObj.length; i++){
        if(rdsObj[i].checked){checkVal = rdsObj[i].value;}
    }
    return checkVal;
  }
</script>
</body>
</html>