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
					<li class="<?php if($GLOBALS['intexpire'] != 1) echo 'layui-this'; ?>">
						<a href="act_decrease.php">满减活动</a>
					</li>
					<li class="<?php if($GLOBALS['intexpire'] == 1) echo 'layui-this'; ?>">
						<a href="act_decrease.php?expire=1">已结束</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-decrease layui-tab-content">
<form class="layui-form">
<input class="layui-input" type="hidden" name="expire" value="<?php echo htmlspecialchars($GLOBALS['strexpire']); ?>">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-focus" type="text" name="name" value="<?php echo htmlspecialchars($GLOBALS['strname']); ?>">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" value="<?php echo htmlspecialchars($GLOBALS['strfrom']); ?>" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline last">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" value="<?php echo htmlspecialchars($GLOBALS['strto']); ?>" placeholder="yyyy-MM-dd">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增满减活动</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>名称</th>
			<th>顾客类型</th>
			<th>满减金额</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>备注</th>
			<th>状态</th>
			<th width="190">操作</th>
		</tr> 
  </thead>
	<tbody>
		<?php foreach($this->_data['act_decrease_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i', $row['act_decrease_atime']); ?></td>
			<td><?php echo $row['act_decrease_name']; ?></td>
			<td><?php echo $row['myclient']; ?></td>
			<td>满<?php echo $row['act_decrease_man'] + 0; ?>减<?php echo $row['act_decrease_jian'] + 0; ?></td>
			<td><?php echo date('Y-m-d', $row['act_decrease_start']); ?></td>
      <td><?php echo date('Y-m-d', $row['act_decrease_end']); ?></td>
			<td><?php echo $row['act_decrease_memo']; ?></td>
			<td><?php echo $row['mystate']; ?></td>
			<td>
        <?php if($row['mystate2'] == 'a') { ?>
        <button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
				<?php if($row['act_decrease_state'] == 1) { ?>
				<button class="layui-btn layui-bg-red layui-btn-mini laimi-stop" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停止
				</button>
				<?php } else { ?>
				<button class="layui-btn layui-bg-blue layui-btn-mini laimi-start" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
					启用
				</button>
        <?php } ?>
        <?php } ?>
        <?php if($row['mystate2'] == 'b') { ?>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<?php if($row['act_decrease_state'] == 1) { ?>
				<button class="layui-btn layui-bg-red layui-btn-mini laimi-stop" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停止
				</button>
				<?php } else { ?>
				<button class="layui-btn layui-bg-blue layui-btn-mini laimi-start" value="<?php echo $row['act_decrease_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
					启用
				</button>
        <?php } ?>
        <?php } ?>
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
	<!--新增满减活动弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-add">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 活动名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 顾客类型</label>
					<div class="layui-input-inline">
						<input type="radio" name="txtclient" value="1" title="不限制" checked>
						<input type="radio" name="txtclient" value="2" title="会员">
						<input type="radio" name="txtclient" value="3" title="非会员">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 实付满</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtman" placeholder="￥" lay-verify="number">
					</div>
					<div class="layui-form-mid layui-word-aux">减</div>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtjian" placeholder="￥" lay-verify="number">
					</div>
					<div class="layui-form-mid layui-word-aux">元，例：满200减50元</div>				
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 开始时间</label>
					<div class="layui-input-inline">
						<input id="laimi-from2" class="layui-input" type="text" name="txtstart" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 结束时间</label>
					<div class="layui-input-inline">
						<input id="laimi-to2" class="layui-input" type="text" name="txtend" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
					</div>
				</div>				
				<div class="layui-form-item">
			    <div class="layui-input-block laimi-buttom-20">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-add" lay-submit>完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>	
		</div>
	</script>
	<!--新增满减活动弹出层结束-->
	<!--修改满减活动弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-edit">
			<input class="layui-input laimi-input-300" type="hidden" name="txtid">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 活动名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 顾客类型</label>
					<div class="layui-input-inline">
						<input type="radio" name="txtclient" value="1" title="不限制" checked>
						<input type="radio" name="txtclient" value="2" title="会员">
						<input type="radio" name="txtclient" value="3" title="非会员">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 实付满</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtman" placeholder="￥" lay-verify="number">
					</div>
					<div class="layui-form-mid layui-word-aux">减</div>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtjian" placeholder="￥" lay-verify="number">
					</div>
					<div class="layui-form-mid layui-word-aux">元，例：满200减50元</div>				
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 开始时间</label>
					<div class="layui-input-inline">
						<input id="laimi-from3" class="layui-input" type="text" name="txtstart" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 结束时间</label>
					<div class="layui-input-inline">
						<input id="laimi-to3" class="layui-input" type="text" name="txtend" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
					</div>
				</div>				
				<div class="layui-form-item">
			    <div class="layui-input-block laimi-buttom-20">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>	
		</div>
	</script>
	<!--修改满减活动弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;

		$('.laimi-focus').focus();
		
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['act_decrease_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['act_decrease_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "act_decrease.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
      	}
			}
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增满减活动", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html()
			});
			objform.render(null, "laimi-form-add"); //刷新select选择框渲染
			objdate.render({
				elem: '#laimi-from2'
			});
			objdate.render({
				elem: '#laimi-to2'
			});
		});
		//添加操作
		objform.on("submit(laimi-submit-add)", function(objdata) {
			$(this).attr('disabled', true);
			$.post("act_decrease_add_do.php", objdata.field, function(strdata) {
	      if(strdata == 0) {
	        window.location = "act_decrease.php";
	      } else if(strdata == 2) {
		    	objlayer.alert("请填写正确的开始时间和结束时间！", {
						title: '提示信息'
					});
		      $(".laimi-add").attr("disabled", false);
		    } else {
	        objlayer.alert('新增满减活动失败，请联系管理员！', {
						title: '提示信息'
					});
	      }
	      $(this).attr('disabled', false);
	    });
			return false;
		});
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改满减活动", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-edit").html()
			});
		  var strid = $(this).val();
		  $.getJSON("act_decrease_edit_ajax.php", {id:strid}, function(objdata) {
		    $("#laimi-modal-edit input[name='txtid']").val(objdata.act_decrease_id);
		    $("#laimi-modal-edit input[name='txtname']").val(objdata.act_decrease_name);
		    $("#laimi-modal-edit input[name='txtclient']").each(function() {
	        if($(this).val() == objdata.act_decrease_client){
	          $(this).attr('checked', true);
	        }
	      });
		    $("#laimi-modal-edit input[name='txtman']").val(objdata.act_decrease_man);
		    $("#laimi-modal-edit input[name='txtjian']").val(objdata.act_decrease_jian);
		    $("#laimi-modal-edit textarea[name='txtmemo']").val(objdata.act_decrease_memo);
		    objform.render(null, "laimi-form-edit"); //刷新select选择框渲染
			  objdate.render({
					elem: '#laimi-from3',
					value: objdata.act_decrease_start
				});
				objdate.render({
					elem: '#laimi-to3',
					value: objdata.act_decrease_end
				});
		  });
		});
		//修改操作
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			$(this).attr('disabled', true);
	    $.post("act_decrease_edit_do.php", objdata.field, function(strdata) {
	      if(strdata == 0) {
	        window.location.reload();
	      } else if(strdata == 2) {
		    	objlayer.alert("请填写正确的开始时间和结束时间！", {
						title: '提示信息'
					});
		      $(".laimi-edit").attr("disabled", false);
		    } else {
	        objlayer.alert('修改满减活动失败，请联系管理员！', {
						title: '提示信息'
					});
	      }
	      $(this).attr('disabled', false);
	    });
			return false;
		});
		//停用操作
	  $(".laimi-stop").on("click", function() {
      var objdata = {
        id:$(this).val(),
        state:2
      }
			objlayer.confirm('确定要停止该活动吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post("act_decrease_state_do.php", objdata, function(strdata) {
	        if(strdata == 0) {
	          window.location.reload();
	        } else {
	          objlayer.alert("操作失败，请联系管理员！", {
							title: '提示信息'
						});
	        }
	      });
			  objlayer.close(hindex);
			});
		});
		//启用操作
	  $(".laimi-start").on("click", function() {
      var objdata = {
        id:$(this).val(),
        state:1
      }
			objlayer.confirm("确定要启用该活动吗？", {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post("act_decrease_state_do.php", objdata, function(strdata) {
	        if(strdata == 0) {
	          window.location.reload();
	        } else {
	          objlayer.alert("操作失败，请联系管理员！", {
							title: '提示信息'
						});
	        }
	      });
			  objlayer.close(hindex);
			});
		});
		//删除操作
	  $(".laimi-del").on("click", function() {
			var strid = $(this).val();
			objlayer.confirm('确定要删除该活动吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('act_decrease_delete_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('删除活动失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
	});
	</script>
</body>
</html>