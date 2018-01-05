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
						<a href="record.php">消费明细</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-record layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">分店</label>
		<div class="layui-input-inline">
			<select name="shop_id">
				<option value="">全部分店</option>
				<?php foreach($GLOBALS['gshop'] as $row) { ?>
				<option value="<?php echo $row['shop_id']; ?>"<?php if($row['shop_id'] == $GLOBALS['intshop']) echo " selected"; ?>><?php echo $row['shop_name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<label class="layui-form-label">卡类型</label>
		<div class="layui-input-inline">
			<select name="cardtype">
				<option value="">全部卡类型</option>
				<option value="0"<?php if($GLOBALS['strcardtype'] != '' && $GLOBALS['intcardtype'] == 0) echo " selected"; ?>>未设置</option>
				<?php foreach($this->_data['card_type_list'] as $row) { ?>
				<option value="<?php echo $row['card_type_id']; ?>"<?php if($row['card_type_id'] == $GLOBALS['intcardtype']) echo " selected"; ?>><?php echo $row['card_type_name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strfrom']; ?>">
		</div>
		<label class="layui-form-label laimi-input">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strfrom']; ?>">
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="key" placeholder="卡号/手机号/姓名" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>时间</th>
			<th>单号</th>
			<th>卡号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>手机</th>
			<th>消费类型</th>
			<th>付款方式</th>
			<th>金额</th>
			<th>分店</th>
			<th>状态</th>
			<th width="90">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['card_records_list']['list'] as $row){?>
		<tr>
			<td><?php echo date('Y-m-d', $row['card_record_atime']); ?></td>
			<td><?php echo $row['card_record_code'];?></td>
			<td><?php echo $row['c_card_code'];?></td>
			<td><?php echo $row['c_card_name'];?></td>
			<td><?php echo $row['mysex'];?></td>	
			<td><?php echo $row['c_card_phone'];?></td>
			<td><?php echo $row['recordtype'];?></td>
			<td><?php echo $row['paytype'];?></td>
			<td><span class="laimi-color-ju">¥<?php echo $row['card_record_smoney'];?></span></td>
			<td><?php echo $row['shop_name'];?></td>
			<td><?php echo $row['state'];?></td>
			<td>
				<button type="button" class="layui-btn layui-btn-mini laimi-info" value="<?php echo $row['card_record_id'];?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					订单明细
				</button>
			</td>
		</tr>
	<?php }?>
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
	<script type="text/html" id="laimi-script-info">
		<div id="laimi-modal-info" class="laimi-modal">
			<div class="layui-row">	    
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">消费时间</label>
				    <div class="layui-form-mid layui-word-aux">{{d.atime}}</div>
				  </div>
		    </div>	    
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">会员卡号</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_code}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">会员姓名</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_name}}</div>
				  </div>
		    </div>			    
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">卡类型</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_type_name}}({{d.discount}})</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">消费类型</label>
				    <div class="layui-form-mid layui-word-aux">{{d.recordtype}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">消费金额</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥{{d.card_record_smoney}}</span>（{{d.paytype}}）</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">手动优惠</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥{{d.card_record_jmoney}}</span></div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">是否免单</label>
				    <div class="layui-form-mid layui-word-aux">{{d.free}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">操作人员</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_user_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">分店</label>
				    <div class="layui-form-mid layui-word-aux">{{d.shop_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <div class="layui-form-mid layui-word-aux" style="width:100%;">
				    {{# if(d.card_record_type == '3'){ }}
				    	<table class="layui-table">
							  <thead>
							    <tr>
							      <th width="400">名称</th>
							      <th>数量</th>
							      <th>单价</th>
							      <th>优惠价</th>
							    </tr> 
							  </thead>
							  <tbody>
							  {{# layui.each(d.goods_list, function(index, item){ }}
							    <tr>
							      <td>{{item.c_mgoods_name || item.c_sgoods_name}}</td>
							      <td>{{item.card_record3_goods_count}}</td>
							      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price != 0 ? item.c_mgoods_price : item.c_sgoods_price}}</td>
							      <td>￥{{item.c_mgoods_rprice != 0 ? item.c_mgoods_rprice : item.c_sgoods_rprice}}</td>
							    </tr>
							  {{# }) }}
							  {{# layui.each(d.mcombo_goods_list2, function(index, item){ }}
							    <tr>
							      <td>{{item.c_mgoods_name}}(套餐)</td>
							      <td>{{item.card_record3_mgoods_count}}</td>
							      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price}}</td>
							      <td>{{item.c_mgoods_cprice != 0 ? '￥'+item.c_mgoods_cprice : '--'}}</td>
							    </tr>
							  {{# }) }}
							    <tr>
							      <td colspan="4" style="text-align:right;">共{{d.goods_count + d.mcombo_goods_count2}}件，合计<span class="laimi-color-ju">￥{{d.goods_money + d.mcombo_goods_money2}}</span>，实收<span class="laimi-color-ju" style="font-size:18px;">￥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
							    </tr>
							   <!--  <tr>
							      <td colspan="4" style="text-align:left;">优惠：满100元减10元&nbsp;&nbsp;×1</td>
							    </tr> -->
							  {{# if(d.ticket_list.length > 0){ }}
 							    <tr>
							      <td colspan="4" style="text-align:left;">赠送优惠券：
										{{# layui.each(d.ticket_list, function(index, item){ }}
							      {{item.c_ticket_name}}&nbsp;&nbsp;×{{item.count}}（{{item.c_ticket_value}}元）;
										{{# }) }}
							      </td>
							    </tr>
							  {{# } }}
							  </tbody>
							</table>
						{{# } }}
						{{# if(d.card_record_type == '2'){ }}
				    	<table class="layui-table">
							  <thead>
							    <tr>
							      <th width="400">名称</th>
							      <th>数量</th>
							      <th>单价</th>
							      <th>优惠价</th>
							    </tr>
							  </thead>
							  <tbody>
							  {{#  layui.each(d.mcombo_goods_list, function(index, item){ }}
							    <tr>
							      <td>{{item.c_mgoods_name}}</td>
							      <td>{{item.card_record2_mcombo_gcount}}</td>
							      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price}}</td>
							      <td>{{item.c_mgoods_cprice != 0 ? '￥'+item.c_mgoods_cprice : '--'}}</td>
							    </tr>
							  {{# }) }}
							    <tr>
							      <td colspan="4" style="text-align:right;">共{{d.mcombo_goods_count}}件，合计<span class="laimi-color-ju">￥{{d.mcombo_goods_money}}</span>，实收<span class="laimi-color-ju" style="font-size:18px;">￥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
							    </tr>
							  </tbody>
							</table>
						{{# } }}
				    </div>
			  	</div>
		    </div>
		    <div class="layui-col-md9">
		      {{# if(d.card_record_type == 3 && d.card_record_state == 1){ }}
		        <button type="button" class="layui-btn layui-btn-normal laimi-refund" value="{{d.card_record_id}}">
		        	退款
		        </button>
		      {{# } }}
		     	<button type="button" class="layui-btn layui-btn-primary laimi-del" value="{{d.card_record_id}}">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
					</button>
		    </div>
		    <div class="layui-col-md3" style="text-align:right;">
		      <a href="record_print.php?id={{d.card_record_id}}" class="layui-btn laimi-button-100" target="_blank">
		      	打印小票
		      </a>
		    </div>
			</div>
		</div>
	</script>
	<!--新增操作员弹出层结束-->
	<script type="text/html" id="laimi-script-refund">
		<div id="laimi-modal-refund" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
				  <label class="layui-form-label"><span>*</span> 授权账号</label>
				  <div class="layui-input-block">
				    <input class="layui-input laimi-input-200" type="text" name="name" lay-verify="required">
				  </div>
				</div>
			  <div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 授权密码</label>
			    <div class="layui-input-block">
			      <input class="layui-input laimi-input-200" type="password" name="password" autocomplete="new-password" lay-verify="required">
			      <input type="hidden" name="id" value="{{d.id}}">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submitrefund" lay-submit>
			      	完成
			      </button>
			    </div>
			  </div>
			</form>
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laypage", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['card_records_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['card_records_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		$(".laimi-info").on("click", function() {
			$.getJSON('record_edit_ajax.php', {id:$(this).val()}, function(data){
				objlaytpl($("#laimi-script-info").html()).render(data, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["消费明细", "font-size:16px;"],
				  	btnAlign: "r",
				  	offset: 'rt',
				  	anim: 7,
				  	area: ["750px", "100%"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html,
				  	success: function(){
				  		$('.layui-layer-content').css('overflow', 'auto');
				  	}
				  });
				});
			})
		});
		$(document).on('click', '.laimi-refund', function(){
			var id = $(this).val();
			objlaytpl($("#laimi-script-refund").html()).render({id: id}, function(html){
				objlayer.open({
					type: 1,
					title: ["退款", "font-size:16px;"],
					btnAlign: "r",
					area: ["480px", "auto"],
					shadeClose: true,//点击遮罩关闭
					content: html,
				});
			});
		});
		$(document).on('click', '.laimi-del', function(){
			var id = $(this).val();
			objlayer.confirm('您确定要删除这条消费信息吗', {icon: 3, title:'提示'}, function(index){
			  $.post('card_record_delete_do.php', {id: id}, function(msg){
			  	if(msg == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('删除失败', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  layer.close(index);
			});
		});
		objform.on("submit(laimi-submitrefund)", function(data) {
			var _self = $(this);
		  _self.attr('disabled', true);
		  $.post('refund_do.php', data.field, function(res){
		  	_self.attr('disabled', false);
		  	console.log(res);
		    if(res == '0'){
		      window.location.reload();
		    }else if(res == '1'){
          objlayer.alert('授权失败，密码或账号错误', {
		  			title: '提示信息'
		  		});
		    }else{
          objlayer.alert('退款失败', {
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