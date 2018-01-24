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
						<a href="group_reward.php">员工提成方案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-group-reward-edit layui-tab-content">
<form class="layui-form">
<input type="hidden" name="txtid" value="<?php echo $GLOBALS['intid']; ?>">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label">办卡提成</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100" type="text" name="txtcreate" value="<?php echo $this->_data['group_reward_info']['group_reward_create'] + 0; ?>">
				</div>
				 <div class="layui-form-mid layui-word-aux">元/会员</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">充值提成</label>
				<div class="layui-input-inline">
					<input type="radio" name="txtfilltype" value="1" title="百分比(%)"<?php if($this->_data['group_reward_info']['group_reward_pfill'] !=0 ) echo " checked"; ?> lay-verify="radio">
					<input type="radio" name="txtfilltype" value="2" title="固定金额(元)"<?php if($this->_data['group_reward_info']['group_reward_fill'] !=0 ) echo " checked"; ?> lay-verify="radio">
				</div>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-80" type="text" name="txtfill" value="<?php echo $this->_data['group_reward_info']['group_reward_pfill'] !=0 ? $this->_data['group_reward_info']['group_reward_pfill'] + 0 : $this->_data['group_reward_info']['group_reward_fill'] + 0; ?>">
				</div>
			</div>	
			<div class="layui-form-item">
				<label class="layui-form-label">导购提成</label>
				<div class="layui-input-inline">
					<input type="radio" name="txtguidetype" value="1" title="百分比(%)"<?php if($this->_data['group_reward_info']['group_reward_pguide'] !=0 ) echo " checked"; ?> lay-verify="radio2">
					<input type="radio" name="txtguidetype" value="2" title="固定金额(元)"<?php if($this->_data['group_reward_info']['group_reward_guide'] !=0 ) echo "checked"; ?> lay-verify="radio2">
				</div>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-80" type="text" name="txtguide" value="<?php echo $this->_data['group_reward_info']['group_reward_pguide'] !=0 ? $this->_data['group_reward_info']['group_reward_pguide'] + 0 : $this->_data['group_reward_info']['group_reward_guide'] + 0; ?>">
				</div>
			</div>	
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100 laimi-do" lay-filter="laimi-submit" lay-submit>
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
					<div id="laimi-tab-goods" class="layui-tab-item layui-show" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th>价格</th>
									<th width="150">提成比例/金额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3" style="text-align:left;">
										<div class="layui-input-inline">
											<select name="search" lay-search>
												<option value="">请选择商品</option>
												<optgroup label="通用商品">
													<?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
	                        <option value="mgoods,<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
	                      	<?php } ?>
                      	</optgroup>
                      	<optgroup label="单店商品">
													<?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
	                        <option value="sgoods,<?php echo $row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
	                      	<?php } ?>
                      	</optgroup>
											</select>
										</div>
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-btn-search">搜索</button>
								  	</div>
									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="allpercent" placeholder="%">
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
								<tr class="laimi-tr-mgoods" goods_catalog_id="<?php echo $row['mgoods_catalog_id']; ?>" goods_id="<?php echo $row2['goods_id']; ?>" goods_price="<?php echo $row2['mgoods_price'] + 0; ?>">
									<td><?php echo $row['mgoods_catalog_name']; ?></td>
									<td style="text-align:left;"><?php echo $row2['mgoods_name']; ?></td>
									<td>￥<?php echo $row2['mgoods_price'] + 0; ?></td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mypercent[]" value="<?php echo $row2['group_reward2_percent']; ?>" placeholder="%" goods_price="<?php echo $row2['mgoods_price'] + 0; ?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mymoney[]" value="<?php echo $row2['group_reward2_money'] + 0; ?>" placeholder="￥" goods_price="<?php echo $row2['mgoods_price'] + 0; ?>">
										</div>
										<div class="layui-inline">元</div>		
									</td>
								</tr>
								<?php
										}
			            }
		            }
		            ?>
		            <?php
								foreach($this->_data['sgoods_catalog_list'] as $row) {
									foreach($this->_data['sgoods_list'] as $row2) {
	                	if($row['sgoods_catalog_id'] == $row2['sgoods_catalog_id']) {
	              ?>
								<tr class="laimi-tr-sgoods" goods_catalog_id="<?php echo $row['sgoods_catalog_id']; ?>" goods_id="<?php echo $row2['goods_id']; ?>" goods_price="<?php echo $row2['sgoods_price'] + 0; ?>">
									<td><?php echo $row['sgoods_catalog_name']; ?></td>
									<td style="text-align:left;"><?php echo $row2['sgoods_name']; ?></td>
									<td>￥<?php echo $row2['sgoods_price'] + 0; ?></td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mypercent[]" value="<?php echo $row2['group_reward2_percent']; ?>" placeholder="%" goods_price="<?php echo $row2['sgoods_price'] + 0; ?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mymoney[]" value="<?php echo $row2['group_reward2_money'] + 0; ?>" placeholder="￥" goods_price="<?php echo $row2['sgoods_price'] + 0; ?>">
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
									<th width="150">提成比例/金额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="2" style="text-align:left;">

									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="allpercent" placeholder="%">
										</div>
										<div class="layui-inline">
									   	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-btn-set">批量设置</button>
										</div>
									</th>
								</tr>
								<?php foreach($this->_data['mcombo_list'] as $row) { ?>
								<tr class="laimi-tr-mcombo" mcombo_id="<?php echo $row['combo_id']; ?>" mcombo_price="<?php echo $row['mcombo_price'] + 0; ?>">
									<td style="text-align:left;"><?php echo $row['mcombo_name']; ?></td>
									<td>￥<?php echo $row['mcombo_price'] + 0; ?></td>
									<td style="padding:5px;">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mypercent[]" value="<?php echo $row['group_reward2_percent']; ?>" placeholder="%" mcombo_price="<?php echo $row['mcombo_price'] + 0; ?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32" type="text" name="mymoney[]" value="<?php echo $row['group_reward2_money'] + 0; ?>" placeholder="￥" mcombo_price="<?php echo $row['mcombo_price'] + 0; ?>">
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
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		objform.verify({
			radio: function(value, item) {
				var obj = $("#laimi-main input:radio[name='txtfilltype']:checked");
				if(obj.length == 0) {
					return '请选择充值提成方式！';
				}
			},
			radio2: function(value, item) {
				var obj = $("#laimi-main input:radio[name='txtguidetype']:checked");
				if(obj.length == 0) {
					return '请选择导购提成方式！';
				}
			}
		});
		//搜索商品分类
		$('#laimi-tab-goods .laimi-btn-search').on('click', function() {
		  var strvalue = $("#laimi-tab-goods select[name='search']").val();
		  var arrvalue = strvalue.split(",");
		  if(strvalue == '') {
		  	$('#laimi-tab-goods .laimi-tr-mgoods').each(function() {
		  		$(this).removeClass('layui-hide');
		  	});
		  	$('#laimi-tab-goods .laimi-tr-sgoods').each(function() {
		  		$(this).removeClass('layui-hide');
		  	});
		  } else {
		  	if(arrvalue[0] == "mgoods") {
		  		$('#laimi-tab-goods .laimi-tr-mgoods').each(function() {
			  		if($(this).attr('goods_catalog_id') == arrvalue[1]) {
			      	$(this).removeClass('layui-hide');
			    	} else {
			     		$(this).addClass('layui-hide');
			    	}
			  	});
			  	$('#laimi-tab-goods .laimi-tr-sgoods').each(function() {
			  		$(this).addClass('layui-hide');
			  	});
		  	} else if(arrvalue[0] == "sgoods") {
		  		$('#laimi-tab-goods .laimi-tr-mgoods').each(function() {
			  		$(this).addClass('layui-hide');
			  	});
		  		$('#laimi-tab-goods .laimi-tr-sgoods').each(function() {
			  		if($(this).attr('goods_catalog_id') == arrvalue[1]) {
			      	$(this).removeClass('layui-hide');
			    	} else {
			     		$(this).addClass('layui-hide');
			    	}
			  	});
		  	}
		  }
		});
		//批量设置商品提成
		$('#laimi-tab-goods .laimi-btn-set').on('click', function() {
		  var decvalue = parseFloat($("#laimi-tab-goods input[name='allpercent']").val());
		  if(isNaN(decvalue)) {
		  	decvalue = 0;
		  }
		  if(decvalue > 0 && decvalue < 100) {
		  	$("#laimi-tab-goods .laimi-tr-mgoods").each(function() {
	        if(!$(this).hasClass("layui-hide")) {
	        	$(this).find("input[name='mypercent[]']").val(decvalue);
		        var decprice = parseFloat($(this).attr('goods_price'));
		        var decvalue2 = decprice * decvalue / 100;
		        decvalue2 = decvalue2.toFixed(2);
		        $(this).find("input[name='mymoney[]']").val(decvalue2);
	        }
			  });
			  $("#laimi-tab-goods .laimi-tr-sgoods").each(function() {
	        if(!$(this).hasClass("layui-hide")) {
	        	$(this).find("input[name='mypercent[]']").val(decvalue);
		        var decprice = parseFloat($(this).attr('goods_price'));
		        var decvalue2 = decprice * decvalue / 100;
		        decvalue2 = decvalue2.toFixed(2);
		        $(this).find("input[name='mymoney[]']").val(decvalue2);
	        }
			  });
	    }
		});
		//批量设置套餐折扣
		$('#laimi-tab-mcombo .laimi-btn-set').on('click',function () {
		  var decvalue = parseFloat($("#laimi-tab-mcombo input[name='allpercent']").val());
		  if(isNaN(decvalue)) {
		  	decvalue = 0;
		  }
		  if(decvalue > 0 && decvalue < 100) {
		  	$("#laimi-tab-mcombo .laimi-tr-mcombo").each(function() {
	        $(this).find("input[name='mypercent[]']").val(decvalue);
	        var decprice = parseFloat($(this).attr('mcombo_price'));
	        var decvalue2 = decprice * decvalue / 100;
	        decvalue2 = decvalue2.toFixed(2);
	        $(this).find("input[name='mymoney[]']").val(decvalue2);
			  });
	    }
		});
		//单个设置折扣
		$("#laimi-tab-goods input[name='mypercent[]']").on("input propertychange", function() {
			var decvalue = $(this).val();
			if(isNaN(decvalue)) {
				decvalue = 0
			}
			if(decvalue > 0 && decvalue < 100) {
				var decprice = parseFloat($(this).attr('goods_price'));
        var decvalue2 = decprice * decvalue / 100;
        decvalue2 = decvalue2.toFixed(2);
        $(this).parent().siblings().find("input").val(decvalue2);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		$("#laimi-tab-goods input[name='mymoney[]']").on("input propertychange", function() {
			var decprice = parseFloat($(this).val());
			var decprice2 = parseFloat($(this).attr("goods_price"));
			if(isNaN(decprice)) {
				decprice = 0;
			}
			if(decprice > 0 && decprice <= decprice2) {
				var decvalue = decprice / decprice2 * 100;
        decvalue = decvalue.toFixed(1);
        $(this).parent().siblings().find("input").val(decvalue);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		$("#laimi-tab-mcombo input[name='mypercent[]']").on("input propertychange", function() {
			var decvalue = $(this).val();
			if(isNaN(decvalue)) {
				decvalue = 0
			}
			if(decvalue > 0 && decvalue < 100) {
				var decprice = parseFloat($(this).attr('mcombo_price'));
        var decvalue2 = decprice * decvalue / 10;
        decvalue2 = decvalue2.toFixed(2);
        $(this).parent().siblings().find("input").val(decvalue2);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		$("#laimi-tab-mcombo input[name='mymoney[]']").on("input propertychange", function() {
			var decprice = parseFloat($(this).val());
			var decprice2 = parseFloat($(this).attr("mcombo_price"));
			if(isNaN(decprice)) {
				decprice = 0;
			}
			if(decprice > 0 && decprice <= decprice2) {
				var decvalue = decprice / decprice2 * 100;
        decvalue = decvalue.toFixed(1);
        $(this).parent().siblings().find("input").val(decvalue);
			} else {
				$(this).val("");
				$(this).parent().siblings().find("input").val("");
			}
		});
		//确认操作
		objform.on("submit(laimi-submit)", function(objdata) {
			var objthis = $(this);
		  objthis.addClass("layui-btn-disabled");
		  var strid = $(".layui-form input[name='txtid']").val();
		  var strcreate = $(".layui-form input[name='txtcreate']").val();
		  var strfilltype = $(".layui-form input[name='txtfilltype']:checked").val();
		  var strfill = $(".layui-form input[name='txtfill']").val();
		  var strguidetype = $(".layui-form input[name='txtguidetype']:checked").val();
		  var strguide = $(".layui-form input[name='txtguide']").val();
		  var arr1 = new Array();
		  var arr2 = new Array();
		  var arr3 = new Array();
		  var obj1 = new Object();
		  var obj2 = new Object();
		  var obj3 = new Object();
		  $("#laimi-tab-goods .laimi-tr-mgoods").each(function() {
		    if($(this).find("input[name='mypercent[]']").val() != "" && $(this).find("input[name='mymoney[]']").val() != "") {
		      obj1 = {"mgoods_catalog_id":$(this).attr("goods_catalog_id"),"mgoods_id":$(this).attr("goods_id"),"percent":$(this).find("input[name='mypercent[]']").val(),"money":$(this).find("input[name='mymoney[]']").val()};
		    	arr1.push(obj1);
		    }
		  });
		  $("#laimi-tab-goods .laimi-tr-sgoods").each(function() {
		    if($(this).find("input[name='mypercent[]']").val() != "" && $(this).find("input[name='mymoney[]']").val() != "") {
		      obj2 = {"sgoods_catalog_id":$(this).attr("goods_catalog_id"),"sgoods_id":$(this).attr("goods_id"),"percent":$(this).find("input[name='mypercent[]']").val(),"money":$(this).find("input[name='mymoney[]']").val()};
		    	arr2.push(obj2);
		    }
		  });
		  $("#laimi-tab-mcombo .laimi-tr-mcombo").each(function() {
		    if($(this).find("input[name='mypercent[]']").val() != "" && $(this).find("input[name='mymoney[]']").val() != "") {
		      obj3 = {"mcombo_id":$(this).attr("mcombo_id"),"percent":$(this).find("input[name='mypercent[]']").val(),"money":$(this).find("input[name='mymoney[]']").val()};
		    	arr3.push(obj3);
		    }
		  });
		  var objdata = {
	      id: strid,
	      create: strcreate,
	      filltype: strfilltype,
	      fill: strfill,
	      guidetype: strguidetype,
	      guide: strguide,
	      arr1:arr1,
	      arr2:arr2,
	      arr3:arr3
		  }
		  $.post("group_reward_edit_do.php", objdata, function(strdata) {
		    if(strdata == 0) {
		      window.location="group_reward.php";
		    } else if(strdata == 2) {
		    	objlayer.alert("请填写正确的开始时间和结束时间！", {
						title: '提示信息'
					});
		  		objthis.removeClass("layui-btn-disabled");
		    } else {
		      objlayer.alert("设置员工提成方案失败，请联系管理员！", {
						title: '提示信息'
					});
		      objthis.removeClass("layui-btn-disabled");
		    }
		  });
		  return false;
		});
	});
	</script>
</body>
</html>