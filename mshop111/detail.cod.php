<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/iconfont.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-font14">商品详细</h1>
	<a class="mui-pull-right laimi-font14">
		<svg class="laimi-icon5" aria-hidden="true" style="margin-top:12px;color:#AAAAAA;">
		    <use xlink:href="#icon-fenxiang"></use>
		</svg>
	</a>
</header>
<nav class="mui-bar mui-bar-tab">
	<a class="mui-tab-item mui-active" href="#tabbar" style="width:2%;">
		<span class="mui-tab-label laimi-font16" style="color:#CF2D28;margin-left:5px;">¥<span class="laimi-price" style="font-weight:bold;font-size:22px;color:#CF2D28;"><?php echo $this->_data['detail']['min_price'];?></span></span>
	</a>
	<a class="mui-tab-item" href="#tabbar-with-chat" style="border-right:1px solid #EFEFF4;border-left:1px solid #EFEFF4;">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:15px;">
			    <use xlink:href="#icon-renzhengicondianhua"></use>
			</svg>
		</span>
		<span class="mui-tab-label laimi-font10">400-6238860</span>
	</a>
	<a class="mui-tab-item" href="cart.php">
		<span class="mui-icon" id="container">
			<svg class="laimi-icon5" aria-hidden="true" style="height:15px;">
			   <use xlink:href="#icon-gouwuche-copy"></use>
			</svg>
			<?php if ($this->_data['cart']['cart_count'] > 0) { ?>
				<span class="mui-badge laimi-cart"><?php echo $this->_data['cart']['cart_count'];?></span>
			<?php };?>
		</span>
		<span class="mui-tab-label laimi-font10">购物车</span>
	</a>
	<a class="mui-tab-item laimi-add" style="background-color:#CF2D28;width:2.2%;">
		<span class="laimi-color-white laimi-font16">加入购物车</span>
	</a>
