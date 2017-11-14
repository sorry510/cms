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
						<a href="card_history.php">电子档案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-card-history layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" name="from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['from']?>">
		</div>
		<label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" name="to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['to']?>">
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="会员卡号/姓名/手机号码" value="<?php echo $this->_data['request']['search']?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a href="card_history_add.php" class="layui-btn">新增电子档案</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>时间</th>
			<th>卡号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>手机</th>
			<th>卡类型</th>
			<th>诊疗人员</th>
			<th>分店</th>
			<th width="200">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['record_history']['list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['c_card_code'];?></td>
			<td><?php echo $row['c_card_name'];?></td>
			<td><?php echo $row['sex'];?></td>
			<td><?php echo $row['age'];?>岁</td>
			<td><?php echo $row['c_card_phone'];?></td>
			<td><?php echo $row['c_card_type_name'];?></td>
			<td><span class="laimi-color-ju"><?php echo $row['c_worker_name'];?></span></td>
			<td><?php echo $row['shop_name'];?></td>
			<td>
				<button type="button" class="layui-btn layui-btn-mini laimi-info" value="<?php echo $row['card_history_id'];?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					档案明细
				</button>
				<a type="button" class="layui-btn layui-btn-mini" value="<?php echo $row['card_history_id'];?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					档案修改
				</a>
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
	<!--电子档案明细弹出层开始-->
	<script type="text/html" id="laimi-script-info">
		<div id="laimi-modal-info" class="laimi-modal">
			<div class="layui-row">
				<div class="layui-col-md4">
					<label class="layui-form-label">会员照片</label>
				  <div class="layui-form-mid layui-word-aux"><img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=card&image=";?>{{d.card_photo_file}}" style="width:130px;height:130px;"></div>
				</div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">时间</label>
				    <div class="layui-form-mid layui-word-aux">{{d.atime}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">卡号</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_code}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">姓名</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">性别</label>
				    <div class="layui-form-mid layui-word-aux">{{d.sex}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">年龄</label>
				    <div class="layui-form-mid layui-word-aux">{{d.age}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">手机</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_phone}}</div>
				  </div>
		    </div>	    
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">卡类型</label>
				    <div class="layui-form-mid layui-word-aux">{{d.c_card_type_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">诊疗人员</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">{{d.c_worker_name}}</span></div>
				  </div>
		    </div>
		    <div class="layui-col-md4">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">分店</label>
				    <div class="layui-form-mid layui-word-aux">{{d.shop_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">问题描述</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80">{{d.card_history_question}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">诊疗结果</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80">{{d.card_history_result}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md12">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">诊疗方案</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80">{{d.card_history_plan}}</div>
				  </div>
		    </div>
				<div class="layui-col-md12">
					<label class="layui-form-label">图片</label>
			    <div class="layui-form-mid layui-word-aux"><img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=history&image=";?>{{d.card_photo_file}}" style="width:120px;height:120px;"></div>
	 				<div class="layui-form-mid layui-word-aux"><img src="/img/no.jpg" style="width:120px;height:120px;"></div>
	 				<div class="layui-form-mid layui-word-aux"><img src="/img/no.jpg" style="width:120px;height:120px;"></div>
	 				<div class="layui-form-mid layui-word-aux"><img src="/img/no.jpg" style="width:120px;height:120px;"></div>
	 				<div class="layui-form-mid layui-word-aux"><img src="/img/no.jpg" style="width:120px;height:120px;"></div>
				</div>			    
			</div>
		</div>
	</script>
	<!--电子档案明细弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['record_history']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['record_history']['pagenow'];?>,
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
			$.getJSON('card_history_edit_ajax.php', {id:$(this).val()}, function(data){
				objlaytpl($("#laimi-script-info").html()).render(data, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["电子档案信息", "font-size:16px;"],
				  	btnAlign: "r",
				  	offset: 'rt',
				  	anim: 7,
				  	area: ["800px", "100%"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html,
				  	success: function(){
				  	
				  	}
				  });
				});
			})
		});
	});
	</script>
</body>
</html>