<nav class="mui-bar mui-bar-tab">
	<a id="laimi-menu-index" class="mui-tab-item laimi-href<?php if($GLOBALS['strchannel'] == 'index') echo ' mui-active'; ?>" href="index.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
				<use xlink:href="#icon-home"></use>
			</svg>
		</span>
		<span class="mui-tab-label">首页</span>
	</a>
	<a id="laimi-menu-list" class="mui-tab-item laimi-href<?php if($GLOBALS['strchannel'] == 'list') echo ' mui-active'; ?>" href="list.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
				<use xlink:href="#icon-chanpinfenlei-xuanzhong"></use>
			</svg>
		</span>
		<span class="mui-tab-label">全部商品</span>
	</a>
	<a id="laimi-menu-cart" class="mui-tab-item laimi-href<?php if($GLOBALS['strchannel'] == 'cart') echo ' mui-active'; ?>" href="cart.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
				<use xlink:href="#icon-gouwuche1"></use>
			</svg>
			<?php if($GLOBALS['gcart'] > 0) { ?>
			<span class="mui-badge laimi-cartcount"><?php echo $GLOBALS['gcart']; ?></span>
			<?php } ?>
		</span>
		<span class="mui-tab-label">购物车</span>
	</a>
	<a id="laimi-menu-center" class="mui-tab-item laimi-href<?php if($GLOBALS['strchannel'] == 'center') echo ' mui-active'; ?>" href="center.php">
		<span class="mui-icon">
			<svg class="laimi-icon5" aria-hidden="true" style="height:20px;">
				<use xlink:href="#icon-huiyuan"></use>
			</svg>
		</span>
		<span class="mui-tab-label">会员中心</span>
	</a>
</nav>
