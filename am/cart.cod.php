<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/iconfont.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
    <style>
		/*toast信息提示*/
		.mui-toast-container {bottom: 50% !important;}
		</style>
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-font14">购物车</h1>
	<a class="mui-pull-right laimi-font14 laimi-cart-clear" style="margin-top:12px;" href="javascript:;">
		清空购物车
	</a>
</header>
<?php echo $this->fun_fetch('inc_menu', ''); ?>
<nav class="mui-bar mui-bar-tab" style="margin-bottom:50px;">
	<a class="mui-tab-item mui-active laimi-font14 laimi-color-gray">
		共<span class="laimi-allcount"><?php echo $GLOBALS['cart_count']; ?></span>件商品
	</a>
	<a class="mui-tab-item mui-active laimi-font14 laimi-color-gray" style="width:1.3%;">
		合计：¥<span class="mui-tab-label laimi-font16 laimi-allmoney" style="color:#CF2D28;"><?php echo $GLOBALS['cart_money']; ?></span>
	</a>
	<span class="mui-tab-item laimi-add" style="background-color:#CF2D28;width:1.4%;" >
		<span class="laimi-color-white laimi-font16">去结算</span>
	</span>
</nav>
<div id="laimi-content" class="mui-content" style="padding-bottom:110px;">
	<?php foreach($this->_data['cart_list'] as $row){ ?>
	<div class="mui-table-view-cell" style="padding:0;">
		<div class="mui-slider-right mui-disabled" style="margin-top:6px;">
			<a class="mui-btn mui-btn-red" href="javascript:;" tid="<?php echo $row['wcart_id'];?>">删除</a>
		</div>
		<div class="mui-card mui-slider-handle" style="margin:0px;padding:10px 12px;margin-top:6px;">
			<form class="mui-input-group">
				<div class="mui-checkbox mui-left">
					<input class="laimi-check" name="checkbox" gstate="<?php echo $row['wgoods_state']; ?>" value="<?php echo $row['wcart_id'];?>" type="checkbox" style="left:0px;margin-top:15px;" <?php if($row['state'] == 1) echo "checked"; ?> <?php if($row['wgoods_state'] != 1) echo "disabled"; ?>>
				</div>
			</form>
			<img class="mui-media-object mui-pull-left" src="../upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']); ?>/wgoods_image/<?php echo $row['photo'];?>" style="max-width:75px;height:75px;border-radius:2px;margin-left:35px;">
			<div class="mui-media-body" style="white-space:normal;">
				<?php echo $row['wgoods_name']; ?>
				<p class='laimi-font10'><?php echo $row['wgoods_name2']; ?><?php if($row['wgoods_state'] != 1) echo '(已下架，无法购买！)'; ?></p>
				<p>
					<div style="float:left;color:#CF2D28;font-size:12px;margin-top:3px;line-height:30px;">
						¥<span style="font-size:20px;"><?php echo $row['min_price']; ?></span>
					</div>
					<div style="float:right;margin-top:10px;">
						<div class="mui-numbox laimi-font12" data-numbox-min='1' data-numbox-max='1000' style="width:90px;height:24px;padding:0px 28px;">
							<button class="mui-btn-numbox-minus" type="button" style="width:28px;">-</button>
							<input class="mui-input-numbox laimi-font14 laimi-num" type="number" tid="<?php echo $row['wcart_id'];?>" flag="<?php echo $row['state'];?>" minprice="<?php echo $row['min_price']; ?>" value="<?php echo $row['wcart_wgoods_count'];?>"/>
							<button class="mui-btn-numbox-plus" type="button" style="width:28px;">+</button>
						</div>
					</div>
				</p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<script src="./js/mui.min.js"></script>
<script src="js/layer.js"></script>
<script src="js/bind_phone.js"></script>
<script type="text/javascript" charset="utf-8">
	mui.init();
	mui('body').on('tap', 'a', function(){document.location.href=this.href;});//mui阻止href跳转，模拟一下
	mui.ready(function(){
		bind_phone(mui, layer, <?php echo api_value_int0($GLOBALS['_SESSION']['login_id']); ?>);
	})

	var listen = true;//避免input和change执行2遍
	mui('#laimi-content').on('input', '.laimi-num', function() {
		listen = false;
		var data = {
			num: this.value,
			id: this.getAttribute("tid")
		};
		mui.ajax({
			url: 'cart_ajax.php',
			data: data,
			dataType:"text",
			type:"post",
			timeout:5000,
			success: function(res){
				if(res == 0){
					result();
					var count = 0;
					mui(".laimi-num").each(function(k, v){
						count = Number(count) + Number(v.value);
					})
					mui('.laimi-cartcount')[0].innerHTML = count;
				}else{
					mui.toast('修改失败', null, "提示");
				}
			},
			error: function(xhr, type, errorThrown){
				mui.toast("网络不给力，请稍后重试！", "提示信息");
			}
		})
	});
	mui('#laimi-content').on('change', '.laimi-num', function() {
		if(!listen){
			listen = !listen;
			return false;
		}
		var data = {
			num: this.value,
			id: this.getAttribute("tid")
		};
		mui.ajax({
			url: 'cart_ajax.php',
			data: data,
			dataType:"text",
			type:"post",
			timeout:5000,
			success: function(res){
				if(res == 0){
					result();
					var count = 0;
					mui(".laimi-num").each(function(k, v){
						count = Number(count) + Number(v.value);
					})
					mui('.laimi-cartcount')[0].innerHTML = count;
				}else{
					mui.toast('修改失败', null, "提示");
				}
			},
			error: function(xhr, type, errorThrown){
				mui.toast("网络不给力，请稍后重试！", "提示信息");
			}
		})
	});
	mui('#laimi-content').on('change', '.laimi-check', function() {
		var value = this.value;
		var state = this.getAttribute("gstate");
		if(state != 1){
			return false;
		}
		if(this.checked){
			mui.ajax({
				url: 'cart_state_ajax.php',
				data: {id: value, state: 1},
				dataType:"text",
				type:"post",
				timeout:5000,
				success: function(res){
					if(res == 0){
						mui(".laimi-num[tid='"+value+"']")[0].setAttribute("flag", 1);
						result();
					}else if(res == 1){
						mui.toast('商品不存在', null, "提示");
					}else if(res == 2){
						mui.toast('修改失败', null, "提示");
					}
				},
				error: function(xhr, type, errorThrown){
					mui.toast("网络不给力，请稍后重试！", "提示信息");
				}
			})
		}else{
			mui.ajax({
				url: 'cart_state_ajax.php',
				data: {id: value, state: 2},
				dataType:"text",
				type:"post",
				timeout:5000,
				success: function(res){
					if(res == 0){
						mui(".laimi-num[tid='"+value+"']")[0].setAttribute("flag", 2);
						result();
					}else if(res == 1){
						mui.toast('商品不存在', null, "提示");
					}else if(res == 2){
						mui.toast('修改失败', null, "提示");
					}
				},
				error: function(xhr, type, errorThrown){
					mui.toast("网络不给力，请稍后重试！", "提示信息");
				}
			})
		}
	});
	mui('#laimi-content').on('tap', '.mui-btn', function(event) {
		var elem = this;
		var id = elem.getAttribute("tid");
		var li = elem.parentNode.parentNode;
		mui.confirm('确认删除该商品吗', '提醒', ['确认', '取消'], function(e) {
			if (e.index == 0) {
				mui.ajax({
					url: 'cart_goods_delete_ajax.php',
					data: {id: id},
					dataType:"text",
					type:"post",
					timeout:5000,
					success: function(res){
						if(res == 0){
							li.parentNode.removeChild(li);
							result();
						}else if(res == 1){
							toast('此商品已不存在');
						}else{
							toast('删除失败');
						}
					},
					error: function(xhr, type, errorThrown){
						mui.toast("网络不给力，请稍后重试！", "提示信息");
					}
				})
			} else {
				setTimeout(function() {
					mui.swipeoutClose(li);
				}, 0);
			}
		});
	});
	mui('.laimi-cart-clear')[0].addEventListener('tap', function() {
		var elem = this;
		var li = elem.parentNode.parentNode;
		mui.confirm('确认要清空购物车吗', '提醒', ['确认', '取消'], function(e) {
			if (e.index == 0) {
				mui.ajax({
					url: 'cart_goods_deleteall_do.php',
					data: {},
					dataType:"text",
					type:"post",
					timeout:5000,
					success: function(res){
						if(res == 0){
							window.location.reload();
						}else{
							toast('删除失败');
						}
					},
					error: function(xhr, type, errorThrown){
						mui.toast("网络不给力，请稍后重试！", "提示信息");
					}
				})
			}
		});
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
	mui('.laimi-add')[0].addEventListener('tap',function(){
		var allcount = parseInt(mui('.laimi-allcount')[0].innerHTML);
		console.log(allcount);
		if (allcount > 0) {
			console.log(1);
			window.location.href = "cart_enter.php";
		}else{
			mui.toast('购物车为空');
		}
	})
</script>
</body>
</html>