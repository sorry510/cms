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
					<li><a href="system_score.php">积分换礼</a></li>
					<li class="layui-this">礼品管理</li>
				</ul>
				<div class="layui-tab-content">
					<form class="layui-form" action="">		    
		 		 <div class="layui-form-item">		  	
		      <label class="layui-form-label laimi-input">礼品名称</label>
		      <div class="layui-input-inline">
		        <input type="tel" name="phone" placeholder="输入礼品名称" autocomplete="off" class="layui-input">
		      </div>
		    <div class="layui-inline">
		     	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		  	</div>		  			   		    		  	    	    
		    <div class="layui-inline laimi-float-right">
		    	<a id="laimi-modal" href="javascript:;" class="layui-btn">新增礼品</a>
		  	</div>		  		    
		  </div>
		  </form>		  
		  <table class="layui-table">
			  <colgroup>
			    <col width="150">
			    <col width="120">
			    <col width="120">
			    <col width="250">
			    <col width="120">
			    <col width="200">
			  </colgroup>
			  <thead>
			    <tr>
			      <th>新增日期</th>
			      <th>名称</th>
			      <th>积分</th>
			      <th>操作</th>
				    </tr> 
			  </thead>
			  <tbody>
			    <tr>
			    	<td>2017-12-18 12:40:23</td>
			      <td>洗衣液</td>
			      <td>300分</td>
			      <td>东风路分店</td>
			    </tr>			    
			  </tbody>
			</table>	
				</div>
			</div> 
		</div>
	</div>
	<!--新增操作员弹出菜单开始-->
	<div id="id1" style="display: none;padding: 20px;">
		<form class="layui-form" action="">
			<div class="layui-form-item">
					<label class="layui-form-label">礼品名称</label>
					<div class="layui-input-inline">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">扣除积分</label>
					<div class="layui-input-inline">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-100">
					</div>
					<div class="layui-form-mid layui-word-aux">分，兑换一份礼品所需的积分</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">
						完成
						</button>
					</div>
				</div>
		</form>	
	</div>
	<!--消息弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	
	<script>
	layui.use(["element"], function() {
		var objelement = layui.element;
	});
	</script>
	
	<script>
//这个是下拉框
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
  
  //四、弹出层
layui.use('layer', function(){ //独立版的layer无需执行这一句
  var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
//弹出一个页面层
  $('#laimi-modal').on('click', function(){
    layer.open({
      type: 1,
			title: ['新增礼品', 'font-size:16px;'],
			btnAlign: 'r',
      area: ['680px', '260px'],
      shadeClose: true, //点击遮罩关闭
      content: $('#id1')
    });
  });
  });
});
</script>
<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;    
  //常规用法
  laydate.render({
    elem: '#test1'
  });
  //常规用法
  laydate.render({
    elem: '#test2'
  });
});
</script>


</body>
</html>