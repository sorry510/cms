<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
<style>
.layui-form-item .layui-form-label {width:120px;}
</style>
</head>
<body class="layui-layout-body">
	<object  id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0> 
		<embed id="LODOP_EM" type="application/x-print-lodop" width=0 height=0></embed>
	</object>
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
	<div class="layui-form-item" style="margin-top:20px;">
		<label class="layui-form-label">小票打印</label>
		<div class="layui-input-inline">
			<input type="checkbox" name="sprint_flag" value="1" lay-skin="switch" lay-text="开启|关闭"<?php if($GLOBALS['gprint']['sprint_flag'] == 1) echo ' checked'; ?>>
		</div>
		<div class="layui-form-mid layui-word-aux">
			充值小票、消费小票、买套餐小票
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票打印标题</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-input-300" type="text" name="sprint_title" value="<?php echo htmlspecialchars($GLOBALS['gprint']['sprint_title']); ?>">
		</div>
		<div class="layui-form-mid layui-word-aux">
			例：海底捞东风路分店
		</div>
	</div>	
	<div class="layui-form-item">
		<label class="layui-form-label">小票打印备注</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea" name="sprint_memo" value="" style="width:60%;"><?php echo htmlspecialchars($GLOBALS['gprint']['sprint_memo']); ?></textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票宽度</label>
		<div class="layui-input-inline" >
			<input type="radio" name="sprint_width" value="58" title="58mm" <?php if($GLOBALS['gprint']['sprint_width'] == 58) echo 'checked'; ?>>
			<input type="radio" name="sprint_width" value="88" title="88mm" <?php if($GLOBALS['gprint']['sprint_width'] == 88) echo 'checked'; ?>>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">小票打印机</label>
		<div class="layui-input-inline">
			<select id="laimi-sprint" name="sprint_device">
				<option value="">请选择打印机</option>
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">宽幅打印机</label>
		<div class="layui-input-inline">
			<select id="laimi-wprint" name="wprint_device">
				<option value="">请选择打印机</option>
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block" style="margin-left:135px;">
			<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>确定</button>
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	var LODOP;
	var head = document.head || document.getElementsByTagName("head")[0] || document.documentElement;
	var oscript = document.createElement("script");
	oscript.src ="http://localhost:18000/CLodopfuncs.js?priority=0";
	head.insertBefore( oscript,head.firstChild );
	var isIE = (navigator.userAgent.indexOf('MSIE')>=0) || (navigator.userAgent.indexOf('Trident')>=0);
	window.onload = function() {
		try{ LODOP=getCLodop(); } catch(err) {};
		layui.use(["layer", "element", "form"], function() {
			var $ = layui.jquery;
			var objlayer = layui.layer;
			var objelement = layui.element;
			var objform = layui.form;
			
			var strsprint = "<?php echo htmlspecialchars($GLOBALS['gprint']['sprint_device']); ?>";
			var strwprint = "<?php echo htmlspecialchars($GLOBALS['gprint']['wprint_device']); ?>";
			if(LODOP) {
				var objsprint = document.getElementById("laimi-sprint");
				var objwprint = document.getElementById("laimi-wprint");
				for (var i = 0; i < LODOP.GET_PRINTER_COUNT(); i++) {
					objsprint.options.add(new Option(LODOP.GET_PRINTER_NAME(i), LODOP.GET_PRINTER_NAME(i)));
				}
				$("#laimi-sprint option").each(function() {
					if($(this).val() == strsprint) {
						$(this).attr('selected', true);
					}
				});
				for (var i = 0; i < LODOP.GET_PRINTER_COUNT(); i++) {
					objwprint.options.add(new Option(LODOP.GET_PRINTER_NAME(i), LODOP.GET_PRINTER_NAME(i)));
				}
				$("#laimi-wprint option").each(function() {
					if($(this).val() == strwprint) {
						$(this).attr('selected', true);
					}
				});
			} else {
				objlayer.alert('<a style="color:blue;text-decoration:underline" href="http://www.c-lodop.com/download/CLodop_Setup_for_Win32NT_https_3.028Extend.zip">打印插件未正确安装，请点击安装！</a>', {
					title: '提示信息'
				});
			}
			objform.render("select");
			
			objform.on("submit(laimi-submit)", function(objdata) {
				var objthis = $(this);
			  objthis.attr('disabled', true);
			  $.post("system_print_do.php", objdata.field, function(strdata) {
			    if(strdata == 0) {
			    	objlayer.alert('打印设置成功！', {
							title: '提示信息'
						}, function() {
							window.location.reload();
						});
			    } else {
			      objlayer.alert('修改打印设置失败，请联系管理员！', {
							title: '提示信息'
						});
			    }
			    objthis.attr('disabled', false);
			  });
				return false;
			});
		});
	}
	</script>
</body>
</html>