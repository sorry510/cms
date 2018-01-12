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
						<a href="act_discount.php">限时打折</a>
					</li>
					<li class="layui-this">
						<a href="act_discount_edit.php?id=<?php echo $GLOBALS['intid']; ?>">修改打折活动</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount-edit layui-tab-content">
<form class="layui-form">
<input class="layui-input laimi-input-300" type="hidden" name="txtid" value="<?php echo $this->_data['act_discount_info']['act_discount_id']; ?>">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label">活动名称</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-300" type="text" name="txtname" value="<?php echo htmlspecialchars($this->_data['act_discount_info']['act_discount_name']); ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">顾客类型</label>
				<div class="layui-input-inline">
					<input type="radio" name="txtclient" value="1" title="不限制"<?php if($this->_data['act_discount_info']['act_discount_client'] == 1) echo " checked"; ?>>
					<input type="radio" name="txtclient" value="2" title="会员"<?php if($this->_data['act_discount_info']['act_discount_client'] == 2) echo " checked"; ?>>
					<input type="radio" name="txtclient" value="3" title="非会员"<?php if($this->_data['act_discount_info']['act_discount_client'] == 3) echo " checked"; ?>>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">开始时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from" class="layui-input" type="text" name="txtstart" value="<?php echo date('Y-m-d', $this->_data['act_discount_info']['act_discount_start']); ?>" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">
					当天0点开始活动
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">结束时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from" class="layui-input" type="text" name="txtend" value="<?php echo date('Y-m-d', $this->_data['act_discount_info']['act_discount_end']); ?>" placeholder="yyyy-MM-dd">
				</div>
				<div class="layui-form-mid layui-word-aux">
					当天24点结束活动
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-block">
					<textarea class="layui-textarea laimi-input-b80" name="txtmemo"><?php echo htmlspecialchars($this->_data['act_discount_info']['act_discount_memo']); ?></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100 laimi-edit" lay-filter="laimi-submit-edit" lay-submit>
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
					<li>
						可选套餐
					</li>
				</ul>
				<div class="layui-tab-content" style="padding:0;">
					<div id="laimi-tab-mgoods" class="layui-tab-item layui-show" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0;">
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
												<option value="">请选择商品分类</option>
												<?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                        <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                      	<?php } ?>
											</select>
										</div>
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-btn-search">搜索</button>
								  	</div>
									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="alldiscount" placeholder="折">
										</div>
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-btn-set">批量设置</button>
								  	</div>
									</th>
								</tr>
								<?php
								foreach($this->_data['mgoods_catalog_list'] as $row) {
									foreach($this->_data['mgoods_list'] as $row2) {
	                	if($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
	              ?>
								<tr class="laimi-tr-mgoods" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id']; ?>" mgoods_id="<?php echo $row2['mgoods_id']; ?>" mgoods_price="<?php echo $row2['mgoods_price'] + 0; ?>">
									<td><?php echo $row['mgoods_catalog_name']; ?></td>
									<td style="text-align:left;"><?php echo $row2['mgoods_name']; ?></td>
									<td>￥<?php echo $row2['mgoods_price'] + 0; ?></td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mydiscount[]" value="<?php echo $row2['myvalue']; ?>" placeholder="折" mgoods_price="<?php echo $row2['mgoods_price'] + 0; ?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="myprice[]" value="<?php echo $row2['myprice']; ?>" placeholder="￥" mgoods_price="<?php echo $row2['mgoods_price'] + 0; ?>">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
								<?php
										}
			            }
		            }
		            ?> 
							</tbody>
						</table>
					</div>
					<div id="laimi-tab-mcombo" class="layui-tab-item" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>套餐名称</th>
									<th>价格</th>
									<th width="150">折扣</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="2" style="text-align:left;">
										
									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="alldiscount" placeholder="折">
										</div>
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-btn-set">批量设置</button>
								  	</div>
									</th>
								</tr>
								<?php foreach($this->_data['mcombo_list'] as $row) { ?>
								<tr class="laimi-tr-mcombo" mcombo_id="<?php echo $row['mcombo_id']; ?>" mcombo_price="<?php echo $row['mcombo_price'] + 0; ?>">
									<td style="text-align:left;"><?php echo $row['mcombo_name']; ?></td>
									<td>￥<?php echo $row['mcombo_price'] + 0; ?></td>
									<td style="padding:5px;">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mydiscount[]" value="<?php echo $row['myvalue']; ?>" placeholder="折" mcombo_price="<?php echo $row['mcombo_price'] + 0; ?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="myprice[]" value="<?php echo $row['myprice']; ?>" placeholder="￥" mcombo_price="<?php echo $row['mcombo_price'] + 0; ?>">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
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
		//搜索商品分类
		$('#laimi-tab-mgoods .laimi-btn-search').on('click', function() {
		  var strvalue = $("#laimi-tab-mgoods select[name='search']").val();
		  if(strvalue == '') {
		  	$('#laimi-tab-mgoods .laimi-tr-mgoods').each(function() {
		  		$(this).removeClass('layui-hide');
		  	});
		  } else {
		  	$('#laimi-tab-mgoods .laimi-tr-mgoods').each(function() {
		  		if($(this).attr('mgoods_catalog_id') == strvalue) {
		      	$(this).removeClass('layui-hide');
		    	} else {
		     		$(this).addClass('layui-hide');
		    	}
		  	});
		  }
		});
		//批量设置商品折扣
		$('#laimi-tab-mgoods .laimi-btn-set').on('click', function() {
		  var decvalue = parseFloat($("#laimi-tab-mgoods input[name='alldiscount']").val());
		  if(isNaN(decvalue)) {
		  	decvalue = 0;
		  }
		  if(decvalue > 0 && decvalue <= 10) {
		  	$("#laimi-tab-mgoods .laimi-tr-mgoods").each(function() {
	        $(this).find("input[name='mydiscount[]']").val(decvalue);
	        var decprice = parseFloat($(this).attr('mgoods_price'));
	        var decvalue2 = decprice * decvalue / 10;
	        decvalue2 = decvalue2.toFixed(2);
	        $(this).find("input[name='myprice[]']").val(decvalue2);
			  });
	    }
		});
		//批量设置套餐折扣
		$('#laimi-tab-mcombo .laimi-btn-set').on('click',function () {
		  var decvalue = parseFloat($("#laimi-tab-mcombo input[name='alldiscount']").val());
		  if(isNaN(decvalue)) {
		  	decvalue = 0;
		  }
		  if(decvalue > 0 && decvalue <= 10) {
		  	$("#laimi-tab-mcombo .laimi-tr-mcombo").each(function() {
	        $(this).find("input[name='mydiscount[]']").val(decvalue);
	        var decprice = parseFloat($(this).attr('mcombo_price'));
	        var decvalue2 = decprice * decvalue / 10;
	        decvalue2 = decvalue2.toFixed(2);
	        $(this).find("input[name='myprice[]']").val(decvalue2);
			  });
	    }
		});
		//单个设置折扣
		$("#laimi-tab-mgoods input[name='mydiscount[]']").on("input propertychange", function() {
			var decvalue = $(this).val();
			if(isNaN(decvalue)) {
				decvalue = 0
			}
			if(decvalue > 0 && decvalue <= 10) {
				var decprice = parseFloat($(this).attr('mgoods_price'));
        var decvalue2 = decprice * decvalue / 10;
        decvalue2 = decvalue2.toFixed(2);
        $(this).parent().siblings().find("input").val(decvalue2);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		$("#laimi-tab-mgoods input[name='myprice[]']").on("input propertychange", function() {
			var decprice = parseFloat($(this).val());
			var decprice2 = parseFloat($(this).attr("mgoods_price"));
			if(isNaN(decprice)) {
				decprice = 0;
			}
			if(decprice > 0 && decprice <= decprice2) {
				var decvalue = decprice / decprice2 * 10;
        decvalue = decvalue.toFixed(1);
        $(this).parent().siblings().find("input").val(decvalue);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		$("#laimi-tab-mcombo input[name='mydiscount[]']").on("input propertychange", function() {
			var decvalue = $(this).val();
			if(isNaN(decvalue)) {
				decvalue = 0
			}
			if(decvalue > 0 && decvalue <= 10) {
				var decprice = parseFloat($(this).attr('mcombo_price'));
        var decvalue2 = decprice * decvalue / 10;
        decvalue2 = decvalue2.toFixed(2);
        $(this).parent().siblings().find("input").val(decvalue2);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		$("#laimi-tab-mcombo input[name='myprice[]']").on("input propertychange", function() {
			var decprice = parseFloat($(this).val());
			var decprice2 = parseFloat($(this).attr("mcombo_price"));
			if(isNaN(decprice)) {
				decprice = 0;
			}
			if(decprice > 0 && decprice <= decprice2) {
				var decvalue = decprice / decprice2 * 10;
        decvalue = decvalue.toFixed(1);
        $(this).parent().siblings().find("input").val(decvalue);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		//修改操作
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			return false;
		});
		$(".laimi-edit").on("click", function() {
		  $(this).attr("disabled", true);
		  var strid = $(".layui-form input[name='txtid']").val();
		  var strname = $(".layui-form input[name='txtname']").val();
		  var strclient = $(".layui-form input[name='txtclient']:checked").val();
		  var strstart = $(".layui-form input[name='txtstart']").val();
		  var strend = $(".layui-form input[name='txtend']").val();
		  var strmemo = $(".layui-form textarea[name='txtmemo']").val();
		  if(strname == "") {
		    objlayer.alert("活动名称不能为空！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  if(strstart == "") {
		    objlayer.alert("开始时间不能为空！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  if(strend == "") {
		    objlayer.alert("结束时间不能为空！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  var arr1 = new Array();
		  var arr2 = new Array();
		  var obj1 = new Object();
		  var obj2 = new Object();
		  $("#laimi-tab-mgoods .laimi-tr-mgoods").each(function() {
		    if($(this).find("input[name='mydiscount[]']").val() != "" && $(this).find("input[name='myprice[]']").val() != "") {
		      obj1 = {"mgoods_catalog_id":$(this).attr("mgoods_catalog_id"),"mgoods_id":$(this).attr("mgoods_id"),"value":$(this).find("input[name='mydiscount[]']").val(),"price":$(this).find("input[name='myprice[]']").val()};
		    	arr1.push(obj1);
		    }
		  });
		  $("#laimi-tab-mcombo .laimi-tr-mcombo").each(function() {
		    if($(this).find("input[name='mydiscount[]']").val() != "" && $(this).find("input[name='myprice[]']").val() != "") {
		      obj2 = {"mcombo_id":$(this).attr("mcombo_id"),"value":$(this).find("input[name='mydiscount[]']").val(),"price":$(this).find("input[name='myprice[]']").val()};
		    	arr2.push(obj2);
		    }
		  });
		  if(arr1.length == 0 && arr2.length == 0) {
		    objlayer.alert("折扣商品或套餐不能为空！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  var objdata = {
	      id: strid,
	      name: strname,
	      client: strclient,
	      start: strstart,
	      end: strend,
	      memo: strmemo,
	      arr1:arr1,
	      arr2:arr2
		  }
		  $.post("act_discount_edit_do.php", objdata, function(strdata) {
		    if(strdata == 0) {
		      window.location="act_discount.php";
		    } else if(strdata == 2) {
		    	objlayer.alert("请填写正确的开始时间和结束时间！", {
						title: '提示信息'
					});
		      $(".laimi-add").attr("disabled", false);
		    } else {
		      objlayer.alert("修改打折活动失败，请联系管理员！", {
						title: '提示信息'
					});
		      $(".laimi-edit").attr("disabled", false);
		    }
		  });
		});
	});
	</script>
</body>
</html>