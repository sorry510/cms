<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body" style="background-color:#FFFFFF;">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<form class="layui-form">
					<div style="padding:10px;border-bottom:1px solid #F0F0F0;background-color:#F6F6F6;"">
						<div class="layui-input-inline">
							<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="卡号/手机号/姓名">
						</div>
						<div class="layui-input-inline">
							<button class="layui-btn">F1搜索</button>
						</div>
						<div class="layui-input-inline" style="margin-left:20px;">
							<span class="laimi-color-hui" style="margin-left:20px;">卡号：</span><span class="laimi-color-ju">10001</span>
							<span class="laimi-color-hui" style="margin-left:20px;">姓名：</span><span class="laimi-color-ju">张小宇（男）</span>
							<span class="laimi-color-hui" style="margin-left:20px;">手机：</span><span class="laimi-color-ju">13623833360</span>
							<span class="laimi-color-hui" style="margin-left:20px;">卡类型：</span><span class="laimi-color-ju">白金卡（8.8折）</span>
							<span class="laimi-color-hui" style="margin-left:20px;">余额：</span><span class="laimi-color-ju" style="font-weight:bold;font-size:18px;">¥ 588.00</span>
							<span class="laimi-color-hui" style="margin-left:20px;">积分：</span><span class="laimi-color-hui">168</span>
						</div>
					</div>					
				<div id="laimi-main" class="p-card layui-tab-content">
					<div class="layui-row">
					    <div class="layui-col-md4">
					    	<div class="layui-tab">
							  <ul class="layui-tab-title">
							    <li class="layui-this">可选套餐</li>
							  </ul>
							  <div class="layui-tab-content" style="padding:0px;">
							    <div class="layui-tab-item layui-show">
							    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
									  <thead>
									    <tr class="layui-bg-green">
									      <th width="200">可选套餐</th>
									      <th >价格</th>
									      <th width="40">操作</th>
									    </tr> 
									    <tr>
									      <td colspan="3" style="text-align:left;background-color:#F8F8F8;color:#FF5722;">
								      		限时打折：2017-8-15至2017-8-30
			      					      </td>
									    </tr>
									  </thead>
									  <tbody>
									  	<tr>
									      <td style="text-align:left;" class="laimi-color-lan">
									      	<span class="layui-badge layui-bg-blue">次</span>&nbsp;套餐名称套餐名称 002
									       </td>
									       <td>
									      	<span class="laimi-color-hui2">¥180</span>&nbsp;<span class="laimi-color-ju">¥116</span>
									       </td>
									       <td>
									      	<a href="" class="laimi-color-lan">添加</a>
									       </td>
									    </tr>
									    <tr>
									    	<td style="text-align:left;" colspan="3">
									      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">5次</span>&nbsp;<span class="layui-badge layui-bg-gray">90天</span>
									      </td>		      
									    </tr>
									    <tr>
									    	<td style="text-align:left;" colspan="3">
									      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">5次</span>&nbsp;<span class="layui-badge layui-bg-gray">90天</span>
									      </td>		      
									    </tr>										    
									    <tr>
									      <td style="text-align:left;" class="laimi-color-lan">
									      	<span class="layui-badge layui-bg-blue">时</span>&nbsp;理发年卡套餐
									       </td>
									       <td>
									      	<span class="laimi-color-hui">¥180</span>
									       </td>
									       <td>
									      	<a href="" class="laimi-color-lan">添加</a>
									       </td>
									    </tr>
									    <tr>
									    	<td style="text-align:left;" colspan="3">
									      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">365天</span>
									      </td>		      
									    </tr>
									    <tr>
									    	<td style="text-align:left;" colspan="3">
									      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">365天</span>
									      </td>		      
									    </tr>									    						    
									  </tbody>
									</table>
							    </div>
							  </div>
							</div>	
					    </div>			    
					    <div class="layui-col-md8" style="padding-left:40px;margin-top:0px;" height="100%">
					    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
							  <thead>
							    <tr class="layui-bg-orange">
							      <th width="250">名称</th>
							      <th>价格</th>
							      <th>数量</th>
							      <th>方式</th>
							      <th>操作</th>
							    </tr> 
							  </thead>
							  <tbody>
							    <tr>
							      <td style="text-align:left;"><span class="layui-badge layui-bg-blue">通用</span>&nbsp;许闲心心许闲心许闲心闲心许</td>
							      <td style="text-align:left;"><span class="laimi-color-hui">¥18.00</span></td>
							      <td style="padding:5px 5px;">
							      
								  </td>
								  <td><span class="layui-badge">卡扣</span></td>
							      <td><a href="#" class="laimi-color-lan">移除</a></td>
							    </tr>
							    <tr>
							      <td style="text-align:left;"><span class="layui-badge layui-bg-blue">单店</span>&nbsp;许闲心许闲心许闲心许闲心许</td>
							      <td style="text-align:left;"><span class="laimi-color-hui">¥18.00</span></td>
							      <td style="padding:5px 5px;">
							      	<div class="layui-input-inline">
										<button class="layui-btn layui-btn-mini layui-btn-primary"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg></button>
									</div>
									<div class="layui-input-inline">
										<input class="layui-input" type="text" value="1" style="padding-left:0px;height:28px;text-align:center;width:40px;">
									</div>
									<div class="layui-input-inline">
										<button class="layui-btn layui-btn-mini layui-btn-primary"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg></button>
									</div>
								  </td>
								  <td><span class="layui-badge">卡券</span></td>
							      <td><a href="#" class="laimi-color-lan">移除</a></td>
							    </tr>
								<tr>
							      <td style="text-align:left;"><span class="layui-badge layui-bg-blue">套餐</span>&nbsp;许闲心心许闲心许闲心闲心许</td>
							      <td style="text-align:left;"><span class="laimi-color-hui">¥18.00</span></td>
							      <td style="padding:5px 5px;">
							      	<div class="layui-input-inline">
										<button class="layui-btn layui-btn-mini layui-btn-primary"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg></button>
									</div>
									<div class="layui-input-inline">
										<input class="layui-input" type="text" value="1" style="padding-left:0px;height:28px;text-align:center;width:40px;">
									</div>
									<div class="layui-input-inline">
										<button class="layui-btn layui-btn-mini layui-btn-primary"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg></button>
									</div>
								  </td>
								  <td></td>
							      <td><a href="#" class="laimi-color-lan">移除</a></td>
							    </tr>
							    <tr>
							    	<td height="30" style="text-align:left;margin-left:0px;">
										<div class="layui-form-mid">代金券</div>
										<div class="layui-input-inline">
											<select name="shop" lay-search>
											<option value="">可用代金券</option>
											<option value="分类1">50元代金券（满200元可用，2017-12-31止）</option>
											<option value="分类2">分类2</option>
											<option value="分类3">分类3</option>
										</select>
										</div>										
									</td>
									<td colspan="5" height="30" style="text-align:right;">										
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
										满减：满200元减50元。满送：满200元减50元
									</td>
								</tr>
								<!--tr>
									<td colspan="4" height="30" style="text-align:left;margin-left:0px;">
										<div class="layui-input-inline">
											赠送：<input type="checkbox" name="" title="10元代金券（满100元可用，2017-10-1至2017-12-31）" lay-skin="primary" checked disabled>
										</div>										
									</td>
								</tr-->
							  </tbody>
							</table>
					    </div>
					  </div> 
				</div>			
			<div style="position:fixed;bottom:0px;width:100%;padding:0px 15px 0px 15px;height:70px;border:1px solid #eeeeee;line-height:70px;background-color:#F6F6F6;">
					<div class="layui-input-inline">
						<select name="shop" lay-search>
							<option value="">导购人员</option>
							<option value="分类1">分类1</option>
							<option value="分类2">分类2</option>
							<option value="分类3">分类3</option>
						</select>
					</div>
					<div class="layui-input-inline" style="margin-left:40px;">
						共<span style="font-weight:bold;font-size:16px;" class="laimi-color-ju">0</span>件，原价：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">¥368.00</span>，优惠：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">¥68.00</span>，应收金额：<span style="font-size:26px;font-weight:bold;" class="laimi-color-ju">¥256.00</span>，积分：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">68</span>
					</div>
					<div class="layui-input-inline laimi-float-right" style="margin-right:200px;margin-top:10px;">
						<a id="laimi-add" class="layui-btn layui-btn-big" style="height:50px;line-height:50px;font-size:24px;">&nbsp;&nbsp;结帐&nbsp;&nbsp;</a>
					</div>
			</div>
			</form>			
		</div>
	</div>
