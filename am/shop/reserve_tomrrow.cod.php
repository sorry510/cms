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
						<a href="reserve_today.php">今日预约</a>
					</li>
					<li class="layui-this">
						<a href="reserve_tomrrow.php">明日预约</a>
					</li>
					<li>
						<a href="reserve_more.php">更多预约</a>
					</li>
					<li>
						<a href="reserve_expire.php">过期预约</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" name="from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
		</div>
		<label class="layui-form-label laimi-input" style="width:0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" name="to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="卡号/手机号/姓名" value="<?php echo htmlspecialchars($this->_data['request']['search']); ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a href="reserve_add.php" class="layui-btn">新增预约</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>到店时间</th>
			<th>卡号</th>
			<th>姓名</th>
			<th>电话</th>
			<th>人数</th>		
			<th>时间</th>			
			<th>备注</th>
			<th>方式</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['reserve_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['reserve_dtime']) ; ?></td>
			<td><?php echo $row['code']; ?></td>
			<td><?php echo $row['reserve_name']; ?></td>
      <td><?php echo $row['reserve_phone']; ?></td>
      <td><?php echo $row['reserve_count']; ?></td>
			<td title="<?php echo date('Y-m-d H:i',$row['reserve_atime']); ?>"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-yingyeshijian"></use></svg></td>			
			<td title="<?php echo $row['reserve_memo'] ;?>"><svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-xiaoxi"></use></svg></td>
			<td><span class="layui-badge" style="background-color:#62b900;"><?php echo $row['type']; ?></span></td>
			<td><?php echo $row['state'] ;?></td>
			<td>
				<button class="layui-btn  layui-btn-warm layui-btn-mini laimi-here" value="<?php echo $row['reserve_id']; ?>" <?php if ($row['reserve_here'] == 1 || $row['reserve_dtime']<strtotime(date('Y-m-d',time())) || $row['reserve_state'] == 2) {
            echo "style='display:none;'";
          } ;?>>
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-yingyeting"></use></svg>
					到店
				</button>
				<button class="layui-btn layui-btn-mini" onclick="window.location.href='reserve_edit.php?id=<?php echo $row['reserve_id'];?>'" value="<?php echo $row['reserve_id']; ?>" <?php if ($row['reserve_here'] == 1 || $row['reserve_dtime']<strtotime(date('Y-m-d',time())) || $row['reserve_state'] == 2) {
            echo "style='display:none;'";
          } ;?>>
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-stop" value="<?php echo $row['reserve_id']; ?>" <?php if ($row['reserve_here'] == 1 || $row['reserve_dtime']<strtotime(date('Y-m-d',time())) || $row['reserve_state'] == 2) {
            echo "style='display:none;'";
          } ;?>>
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					取消
				</button>
			</td>
		</tr>
		<tr>
			<td colspan="11" class="laimi-color-hui" style="text-align:left;">预约项目：<?php echo $row['mgoods']; ?></td>
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
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['reserve_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['reserve_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});	
	  objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		//取消预约操作JS
		$('.laimi-stop').on('click',function(){
		  var url="reserve_cancel_do.php";
		  var data = {
		    id:$(this).val(),
		    type:'stop'
		  }
		  console.log(data);
		  $.post(url,data,function(res){
		    if(res=='0'){
		      window.location.reload();
		    }else if(res=='100'){
		      alert('客人已到店');
		    }else if(res=='101'){
		      alert('预约已过期');
		    }else{
		      alert('停止失败');
		      console.log(res);
		    }
		  });
		});
		//到店操作JS
		$('.laimi-here').on('click',function(){
		  var url="reserve_here_do.php";
		  var data = {
		    id:$(this).val(),
		  }
		  console.log(data);
		  $.post(url,data,function(res){
		    if(res=='0'){
		      window.location.reload();
		    }else if(res=='101'){
		      alert('预约已过期');
		    }else{
		      alert('操作失败');
		      console.log(res);
		    }
		  });
		});
	});
	</script>
</body>
</html>