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
						<a href="mcombo2.php">计时套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mcombo2 layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">套餐</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200 laimi-focus" type="text" name="key" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>" placeholder="套餐名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>套餐名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>有效期</th>
			<th>活动</th>
			<th>状态</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['mcombo_list']['list'] as $row) { ?>
		<tr>
			<td><a href="#" class="laimi-color-lan laimi-info" myid="<?php echo $row['mcombo_id'];?>"><?php echo $row['mcombo_name']; ?></a></td>
			<td><?php echo $row['mcombo_code']; ?></td>
			<td>￥<?php echo $row['mcombo_price'] + 0; ?></td>
			<td><?php echo $row['mycprice']; ?></td>
			<td><?php echo $row['mcombo_limit_days']; ?>天</td>
			<td><?php echo $row['myact']; ?></td>
			<td><?php echo $row['mystate']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div>
		</div>
	</div>
	<!--电子档案明细弹出层开始-->
	<script type="text/html" id="laimi-info">
	<div id="laimi-modal-info" class="laimi-modal">
		<div class="layui-row">   
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐名称</label>
			    <div class="layui-form-mid layui-word-aux laimi-name"></div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐编码</label>
			    <div class="layui-form-mid layui-word-aux laimi-code"></div>
			  </div>
	    </div>
	     <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">有效期</label>
			    <div class="layui-form-mid layui-word-aux laimi-youxiaoqi"></div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐价格</label>
			    <div class="layui-form-mid layui-word-aux laimi-price"></div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-form-mid layui-word-aux laimi-cprice"></div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">参于活动</label>
			    <div class="layui-form-mid layui-word-aux laimi-act"></div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐状态</label>
			    <div class="layui-form-mid layui-word-aux laimi-state"></div>
			  </div>
	    </div>
	    <div class="layui-col-md12">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐内容</label>
			    <div class="layui-form-mid layui-word-aux laimi-input-b80">
			    	<table class="layui-table">
						  <thead>
						    <tr>
						      <th>商品</th>
						      <th>价格</th>
						    </tr> 
						  </thead>
						  <tbody id="laimi-mgoods">

						  </tbody>
						</table>
			    </div>
			  </div>
	    </div>
	  </div>
	</div>
	</script>
<!--电子档案明细弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;

		$('.laimi-focus').focus();
		
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['mcombo_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['mcombo_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "mcombo2.php?<?php echo api_value_query($this->_data['request']);?>&page=" + obj.curr;
				}
			}
		});
		$(".laimi-info").on("click", function() {
			var id = $(this).attr('myid');
			objlayer.open({
				type: 1,
				title: ["计次套餐", "font-size:16px;"],
				btnAlign: "r",
				offset: 'rt',
				anim: 0,
				area: ["800px", "100%"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-info").html(),
				success: function(){
					var url = 'mcombo_ajax2.php';
			    $.getJSON(url,{id:id},function(res){
			    	console.log(res);
			      $("#laimi-modal-info .laimi-code").text(res.mcombo_code);
			      $("#laimi-modal-info .laimi-name").text(res.mcombo_name);
			      if (res.mcombo_limit_days == 0) {
			      	$("#laimi-modal-info .laimi-youxiaoqi").text('永久');
			      }else{
			      	$("#laimi-modal-info .laimi-youxiaoqi").text(res.mcombo_limit_days+'天');
			      }
			      $("#laimi-modal-info .laimi-price").text('¥'+res.mcombo_price);
			      if (res.mcombo_cprice == 0) {
			      	$("#laimi-modal-info .laimi-cprice").text('--');
			      }else{
			      	$("#laimi-modal-info .laimi-cprice").text('¥'+res.mcombo_cprice);
			      }
			      if (res.mcombo_act == 1) {
			      	$("#laimi-modal-info .laimi-act").append('<i class="layui-icon laimi-icon-dui ">&#x1005</i>');
			      }else{
			      	$("#laimi-modal-info .laimi-act").append('<i class="layui-icon laimi-icon-dui ">&#x1007</i>');
			      }
			      if (res.mcombo_state == 1) {
			      	$("#laimi-modal-info .laimi-state").text('正常');
			      }else{
			      	$("#laimi-modal-info .laimi-state").text('停用');
			      }
			      
			      for (var i = 0; i < res.mgoods.length; i++){
			      	$("#laimi-mgoods").append('<tr><td>'+res.mgoods[i].mgoods_name+'</td><td>￥'+res.mgoods[i].mgoods_price+'</td></tr>')
			      }
			    });
				}
			});
		});
	});
	</script>
</body>
</html>