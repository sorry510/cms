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
						<a href="worker_manage.php">员工管理</a>
					</li>
					<li>
						<a href="worker_group.php">员工分组</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<label class="layui-form-label">选择分组</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分组</option>
				<option value="东风路分店">收银员</option>
				<option value="王城路分店">技师</option>
				<option value="九都路分店">理发师</option>
			</select>
		</div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="姓名/编号">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a id="laimi-add" class="layui-btn">新增员工</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分组</th>
			<th>姓名</th>
			<th>编号</th>
			<th>性别</th>
			<th>出生日期</th>
			<th>手机号码</th>
			<th>学历</th>
			<th>入职时间</th>
			<th>基本工资</th>
			<th>所属店铺</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>收银员</td>
			<td>刘小宇</td>
			<td>1201</td>
			<td>男</td>
			<td>1995-8-15</td>
			<td>13623145678</td>
			<td>大专</td>
			<td>2017-6-18</td>
			<td>3000元</td>			
			<td>东风路分店</td>
			<td>
				<a class="layui-btn layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</a>
				<a class="layui-btn layui-btn-danger layui-btn-mini">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					请假
				</a>
				<a class="layui-btn layui-btn-primary layui-btn-mini">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
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
		<form class="layui-form">
			<div class="layui-row">
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 所属分店</label>
				    <div class="layui-input-inline">
				      <select name="txtshop">
				        <option value="" selected="">请选择分店</option>
				        <option value="东风路分店">东风路分店</option>
				        <option value="解放路分店">解放路分店</option>
				      </select>
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 员工分组</label>
				    <div class="layui-input-inline">
				      <select name="txtshop">
				        <option value="" selected="">请选择分店</option>
				        <option value="东风路分店">东风路分店</option>
				        <option value="解放路分店">解放路分店</option>
				      </select>
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 姓名</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-200" type="text" name="txtname">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">员工编号</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-200" type="text" name="txtname">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 性别</label>
				    <div class="layui-input-inline">
				      <input type="radio" name="txttype" value="1" title="男">
				      <input type="radio" name="txttype" value="2" title="女">
				    </div>
				  </div>
			    </div>			    
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 手机号码</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-200" type="text" name="txtaccount">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 出生日期</label>
				    <div class="layui-input-inline">
				      <input type="text" class="layui-input laimi-input-200" id="test1" placeholder="yyyy-MM-dd">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label"><span>*</span> 身份证号</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-200" type="text" name="txtaccount">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">学历</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-200" type="text" name="txtaccount">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">入职时间</label>
				    <div class="layui-input-inline">
				      <input type="text" class="layui-input laimi-input-200" id="test2" placeholder="yyyy-MM-dd">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">员工照片</label>
				    <div class="layui-input-inline">
				      <button type="button" class="layui-btn layui-btn-normal layui-btn-small" id="test3"><i class="layui-icon"></i>上传图片</button>
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">身份证</label>
				    <div class="layui-input-inline">
				      <button type="button" class="layui-btn layui-btn-normal layui-btn-small" id="test4"><i class="layui-icon"></i>上传图片</button>
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">居住地址</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-200" type="text" name="txtaccount">
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
				    <label class="layui-form-label">基本工资</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-80" type="text" name="price_min" placeholder="￥">
				    </div>
				  </div>
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
				area: ["800px", "auto"],
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