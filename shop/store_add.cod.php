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
						<a href="store.php">入库和入库</a>
					</li>
					<li class="layui-this">
						<a href="store_add.php">新增出库/入库</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group-reward-edit layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs5" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 类型</label>
				<div class="layui-input-inline">
					<input type="radio" name="sex" value="入库" title="入库">
					<input type="radio" name="sex" value="出库" title="出库">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from" class="layui-input laimi-input-200" type="text" placeholder="yyyy-MM-dd">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 金额</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100" placeholder="￥" type="text" name="title">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">经办人</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-200" type="text" name="title">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-inline">
					<textarea class="layui-textarea" name="txtmemo" style="width:300px;"></textarea>

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
		<div class="layui-col-xs7" style="padding-top:10px;">
			<table class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th width="80">分类</th>
									<th>商品名称</th>
									<th width="60">价格</th>
									<th width="60">数量</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="4" style="text-align:left;margin:0 auto;">
										<div class="layui-input-inline">
											<select name="quiz" lay-search>
												<option value="">请选择分类</option>
													<option value="分类1">分类1</option>
													<option value="分类2">分类2</option>
													<option value="分类3">分类3</option>
											</select>
										</div>
										<div class="layui-input-inline last">
											<input class="layui-input laimi-input-200" type="text" name="mgoods" placeholder="商品名称/编码/简拼">
										</div>
										<div class="layui-inline">
								     	<button class="layui-btn layui-btn-normal">搜索</button>
								  		</div>
									</th>
								</tr>
								<tr>
									<td>日用品</td>
									<td style="text-align:left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtmoney">
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td style="text-align:left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtmoney">
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td style="text-align:left;">洗车洗车洗车洗车洗车洗车</td>
									<td>￥38.00</td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="txtmoney">
										</div>
									</td>
								</tr>
							</tbody>
						</table>
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;		
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});	
	});
	</script>
</body>
</html>