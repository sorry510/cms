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
						<li class="layui-this">微商城管理</li>
						<li><a href="wechat_shop_class.php">商城分类</a></li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">							
							<div class="layui-form-item">
								<label class="layui-form-label laimi-input">商品名称</label>
								<div class="layui-input-inline">
									<input type="tel" name="phone" placeholder="请输入商品名称" lay-verify="phone" autocomplete="off" class="layui-input">
								</div>
								<label class="layui-form-label laimi-input">商品分类</label>
								<div class="layui-input-inline">
									<select name="quiz" lay-verify="required" lay-search="">
										<option value="">请选择分类</option>
										<option value="东风路分店">东风路分店</option>
										<option value="王城路分店">王城路分店</option>
										<option value="九都路分店">九都路分店</option>
									</select>
								</div>
								<div class="layui-inline">
							     	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
							  	</div>	
								<div class="layui-inline laimi-float-right">
									<a id="laimi-modal" href="javascript:;" class="layui-btn">
										新增商城商品
									</a>
								</div>
							</div>
							<table class="layui-table">
								<colgroup>
									<col width="120">
									<col width="280">
									<col width="120">
									<col width="380">
									<col width="120">
									<col width="120">
									<col width="100">
									<col width="100">
									<col width="100">
									<col>
								</colgroup>
								<thead>
									<tr>
										<th>来源</th>																			
										<th>(门店)商品名称</th>
										<th>(商城)分类</th>
										<th>(商城)名称</th>
										<th>(商城)价格</th>
										<th>(商城)库存</th>									
										<th>状态</th>
										<th>编辑</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span class="layui-btn layui-btn-mini layui-btn-warm">门店商品</span></td>																			
										<td style="text-align: left;">康师傅冰红茶500ML（¥38）</td>
										<td>--</td>
										<td style="text-align: left;">康师傅冰红茶500ML</td>
										<td>¥35</td>
										<td>5</td>
										<td style="padding: 0px;"><input type="checkbox" name="close" lay-skin="switch" lay-text="上架|下架"></td>
										<td style="padding: 0px;"><a href="wechat_shop_manage_detail.php" class="layui-btn layui-btn-small layui-bg-cyan"><svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg> 编辑</a></td>
										<td style="padding: 0px;">--</td>										
									</tr>
									<tr>
										<td>商城商品</td>																			
										<td style="text-align: left;">--</td>
										<td>水果</td>
										<td style="text-align: left;">康师傅冰红茶500ML</td>
										<td>¥35</td>
										<td>5</td>
										<td style="padding: 0px;"><input type="checkbox" name="close" lay-skin="switch" lay-text="上架|下架"></td>
										<td style="padding: 0px;"><a href="wechat_shop_manage_detail.php" class="layui-btn layui-btn-small layui-bg-cyan"><svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg> 编辑</a></td>
										<td style="padding: 0px;"><a href="wechat_shop_manage_detail.php" class="layui-btn layui-btn-small layui-bg-gray"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg> 删除</a></td>											
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
				<div class="layui-form-item">
					<label class="layui-form-label">商品分类</label>
					<div class="layui-input-inline">
						<select name="quiz" lay-search>
				          <option value="">请选择会员卡类型</option>
				            <option value="你工作的第一个城市">你工作的第一个城市</option>
				            <option value="你的工号">你的工号</option>
				            <option value="你最喜欢的老师">你最喜欢的老师</option>
				        </select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">商品名称</label>
					<div class="layui-input-block">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300"">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">特点说明</label>
					<div class="layui-input-inline">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300"">
					</div>
					<div class="layui-form-mid layui-word-aux">例：无添加、无污染</div>	
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">价格</label>
					<div class="layui-input-inline">
						<input type="text" name="price_min" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
					</div>
					<div class="layui-form-mid layui-word-aux">元</div>	
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">库存</label>
					<div class="layui-input-inline">
						<input type="text" name="price_min" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
					</div>
					<div class="layui-form-mid layui-word-aux">独立库存，与门店无关</div>	
				</div>							
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						完成
						</button>
						<button type="reset" class="layui-btn layui-btn-primary">
						重置
						</button>
					</div>
				</div>
				<div class="laimi-height-20">					
				</div>
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
						$('#laimi-modal').on('click', function() {
									layer.open({
												type: 1,
												title: ['新增商城商品', 'font-size:16px;'],
												btnAlign: 'r',
												area: ['680px', 'auto'],
												shadeClose: true,//点击遮罩关闭
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