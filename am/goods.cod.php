<!DOCTYPE html>
<html>
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
	<style>
	#lami-img-max img{width:100%;}
	/*toast信息提示*/
	.mui-toast-container {bottom: 50% !important;}
	</style>
</head>
<body id="laimi-body">
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="javascript:;"></a>
		<h1 class="mui-title laimi-font14">商品详细</h1>
	</header>
	<nav class="mui-bar mui-bar-tab">
		<a class="mui-tab-item mui-active" href="#tabbar" style="width:2%;">
			<span class="mui-tab-label laimi-font16" style="color:#CF2D28;margin-left:5px;">¥<span class="laimi-price" style="font-weight:bold;font-size:22px;color:#CF2D28;"><?php echo $this->_data['wgoods_info']['myprice']['wgoods_iprice'];?></span></span>
		</a>
		<a id="telephone" class="mui-tab-item" href="#tabbar-with-chat" style="border-right:1px solid #EFEFF4;border-left:1px solid #EFEFF4;">
			<span class="mui-icon">
				<svg class="laimi-icon5" aria-hidden="true" style="height:15px;">
				    <use xlink:href="#icon-renzhengicondianhua"></use>
				</svg>
			</span>
			<span class="mui-tab-label laimi-font10">电话</span>
		</a>
		<a class="mui-tab-item" href="cart.php">
			<span class="mui-icon" id="container">
				<svg class="laimi-icon5" aria-hidden="true" style="height:15px;">
				   <use xlink:href="#icon-gouwuche-copy"></use>
				</svg>
				<?php if ($GLOBALS['gcart'] > 0) { ?>
					<span class="mui-badge laimi-cart"><?php echo $GLOBALS['gcart'];?></span>
				<?php };?>
			</span>
			<span class="mui-tab-label laimi-font10">购物车</span>
		</a>
		<a class="mui-tab-item laimi-add" href="javascript:;" style="background-color:#CF2D28;width:2.2%;">
			<span class="laimi-color-white laimi-font16">加入购物车</span>
		</a>
	</nav>
	<div id="laimi-content" class="mui-content">
		<div id="slider" class="mui-slider" style="margin-top:0px;">
			<div class="mui-slider-group mui-slider-loop">
<?php
$intcount = count($this->_data['wgoods_info']['myphoto']);
if($intcount > 0) {
?>
				
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="javascript:;"><img src="/upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/' . $this->_data['wgoods_info']['myphoto'][$intcount - 1]; ?>"></a>
				</div>
<?php } ?>
<?php for($i = 0; $i < $intcount; $i = $i + 1) { ?>
				<div class="mui-slider-item">
					<a href="javascript:;"><img src="/upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/' . $this->_data['wgoods_info']['myphoto'][$i]; ?>"></a>
				</div>
<?php } ?>
<?php
if($intcount > 0) {
?>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="javascript:;"><img src="/upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/' . $this->_data['wgoods_info']['myphoto'][0]; ?>"></a>
				</div>
<?php } ?>
			</div>
			<div class="mui-slider-indicator">
