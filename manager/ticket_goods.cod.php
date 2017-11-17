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
						<a href="ticket_goods.php">体验券管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-ticket_goods layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">体验券名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="name" value="<?php echo htmlspecialchars($this->_data['request']['ticket_name']); ?>">
		</div>
    <label class="layui-form-label">日期</label>
    <div class="layui-input-inline">
      <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
    </div>
    <label class="layui-form-label">至</label>
    <div class="layui-input-inline last">
      <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
    </div>
    <div class="layui-input-inline">
     	<button class="layui-btn layui-btn-normal" type="submit">搜索</button>
  	</div>
    <div class="laimi-float-right">
    	<a class="layui-btn laimi-add">新增体验券</a>
  	</div>
  </div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th width="130">日期</th>
			<th>名称</th>
			<th>面值</th>
			<th>体验内容</th>
			<th>有效期</th>
			<th>开始时间</th>
			<th>备注</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['ticket_goods_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['ticket_goods_atime']) ; ?></td>
        <td><?php echo $row['ticket_goods_name']; ?></td>
        <td><?php echo $row['ticket_goods_value']; ?></td>
        <td><?php echo $row['mgoods_name']; ?></td>
        <td><?php echo $row['ticket_goods_days']; ?>天</td>
        <td><?php echo $row['begin']; ?></td>
        <td><?php echo $row['ticket_goods_memo']; ?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['ticket_goods_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>		
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['ticket_goods_id']; ?>">
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
	<!--新增体验券弹出层开始-->
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>面值</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-100" type="text" name="txtvalue" placeholder="￥" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">元</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>体验商品</label>
					<div class="layui-input-inline">
						<select name="txtmgoods" lay-search>
							<option value="">请选择商品</option>
							<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
							<optgroup label="<?php echo $row['mgoods_catalog_name'];?>">
								<?php foreach($this->_data['mgoods'] as $row2) { 
									if ($row2['mgoods_catalog_id'] != $row['mgoods_catalog_id']) {
										continue;
									}
								?>
								<option value="<?php echo $row2['mgoods_id'];?>"><?php echo $row2['mgoods_name'];?></option>
								<?php };?>
							</optgroup>
							<?php };?>
						</select>
					</div>
					<div class="layui-form-mid layui-word-aux">下拉选择或搜索商品</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>有效期</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-100" type="text" name="txtdays" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">天</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>开始时间</label>
					<div class="layui-input-inline">
						<input type="radio" name="txtbegin" value="1" title="当天开始" checked="">
						<input type="radio" name="txtbegin" value="2" title="第二天开始">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-filter="laimi-submitadd" lay-submit>完成</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
	</script>
	<!--新增体验券弹出层结束-->
	<!--修改体验券弹出层开始-->
	<script type="text/html" id="laimi-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
						<input class="layui-input laimi-input-300" type="hidden" name="txtid">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>面值</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-100" type="text" name="txtvalue" placeholder="￥" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">元</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>体验商品</label>
					<div class="layui-input-inline">
						<select name="txtmgoods" lay-search>
							<option value="">请选择商品</option>
							<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
							<optgroup label="<?php echo $row['mgoods_catalog_name'];?>">
								<?php foreach($this->_data['mgoods'] as $row2) { 
									if ($row2['mgoods_catalog_id'] != $row['mgoods_catalog_id']) {
										continue;
									}
								?>
								<option value="<?php echo $row2['mgoods_id'];?>"><?php echo $row2['mgoods_name'];?></option>
								<?php };?>
							</optgroup>
							<?php };?>
						</select>
					</div>
					<div class="layui-form-mid layui-word-aux">下拉选择或搜索商品</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>有效期</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-100" type="text" name="txtdays" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">天</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span>开始时间</label>
					<div class="layui-input-inline">
						<input type="radio" name="txtbegin" value="1" title="当天开始" checked="">
						<input type="radio" name="txtbegin" value="2" title="第二天开始">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-filter="laimi-submitedit" lay-submit>完成</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
	</script>
	<!--新增体验券弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['ticket_goods_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['ticket_goods_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["新增体验券", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html()
			});
			objform.render(); //刷新select选择框渲染
		});
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改体验券", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-edit").html()
			});
			var url="ticket_goods_edit_ajax.php";
	    var data = $(this).val();
	    $.getJSON(url,{id:data},function(res){
	      $("#laimi-modal-edit input[name='txtid']").val(res.ticket_goods_id);
	      $("#laimi-modal-edit input[name='txtdays']").val(res.ticket_goods_days);
	      $("#laimi-modal-edit input[name='txtname']").val(res.ticket_goods_name);
	      $("#laimi-modal-edit input[name='txtvalue']").val(res.ticket_goods_value);
	      $("#laimi-modal-edit option").each(function () {
	      	if($(this).val()==res.mgoods_id){
            $(this).attr('selected',true);
          }
	      });
	      $("#laimi-modal-edit input[name='txtbegin']").each(function(){
          if($(this).val()==res.ticket_goods_begin){
            $(this).attr('checked',true);
          }
        });
	      $("#laimi-modal-edit textarea[name='txtmemo']").val(res.ticket_goods_memo);
	      objform.render(); //刷新select选择框渲染
	    });  
		});
		//添加
		objform.on("submit(laimi-submitadd)", function(data) {
			console.log(1);
			var _self = $(this);
      _self.attr('disabled',true);
      var url = "ticket_goods_add_do.php";
      $.post(url,data.field,function(res){
      	console.log(res);
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert('请完善数据');
          _self.attr("disabled",false);
        }else if(res=='100'){
          alert('有效期不能超过一年');
          _self.attr("disabled",false);
        }else{
          alert('添加失败');
          _self.attr("disabled",false);
        }
      });
			return false;
		});
		//修改
		objform.on("submit(laimi-submitedit)", function(data) {
			var _self = $(this);
	    _self.attr('disabled',true);
	    var url="ticket_goods_edit_do.php";
	    console.log(data.field);
	    $.post(url,data.field,function(res){
	      if(res=='0'){
	        window.location.reload();
	      }else if(res=='1'){
	        alert('请完善数据');
	        _self.attr("disabled",false);
	      }else if(res=='100'){
	        alert('有效期不能超过一年');
	        _self.attr("disabled",false);
	      }else{
	        alert('修改失败');
	        _self.attr("disabled",false);
	      }
	    });
			return false;
		});
		// 表格中删除功能
	  $(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('ticket_goods_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
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