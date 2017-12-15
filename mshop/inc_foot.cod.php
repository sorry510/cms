<nav class="mui-bar mui-bar-tab">
	<a class="mui-tab-item mui-active laimi-href" href="./shop.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
			    <use xlink:href="#icon-home"></use>
			</svg>
		</span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a class="mui-tab-item laimi-href" href="./class.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
			    <use xlink:href="#icon-chanpinfenlei-xuanzhong"></use>
			</svg>
		</span>
		<span class="mui-tab-label">商品分类</span>
	</a>
	<a class="mui-tab-item laimi-href" href="./cart.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
			    <use xlink:href="#icon-gouwuche1"></use>
			</svg>
			<?php if(!empty(laimi_cart_count()['count'])){ ?>
			<span class="mui-badge laimi-cartcount"><?php echo laimi_cart_count()['count']; ?></span>
			<?php } ?>
		</span>
		<span class="mui-tab-label">购物车</span>
	</a>
	<a class="mui-tab-item laimi-href" href="./index.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
			    <use xlink:href="#icon-huiyuan"></use>
			</svg>
		</span>
		<span class="mui-tab-label">会员中心</span>
	</a>
</nav>