<?php for($i = 0; $i < $intcount; $i = $i + 1) { ?>
					<div class="mui-indicator<?php if($i == 0) echo ' mui-active'; ?>"></div>
<?php } ?>
			</div>
		</div>
		<div class="mui-card" style="margin:0px;padding:12px;">
			<a href="javascript:;">
				<div class="mui-media-body laimi-font16" style="white-space:normal; line-height:26px;">
					<?php echo $this->_data['wgoods_info']['wgoods_name'];?>
					<div class='laimi-font12 laimi-color-gray'><?php echo $this->_data['wgoods_info']['wgoods_name2'];?></div>
					<div style="color:#CF2D28;font-size:12px;margin-top:6px;">¥<span style="font-size:22px;font-weight:bold;"><?php echo $this->_data['wgoods_info']['myprice']['wgoods_iprice'];?></span>&nbsp;&nbsp;&nbsp;
					<?php if ($this->_data['wgoods_info']['myprice']['wgoods_iprice'] != $this->_data['wgoods_info']['wgoods_price']) { ?>
						<span class="laimi-font16 laimi-color-gray" style="text-decoration:line-through">¥<?php echo $this->_data['wgoods_info']['wgoods_price'];?></span>&nbsp;&nbsp;&nbsp;<span style="background-color:#CF2D28;color:#FFFFFF;font-size:10px;border-radius:2px; padding:2px 3px 0px 3px;"><?php if ($this->_data['wgoods_info']['myprice']['wgoods_iprice'] != $this->_data['wgoods_info']['wgoods_cprice']) {
							echo "限时打折";
						}else{
							echo "会员价";
						} ?></span>
					<?php } ?>
					</div>
				</div>
			</a>
		</div>
		<div class="mui-card" style="margin:0px;margin-top:6px;">
			<ul class="mui-table-view laimi-font12 laimi-color-gray">
				<li class="mui-table-view-cell laimi-code">
			        <a class="mui-navigate-right" href="javascript:;">数量：
			        	<div class="mui-numbox laimi-font12" data-numbox-min='1' data-numbox-max='1000' style="width:120px;height:26px;">
						<button class="mui-btn-numbox-minus" type="button">-</button>
						<input class="mui-input-numbox laimi-font14 laimi-count" type="number" />
						<button class="mui-btn-numbox-plus" type="button">+</button>
					</div>
			        </a>
			    </li>
			    <?php if ($this->_data['wgoods_info']['myprice']['wgoods_iprice'] != $this->_data['wgoods_info']['wgoods_price'] && $this->_data['wgoods_info']['myprice']['wgoods_iprice'] != $this->_data['wgoods_info']['wgoods_cprice']) { ?>
			    <li class="mui-table-view-cell">
			        <a class="mui-navigate-right" href="javascript:;">限时打折：<?php echo $this->_data['wgoods_info']['myprice']['wact_discount_name'];?></a>
			    </li>
			    <?php } ?>
			    <li class="mui-table-view-cell">
			        <span>
						<svg class="laimi-icon4" aria-hidden="true">
						    <use xlink:href="#icon-duigou1"></use>
						</svg>
						优选好货
					</span>
					<span style="margin-left:30px;">
						<svg class="laimi-icon4" aria-hidden="true">
						    <use xlink:href="#icon-duigou1"></use>
						</svg>
						30天退换
					</span>
			    </li>
			</ul>
		</div>
		<div class="mui-card" style="margin:0px;margin-top:6px;">
			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
			        <a class="mui-navigate-right" href="javascript:;">商品详情</a>
			    </li>
			    <li class="mui-table-view-cell" id="lami-img-max">
			      <?php echo $this->_data['wgoods_info']['wgoods_content'];?>
			    </li>
			</ul>
		</div>
		<!--div class="mui-card" style="margin:0px;margin-top:6px;">
			<ul class="mui-table-view">
			    <li class="mui-table-view-cell">
			        <a class="mui-navigate-right" class="laimi-color-gray" href="javascript:;">用户评价（12）</a>
			        <span class="mui-badge mui-badge-inverted" style="margin-right:10px;">好评度&nbsp;<span style="color:#FF0000;">100%</span></span>
			    </li>
			    <li class="mui-table-view-cell">
			        <div class="mui-row">
			        	<div style="float:left;width:35px;">
				            <img src="img/store.png" style="border-radius:20px; height:26px;">
				        </div>
				        <div style="float:left;width:100px;margin-top:3px;">
				            <span class="laimi-color-blue">游泳的鱼</span>
				        </div>
				        <div style="float:right;margin-top:3px;">
				            <span class="laimi-color-gray">2017-12-25 15:28</span>
				        </div>
			        </div>
			        <div class="laimi-color-gray laimi-font12">
			        	华为在北京国家会议中心正式发布HUAWEI nova 2s最新手机，高颜值的机身搭配前后2000万四镜头，完美诠释“更美的手机”。与此同时，它搭载的华为终端云服务，通过打造智慧化的应用体验让年轻人轻松享受智慧的新潮生活方式
			        </div>
			    </li>
			    <li class="mui-table-view-cell">
			        <div class="mui-row">
			        	<div style="float:left;width:35px;">
				            <img src="img/store.png" style="border-radius:20px; height:26px;">
				        </div>
				        <div style="float:left;width:100px;margin-top:3px;">
				            <span class="laimi-color-blue">游泳的鱼</span>
				        </div>
				        <div style="float:right;margin-top:3px;">
				            <span class="laimi-color-gray">2017-12-25 15:28</span>
				        </div>
			        </div>
			        <div class="laimi-color-gray laimi-font12">
			        	华为在北京国家会议中心正式发布HUAWEI nova 2s最新手机，高颜值的机身搭配前后2000万四镜头
			        </div>
			    </li>
			</ul>
		</div-->
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script>
	mui.init();
	mui('body').on('tap', 'a', function(){document.location.href=this.href;});
	  
	mui.ready(function() {
		mui("#slider").slider({
			interval: 3000
		});
	});
	  
	  
	  mui('.laimi-code').on('input','.laimi-count',function(){
	  	var price = <?php echo $this->_data['wgoods_info']['myprice']['wgoods_iprice']; ?>;
	  	var realprice = mui('.laimi-count')[0].value * price;
	  	mui('.laimi-price')[0].innerHTML = realprice.toFixed(2);
	  })
	  mui('.laimi-code').on('change','.laimi-count',function(){
	  	var price = <?php echo $this->_data['wgoods_info']['myprice']['wgoods_iprice'];?>;
	  	var realprice = mui('.laimi-count')[0].value * price;
	  	mui('.laimi-price')[0].innerHTML = realprice.toFixed(2);
	  })
	  mui('.laimi-add')[0].addEventListener('tap',function(){
	  	mui.ajax('goods_add_do.php',{
				data:{
					id:<?php echo $this->_data['wgoods_info']['wgoods_id'];?>,
					count:mui('.laimi-count')[0].value
				},
				dataType:'text',//服务器返回json格式数据
				type:'post',//HTTP请求类型
				timeout:5000,//超时时间设置为10秒；
				success:function(res){
					if (res == 0) {
						mui.toast('添加购物车成功');
						var count = <?php echo $GLOBALS['gcart']; ?>;
						if (count > 0) {
							mui('.laimi-cart')[0].innerHTML = parseInt(mui('.laimi-cart')[0].innerHTML) + parseInt(mui('.laimi-count')[0].value);
						}else if(count == 0){
							if (mui('.laimi-cart')[0] == undefined) {
								var span = document.createElement('span');
								span.innerHTML = parseInt(mui('.laimi-count')[0].value);
								var container = document.getElementById('container');
								container.insertBefore(span,container.childNodes[1]);
								span.setAttribute('class','mui-badge laimi-cart');
							}else{
								mui('.laimi-cart')[0].innerHTML = parseInt(mui('.laimi-cart')[0].innerHTML) + parseInt(mui('.laimi-count')[0].value);
							}
						}
					}else if(res == 3){
						mui.toast('商品已下架');
					}else{
						mui.toast('添加购物车失败');
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					mui.toast('操作异常，请稍后再试');
				}
			});
	  })
	  document.getElementById("telephone").addEventListener('tap',function(){
	    var btnArray=['拨打','取消'];
	    var phone="<?php echo $GLOBALS['gwshop']['wshop_phone']; ?>";
	    window.location.href = 'tel:'+phone;
	  });
	  
	wx.config({
		debug: false, // 开启调试模式,调用的所有api的返回值会在客户端toast出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
		appId: "<?php echo $this->_data['wx_share']['appid']; ?>", // 必填，公众号的唯一标识
		timestamp: <?php echo $this->_data['wx_share']['timestamp']; ?>, // 必填，生成签名的时间戳
		nonceStr: "<?php echo $this->_data['wx_share']['nonceStr']; ?>", // 必填，生成签名的随机串
		signature: "<?php echo $this->_data['wx_share']['signature']; ?>",// 必填，签名，见附录1
		jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
	});

	wx.ready(function() {
		wx.onMenuShareTimeline({
			title: "<?php echo $GLOBALS['gwshop']['share_title']; ?>", // 分享标题
			link: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/' . $GLOBALS['_SESSION']['login_code']
			. '/s_share.php?company=' . $GLOBALS['_SESSION']['login_cid'] . '&wgoods=' . $GLOBALS['intid'] . '&parent=' . $GLOBALS['_SESSION']['login_id'] . '&goto=goods'; ?>",
			imgUrl: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/upload/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/' . $this->_data['wgoods_info']['wgoods_photo1']; ?>", // 分享图标
			success: function () {
				// 用户确认分享后执行的回调函数
	    },
	    cancel: function () {
				// 用户取消分享后执行的回调函数
	    }
		});
		wx.onMenuShareAppMessage({
	    title: '<?php echo $GLOBALS['gwshop']['share_title']; ?>', // 分享标题
	    desc: '<?php echo $this->_data['wgoods_info']['wgoods_name']; ?>', // 分享描述
	    link: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/' . $GLOBALS['_SESSION']['login_code']
			. '/s_share.php?company=' . $GLOBALS['_SESSION']['login_cid'] . '&wgoods=' . $GLOBALS['intid'] . '&parent=' . $GLOBALS['_SESSION']['login_id'] . '&goto=goods'; ?>",
	    imgUrl: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/upload/' . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/' . $this->_data['wgoods_info']['wgoods_photo1']; ?>", // 分享图标
	    type: '', // 分享类型,music、video或link，不填默认为link
	    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	    success: function () {
				// 用户确认分享后执行的回调函数
	    },
	    cancel: function () {
				// 用户取消分享后执行的回调函数
	    }
		});
	});
	</script>
</body>
</html>