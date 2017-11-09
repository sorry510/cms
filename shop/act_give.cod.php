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
					<li class="layui-this">满送活动</li>
				</ul>
				<div class="layui-tab-content">
					<form class="layui-form" action="">		    
		 		 <div class="layui-form-item">		  	
		      <label class="layui-form-label laimi-input">活动名称</label>
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
		    	<a id="laimi-modal" href="javascript:;" class="layui-btn">新增满送</a>
		  	</div>		  		    
		  </div>
		  </form>		  
		  <table class="layui-table">
			  <thead>
			    <tr>
			      <th>日期</th>
			      <th>名称</th>
			      <th>消费满</th>
			      <th>赠送类型</th>
			      <th>送券内容</th>
			      <th>开始时间</th>
			      <th>结束时间</th>
			      <th>备注</th>
			      <th>状态</th>
			      <th>操作</th>
				    </tr> 
			  </thead>
			  <tbody>
			    <tr>
			    	<td>2017-12-18</td>
			      <td>国庆节8折活动</td>
			      <td>100元</td>
			      <td>代金券</td>
			      <th>5元代金券</th>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>
			      <td>备注</td>
			      <td style="color: #FFB800;">未开始</td>
			      <td><button class="layui-btn layui-btn-mini">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>&nbsp;修改</button>		
			      	<button class="layui-btn layui-btn-primary layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>&nbsp;删除</button></td>
			    </tr>	
			    <tr>
			    	<td>2017-12-18</td>
			      <td>国庆节8折活动</td>
			      <td>100元</td>
			      <td>代金券</td>
			      <th>5元代金券</th>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>
			      <td>备注</td>
			      <td style="color: #009688;">活动中</td>
			      <td><button class="layui-btn layui-bg-red layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>&nbsp;停止</button></td>
			    </tr>	
			    <tr>
			    	<td>2017-12-18</td>
			      <td>国庆节8折活动</td>
			      <td>100元</td>
			      <td>代金券</td>
			      <th>5元代金券</th>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>
			      <td>备注</td>
			      <td>已结束</td>
			      <td><button class="layui-btn layui-bg-red layui-btn-mini" data-method="confirmTrans">
			      	<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>&nbsp;停止</button></td>
			    </tr>	
			    <tr>
			    	<td>2017-12-18</td>
			      <td>国庆节8折活动</td>
			      <td>100元</td>
			      <td>代金券</td>
			      <th>5元代金券</th>
			      <td>2017-10-1</td>
			      <td>2017-10-8</td>
      			<td>备注</td>
			      <td>已结束</td>
			      <td></td>
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
	<!--新增操作员弹出菜单开始-->
	<div id="id1" style="display: none;padding: 20px;">
		<form class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">活动名称</label>
					<div class="layui-input-inline">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
					</div>
					<div class="layui-form-mid layui-word-aux">此活动仅限会员参加</div>		
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">实付满</label>
					<div class="layui-input-inline">
						<input type="text" name="price_min" placeholder="￥" lay-verify="title" autocomplete="off" class="layui-input laimi-input-80">
					</div>
					<div class="layui-form-mid layui-word-aux">元，例，设置100元送1张，则消费200元送2张</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">赠送</label>
					<div class="layui-input-inline">
						<select name="quiz" lay-search>
		          <option value="">请选择优惠券</option>
		          <optgroup label="代金券">
		            <option value="你工作的第一个城市">你工作的第一个城市</option>
		          </optgroup>
		          <optgroup label="体验券">
		            <option value="你的工号">你的工号</option>
		            <option value="你最喜欢的老师">你最喜欢的老师</option>
		          </optgroup>
		        </select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">开始时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test3" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">结束时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test4" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">备注</label>
					<div class="layui-input-block">
						<textarea placeholder="" class="layui-textarea laimi-input-b80"></textarea>
					</div>
				</div>				
				<div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">完成</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
			title: ['新增满送活动', 'font-size:16px;'],
			btnAlign: 'r',
      area: ['680px', '520px'],
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
  //常规用法
laydate.render({
elem: '#test3'
});
//常规用法
laydate.render({
elem: '#test4'
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