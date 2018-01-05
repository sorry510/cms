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
					<li>
						<a href="wact_discount.php">限时打折</a>
					</li>
					<li class="layui-this">
						<a href="wact_discount_edit.php">修改打折活动</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount-add layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label">活动名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname" value="<?php echo $this->_data['edit']['wact_discount_name'];?>">
					<input class="layui-input laimi-input-300" type="hidden" name="txtid" value="<?php echo $this->_data['edit']['wact_discount_id'];?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">开始时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from" class="layui-input" type="text" name="txtstart" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['edit']['wact_discount_start'];?>">
				</div>
				<div class="layui-form-mid layui-word-aux">
					当天0点开始活动
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">结束时间</label>
				<div class="layui-input-inline">
					<input id="laimi-to" class="layui-input" type="text" name="txtend" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['edit']['wact_discount_end'];?>">
				</div>
				<div class="layui-form-mid layui-word-aux">
					当天12点结束活动
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" name="txtmemo"><?php echo $this->_data['edit']['wact_discount_memo'];?></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100 laimi-submitadd" lay-filter="laimi-submit" lay-submit>
					确认
					</button>
					<button type="reset" class="layui-btn layui-btn-primary">
					重置
					</button>
				</div>
			</div>															
		</div>
		<div class="layui-col-xs6">
			<div class="layui-tab">
				<ul class="layui-tab-title">
					<li class="layui-this">
						可选商品
					</li>
				</ul>
				<div class="layui-tab-content" style="padding:0;">
					<div class="layui-tab-item layui-show" style="overflow-y:auto; height:400px;">
						<table id="laimi-discount" class="layui-table" style="margin:0px;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th>价格</th>
									<th width="150">折扣</th>
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
				</div>
			</div>
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
	      if (res[i].wact_discount_goods_value != '0.0') {
	        $("#laimi-discount input[name='txtgoods_discount[]']").each(function() {
	          if ($(this).attr('wgoods_id') == res[i].wgoods_id) {
	            $(this).val(res[i].wact_discount_goods_value);
	          }
	        })
	      }
	      if (res[i].wact_discount_goods_price != '0.00') {
	        $("#laimi-discount input[name='txtgoods_price[]']").each(function() {
	          if ($(this).attr('wgoods_id') == res[i].wgoods_id) {
	            if (res[i].wact_discount_goods_price != '') {
	              $(this).val(res[i].wact_discount_goods_price);
	            }
	          }
	        })
	      }
	    }
		})
		//添加操作JS
		$('.laimi-submitadd').on('click',function(){
		  $('.laimi-submitadd').attr("disabled",true);
		  var url="wact_discount_edit_do.php";
		  var arr1 = [];
		  var arr2 = [];
		  $("#laimi-discount .laimi-wgoods").each(function(){
		    if ($(this).find("input[name='txtgoods_discount[]']").val() != '' && $(this).find("input[name='txtgoods_price[]']").val() !='') {
		      var json = {'wgoods_catalog_id':$(this).attr('wgoods_catalog_id'),'wgoods_id':$(this).attr('wgoods_id'),'value':$(this).find("input[name='txtgoods_discount[]']").val(),'price':$(this).find("input[name='txtgoods_price[]']").val()};
		    arr1.push(json);
		    }  
		  });

		  if (arr1.length == 0) {
		    alert('折扣商品或套餐不能为空');
		    $('.laimi-submitadd').attr("disabled",false);
		    return false;
		  }

		  var id = $(".layui-form input[name='txtid']").val();
		  var name = $(".layui-form input[name='txtname']").val();
		  var client = $(".layui-form input[name='txtclient']:checked").val();
		  var start = $(".layui-form input[name='txtstart']").val();
		  var end = $(".layui-form input[name='txtend']").val();
		  var memo = $(".layui-form textarea[name='txtmemo']").val();
		  var data = {
		  		id:id,
		      name:name,
		      client:client,
		      start:start,
		      end:end,
		      memo:memo,
		      arr1:arr1
		  }
		  console.log(data);
		  $.post(url,data,function(res){
		    if(res=='0'){
		      window.location="wact_discount.php";
		    }else if(res=='100'){
		      alert('活动结束时间必须大于当前时间');
		      $('.laimi-submitadd').attr("disabled",false);
		    }else if(res=='1'){
		      alert('请完善数据');
		      $('.laimi-submitadd').attr("disabled",false);
		    }else{
		      $('.laimi-submitadd').attr("disabled",false);
		      alert('修改失败');
		      console.log(res);
		    }
		  });
		});
		//搜索分类JS
		$('.laimi-search').on('click',function(){
		  $('#laimi-discount .laimi-wgoods').each(function () {
		  	$(this).addClass('layui-hide');
		  	$(this).removeClass('laimi-use1');
		    if($("#laimi-discount select[name='search']").val() == '0') {
		      $(this).removeClass('layui-hide');
		      $(this).addClass('laimi-use1');
		    }else{
		      if ($("#laimi-discount select[name='search']").val() == $(this).attr('wgoods_catalog_id')) {
		      	$(this).removeClass('layui-hide');
		      	$(this).addClass('laimi-use1');
		      }
		    } 
		  }) 
		});
		//批量设置商品js
		$('#laimi-discount .laimi-allset1').on('click',function () {
		  var value = Number($("#laimi-discount input[name='allwgoods_discount']").val());
	  	$("#laimi-discount .laimi-use1").each(function () {
	      if (value>0) {
	      	console.log($(this).find("input[name='txtgoods_discount[]']"));
	        $(this).find("input[name='txtgoods_discount[]']").val(value);
	        var value2 = Number($(this).attr('wgoods_price'));
	        var k = value * value2 / 10;
	        k = k.toFixed(2);
	        $(this).find("input[name='txtgoods_price[]']").val(k);
	      }
		  })
		})
		//设置单个价格折扣js
		$("[id*='laimi-discount'] input[name='txtgoods_discount[]']").on("input propertychange", function () {
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
		$("[id*='laimi-discount'] input[name='txtgoods_price[]']").on("input propertychange",function () {
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