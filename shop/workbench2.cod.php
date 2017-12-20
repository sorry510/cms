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
				<div id="laimi-main" class="p-worker layui-tab-content" style="padding:0px;">
<form class="layui-form">
<table class="layui-table" lay-skin="line">
  <tbody>
  	<!-- 会员搜索栏 -->
    <tr>
      <td style="padding:0px;" class="layui-bg-gray" colspan="2">
      	<div class="layui-form-mid" style="margin-left:20px;"><input class="layui-input card-search" type="text" name="txtname" placeholder="卡号/姓名/手机号"></div>
				<div class="layui-form-mid"><button type="button" class="layui-btn layui-btn-normal laimi-add3">搜索</button></div>
				<div class="layui-form-mid laimi-float-right laimi-cardinfo" style="line-height:37px; margin-right:30px;">
					<div class="layui-input-inline">
						<span class="laimi-color-hui" style="margin-left:20px;">卡号：</span><span class="laimi-color-ju laimi-card-code">--</span>
						<span class="laimi-color-hui" style="margin-left:20px;">姓名：</span><span class="laimi-color-ju laimi-card-name">--</span>
						<span class="laimi-color-hui" style="margin-left:20px;">手机：</span><span class="laimi-color-ju laimi-card-phone">--</span>
						<span class="laimi-color-hui" style="margin-left:20px;">卡类型：</span><span class="laimi-color-ju laimi-card-typename">--</span>
						<span class="laimi-color-hui" style="margin-left:20px;">余额：</span><span class="laimi-color-ju" style="font-weight:bold;font-size:18px;">¥<span class="laimi-card-ymoney">0.00</span></span>
						<span class="laimi-color-hui" style="margin-left:20px;">积分：</span><span class="laimi-color-hui laimi-card-yscore">0</span>
					</div>
				</div>
	  	</td>
    </tr>
  </tbody>
</table>
<div class="laimi-tools layui-form-item" style="padding:0px;">
	<div class="layui-row layui-col-space15">
    <div class="layui-col-md4">
      <div class="layui-tab">
			  <ul class="layui-tab-title">
			    <li class="layui-this" style="padding:0px 6px;">买套餐</li>
			  </ul>
			  <div class="layui-tab-content" style="padding:0px;">
			    <!-- 买套餐 -->
			    <div class="layui-tab-item layui-show">
			    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
						  <thead>
						    <tr class="layui-bg-green">
						      <th width="200">套餐</th>
						      <th>价格</th>
						      <th width="40">操作</th>
						    </tr>
						    <tr>
						      <td colspan="3" style="text-align:left;background-color:#F8F8F8;color:#FF5722;">
					      		<marquee behavior="scroll" direction="left" loop="-1" scrollamount="10" scrolldelay="150" onMouseOut="this.start()" onMouseOver="this.stop()">
					      		<span class="laimi-act-discount"></span>
					      		</marquee>
						      </td>
						    </tr>
						  </thead>
						  <tbody>
						  <?php foreach($this->_data['mcombo_list'] as $row) { ?>
						  	<tr>
						      <td style="text-align:left;" class="laimi-color-lan">
						      	<span class="layui-badge layui-bg-blue"><?php echo $row['mcombo_type'] == 1 ? '次' : '时'; ?></span>&nbsp;<?php echo $row['mcombo_name']; ?>
						       </td>
						       <td>
						      	<span class="laimi-color-hui2">¥<?php echo $row['mcombo_price']; ?></span>
						       </td>
						       <td>
						      	<a href="javascript:;" class="laimi-color-lan laimi-goods-add2" price="<?php echo $row['mcombo_price']; ?>" mtype="<?php echo $row['mcombo_type']; ?>" gname="<?php echo $row['mcombo_name']; ?>" gid="<?php echo $row['mcombo_id']; ?>" act="<?php echo $row['mcombo_act']; ?>">添加</a>
						       </td>
						    </tr>
						    <?php foreach($row['goods'] as $row2){ ?>
						    	<tr>
						    		<td style="text-align:left;" colspan="3">
						    	  	<?php echo $row2['mgoods_name']; ?>&nbsp;<?php if($row['mcombo_type'] == 1){ ?><span class="layui-badge layui-bg-gray"><?php echo $row2['mcombo_goods_count']; ?>次</span><?php } ?>&nbsp;<span class="layui-badge layui-bg-gray"><?php echo $row['days']; ?></span>
						    	  </td>
						    	</tr>
						    <?php } ?>
						  <?php } ?>
						  </tbody>
						</table>
			    </div>
			  </div>
			</div>
			<div style="height:70px; width:100%;"></div>
    </div>
    <div class="layui-col-md8">
    	<!-- 购买栏 -->
      <table class="layui-table" lay-skin="line">
				<thead>
					<tr class="layui-bg-orange">
						<th width="230">名称</th>
						<th>价格</th>
						<th width="50">数量</th>
						<th>方式</th>
						<th width="50">操作</th>
					</tr>
				</thead>
				<tbody class="laimi-goods-checked">
					<tr class="laimi-tr-act-decrease" style="display:none;">
						<td style="text-align:left;" colspan="6">
							<label class="layui-form-label">
								<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
								<span class="laimi-act-decrease"></span>
							</label>
						</td>
					</tr>
				</tbody>
			</table>
			<div style="height:70px; width:100%;"></div>
    </div>
  </div>
