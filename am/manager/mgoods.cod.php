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
						<a href="mgoods.php">通用商品管理</a>
					</li>
					<li>
						<a href="mgoods_catalog.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mgoods layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline">
			<select name="catalog">
				<option value="">全部</option>
        <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
        <option value="<?php echo $row['mgoods_catalog_id'] ?>"<?php if($row['mgoods_catalog_id'] == $GLOBALS['intcatalog']) echo " selected"; ?>><?php echo $row['mgoods_catalog_name'] ?></option>
        <?php } ?>
			</select>
		</div>
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="key" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增商品</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分类</th>
			<th>名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>类型</th>
			<th>活动</th>
			<th>预约</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['mgoods_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['mgoods_catalog_name']; ?></td>
      <td><?php echo $row['mgoods_name']; ?></td>
      <td><?php echo $row['mgoods_code']; ?></td>
      <td>￥<?php echo $row['mgoods_price'] + 0; ?></td>
			<td><?php echo $row['mycprice']; ?></td>
			<td><?php echo $row['mytype']; ?></td>
			<td><?php echo $row['myact']; ?></td>
			<td><?php echo $row['myreserve']; ?></td>
			<td><?php echo $row['mystate']; ?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['mgoods_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<?php if($row['mgoods_state'] == 1) { ?>
				<button class="layui-btn layui-btn-mini layui-bg-red laimi-state1" value="<?php echo $row['mgoods_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停用
				</button>
				<?php } else { ?>
				<button class="layui-btn layui-btn-mini layui-bg-blue laimi-state2" value="<?php echo $row['mgoods_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
					启用
				</button>
				<?php } ?>
				<button class="layui-btn layui-btn-mini layui-btn-primary laimi-del" value="<?php echo $row['mgoods_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
			</td>
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
	<!--新增商品弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-add">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品分类</label>
			    <div class="layui-input-inline">
			      <select name="txtcatalog" lay-verify="required" lay-search>
			        <option value="">请选择商品分类</option>
              <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
              <option value="<?php echo $row['mgoods_catalog_id'] ?>"><?php echo $row['mgoods_catalog_name'] ?></option>
              <?php } ?>
			      </select>
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品名称</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
			    </div>
			    <label class="layui-form-label" style="width:auto;">简拼</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-80" type="text" name="txtjianpin">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品编码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtcode">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtprice" placeholder="￥" lay-verify="number">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtcprice" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元&nbsp;&nbsp;如有会员价，优先按会员价结算</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品类型</label>
			    <div class="layui-input-inline">
				    <input type="radio" name="txttype" value="1" title="服务（无库存）" lay-verify="radio">
					  <input type="radio" name="txttype" value="2" title="商品（有库存）" lay-verify="radio">
				  </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 参与活动</label>
			    <div class="layui-input-inline">
				  	<input type="radio" name="txtact" value="1" title="参与活动" lay-verify="radio">
			      <input type="radio" name="txtact" value="2" title="不参与" lay-verify="radio">
			   	</div>
			    <div class="layui-form-mid layui-word-aux">是否参与满减、满送活动</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 参与预约</label>
			    <div class="layui-input-inline">
						<input type="radio" name="txtreserve" value="1" title="参与预约" lay-verify="radio">
			  		<input type="radio" name="txtreserve" value="2" title="不参与" lay-verify="radio">
			  	</div>
			    <div class="layui-form-mid layui-word-aux">是否参与微信预约</div>
				</div>
		  	<div class="layui-form-item">
		    	<div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-add" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
		    	</div>
		  	</div>
			</form>
		</div>
	</script>
	<!--新增商品弹出层结束-->
	<!--修改商品弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-edit">
			<input class="layui-input laimi-input-300" type="hidden" name="txtid">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品分类</label>
			    <div class="layui-input-inline">
			      <select name="txtcatalog" lay-verify="required" lay-search>
			        <option value="">请选择</option>
              <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
              <option value="<?php echo $row['mgoods_catalog_id'] ?>"><?php echo $row['mgoods_catalog_name'] ?></option>
              <?php } ?>
			      </select>
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品名称</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
			    </div>
			    <label class="layui-form-label" style="width:auto;">简拼</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-80" type="text" name="txtjianpin">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品编码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtcode">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtprice" placeholder="￥" lay-verify="number">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtcprice" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元&nbsp;&nbsp;如有会员价，优先按会员价结算</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品类型</label>
			    <div class="layui-form-mid layui-word-aux"><span id="laimi-type" style="color:black;"></span></div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">参与活动</label>
			    <div class="layui-input-inline">
				  	<input type="radio" name="txtact" value="1" title="参与活动" lay-verify="radio2">
			      <input type="radio" name="txtact" value="2" title="不参与" lay-verify="radio2">
			   	</div>
			    <div class="layui-form-mid layui-word-aux">是否参与满减、满送活动</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">参与预约</label>
			    <div class="layui-input-inline">
				  	<input type="radio" name="txtreserve" value="1" title="参与预约" lay-verify="radio2">
			      <input type="radio" name="txtreserve" value="2" title="不参与" lay-verify="radio2">
			  	</div>
			   <div class="layui-form-mid layui-word-aux">是否参与微信预约</div>
				</div>					    	  
		  	<div class="layui-form-item">
		    	<div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
		    	</div>
		  	</div>
			</form>
		</div>
	</script>
	<!--修改商品弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="../../js/pinying.js"></script>
	<script>
	layui.use(["layer", "element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['mgoods_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['mgoods_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "mgoods.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
				}
			}
		});
		objform.verify({
			radio: function(strvalue, objitem) {
				var obj = $("#laimi-modal-add input:radio[name='txttype']:checked");
				if(obj.length == 0) {
					return '请选择商品类型！';
				}
				obj = $("#laimi-modal-add input:radio[name='txtact']:checked");
				if(obj.length == 0) {
					return '请选择是否参与活动！';
				}
				obj = $("#laimi-modal-add input:radio[name='txtreserve']:checked");
				if(obj.length == 0) {
					return '请选择是否参与预约！';
				}
			},
			radio2: function(strvalue, objitem) {
				var obj = $("#laimi-modal-edit input:radio[name='txtact']:checked");
				if(obj.length == 0) {
					return '请选择是否参与活动！';
				}
				obj = $("#laimi-modal-edit input:radio[name='txtreserve']:checked");
				if(obj.length == 0) {
					return '请选择是否参与预约！';
				}
			}
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增商品", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html()
			});
			objform.render(null, "laimi-form-add");	//刷新select选择框渲染
			$("#laimi-modal-add input[name='txtname']").blur(function() {
				var strname = $("#laimi-modal-add input[name='txtname']").val().trim();
			  if(strname != "") {
			  	$("#laimi-modal-add input[name='txtjianpin']").val(makePy(strname)[0]);
			  }
			});
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
		  var objthis = $(this);
		  objthis.attr('disabled', true);
		  $.post("mgoods_add_do.php", objdata.field, function(strdata) {
		    if(strdata == 0) {
		      window.location.reload();
		    } else if(strdata == 2) {
	        objlayer.alert('商品编码重复！', {
						title: '提示信息'
					});
	      } else {
	      	console.log(strdata);
	        objlayer.alert('新增商品失败，请联系管理员！', {
						title: '提示信息'
					});
	      }
		    objthis.attr('disabled', false);
		  });
			return false;
		});
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改商品", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,	//点击遮罩关闭
				content: $("#laimi-script-edit").html()
			});
			var strid = $(this).val();
	    $.getJSON("mgoods_edit_ajax.php", {id:strid}, function(objdata) {
	      $("#laimi-modal-edit input[name='txtid']").val(objdata.mgoods_id);
	      $("#laimi-modal-edit option").each(function() {
	      	if($(this).val() == objdata.mgoods_catalog_id) {
            $(this).attr('selected', true);
          }
	      });
	      $("#laimi-modal-edit input[name='txtname']").val(objdata.mgoods_name);
	      $("#laimi-modal-edit input[name='txtjianpin']").val(objdata.mgoods_jianpin);
	      $("#laimi-modal-edit input[name='txtcode']").val(objdata.mgoods_code);
	      $("#laimi-modal-edit input[name='txtprice']").val(objdata.mgoods_price);
	      $("#laimi-modal-edit input[name='txtcprice']").val(objdata.mgoods_cprice);
	      if(objdata.mgoods_type == 1) {
	      	$("#laimi-type").html("服务（无库存）");
	      } else if(objdata.mgoods_type == 2) {
	      	$("#laimi-type").html("商品（有库存）");
	      }
	      $("#laimi-modal-edit input[name='txtact']").each(function() {
	      	if($(this).val() == objdata.mgoods_act) {
            $(this).attr('checked', true);
          }
	      });
	      $("#laimi-modal-edit input[name='txtreserve']").each(function() {
	      	if($(this).val() == objdata.mgoods_reserve) {
            $(this).attr('checked', true);
          }
	      });
	      objform.render(null, "laimi-form-edit");	//刷新select选择框渲染
				$("#laimi-modal-edit input[name='txtname']").blur(function() {
					var strname = $("#laimi-modal-edit input[name='txtname']").val().trim();
				  if(strname != "") {
				  	$("#laimi-modal-edit input[name='txtjianpin']").val(makePy(strname)[0]);
				  }
				});
	    });
  	});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
		  var objthis = $(this);
		  objthis.attr('disabled', true);
		  $.post("mgoods_edit_do.php", objdata.field, function(strdata) {
		    if(strdata == 0) {
		      window.location.reload();
		    } else if(strdata == 2) {
	        objlayer.alert('商品编码重复！', {
						title: '提示信息'
					});
	      } else {
	        objlayer.alert('修改商品失败，请联系管理员！', {
						title: '提示信息'
					});
	      }
		    objthis.attr('disabled', false);
		  });
			return false;
		});
	  $(".laimi-del").on("click", function() {
			var strid = $(this).val();
			objlayer.confirm('确定要删除该商品吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('mgoods_delete_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else if(strdata == 2) {
			  		objlayer.alert('套餐中含有此商品，不能删除！', {
			  			title: '提示信息'
			  		});
			  	} else if(strdata == 3) {
			  		objlayer.alert('体验券中含有此商品，不能删除！', {
			  			title: '提示信息'
			  		});
			  	} else if(strdata == 4) {
			  		objlayer.alert('会员卡券中含有此商品，不能删除！', {
			  			title: '提示信息'
			  		});
			  	} else if(strdata == 5) {
			  		objlayer.alert('满送活动中含有此商品，不能删除！', {
			  			title: '提示信息'
			  		});
			  	} else {
			  		objlayer.alert('删除商品失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
	  $(".laimi-state1").on("click", function() {
			var strid = $(this).val();
		  $.post('mgoods_state_do.php', {id:strid,state:2}, function(strdata) {
        if(strdata == 0) {
          window.location.reload();
        } else {
          objlayer.alert('停用商品失败，请联系管理员！', {
		  			title: '提示信息'
		  		});
        }
      });
		});
		$(".laimi-state2").on("click", function() {
			var strid = $(this).val();
		  $.post('mgoods_state_do.php', {id:strid,state:1}, function(strdata) {
        if(strdata == 0) {
          window.location.reload();
        } else {
          objlayer.alert('启用商品失败，请联系管理员！', {
		  			title: '提示信息'
		  		});
        }
      });
		});
	});
	</script>
</body>
</html>