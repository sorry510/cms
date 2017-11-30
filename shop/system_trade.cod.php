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
						<a href="system_trade.php">打印设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-trade layui-tab-content">
<form class="layui-form">
	<div class="laimi-height-20"></div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票打印</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="print_flag" value="1" lay-skin="switch" lay-text="开启|关闭" <?php if($this->_data['shop_config']['print_flag']==1){echo 'checked';} ?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			充值小票、消费小票、买套餐小票
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">打印标题</label>
		<div class="layui-input-inline">
			<input type="text" name="print_title" value="<?php echo $this->_data['shop_config']['print_title'];?>" lay-verify="required" class="layui-input laimi-input-300">
		</div>
		<div class="layui-form-mid layui-word-aux">
			例：海底捞东风路分店
		</div>
	</div>	
	<div class="layui-form-item">
		<label class="layui-form-label">打印备注1</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea" name="print_memo" value="" style="width:60%;"><?php echo $this->_data['shop_config']['print_memo'];?></textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票宽度</label>
		<div class="layui-input-inline" >
			<input type="radio" name="print_width" value="1" title="58mm" <?php if($this->_data['shop_config']['print_width']==1){echo 'checked';} ?>>
			<input type="radio" name="print_width" value="2" title="88mm" <?php if($this->_data['shop_config']['print_width']==2){echo 'checked';} ?>>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">打印机</label>
		<div class="layui-input-inline">
			<select id="mySelect" name="print_device">
				<option value="">指定打印机</option>
				
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>确定</button>
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="../js/LodopFuncs.js"></script>
	<script>
	window.onload = function(){
		layui.use(["element", "form"], function() {
			var $ = layui.jquery;
			var objlayer = layui.layer;
			var objelement = layui.element;
			var objform = layui.form;
			//获取打印机名称，参考文档http://www.lodop.net/demolist/PrintSample7.html
			var LODOP = getLodop();
			var objselect = document.getElementById('mySelect');
			for (var i = 0; i < LODOP.GET_PRINTER_COUNT(); i++) {
				objselect.options.add(new Option(LODOP.GET_PRINTER_NAME(i),LODOP.GET_PRINTER_NAME(i)));
			}
			$("#mySelect option").each(function(){
				if ($(this).val() == '<?php echo $this->_data['shop_config']['print_device'];?>') {
					$(this).attr('selected',true);
				}
			})
			objform.render();
			
			objform.on("submit(laimi-submit)", function(data) {
				console.log(data.field);
				var _self = $(this);
			  _self.attr('disabled',true);
			  var url="system_trade_add_do.php";
			  $.post(url,data.field,function(res){
			    if(res=='0'){
			    	window.location="system_trade.php";
			    }else{
			      alert('设置失败');
			      console.log(res);
			      _self.attr("disabled",false);
			    }
			  });
				return false;
			});
		});
	};
	</script>
</body>
</html>