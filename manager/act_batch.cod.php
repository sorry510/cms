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
						<a href="act_batch.php">批量营销</a>
					</li>
					<li>
						<a href="act_batch_weixin.php">微信营销记录</a>
					</li>
					<li>
						<a href="act_batch_sms.php">短信营销记录</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-batch layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<div class="layui-input-inline">
			<a id="laimi-search" class="layui-btn layui-btn-normal">高级查询条件</a>
		</div>
		<div class="laimi-float-right">
			<a id="laimi-sms" class="layui-btn">批量短信营销</a>
		</div>
		<div class="laimi-float-right" style="margin-right:10px;">
			<a id="laimi-weixin" class="layui-btn">批量微信营销</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>姓名</th>
			<th>性别</th>
			<th>卡号</th>
			<th>卡类型</th>
			<th>手机号</th>
			<th>生日</th>
			<th>办卡时间</th>
			<th>到期时间</th>
			<th>上次到店时间</th>
			<th>未到店天数</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>张小宇</td>
			<td>男</td>
			<td>10002</td>
			<td>钻石卡</td>
			<td>13623833360</td>
			<td>1970-8-23</td>
			<td>2017-05-01</td>
			<td>2018-10-8</td>
			<td>2017-9-28</td>
			<td>30天</td>
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
	<!--新增高级查询弹出层开始-->
	<div id="laimi-modal-search" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label">开卡店铺</label>
				<div class="layui-input-inline">
					<select name="shop" lay-search>
						<option value="">请选择店铺</option>
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
				<label class="layui-form-label">会员卡类型</label>
				<div class="layui-input-inline">
					<select name="card" lay-search>
						<option value="">请选择会员卡类型</option>
						<option value="你工作的第一个城市">你工作的第一个城市</option>
						<option value="你的工号">你的工号</option>
						<option value="你最喜欢的老师">你最喜欢的老师</option>
					</select>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">性别</label>
				<div class="layui-input-inline">
					<input type="radio" name="sex" value="3" title="不限" checked="">
					<input type="radio" name="sex" value="1" title="男">
					<input type="radio" name="sex" value="2" title="女">
				</div>
				<div class="layui-form-mid layui-word-aux"></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">生日时段</label>
				<div class="layui-input-inline">
					<input id="laimi-bfrom" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">至</div>
				<div class="layui-input-inline">
					<input id="laimi-bto" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">开卡时段</label>
				<div class="layui-input-inline">
					<input id="laimi-kfrom" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">至</div>
				<div class="layui-input-inline">
					<input id="laimi-kto" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">到期时段</label>
				<div class="layui-input-inline">
					<input id="laimi-dfrom" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">至</div>
				<div class="layui-input-inline">
					<input id="laimi-dto" class="layui-input" type="text" placeholder="yyyy-MM-dd">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">未到店天数</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-80" type="text" name="days" value="30">
				</div>
				<div class="layui-form-mid layui-word-aux">天，例：30天内未到店顾客</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">会员卡号</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-200" type="text" name="txtcode" placeholder="卡号/手机号/姓名">
				</div>
				<div class="layui-form-mid layui-word-aux"></div>
			</div>
			<div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit1" lay-submit>搜索</button>
		      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
	  	</div>
		</form>
	</div>
	<!--新增高级查询弹出层结束-->
	<!--新增微信营销弹出层开始-->
	<div id="laimi-modal-weixin" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label">累计人数</label>
				<div class="layui-form-mid layui-word-aux">根据您的搜索条件，将给<span class="laimi-color-ju">50</span>位会员赠送此优惠券</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 活动名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 赠送优惠券</label>
				<div class="layui-input-inline">
					<select name="txtticket" lay-search>
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
				<label class="layui-form-label"><span>*</span> 通知方式</label>
				<div class="layui-input-inline">
					<input type="checkbox" name="like1[write]" lay-skin="primary" title="微信推送" checked="">
					<input type="checkbox" name="like1[read]" lay-skin="primary" title="短信通知">
				</div>
			</div>
			<div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit2" lay-submit>完成</button>
		      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
	  	</div>
		</form>
	</div>
	<!--新增微信营销弹出层结束-->
	<!--新增短信营销弹出层开始-->
	<div id="laimi-modal-sms" class="laimi-modal">
		<form class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label">累计人数</label>
				<div class="layui-form-mid layui-word-aux">根据您的搜索条件，将给<span class="laim-color-ju">50</span>位会员发送此短信</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 活动名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 短信内容</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" name="txtcontent"></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">示例短信</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" style="min-height:50px; line-height:26px;">亲爱的{user}，有{wdate}天没看到您啦，非常想念您，您的会员卡{udate}就到期了，尽快过来上课哦~</textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">变量说明</label>
				<div class="layui-form-mid layui-word-aux" style="width:75%;line-height:26px;">姓名{user}，卡号{id}，办卡时间：{tdate}，到期时间：{udate}，生日{bsid}，未到店天数{wdate}</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">注意事项</label>
				<div class="layui-form-mid" class="laimi-color-ju">营销短信发送时间为8:00-18:00，其它时间发送，将影响您的发送结果~</div>
			</div>
			<div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit3" lay-submit>完成</button>
		      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
	  	</div>
		</form>
	</div>
	<!--消息弹出层结束-->
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
			elem: '#laimi-bfrom'
		});
		objdate.render({
			elem: '#laimi-bto'
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
		$("#laimi-search").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["高级查询条件", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-search")
			});
		});
		$("#laimi-weixin").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["批量微信营销", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-weixin")
			});
		});
		$("#laimi-sms").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["批量短信营销", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-sms")
			});
		});
		objform.on("submit(laimi-submit1)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
</body>
</html>