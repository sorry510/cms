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
						<a href="store.php">入库和出库</a>
					</li>
					<li class="layui-this">
						<a href="store_edit.php?id=<?php echo $GLOBALS['intid']; ?>">修改入库/出库</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-store-edit layui-tab-content">
<form class="layui-form">
<input type="hidden" name="txtid" value="<?php echo $GLOBALS['intid']; ?>">
	<div class="layui-row">
		<div class="layui-col-xs5" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 类型</label>
				<div class="layui-input-inline">
					<input type="radio" name="txttype" value="1" title="入库"<?php if($this->_data['store_info']['store_type'] == 1) echo ' checked'; ?>>
					<input type="radio" name="txttype" value="2" title="出库"<?php if($this->_data['store_info']['store_type'] == 2) echo ' checked'; ?>>
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 时间</label>
				<div class="layui-input-inline">
					<input id="laimi-time" class="layui-input laimi-input-200" type="text" name="txttime" value="<?php echo date("Y-m-d", $this->_data['store_info']['store_time']); ?>" placeholder="yyyy-MM-dd" lay-verify="required">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 金额</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100" type="text" name="txtmoney" value="<?php echo $this->_data['store_info']['store_money'] + 0; ?>" placeholder="￥" lay-verify="number">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">经办人</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-200" type="text" name="txtoperator" value="<?php echo htmlspecialchars($this->_data['store_info']['store_operator']); ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-inline">
					<textarea class="layui-textarea" name="txtmemo" style="width:300px;"><?php echo htmlspecialchars($this->_data['store_info']['store_memo']); ?></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100 laimi-edit-do" lay-filter="laimi-submit-edit" lay-submit>
						确认
					</button>
					<button type="reset" class="layui-btn layui-btn-primary">
						重置
					</button>
				</div>
			</div>
		</div>
		<div class="layui-col-xs7" style="padding-top:10px; overflow-y:auto; height:400px;">
			<table class="layui-table" style="margin:0;">
				<thead>
					<tr>
						<th>分类</th>
						<th>商品名称</th>
						<th width="60">价格</th>
						<th width="60">数量</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th colspan="4" style="text-align:left;margin:0 auto;">
							<div class="layui-input-inline">
								<select name="catalog" lay-search>
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
							<div class="layui-input-inline last">
								<input class="layui-input laimi-input-200 laimi-key" type="text" placeholder="商品名称/编码/简拼">
							</div>
							<div class="layui-inline">
					     	<button type="button" class="layui-btn layui-btn-normal laimi-search">搜索</button>
					  	</div>
						</th>
					</tr>
					<?php
					foreach($this->_data['mgoods_catalog_list'] as $row) {
						foreach($this->_data['mgoods_list'] as $row2) {
            	if($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
          ?>
					<tr class="laimi-tr-mgoods" goods_catalog_id="<?php echo $row['mgoods_catalog_id']; ?>" goods_id="<?php echo $row2['mgoods_id']; ?>" goods_code="<?php echo $row2['mgoods_code']; ?>" goods_name="<?php echo $row2['mgoods_name']; ?>" goods_jianpin="<?php echo $row2['mgoods_jianpin']; ?>">
						<td><?php echo $row['mgoods_catalog_name']; ?></td>
						<td style="text-align:left;"><?php echo $row2['mgoods_name']; ?></td>
						<td>￥<?php echo $row2['mgoods_price'] + 0; ?></td>
						<td style="padding:5px">
							<div class="layui-inline">
								<input class="layui-input laimi-input-60-32" type="text" name="mycount[]" value="<?php echo $row2['store_goods_count']; ?>">
							</div>	
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
					<tr class="laimi-tr-sgoods" goods_catalog_id="<?php echo $row['sgoods_catalog_id']; ?>" goods_id="<?php echo $row2['sgoods_id']; ?>" goods_code="<?php echo $row2['sgoods_code']; ?>" goods_name="<?php echo $row2['sgoods_name']; ?>" goods_jianpin="<?php echo $row2['sgoods_jianpin']; ?>">
						<td><?php echo $row['sgoods_catalog_name']; ?></td>
						<td style="text-align:left;"><?php echo $row2['sgoods_name']; ?></td>
						<td>￥<?php echo $row2['sgoods_price'] + 0; ?></td>
						<td style="padding:5px">
							<div class="layui-inline">
								<input class="layui-input laimi-input-60-32" type="text" name="mycount[]" value="<?php echo $row2['store_goods_count']; ?>">
							</div>
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
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;		
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-time'
		});
		$('.laimi-search').on('click', function() {
			var strcatalog = $("#laimi-main select[name='catalog']").val();
			var strkey = $("#laimi-main .laimi-key").val();
			var arrcatalog = strcatalog.split(",");
			if(strcatalog == "") {
				$('#laimi-main .laimi-tr-mgoods').each(function() {
		  		if(strkey == "") {
		  			$(this).removeClass("layui-hide");
		  		} else {
		  			if($(this).attr("goods_code").indexOf(strkey) >= 0 || $(this).attr("goods_name").indexOf(strkey) >= 0 || $(this).attr("goods_jianpin").indexOf(strkey) >= 0) {
		  				$(this).removeClass("layui-hide");
		  			} else {
		  				$(this).addClass("layui-hide");
		  			}
		  		}
		  	});
		  	$('#laimi-main .laimi-tr-sgoods').each(function() {
		  		if(strkey == "") {
		  			$(this).removeClass("layui-hide");
		  		} else {
		  			if($(this).attr("goods_code").indexOf(strkey) >= 0 || $(this).attr("goods_name").indexOf(strkey) >= 0 || $(this).attr("goods_jianpin").indexOf(strkey) >= 0) {
		  				$(this).removeClass("layui-hide");
		  			} else {
		  				$(this).addClass("layui-hide");
		  			}
		  		}
		  	});
			} else {
				if(arrcatalog[0] == "mgoods") {
					$("#laimi-main .laimi-tr-mgoods").each(function() {
						if($(this).attr("goods_catalog_id") == arrcatalog[1]) {
							if(strkey == "") {
				  			$(this).removeClass("layui-hide");
				  		} else {
				  			if($(this).attr("goods_code").indexOf(strkey) >= 0 || $(this).attr("goods_name").indexOf(strkey) >= 0 || $(this).attr("goods_jianpin").indexOf(strkey) >= 0) {
				  				$(this).removeClass("layui-hide");
				  			} else {
				  				$(this).addClass("layui-hide");
				  			}
				  		}
						} else {
							$(this).addClass("layui-hide");
						}
					});
					$("#laimi-main .laimi-tr-sgoods").each(function() {
						$(this).addClass("layui-hide");
					});
				} else if(arrcatalog[0] == "sgoods") {
					$("#laimi-main .laimi-tr-mgoods").each(function() {
						$(this).addClass("layui-hide");
					});
					$("#laimi-main .laimi-tr-sgoods").each(function() {
						if($(this).attr("goods_catalog_id") == arrcatalog[1]) {
							if(strkey == "") {
				  			$(this).removeClass("layui-hide");
				  		} else {
				  			if($(this).attr("goods_code").indexOf(strkey) >= 0 || $(this).attr("goods_name").indexOf(strkey) >= 0 || $(this).attr("goods_jianpin").indexOf(strkey) >= 0) {
				  				$(this).removeClass("layui-hide");
				  			} else {
				  				$(this).addClass("layui-hide");
				  			}
				  		}
						} else {
							$(this).addClass("layui-hide");
						}
					});
				}
			}
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			return false;
		});
		$(".laimi-edit-do").on("click", function() {
			$(this).attr("disabled", true);
		  var strid = $(".layui-form input[name='txtid']").val();
		  var strtype = $(".layui-form input[name='txttype']:checked").val();
		  var strtime = $(".layui-form input[name='txttime']").val();
		  var strmoney = $(".layui-form input[name='txtmoney']").val();
		  var stroperator = $(".layui-form input[name='txtoperator']").val();
		  var strmemo = $(".layui-form textarea[name='txtmemo']").val();
			var arr1 = new Array();
		  var arr2 = new Array();
		  var obj1 = new Object();
		  var obj2 = new Object();
		  var objcount = null;
		  $("#laimi-main .laimi-tr-mgoods").each(function() {
		    objcount = $(this).find("input[name='mycount[]']");
		    if(objcount.val() != "") {
		      obj1 = {"mgoods_id":$(this).attr("goods_id"),"count":objcount.val()};
		    	arr1.push(obj1);
		    }
		  });
		  $("#laimi-main .laimi-tr-sgoods").each(function() {
		    objcount = $(this).find("input[name='mycount[]']");
		    if(objcount.val() != "") {
		      obj2 = {"sgoods_id":$(this).attr("goods_id"),"count":objcount.val()};
		    	arr2.push(obj2);
		    }
		  });
		  if(arr1.length == 0 && arr2.length == 0) {
		  	objlayer.alert("请选择商品！", {
					title: '提示信息'
				});
				$(".laimi-add-do").attr("disabled", false);
				return true;
		  }
		  var objdata = {
	      id: strid,
	      type: strtype,
	      time: strtime,
	      money: strmoney,
	      operator: stroperator,
	      memo: strmemo,
	      arr1:arr1,
	      arr2:arr2,
		  }
		  $.post("store_edit_do.php", objdata, function(strdata) {
		    if(strdata == 0) {
		      window.location="store.php";
		    } else {
		      objlayer.alert("新增入库出库失败，请联系管理员！", {
						title: '提示信息'
					});
		      $(".laimi-add-do").attr("disabled", false);
		    }
		  });
			return true;
		});
	});
	</script>
</body>
</html>