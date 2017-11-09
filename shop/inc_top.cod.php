		<div id="laimi-top" class="layui-header">
			<div class="laimi-logo">
				<a href="main.php"><img src="../img/logo.png" height="40"></a>
			</div>
			<div class="laimi-title">企业名称：<?php echo laimi_company_name(); ?></div>
			<ul class="layui-nav layui-layout-right">
				<li class="layui-nav-item" style="margin-right:10px;">
					<a href="#" style="padding-right:10px;" >
						<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongzhi"></use></svg>
						最新消息<span class="layui-badge">9</span>
					</a>
				</li>
				<li class="layui-nav-item" style="margin-right:10px;">
					<a href="javascript:;" style="margin-right:10px;"><img src="../img/touxiang3.png" width="30" height="30" class="layui-circle"/>&nbsp;
						李小梅
					</a>
					<dl class="layui-nav-child">
						<dd><a href="#">修改密码</a></dd>
						<dd><a href="#">安全退出</a></dd>
				  </dl>
				</li>
				<li class="layui-nav-item">
					<a href="javascript:;">
						权限：店长
					</a>					
				</li>
				<?php if($GLOBALS['_SESSION']['login_type'] == 1){ ?>
				<li class="layui-nav-item">
					<a href="id_exchange_do.php" style="margin-right:10px;">
						<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yuangong"></use></svg>
						转换为管理员
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
