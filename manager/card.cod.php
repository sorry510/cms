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
					<li class="<?php if($this->_data['request']['state']==1) echo 'layui-this';?>">
						<a href="card.php?state=1">会员管理</a>
					</li>
					<li class="<?php if($this->_data['request']['state']==2) echo 'layui-this';?>">
						<a href="card.php?state=2">过期用户</a>
					</li>
					<li class="<?php if($this->_data['request']['state']==3) echo 'layui-this';?>">
						<a href="card.php?state=3">回收站</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-card layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<?php foreach($this->_data['shop_list'] as $row) { ?>
				   <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$this->_data['request']['shop']) echo "selected";?>><?php echo $row['shop_name'];?></option>
				<?php }?>
			</select>
		</div>
		<label class="layui-form-label">卡类型</label>
		<div class="layui-input-inline">
			<select name="cardtype">
				<option value="all" <?php if($this->_data['request']['cardtype']=='all') echo "selected";?>>全部</option>
				<option value="0" <?php if($this->_data['request']['cardtype']=='0') echo "selected";?>>未设置</option>
				<?php foreach($this->_data['card_type_list'] as $row) { ?>
				<option value="<?php echo $row['card_type_id'];?>" <?php if($row['card_type_id']==$this->_data['request']['cardtype']) echo "selected";?>><?php echo $row['card_type_name'];?></option>
				<?php }?>
			</select>
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="卡号/手机号/姓名" value="<?php echo $this->_data['request']['search']?>">
			<input class="layui-input laimi-input-200" type="hidden" name="state" value="<?php echo $this->_data['request']['state']?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>卡号</th>
			<th>姓名</th>
			<th>手机</th>
			<th>性别</th>
			<th>开卡时间</th>
			<th>到期时间</th>
			<th>卡类型</th>
			<th>卡状态</th>
			<th>电子档案</th>
			<th>消费明细</th>
			<th>所属店铺</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['card_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['card_code'];?></td>
			<td><a class="laimi-color-lan laimi-info" card="<?php echo $row['card_id'];?>" href="javascript:;"><?php echo $row['card_name'];?></a></td>
			<td><?php echo $row['card_phone'];?></td>
			<td><?php echo $row['sex'];?></td>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['edate'];?></td>
			<td><?php echo $row['c_card_type_name'];?></td>
			<td><?php echo $row['state'];?></td>
			<td><a class="laimi-color-lan" href="#">电子档案</a></td>
			<td><a class="laimi-color-lan" href="#">消费明细</a></td>
			<td><?php echo $row['shop_name'];?></td>
		</tr>
		<tr>
			<td colspan="11" class="laimi-color-hui" style="text-align:left;">余额：<span class="laimi-color-ju">￥<?php echo $row['s_card_ymoney'];?></span>，剩余积分：<?php echo $row['s_card_yscore'];?>
			<?php if(!empty($row['mcombo'])){?>，卡余：【
			  <?php foreach($row['mcombo'] as $row2){
			  echo $row2['c_mgoods_name'];
			  if($row2['c_mcombo_type']==1){
			    echo '(<span class="laimi-color-ju">'.$row2['card_mcombo_gcount'].'</span>)';
			  }
			  echo '，到期时间:';
			  echo date('Y-m-d',$row2['card_mcombo_cedate']);
			  echo '；';
			  }?>】
			<?php }?>
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
	<!--会员明细弹出层开始-->
	<script type="text/html" id="laimi-script-info">
		<div id="laimi-modal-info" class="laimi-modal">
			<div class="layui-row">
				<div class="layui-col-md4">
					<label class="layui-form-label">会员照片</label>
				  <div class="layui-form-mid layui-word-aux"><img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=card&image=";?>{{d.card_photo_file}}" style="width:130px;height:130px;"></div>
				</div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">会员卡号</label>
				    <div class="layui-form-mid layui-word-aux">{{d.card_code}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
				    <label class="layui-form-label">会员姓名</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-blue">{{d.card_name}}</span></div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
			    <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">卡类型</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_type_name}}({{d.discount}}折)</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">余额</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥{{d.s_card_ymoney}}</span></div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">积分</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">{{d.s_card_yscore}}分</span></div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">累计消费</label>
				    <div class="layui-form-mid layui-word-aux">￥{{d.s_card_smoney}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">手机号码</label>
				    <div class="layui-form-mid layui-word-aux">{{d.card_phone}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">性别</label>
				    <div class="layui-form-mid layui-word-aux">{{d.sex}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">出生日期</label>
				    <div class="layui-form-mid layui-word-aux">{{d.birthday}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">身份证号</label>
				    <div class="layui-form-mid layui-word-aux">{{d.card_identity}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">联系人</label>
				    <div class="layui-form-mid layui-word-aux">{{d.card_link}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">开通时间</label>
				    <div class="layui-form-mid layui-word-aux">{{d.atime}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:0;">
				    <label class="layui-form-label">到期时间</label>
				    <div class="layui-form-mid layui-word-aux">{{d.edate}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
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
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom:0;">
			    	<label class="layui-form-label">卡余套餐</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">
				    	<table class="layui-table" lay-filter="mcombo">
							  <thead>
							    <tr>
							      <th>名称</th>
							      <th>价格</th>
							      <th>数量</th>
							      <th>到期时间</th>
							    </tr>
							  </thead>
							  <tbody>
							  {{#  layui.each(d.mcombo, function(index, item){ }}
							    <tr>
							      <td>{{item.c_mgoods_name}}</td>
							      <td>{{item.c_mgoods_price}}元</td>
							      <td>{{item.card_mcombo_gcount}}元</td>
							      <td>{{item.edate}}</td>
							    </tr>
							  {{# }) }}
							  </tbody>
							</table>
				    </div>
			  	</div>
		    </div>
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    	<label class="layui-form-label">优惠券</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">
				    	<table class="layui-table" lay-filter="ticket">
							  <thead>
							    <tr>
							      <th>类型</th>
							      <th>名称</th>
							      <th>价值</th>
							      <th>到期时间</th>
							    </tr>
							  </thead>
							  <tbody>
							  {{#  layui.each(d.ticket, function(index2, item2){ }}
							    <tr>
							      <td>{{item2.typename}}</td>
							      <td>{{item2.c_ticket_name}}</td>
							      <td>{{item2.c_ticket_value}}元</td>
							      <td>{{item2.edate}}</td>
							    </tr>
							  {{# }) }}
							  </tbody>
							</table>
				    </div>
			  	</div>
		    </div>
			</div>
		</div>
	</script>
	<!--会员明细弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laypage", "layer", "form", "laytpl", "table"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;
		var objtable = layui.table;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['card_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['card_list']['pagenow'];?>,
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
			$.getJSON('card_edit_ajax.php', {id:$(this).attr('card')}, function(data){
				objlaytpl($("#laimi-script-info").html()).render(data, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["电子档案信息", "font-size:16px;"],
				  	btnAlign: "r",
				  	offset: 'rt',
				  	anim: 2,
				  	area: ["800px", "100%"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html,
				  	success: function(){
				  		$('.layui-layer-content').css('overflow', 'auto');
				  	}
				  });
				});
			})
		});
	});
	</script>
</body>
</html>