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
						<a href="#">分销佣金设置</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount-add layui-tab-content">
<form class="layui-form">
<div class="layui-form-item">
	<table id="laimi-agent-money" class="layui-table" style="margin:0px;">
		<thead>
			<tr>
				<th>分类</th>
				<th>商品名称</th>
				<th>价格</th>
				<th width="200">折扣</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="3" style="text-align:left;">
					<div class="layui-input-inline">
						<select name="search" lay-search>
							<option value="0">请选择商品分类</option>
							<?php foreach($this->_data['wgoods_catalog'] as $row) { ?>
              <option value="<?php echo $row['wgoods_catalog_id']; ?>"><?php echo $row['wgoods_catalog_name']; ?></option>
            	<?php } ?>
						</select>
					</div>
					<div class="layui-inline">
			     	<button type="button" class="laimi-search layui-btn layui-btn-small layui-btn-normal">搜索</button>
			  	</div>
				</th>
				<th>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-60-32" type="text" name="allwgoods_discount" placeholder="折">
					</div>
					<div class="layui-inline">
			     	<button type="button" class="laimi-allset1 layui-btn layui-btn-small layui-btn-normal" lay-submit="" lay-filter="demo1">批量设置</button>
			  	</div>
				</th>
			</tr>
			<?php foreach($this->_data['wgoods_catalog'] as $row) { ?>
				<?php foreach($this->_data['wgoods'] as $row2) { 
         if ($row['wgoods_catalog_id'] == $row2['wgoods_catalog_id']) {
      	?>
			<tr class="laimi-wgoods laimi-use1" wgoods_catalog_id="<?php echo $row['wgoods_catalog_id'];?>" wgoods_id="<?php echo $row2['wgoods_id'];?>" wgoods_price="<?php echo $row2['wgoods_price'];?>">
				<td><?php echo $row['wgoods_catalog_name'];?></td>
				<td style="text-align: left;"><?php echo $row2['wgoods_name'];?></td>
				<td>￥<?php echo $row2['wgoods_price'];?></td>
				<td style="padding:5px">
					<div class="layui-inline">
						<input class="layui-input laimi-input-60-32" type="text" name="txtgoods_discount[]" placeholder="折" wgoods_id="<?php echo $row2['wgoods_id'];?>" wgoods_price="<?php echo $row2['wgoods_price'];?>">
					</div>
					<div class="layui-inline">
						<input class="layui-input laimi-input-60-32" type="text" name="txtgoods_price[]" placeholder="￥" wgoods_id="<?php echo $row2['wgoods_id'];?>" wgoods_price="<?php echo $row2['wgoods_price'];?>">
					</div>
					<div class="layui-inline">元</div>		
				</td>
			</tr>
				<?php }
        } ?>
      <?php } ?>
		</tbody>
	</table>
</div>
<div class="layui-form-item">
	<div class="layui-input-block laimi-float-right">
	  <button type="button" class="layui-btn laimi-button-100 laimi-submitadd">
	  	完成
	  </button>
	  <button class="layui-btn layui-btn-primary" type="reset">
	  	重置
	  </button>
	</div>
</div>				
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this -> fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
		$(function () {
			var res = <?php echo $this->_data['goods'];?>;
			for (var i = 0; i < res.length; i++) {
	      if (res[i].wgoods_reward != '0.00') {
	        $("#laimi-agent-money input[name='txtgoods_price[]']").each(function() {
	          if ($(this).attr('wgoods_id') == res[i].wgoods_id) {
	            if (res[i].wgoods_reward != '') {
	              $(this).val(res[i].wgoods_reward);
	            }
	          }
	        })
	      }
	    }
		})
		//添加操作JS
		$('.laimi-submitadd').on('click',function(){
		  $('.laimi-submitadd').attr("disabled",true);
		  var url="wechat_shop_agent_money_do.php";
		  var arr1 = [];
		  $("#laimi-agent-money .laimi-wgoods").each(function(){
		    if ($(this).find("input[name='txtgoods_discount[]']").val() != '' && $(this).find("input[name='txtgoods_price[]']").val() !='') {
		      var json = {'wgoods_catalog_id':$(this).attr('wgoods_catalog_id'),'wgoods_id':$(this).attr('wgoods_id'),'value':$(this).find("input[name='txtgoods_discount[]']").val(),'price':$(this).find("input[name='txtgoods_price[]']").val()};
		    	arr1.push(json);
		    }  
		  });
		  var data = {
	      arr1:arr1
		  }
		  console.log(data);
		  $.post(url,data,function(res){
		    if(res=='0'){
		      //window.location="wechat_shop_agent_money.php";
		    }else{
		      $('.laimi-submitadd').attr("disabled",false);
		      alert('修改失败');
		      console.log(res);
		    }
		  });
		});
		//搜索分类JS
		$('.laimi-search').on('click',function(){
		  $('#laimi-agent-money .laimi-wgoods').each(function () {
		  	$(this).addClass('layui-hide');
		  	$(this).removeClass('laimi-use1');
		    if($("#laimi-agent-money select[name='search']").val() == '0') {
		      $(this).removeClass('layui-hide');
		      $(this).addClass('laimi-use1');
		    }else{
		      if ($("#laimi-agent-money select[name='search']").val() == $(this).attr('wgoods_catalog_id')) {
		      	$(this).removeClass('layui-hide');
		      	$(this).addClass('laimi-use1');
		      }
		    } 
		  }) 
		});
		//批量设置商品js
		$('#laimi-agent-money .laimi-allset1').on('click',function () {
		  var value = Number($("#laimi-agent-money input[name='allwgoods_discount']").val());
	  	$("#laimi-agent-money .laimi-use1").each(function () {
	      if (value>0) {
	        $(this).find("input[name='txtgoods_discount[]']").val(value);
	        var value2 = Number($(this).attr('wgoods_price'));
	        var k = value * value2 / 10;
	        k = k.toFixed(2);
	        $(this).find("input[name='txtgoods_price[]']").val(k);
	      }
		  })
		})
		//设置单个价格折扣js
		$("[id*='laimi-agent-money'] input[name='txtgoods_discount[]']").on("input propertychange", function () {
		  if (isNaN($(this).val())) {
		    $(this).val(''); $(this).parent().siblings("div").find("input").val('');
		  }else{
		    var value = Number($(this).val());
		    var k = Number($(this).attr('wgoods_price')) * value / 10;
		    k = k.toFixed(2);
		    $(this).parent().siblings("div").find("input").val(k);
		  }
		  if ($(this).val()=='') {$(this).parent().siblings("div").find("input").val('');}
		})
		$("[id*='laimi-agent-money'] input[name='txtgoods_price[]']").on("input propertychange",function () {
		  if (isNaN($(this).val())) {
		    $(this).val(''); $(this).parent().siblings("div").find("input").val('');
		  }else{
		    var price = Number($(this).val());
		    var value = price / Number($(this).attr('wgoods_price')) * 10;
		    value = value.toFixed(2);
		    $(this).parent().siblings("div").find("input").val(value);
		  }
		  if ($(this).val()=='') {$(this).parent().siblings("div").find("input").val('');}
		})
	});
	</script>
</body>
</html>