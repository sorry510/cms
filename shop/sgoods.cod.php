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
						<a href="sgoods.php">单店商品管理</a>
					</li>
					<li>
						<a href="sgoods_catalog.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分类</option>
				<option value="理疗">理疗</option>
				<option value="洗头">洗头</option>
			</select>
		</div>
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
	</div>
</form>
<form class="layui-form">
<table class="layui-table">
	<thead>
		<tr>
			<th>分类</th>
			<th>名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>参与库存</th>
			<th>状态</th>
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>饮料</td>
			<td>康师傅绿茶500ml</td>
			<td>2154884115</td>
			<td>¥35.00</td>
			<td>¥25.00</td>
			<td><i class="layui-icon" style="font-size: 20px; color: #1E9FFF;">&#x1007;</i></td>
			<td>正常</td>
			<td>东风路分店</td>			
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
		<form class="layui-form">
			<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品分类</label>
			    <div class="layui-input-inline">
			      <select name="txtshop">
			        <option value="" selected="">请选择分类</option>
			        <option value="东风路分店">东风路分店</option>
			        <option value="解放路分店">解放路分店</option>
			      </select>
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品名称</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtname">
			    </div>
			    <label class="layui-form-label">简拼</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-80" type="text" name="txtname">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">商品编码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtname">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="price_min" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元。</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="price_min" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元。如有会员价，优先按会员价结算</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">库存</label>
			    <div class="layui-input-inline">
			      <input type="radio" name="txttype" value="1" title="无库存">
				  <input type="radio" name="txttype" value="2" title="有库存">
			   </div>
			   <div class="layui-form-mid layui-word-aux">库存状态一旦添加不可修改，请慎重选择</div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">参与活动</label>
			    <div class="layui-input-inline">
			      <input type="radio" name="txttype" value="1" title="无库存">
				  <input type="radio" name="txttype" value="2" title="有库存">
			   </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">参与预约</label>
			    <div class="layui-input-inline">
			      <input type="radio" name="txttype" value="1" title="无库存">
				  <input type="radio" name="txttype" value="2" title="有库存">
			   </div>
			</div>					    	  
		  	<div class="layui-form-item">
		    	<div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
		    	</div>
		  	</div>
		  <div class="laimi-height-20">		  	
		  </div>
		</form>
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
				title: ["新增操作员", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
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
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;  

  //设定文件大小限制
  upload.render({
    elem: '#test3'
    ,url: '/upload/'
    ,accept: 'jpg|png' //音频
    ,size: 1024 //限制文件大小，单位 KB
    ,done: function(res){
      console.log(res)
    }
  });

  upload.render({
    elem: '#test4'
    ,url: '/upload/'
    ,accept: 'jpg|png' //音频
    ,size: 1024 //限制文件大小，单位 KB
    ,done: function(res){
      console.log(res)
    }
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