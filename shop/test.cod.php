<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body">

	<!--新增体验券弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		$.ajax({
			url: 'http://test.axin.cc/manager/card_edit_ajax.php',
			data: {
				id: 33
			},
			method: 'GET',
			success: function(rs){
				console.log(rs);
			},
			error: function(e){
				console.log(e);
			}
		})
		// $.getJSON('http://test.axin.cc/manager/card_edit_ajax.php', {id:'33'}, function(res){
		// 	console.log(2);
		// 	console.log(res);
		// }, function(error){
		// 	console.log(error);
		// })
	});
	</script>
</body>
</html>