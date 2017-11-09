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
						<a href="#">会员管理</a>
					</li>
					<li>
						<a href="#">过期用户</a>
					</li>
					<li>
						<a href="#">回收站</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<label class="layui-form-label">卡类型</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部会员卡</option>
				<option value="东风路分店">收银员</option>
				<option value="王城路分店">技师</option>
				<option value="九都路分店">理发师</option>
			</select>
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="卡号/手机号/姓名">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>卡号</th>
			<th>姓名</th>
			<th>手机</th>
			<th>性别</th>
			<th>开卡时间</th>
			<th>到期时间</th>
			<th>卡类型</th>
			<th>卡状态</th>			
			<th>电子档案</th>
			<th>消费明细</th>
			<th>所属店铺</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>101012</td>
			<td><a href="#" id="laimi-add" style="color:#009688;text-decoration: underline;">刘小宇</a></td>
			<td>13623145678</td>
			<td>男</td>
			<td>2016-12-18</td>
			<td>2017-12-18</td>
			<td>会员卡</td>
			<td>正常</td>			
			<td><a href="#" style="color:#009688;text-decoration: underline;">电子档案</a></td>
			<td><a href="#" style="color:#009688;text-decoration: underline;">消费明细</a></td>
			<td>东风路分店</td>
		</tr>
		<tr>
			<td colspan="14" class="laimi-color-hui" style="text-align: left;">余额：<span class="laimi-color-ju">￥1286.00</span>，剩余积分：0 ,卡余：【 5元代金券(5.00)，到期时间:2017-12-24；5元代金券(5.00)，到期时间:2017-12-24；</td>
		</tr>
		<tr>
			<td>101012</td>
			<td><a href="#" style="color:#009688;text-decoration: underline;">刘德华</a></td>
			<td>13623145678</td>
			<td>男</td>
			<td>2016-12-18</td>
			<td>2017-12-18</td>
			<td>会员卡</td>
			<td>正常</td>			
			<td><a href="#" style="color:#009688;text-decoration: underline;">电子档案</a></td>
			<td><a href="#" style="color:#009688;text-decoration: underline;">消费明细</a></td>
			<td>东风路分店</td>
		</tr>
		<tr>
			<td colspan="14" class="laimi-color-hui" style="text-align: left;">余额：<span class="laimi-color-ju">￥1286.00</span>，剩余积分：0 ,卡余：【 5元代金券(5.00)，到期时间:2017-12-24；5元代金券(5.00)，到期时间:2017-12-24；</td>
		</tr>
		
	</tbody>
</table>
<div class="laimi-fenye">
	<div id="demo7"></div>
</div>
				</div>
			</div> 
		</div>
	</div>
	<!--新增操作员弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
			<div class="layui-row">	
				<div class="layui-col-md4">
					<label class="layui-form-label">会员照片</label>
				    <div class="layui-form-mid layui-word-aux"><img style="width:130px;height:130px;" src="/img/no.jpg"></div>		      		
				</div>		    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">会员卡号</label>
				    <div class="layui-form-mid layui-word-aux">1022511</div>
				  </div>
			    </div>	    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">会员姓名</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-blue">刘德华</span></div>
				  </div>
			    </div>			    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">卡类型</label>
				    <div class="layui-form-mid layui-word-aux">钻石卡(8.8折)</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">余额</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥1286.00</span></div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">积分</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">1286分</span></div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">累计消费</label>
				    <div class="layui-form-mid layui-word-aux">￥8800.00</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">手机号码</label>
				    <div class="layui-form-mid layui-word-aux">13623833360</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">性别</label>
				    <div class="layui-form-mid layui-word-aux">男</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">出生日期</label>
				    <div class="layui-form-mid layui-word-aux">1988-12-12</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">身份证号</label>
				    <div class="layui-form-mid layui-word-aux">410125198806251254</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">联系人</label>
				    <div class="layui-form-mid layui-word-aux">王小英</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">开通时间</label>
				    <div class="layui-form-mid layui-word-aux">2016-12-12 12:40</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">到期时间</label>
				    <div class="layui-form-mid layui-word-aux">2018-12-12</div>
				  </div>
			    </div>			    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">推荐人</label>
				    <div class="layui-form-mid layui-word-aux">小张</div>
				  </div>
			    </div>
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">办卡备注</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">用于消除浮动</div>
				  </div>
			    </div>
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">卡余套餐</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">
				    	<table class="layui-table">
						  <thead>
						    <tr>
						      <th>类型</th>
						      <th>名称</th>
						      <th>备注</th>
						    </tr> 
						  </thead>
						  <tbody>
						    <tr>
						      <td>代金券</td>
						      <td>20元</td>
						      <td>满100元可用</td>
						    </tr>
						  </tbody>
						</table>
				    </div>
				  </div>
			    </div>	
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">优惠券</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">
				    	<table class="layui-table">
						  <thead>
						    <tr>
						      <th>类型</th>
						      <th>名称</th>
						      <th>备注</th>
						    </tr> 
						  </thead>
						  <tbody>
						    <tr>
						      <td>代金券</td>
						      <td>20元</td>
						      <td>满100元可用</td>
						    </tr>
						  </tbody>
						</table>
				    </div>
				  </div>
			    </div>			    			    
			</div>
	</div>
	<!--新增操作员弹出层结束-->
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
			title: ["会员信息", "font-size:16px;"],
			btnAlign: "r",
			offset: 'rt',
			anim: 7,
			area: ["800px", "100%"],
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
<script>
//分页
layui.use(['laypage', 'layer'], function(){
var laypage = layui.laypage
,layer = layui.layer;

//自定义首页、尾页、上一页、下一页文本
laypage.render({
elem: 'demo7'
,count: 60
,limit:50
,layout: ['count', 'prev', 'page', 'next', 'skip']
,jump: function(obj){
console.log(obj)
}
});

});
</script>		
</body>
</html>