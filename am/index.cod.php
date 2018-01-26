<!DOCTYPE html>
<html>
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body id="laimi-body">
	<header class="mui-bar mui-bar-nav">
		<div class="mui-input-row mui-search" style="margin:0 auto;width:96%;">
			<form method="get" action="list.php">
				<input type="text" name="key" placeholder="搜索商品，很多好货哦~" style="width:100%;background-color:#FFFFFF;color:#8F8F94;font-size:14px;height: 29px;margin: 6px 0;text-align: center;border-radius: 20px;">
			</form>
		</div>
	</header>
<?php echo $this->fun_fetch('inc_menu', ''); ?>
	<div id="laimi-content" class="mui-content">
		<div id="slider" class="mui-slider" style="margin-top:0px;">
			<div class="mui-slider-group mui-slider-loop">
<?php
$intcount = count($this->_data['ad_list']);
if($intcount > 0) {
?>
				
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="javascript:;"><img src="/upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['ad_image'] . '/' . $this->_data['ad_list'][$intcount - 1]; ?>?rand=<?php echo time();?>"></a>
				</div>
<?php } ?>
<?php for($i = 0; $i < $intcount; $i = $i + 1) { ?>
				<div class="mui-slider-item">
					<a href="javascript:;"><img src="/upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['ad_image'] . '/' . $this->_data['ad_list'][$i]; ?>?rand=<?php echo time();?>"></a>
				</div>
<?php } ?>
<?php
if($intcount > 0) {
?>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="javascript:;"><img src="/upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['ad_image'] . '/' . $this->_data['ad_list'][0]; ?>?rand=<?php echo time();?>"></a>
				</div>
<?php } ?>
			</div>
			<div class="mui-slider-indicator">
<?php for($i = 0; $i < $intcount; $i = $i + 1) { ?>
					<div class="mui-indicator<?php if($i == 0) echo ' mui-active'; ?>"></div>
<?php } ?>
			</div>
		</div>
		<div style="height:32px;line-height:32px;background-color:#FFFFFF;color:#6D6D72;">
			<span style="margin-left:30px;font-size:12px;">
				<svg class="laimi-icon4" aria-hidden="true">
					<use xlink:href="#icon-duigou1"></use>
				</svg>
				优选好货
			</span>
			<span style="margin-left:30px;font-size:12px;">
				<svg class="laimi-icon4" aria-hidden="true">
					<use xlink:href="#icon-duigou1"></use>
				</svg>
				30天退换
			</span>
			<span style="margin-left:30px;font-size:12px;">
				<svg class="laimi-icon4" aria-hidden="true">
					<use xlink:href="#icon-duigou1"></use>
				</svg>
				精选热门品牌
			</span>
		</div>
		<div style="margin-top:6px;height:32px;line-height:32px;background-color:#FFFFFF;color:#FFA500;">
			<marquee behavior="scroll">
				<span style="margin-left:15px;font-size:12px;" onclick="window.location.href='center_shop_notice.php'">
					<svg class="laimi-icon4" aria-hidden="true" style="color:#FFA500;">
						<use xlink:href="#icon-tongzhi"></use>
					</svg>
					<?php if(!empty($this->_data['notice_info'])) {echo $this->_data['notice_info']['wnotice_title'];} else {echo '当前没有活动';} ?>
				</span>
			</marquee>
		</div>
		<div class="mui-row" style="margin-top:6px;background-color:#FFFFFF;">
			<div class="mui-col-sm-3" style="width:25%;padding:10px;">
	      <a href="list.php">
	      	<div style="margin:0 auto; background-color:#009688;height:43px;width:43px;border-radius:30px;text-align:center;">
	      		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-fenlei1"></use>
						</svg>
	        </div>
	        <div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">全部商品</div>
				</a>
	    </div>
	    <div class="mui-col-sm-3" style="width:25%;padding:10px;">
	    	<a href="catalog.php">
		    	<div style="margin:0 auto; background-color:#5FB878;height:43px;width:43px;border-radius:30px;text-align:center;">
		    		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-zhuanti"></use>
						</svg>
		    	</div>
		    	<div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">商品分类</div>
				</a>
	    </div>
	    <div class="mui-col-sm-3" style="width:25%;padding:10px;">
	    	<a href="cart.php">
		    	<div style="margin:0 auto; background-color:#FFB800;height:43px;width:43px;border-radius:30px;text-align:center;">
		    		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-gouwuche"></use>
						</svg>
	    		</div>
	    		<div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">购物车</div>
				</a>
	    </div>
	    <div class="mui-col-sm-3" style="width:25%;padding:10px;">
	    	<a href="center.php">
		    	<div style="margin:0 auto; background-color:#01AAED;height:43px;width:43px;border-radius:30px;text-align:center;">
		    		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-huiyuanzhongxinxian"></use>
						</svg>
		    	</div>
		    	<div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">会员中心</div>
				</a>
	    </div>
	  </div>
	  <ul class="mui-table-view" style="margin-top:6px;">
			<li class="mui-table-view-cell">
				<a class="mui-navigate-right" style="font-size:14px;" href="list.php">
					<span class="mui-badge mui-badge-inverted">更多商品</span>
					<svg class="laimi-icon2" aria-hidden="true">
					    <use xlink:href="#icon-huiyuanzhongxin1"></use>
					</svg>
					热门推荐商品
				</a>
			</li>
		</ul>
	  <ul class="mui-table-view mui-grid-view laimi-showlist">
