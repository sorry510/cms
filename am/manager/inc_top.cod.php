<div id="laimi-top" class="layui-header">
	<div class="laimi-logo">
		<a href="main.php"><img src="../../img/logo.png" height="40"></a>
	</div>
	<ul class="layui-nav layui-layout-right" stle="margin-right:50px;">
		<li class="layui-nav-item<?php if($GLOBALS['strchannel'] == 'main') echo ' layui-nav-itemed'; ?>">
				<a href="main.php">
					<svg class="laimi-cicon" aria-hidden="true"><use xlink:href="#icon-shouye1"></use></svg>
					&nbsp;系统首页
				</a>
			</li>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'card') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">会员管理</a>
				<dl class="layui-nav-child">
					<dd>
						<a href="card.php?state=1">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-huiyuan"></use></svg>
							&nbsp;会员管理
						</a>
					</dd>
<?php if($GLOBALS['gtrade']['history_module'] == 1 && $GLOBALS['gtrade']['history_flag'] == 1) { ?>
					<dd>
						<a href="card_history.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-dangan"></use></svg>
							&nbsp;电子档案
						</a>
					</dd>
<?php } ?>
					<dd>
						<a href="record.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
							&nbsp;消费明细
						</a>
					</dd>
				</dl>
			</li>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'tongji') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">统计分析</a>
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
							&nbsp;营业收入
						</a>
					</dd>
					<dd>
						<a href="tongji_income.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
							&nbsp;新增会员
						</a>
					</dd>
					<dd>
						<a href="tongji_shop_revenue.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
							&nbsp;收入占比
						</a>
					</dd>
					<dd>
						<a href="tongji_shop_ranking.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaofei"></use></svg>
							&nbsp;收入排名
						</a>
					</dd>
				</dl>
			</li>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'goods') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">商品管理</a>
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
						<a href="store_info_mgoods.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-kucun"></use></svg>
							&nbsp;库存查询
						</a>
					</dd>
				</dl>
			</li>
<?php if($GLOBALS['gtrade']['worker_module'] == 1) { ?>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'worker') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">员工管理</a>
				<dl class="layui-nav-child">
					<dd>
						<a href="worker_group.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-fenzu"></use></svg>
							&nbsp;员工分组
						</a>
					</dd>
					<dd>
						<a href="worker.php?state=1">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-user"></use></svg>
							&nbsp;员工管理
						</a>
					</dd>
					<dd>
						<a href="group_reward.php">
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
<?php } ?>
<?php if($GLOBALS['gtrade']['act_module'] == 1) { ?>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'act') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">营销管理</a>
				<dl class="layui-nav-child">
					<dd>
						<a href="ticket_money.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-daijinquan"></use></svg>
							&nbsp;代金券管理
						</a>
					</dd>
					<dd>
						<a href="ticket_goods.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tiyanbiao"></use></svg>
							&nbsp;体验券管理
						</a>
					</dd>
					<dd>
						<a href="act_discount.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-dazheyouhui"></use></svg>
							&nbsp;限时打折
						</a>
					</dd>
					<dd>
						<a href="act_decrease.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-manjian1"></use></svg>
							&nbsp;满减活动
						</a>
					</dd>
					<dd>
						<a href="act_give.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-song"></use></svg>
							&nbsp;满送活动
						</a>
					</dd>
					<!-- <dd>
						<a href="act_chong.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-song"></use></svg>
							&nbsp;充值活动
						</a>
					</dd> -->
					<dd>
						<a href="act_batch.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yingxiao"></use></svg>
							&nbsp;批量营销
						</a>
					</dd>
				</dl>
			</li>
<?php } ?>

<?php if($GLOBALS['gtrade']['wshop_module'] == 1) { ?>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'wshop') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">微商城</a>
				<dl class="layui-nav-child">
					<dd>
						<a href="wechat_shop_config.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-weibiaoti-"></use></svg>
							&nbsp;微商城设置
						</a>
					</dd>
					<dd>
						<a href="wechat_shop_notice.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongzhi"></use></svg>
							&nbsp;商城公告
						</a>
					</dd>
					<dd>
						<a href="wechat_shop_class.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tiyandian"></use></svg>
							&nbsp;商品分类
						</a>
					</dd>
					<dd>
						<a href="wechat_shop_manage.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shangpin"></use></svg>
							&nbsp;商品管理
						</a>
					</dd>
					<dd>
						<a href="wechat_shop_order.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-zhangdanmingxi"></use></svg>
							&nbsp;商城订单
						</a>
					</dd>
					<dd>
						<a href="wact_discount.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tongji7"></use></svg>
							&nbsp;限时打折
						</a>
					</dd>							
					<hr class="layui-bg-gary" style="width:80%;margin-left:10px;">
					<!-- <dd>
						<a href="wechat_shop_agent.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yongjinjiesuan"></use></svg>
							&nbsp;分销商管理
						</a>
					</dd> -->
					<dd>
						<a href="wechat_shop_agent_money.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yongjinjiesuan"></use></svg>
							&nbsp;佣金设置
						</a>
					</dd>
					<dd>
						<a href="wechat_shop_agent_all.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yongjinjiesuan"></use></svg>
							&nbsp;佣金统计
						</a>
					</dd>
					<dd>
						<a href="wechat_shop_agent_take.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yongjinjiesuan"></use></svg>
							&nbsp;提现记录
						</a>
					</dd>
				</dl>
			</li>
