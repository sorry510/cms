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
						<a href="store_info_mgoods.php">电子档案</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>		
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input laimi-input-100" id="test1" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input laimi-input-100" id="test2" placeholder="yyyy-MM-dd">
		</div>
		<label class="layui-form-label">会员</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="会员卡号/姓名/手机号码">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
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
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2017-12-28 12:20</td>
			<td>10002</td>
			<td>张小宇</td>
			<td>男</td>
			<td>45岁</td>
			<td>13623833360</td>
			<td>钻石卡</td>
			<td><span class="laimi-color-ju">刘小宇</span></td>
			<td>东风路分店</td>
			<td>
				<a class="layui-btn layui-btn-mini" id="laimi-add"><svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					档案明细
				</a>
			</td>
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
<!--新增操作员弹出层开始-->
	<div id="laimi-modal-add" class="laimi-modal">
			<div class="layui-row">
				<div class="layui-col-md4">
					<label class="layui-form-label">会员照片</label>
				    <div class="layui-form-mid layui-word-aux"><img style="width:130px;height:130px;" src="/img/no.jpg"></div>		      		
				</div>		    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">时间</label>
				    <div class="layui-form-mid layui-word-aux">2017-12-15 15:00</div>
				  </div>
			    </div>	    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">卡号</label>
				    <div class="layui-form-mid layui-word-aux">10101</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">姓名</label>
				    <div class="layui-form-mid layui-word-aux">张小宇</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">性别</label>
				    <div class="layui-form-mid layui-word-aux">男</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">年龄</label>
				    <div class="layui-form-mid layui-word-aux">45岁</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">手机</label>
				    <div class="layui-form-mid layui-word-aux">13623833360</div>
				  </div>
			    </div>	    
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">卡类型</label>
				    <div class="layui-form-mid layui-word-aux">钻石卡(8.8折)</div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">诊疗人员</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">李小红</span></div>
				  </div>
			    </div>
			    <div class="layui-col-md4">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">分店</label>
				    <div class="layui-form-mid layui-word-aux">东风路分店</div>
				  </div>
			    </div>
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">问题描述</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80">东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店</div>
				  </div>
			    </div>
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">诊疗结果</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80">东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店</div>
				  </div>
			    </div>
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">诊疗方案</label>
				    <div class="layui-form-mid layui-word-aux laimi-input-b80">东风路分店东风路分店东风路分店东风路分店风路分店东风路分店东风路分店东风路分店东风风路分店东风路分店东风路分店东风路分店东风风路分店东风路分店东风路分店东风路分店东风风路分店东风路分店东风路分店东风路分店东风风路分店东风路分店东风路分店东风路分店东风风路分店东风路分店东风路分店东风路分店东风东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店东风路分店</div>
				  </div>
			    </div>
			    <div class="layui-col-md12">
					<label class="layui-form-label">图片</label>
				    <div class="layui-form-mid layui-word-aux"><img style="width:120px;height:120px;" src="/img/no.jpg"></div>
     				<div class="layui-form-mid layui-word-aux"><img style="width:120px;height:120px;" src="/img/no.jpg"></div>
     				<div class="layui-form-mid layui-word-aux"><img style="width:120px;height:120px;" src="/img/no.jpg"></div>
     				<div class="layui-form-mid layui-word-aux"><img style="width:120px;height:120px;" src="/img/no.jpg"></div>
     				<div class="layui-form-mid layui-word-aux"><img style="width:120px;height:120px;" src="/img/no.jpg"></div>
				</div>			    
			</div>
	</div>
	<!--新增操作员弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;	
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["消费明细", "font-size:16px;"],
				btnAlign: "r",
				offset: 'rt',
				anim: 7,
				area: ["800px", "100%"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-modal-add")
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
,count: 60
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