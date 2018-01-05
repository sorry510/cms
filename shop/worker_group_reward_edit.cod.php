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
						<a href="worker_group_reward.php?id=<?php echo $GLOBALS['intid']; ?>">员工提成方案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-group-reward-edit layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
					<div class="layui-form-item">
						<label class="layui-form-label">办卡提成</label>
						<div class="layui-input-inline">
							<input class="layui-input laimi-input-100" type="text" name="create" value="<?php echo $this->_data['reward_list']['group_reward_create']?>">
							<input class="layui-input laimi-input-100" type="hidden" name="id" value="<?php echo $GLOBALS['intid'];?>">
						</div>
						 <div class="layui-form-mid layui-word-aux">元/会员</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">充值提成</label>
						<div class="layui-input-inline">
							<input type="radio" name="filltype" value="1" title="百分比(%)" <?php if($this->_data['reward_list']['group_reward_pfill']!=0) echo "checked"?> lay-verify="radio">
							<input type="radio" name="filltype" value="2" title="固定金额(元)" <?php if($this->_data['reward_list']['group_reward_fill']!=0) echo "checked"?> lay-verify="radio">
						</div>
						<div class="layui-input-inline">
							<input class="layui-input laimi-input-80" type="text" name="fill" value="<?php echo $this->_data['reward_list']['group_reward_pfill']!=0?$this->_data['reward_list']['group_reward_pfill']:$this->_data['reward_list']['group_reward_fill']; ?>">
						</div>
					</div>	
					<div class="layui-form-item">
						<label class="layui-form-label">导购提成</label>
						<div class="layui-input-inline">
							<input type="radio" name="guidetype" value="1" title="百分比(%)" <?php if($this->_data['reward_list']['group_reward_pguide']!=0) echo "checked"?> lay-verify="radio2">
							<input type="radio" name="guidetype" value="2" title="固定金额(元)" <?php if($this->_data['reward_list']['group_reward_guide']!=0) echo "checked"?> lay-verify="radio2">
						</div>
						<div class="layui-input-inline">
							<input class="layui-input laimi-input-80" type="text" name="guide" value="<?php echo $this->_data['reward_list']['group_reward_pguide']!=0?$this->_data['reward_list']['group_reward_pguide']:$this->_data['reward_list']['group_reward_guide']; ?>">
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
		<div class="layui-col-xs6">
			<div class="layui-tab">
				<ul class="layui-tab-title">
					<li class="layui-this">
						可选商品
					</li>
					<li>
						可选套餐
					</li>
				</ul>
				<div class="layui-tab-content" style="padding:0;">
					<div class="layui-tab-item layui-show" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th>价格</th>
									<th width="150">提成比例/金额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3" style="text-align:left;">
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
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-search">搜索</button>
								  	</div>
									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32 laimi-goods-all" type="text" name="txtpercent" placeholder="%">
										</div>
										<div class="layui-inline">
								     	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-allset1">批量设置</button>
								  	</div>
									</th>
								</tr>
								<?php foreach($this->_data['mgoods_list'] as $row){?>
									<?php foreach($row['mgoods'] as $row2){?>
								<tr class="laimi-goods" gtype="m" catalog="<?php echo $row['mgoods_catalog_id']?>">
									<td><?php echo $row['mgoods_catalog_name'];?></td>
									<td style="text-align:left;"><?php echo $row2['mgoods_name'];?></td>
									<td>￥<?php echo $row2['mgoods_price'];?></td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32 laimi-percent" type="text" name="txtpercent" placeholder="%" price="<?php echo $row2['mgoods_price'];?>" value="<?php echo $row2['group_reward2_percent'];?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32 laimi-money" type="text" name="txtmoney" placeholder="￥" price="<?php echo $row2['mgoods_price'];?>" catalog="<?php echo $row['mgoods_catalog_id']?>" mgoods="<?php echo $row2['mgoods_id']?>" value="<?php echo $row2['group_reward2_money'];?>">
										</div>
										<div class="layui-inline">元</div>
									</td>
								</tr>
									<?php }?>
								<?php }?>
								<?php foreach($this->_data['sgoods_list'] as $row){?>
									<?php foreach($row['sgoods'] as $row2){?>
								<tr class="laimi-goods" gtype="s" catalog="<?php echo $row['sgoods_catalog_id']?>">
									<td><?php echo $row['sgoods_catalog_name'];?></td>
									<td style="text-align:left;"><?php echo $row2['sgoods_name'];?></td>
									<td>￥<?php echo $row2['sgoods_price'];?></td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32 laimi-percent" type="text" name="txtpercent" placeholder="%" price="<?php echo $row2['sgoods_price'];?>" value="<?php echo $row2['group_reward2_percent'];?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32 laimi-money" type="text" name="txtmoney" placeholder="￥" price="<?php echo $row2['sgoods_price'];?>" catalog="<?php echo $row['sgoods_catalog_id']?>" sgoods="<?php echo $row2['sgoods_id']?>" value="<?php echo $row2['group_reward2_money'];?>">
										</div>
										<div class="layui-inline">元</div>
									</td>
								</tr>
									<?php }?>
								<?php }?>
							</tbody>
						</table>
					</div>
					<div class="layui-tab-item" style="overflow-y:auto; height:400px;">
						<table class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>套餐名称</th>
									<th>价格</th>
									<th width="150">提成比例/金额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="2" style="text-align:left;">

									</th>
									<th>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-60-32 laimi-mcombo-all" type="text" name="txtpercent" placeholder="%">
										</div>
										<div class="layui-inline">
									   	<button type="button" class="layui-btn layui-btn-small layui-btn-normal laimi-allset2">批量设置</button>
										</div>
									</th>
								</tr>
								<?php foreach($this->_data['mcombo_list'] as $row){?>
								<tr class="laimi-mcombo" mcombo="<?php echo $row['mcombo_id'];?>">
									<td style="text-align:left;"><?php echo $row['mcombo_name'];?></td>
									<td>￥<?php echo $row['mcombo_price'];?></td>
									<td style="padding:5px">
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32 laimi-percent" type="text" name="txtpercent" placeholder="%" price="<?php echo $row['mcombo_price'];?>" value="<?php echo $row['group_reward2_percent'];?>">
										</div>
										<div class="layui-inline">
											<input class="layui-input laimi-input-60-32 laimi-money" type="text" name="txtmoney" placeholder="￥" price="<?php echo $row['mcombo_price'];?>" mcombo="<?php echo $row['mcombo_id'];?>" value="<?php echo $row['group_reward2_money'];?>">
										</div>
										<div class="layui-inline">元</div>
									</td>
								</tr>
								<?php }?>
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
	<script>
	layui.use(["element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		objform.verify({
			radio: function(value, item){
				var val = $('input:radio[name="filltype"]:checked').val();
				if(!val){
					return '充值提成方式需要必选一个';
				}
			},
			radio2: function(value, item){
				var val = $('input:radio[name="guidetype"]:checked').val();
				if(!val){
					return '导购提成方式需要必选一个';
				}
			}
		});
		objform.on("submit(laimi-submit)", function(data) {
			var arr = [];
			var json = {};
			$("#laimi-main .laimi-money").each(function(){
			  if($(this).val() != ''){
			    if($(this).attr('mgoods')){
			      json = {'mgoods_catalog_id':$(this).attr('catalog'),'mgoods_id':$(this).attr('mgoods'),'money':$(this).val(),'percent':$(this).parent('div').siblings('div').find('input').val()};
			    }
			    if($(this).attr('sgoods')){
			      json = {'sgoods_catalog_id':$(this).attr('catalog'),'sgoods_id':$(this).attr('sgoods'),'money':$(this).val(),'percent':$(this).parent('div').siblings('div').find('input').val()};
			    }
			    if($(this).attr('mcombo')){
			      json = {'mcombo_id':$(this).attr('mcombo'),'money':$(this).val(),'percent':$(this).parent('div').siblings('div').find('input').val()};
			    }
			    arr.push(json);
			  }
			});
			var data = {
			  arr:arr,
			  reward_create:$("#laimi-main input[name='create']").val(),
			  reward_fill:$("#laimi-main input[name='fill']").val(),
			  fill_type:$("#laimi-main input[name='filltype']:checked").val(),
			  reward_guide:$("#laimi-main input[name='guide']").val(),
			  guide_type:$("#laimi-main input[name='guidetype']:checked").val(),
			  worker_group_id:$("#laimi-main input[name='id']").val()
			};
			// console.log(data);return false;
			$.post('worker_group_reward_edit_do.php', data, function(res){
				console.log(res);
			  if(res=='0'){
			    window.location.reload();
			  }else if(res=='1'){
			    objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
			  }else if(res=='2'){
			    objlayer.alert('更新失败，请联系管理员', {
						title: '提示信息'
					});
			  }else{
			    objlayer.alert('更新商品失败，请联系管理员', {
						title: '提示信息'
					});
			  }
			});
			return false;
		});
		//搜索分类JS
		$('.laimi-search').on('click',function(){
			var search = $("#laimi-main select[name='goodscatalog']").val() || 0;
			$("#laimi-main .laimi-allset1").val(search);
			if(search == 0){
				$('#laimi-main .laimi-goods').removeClass('layui-hide');
			}else{
				var arr = search.split("-");
				var type = arr[0];
				var id = arr[1];
				$('#laimi-main .laimi-goods').addClass('layui-hide');
				if(type == 'm')
					$("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='m']").removeClass('layui-hide');
				if(type == 's')
					$("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='s']").removeClass('layui-hide');
			}
		});
		//批量商品价格
		$('#laimi-main .laimi-allset1').on('click',function () {
		  var catalog = $(this).val() || 0;
		  var price = $('#laimi-main .laimi-goods-all').val();
		  var elm = null;
		  if(catalog == 0){
		  	elm = $("#laimi-main .laimi-goods").find('.laimi-percent');
		  }else{
		  	var arr = catalog.split("-");
		  	var type = arr[0];
		  	var id = arr[1];
		  	if(type == 'm')
		  		elm = $("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='m']").find('.laimi-percent');
		  	if(type == 's')
		  		elm = $("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='s']").find('.laimi-percent');
		  }
	    elm.val(price);
	    $.each(elm, translate1);
		});
		//批量套餐价格
		$('#laimi-main .laimi-allset2').on('click',function () {
		  var price = $('#laimi-main .laimi-mcombo-all').val();
		  var elm = $("#laimi-main .laimi-mcombo").find('.laimi-percent');
		  elm.val(price);
		  $.each(elm, translate1);
		});
		//修改百分比或价格
		$("#laimi-main .laimi-percent").on("input propertychange", translate1);
		$("#laimi-main .laimi-money").on("input propertychange", translate2);
		//转换%=>元
		function translate1(){
		  if(isNaN($(this).val())){
		    $(this).val('');
		    $(this).parent('div').siblings('div').find('input').val('');
		  }else{
		    var discount = $(this).val();
		    var yprice = Number($(this).attr('price'));
		    if(discount > 0){
		      var nprice = yprice * discount / 100;
		      nprice = nprice.toFixed(2);
		      $(this).parent('div').siblings('div').find('input').val(nprice);
		    }else{
		      $(this).val('');
		      $(this).parent('div').siblings('div').find('input').val('');
		    }
		  }
		}
		//转换元=>%
		function translate2(){
		  if(isNaN($(this).val())){
		    $(this).val('');
		    $(this).parent('div').siblings('div').find('input').val('');
		  }else{
		    var nprice = $(this).val();
		    var yprice = Number($(this).attr('price'));
		    if(nprice > 0){
		      var discount = nprice / yprice * 100;
		      discount = discount.toFixed(2);
		      $(this).parent('div').siblings('div').find('input').val(discount);
		    }else{
		      $(this).val('');
		      $(this).parent('div').siblings('div').find('input').val('');
		    }
		  }
		}

	});
	</script>
</body>
</html>