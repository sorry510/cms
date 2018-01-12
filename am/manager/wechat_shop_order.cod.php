<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
<style type="text/css">
	.layui-layer.layui-layer-page .layui-layer-content{overflow: auto;}
</style>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="<?php if ($this->_data['request']['expire'] == 0) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_order.php">全部商城订单</a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] == 1) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_order.php?expire=1">未发货订单<span class="layui-badge layui-bg-orange"><?php echo $this->_data['no_send']['mycount'];?></span></a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] == 2) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_order.php?expire=2">等待自取订单<span class="layui-badge layui-bg-orange"><?php echo $this->_data['wait_self']['mycount'];?></span></a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] == 3) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_order.php?expire=3">已完成订单</a>
					</li>					
					<li class="<?php if ($this->_data['request']['expire'] == 4) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_order.php?expire=4">已退款订单</a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] == 5) {
						echo 'layui-this';
					};?>">
						<a href="wechat_shop_order.php?expire=5">异常订单<span class="layui-badge"><?php echo $this->_data['unnormal']['mycount'];?></span></a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">						
		<label class="layui-form-label laimi-input">搜索</label>
		<div class="layui-input-inline">
			<input type="text" name="search" placeholder="手机号、姓名" class="layui-input" value="<?php echo $this->_data['request']['search'];?>">
			<input type="hidden" name="expire" placeholder="手机号、姓名" class="layui-input" value="<?php echo $this->_data['request']['expire'];?>">
		</div>
		<label class="layui-form-label">订单日期</label>
	    <div class="layui-input-inline">
	      <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['from'];?>">
	    </div>
	    <label class="layui-form-label">至</label>
	    <div class="layui-input-inline last">
	      <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['to'];?>">
	    </div>
		<div class="layui-inline">
	     	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
	  	</div>	
	</div>
</form>
	<table class="layui-table">
		<thead>
			<tr>
				<th>下单时间</th>
				<th>会员类型</th>
				<th>会员姓名</th>
				<th>手机号码</th>
				<th>购买金额</th>
				<th>付款方式</th>
				<th>发货方式</th>
				<th>分销用户</th>
				<th>订单状态</th>
				<th>发货状态</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->_data['worder_list']['list'] as $row) { ?>
			<td><?php echo date('Y-m-d H:i',$row['worder_atime']);?></td>
				<td><span class="layui-btn layui-btn-mini <?php if ($row['c_card_type_name']!='') {
					echo 'layui-btn-warm';
				}?>"><?php echo $row['c_card_type_name']==''?'暂无类型':$row['c_card_type_name']; ?></span></td>
				<td><?php echo $row['c_card_name'];?></td>
				<td><?php echo $row['c_card_phone'];?></td>
				<td>¥<?php echo $row['worder_money'];?></td>
				<td><?php echo $row['pay'];?></td>
				<td><?php echo $row['get'];?></td>
				<td class="laimi-color-ju"><?php echo $row['c_parent_card_name']==''?'无':$row['c_parent_card_name'].'(¥'.$row['s_worder_reward'].')'; ?></td>
				<td style="color: #FF5722;"><?php echo $row['state'];?></td>
				<td><button type="button" card_id="<?php echo $row['card_id'];?>" value="<?php echo $row['worder_id'];?>" class="laimi-add layui-btn layui-btn-norma layui-btn-small" style="color: #FFFFFF">订单详情</button></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!--新增分店弹出层开始-->
