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
						<li class="layui-this">商城订单管理</li>
						<li><a href="#">已处理订单</a></li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">							
							<div class="layui-form-item">
								<label class="layui-form-label laimi-input">搜索条件</label>
								<div class="layui-input-inline">
									<input type="tel" name="phone" placeholder="卡号、手机号、姓名" lay-verify="phone" autocomplete="off" class="layui-input">
								</div>
								<label class="layui-form-label laimi-input">开卡店铺</label>
								<div class="layui-input-inline">
									<select name="quiz" lay-verify="required" lay-search="">
										<option value="">请选择开卡店铺</option>
										<option value="东风路分店">东风路分店</option>
										<option value="王城路分店">王城路分店</option>
										<option value="九都路分店">九都路分店</option>
									</select>
								</div>
								<div class="layui-inline">
							     	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
							  	</div>	
							</div>
							<table class="layui-table">
								<thead>
									<tr>
										<th>订单时间</th>
										<th>会员类型</th>																			
										<th>会员姓名</th>
										<th>手机号码</th>										
										<th>购买商品</th>
										<th>购买金额</th>
										<th>付款方式</th>									
										<th>发货方式</th>
										<th>订单状态</th>
										<th>发货状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2017-10-25 18:25</td>
										<td><span class="layui-btn layui-btn-mini layui-btn-warm">微信会员</span></td>																			
										<td>张小宇</td>
										<td>13623833360</td>										
										<td><div class="layui-elip" style="width: 150px;">康师傅冰红茶500ML康师傅冰红茶500ML康师傅冰红茶500ML</div></td>
										<td>¥35</td>
										<td>支付宝</td>
										<td>邮寄</td>
										<td style="color: #FF5722;">待处理</td>
										<td><a id="laimi-modal" href="javascript:;" class="layui-btn layui-btn-norma layui-btn-small" style="color: #FFFFFF">处理订单</a></td>
										<td><a href="#">打印</a></td>										
									</tr>
								</tbody>
							</table>
							<div class="laimi-fenye">
								<div id="demo7"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--新增分店弹出层开始-->
		<div id="id1" style="display: none;padding: 20px;max-height:500px;">
			<form class="layui-form" action="">	
			  <div class="layui-row">
			    <div class="layui-col-md4">
			      	<label class="layui-form-label laimi-font1">会员卡号</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid">10001（微信会员）</div>
					</div>
			    </div>
			    <div class="layui-col-md4">
			      	<label class="layui-form-label laimi-font1">会员姓名</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid">张小宇</div>
					</div>
			    </div>
			    <div class="layui-col-md4">
			      	<label class="layui-form-label laimi-font1">手机号码</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid">13623833360</div>
					</div>
			    </div>
			    <div class="layui-col-md4">
			      	<label class="layui-form-label laimi-font1">购买金额</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid" style="color: #FF5722;">¥256元</div>
					</div>
			    </div>
			    <div class="layui-col-md4">
			      	<label class="layui-form-label laimi-font1">支付方式</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid">支付宝</div>
					</div>
			    </div>
			    <div class="layui-col-md4">
			      	<label class="layui-form-label laimi-font1">发货方式</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid">邮寄</div>
					</div>
			    </div>		    
			    
			    <div class="layui-col-md12">
			      	<label class="layui-form-label laimi-font1">收货地址</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid">河南省郑州市东风路13号开翔御龙城小区5号楼1906室，杨丹，13623833360</div>
					</div>
			    </div>
			  </div>
			  <table class="layui-table" style="width: 90%;margin-left: 40px;">
				  <colgroup>
				  	<col>
				    <col width="100">
				    <col width="100">
				  </colgroup>
				  <thead>
				    <tr>
				      <th>商品名称</th>
				      <th>数量</th>
				      <th>单价</th>
				    </tr> 
				  </thead>
				  <tbody>
				    <tr>
				      <td style="text-align:left;">洗头洗头</td>
				      <td>6</td>
				      <td>¥25元</td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">酸奶</td>
				      <td>2</td>
				      <td>¥25元</td>
				    </tr>
					<tr>
				      <td style="text-align:left;">酸奶</td>
				      <td>2</td>
				      <td>¥25元</td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">酸奶</td>
				      <td>2</td>
				      <td>¥25元</td>
				    </tr>
				  </tbody>
				</table>		  			  			  
				<div class="layui-row laimi-float-right" style="margin-right: 60px;">合计：<span style="font-size:20px;color: #FF5722;">¥256.00</span>
				</div>	
				<div class="laimi-height-20"></div>		
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						发货
						</button>
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						到店自取
						</button>
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						退款
						</button>
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						取消
						</button>
						</div>
				</div>
				<div class="laimi-height-20"></div>
			</form>					
					</div>
				</div>
			</div>
		</div>
		<!--消息弹出层结束-->		
		<?php echo $this -> fun_fetch('inc_foot', ''); ?>
		<script>layui.use(["element"], function() {
	var objelement = layui.element;
});</script>

		<script>//这个是下拉框
layui.use('form', function() {
			var form = layui.form;

			//监听提交
			form.on('submit(formDemo)', function(data) {
				layer.msg(JSON.stringify(data.field));
				return false;
			});

			//四、弹出层
			layui.use('layer', function() { //独立版的layer无需执行这一句
						var $ = layui.jquery,
							layer = layui.layer; //独立版的layer无需执行这一句
							
						//弹出一个页面层
  $('#laimi-modal').on('click', function(){
    layer.open({
      type: 1,
			title: ['商城订单详细', 'font-size:16px;'],
			btnAlign: 'r',
      area: ['880px', 'auto'],
      shadeClose: true, //点击遮罩关闭
      content: $('#id1')
    });
  });
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
,count: 50
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