</div>
<div style="position:fixed;bottom:0px;width:100%;padding:0px 15px 0px 15px;height:70px;border:1px solid #eeeeee;line-height:70px;background-color:#F6F6F6;">
	<div class="layui-input-inline" style="margin-left:40px;">
		共<span style="font-weight:bold;font-size:16px;" class="laimi-color-ju laimi-goodscount">0</span>件，原价：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">¥<span class="laimi-money-yuan">0.00</span></span>，优惠：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">¥<span class="laimi-money-jian">0.00</span></span>，应收金额：<span style="font-size:26px;font-weight:bold;" class="laimi-color-ju">¥<span class="laimi-money-ying">0.00</span></span>
	</div>
	<div class="layui-input-inline laimi-float-right" style="margin-right:200px;margin-top:10px;">
		<a href="javascript:;" class="layui-btn layui-btn-big laimi-payopen" style="height:50px;line-height:50px;font-size:24px;">&nbsp;&nbsp;结帐&nbsp;&nbsp;</a>
	</div>
</div>
</form>

				</div>
			</div>
		</div>
	</div>
	<!--结帐弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-bill" class="laimi-modal">
			<form class="layui-form" lay-filter="pay">
			  <div class="layui-form-item">
			  	<fieldset class="layui-elem-field">
					  <legend style="font-size:16px;font-weight:bold;">可用优惠券</legend>
					  <div class="layui-field-box" style="margin-bottom:45px;">
					    <label class="layui-form-label">代金券</label>
							<div class="layui-input-inline">
								<select name="ticketmoney" lay-filter="ticketmoney">
									<option value="no">可用代金券</option>
									{{# layui.each(d.ticket, function(index, item){ }}
									<option value="{{item.key}}">{{item.c_ticket_name}}</option>
									{{# }) }}
								</select>
							</div>
						</div>
					</fieldset>
			  	<div class="layui-field-box" style="font-size:16px;background-color:#FFFFDD;height:55px;padding-top:25px;border:1px solid #FCEFA1;margin-top:10px;">
				    <label class="layui-form-label">应收金额</label>
				    <div class="layui-form-mid laimi-color-hui" style="font-size:22px;font-weight:bold;">¥{{d.money}}</div>
				    <label class="layui-form-label" style="margin-left:10px;">手动优惠</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-100 laimi-color-lan laimi-money-youhui" type="text"  placeholder="0.00" name="jmoney" style="height:50px;margin-top:-6px;line-height:50px;font-size:22px;">
				    </div>
				    <div class="layui-input-inline">
				     	<input type="checkbox" class="laimi-free" title="免单" name="paystate" value="4" lay-skin="primary" lay-filter="payfree">
				    </div>
				    <label class="layui-form-label" style="margin-left:10px;">实收金额</label>
				    <div class="layui-form-mid laimi-color-ju" style="font-size:22px;font-weight:bold;">¥<span class="laimi-money-last">{{d.money}}</span></div>
					</div>
					<fieldset class="layui-elem-field" style="margin-top:10px;">
					  <legend style="font-size:16px;font-weight:bold;">付款方式</legend>
					  <div class="layui-field-box">
					    <div class="layui-row">
						    <div class="layui-col-md4">
						    	<div class="layui-form-mid">
						    		<input type="radio" name="paytype" value="5" title="会员卡（余¥{{d.card.s_card_ymoney || '0.00'}}）"
										{{# if(d.card.s_card_ymoney == undefined || d.card.s_card_ymoney - d.money < 0.001){ }}
										 disabled
										{{# } }}
						    		>
						    	</div>
						    </div>
						    <div class="layui-col-md3">
						    	<div class="layui-form-mid">
						    		<input type="radio" name="paytype" value="2" title="POS刷卡">
						    	</div>
						    </div>
						    <div class="layui-col-md5">
						    	<div class="layui-form-mid" style="margin-right:0px;">
						    		<input type="radio" name="paytype" value="1" title="现金">
						    	</div>
						    	<div class="layui-form-mid">
						    		<input class="layui-input laimi-input-80 laimi-color-lan laimi-money-xian" type="text" placeholder="0.00" style="font-size:20px;height:40px;line-height:40px;">
								  </div>
						    	<div class="layui-form-mid" style="margin-top:8px;">
						    		<span class="laimi-color-lan">找零：</span><span class="layui-bg-blue laimi-money-ling" style="padding:2px 6px ;border-radius:2px;font-size:18px;">0.00</span>
						    	</div>
							  </div>
						    <div class="layui-col-md4">
						      <input type="radio" name="paytype" value="4" title="支付宝扫码" checked>
						    </div>
						    <div class="layui-col-md3">
						      <input type="radio" name="paytype" value="3" title="微信扫码">
						    </div>
						    <div class="layui-col-md5">
						      <input type="radio" name="paytype" value="6" title="团购">
						    </div>
					    </div>
					  </div>
					</fieldset>
					{{# if(d.act_give.length > 0){ }}
					<div class="layui-field-box" style="font-size:14px;border:1px solid #F0F0F0;margin-top:20px;">
					  <label class="layui-form-label">赠送优惠券</label>
					  {{# layui.each(d.act_give, function(index, item){ }}
						<div class="layui-input-block">
							<input type="checkbox" name="" title="{{item.c_ticket_name}}*{{item.act_number}}（满{{item.c_ticket_limit}}元可用，{{item.start}}至{{item.end}}）" lay-skin="primary" checked disabled>
						</div>
						{{# }) }}
					</div>
					{{# } }}
					<div class="layui-field-box" style="font-size:14px;border:1px solid #F0F0F0;margin-top:20px;">
					  <label class="layui-form-label">付款码</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input laimi-input-200 laimi-pay-code">
						</div>
					</div>
					<div class="layui-row" style="padding-top:15px;">
						<label class="layui-form-label">导购人员</label>
						<div class="layui-input-inline">
							<select name="worker" lay-search>
								<option value="">导购人员</option>
								<?php foreach($this->_data['worker_list'] as $row){ ?>
								<option value="<?php echo $row['worker_id']; ?>"><?php echo $row['worker_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="laimi-float-right">
							<button class="layui-btn laimi-card-pay" style="height:50px;font-size:18px;" lay-filter="card-pay" lay-submit>完成结帐</button>
						</div>
					</div>
			  </div>
			  <div class="laimi-height-20"> </div>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
	<!--模糊弹出层开始-->
	<script type="text/html" id="laimi-script-add3">
		<div id="laimi-modal-add3" class="laimi-modal">
			<form class="layui-form">
				<table class="layui-table">
				  <thead>
				    <tr>
				      <th>卡号</th>
				      <th>姓名</th>
				      <th>性别</th>
				      <th>手机号</th>
				      <th>卡类型</th>
				      <th>折扣</th>
				      <th>操作</th>
				    </tr>
				  </thead>
				  <tbody>
				  {{#  layui.each(d, function(index, item){ }}
				    <tr>
				      <td>{{item.card_code}}</td>
				      <td>{{item.card_name}}</td>
				      <td>{{item.sex}}</td>
				      <td>{{item.card_phone}}</td>
				      <td>{{item.type_name}}</td>
				      <td>{{item.type_discount}}</td>
				      <td><a href="javascript:;" class="laimi-color-lan laimi-card-search" key="{{index}}">选择</a></td>
				    </tr>
				  {{# }) }}
				  </tbody>
				</table>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
	<!--会员资料开始-->
	<script type="text/html" id="laimi-script-add4">
		<div id="laimi-modal-add4" class="laimi-modal">
			<form class="layui-form" lay-filter="card-info">
				<div class="layui-row">
					 <div class="layui-col-md3">
				      	<img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=card&image=";?>{{d.card_photo_file}}" style="width:180px;height:180px;">
				    </div>
				    <div class="layui-col-md9">
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员卡号</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_code}}</div>
							  </div>
					    </div>	    
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom: 0px;">
							    <label class="layui-form-label">会员姓名</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-lan">{{d.card_name}}</span></div>
							  </div>
					    </div>			    
					    <div class="layui-col-md6">
						    <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">卡类型</label>
							    <div class="layui-form-mid layui-word-aux">{{d.type_name}}({{d.type_discount}}折)</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员余额</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥{{d.s_card_ymoney}}</span></div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">剩余积分</label>
							    <div class="layui-form-mid layui-word-aux">{{d.s_card_yscore}}分</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">手机号码</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">{{d.card_phone}}</span></div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">累计消费</label>
							    <div class="layui-form-mid layui-word-aux">￥{{d.s_card_smoney}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员性别</label>
							    <div class="layui-form-mid layui-word-aux">{{d.sex}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">出生日期</label>
							    <div class="layui-form-mid layui-word-aux">{{d.birthday}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">身份证号</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_identity}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">联系人</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_link}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">开通时间</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_atime}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">到期时间</label>
							    <div class="layui-form-mid layui-word-aux">{{d.edate}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">推荐人</label>
							    <div class="layui-form-mid layui-word-aux">{{d.worker_name}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md12">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">办卡备注</label>
							    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">{{d.card_memo}}</div>
							  </div>
						  </div>
				    </div>
				</div>
				<hr />
				<div class="layui-row" style="margin-top:20px;">
				{{# if(d.card_password_state == 1){ }}
					<label class="layui-form-label">会员卡密码</label>
					<div class="layui-input-inline last">
						<input class="layui-input laimi-input-200" type="password" name="password" placeholder="请输入卡密码" autocomplete="new-password">
					</div>
				{{# } }}
					<div class="laimi-float-right">
					<input class="layui-input laimi-input-200" type="hidden" name="id" value="{{d.card_id}}">
						<button class="layui-btn" style="height:40px;font-size:16px;" lay-filter="laimi-card-confirm" lay-submit>确定</button>
					</div>
				</div>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "upload", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;

		var card_id = 0;
		var card_key = null;//cardlist中的key
	  var cardlist = [];
	  var cardticket = [];//可用代金券
	  var hmoney = 0;//合计金额
	  var money_pbill = 0;//点击结账前的实际money
	  var decrease_money = 0;//满减活动价格
	  var card_act_discount = [];
	  var card_act_decrease = [];
	  var card_act_give = [];
	  var card_act_decrease_use = [];
	  var card_act_give_use = [];
	  var min_goods = {};//min_price,act_discount_id
	  var allmoney_act = 0;

	  function cardActDiscount(){
	    card_act_discount.length = 0;
	    return $.getJSON('./card_act_discount_ajax.php', {id: card_id}, function(res){
	    	card_act_discount = res;
	    	var text = '';
	    	$.each(res, function(k, v){
	    		text += v.act_discount_name+'：'+v.start+'至'+v.end+'；';
	    	})
	    	$('#laimi-main .laimi-act-discount').text(text);
	    	if(res.length > 0){
	    		$('#laimi-main .laimi-tr-act-discount').show();
	    	}else{
	    		$('#laimi-main .laimi-tr-act-discount').hide();
	    	}
	    	// console.log(1);
	    });
	  };
	  function cardActDecrease(){
	    card_act_decrease.length = 0;
	    return $.getJSON('./card_act_decrease_ajax.php', {id: card_id}, function(res){
	    	card_act_decrease = res;
	    	var text = '';
	    	if(res){
	    		text += '当前满减活动：';
	    		$.each(res, function(k, v){
	    			text += v.act_decrease_name+'；';
	    		})
	    		text = text.slice(0, -1);
	    	}
	    	$('#laimi-main .laimi-act-decrease').text(text);
	    	if(res.length > 0){
	    		$('#laimi-main .laimi-tr-act-decrease').show();
	    	}else{
	    		$('#laimi-main .laimi-tr-act-decrease').hide();
	    	}
	    	// console.log(2);
	    });
	  };
	  function cardActGive(){
	    card_act_give.length = 0;
	    return $.getJSON('./card_act_give_ajax.php', {id: card_id}, function(res){
	    	card_act_give = res;
	    });
	  };
	  function cardSearch(){
	  	var _this = $(this);
	    _this.attr('disabled', true);
	  	cardlist.length = 0;
	  	var search = $.trim($('#laimi-main .card-search').val());
	    $.getJSON('card_search_ajax.php', {search: search}, function(res) {
	    	_this.attr('disabled', false);
	    	cardlist = res;
	    	if(res.length == 0){
	    	  cardClear();
	    	  objlayer.alert('没有此会员信息', {
		  			title: '提示信息'
		  		});
	    	}else if(res.length == 1){
	    		card_key = 0;
	    	  cardInfo(res[0]);
	    	}else{
	    		cardSelect(res);
	    	}
	    });
	  };
	  function cardSelect(list){
  		objlaytpl($("#laimi-script-add3").html()).render(list, function(html){
  		  objlayer.open({
  		  	type: 1,
  				title: ["精确搜索", "font-size:16px;"],
  				btnAlign: "r",
  				area: ["800px", "auto"],
  				shadeClose: true,//点击遮罩关闭
  				content: html,
  		  	success: function(layero, index){
  		  		$('.laimi-card-search').on('click',function(){
  		  			  var key = $(this).attr('key');
  		  			  if(cardlist[key]){
  		  			  	objlayer.close(index);
  		  			  	card_key = key;//注:当用户在会员明细弹出框中，没有点击确认直接退出时，key也会保留下来，判断card是谁需要通过card_id是否是0来做先决条件
  		  			  	cardInfo(cardlist[key]);
  		  			  }
  		  		});
  		  	},
  		  	end: function(){
  		  		$('.laimi-card-search').off('click');
  	    	}
  		  });
  		});
	  };
	  function cardInfo(info){
	  	objlaytpl($("#laimi-script-add4").html()).render(info, function(html){
	  	  objlayer.open({
	  	  	type: 1,
	  			title: ["会员资料", "font-size:16px;"],
	  			btnAlign: "r",
	  			area: ["800px", "auto"],
	  			shadeClose: true,//点击遮罩关闭
	  			content: html
	  	  });
	  	});
	  }
	  function cardChecked(data){
	  	//data数据是用户密码数据
      $.get('card_password_ajax.php', data, function(state){
        if(state == '0'){
        	if(cardlist[card_key]){
        		objlayer.close(objlayer.index);
        		card_id = cardlist[card_key].card_id;
        		cardShow(cardlist[card_key]);
	          cardChange();
          }
        }else if(state == 1){
          // 密码错误
          objlayer.alert('密码错误', {
		  			title: '提示信息'
		  		});
          return false;
        }else{
        	objlayer.alert('没有此用户', {
		  			title: '提示信息'
		  		});
          return false;
        }
      });
	  };
	  function cardChange(){
	  	//重新计算活动和所有商品价格
	  	$.when(cardActDiscount(), cardActDecrease())
	  	  .then(function(){
	  	  	// console.log('start');
	  	    var dtd = $.Deferred();
	  	    var elem = $("#laimi-main .laimi-num");
	  	    var count = elem.length;
	  	    var index = 0;
	  	    if(count > 0){
	  	      elem.each(function(k, v){
	  	      	var elm = $(this);
  	      		$.when(goodsPrice(elm.attr('gid'), elm.attr('gtype')))
	  	          .then(function(){
	  	          	index++;
	  	          	// console.log(index);
	  	            elm.attr('min-price', min_goods.min_price);
	  	            elm.attr('act-discount-id', min_goods.act_discount_id);
	  	            elm.parent().prev().find('.laimi-minprice').text(min_goods.min_price);
	  	            if(count - index < 1){
	  	              dtd.resolve();
	  	            }
	  	          })
	  	      })
	  	    }else{
	  	      dtd.resolve();
	  	    }
	  	    return dtd.promise();
	  	  })
	  	  .then(function(){
	  	  	// console.log('end');
	  	    allGoodsPrice();
	  	  })
	  	cardActGive();
	  }
	  function cardShow(card){
	  	if(card){
	  		$('#laimi-main .laimi-card-code').html(card.card_code);
	  		$('#laimi-main .laimi-card-name').html(card.card_name);
	  		$('#laimi-main .laimi-card-name').html(card.card_name+'('+card.sex+')');
	  		$('#laimi-main .laimi-card-phone').html(card.card_phone);
	  		$('#laimi-main .laimi-card-typename').html(card.type_name);
	  		$('#laimi-main .laimi-card-ymoney').html(card.s_card_ymoney);
	  		$('#laimi-main .laimi-card-yscore').html(card.s_card_yscore);
	  	}else{
	  		$('#laimi-main .laimi-card-code').html('--');
	  		$('#laimi-main .laimi-card-name').html('--');
	  		$('#laimi-main .laimi-card-phone').html('--');
	  		$('#laimi-main .laimi-card-typename').html('--');
	  		$('#laimi-main .laimi-card-ymoney').html('0.00');
	  		$('#laimi-main .laimi-card-yscore').html('0');
	  	}
	  }
	  function cardTicket(type){
	  	var type = type || 2;//1.代金 2.体验
	    if(type == 2){
	    	$('#laimi-main .laimi-myticket-goods').empty();
	    	$('#laimi-main .laimi-myticket-count').addClass('layui-hide');
	    }else if(type == 1){
	    	cardticket.length = 0;
	    }
	    return $.getJSON('card_myticket_ajax.php', {id: card_id, type: type}, function(res){
	    	if(res){
	    	  var div = '';
	    	  $.each(res, function(k, v){
	    	    if(v.ticket_type=='1'){
	    	  			cardticket.push(v);
	    	    }else if(v.ticket_type == '2'){
	    	    	div += ['<div style="width:80%;padding:10px;height:60px;background: url(\'../img/ticket_bg2.png\') no-repeat;margin-left:20px;margin-bottom:8px;">',
				    						'<div class="layui-col-md9" style="margin-left:20px;margin-top:5px;">',
				      						'<ul>',
														'<li style="line-height:26px;font-size:18px;color:#FFFFFF;">'+v.c_ticket_name+'&nbsp;×1&nbsp;<span class="layui-badge layui-bg-cyan">体验券</span></li>',
														'<li style="line-height:26px;font-size:12px;">'+v.atime+'至'+v.edate+'</li>',
													'</ul>',
										    '</div>',
										    '<div class="layui-col-md2 laimi-float-right" style="margin-top:15px;">',
										    	'<a href="javascript:;" class="laimi-ticket-add" style="color:#FFFFFF;" tid="'+v.card_ticket_id+'" gid="'+v.c_mgoods_id+'" tvalue="'+v.c_ticket_value+'" tname="'+v.c_ticket_name+'">使用</a>',
										    '</div>',
		    							'</div>'].join('');
	    	    }
	    	  });
	    	  $('#laimi-main .laimi-myticket-goods').append(div);
	    	  if(type == 2){
	    	  	$('#laimi-main .laimi-myticket-count').removeClass('layui-hide').text(res.length);
	    	  }
	    	}
	    })
	  };
	  function cardClear(){
	    // var _this = this;
	    card_id = 0;
	    card_key = null;
	    cardlist.length = 0;
	    cardShow();
	    cardChange()
	  };
	  function goodsAdd2(){
	  	//添加套餐
	  	var tr ='';
	  	var goodsinfo = $(this);
	  	var mtype = goodsinfo.attr('mtype') == 1 ? '计次' : '计时';
	  	$.when(goodsPrice(goodsinfo.attr('gid'), 3))
	  	  .then(function(){
	  	  	var span = '';
	  	  	if(Number(goodsinfo.attr('price')) - Number(min_goods.min_price) > 0.01){
	  	  		span = '&nbsp;<span class="laimi-color-ju laimi-minprice">¥'+min_goods.min_price+'</span>';
	  	  	}
	  	  	tr = ['<tr>',
					  			'<td style="text-align:left;"><span class="layui-badge layui-bg-blue">套餐</span>&nbsp;'+goodsinfo.attr('gname')+'</td>',
					  			'<td><span class="laimi-color-hui2">¥'+goodsinfo.attr('price')+'</span>'+span+'</td>',
					  			'<td><input class="layui-input laimi-num" type="text" value="1" style="width:50px;padding:5px;text-align:center;" price="'+goodsinfo.attr('price')+'" min-price="'+min_goods.min_price+'" act-discount-id="'+min_goods.act_discount_id+'" act="'+goodsinfo.attr('act')+'" gid="'+goodsinfo.attr('gid')+'" gtype="3"></td>',
					  			'<td>'+mtype+'</td>',
					  			'<td>',
					  				'<a href="javascript:;" class="laimi-color-lan laimi-del">移除</a>',
					  			'</td>',
					  		'</tr>'].join('');
					$('#laimi-main .laimi-goods-checked').prepend(tr);
					allGoodsPrice();
	  	  })
	  };
	  function goodsPrice(goods_id, goods_type){
	  	/**
  		*goods_type: 1mgoods, 2sgoods, 3mcombo
  		*/
	  	var act_id = [];
	  	$.each(card_act_discount, function(k, v){
	  		act_id.push(v.act_discount_id);
	  	})
	    var data = {
		        goods_id: goods_id,
		        type: goods_type,
		        card_id: card_id,
		        act_id: act_id
		      };
		  //返回一个deferred对象
		  // console.log(data);
	    return $.getJSON('goods_price_ajax.php', data, function(res){
	    	min_goods = res;
	    	// console.log(1);
	    })
	  };
	  function goodsDelete(){
	  	$(this).parent().parent().remove();
	  	allGoodsPrice();
		  // var event = event || window.event;
		  // var emt = event.target;
		}
		function allGoodsPrice(){
			card_act_decrease_use.length = 0;
			decrease_money = 0;
			$('#laimi-main .laimi-decrease-use').remove();
	    var money = 0;//原价
	    var ymoney = 0;//优惠价(计算商品，套餐，优惠券之后的价格)
	    var ymoney2 = 0;//优惠价之后去掉满减后的价格
	    var jian = 0;//优惠的价格
	    var money_act = 0;//参加活动的总价
	    var num = 0;
	    //计算所有商品总价
	    $("#laimi-main .laimi-num").each(function(){
	      if(isNaN($(this).val())){
	        $(this).val(0);
	      }
	      money = Number(money) + Number($(this).val()) * Number($(this).attr('price'));
	      ymoney = Number(ymoney) + Number($(this).val()) * Number($(this).attr('min-price'));
	      if($(this).attr('act') == '1'){
	        money_act = Number(money_act) + Number($(this).val()) * Number($(this).attr('min-price'));
	      }
	      num = Number(num) + Number($(this).val());
	    });
	  	allmoney_act = money_act;//缓存
	    ymoney2 = ymoney;
	    if(card_act_decrease){
	    	$.each(card_act_decrease, function(k, v){
	    		if(Number(money_act) >= Number(v.act_decrease_man)){
	    			ymoney2 = Number(ymoney2) - Number(v.act_decrease_jian);
	    			card_act_decrease_use.push(v);
	    			decrease_money = Number(v.act_decrease_jian);
    				var	tr = ['<tr class="laimi-decrease-use">',
												'<td style="text-align:left;" colspan="6">',
													'<label class="layui-form-label">',
														'<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>',
														'<span>已参与满减活动：'+v.act_decrease_name+'，共减'+v.act_decrease_jian+'元</span>',
													'</label>',
												'</td>',
											'</tr>'].join('');
						$('#laimi-main .laimi-goods-checked').append(tr);
	    			return false;
	    		}
	    	})
	    }
	    money = money.toFixed(2);
	    ymoney = ymoney.toFixed(2);
	    ymoney2 = ymoney2.toFixed(2);
	    jian = (money - ymoney2).toFixed(2);
	    money_pbill = ymoney2;
	    hmoney = money;
	    $("#laimi-main .laimi-goodscount").text(num);
	    $("#laimi-main .laimi-money-yuan").text(money);
	    $("#laimi-main .laimi-money-jian").text(jian);
	    $("#laimi-main .laimi-money-ying").text(ymoney2);
	  }
	  function bill(){
	  	if(card_id == 0){
        objlayer.alert('请选择一个会员', {
	  			title: '提示信息'
	  		});
        return false;
	  	}
	  	card_act_give_use.length = 0;
	  	var money_act = allmoney_act;
	  	var actgive = clone(card_act_give);//clone 一份满送活动数据
	  	// console.log(actgive);
	  	// console.log(money_act);
	  	var temp = {};
	  	var act_number = 0;
	  	var card = [];
	  	// 满送
	  	if(card_id != 0){
	  		card = cardlist[card_key];
	  	  // 满送的总金额是参加活动的商品总额
	  	  for(var i = 0; i < actgive.length;){
	  	    if(money_act - actgive[i].act_give_man > 0.001){
	  	      act_number = parseInt(Number(money_act) / Number(actgive[i].act_give_man));//减了几次
	  	      money_act = Number(money_act) % Number(actgive[i].act_give_man);//减过之后剩余价格
	  	      temp = actgive[i];
	  	      temp.act_number = act_number;
	  	      card_act_give_use.push(temp);
	  	    }else{
	  	      i++;
	  	    }
	  	  }
	  	}
	  	$.when(cardTicket(1))
	  		.then(function(){
	  			var ticket = [];
	  			//只显示可用券;
	  			if(cardticket.length > 0){
	  				$.each(cardticket, function(k, v){
	  					if(money_pbill - v.c_ticket_limit > 0.001){
	  						v.key = k;//这里有些不妥，因为js复杂类型数据只保留一份，v是引用，所以同时也修改了cardticket中的数据
	  						ticket.push(v);
	  					}
	  				})
	  			}
	  			var data = {
	  					money: money_pbill,
	  					act_give: card_act_give_use,
	  					ticket: ticket,
	  					card: card
	  			}
	  			// console.log(data);
	  			objlaytpl($("#laimi-script-add").html()).render(data, function(html){
	  			  objlayer.open({
	  			  	type: 1,
	  			  	title: ["结帐", "font-size:16px;"],
	  			  	btnAlign: "r",
	  			  	area: ["800px", "auto"],
	  			  	shadeClose: true,//点击遮罩关闭
	  			  	content: html,
	  			  	success: function(){
	  			  		objform.render(null, 'pay');
	  			  	}
	  			  });
	  			});
	  		})
	  }
	  function moneyFinal(){
	  	var pmoney = money_pbill;//应收
	  	var money_last = pmoney;//实收
	  	var key = $("#laimi-modal-bill select[name='ticketmoney']").val();//代金券key
	  	var payfree = $("#laimi-modal-bill .laimi-free").prop('checked');//免单
	  	var jmoney = $("#laimi-modal-bill .laimi-money-youhui").val();//手动优惠
	  	var xian = $("#laimi-modal-bill .laimi-money-xian").val();//付款现金
	  	var ling = 0;
	  	var ticketmoney = 0;//代金券价值
	  	if(key != 'no'){
	  		ticketmoney = cardticket[key].c_ticket_value;
	  	}
	  	if(payfree){
	  		money_last = 0;
	  		$("#laimi-modal-bill .laimi-money-xian").val(0);
	  		$("#laimi-modal-bill .laimi-money-youhui").val(0);
	  	}else{
	  		money_last = Number(pmoney - jmoney - ticketmoney).toFixed(2);
	  		if(xian != 0){
	  			ling = Number(xian - money_last).toFixed(2);
	  		}
	  	}
	  	$("#laimi-modal-bill .laimi-money-last").text(money_last);
	  	$("#laimi-modal-bill .laimi-money-ling").text(ling);
	  }
	  function payConfirm(data){
	    // ele.attr('disabled', false);
	    var card = {};
	    if(card_id != 0){
	    	card = cardlist[card_key];
	    }
	    var pmoney = money_pbill;
	    var worker_guide_id = data.worker
	    var jmoney = data.jmoney;
	    var ticketmoney = 0;
	    var ticketmoneyid = 0;
	    var key = data.ticketmoney;
	    if(key != 'no'){
	    	ticketmoneyid = cardticket[key].card_ticket_id;
	    	ticketmoney = cardticket[key].c_ticket_value;
	    }
	    var pay_type = data.paytype;
	    var pay_state = data.paystate || 1;
	    var money_last = 0;//最终价
	    var money2 = 0;//各种优惠后除去手动优惠之前的价格
	    money2 = Number(pmoney - ticketmoney).toFixed(2);
	    if(pay_state != 4){
	    	money_last = Number(pmoney - jmoney - ticketmoney).toFixed(2);
	    }
	    var arr = [];//商品
	    var json = {};

	    if(pay_type == 5){
	    	if(card_id == 0){
	    		objlayer.alert('您不能用此方式付款', {
		  			title: '提示信息'
		  		});
		  		return false;
	    	}
	      // 卡余额<实际付款金额
	      if(card.s_card_ymoney - money_last < 0.0001){
	      	objlayer.alert('余额不足，请选用其它方式付款', {
		  			title: '提示信息'
		  		});
		      return false;
	      }
	    }

	    $('#laimi-main .laimi-num').each(function(){
	      if($(this).attr('gtype') == 3){
	        json = {
	        	'mcombo_id': $(this).attr('gid'),
	        	'num': $(this).val(),
	        	'price': $(this).attr('min-price'),
	        	'act_discount_id': $(this).attr('act-discount-id'),
	        };
	        arr.push(json);
	      }
	    });

	    if(arr.length == 0){
    		objlayer.alert('请添加至少一个商品!!!', {
	  			title: '提示信息'
	  		});
	  		return false;
	    }

	    var objdata = {
	      card_id: card_id,
	      worker_guide_id: worker_guide_id,
	      hmoney: hmoney,
	      ymoney: money2,
	      smoney: money_last,
	      jmoney: jmoney,
	      pay_type: pay_type,
	      pay_state: pay_state,
	      arr: arr,
	      ticketmoneyid: ticketmoneyid,
	      act_give_use: card_act_give_use,
	      act_decrease_use: card_act_decrease_use,
	      decrease_money: decrease_money
	    };
	    // console.log(objdata);
	    // return false;
	    var auth_code = $('#laimi-modal-bill .laimi-pay-code').val();
	    var paydata = {
	    	out_trade_no: '<?php echo api_value_int0($GLOBALS['_SESSION']['login_id']).time(); ?>',
	    	total_amount: 0.01,
	    	auth_code: auth_code
	    };
	    //是否免单
	    if(pay_state == 1){
		    if(pay_type == 4){
		    	ali_pay(3, paydata, objdata);
		    }else if(pay_type == 3){

		    }else{
		    	objdata.out_trade_no = paydata.out_trade_no;
	  	    objdata.relmoney = paydata.total_amount;
		    	pay_do(objdata);
		    }
	    }else if(pay_state == 4){
	    	objdata.out_trade_no = paydata.out_trade_no;
  	    objdata.relmoney = paydata.total_amount;
	    	pay_do(objdata);
	    }
	  }
	  function pay_do(data){
	    $.post('workbench2_do.php', data, function(res){
	      $('.laimi-card-pay').attr('disabled', false);
	      // console.log(res);
	      if(res == '0'){
	        window.location.reload();
	      }else if(res == '1'){
        	objlayer.alert('请至少选择一个商品', {
		    		title: '提示信息'
		    	});
	      }else{
	      	console.log(res);
	      }
	    });
	  }
    /**
  		*@type 1:消费，2充值, 3买套餐
  		*@paydata 支付数据
  		*@objdata record数据
  		*/
    function ali_pay(type, paydata, objdata){
      $.ajax({
      	url: '../paysdk/ali_pay/dangmianfu/f2fpay/barpay_test.php',
      	data: paydata,
      	method: 'POST',
      	dataType: 'json',
      	success: function(barpay){
      		if(barpay.code == '10000' && barpay.msg == 'Success'){
      			objdata.out_trade_no = barpay.out_trade_no;
      			objdata.relmoney = barpay.buyer_pay_amount;
      			if(type == 3){
      				pay_do(objdata);
      			}
      		}else if(barpay.code == '40004'){
      			
      		}else{
      			
      		}
      	},
      	error: function(e){
      		$('.laimi-card-pay').attr('disabled', false);
      		console.log(e);
      	}
      })
    }

	  function clone(obj){
	    //深层clone,用于只有数据的数组或json对象
	    if(obj)
	    	return JSON.parse(JSON.stringify(obj));
	    else
	    	return [];
	  }
	  (function init(){
	    cardActDiscount();//初始化活动
	    cardActDecrease();//初始化活动
	    // 会员卡搜索
	    $('.laimi-add3').on('click', cardSearch);
	    // 选中会员卡
	    objform.on("submit(laimi-card-confirm)", function(data) {
	    	cardChecked(data.field);
	    	return false;
	    });
	    // 添加套餐
	    $('#laimi-main .laimi-goods-add2').on('click', goodsAdd2);
	    //删除商品,套餐商品,券
	    $(document).on("click", "#laimi-main .laimi-del", goodsDelete);

	    $(document).on("input propertychange", "#laimi-main .laimi-num", allGoodsPrice);
	    
	    // //+ -
	    // $(document).on("click", ".cbtndec", function(event) {
	    //   goodsNumDec(event);
	    // });
	    // $(document).on("click", ".cbtnplus", function(event) {
	    //   goodsNumPlus(event);
	    // });
	    
	    $(".laimi-payopen").on("click", function() {
	    	bill();
	    });
	    $(document).on("input propertychange", "#laimi-modal-bill .laimi-money-xian", function(){
	    	if(isNaN($(this).val())){
	    		$(this).val(0);
	    	}
	    	moneyFinal();
	    });
	    $(document).on("input propertychange", "#laimi-modal-bill .laimi-money-youhui", function(){
	    	if(isNaN($(this).val())){
	    		$(this).val(0);
	    	}
	    	moneyFinal();
	    });
	    objform.on('checkbox(payfree)', function(data){
	     	moneyFinal();
	    })
	    objform.on('select(ticketmoney)', function(data){
	    	moneyFinal();
	    })
	    objform.on("submit(card-pay)", function(data) {
	    	var _this = $(this);
	    	_this.attr('disabled', true);
	    	payConfirm(data.field);
	    	return false;
	    })
	  })();
	});
	</script>
</body>
</html>