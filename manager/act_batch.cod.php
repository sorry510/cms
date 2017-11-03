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
						<a href="act_batch.php">批量营销</a>
					</li>
					<li>
						<a href="act_batch_weixin.php">微信营销记录</a>
					</li>
					<li>
						<a href="act_batch_sms.php">短信营销记录</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-batch layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<div class="layui-input-inline">
			<a class="layui-btn layui-btn-normal laimi-search">高级查询条件</a>
		</div>
		<div class="laimi-float-right">
			<a id="" class="layui-btn laimi-sms">批量短信营销</a>
		</div>
		<div class="laimi-float-right" style="margin-right:10px;">
			<a id="" class="layui-btn laimi-weixin">批量微信营销</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>姓名</th>
			<th>性别</th>
			<th>卡号</th>
			<th>卡类型</th>
			<th>手机号</th>
			<th>生日</th>
			<th>办卡时间</th>
			<th>到期时间</th>
			<th>上次到店时间</th>
			<th>未到店天数</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['card_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['card_name']; ?></td>
      <td><?php echo $row['sex']; ?></td>
      <td><?php echo $row['card_code']; ?></td>
			<td><?php echo $row['c_card_type_name']; ?></td>
			<td><?php echo $row['card_phone']; ?></td>
			<td><?php echo date('Y-m-d',$row['card_birthday_date']); ?></td>
			<td><?php echo date('Y-m-d',$row['card_atime']); ?></td>
      <td><?php echo date('Y-m-d',$row['card_edate']); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$row['card_ltime']); ?></td>
			<td><?php echo $row['leave_days']; ?></td>
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
	<!--新增高级查询弹出层开始-->
	<script type="text/html" id="laimi-search">
		<div id="laimi-modal-search" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label">开卡店铺</label>
					<div class="layui-input-inline">
						<select name="shop" lay-search>
							<option value="">请选择店铺</option>
							<?php foreach($this->_data['shop'] as $row) { ?>
							<option value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
							<?php };?>
						</select>
					</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">会员卡类型</label>
					<div class="layui-input-inline">
						<select name="card" lay-search>
							<option value="">请选择会员卡类型</option>
							<?php foreach($this->_data['card_type'] as $row) { ?>
							<option value="<?php echo $row['card_type_id']; ?>"><?php echo $row['card_type_name']; ?></option>
							<?php };?>
						</select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-inline">
						<input type="radio" name="sex" value="3" title="不限" checked="">
						<input type="radio" name="sex" value="1" title="男">
						<input type="radio" name="sex" value="2" title="女">
					</div>
					<div class="layui-form-mid layui-word-aux"></div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">生日时段</label>
					<div class="layui-input-inline">
						<input name="birthday" id="laimi-bfrom" class="layui-input" type="text" placeholder="yyyy-MM-dd">
					</div>
					<div class="layui-form-mid layui-word-aux">至</div>
					<div class="layui-input-inline">
						<input name="lbirthday" id="laimi-bto" class="layui-input" type="text" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">开卡时段</label>
					<div class="layui-input-inline">
						<input name="atime" id="laimi-kfrom" class="layui-input" type="text" placeholder="yyyy-MM-dd">
					</div>
					<div class="layui-form-mid layui-word-aux">至</div>
					<div class="layui-input-inline">
						<input name="latime" id="laimi-kto" class="layui-input" type="text" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">到期时段</label>
					<div class="layui-input-inline">
						<input name="edate" id="laimi-dfrom" class="layui-input" type="text" placeholder="yyyy-MM-dd">
					</div>
					<div class="layui-form-mid layui-word-aux">至</div>
					<div class="layui-input-inline">
						<input name="ledate" id="laimi-dto" class="layui-input" type="text" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">未到店天数</label>
					<div class="layui-input-inline">
						<input name="ldays" class="layui-input laimi-input-80" type="text" name="days" value="">
					</div>
					<div class="layui-form-mid layui-word-aux">天，例：30天内未到店顾客</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">会员手机号</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-200" type="text" name="txtcode" placeholder="卡号/手机号/姓名">
					</div>
					<div class="layui-form-mid layui-word-aux"></div>
				</div>
				<div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit1" lay-submit>搜索</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>
		</div>
	</script>
	<!--新增高级查询弹出层结束-->
	<!--新增微信营销弹出层开始-->
	<script type="text/html" id="laimi-weixin">
		<div id="laimi-modal-weixin" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label">累计人数</label>
					<div class="layui-form-mid layui-word-aux">根据您的搜索条件，将给<span class="laimi-color-ju"><?php echo $this->_data['card_list']['allcount'];?></span>位会员赠送此优惠券</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 活动名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 赠送优惠券</label>
					<div class="layui-input-inline">
						<select name="txtticket" lay-search>
		          <option value="">请选择优惠券</option>
							<optgroup label="代金券">
								<?php foreach($this->_data['money'] as $row) { ?>
								<option value="<?php echo '1,'.$row['ticket_money_id'];?>"><?php echo $row['ticket_money_name'];?></option>
								<?php };?>
							</optgroup>
							<optgroup label="体验券">
								<?php foreach($this->_data['goods'] as $row) { ?>
								<option value="<?php echo '2,'.$row['ticket_goods_id'];?>"><?php echo $row['ticket_goods_name'];?></option>
								<?php };?>
							</optgroup>
		        </select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 通知方式</label>
					<div class="layui-input-inline">
						<input type="checkbox" name="like1[write]" lay-skin="primary" title="微信推送" checked="">
						<input type="checkbox" name="like1[read]" lay-skin="primary" title="短信通知">
					</div>
				</div>
				<div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100 " lay-filter="laimi-submitadd" lay-submit>完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>
		</div>
	</script>
	<!--新增微信营销弹出层结束-->
	<!--新增短信营销弹出层开始-->
	<script type="text/html" id="laimi-sms">
		<div id="laimi-modal-sms" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label">累计人数</label>
					<div class="layui-form-mid layui-word-aux">根据您的搜索条件，将给<span class="laim-color-ju"><?php echo $this->_data['card_list']['allcount'];?></span>位会员发送此短信</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 活动名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 短信内容</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtcontent"></textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">示例短信</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" style="min-height:50px; line-height:26px;">亲爱的{user}，有{wdate}天没看到您啦，非常想念您，您的会员卡{udate}就到期了，尽快过来上课哦~</textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">变量说明</label>
					<div class="layui-form-mid layui-word-aux" style="width:75%;line-height:26px;">姓名{user}，卡号{id}，办卡时间：{tdate}，到期时间：{udate}，生日{bsid}，未到店天数{wdate}</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">注意事项</label>
					<div class="layui-form-mid" class="laimi-color-ju">营销短信发送时间为8:00-18:00，其它时间发送，将影响您的发送结果~</div>
				</div>
				<div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit3" lay-submit>完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>
		</div>
	</script>
	<!--消息弹出层结束-->
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
			elem: '#laimi-bfrom'
		});
		objdate.render({
			elem: '#laimi-bto'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['card_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['card_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		$(".laimi-search").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["高级查询条件", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-search").html()
			});
			objform.render(); //刷新select选择框渲染
			objdate.render({
				elem: '#laimi-bfrom'
			});
			objdate.render({
				elem: '#laimi-bto'
			});
			objdate.render({
				elem: '#laimi-kfrom'
			});
			objdate.render({
				elem: '#laimi-kto'
			});
			objdate.render({
				elem: '#laimi-dfrom'
			});
			objdate.render({
				elem: '#laimi-dto'
			});
		});
		$(".laimi-weixin").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["批量微信营销", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-weixin").html()
			});
			objform.render(); //刷新select选择框渲染
		});
		$(".laimi-sms").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["批量短信营销", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-sms").html()
			});
			objform.render(); //刷新select选择框渲染
		});
		//批量送券JS
		function GetQueryString(name)
		{
		  var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
		  var r = window.location.search.substr(1).match(reg);
		  if(r!=null)return  unescape(r[2]); return '';
		}
		objform.on("submit(laimi-submitadd)", function(data) {
			console.log(1);
	    var _self = $(this);
	    _self.attr('disabled',true);
	    var url="act_batch_add_do.php";
	    var shop = GetQueryString('shop');
	    var card = GetQueryString('card');
	    var sex = GetQueryString('sex');
	    var atime = GetQueryString('atime');
	    var latime = GetQueryString('latime');
	    var edate = GetQueryString('ledate');
	    var ledate = GetQueryString('ledate');
	    var birthday = GetQueryString('birthday');
	    var lbirthday = GetQueryString('lbirthday');
	    var ldays = GetQueryString('ldays');
	    var phone = GetQueryString('phone');
	    var act_name = $("#laimi-modal-weixin input[name='txtname']").val();
	    var ticket = $("#laimi-modal-weixin select[name='txtticket']").val();
	    var sms = $("#laimi-modal-weixin input[name='like1[read]']").val();
	    var weixin = $("#laimi-modal-weixin input[name='like1[write]']").val();
	    var data = {
	    	shop:shop,
	      card:card,
	      sex:sex,
	      atime:atime,
	      latime:latime,
	      edate:edate,
	      ledate:ledate,
	      birthday:birthday,
	      lbirthday:lbirthday,
	      ldays:ldays,
	      act_name:act_name,
	      ticket:ticket,
	      sms:sms,
	      weixn:weixin
	    };
	    console.log(data);
	    $.post(url,data,function(res){
	      if(res=='0'){
	        alert('发送成功！');
	        _self.attr("disabled",false);
	      }else if(res=='100'){
	        alert('没有发送对象');
	        _self.attr("disabled",false);
	      }else{
	        alert('发送失败');
	        console.log(res);
	        _self.attr("disabled",false);
	      }
	    });
			return false;
		});
	});
	</script>
</body>
</html>