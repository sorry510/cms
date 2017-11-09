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
					<li class="layui-this">
						<a href="worker_reward.php">员工提成方案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
	<div class="layui-col-xs6">
		<form class="layui-form" action="">
	<div class="layui-form-item">
		<label class="layui-form-label">办卡提成</label>
		<div class="layui-input-inline">
			<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-100">
		</div>
		 <div class="layui-form-mid layui-word-aux">元/会员</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">充值提成</label>
		<div class="layui-input-inline">
			<input type="radio" name="sex" value="百分比" title="百分比(%)">
			<input type="radio" name="sex" value="固定金额" title="固定金额(元)">
		</div>
		<div class="layui-input-inline">
			<input type="text" name="title" lay-verify="title" class="layui-input laimi-input-80">
		</div>
	</div>	
	<div class="layui-form-item">
		<label class="layui-form-label">导购提成</label>
		<div class="layui-input-inline">
			<input type="radio" name="sex" value="百分比" title="百分比(%)">
			<input type="radio" name="sex" value="固定金额" title="固定金额(元)">
		</div>
		<div class="layui-input-inline">
			<input type="text" name="title" lay-verify="title" class="layui-input laimi-input-80">
		</div>
	</div>	
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
			确认
			</button>
			<button type="reset" class="layui-btn layui-btn-primary">
			重置
			</button>
		</div>
</div>															
</form>
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
			<div class="layui-tab-content" style="padding: 0px;">
				<div class="layui-tab-item layui-show" style="min-height:400px;overflow-y:auto; max-height:400px;">
					<form class="layui-form" action="">
					<table class="layui-table" style="margin:0px;">
						<colgroup>
							<col width="100">
							<col width="280">
							<col width="80">
							<col width="200">
						</colgroup>
						<thead>
							<tr>
								<th>分类</th>
								<th>商品名称</th>
								<th>价格</th>
								<th>提成比例/金额</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th colspan="3" style="text-align: left;">
									<div class="layui-input-inline">
										<select name="quiz" lay-search>
											<option value="">请选择商品</option>
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
							     	<button class="layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
							  	</div>
									</th>
								<th>
									<div class="layui-input-inline">
										<input type="text" name="title" placeholder="%" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
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
										<input type="text" name="title" placeholder="%" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
									</div>
	
									<div class="layui-inline">
										<input type="text" name="title" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;"></div>
									<div class="layui-inline">元</div>		
								</td>
							</tr>
							<tr>
								<td></td>
								<td style="text-align: left;">洗车洗车洗车洗车洗车洗车</td>
								<td>￥38.00</td>
								<td style="padding:5px">
									<div class="layui-inline">
										<input type="text" name="title" placeholder="%" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
									</div>
	
									<div class="layui-inline">
										<input type="text" name="title" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;"></div>
									<div class="layui-inline">元</div>		
								</td>
							</tr>
							<tr>
								<td>许闲心</td>
								<td style="text-align: left;">2016-11-28</td>
								<td>￥25.80</td>
								<td style="padding:0px;">																
									<div class="layui-inline">
										<input type="text" name="title" placeholder="%" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
									</div>
	
									<div class="layui-inline">
										<input type="text" name="title" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;"></div>
									<div class="layui-inline">元</div>																															
								</td>
							</tr>
						</tbody>
					</table>
					</form>
				</div>
				<div class="layui-tab-item" style="min-height:400px;overflow-y:auto; max-height:400px;">
					<form class="layui-form" action="">
					<table class="layui-table" style="margin:0px;">
						<thead>
							<tr>
								<th>套餐名称</th>
								<th>价格</th>
								<th>提成比例/金额</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th colspan="2" style="text-align: left;">
									<div class="layui-input-inline">
										<select name="quiz" lay-search>
											<option value="">请选择套餐</option>
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
							     	<button class="layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
							  	</div>
									</th>
								<th>
									<div class="layui-input-inline">
										<input type="text" name="title" placeholder="折" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
									</div>
									<div class="layui-inline">
							     	<button class="layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="demo1">批量设置</button>
							  	</div>
									
								</th>
							</tr>
							<tr>
								<td style="text-align: left;">洗车洗车洗车洗车洗车洗车</td>
								<td>￥38.00</td>
								<td style="padding:5px">
									<div class="layui-inline">
										<input type="text" name="title" placeholder="折" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
									</div>
	
									<div class="layui-inline">
										<input type="text" name="title" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;"></div>
									<div class="layui-inline">元</div>		
								</td>
							</tr>
							<tr>
								<td style="text-align: left;">2016-11-28</td>
								<td>￥25.80</td>
								<td style="padding:0px;">																
									<div class="layui-inline">
										<input type="text" name="title" placeholder="折" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
									</div>
	
									<div class="layui-inline">
										<input type="text" name="title" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;"></div>
									<div class="layui-inline">元</div>																															
								</td>
							</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
		</div>
				</div>
			</div> 
		</div>
</div>	
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
				title: ["新增操作员", "font-size:16px;"],
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