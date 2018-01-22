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
						<a href="worker_reward_detail.php">员工提成明细</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker-reward layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">日期</label>
      <div class="layui-input-inline">
        <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strfrom']; ?>">
      </div>
      <label class="layui-form-label">至</label>
      <div class="layui-input-inline">
        <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strto']; ?>">
      </div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200 laimi-focus" type="text" name="key" placeholder="姓名/编号" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>">
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
			<th>消费单号</th>
			<th>会员卡号</th>
			<th>会员姓名</th>
			<th>消费类型</th>
			<th>消费内容</th>
			<th>提成金额</th>
			<th>员工</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['worker_reward_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d', $row['worker_reward_atime']); ?></td>
			<td><a class="laimi-color-lan laimi-info" href="javascript:;" card_record_id="<?php echo $row['c_card_record_id']; ?>"><?php echo $row['c_card_record_code']; ?></a></td>
			<td><?php echo $row['c_card_code']; ?></td>
			<td><?php echo $row['c_card_name']; ?></td>
			<td><?php echo $row['mytype']; ?></td>
			<td><?php if($row['c_goods_name'] !=''){echo $row['c_goods_name'].'*'.$row['c_goods_count'];} else echo '--';?></td>	
			<td><span class="laimi-color-ju">￥<?php echo $row['worker_reward_money'] + 0; ?></span></td>
			<td><?php echo $row['c_worker_name']; ?></td>
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
        <div class="layui-col-md6">
          <div class="layui-form-item" style="margin-bottom:-6px;">
    		    <label class="layui-form-label">导购员</label>
    		    <div class="layui-form-mid layui-word-aux">{{d.guider}}</div>
    		  </div>
        </div>
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <div class="layui-form-mid layui-word-aux" style="width:100%;">
				    {{# if(d.card_record_type == '3'){ }}
				    	<table class="layui-table">
							  <thead>
							    <tr>
							      <th width="250">名称</th>
							      <th>提成人员</th>
							      <th>数量</th>
							      <th>单价</th>
							      <th>优惠价</th>
							    </tr> 
							  </thead>
							  <tbody>
							  {{# layui.each(d.goods_list, function(index, item){ }}
							    <tr>
							      <td>{{item.c_mgoods_name || item.c_sgoods_name}}</td>
							      <td>{{item.worker}}</td>
							      <td>{{item.card_record3_goods_count}}</td>
							      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price != 0 ? item.c_mgoods_price : item.c_sgoods_price}}</td>
							      <td>￥{{item.c_mgoods_rprice != 0 ? item.c_mgoods_rprice : item.c_sgoods_rprice}}</td>
							    </tr>
							  {{# }) }}
							  {{# layui.each(d.mcombo_goods_list2, function(index, item){ }}
							    <tr>
							      <td>{{item.c_mgoods_name}}(套餐)</td>
							      <td>{{item.worker}}</td>
							      <td>{{item.card_record3_mgoods_count}}</td>
							      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price}}</td>
							      <td>{{item.c_mgoods_cprice != 0 ? '￥'+item.c_mgoods_cprice : '--'}}</td>
							    </tr>
							  {{# }) }}
							    <tr>
							      <td colspan="5" style="text-align:right;">共{{d.goods_count + d.mcombo_goods_count2}}件，合计<span class="laimi-color-ju">￥{{d.goods_money + d.mcombo_goods_money2}}</span>，实收<span class="laimi-color-ju" style="font-size:18px;">￥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
							    </tr>
							    <tr>
							      <td colspan="5" style="text-align:left;">满减优惠：{{d.card_record_mmoney}}元&nbsp;&nbsp;</td>
							    </tr>
							  {{# if(d.ticket_list.length > 0){ }}
 							    <tr>
							      <td colspan="5" style="text-align:left;">赠送优惠券：
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
		    &nbsp;
		    </div>
		    <div class="layui-col-md3" style="text-align:right;">
		      <button type="button" class="layui-btn laimi-button-100" onclick="window.location.href='record_print.php?id={{d.card_record_id}}'">
		      	打印小票
		      </button>
		    </div>
			</div>
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "laypage", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;

		$('.laimi-focus').focus();

		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['worker_reward_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['worker_reward_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "worker_reward_detail.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
				}
			}
		});
		$(".laimi-info").on("click", function() {
			$.getJSON('record_edit_ajax.php', {id: $(this).attr('card_record_id')}, function(data){
				// console.log(data);
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
				  });
				});
			})
		});
	});
	</script>
</body>
</html>