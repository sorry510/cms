<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body">
<input type="text" class="code">
<button type="button" class="btn">提交</button>

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
		var barpay = null;
		// var ddd = '{"code":"10000","msg":"Success","buyer_logon_id":"152****0156","buyer_pay_amount":"0.01","buyer_user_id":"2088412034997544","fund_bill_list":{"0":{"amount":"0.01","fund_channel":"COUPON"}},"gmt_payment":"2017-12-19 16:25:43","invoice_amount":"0.00","out_trade_no":"01513672003","point_amount":"0.01","receipt_amount":"0.01","total_amount":"0.01","trade_no":"2017121921001004540203446559"}';
		// console.log(ddd.msg);
		$('.btn').on('click', function(){
			var auth_code = $('.code').val();
			var data = {
				out_trade_no: '<?php echo api_value_int0($GLOBALS['_SESSION']['login_id']).time();?>',
				total_amount: 0.01,
				auth_code: auth_code
			};
			// $.when(ali_pay(data))
			// 	.then(function(){
			// 		console.log(barpay);
			// 		var data = {};
			// 		data.out_trade_no = barpay.out_trade_no;
			// 		data.money2 = barpay.buyer_pay_amount;
			// 		console.log(data);
			// 		$.post('test2.php', data, function(res){
			// 			if(res == 0){
			// 				alert('成功了');
			// 				window.location.reload();
			// 			}
			// 		});
			// 	})
			$.ajax({
				url: '../paysdk/ali_pay/dangmianfu/f2fpay/barpay_test.php',
				data: data,
				method: 'POST',
				dataType: 'json',
				success: function(barpay){
					var data = {};
					if(barpay.code == '10000' && barpay.msg == 'Success'){
						data.out_trade_no = barpay.out_trade_no;
						data.money2 = barpay.buyer_pay_amount;
						console.log(data);
						$.post('test2.php', data, function(res){
							if(res == 0){
								alert('成功了');
								window.location.reload();
							}
						});
					}
				},
				error: function(e){
					console.log(e);
				}
			})
		})
		function ali_pay(data){
			return $.post('../paysdk/ali_pay/dangmianfu/f2fpay/barpay_test.php', data, function(barpay){
				barpay = barpay;
			})
		}
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