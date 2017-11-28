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
						<a href="store.php">入库和入库</a>
					</li>
					<li class="layui-this">
						<a href="store_add.php">新增出库/入库</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group-reward-edit layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs5" style="padding-top:10px;">
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 类型</label>
				<div class="layui-input-inline">
					<input type="radio" name="type" value="1" title="入库" checked>
					<input type="radio" name="type" value="2" title="出库">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 时间</label>
				<div class="layui-input-inline">
					<input id="laimi-from" class="layui-input laimi-input-200" type="text" name="time" placeholder="yyyy-MM-dd" lay-verify="required">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><span>*</span> 金额</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-100" placeholder="￥" type="text" name="money" lay-verify="required|number">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">经办人</label>
				<div class="layui-input-inline">
					<input class="layui-input laimi-input-200" type="text" name="operator">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">备注</label>
				<div class="layui-input-inline">
					<textarea class="layui-textarea" name="memo" style="width:300px;"></textarea>
				</div>
			</div>		
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
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
						<th width="80">分类</th>
						<th>商品名称</th>
						<th width="60">价格</th>
						<th width="60">数量</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th colspan="4" style="text-align:left;margin:0 auto;">
							<div class="layui-input-inline">
								<select name="goodscatalog" lay-search>
									<option value="">请选择分类</option>
									<?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 'm-'.$row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                	<?php } ?>
                	<?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 's-'.$row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
                	<?php } ?>
								</select>
							</div>
							<div class="layui-input-inline last">
								<input class="layui-input laimi-input-200 laimi-search" type="text" placeholder="商品名称/编码/简拼">
							</div>
							<div class="layui-inline">
					     	<button type="button" class="layui-btn layui-btn-normal laimi-button-search">搜索</button>
					  		</div>
						</th>
					</tr>
					<?php foreach($this->_data['mgoods_list'] as $row){?>
					<tr class="laimi-goods" gtype="m" catalog="<?php echo $row['mgoods_catalog_id']; ?>" gcode="<?php echo $row['mgoods_code']; ?>" gname="<?php echo $row['mgoods_name']; ?>" gshort="<?php echo $row['mgoods_jianpin']; ?>">
						<td><?php echo $row['mgoods_catalog_name'];?></td>
						<td style="text-align:left;"><?php echo $row['mgoods_name'];?></td>
						<td>￥<?php echo $row['mgoods_price'];?></td>
						<td style="padding:5px">
							<div class="layui-inline">
								<input class="layui-input laimi-input-60-32 laimi-number" type="text" name="txtnum" price="<?php echo $row['mgoods_price'];?>" gname="<?php echo $row['mgoods_name']; ?>" catalog="<?php echo $row['mgoods_catalog_id']?>" mgoods="<?php echo $row['mgoods_id']?>">
							</div>
						</td>
					</tr>
					<?php }?>
					<?php foreach($this->_data['sgoods_list'] as $row){?>
					<tr class="laimi-goods" gtype="s" catalog="<?php echo $row['sgoods_catalog_id']; ?>" code="<?php echo $row['sgoods_code']; ?>" gname="<?php echo $row['sgoods_name']; ?>" gshort="<?php echo $row['sgoods_jianpin']; ?>">
						<td><?php echo $row['sgoods_catalog_name'];?></td>
						<td style="text-align:left;"><?php echo $row['sgoods_name'];?></td>
						<td>￥<?php echo $row['sgoods_price'];?></td>
						<td style="padding:5px">
							<div class="layui-inline">
								<input class="layui-input laimi-input-60-32 laimi-number" type="text" name="txtnum" price="<?php echo $row['sgoods_price'];?>" gname="<?php echo $row['sgoods_name']; ?>" catalog="<?php echo $row['sgoods_catalog_id']?>" sgoods="<?php echo $row['sgoods_id']?>">
							</div>
						</td>
					</tr>
					<?php }?>
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
	layui.use(["element", "laydate", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;		
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		//搜索分类JS
		$('.laimi-button-search').on('click',function(){
			var search = $("#laimi-main select[name='goodscatalog']").val() || 0;
			var goods = $("#laimi-main .laimi-search").val() || '';
			goods = $.trim(goods);
			$('#laimi-main .laimi-goods').addClass('layui-hide');
			if(search == 0){
				if(goods == ''){
					$('#laimi-main .laimi-goods').removeClass('layui-hide');
				}else{
					$.each($('#laimi-main .laimi-goods'), function(){
						if($(this).attr('gname') == goods || $(this).attr('gcode') == goods || $(this).attr('gshort') == goods){
							$(this).removeClass('layui-hide');
						}
					})
				}
			}else{
				var arr = search.split("-");
				var type = arr[0];
				var id = arr[1];
				if(goods == ''){
					if(type == 'm')
						$("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='m']").removeClass('layui-hide');
					if(type == 's')
						$("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='s']").removeClass('layui-hide');
				}else{
					if(type == 'm'){
						$.each($("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='m']"), function(){
							if($(this).attr('gname') == goods || $(this).attr('gcode') == goods || $(this).attr('gshort') == goods){
								$(this).removeClass('layui-hide');
							}
						})
					}
					if(type == 's'){
						$.each($("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='s']"), function(){
							if($(this).attr('gname') == goods || $(this).attr('gcode') == goods || $(this).attr('gshort') == goods){
								$(this).removeClass('layui-hide');
							}
						})
					}
				}
			}
		});
		objform.on("submit(laimi-submit)", function(data) {
			var arr= [];
			$(".laimi-number").each(function(k,v){
			  if($(this).attr('mgoods')){
			    var json = {'mgoods_id':$(this).attr('mgoods'),'num':$(this).val(),'mgoods_name':$(this).attr('gname')};
			  }
			  if($(this).attr('sgoods')){
			    var json = {'sgoods_id':$(this).attr('sgoods'),'num':$(this).val(),'sgoods_name':$(this).attr('gname')};
			  }
			  arr.push(json);
			});
			var datapackage = {
	      arr: arr,
	      store_time: data.field.time,
	      store_type: data.field.type,
	      store_money: data.field.money,
	      store_operator: data.field.operator,
	      store_memo: data.field.memo,
	    }
			// console.log(datapackage);return false;
			$.post('store_add_do.php', datapackage, function(msg){
				console.log(msg);
			  if(msg == '0'){
			    window.location.href="./store.php";
			  }else if(msg == '1'){
			    objlayer.alert('商品不能为空', {
						title: '提示信息'
					});
			  }else if(msg == '2'){
			    objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
			  }else{
			    objlayer.alert('新增商品失败，请联系管理员', {
						title: '提示信息'
					});
			  }
			});
			return false;
		});
	});
	</script>
</body>
</html>