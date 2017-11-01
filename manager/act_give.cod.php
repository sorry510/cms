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
						<a href="act_give.php">满送活动</a>
					</li>
					<li>
						<a href="act_give.php?expire=1">已结束</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-give layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="txtname">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline last">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a id="laimi-add" class="layui-btn">新增满送活动</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>名称</th>
			<th>赠送类型</th>
			<th>送券内容</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>备注</th>
			<th>状态</th>
			<th width="130">操作</th>
		</tr> 
  </thead>
	<tbody>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>代金券</td>
			<td>5元代金券</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td>已结束</td>
			<td></td>
		</tr>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>代金券</td>
			<td>5元代金券</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td class="laimi-color-lv">活动中</td>
			<td>
				<button class="layui-btn layui-bg-red layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停止
				</button>
			</td>
		</tr>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>代金券</td>
			<td>5元代金券</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td class="laimi-color-huang">未开始</td>
			<td>
				<button class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
			</td>
		</tr>
		<tr>
			<td>2017-12-18 12:40</td>
			<td>国庆节8折活动</td>
			<td>代金券</td>
			<td>5元代金券</td>
			<td>2017-10-1</td>
			<td>2017-10-8</td>
			<td>备注信息</td>
			<td class="laimi-color-ju">已停止</td>
			<td>
				<button class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-bg-blue layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
					启用
				</button>
			</td>
		</tr>
  </tbody>
</table>	
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div> 
		</div>
	</div>
	<!--新增满送活动弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 活动名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 实付满</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-80" type="text" name="txtman" placeholder="￥">
				</div>
				<div class="layui-form-mid layui-word-aux">元，例，设置100元送1张，则消费200元送2张</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 赠送</label>
				<div class="layui-input-inline">
					<select name="quiz" lay-search>
						<option value="">请选择优惠券</option>
						<optgroup label="代金券">
							<option value="你工作的第一个城市">你工作的第一个城市</option>
						</optgroup>
						<optgroup label="体验券">
							<option value="你的工号">你的工号</option>
							<option value="你最喜欢的老师">你最喜欢的老师</option>
						</optgroup>
					</select>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 开始时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from2" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 结束时间</label>
				<div class="layui-input-inline">
					<input id="laimi-to2" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
				</div>
			</div>				
			<div class="layui-form-item">
		    <div class="layui-input-block laimi-buttom-20">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>完成</button>
		      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
	  	</div>
		</form>	
	</div>
	<!--新增满送活动弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objdate.render({
			elem: '#laimi-from2'
		});
		objdate.render({
			elem: '#laimi-to2'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: 50,
			limit: 50,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj) {
				//console.log(obj)
			}
		});
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增满送活动", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
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