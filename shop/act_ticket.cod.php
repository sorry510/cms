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
					<li class="layui-this">批量营销</li>
					<li><a href="act_ticket_weixin.php">微信营销记录</a></li>
					<li><a href="act_ticket_sms.php">短信营销记录</a></li>
				</ul>
				<div class="layui-tab-content">
					<form class="layui-form" action="">		    
		 		 <div class="layui-form-item">		           
			    <div class="layui-inline">
			    	<a id="laimi-modal" href="javascript:;" class="layui-btn layui-btn-normal">高级查询条件</a>
			  	</div>		  			   		    		  	    	    
			    <div class="layui-inline laimi-float-right">
			    	<a id="laimi-modal3" href="javascript:;" class="layui-btn">批量短信营销</a>
			  	</div>	
			  	<div class="layui-inline laimi-float-right">
			    	<a id="laimi-modal2" href="javascript:;" class="layui-btn">批量微信营销</a>
			  	</div>	  		    
		  </div>
		  </form>		  
		  <table class="layui-table">
			  <thead>
			    <tr>
			      <th>姓名</th>
			      <th>性别</th>
			      <th>卡号</th>
			      <th>卡类型</th>
			      <th>手机号</th>
			      <th>生日</th>
			      <th>办卡时间</th>
			      <th>到期时间</th>
			      <th>上次到店时间</th>
			      <th>未到店天数</th>
				    </tr> 
			  </thead>
			  <tbody>
			    <tr>
			    	<td>张小宇</td>
			      <td>男</td>
			      <td>10002</td>
			      <td>钻石卡</td>
			      <th>13623833360</th>
			      <td>1970-8-23</td>
			      <td>2017-05-01</td>
			      <td>2018-10-8</td>
			      <td>2017-9-28</td>
			      <td>30天</td>
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
					<label class="layui-form-label">开卡店铺</label>
					<div class="layui-input-inline">
						<select name="quiz" lay-search>
		          <option value="">请选择店铺</option>
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
					<label class="layui-form-label">会员卡类型</label>
					<div class="layui-input-inline">
						<select name="quiz" lay-search>
		          <option value="">请选择会员卡类型</option>
		            <option value="你工作的第一个城市">你工作的第一个城市</option>
		            <option value="你的工号">你的工号</option>
		            <option value="你最喜欢的老师">你最喜欢的老师</option>
		        </select>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">性别</label>
					<div class="layui-input-inline">
						<input type="radio" name="sex" value="不限" title="不限" checked="">
						<input type="radio" name="sex" value="男" title="男">
						<input type="radio" name="sex" value="女" title="女">
					</div>
					<div class="layui-form-mid layui-word-aux"></div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">生日时段</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test1" placeholder="yyyy-MM-dd">
					</div>
					<div class="layui-form-mid layui-word-aux">至</div>	
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test2" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">开卡时段</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test3" placeholder="yyyy-MM-dd">
					</div>
					<div class="layui-form-mid layui-word-aux">至</div>	
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test4" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">到期时段</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test5" placeholder="yyyy-MM-dd">
					</div>
					<div class="layui-form-mid layui-word-aux">至</div>	
					<div class="layui-input-inline">
						<input type="text" class="layui-input" id="test6" placeholder="yyyy-MM-dd">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">未到店天数</label>
					<div class="layui-input-inline">
						<input type="tel" name="phone" value="30" autocomplete="off" class="layui-input laimi-input-80">
					</div>
					<div class="layui-form-mid layui-word-aux">天，例：30天内未到店顾客</div>		
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">会员卡号</label>
					<div class="layui-input-inline">
						<input type="tel" name="phone" placeholder="卡号/手机号/姓名" autocomplete="off" class="layui-input laimi-input-200">
					</div>
					<div class="layui-form-mid layui-word-aux"></div>		
				</div>
				<div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-submit="" lay-filter="demo1">搜索</button>
			      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
			    </div>
		  	</div>
		</form>	
	</div>
	<!--消息弹出层结束-->
	<!--新增操作员弹出菜单开始-->
	<div id="id2" style="display: none;padding: 20px;">
		<form class="layui-form" action="">	
				<div class="layui-form-item">
					<label class="layui-form-label">累计人数</label>
					<div class="layui-form-mid layui-word-aux">根据您的搜索条件，将给<span style="color: #FF5722;">50</span>位会员赠送此优惠券</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">活动名称</label>
					<div class="layui-input-inline">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
					</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">赠送优惠券</label>
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
					<label class="layui-form-label">通知方式</label>
					<div class="layui-input-inline">
						<input type="checkbox" name="like1[write]" lay-skin="primary" title="微信推送" checked="">
     			 <input type="checkbox" name="like1[read]" lay-skin="primary" title="短信通知">
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
	<!--新增操作员弹出菜单开始-->
	<div id="id3" style="display: none;padding: 20px;">
		<form class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">累计人数</label>
					<div class="layui-form-mid layui-word-aux">根据您的搜索条件，将给<span style="color: #FF5722;">50</span>位会员发送此短信</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">活动名称</label>
					<div class="layui-input-inline">
						<input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input laimi-input-300">
					</div>
				</div>								
				<div class="layui-form-item">
					<label class="layui-form-label">短信内容</label>
					<div class="layui-input-block">
						<textarea placeholder="" class="layui-textarea laimi-input-b80"></textarea>
					</div>
				</div>				
				<div class="layui-form-item">
					<label class="layui-form-label">示例短信</label>
					<div class="layui-input-block">
						<textarea placeholder="" class="layui-textarea laimi-input-b80" style="line-height: 26px;min-height:50px;">亲爱的{user}，有{wdate}天没看到您啦，非常想念您，您的会员卡{udate}就到期了，尽快过来上课哦~</textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">变量说明</label>
					<div class="layui-form-mid layui-word-aux" style="width: 75%;line-height: 26px;">姓名{user}，卡号{id}，办卡时间：{tdate}，到期时间：{udate}，生日{bsid}，未到店天数{wdate}</div>
				</div>	
				<div class="layui-form-item">
					<label class="layui-form-label">注意事项</label>
					<div class="layui-form-mid" style="color: #FF5722;">营销短信发送时间为8:00-18:00，其它时间发送，将影响您的发送结果~</div>
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
			title: ['高级搜索查询', 'font-size:16px;'],
			btnAlign: 'r',
      area: ['680px', '550px'],
      shadeClose: true, //点击遮罩关闭
      content: $('#id1')
    });
  });
  //弹出一个页面层
  $('#laimi-modal2').on('click', function(){
    layer.open({
      type: 1,
			title: ['微信营销', 'font-size:16px;'],
			btnAlign: 'r',
      area: ['680px', '400px'],
      shadeClose: true, //点击遮罩关闭
      content: $('#id2')
    });
  });
  //弹出一个页面层
  $('#laimi-modal3').on('click', function(){
    layer.open({
      type: 1,
			title: ['短信营销', 'font-size:16px;'],
			btnAlign: 'r',
      area: ['680px', '560px'],
      shadeClose: true, //点击遮罩关闭
      content: $('#id3')
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
//常规用法
laydate.render({
elem: '#test5'
});
//常规用法
laydate.render({
elem: '#test6'
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
,limit: 50
,layout: ['count', 'prev', 'page', 'next',  'skip']
,jump: function(obj){
console.log(obj)
}
});

});
		</script>

</body>
</html>