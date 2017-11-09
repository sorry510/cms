<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this -> fun_fetch('inc_head', ''); ?>
	</head>
	<body class="layui-layout-body">
		<div class="layui-layout layui-layout-admin">
			<?php echo $this -> fun_fetch('inc_top', ''); ?>
			<?php echo $this -> fun_fetch('inc_left', ''); ?>
			<div id="laimi-content" class="layui-body">
				<div class="layui-tab layui-tab-brief">
					<ul class="layui-tab-title">
						<li>
							<a href="act_discount.php">
								限时打折
							</a>
						</li>
						<li class="layui-this">
							新增打折活动
						</li>
					</ul>
					<div class="layui-tab-content">
						<div class="layui-row">
							<div class="layui-col-xs6">
								<form class="layui-form" action="">
							<div class="layui-form-item">
								<label class="layui-form-label">活动名称</label>
								<div class="layui-input-inline">
									<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">顾客类型</label>
								<div class="layui-input-inline">
									<input type="radio" name="sex" value="不限制" title="不限制" checked="">
									<input type="radio" name="sex" value="会员" title="会员">
									<input type="radio" name="sex" value="非会员" title="非会员">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">开始时间</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" id="test3" placeholder="yyyy-MM-dd">
								</div>
								<div class="layui-form-mid layui-word-aux">
									当天0点开始活动
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">结束时间</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" id="test4" placeholder="yyyy-MM-dd">
								</div>
								<div class="layui-form-mid layui-word-aux">
									当天12点结束活动
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">备注</label>
								<div class="layui-input-block">
									<textarea placeholder="" class="layui-textarea laimi-input-b80"></textarea>
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
														<th>折扣</th>
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
																<input type="text" name="title" placeholder="折" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
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
																<input type="text" name="title" placeholder="折" lay-verify="title" autocomplete="off" class="layui-input" style="width: 60px;height: 32px;">
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
										<div class="layui-tab-item" style="min-height:400px;overflow-y:auto; max-height:400px;">
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
														<th>套餐名称</th>
														<th>价格</th>
														<th>折扣</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th colspan="3" style="text-align: left;">
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
														<td>日用品</td>
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
														<td>许闲心</td>
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
		</div>
<?php echo $this -> fun_fetch('inc_foot', ''); ?>
<script>
	layui.use(["element"], function() {
	var objelement = layui.element;
});
</script>
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
<script>
			//监听提交
	form.on('submit(formDemo)', function(data) {
		layer.msg(JSON.stringify(data.field));
		return false;
	});
});</script>

		<script>
layui.use('laydate', function(){
var laydate = layui.laydate;
//常规用法
laydate.render({
elem: '#test3'
});
//常规用法
laydate.render({
elem: '#test4'
});
});
</script>
	</body>
</html>