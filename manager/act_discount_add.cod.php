<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li>
						<a href="act_discount.php">限时打折</a>
					</li>
					<li class="layui-this">
						<a href="act_discount_add.php">新增打折活动</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount-add layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label">活动名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">顾客类型</label>
				<div class="layui-input-inline">
					<input type="radio" name="txtclient" value="1" title="不限制" checked="">
					<input type="radio" name="txtclient" value="2" title="会员">
					<input type="radio" name="txtclient" value="3" title="非会员">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">开始时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from" class="layui-input" type="text" name="txtstart" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">
					当天0点开始活动
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">结束时间</label>
				<div class="layui-input-inline">
					<input id="laimi-to" class="layui-input" type="text" name="txtend" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">
					当天12点结束活动
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
					确认
					</button>
					<button type="reset" class="layui-btn layui-btn-primary">
					重置
					</button>
				</div>
			</div>															
		</div>
		<div class="layui-col-xs6">
			<div class="layui-tab">
				<ul class="layui-tab-title">
					<li class="layui-this">
						可选商品
					</li>
					<li>
						可选套餐
					</li>
				</ul>
				<div class="layui-tab-content" style="padding:0;">
					<div class="layui-tab-item layui-show" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0px;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th>价格</th>
									<th width="150">折扣</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3" style="text-align:left;">
										<div class="layui-input-inline">
											<select name="search" lay-search>
												<option value="">请选择商品分类</option>
												<optgroup label="城市记忆">
													<option value="你工作的第一个城市">你工作的第一个城市</option>
												</optgroup>
												<optgroup label="学生时代">
													<option value="你的工号">你的工号</option>
													<option value="你最喜欢的老师">你最喜欢的老师</option>
												</optgroup>
											</select>
										</div>
										<div class="layui-inline">
								     	<button class="layui-btn layui-btn-small layui-btn-normal">搜索</button>
								  	</div>
									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="折">
										</div>
										<div class="layui-inline">
								     	<button class="layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="demo1">批量设置</button>
								  	</div>
									</th>
								</tr>
								<tr>
									<td>日用品</td>
									<td style="text-align: left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="折">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="￥">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
								<tr>
									<td>日用品</td>
									<td style="text-align: left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="折">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="￥">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="layui-tab-item" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>分类</th>
									<th>套餐名称</th>
									<th>价格</th>
									<th width="150">折扣</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3" style="text-align:left;">
										
									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="折">
										</div>
										<div class="layui-inline">
								     	<button class="layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="demo1">批量设置</button>
								  	</div>
									</th>
								</tr>
								<tr>
									<td>日用品</td>
									<td style="text-align: left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="折">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="￥">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
								<tr>
									<td>日用品</td>
									<td style="text-align: left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="折">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtdiscount" placeholder="￥">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>							
	</div>									
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this -> fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
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