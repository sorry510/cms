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
						<a href="cash.php">收支管理</a>
					</li>
					<li>
						<a href="cash_type.php">收支分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">收支类型</label>
		<div class="layui-input-inline" style="width:120px;">
			<select name="state">
				<option value="">全部类型</option>
				<option value="1" <?php if($this->_data['request']['state'] == 1) echo 'selected'; ?>>收入</option>
				<option value="2" <?php if($this->_data['request']['state'] == 2) echo 'selected'; ?>>支出</option>
			</select>
		</div>
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline" style="width:120px;">
			<select name="type">
				<option value="">全部分类</option>
				<?php foreach($this->_data['cash_type_list'] as $row){?>
				<option value="<?php echo $row['cash_type_id'];?>" <?php if($this->_data['request']['type']==$row['cash_type_id'])echo 'selected';?>><?php echo $row['cash_type_name'];?></option>
				<?php }?>
			</select>
		</div>
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" name="from" value="<?php echo $this->_data['request']['from'];?>">
		</div>
		<label class="layui-form-label laimi-input" style="width:0px;margin-right:10px">至</label>
		<div class="layui-input-inline last">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" name="to" value="<?php echo $this->_data['request']['to'];?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增收支</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>收支</th>
			<th>分类</th>
			<th>名称</th>
			<th>金额</th>
			<th>备注</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['cash_list']['list'] as $row){ ?>
		<tr>
			<td><?php echo $row['time']; ?></td>
			<td class="laimi-color-ju"><?php echo $row['state']; ?></td>
			<td><?php echo $row['cash_type_name']; ?></td>
			<td><?php echo $row['cash_name']; ?></td>
			<td>¥<?php echo $row['cash_money']; ?></td>	
			<td><?php echo $row['cash_memo']; ?></td>
			<td>
				<button type="button" class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['cash_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button type="button" class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['cash_id']; ?>">
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
	<!--新增操作员弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="add">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 类型</label>
			    <div class="layui-input-block">
			      <input type="radio" name="txtstate" value="1" title="收入" checked="">
			      <input type="radio" name="txtstate" value="2" title="支出">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分类</label>
			    <div class="layui-input-inline">
			      <select name="txttype" lay-verify="required">
			        <option value="" selected="">请选择分类</option>
			        <?php foreach($this->_data['cash_type_list'] as $row){?>
              <option value="<?php echo $row['cash_type_id'];?>"><?php echo $row['cash_type_name'];?></option>
              <?php }?>
			      </select>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 金额</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" placeholder="￥" type="text" name="txtmoney" lay-verify="required|number">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 日期</label>
			    <div class="layui-input-inline">
			    	<input id="laimi-time" class="layui-input laimi-input-200" type="text" name="txttime" placeholder="yyyy-MM-dd" lay-verify="required">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 备注</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtmemo" lay-verify="required"></textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-button-add" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
			    </div>
			  </div>
			  <div class="laimi-height-20">		  	
			  </div>
			</form>
		</div>
	</script>
	<!--新增操作员弹出层结束-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="edit">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 类型</label>
			    <div class="layui-input-block">
			      <input type="radio" name="txtstate" value="1" title="收入" {{ d.cash_state == '1' ? 'checked' : '' }}>
			      <input type="radio" name="txtstate" value="2" title="支出" {{ d.cash_state == '2' ? 'checked' : '' }}>
			      <input type="hidden" name="txtid" value="{{ d.cash_id }}">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 分类</label>
			    <div class="layui-input-inline">
			      <select name="txttype" lay-verify="required">
			        <option value="" selected="">请选择分类</option>
			        <?php foreach($this->_data['cash_type_list'] as $row){ ?>
              <option value="<?php echo $row['cash_type_id']; ?>" {{ d.cash_type_id == <?php echo $row['cash_type_id']; ?> ? 'selected' : '' }}><?php echo $row['cash_type_name']; ?></option>
              <?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 名称</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required" value="{{ d.cash_name }}">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 金额</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" placeholder="￥" type="text" name="txtmoney" lay-verify="required|number" value="{{ d.cash_money }}">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 日期</label>
			    <div class="layui-input-inline">
			    	<input id="laimi-time" class="layui-input laimi-input-200" type="text" name="txttime" placeholder="yyyy-MM-dd" lay-verify="required" value="{{ d.time }}">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 备注</label>
			    <div class="layui-input-block">
			      <textarea class="layui-textarea laimi-input-b80" name="txtmemo" lay-verify="required">
			      	{{ d.cash_memo }}
			      </textarea>
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-button-edit" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
			    </div>
			  </div>
			  <div class="laimi-height-20">
			  </div>
			</form>
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['cash_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['cash_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				var search = "<?php echo api_value_query($this->_data['request']); ?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
	  objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增收支", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html(),
				success: function(){
					objform.render(null, 'add');
					objdate.render({
						elem: '#laimi-time',
					});
				}
			});
		});
		objform.on("submit(laimi-button-add)", function(data) {
			$.post('cash_add_do.php', data.field, function(msg){
				console.log(msg);
				if(msg == 0){
					window.location.reload();
				}else{
					objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('cash_edit_ajax.php', {id:$(this).val()}, function(info){
				objlaytpl($("#laimi-script-edit").html()).render(info, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["修改收支", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html,
				  	success: function(){
				  		objform.render(null, 'edit');
							objdate.render({
								elem: '#laimi-time',
							});
				  	}
				  });
				});
			})
		});
		objform.on("submit(laimi-button-edit)", function(data) {
			$.post('cash_edit_do.php', data.field, function(msg){
				console.log(msg);
				if(msg == 0){
					window.location.reload();
				}else{
					objlayer.alert('修改失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示', shadeClose: true}, function(index){
			  $.post('cash_delete_do.php', {id:id}, function(msg){
			  	if(msg == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		})
	});
	</script>
</body>
</html>