<script type="text/html" id="laimi-add">
	<div id="laimi-modal-add" style="padding: 20px;">
		<form class="layui-form" action="">
		  <div class="layui-row">
		    <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">会员卡号</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-code"></div>
				</div>
		    </div>
		    <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">会员姓名</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-name"></div>
				</div>
		    </div>
		    <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">手机号码</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-phone"></div>
				</div>
		    </div>
		    <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">购买金额</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-money" style="color: #FF5722;"></div>
				</div>
		    </div>
		    <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">支付方式</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-pay"></div>
				</div>
		    </div>
		    <div class="layui-col-md4">
	      	<label class="layui-form-label laimi-font1">发货方式</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid laimi-get"></div>
					</div>
		    </div>
		    <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">分销佣金</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid laimi-color-ju laimi-reward"></div>
					</div>
		    </div>
		    <div class="layui-col-md6">
		      <label class="layui-form-label laimi-font1">分销用户</label>
					<div class="layui-input-inline">
						<div class="layui-form-mid laimi-color-ju laimi-parent-name"></div>
					</div>
		    </div>
		    <div class="layui-col-md12">
		      <label class="layui-form-label laimi-font1">收货地址</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-address"></div>
				</div>
		    </div>
		  </div>
		  <div class="layui-col-md4">
		      <label class="layui-form-label laimi-font1">发货状态</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-state"></div>
				</div>
		  </div>
		  <div class="layui-col-md4">
      <label class="layui-form-label laimi-font1">快递公司</label>
			<div class="layui-input-inline">
				<div class="layui-form-mid laimi-order-company"></div>
			</div>
		  </div>
	    <div class="layui-col-md4">
	      <label class="layui-form-label laimi-font1">单号</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-order-code"></div>
				</div>
	    </div>
	    <div class="layui-col-md4">
	      <label class="layui-form-label laimi-font1">发货时间</label>
				<div class="layui-input-inline">
					<div class="layui-form-mid laimi-send-time"></div>
				</div>
	    </div>	    
		  <table class="layui-table" style="width: 90%;margin-left: 40px;">
			  <thead>
			    <tr>
			      <th>商品名称</th>
			      <th>数量</th>
			      <th>单价</th>
			    </tr> 
			  </thead>
			  <tbody id="laimi-wgoods">
			  </tbody>
			</table>		  			  			  
			<div class="layui-row laimi-float-right " style="margin-right: 60px;">合计：<span class="laimi-money" style="font-size:20px;color: #FF5722;"></span>
			</div>	
			<div class="laimi-height-20"></div>		
			<div class="layui-form-item">
				<div class="layui-input-block laimi-buttom-20">
					<button id="laimi-fahuo" type="button" class="layui-btn laimi-button-100 laimi-add2">发货</button>
					<button id="laimi-tuikuan" type="button" class="layui-btn laimi-button-100">
					退款
					</button>
					<button id="laimi-cancel" type="button" class="layui-btn laimi-button-100">
					取消订单
					</button>
				</div>
			</div>
		</form>
	</div>