</nav>
<div id="laimi-content" class="mui-content">
	<div id="slider" class="mui-slider" >
		<div class="mui-slider-group mui-slider-loop">
			<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
			<div class="mui-slider-item mui-slider-item-duplicate">
				<a href="#">
					<img src="read_image.php?c=<?php echo $GLOBALS["_SESSION"]["login_cid"];?>&type=wgoods&image=<?php echo $this->_data['detail']['photo'][0];?>">
				</a>
			</div>
			<!-- 第一张 -->
			<?php foreach($this->_data['detail']['photo'] as $row) { ?>
			<div class="mui-slider-item">
				<a href="#">
					<img src="read_image.php?c=<?php echo $GLOBALS["_SESSION"]["login_cid"];?>&type=wgoods&image=<?php echo $row;?>">
				</a>
			</div>
			<?php };?>
			<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
			<div class="mui-slider-item mui-slider-item-duplicate">
				<a href="#">
					<img src="read_image.php?c=<?php echo $GLOBALS["_SESSION"]["login_cid"];?>&type=wgoods&image=<?php echo $this->_data['detail']['photo'][0];?>">
				</a>
			</div>
		</div>
		<div class="mui-slider-indicator">
			<div class="mui-indicator mui-active"></div>
			<div class="mui-indicator"></div>
			<div class="mui-indicator"></div>
			<div class="mui-indicator"></div>
		</div>
	</div>
	<div class="mui-card" style="margin:0px;padding:12px;">
		<a href="detail.html">
			<div class="mui-media-body laimi-font16" style="white-space:normal; line-height:26px;">
				<?php echo $this->_data['detail']['wgoods_name'];?>
				<div class='laimi-font12 laimi-color-gray'><?php echo $this->_data['detail']['wgoods_name2'];?></div>
				<div style="color:#CF2D28;font-size:12px;margin-top:6px;">¥<span style="font-size:22px;font-weight:bold;"><?php echo $this->_data['detail']['min_price'];?></span>&nbsp;&nbsp;&nbsp;
				<?php if ($this->_data['detail']['min_price'] != $this->_data['detail']['wgoods_price']) { ?>
					<span class="laimi-font16 laimi-color-gray" style="text-decoration:line-through">¥<?php echo $this->_data['detail']['wgoods_price'];?></span>&nbsp;&nbsp;&nbsp;<span style="background-color:#CF2D28;color:#FFFFFF;font-size:10px;border-radius:2px; padding:2px 3px 0px 3px;"><?php if ($this->_data['detail']['min_price'] != $this->_data['detail']['wgoods_cprice']) {
						echo "限时打折";
					}else{
						echo "会员价";
					};?></span>
				<?php };?>
				</div>
			</div>
		</a>
	</div>
	<div class="mui-card" style="margin:0px;margin-top:6px;">
		<ul class="mui-table-view laimi-font12 laimi-color-gray">
			<li class="mui-table-view-cell laimi-code">
		        <a class="mui-navigate-right">数量：
		        	<div class="mui-numbox laimi-font12" data-numbox-min='1' data-numbox-max='1000' style="width:120px;height:26px;">
					<button class="mui-btn-numbox-minus" type="button">-</button>
					<input class="mui-input-numbox laimi-font14 laimi-count" type="number" />
					<button class="mui-btn-numbox-plus" type="button">+</button>
				</div>
		        </a>
		    </li>
		    <?php if ($this->_data['detail']['min_price'] != $this->_data['detail']['wgoods_price'] && $this->_data['detail']['min_price'] != $this->_data['detail']['wgoods_cprice']) { ?>
		    <li class="mui-table-view-cell">
		        <a class="mui-navigate-right">限时打折：<?php echo $this->_data['detail']['act_name'];?></a>
		    </li>
		    <?php };?>
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
		        <a class="mui-navigate-right">商品详情</a>
		    </li>
		    <li class="mui-table-view-cell">
		        <?php echo $this->_data['detail']['wgoods_content'];?>
		    </li>
		</ul>
	</div>
	<div class="mui-card" style="margin:0px;margin-top:6px;">
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		        <a class="mui-navigate-right" class="laimi-color-gray">用户评价（12）</a>
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
	</div>	
</div>
<script src="./js/mui.min.js"></script>
<script type="text/javascript" charset="utf-8">
  mui.init();
  mui('body').on('tap', 'a', function(){document.location.href=this.href;});
  mui("#slider").slider({
		interval: 3000
	});
  mui('.laimi-code').on('input','.laimi-count',function(){
  	var price = <?php echo $this->_data['detail']['min_price'];?>;
  	var realprice = mui('.laimi-count')[0].value * price;
  	mui('.laimi-price')[0].innerHTML = realprice.toFixed(2);
  })
  mui('.laimi-code').on('change','.laimi-count',function(){
  	var price = <?php echo $this->_data['detail']['min_price'];?>;
  	var realprice = mui('.laimi-count')[0].value * price;
  	mui('.laimi-price')[0].innerHTML = realprice.toFixed(2);
  })
  mui('.laimi-add')[0].addEventListener('tap',function(){
  	mui.ajax('detail_add_do.php',{
			data:{
				id:<?php echo $this->_data['detail']['wgoods_id'];?>,
				count:mui('.laimi-count')[0].value
			},
			dataType:'text',//服务器返回json格式数据
			type:'post',//HTTP请求类型
			timeout:5000,//超时时间设置为10秒；
			success:function(res){
				if (res == 0) {
					mui.alert('添加购物车成功');
					var count = <?php if(empty($this->_data['cart'])) echo 0; else echo $this->_data['cart']['cart_count']; ?>;
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
					mui.alert('商品已下架');
				}else{
					mui.alert('添加购物车失败');
				}
			},
			error:function(xhr,type,errorThrown){
				//异常处理；
				mui.alert('操作异常，请稍后再试');
			}
		});
  })
</script>
</body>
</html>