<?php foreach($this->_data['wgoods_list'] as $row) { ?>
	  	<li class="mui-table-view-cell mui-media mui-col-xs-6">
		  	<a href="goods.php?id=<?php echo $row['wgoods_id']; ?>">
	        <img class="mui-media-object" style="width:100%; height:auto;" src="/upload/<?php echo api_value_int0($GLOBALS["_SESSION"]["login_cid"]) . $GLOBALS['gconfig']['path']['wgoods_image'] . '/' . $row['wgoods_photo1']; ?>">
	        <div class="mui-media-body laimi-font12" style="text-align:left;"><?php echo $row['wgoods_name']; ?></div>
	        <div style="width:100%;line-height:40px;">
	        	<div style="float:left; text-align:left;color:#CF2D28;">
	        		¥<?php echo $row['myprice']['wgoods_iprice'] + 0; ?>&nbsp;&nbsp;&nbsp;
							<?php if($row['myprice']['wgoods_iprice'] != $row['wgoods_price']) { ?>
	        		<span class="laimi-color-gray" style="text-decoration:line-through">¥<?php echo $row['wgoods_price'];?></span>
	        		<?php } ?>
	        	</div>
	        	<div style="float:right; text-align:right;margin-top:6px;">
	        		<button type="button" class="mui-btn mui-btn-danger laimi-font12" style="padding:2px 6px 2px 6px;">购买</button>
	        	</div>
	        </div>
	      </a>
      </li>
<?php } ?>
		</ul>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script>
	mui.ready(function() {
		mui("#slider").slider({
			interval: 3000
		});
		document.getElementById("laimi-menu-index").addEventListener("tap", function() {
			window.location = "index.php";
		});
		document.getElementById("laimi-menu-list").addEventListener("tap", function() {
			window.location = "list.php";
		});
		document.getElementById("laimi-menu-cart").addEventListener("tap", function() {
			window.location = "cart.php";
		});
		document.getElementById("laimi-menu-center").addEventListener("tap", function() {
			window.location = "center.php";
		});
	});
	
	wx.config({
		debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
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
			. '/s_share.php?company=' . $GLOBALS['_SESSION']['login_cid'] . '&wgoods=&parent=' . $GLOBALS['_SESSION']['login_sid'] . '&goto=index'; ?>",
			imgUrl: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/upload/'
			. api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['share_image'] . '/' . $GLOBALS['gwshop']['share_image']; ?>", // 分享图标
			success: function () {
				// 用户确认分享后执行的回调函数
	    },
	    cancel: function () {
				// 用户取消分享后执行的回调函数
	    }
		});
		wx.onMenuShareAppMessage({
	    title: '<?php echo $GLOBALS['gwshop']['share_title']; ?>', // 分享标题
	    desc: '', // 分享描述
	    link: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/' . $GLOBALS['_SESSION']['login_code']
			. '/s_share.php?company=' . $GLOBALS['_SESSION']['login_cid'] . '&wgoods=&parent=' . $GLOBALS['_SESSION']['login_sid'] . '&goto=index'; ?>",
	    imgUrl: "<?php echo $GLOBALS['gconfig']['url']['weixin'] . '/upload/'
	    . api_value_int0($GLOBALS['_SESSION']['login_cid']) . $GLOBALS['gconfig']['path']['share_image'] . '/' . $GLOBALS['gwshop']['share_image']; ?>", // 分享图标
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