</div>
<!--新增分组弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
		  <div class="layui-form-item">	
		  	<div class="layui-field-box" style="font-size:16px;background-color:#FFFFDD;height:55px;padding-top:25px;border:1px solid #FCEFA1;margin-top:20px;">
			    <label class="layui-form-label">应收金额</label>
			    <div class="layui-form-mid laimi-color-hui" style="font-size:28px;font-weight:bold;">¥256.00</div>			    
			    <label class="layui-form-label" style="margin-left:30px;">实收金额</label>
			    <div class="layui-form-mid laimi-color-ju" style="font-size:28px;font-weight:bold;">¥256.00</div>
			    <label class="layui-form-label" style="margin-left:30px;">手动优惠</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="height:50px;margin-top:-6px;line-height:50px;font-size:24px;font-weight:bold;">
			    </div>
			</div>
			<div class="layui-field-box" style="font-size:16px;background-color:#FFFFDD;height:55px;padding-top:25px;border:1px solid #FCEFA1;margin-top:20px;">
			    <label class="layui-form-label">应收金额</label>
			    <input type="radio" name="txtbegin" value="2" title="会员卡余额（¥256.00）" checked="">
				<input type="radio" name="txtbegin" value="1" title="现金付款">
				<input type="radio" name="txtbegin" value="2" title="POS刷卡">
				<input type="radio" name="txtbegin" value="1" title="支付宝">
				<input type="radio" name="txtbegin" value="2" title="微信"> 
			</div>	
			<div class="layui-field-box" style="font-size:14px;border:1px solid #F0F0F0;margin-top:20px;">
			    <label class="layui-form-label">赠送优惠券</label>
				<div class="layui-input-block">
					<input type="checkbox" name="" title="10元代金券（满100元可用，2017-10-1至2017-12-31）" lay-skin="primary" checked disabled>   				
				</div>
				<div class="layui-input-block">
					<input type="checkbox" name="" title="10元代金券（满100元可用，2017-10-1至2017-12-31）" lay-skin="primary" checked disabled>   				
				</div>
			</div>							
			<div class="layui-row" style="font-size:16px;padding-top:15px;">
			    <label class="layui-form-mid layui-word-aux">现金</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="font-size:20px;font-weight:bold;height:40px;line-height:40px;">			
				</div>
				<div class="layui-form-mid layui-word-aux">找零：<span class="layui-bg-orange" style="padding:10px;border-radius:5px;font-weight:bold;font-size:18px;">25.00</span></div>
				<div class="laimi-float-right">
					<button class="layui-btn" style="height:50px;font-size:18px;">完成结帐</button>
				</div>
			</div>					
		  </div>		  
		  <div class="laimi-height-20"> </div>
		</form>
	</div>
	<!--新增分组弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["结帐", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-add")
			});
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
</body>
</html>