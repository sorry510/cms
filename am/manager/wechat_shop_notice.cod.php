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
						<a href="wechat_shop_notice.php">商城公告</a>
					</li>
					<li>
						<a href="wechat_shop_notice_add.php">新增公告</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">							
		<div class="layui-inline laimi-float-right">
			<a href="wechat_shop_notice_add.php" class="layui-btn">
				新增公告
			</a>
		</div>
	</div>
	<table class="layui-table">
		<thead>
			<tr>
				<th>发布时间</th>
				<th>标题名称</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->_data['wnotice_list']['list'] as $row) { ?>
			<tr>
				<td><?php echo date('Y-m-d H:i',$row['wnotice_atime']); ?></td>
				<td><?php echo $row['wnotice_title']; ?></td>
				<td>
					<button type="button" class="layui-btn layui-btn-mini laimi-edit" onclick="window.location.href='wechat_shop_notice_edit.php?id=<?php echo $row['wnotice_id'];?>'">
						<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
						修改
					</button>
					<button type="button" class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['wnotice_id'];?>">
						<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shanchu1"></use></svg>
						删除
					</button>
				</td>
			</tr>
			<?php };?>
		</tbody>
	</table>
</form>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
	</div>
</div>
			</div>
		</div>		
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['wnotice_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['wnotice_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		//删除操作JS
	  $(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('wechat_shop_notice_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else if(res=='1'){
			  		objlayer.alert("分类下有商品，不能删除！", {
			  			title: '提示信息'
			  		});
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		});
	});
	</script>
	</body>
</html>