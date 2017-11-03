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
					<li class="<?php if ($this->_data['request']['expire'] !=1) {
						echo 'layui-this';
					};?>">
						<a href="act_discount.php">限时打折</a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] ==1) {
						echo 'layui-this';
					};?>">
						<a href="act_discount.php?expire=1">已结束</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-discount layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="act_name" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>">
			<input class="layui-input" type="hidden" name="expire" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input name="from" id="laimi-from" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline last">
			<input name="to" id="laimi-to" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn" href="act_discount_add.php">新增打折活动</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>名称</th>
			<th>类型</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>备注</th>
			<th>状态</th>
			<th width="130">操作</th>
		</tr> 
  </thead>
	<tbody>
		<?php foreach($this->_data['act_discount_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['act_discount_atime']) ; ?></td>
			<td><?php echo $row['act_discount_name']; ?></td>
			<td><?php echo $row['clienttype'] ;?></td>
			<td><?php echo date('Y-m-d',$row['act_discount_start']); ?></td>
      <td><?php echo date('Y-m-d',$row['act_discount_end']); ?></td>
			<td><?php echo $row['act_discount_memo']; ?></td>
			<td<?php
        if ($row['act_discount_state'] == 1) {
          if ($row['datstate'] == '活动中') {
            echo " class='laimi-color-lv'>活动中";
          }elseif ($row['datstate'] == '未开始') {
            echo " class='laimi-color-huang'>未开始";
          }elseif ($row['datstate'] == '已结束') {
            echo " >已结束";
          }
        }else{ echo " class='laimi-color-ju'>已停止"; }
          ;?></td>
			<td>
        <button onclick="window.location.href='act_discount_edit.php?id=<?php echo $row['act_discount_id'];?>'" <?php if ($row['datstate'] == '已结束') {
          echo "style='display:none'";
        } ;?> class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['act_discount_id']; ?>">
          <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
          修改
        </button>
        <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '活动中') {
          echo "style='display:none'";
        } ;?> class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['act_discount_id']; ?>">
          <svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
          删除
        </button>
        <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '未开始') {
          echo "style='display:none'";
        } ;?> class="layui-btn layui-btn-mini <?php if ($row['act_discount_state'] == 1) {
          echo " layui-bg-red laimi-stop";
        }else{echo " layui-bg-blue laimi-start";} ; ?> " value="<?php echo $row['act_discount_id']; ?>">
          <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="<?php if ($row['act_discount_state'] == 1) {
          	echo '#icon-tingyong';
          }else{
          	echo '#icon-dui';		
          };?>"></use></svg>
          <?php if ($row['act_discount_state'] == 1) {
            echo "停止";
          }else{ echo "启用";} ;?>
        </button>
      </td>
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
	layui.use(["element", "laydate", "laypage", "layer"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['act_discount_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['act_discount_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		//停止启用操作JS
		$('.laimi-stop').on('click',function(){
      var url="act_discount_stop_do.php";
      var data = {
        id:$(this).val(),
        type:'stop'
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='101'){
          alert('活动已经结束');
        }else if(res=='102'){
          alert('活动未开始');
        }else{
          alert('停止失败');
        }
      });
		});
		$('.laimi-start').on('click',function(){
      var url="act_discount_stop_do.php";
      var data = {
        id:$(this).val(),
        type:'start'
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('启用失败');
        }
      });
		});
		//删除操作JS
	  $(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('act_discount_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		})
	});
	</script>
</body>
</html>