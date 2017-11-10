		<div id="laimi-left" class="layui-side layui-bg-black">
			<div class="layui-side-scroll">
				<ul class="layui-nav layui-nav-tree">
					<li class="layui-nav-item">
						<a href="main.php">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-shouye1"></use></svg>
							&nbsp;首页
						</a>
					</li>
					<li class="layui-nav-item">
						<a href="workbench.php">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
							&nbsp;收银
						</a>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-vip"></use></svg>
							&nbsp;会员
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="card.php?state=1">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-huiyuan"></use></svg>
									&nbsp;会员管理
								</a>
							</dd>
							<dd>
								<a href="card_history.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-dangan"></use></svg>
									&nbsp;电子档案
								</a>
							</dd>
							<dd>
								<a href="record.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
									&nbsp;消费明细
								</a>
							</dd>
						</dl>
					</li>
					<li class="layui-nav-item">
						<a href="#">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-yingyeshijian"></use></svg>
							&nbsp;预约
						</a>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-shangpin"></use></svg>
							&nbsp;商品
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="mgoods.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tiyandian"></use></svg>
									&nbsp;通用商品
								</a>
							</dd>
							<dd>
								<a href="sgoods.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shangpin"></use></svg>
									&nbsp;单店商品
								</a>
							</dd>
							<dd>
								<a href="mcombo1.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-fenxiangcishu"></use></svg>
									&nbsp;计次套餐
								</a>
							</dd>
							<dd>
								<a href="mcombo2.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jihuashijian"></use></svg>
									&nbsp;计时套餐
								</a>
							</dd>
							<dd>
								<a href="store_info.php?type=1">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-kucun"></use></svg>
									&nbsp;库存查询
								</a>
							</dd>
						</dl>
					</li>	        
					<li class="layui-nav-item">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-tongji7"></use></svg>
							&nbsp;统计
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="tongji_all.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji4"></use></svg>
									&nbsp;基础统计
								</a>
							</dd>
							<dd>
								<a href="tongji_goods.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji1"></use></svg>
									&nbsp;商品排名
								</a>
							</dd>
							<dd>
								<a href="tongji_business.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji7"></use></svg>
									&nbsp;收入对比
								</a>
							</dd>
							<dd>
								<a href="tongji_income.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
									&nbsp;新增会员
								</a>
							</dd>
						</dl>
					</li>
					<li class="layui-nav-item <?php if($GLOBALS['strchannel'] == 'worker') echo 'layui-nav-itemed'; ?>">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-yuangong"></use></svg>
							&nbsp;员工
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="worker_group.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-fenzu"></use></svg>
									&nbsp;员工分组
								</a>
							</dd>
							<dd>
								<a href="worker.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-user"></use></svg>
									&nbsp;员工管理
								</a>
							</dd>
							<dd>
								<a href="worker_group_reward.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji3"></use></svg>
									&nbsp;提成方案
								</a>
							</dd>
							<dd>
								<a href="worker_reward_detail.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-zhangdanmingxi"></use></svg>
									&nbsp;提成明细
								</a>
							</dd>
							<dd>
								<a href="worker_reward_tongji.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji2"></use></svg>
									&nbsp;提成统计
								</a>
							</dd>
						</dl>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-tongji7"></use></svg>
							&nbsp;收支
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="cash.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji4"></use></svg>
									&nbsp;收支管理
								</a>
							</dd>
							<dd>
								<a href="cash_type.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji1"></use></svg>
									&nbsp;收支分类
								</a>
							</dd>
						</dl>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-tongji7"></use></svg>
							&nbsp;库存
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="store.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji4"></use></svg>
									&nbsp;入库出库
								</a>
							</dd>
							<dd>
								<a href="store_info.php?type=1">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji1"></use></svg>
									&nbsp;库存管理
								</a>
							</dd>
						</dl>
					</li>
					<li class="layui-nav-item">
						<a href="act_batch.php">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-yingxiao2"></use></svg>
							&nbsp;营销
						</a>
					</li>					
					<li class="layui-nav-item">
						<a href="javascript:;">
							<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-weibiaoti-"></use></svg>
							&nbsp;系统
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="system_trade.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-weibiaoti-"></use></svg>
									&nbsp;打印设置
								</a>
							</dd>
							<dd>
								<a href="system_card_type.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-fenleigongnengleimu"></use></svg>
									&nbsp;会员卡分类
								</a>
							</dd>
							<dd>
								<a href="system_score.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jifen1"></use></svg>
									&nbsp;积分换礼
								</a>
							</dd>
							<dd>
								<a href="system_user.php">
									<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-caozuoyuanquanxian"></use></svg>
									&nbsp;操作员管理
								</a>
							</dd>	
						</dl>
					</li>
				</ul>
				<div class="laimi-height-20">					
				</div>
			</div>
		</div>
