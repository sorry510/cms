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
						<a href="wechat_shop_manage.php">商品管理</a>
					</li>
					<li>
						<a href="wechat_shop_class.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label laimi-input">商品名称</label>
		<div class="layui-input-inline">
			<input type="tel" name="search" placeholder="商品名称/简拼/编码" value="<?php echo htmlspecialchars($this->_data['request']['search']); ?>" class="layui-input">
		</div>
		<label class="layui-form-label laimi-input">商品分类</label>
		<div class="layui-input-inline">
			<select name="wgoods_catalog_id">
				<option value="">请选择分类</option>
				<?php foreach($this->_data['wgoods_catalog_list'] as $row) { ?>
        <option value="<?php echo $row['wgoods_catalog_id'] ?>" <?php if($row['wgoods_catalog_id'] == $this->_data['request']['wgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['wgoods_catalog_name'] ?></option>
        <?php } ?>
			</select>
		</div>
		<div class="layui-inline">
     	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
  	</div>
	  <div class="layui-inline laimi-float-right">
			<a href="wechat_shop_manage_add.php" class="layui-btn">
				新增商品
			</a>
		</div>
	</div>
</form>
<form class="layui-form">
	<table class="layui-table">
		<thead>
			<tr>
				<th width="80">商品分类</th>
				<th>商品名称</th>
				<th>商品编码</th>
				<th width="80">价格</th>
				<th width="80">会员价</th>
				<th width="80">佣金提成</th>
				<th width="80">库存</th>									
				<th width="80">是否推荐</th>	
				<th width="80">状态</th>
				<th width="200">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->_data['wgoods_list']['list'] as $row) { ?>
			<tr>
				<td><?php echo $row['wgoods_catalog_name']; ?></td>
	      <td><?php echo $row['wgoods_name']; ?></td>
	      <td><?php echo $row['wgoods_code']==''?'暂无编码':$row['wgoods_code']; ?></td>
	      <td>¥<?php echo $row['wgoods_price']; ?></td>
				<td><?php echo $row['wgoods_cprice']==0?'--':'¥'.$row['wgoods_cprice']; ?></td>
				<td><?php echo $row['wgoods_reward']==0?'--':'¥'.$row['wgoods_reward']; ?></td>
				<td><?php echo $row['wgoods_store']; ?></td>
				<td><?php echo $row['commend']; ?></td>
				<td style="padding: 0px;"><input class="laimi-state" type="checkbox" name="close" wgoods_id="<?php echo $row['wgoods_id']; ?>" lay-skin="switch" lay-text="上架|下架" <?php if($row['wgoods_state'] == 1) echo 'checked';?>></td>
				<td style="padding: 0px;">
					<button type="button" onclick="window.location.href='wechat_shop_manage_edit.php?id=<?php echo $row['wgoods_id'];?>'" class="layui-btn layui-btn-mini laimi-edit">
						<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
						修改
					</button>
					<?php if($row['wgoods_commend'] == 2){
                echo '<button type="button" class="layui-btn layui-bg-red layui-btn-mini laimi-commend" value="'.$row["wgoods_id"].'" state="'.$row['wgoods_commend'].'">
                        <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
                        推荐
                      </button>';
              }else if($row['wgoods_commend'] == 1){
                echo '<button type="button" class="layui-btn layui-bg-blue layui-btn-mini laimi-commend2" value="'.$row["wgoods_id"].'" state="'.$row['wgoods_commend'].'">
                        <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
                        取消
                      </button>';
              }
        ?>
					<button type="button" class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['wgoods_id']; ?>">
						<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
						删除
					</button>
				</td>										
			</tr>
			<?php } ?>
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
	layui.use(["element", "laydate", "laypage", "upload", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		var objdate = layui.laydate;
		objform.render();
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['wgoods_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['wgoods_list']['pagenow'];?>,
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
			  $.post('wechat_shop_manage_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else if(res=='1'){
			  		objlayer.alert("套餐中含有此商品，不能删除！", {
			  			title: '提示信息'
			  		});
			  	}else if(res=='2'){
			  		objlayer.alert("优惠券中含有此商品，不能删除！", {
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
		//推荐不推荐
	  $(".laimi-commend").on("click", function() {
			var id = $(this).val();
			var data = {
				wgoods_id:id,
				wgoods_commend:1
			}
			console.log(data);
		  $.post('wgoods_commend_do.php',data,function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          objlayer.alert('推荐失败', {
		  			title: '提示信息'
		  		});
        }
      });
		});
		$(".laimi-commend2").on("click", function() {
			var id = $(this).val();
			var data = {
				wgoods_id:id,
				wgoods_commend:2
			}
			console.log(data);
		  $.post('wgoods_commend_do.php',data,function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          objlayer.alert('取消失败', {
		  			title: '提示信息'
		  		});
        }
      });
		});
		//停用启用
	  $(".layui-form-switch").on("click", function() {
	  	$(this).siblings('input').attr('disabled',true);
			var id = $(this).siblings('input').attr('wgoods_id');
			objform.render();
		  $.post('wechat_shop_manage_state_do.php',{'wgoods_id':id},function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res!='0'){
          objlayer.alert('修改失败', {
		  			title: '提示信息'
		  		});
        }
      });
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
	</body>
</html>