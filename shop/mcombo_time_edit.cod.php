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
						<a href="worker_reward.php">新增计时套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<div class="layui-row">
	<div class="layui-col-xs6">
		<form class="layui-form">
			<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品名称</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtname">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">简拼</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-80" type="text" name="txtname">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">商品编码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-200" type="text" name="txtname">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="price_min" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元。</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="price_min" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元。如有会员价，优先按会员价结算</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">有效时间</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="price_min">
			    </div>
			    <div class="layui-form-mid layui-word-aux">天</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">参与活动</label>
			    <div class="layui-input-inline">
			      <input type="radio" name="txttype" value="1" title="不参与">
				  <input type="radio" name="txttype" value="2" title="参与活动">
			   </div>
			   <div class="layui-form-mid layui-word-aux">商品是否参于满减、满送额度计算</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">参与预约</label>
			    <div class="layui-input-inline">
			      <input type="radio" name="txttype" value="1" title="不参与">
				  <input type="radio" name="txttype" value="2" title="参与预约">
			   </div>
			</div>					    	  
		  	<div class="layui-form-item">
		    	<div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
		    	</div>
		  	</div>
		  <div class="laimi-height-20">		  	
		  </div>
		</form>
	</div>
	<div class="layui-col-xs6">
		<div class="layui-tab">
			<ul class="layui-tab-title">
				<li class="layui-this">
					可选商品
				</li>
			</ul>
			<div class="layui-tab-content" style="padding: 0px;">
				<div class="layui-tab-item layui-show" style="min-height:400px;overflow-y:auto; max-height:400px;">
					<form class="layui-form" action="">
					<table class="layui-table" style="margin:0px;">
						<thead>
							<tr>
								<th>分类</th>
								<th>商品名称</th>
								<th width="70">选择</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th colspan="2" style="text-align: left;">
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
									<input type="checkbox" name=""lay-skin="primary"> 全选								
								</th>
							</tr>
							<tr>
								<td>日用品</td>
								<td style="text-align: left;">洗车洗车洗车洗车洗车洗车<span class="laimi-color-ju">（￥38.00）</span></td>
								<td style="padding:5px">
									<input type="checkbox" name=""lay-skin="primary"> 选择
								</td>
							</tr>
							<tr>
								<td></td>
								<td style="text-align: left;">洗车洗车洗车洗车洗车洗车<span class="laimi-color-ju">（￥38.00）</span></td>
								<td style="padding:5px">
									<input type="checkbox" name=""lay-skin="primary"> 选择
								</td>
							</tr>
							<tr>
								<td>许闲心</td>
								<td style="text-align: left;">2016-11-28<span class="laimi-color-ju">（￥38.00）</span></td>
								<td style="padding:0px;">																
									<input type="checkbox" name=""lay-skin="primary"> 选择																										
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
	});
	</script>
</body>
</html>