</script>
<!--弹出层结束-->
<!--弹出层开始-->
<div id="laimi-modal-add2" style="display: none;padding: 20px;max-height:500px;">
	<form class="layui-form" action="">
		<div class="layui-form-item">
			<label class="layui-form-label">快递公司</label>
			<div class="layui-input-inline">
				<input class="layui-input laimi-input-100 laimi-express-company" type="text" name="txtworder_express_company" lay-verify="required">
			</div>
			<div class="layui-input-inline">
				<select name="laimi-kuaidi" class="laimi-kuaidi" lay-filter="laimi-kuaidi" lay-verify="required">
					<option value="">请选择快递公司</option>
					<option value="申通快递">申通快递</option>
					<option value="中通快递">中通快递</option>
					<option value="顺丰快递">顺丰快递</option>
					<option value="圆通快递">圆通快递</option>
					<option value="汇通快递">汇通快递</option>
					<option value="韵达快递">韵达快递</option>
					<option value="EMS快递">EMS快递</option>
					<option value="德邦快递">德邦快递</option>
					<option value="宅急送快递">宅急送快递</option>
					<option value="优速快递">优速快递</option>
					<option value="全峰快递">全峰快递</option>
					<option value="京东快递">京东快递</option>
					<option value="天天快递">天天快递</option>
				</select>
			</div>
		</div>			
		<div class="layui-form-item">
			<label class="layui-form-label">快递单号</label>
			<div class="layui-input-block">
			  <input name="txtworder_express_code" class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
			  <button class="layui-btn laimi-button-100 laimi-done" lay-filter="laimi-submit" lay-submit>
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
<!--消息弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "upload", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['worder_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['worder_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});		
		$(".laimi-add").on("click", function() {
			var url="wechat_shop_order_ajax.php";
	    var data1 = $(this).val();
	    var data2 = $(this).attr('card_id');
	    var data = {
	    	card_id:data2,
	    	worder_id:data1
	    }
			objlayer.open({
				type: 1,
				title: ["订单详情", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html(),
				success: function(){
			    $.getJSON(url,data,function(res){
			    	if (res.card_code == '') {
			    		$("#laimi-modal-add .laimi-code").text('暂无卡号');
			    	}else if(res.card_code != '' && res.c_card_type_name !=''){
			    		$("#laimi-modal-add .laimi-code").text(res.card_code +'（'+res.c_card_type_name+'）');
			    	}else if (res.card_code != '' && res.c_card_type_name =='') {
			    		$("#laimi-modal-add .laimi-code").text(res.card_code);
			    	}
			      $("#laimi-modal-add .laimi-name").text(res.c_card_name);
			      $("#laimi-modal-add .laimi-phone").text(res.c_card_phone);
			      $("#laimi-modal-add .laimi-money").text('¥'+res.worder_money+'元');
			      $("#laimi-modal-add .laimi-pay").text(res.pay);
			      $("#laimi-modal-add .laimi-get").text(res.get);
			      if (res.c_parent_card_name == '') {
			      	$("#laimi-modal-add .laimi-parent-name").text('--');
			      }else{
			      	$("#laimi-modal-add .laimi-parent-name").text(res.c_parent_card_name+'('+res.c_parent_card_phone+')');
			      }
			      if (res.s_worder_reward == 0) {
			      	$("#laimi-modal-add .laimi-reward").text('--');
			      }else{
			      	$("#laimi-modal-add .laimi-reward").text(res.s_worder_reward);
			      }
			      $("#laimi-modal-add .laimi-address").text(res.worder_address_detail+'，'+res.worder_address_name+'，'+res.worder_address_phone);
			      $("#laimi-modal-add .laimi-state").text(res.state);
			      $("#laimi-modal-add .laimi-order-company").text(res.order_company);
			      $("#laimi-modal-add .laimi-order-code").text(res.order_code);
			      $("#laimi-modal-add .laimi-send-time").text(res.send_time);
			      for (var i = 0; i < res.wgoods.length; i++){
			      	$("#laimi-wgoods").append('<tr><td style="text-align:left;">'+res.wgoods[i].c_wgoods_name+'</td><td>'+res.wgoods[i].worder_goods_count+'</td><td>￥'+res.wgoods[i].worder_goods_price+'</td></tr>')
			      }
			      $("#laimi-fahuo").attr('worder_id',res.worder_id);
			      $("#laimi-tuikuan").attr('worder_id',res.worder_id);
			      $("#laimi-cancel").attr('worder_id',res.worder_id);
			      if (res.worder_state != 1 || res.worder_get !=2) {
			      	$("#laimi-fahuo").remove();
			      }
			      if (res.worder_state != 1) {
			      	$("#laimi-tuikuan").remove();
			      }
			      if (res.worder_state != 1) {
			      	$("#laimi-cancel").remove();
			      }
			    });
				}
			});
		});
		$(document).on("click",".laimi-add2",function() {
			var worder_id = $(this).attr('worder_id');
			objlayer.open({
				type: 1,
				title: ["发货", "font-size:16px;"],
				btnAlign: "r",
				area: ["480px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-add2")
			});
			objform.on('select(laimi-kuaidi)', function(data){
			  $(".laimi-express-company").val(data.value);
			});
			$(".laimi-done").attr('worder_id',worder_id);
		});
		//询问框
		$(document).on("click","#laimi-tuikuan", function() {
			var id = $(this).attr('worder_id');
			layer.confirm('全部退款吗？', {
		  	btn: ['确定退款','取消'] //按钮
		  },function(){
		  	$.post('wechat_shop_order_tuikuan_do.php', {worder_id:id}, function(res){
			  	if(res == 0 || res == 3){
			  		window.location.reload();
			  	}else{
			  		console.log(res);
			  		objlayer.alert('退款失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
		  });
		});
		//询问框
		$(document).on("click","#laimi-cancel", function() {
			var id = $(this).attr('worder_id');
			layer.confirm('确定取消吗？', {
		  	btn: ['确定取消','取消'] //按钮
		  },function(){
		  	$.post('wechat_shop_order_cancel_do.php', {worder_id:id}, function(res){
			  	if(res == 0 || res == 3){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('取消失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
		  });
		});
		objform.on("submit(laimi-submit)", function(data) {
			var _self = $(this);
		  _self.attr('disabled',true);
		  var url="wechat_shop_order_fahuo_do.php";
		  data.field.worder_id = $(this).attr('worder_id');
		  console.log(data.field);
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		      window.location.href='wechat_shop_order.php';
		    }else if(res=='1'){
		      objlayer.alert("缺少必填项",{
			  		title: '提示信息'
			  	});
		      _self.attr('disabled',false);
		    }else{
		      objlayer.alert("发货失败",{
		  			title: '提示信息'
		  		});
		    }
		  });
			return false;
		});
	});
	</script>
	</body>
</html>