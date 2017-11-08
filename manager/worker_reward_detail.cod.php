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
				<div id="laimi-main" class="p-worker-reward-detail layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<?php foreach($this->_data['shop_list'] as $row){?>
				  <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$this->_data['request']['shop']) echo 'selected'?>><?php echo $row['shop_name'];?></option>
				<? }?>
			</select>
		</div>
		<label class="layui-form-label">日期</label>
      <div class="layui-input-inline">
        <input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['from'];?>">
      </div>
      <label class="layui-form-label">至</label>
      <div class="layui-input-inline">
        <input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['to'];?>">
      </div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="姓名/编号" value="<?php echo $this->_data['request']['search'];?>">
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
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['reward_list']['list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><a class="laimi-color-lan laimi-offcanvas" href="javascript:;"><?php echo $row['c_card_record_code'];?></a></td>
			<td><?php echo $row['c_card_code'];?></td>
			<td><?php echo $row['c_card_name'];?></td>
			<td><?php echo $row['worker_reward_type1'];?></td>
			<td><?php if($row['c_goods_name'] !=''){echo $row['c_goods_name'].'*'.$row['c_goods_count'];} else echo '--';?></td>	
			<td><span class="laimi-color-ju"><?php echo $row['worker_reward_money'];?></span></td>
			<td><?php echo $row['c_worker_name'];?></td>
			<td><?php echo $row['shop_name'];?></td>
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
	<script type="text/html" id="laimi-script-show">
		<div id="laimi-modal-show" class="laimi-modal">
			<div class="layui-row">	
				<div class="layui-col-md6">
					<label class="layui-form-label">会员照片</label>
				    <div class="layui-form-mid layui-word-aux">022511</div>
				</div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">会员卡号</label>
			    <div class="layui-form-mid layui-word-aux">1022511</div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">会员姓名</label>
			    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-blue">刘德华</span></div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">卡类型</label>
			    <div class="layui-form-mid layui-word-aux">钻石卡(8.8折)</div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">余额</label>
			    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥1286.00</span></div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">积分</label>
			    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">1286分</span></div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">累计消费</label>
			    <div class="layui-form-mid layui-word-aux">￥8800.00</div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">手机号码</label>
			    <div class="layui-form-mid layui-word-aux">13623833360</div>
			  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom: 0px;">
			    <label class="layui-form-label">性别</label>
			    <div class="layui-form-mid layui-word-aux">男</div>
			  </div>
			</div>
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	// layui.extend({offcanvas: '../js/extends/offcanvas'});//扩展js文件文件路径
	layui.use(["element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		var objoffcanvas = layui.offcanvas;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['reward_list']['allcount'];?>,
			limit: 5,
			curr: <?php echo $this->_data['reward_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
	});
	</script>
</body>
</html>