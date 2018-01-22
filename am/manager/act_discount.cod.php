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
						<a href="act_discount.php">限时打折</a>
					</li>
					<li class="<?php if($GLOBALS['intexpire'] == 1) echo 'layui-this'; ?>">
						<a href="act_discount.php?expire=1">已结束</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount layui-tab-content">
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
			<a class="layui-btn" href="act_discount_add.php">新增打折活动</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>名称</th>
			<th>顾客类型</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>备注</th>
			<th>状态</th>
			<th width="190">操作</th>
		</tr> 
  </thead>
	<tbody>
		<?php foreach($this->_data['act_discount_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['act_discount_atime']) ; ?></td>
			<td><?php echo $row['act_discount_name']; ?></td>
			<td><?php echo $row['myclient'] ;?></td>
			<td><?php echo date('Y-m-d', $row['act_discount_start']); ?></td>
			<td><?php echo date('Y-m-d', $row['act_discount_end']); ?></td>
			<td><?php echo $row['act_discount_memo']; ?></td>
			<td><?php echo $row['mystate']; ?></td>
			<td>
        <?php if($row['mystate2'] == 'a') { ?>
        <button class="layui-btn layui-btn-mini laimi-edit" onclick="window.location='act_discount_edit.php?id=<?php echo $row['act_discount_id']; ?>'">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['act_discount_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
				<?php if($row['act_discount_state'] == 1) { ?>
				<button class="layui-btn layui-bg-red layui-btn-mini laimi-stop" value="<?php echo $row['act_discount_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停止
				</button>
				<?php } else { ?>
				<button class="layui-btn layui-bg-blue layui-btn-mini laimi-start" value="<?php echo $row['act_discount_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
					启用
				</button>
        <?php } ?>
        <?php } ?>
        <?php if($row['mystate2'] == 'b') { ?>
				<button class="layui-btn layui-btn-mini laimi-edit" onclick="window.location='act_discount_edit.php?id=<?php echo $row['act_discount_id']; ?>'">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<?php if($row['act_discount_state'] == 1) { ?>
				<button class="layui-btn layui-bg-red layui-btn-mini laimi-stop" value="<?php echo $row['act_discount_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					停止
				</button>
				<?php } else { ?>
				<button class="layui-btn layui-bg-blue layui-btn-mini laimi-start" value="<?php echo $row['act_discount_id']; ?>">
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
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "laypage"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;

		$('.laimi-focus').focus();
		
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['act_discount_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['act_discount_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "act_discount.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
      	}
			}
		});
		//停用操作
	  $(".laimi-stop").on("click", function() {
      var objdata = {
        id:$(this).val(),
        state:2
      }
			objlayer.confirm('确定要停止该活动吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post("act_discount_state_do.php", objdata, function(strdata) {
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
			  $.post("act_discount_state_do.php", objdata, function(strdata) {
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
			  $.post('act_discount_delete_do.php', {id:strid}, function(strdata) {
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