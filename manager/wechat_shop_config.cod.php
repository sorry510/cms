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
						<li class="layui-this">微商城设置</li>
					</ul>
					<div class="layui-tab-content">
						<form class="layui-form" action="">
							<div class="laimi-height-20"></div>
							<div class="layui-form-item">
								<label class="layui-form-label">微商城</label>
								<div class="layui-input-inline">
									<input type="checkbox" name="txtwshop_flag" lay-skin="switch" lay-text="开启|关闭" value="1" <?php if($this->_data['system_config_wshop']['wshop_flag'] == 1) echo 'checked';?>>
								</div>
								<div class="layui-form-mid layui-word-aux">
									开启或关闭微商城
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">在线支付</label>
								<div class="layui-input-inline">
									<input type="checkbox" name="txtpay_flag" lay-skin="switch" lay-text="开启|关闭" value="1" <?php if($this->_data['system_config_wpay']['pay_flag'] == 1) echo 'checked';?>>
								</div>
								<div class="layui-form-mid layui-word-aux">
									支付配置：<a href="#" class="laimi-font3">微信支付配置</a> | <a href="#" class="laimi-font3">支付宝支付配置</a>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">发货方式</label>
								<div class="layui-input-inline">
									<input type="radio" name="txtsend_method" value="1" title="快递" <?php if($this->_data['system_config_wshop']['send_method'] == 1) echo 'checked';?>>
									<input type="radio" name="txtsend_method" value="2" title="到店自取" <?php if($this->_data['system_config_wshop']['send_method'] == 2) echo 'checked';?>>
									<input type="radio" name="txtsend_method" value="3" title="用户自主选择" <?php if($this->_data['system_config_wshop']['send_method'] == 3) echo 'checked';?>>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">商城发货</label>
								<div class="layui-input-inline">
									<input type="radio" name="txtsend_from" value="1" title="总店发货" <?php if($this->_data['system_config_wshop']['send_from'] == 1) echo 'checked';?>>
									<input type="radio" name="txtsend_from" value="2" title="分店发货" <?php if($this->_data['system_config_wshop']['send_from'] == 2) echo 'checked';?>>
								</div>
								<div class="layui-form-mid layui-word-aux">
									总店发货：全部订单总店发货。分店发货：按会员开卡店铺发货，没有开卡店铺的总店发
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">分销功能</label>
								<div class="layui-input-inline">
									<input type="radio" name="txtfenxiao_flag" value="2" title="关闭" <?php if($this->_data['system_config_wshop']['fenxiao_flag'] == 2) echo 'checked';?>>
									<input type="radio" name="txtfenxiao_flag" value="1" title="1级分销" <?php if($this->_data['system_config_wshop']['fenxiao_flag'] == 1) echo 'checked';?>>
								</div>
								<div class="layui-form-mid layui-word-aux">
									开启后请到“分销佣金”栏目中配置分销佣金
								</div>
							</div>
							<div class="layui-form-item">
								<div class="layui-input-block laimi-input-100">
									<button class="layui-btn laimi-button-100" lay-submit lay-filter="laimi-submit">
										确定
									</button>
								</div>
							</div>
						</form>						
					</div>
				</div>
			</div>
		</div>
		<?php echo $this -> fun_fetch('inc_foot', ''); ?>
		<script>layui.use(['form', 'layedit', 'laydate','element'], function() {
			var $ = layui.jquery;
			var objelement = layui.element;
			var objform = layui.form;
			var objlayer = layui.layer;
			//监听提交
			objform.on('submit(demo1)', function(data){
				objlayer.alert(JSON.stringify(data.field), {
					title: '最终的提交信息'
				})
				return false;
			});
			objform.on("submit(laimi-submit)", function(data) {
				$.post('wechat_shop_config_do.php', data.field, function(res){
					if(res == 0){
						window.location.reload();
					}else{
						console.log(res);
						objlayer.alert('修改失败，请联系管理员', {
							title: "提示信息"
						});
					}
				})
				return false;
			});
		});
		</script>
	</body>
</html>