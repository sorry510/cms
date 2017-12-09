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
	<h1 class="mui-title laimi-font14">购物车</h1>
	<a class="mui-pull-right laimi-font14" style="margin-top:12px;">
		清空购物车
	</a>
</header>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<nav class="mui-bar mui-bar-tab" style="margin-bottom:50px;">
	<a class="mui-tab-item mui-active laimi-font14 laimi-color-gray" href="#tabbar">
		共<span class="laimi-allcount">0</span>件商品
	</a>
	<a class="mui-tab-item mui-active laimi-font14 laimi-color-gray" href="#tabbar" style="width:1.3%;">
		合计：¥<span class="mui-tab-label laimi-font16 laimi-allmoney" style="color:#CF2D28;">0.00</span>
	</a>
	<a class="mui-tab-item" style="background-color:#CF2D28;width:1.4%;" onclick="window.location='cart_enter.html';">
		<span class="laimi-color-white laimi-font16">去结算</span>
	</a>
</nav>
<div id="laimi-content" class="mui-content" style="margin-bottom:60px;">
	<div style="line-height:30px;height:30px;background-color:#CF2D28;color:#FFFFFF;font-size:12px;text-align:center;">
	库存不多了，尽快付款哦~~~~
	</div>
	<?php foreach($this->_data['cart_list'] as $row){ ?>
	<div class="mui-card mui-table-view mui-table-view-cell" style="margin:0px;padding:10px 12px;margin-top:6px;">
		<form class="mui-input-group">
			<div class="mui-checkbox mui-left">
				<input class="laimi-check" name="checkbox" value="<?php echo $row['wcart_id'];?>" type="checkbox" style="left:0px;margin-top:15px;">
			</div>
		</form>
		<img class="mui-media-object mui-pull-left" src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=wgoods&image=".$row['photo'];?>" style="max-width:75px;height:75px;border-radius:2px;margin-left:35px;">
		<div class="mui-media-body" style="white-space:normal;">
			<?php echo $row['wgoods_name']; ?>
			<p class='laimi-font10'><?php echo $row['wgoods_name2']; ?></p>
			<p>
				<div style="float:left;color:#CF2D28;font-size:12px;margin-top:3px;line-height:30px;">
					¥<span style="font-size:20px;"><?php echo $row['min_price']; ?></span>
				</div>
				<div style="float:right;margin-top:10px;">
					<div class="mui-numbox laimi-font12" data-numbox-min='1' data-numbox-max='1000' style="width:90px;height:24px;padding:0px 28px;">
						<button class="mui-btn-numbox-minus" type="button" style="width:28px;">-</button>
						<input class="mui-input-numbox laimi-font14 laimi-num" type="number" tid="<?php echo $row['wcart_id'];?>" flag="0" minprice="<?php echo $row['min_price']; ?>" value="<?php echo $row['wcart_wgoods_count'];?>"/>
						<button class="mui-btn-numbox-plus" type="button" style="width:28px;">+</button>
					</div>
				</div>
			</p>
		</div>
	</div>
	<?php } ?>
</div>
<script src="./js/mui.min.js"></script>
<script type="text/javascript" charset="utf-8">
	mui.init();
	mui('#laimi-content').on('change', '.laimi-num', function() {
		var data = {
			num: this.value,
			id: this.getAttribute("tid")
		};
		mui.post('cart_ajax.php', data, function(res){
			if(res == 0){
				result();
				var count = 0;
				mui(".laimi-num").each(function(k, v){
					count = Number(count) + Number(v.value);
				})
				mui('.laimi-cartcount')[0].innerHTML = count;
			}else{
				mui.alert('修改失败', null, "提示");
			}
		})
	});
	mui('#laimi-content').on('change', '.laimi-check', function() {
		if(this.checked){
			mui(".laimi-num[tid='"+this.value+"']")[0].setAttribute("flag", 1);
		}else{
			mui(".laimi-num[tid='"+this.value+"']")[0].setAttribute("flag", 0);
		}
		result();
	});

	function result(){
		var allmoney = 0;
		var allcount = 0;
		mui(".laimi-num[flag='1']").each(function(k, v){
			allmoney = Number(allmoney) + Number(v.getAttribute("minprice") * v.value);
			allcount = Number(allcount) + Number(v.value);
		})
		mui('.laimi-allcount')[0].innerHTML = Number(allcount);
		mui('.laimi-allmoney')[0].innerHTML = Number(allmoney).toFixed(2);
	}
</script>
</body>
</html>