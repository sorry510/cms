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
						<a href="act_decrease.php">满减活动</a>
					</li>
					<li class="<?php if ($this->_data['request']['expire'] ==1) {
						echo 'layui-this';
					};?>">
						<a href="act_decrease.php?expire=1">已结束</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-act-decrease layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">活动名称</label>
		<div class="layui-input-inline">
			<input class="layui-input" type="text" name="act_name" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>">
			<input class="laimi-expire" type="hidden" name="expire" value="<?php echo $this->_data['request']['expire'];?>">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input name="from" id="laimi-from" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline last">
			<input name="to" id="laimi-to" class="layui-input laimi-input-100" type="text" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增满减活动</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>名称</th>
			<th>顾客类型</th>
			<th>满减金额</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>备注</th>
			<th>状态</th>
			<th width="130">操作</th>
		</tr> 
  </thead>
	<tbody>
		<?php foreach($this->_data['act_decrease_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date('Y-m-d H:i',$row['act_decrease_atime']) ; ?></td>
			<td><?php echo $row['act_decrease_name']; ?></td>
			<td><?php echo $row['clienttype'] ;?></td>
			<td>满<?php echo $row['act_decrease_man'] ;?>减<?php echo $row['act_decrease_jian'] ;?></td>
			<td><?php echo date('Y-m-d',$row['act_decrease_start']); ?></td>
      <td><?php echo date('Y-m-d',$row['act_decrease_end']); ?></td>
			<td><?php echo $row['act_decrease_memo']; ?></td>
			<td<?php
        if ($row['act_decrease_state'] == 1) {
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
        <button <?php if ($row['datstate'] == '已结束') {
          echo "style='display:none'";
        } ;?> class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['act_decrease_id']; ?>">
          <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
          修改
        </button>
        <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '活动中') {
          echo "style='display:none'";
        } ;?> class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['act_decrease_id']; ?>">
          <svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
          删除
        </button>
        <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '未开始') {
          echo "style='display:none'";
        } ;?> class="layui-btn layui-btn-mini <?php if ($row['act_decrease_state'] == 1) {
          echo " layui-bg-red laimi-stop";
        }else{echo " layui-bg-blue laimi-start";} ; ?> " value="<?php echo $row['act_decrease_id']; ?>">
          <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="<?php if ($row['act_decrease_state'] == 1) {
          	echo '#icon-tingyong';
          }else{
          	echo '#icon-dui';		
          };?>"></use></svg>
          <?php if ($row['act_decrease_state'] == 1) {
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
	<!--新增满减活动弹出层开始-->
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 活动名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 顾客类型</label>
					<div class="layui-input-inline">
						<input type="radio" name="txtclient" value="1" title="不限制" checked="">
						<input type="radio" name="txtclient" value="2" title="会员">
						<input type="radio" name="txtclient" value="3" title="非会员">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 实付满</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtman" placeholder="￥" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">减</div>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtjian" placeholder="￥" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">元，例：满200减50元</div>				
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 开始时间</label>
					<div class="layui-input-inline">
						<input name="txtstart" id="laimi-from2" class="layui-input" type="text" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 结束时间</label>
					<div class="layui-input-inline">
						<input name="txtend" id="laimi-to2" class="layui-input" type="text" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
					</div>
				</div>				
				<div class="layui-form-item">
			    <div class="layui-input-block laimi-buttom-20">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submitadd" lay-submit>完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>	
		</div>
	</script>
	<!--新增满减活动弹出层结束-->
	<!--新增满减活动弹出层开始-->
	<script type="text/html" id="laimi-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 活动名称</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-300" type="text" name="txtname" lay-verify="required">
						<input class="layui-input laimi-input-300" type="hidden" name="txtid">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 顾客类型</label>
					<div class="layui-input-inline">
						<input type="radio" name="txtclient" value="1" title="不限制" checked="">
						<input type="radio" name="txtclient" value="2" title="会员">
						<input type="radio" name="txtclient" value="3" title="非会员">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 实付满</label>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtman" placeholder="￥" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">减</div>
					<div class="layui-input-inline">
						<input class="layui-input laimi-input-80" type="text" name="txtjian" placeholder="￥" lay-verify="required">
					</div>
					<div class="layui-form-mid layui-word-aux">元，例：满200减50元</div>				
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 开始时间</label>
					<div class="layui-input-inline">
						<input name="txtstart" id="laimi-from3" class="layui-input" type="text" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"><span>*</span> 结束时间</label>
					<div class="layui-input-inline">
						<input name="txtend" id="laimi-to3" class="layui-input" type="text" placeholder="yyyy-MM-dd" lay-verify="required">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea class="layui-textarea laimi-input-b80" name="txtmemo"></textarea>
					</div>
				</div>				
				<div class="layui-form-item">
			    <div class="layui-input-block laimi-buttom-20">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submitedit" lay-submit>完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
			</form>	
		</div>
	</script>
	<!--新增满减活动弹出层结束-->
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
			count: <?php echo $this->_data['act_decrease_list']['allcount'];?>,
			limit: 25,
			curr: <?php echo $this->_data['act_decrease_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
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
				title: ["新增满减活动", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html()
			});
			objform.render(); //刷新select选择框渲染
			objdate.render({
				elem: '#laimi-from2'
			});
			objdate.render({
				elem: '#laimi-to2'
			});
		});
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改满减活动", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-edit").html()
			});
		  var url="act_decrease_edit_ajax.php";
		  var data = $(this).val();
		  $.getJSON(url,{id:data},function(res){
		    $("#laimi-modal-edit input[name='txtid']").val(res.act_decrease_id);
		    $("#laimi-modal-edit input[name='txtname']").val(res.act_decrease_name);
		    $("#laimi-modal-edit input[name='txtman']").val(res.act_decrease_man);
		    $("#laimi-modal-edit input[name='txtjian']").val(res.act_decrease_jian);
		    $("#laimi-modal-edit input[name='txtclient']").each(function(){
	        if($(this).val() == res.act_decrease_client){
	          $(this).attr('checked',true);
	        }
	      });
		    $("#laimi-modal-edit textarea[name='txtmemo']").val(res.act_decrease_memo);
		    objform.render(); //刷新select选择框渲染
			  objdate.render({
					elem: '#laimi-from3',
					value: res.act_decrease_start
				});
				objdate.render({
					elem: '#laimi-to3',
					value: res.act_decrease_end
				});
		  });
		});
		//添加操作JS
		objform.on("submit(laimi-submitadd)", function(data) {
			var expire = $('.laimi-expire').val();
			var _self = $(this);
		  _self.attr('disabled',true);
		  var url="act_decrease_add_do.php";
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		    	window.location="act_decrease.php";
		    }else if(res=='100'){
		      alert('活动结束时间必须大于当前时间'); 
		      _self.attr("disabled",false);
		    }else if(res=='1'){
		      alert('请完善数据');
		      _self.attr("disabled",false);
		    }else{
		      alert('添加失败');
		      _self.attr("disabled",false);
		    }
		  });
			return false;
		});
		//修改操作JS
		objform.on("submit(laimi-submitedit)", function(data) {
			var _self = $(this);
		  _self.attr('disabled',true);
		  var url="act_decrease_edit_do.php";
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		      window.location.reload();
		    }else if(res=='100'){
		      alert('活动结束时间必须大于当前时间');
		      _self.attr("disabled",false);
		    }else if(res=='101'){
		      alert('活动已经结束');
		      _self.attr("disabled",false);
		    }else if(res=='1'){
		      alert('请完善数据');
		      _self.attr("disabled",false);
		    }else{
		      alert('修改失败');
		      _self.attr("disabled",false);
		      console.log(res);
		    }
		  });
			return false;
		});
		//停用操作JS
	  $(".laimi-stop").on("click", function() {
			var url="act_decrease_stop_do.php";
      var data = {
        id:$(this).val(),
        type:'stop'
      }
			objlayer.confirm('你确定要修改吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
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
	      })
			  objlayer.close(index);
			});
		})
		//启用操作JS
	  $(".laimi-start").on("click", function() {
			var url="act_decrease_stop_do.php";
      var data = {
        id:$(this).val(),
        type:'start'
      }
			objlayer.confirm('你确定要修改吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post(url, {id:id}, function(res){
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
		//删除操作JS
	  $(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('act_decrease_delete_do.php', {id:id}, function(res){
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