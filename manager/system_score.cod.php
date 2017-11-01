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
						<a href="system_score.php">积分换礼</a>
					</li>
					<li>
						<a href="system_gift.php">礼品管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-score layui-tab-content">
<form class="layui-form">		    
	<div class="laimi-tools layui-form-item">		  	
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="key" placeholder="卡号/手机号/姓名">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">分店</label>
		<div class="layui-input-inline last">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="1">东风路分店</option>
				<option value="2">王城路分店</option>
				<option value="3">九都路分店</option>
			</select>
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-filter="laimi-search" lay-submit>搜索</button>
		</div>		  			   		    		  	    	    
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">积分换礼</a>
		</div>		  		    
	</div>
</form>		  
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>卡号</th>
			<th>会员姓名</th>
			<th>兑换内容</th>
			<th>兑换积分</th>
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['gift_record_list']['list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['c_card_code'];?></td>
			<td><?php echo $row['c_card_name'];?></td>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['gift_score'];?>分</td>
			<td><?php echo $row['shop_id'];?></td>
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
	<!--积分换礼弹出层开始-->
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
				<blockquote class="layui-elem-quote" style="padding:8px;">
					<div class="layui-form-item">
				    <label class="layui-form-label" style="width:60px;">搜索条件</label>
						<div class="layui-input-inline">
							<input class="layui-input" type="txtkey" name="title" placeholder="卡号/手机号/姓名">
						</div>
				    <div class="layui-inline">
				       <button class="layui-btn layui-btn-normal">搜索</button>
				    </div>
						<div class="layui-inline" style="margin-left:20px;">
							张小宇，余<span class="laimi-font2">100010</span>分
						</div>
			  	</div>		
				</blockquote>
				<div style="overflow-y:auto; height:300px;">			 
				<table class="layui-table">
					<thead>
						<tr>
							<th width="30"><input type="checkbox" lay-skin="primary"></th>
							<th>礼品名称</th>
							<th>扣除积分</th>
							<th>数量</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" name="txtid" lay-skin="primary"></td>
							<td>汰渍洗衣液洁净系列3L(袋)</td>
							<td>300分</td>
							<td>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg>
									</button>
								</div>
								<div class="layui-input-inline" style="width:40px;">
									<input class="layui-input" type="text" value="1" style="padding-left:0px;height:30px;text-align:center;">
								</div>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg>
									</button>
								</div>
							</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtid" lay-skin="primary"></td>
							<td>汰渍洗衣液洁净系列3L(袋)</td>
							<td>300分</td>
							<td>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg>
									</button>
								</div>
								<div class="layui-input-inline" style="width:40px;">
									<input class="layui-input" type="text" value="1" style="padding-left:0px;height:30px;text-align:center;">
								</div>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg>
									</button>
								</div>
							</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtid" lay-skin="primary"></td>
							<td>汰渍洗衣液洁净系列3L(袋)</td>
							<td>300分</td>
							<td>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg>
									</button>
								</div>
								<div class="layui-input-inline" style="width:40px;">
									<input class="layui-input" type="text" value="1" style="padding-left:0px;height:30px;text-align:center;">
								</div>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg>
									</button>
								</div>
							</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtid" lay-skin="primary"></td>
							<td>汰渍洗衣液洁净系列3L(袋)</td>
							<td>300分</td>
							<td>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg>
									</button>
								</div>
								<div class="layui-input-inline" style="width:40px;">
									<input class="layui-input" type="text" value="1" style="padding-left:0px;height:30px;text-align:center;">
								</div>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg>
									</button>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="layui-input-inline" style="margin-top:20px;">
					累计扣除积分：<span class="laimi-font2">680</span>分，剩余积分：0分
				</div>
				<div class="layui-input-inline laimi-float-right" style="margin-top:20px;">
					<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit style="margin-right:30px;">
						兑换礼品
					</button>
				</div>
			</form>	
		</div>
	</script>
	<!--积分换礼弹出层结束-->
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
			count: <?php echo $this->_data['gift_record_list']['allcount'];?>,
			limit: 5,
			curr: <?php echo $this->_data['gift_record_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
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
				title: ["积分换礼", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html()
			});
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
</body>
</html>