<?php } ?>
			<li class="layui-nav-item<?php //if($GLOBALS['strchannel'] == 'system') echo ' layui-nav-itemed'; ?>">
				<a href="javascript:;">系统管理</a>
				<dl class="layui-nav-child">
					<dd>
						<a href="system_trade.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-weibiaoti-"></use></svg>
							&nbsp;参数设置
						</a>
					</dd>
				<?php if($GLOBALS['gtrade']['wmp_module'] == 1) { ?>
				<dd>
						<a href="weixin_mp.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shezhizhifumima"></use></svg>
							&nbsp;微信设置
						</a>
					</dd>
					<?php } ?>
					<dd>
						<a href="system_alipay.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shezhizhifumima"></use></svg>
							&nbsp;支付设置
						</a>
					</dd>
					<dd>
						<a href="system_card_type.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-fenleigongnengleimu"></use></svg>
							&nbsp;会员卡分类
						</a>
					</dd>
<?php if($GLOBALS['gtrade']['score_module'] == 1 && $GLOBALS['gtrade']['score_flag'] == 1) { ?>
					<dd>
						<a href="system_gift_record.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jifen1"></use></svg>
							&nbsp;积分换礼
						</a>
					</dd>
<?php } ?>
					<dd>
						<a href="system_user.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-caozuoyuanquanxian"></use></svg>
							&nbsp;操作员管理
						</a>
					</dd>
					<dd>
						<a href="system_shop.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yingyeting"></use></svg>
							&nbsp;分店管理
						</a>
					</dd>
					<dd>
						<a href="system_company.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-zhanghumingxi1"></use></svg>
							&nbsp;企业信息
						</a>
					</dd>
				</dl>
			</li>
	</ul>
</div>
<div style="background-color:#F7F7F7;padding:12px;border-bottom: 1px solid #F2F2F2;">
	<div class="laimi-title" style="margin-left: 20px;">企业名称：<?php echo $GLOBALS['gcompanyname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;短信余额：<span class="laimi-color-ju"><?php echo laimi_company_sms();?>条</span></div>
			<ul class="layui-nav layui-layout-right" style="margin-top: 48px;height:45px;background-color: #F7F7F7;">
				<li class="layui-nav-item" style="line-height: 45px;">
					<a href="javascript:;" style="color:#606060;padding:0 10px;"><img src="../../img/touxiang2.png" width="30" height="30" class="layui-circle"/>&nbsp;你好，
						<?php echo $GLOBALS['gusername']; ?>
					</a>
				</li>
				<li class="layui-nav-item" style="line-height: 45px;">
					<a href="javascript:;" style="color:#606060;padding:0 10px;">
						<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-quanxian"></use></svg>
						权限：管理员
					</a>
				</li>
				<li class="layui-nav-item" style="line-height: 45px;">
					<a href="javascript:;" style="color:#606060;padding:0 10px;">
						<svg class="laimi-hicon" style="color:#88B7F0;" aria-hidden="true"><use xlink:href="#icon-yuangong"></use></svg>
						转换为店长
					</a>
					<dl class="layui-nav-child">
<?php foreach($GLOBALS['gshop'] as $row) { ?>
						<dd><a href="switch.php?shop=<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></a></dd>
<?php } ?>
					</dl>
				</li>
				<li class="layui-nav-item" style="line-height: 45px;">
					<a href="password.php" style="color:#606060;padding:0 10px;">
						<svg class="laimi-hicon" style="color:#88B7F0;" aria-hidden="true"><use xlink:href="#icon-xiugai"></use></svg>
						修改密码</a>
				</li>
				<li class="layui-nav-item" style="line-height: 45px;">
					<a href="../../logout_do.php" style="color:#606060;">
						<svg class="laimi-hicon" style="color:#88B7F0;" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
						安全退出</a>
				</li>
			</ul>
</div>
