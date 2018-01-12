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
						<a href="mcombo2.php">计时套餐</a>
					</li>
					<li class="layui-this">
						<a href="mcombo2_add.php">新增计时套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mcombo2-add layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 套餐名称</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">简拼</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-80" type="text" name="txtjianpin">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">套餐编码</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtcode">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 套餐价格</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" type="text" name="txtprice" placeholder="￥" lay-verify="number">
		    </div>
		    <div class="layui-form-mid layui-word-aux">元。</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">会员价格</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" type="text" name="txtcprice" placeholder="￥">
		    </div>
		    <div class="layui-form-mid layui-word-aux">元。如有会员价，优先按会员价结算</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 有效时间</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" type="text" name="txtdays">
		    </div>
		    <div class="layui-form-mid layui-word-aux">天</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">参与活动</label>
		    <div class="layui-input-inline">
			  	<input type="radio" name="txtact" value="1" title="参与活动">
		      <input type="radio" name="txtact" value="2" title="不参与" checked>
		  	</div>
		   	<div class="layui-form-mid layui-word-aux">套餐是否参于满减、满送额度计算</div>
			</div>
	  	<div class="layui-form-item">
	    	<div class="layui-input-block">
		      <button class="layui-btn laimi-button-100 laimi-add" lay-filter="laimi-submit-add" lay-submit>
		      	完成
		      </button>
		      <button class="layui-btn layui-btn-primary" type="reset">
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
						<table id="laimi-mcombo" class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th width="50">次数</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3" style="text-align:left;">
										<div class="layui-input-inline">
											<select name="search" lay-search>
												<option value="">请选择商品分类</option>
												<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
                        <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                      	<?php } ?>
											</select>
										</div>
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-search">搜索</button>
								  	</div>
									</th>
									<!--th>
										<input class="laimi-select" type="checkbox" name="mgoods" lay-skin="primary"> 全选
									</th-->
								</tr>
								<?php
								foreach($this->_data['mgoods_catalog'] as $row) {
									foreach($this->_data['mgoods'] as $row2) {
	                 if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
								?>
								<tr class="laimi-tr-mgoods" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'];?>" mgoods_id="<?php echo $row2['mgoods_id'];?>">
									<td><?php echo $row['mgoods_catalog_name'];?></td>
									<td style="text-align:left;"><?php echo $row2['mgoods_name'];?><span class="laimi-color-ju">（￥<?php echo $row2['mgoods_price'];?>）</span></td>
									<td style="padding-top:5px; padding-bottom:5px;">
										<input type="checkbox" name="mymgoods[]" mgoods_id="<?php echo $row2['mgoods_id'];?>" lay-skin="primary"> 选择
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
	<script src="../../js/pinying.js"></script>
	<script>
	layui.use(["layer", "element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		$("#laimi-main input[name='txtname']").blur(function() {
			var strname = $(this).val().trim();
		  if(strname != "") {
		  	$("#laimi-main input[name='txtjianpin']").val(makePy(strname)[0]);
		  }
		});
		$('#laimi-main .laimi-search').on('click', function() {
		  var strvalue = $("#laimi-main select[name='search']").val();
		  if(strvalue == '') {
		  	$('#laimi-main .laimi-tr-mgoods').each(function() {
		  		$(this).removeClass('layui-hide');
		  	});
		  } else {
		  	$('#laimi-main .laimi-tr-mgoods').each(function() {
		  		if($(this).attr('mgoods_catalog_id') == strvalue) {
		      	$(this).removeClass('layui-hide');
		    	} else {
		     		$(this).addClass('layui-hide');
		    	}
		  	});
		  }
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			return false;
		});
		$(".laimi-add").on("click", function() {
			$(this).attr("disabled", true);
		  var strname = $(".layui-form input[name='txtname']").val();
		  var strjianpin = $(".layui-form input[name='txtjianpin']").val();
		  var strcode = $(".layui-form input[name='txtcode']").val();
		  var strprice = $(".layui-form input[name='txtprice']").val();
		  var strcprice = $(".layui-form input[name='txtcprice']").val();
		  var strdays = $(".layui-form input[name='txtdays']").val();
		  var stract = $(".layui-form input[name='txtact']:checked").val();
		  if(strname == "") {
		    objlayer.alert("套餐名称不能为空！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  if(isNaN(parseFloat(strprice))) {
		    objlayer.alert("请填写套餐价格！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  if(isNaN(parseInt(strdays))) {
		    objlayer.alert("请填写有效时间！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  var arr1 = new Array();
		  var obj1 = new Object();
		  $("#laimi-main .laimi-tr-mgoods input[name='mymgoods[]']:checked").each(function() {
	      obj1 = {"mgoods_id":$(this).attr("mgoods_id")};
	    	arr1.push(obj1);
		  });
		  if(arr1.length == 0) {
		    objlayer.alert("可选商品不能为空！", {
					title: '提示信息'
				});
		    $(this).attr("disabled", false);
		    return false;
		  }
		  var objdata = {
	      name:strname,
				jianpin:strjianpin,
				code:strcode,
				price:strprice,
				cprice:strcprice,
				days:strdays,
				act:stract,
				arr1:arr1
		  }
		  $.post("mcombo2_add_do.php", objdata, function(strdata) {
		    if(strdata == 0) {
		      window.location="mcombo2.php";
		    } else if(strdata == 2) {
		      objlayer.alert("套餐编码不能重复！", {
						title: '提示信息'
					});
		      $(".laimi-add").attr("disabled", false);
		    } else {
		      objlayer.alert("新增计时套餐失败，请联系管理员！", {
						title: '提示信息'
					});
		      $(".laimi-add").attr("disabled", false);
		    }
		  });
		});
	});
	</script>
</body>
</html>