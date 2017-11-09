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
					<li class="layui-this">限时打折</li>
					<li><a href="act_discoun_add.php">新增打折活动</a></li>
				</ul>
				<div class="layui-tab-content">
					<form class="layui-form" action="">		    
		 		 <div class="layui-form-item">		  	
		      <label class="layui-form-label laimi-input" style="width: 80px;">活动名称</label>
		      <div class="layui-input-inline">
		        <input type="tel" name="phone" placeholder="" autocomplete="off" class="layui-input">
		      </div>
		      <label class="layui-form-label laimi-input">日期</label>
		      <div class="layui-input-inline">
		        <input type="text" class="layui-input laimi-input-100" id="test1" placeholder="yyyy-MM-dd">
		      </div>
		      <label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		      <div class="layui-input-inline">
		        <input type="text" class="layui-input laimi-input-100" id="test2" placeholder="yyyy-MM-dd">
		      </div>		      
		    <div class="layui-inline">
		     	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		  	</div>		  			   		    		  	    	    
		    <div class="layui-inline laimi-float-right">
		    	<a href="act_discoun_add.php" class="layui-btn">新增打折活动</a>
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
			      <th>操作</th>
				    </tr> 
			  </thead>
			  <tbody>
			    <tr>
			    	<td>2017-12-18 12:40</td>
			      <td>国庆节8折活动</td>
			      <td>非会员</td>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>			      
			      <td>备注信息</td>
			      <td>已结束</td>
			      <td>
			      </td>    	
			    </tr>	
			    <tr>
			    	<td>2017-12-18 12:40</td>
			      <td>国庆节8折活动</td>
			      <td>非会员</td>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>			      
			      <td>备注信息</td>
			      <td style="color: #009688;">活动中</td>
			      <td><button class="layui-btn layui-bg-red layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>&nbsp;停止</button></td>
			    </tr>
			    <tr>
			    	<td>2017-12-18 12:40</td>
			      <td>国庆节8折活动</td>
			      <td>非会员</td>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>			      
			      <td>备注信息</td>
			      <td style="color: #FFB800;">未开始</td>
			      <td><button class="layui-btn layui-btn-mini">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>&nbsp;修改</button>		
			      	<button class="layui-btn layui-btn-primary layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>&nbsp;删除</button></td>
			    </tr>
			    <tr>
			    	<td>2017-12-18 12:40</td>
			      <td>国庆节8折活动</td>
			      <td>非会员</td>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>			      
			      <td>备注信息</td>
			      <td style="color: #FF5722;">已停止</td>
			      <td><button class="layui-btn layui-btn-mini">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>&nbsp;修改</button>		
			      	<button class="layui-btn layui-bg-blue layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-songda"></use></svg>&nbsp;启用</button></td>	
			    </tr>		    
			  </tbody>
			</table>	
			<div class="laimi-fenye">
						<div id="demo7"></div>
					</div>
				</div>
			</div> 
		</div>
	</div>	
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

<script>
//分页
layui.use(['laypage', 'layer'], function(){
var laypage = layui.laypage
,layer = layui.layer;

//自定义首页、尾页、上一页、下一页文本
laypage.render({
elem: 'demo7'
,count: 50
,limit:50
,layout: ['count', 'prev', 'page', 'next', 'skip']
,jump: function(obj){
console.log(obj)
}
});

});
		</script>
</body>
</html>