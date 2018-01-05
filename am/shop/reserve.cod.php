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
						<a href="reserve.php">今日预约</a>
					</li>
					<li>
						<a href="reserve.php">明日预约</a>
					</li>
					<li>
						<a href="reserve.php">全部预约</a>
					</li>
					<li>
						<a href="reserve.php">过期预约</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label laimi-input" style="width:0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="卡号/手机号/姓名">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a id="laimi-add" class="layui-btn">新增预约</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>到店时间</th>
			<th>卡号</th>
			<th>姓名</th>
			<th>电话</th>
			<th>人数</th>
			<th>预约项目</th>			
			<th>时间</th>			
			<th>备注</th>
			<th>方式</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2017-10-22 12:00</td>
			<td>1001</td>
			<td>张小宇</td>
			<td>13623833360</td>
			<td>2</td>
			<td>烫发烫发烫发烫发烫发烫发烫发烫</td>
			<td><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yingyeshijian"></use></svg></td>			
			<td><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaoxi"></use></svg></td>
			<td><span class="layui-badge" style="background-color:#62b900;">微信</span></td>
			<td>未到店</td>
			<td>
				<a class="layui-btn  layui-btn-warm layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-yingyeting"></use></svg>
					到店
				</a>
				<a class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</a>
				<a class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					取消
				</a>
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
	<!--新增操作员弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
		<form class="layui-form">
			<blockquote class="layui-elem-quote" style="padding:8px;">
				<div class="layui-form-item">
			    <label class="layui-form-label" style="width:60px;">搜索条件</label>
					<div class="layui-input-inline">
						<input class="layui-input" type="txtkey" name="title" placeholder="卡号/手机号/姓名">
					</div>
			    <div class="layui-inline">
			       <button class="layui-btn layui-btn-normal">搜索</button>
			    </div>
					<div class="layui-inline" style="margin-left:20px;">
						卡号：<span class="laimi-color-ju" style="font-weight:bold;font-size:16px;">100010</span>
					</div>
		  	</div>		
			</blockquote>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 姓名</label>
		    <div class="layui-input-block">
		      <input class="layui-input laimi-input-200" type="text" name="txtname">
		    </div>
		  </div>
		   <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 人数</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" value="1" type="text" name="txtaccount">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 手机</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtaccount">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 预约项目</label>
		    <div class="layui-input-inline">
		      <select name="shop">
				<option value="">全部分类</option>
				<option value="理疗">理疗</option>
				<option value="洗头">洗头</option>
			</select>
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 到店时间</label>
		    <div class="layui-input-inline">
		    	<input id="laimi-time" class="layui-input laimi-input-200" type="text" placeholder="yyyy-MM-dd">
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
	<!--新增操作员弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-birthday'
		});
		objdate.render({
			elem: '#laimi-join'
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
	  	objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objdate.render({
			elem: '#laimi-time',
			type: 'datetime'
		});
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增预约", "font-size:16px;"],
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