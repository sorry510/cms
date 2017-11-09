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
						<a href="store_info_mgoods.php">消费明细</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">分店</label>
		<div class="layui-input-inline" style="width:160px;">
			<select name="shop">
				<option value="">全部分店</option>
				<option value="东风路分店">东风路分店</option>
				<option value="王城路分店">王城路分店</option>
				<option value="九都路分店">九都路分店</option>
			</select>
		</div>
		<label class="layui-form-label">卡类型</label>
		<div class="layui-input-inline" style="width:160px;">
			<select name="shop">
				<option value="">全部卡类型</option>
				<option value="东风路分店">钻石卡</option>
				<option value="王城路分店">会员卡</option>
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
			<th>单号</th>
			<th>卡号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>手机</th>
			<th>消费类型</th>
			<th>付款方式</th>
			<th>金额</th>
			<th>分店</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2017-12-28 12:20</td>
			<td>12454211</td>
			<td>10002</td>
			<td>张小宇</td>
			<td>男</td>	
			<td>13623833360</td>
			<td>充值</td>
			<td>微信</td>
			<td><span class="laimi-color-ju">¥35.00</span></td>
			<td>--</td>
			<td>东风路分店</td>
			<td>
				<a class="layui-btn layui-btn-mini" id="laimi-add"><svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					订单明细
				</a>
			</td>
		</tr>
		<tr>
			<td>2017-12-28 12:20</td>
			<td>12454211</td>
			<td>10002</td>
			<td>张小宇</td>
			<td>男</td>	
			<td>13623833360</td>
			<td>办卡</td>
			<td><span class="laimi-color-hui" style="text-decoration: line-through ;">微信</span></td>
			<td><span class="laimi-color-hui" style="text-decoration: line-through ;">¥35.00</span></td>
			<td>已退款</td>
			<td>东风路分店</td>			
			<td>
				<a class="layui-btn layui-btn-mini" id="laimi-add"><svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					订单明细
				</a>
			</td>
		</tr>
		<tr>
			<td>2017-12-28 12:20</td>
			<td>12454211</td>
			<td>10002</td>
			<td>张小宇</td>
			<td>男</td>	
			<td>13623833360</td>
			<td>办卡</td>
			<td>--</td>
			<td>--</td>			
			<td>--</td>
			<td>东风路分店</td>
			<td>
				<a class="layui-btn layui-btn-mini" id="laimi-add"><svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					订单明细
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
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">消费时间</label>
				    <div class="layui-form-mid layui-word-aux">2017-12-15 15:00</div>
				  </div>
			    </div>	    
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">会员卡号</label>
				    <div class="layui-form-mid layui-word-aux">10101</div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">会员姓名</label>
				    <div class="layui-form-mid layui-word-aux">张小宇</div>
				  </div>
			    </div>			    
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">卡类型</label>
				    <div class="layui-form-mid layui-word-aux">钻石卡(8.8折)</div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">消费类型</label>
				    <div class="layui-form-mid layui-word-aux">充值</div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">消费金额</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥1286.00</span>（微信支付）</div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">手动优惠</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥10.00</span></div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">是否免单</label>
				    <div class="layui-form-mid layui-word-aux">--</div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">操作人员</label>
				    <div class="layui-form-mid layui-word-aux">李小红</div>
				  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <label class="layui-form-label">分店</label>
				    <div class="layui-form-mid layui-word-aux">东风路分店</div>
				  </div>
			    </div>			    
			    <div class="layui-col-md12">
			      <div class="layui-form-item" style="margin-bottom: -6px;">
				    <div class="layui-form-mid layui-word-aux" style="line-height: 26px;width: 100%;">
				    	<table class="layui-table">
						  <thead>
						    <tr>
						      <th width="400">名称</th>
						      <th>数量</th>
						      <th>单价</th>
						      <th>优惠价</th>
						    </tr> 
						  </thead>
						  <tbody>
						    <tr>
						      <td>代金券</td>
						      <td>2</td>
						      <td style="text-decoration:line-through;">￥120.00</td>
						      <td>￥98.00</td>
						    </tr>
						    <tr>
						      <td>代金券</td>
						      <td>2</td>
						      <td style="text-decoration:line-through;">￥120.00</td>
						      <td>￥98.00</td>
						    </tr>
						    <tr>
						      <td>代金券</td>
						      <td>2</td>
						      <td style="text-decoration:line-through;">￥120.00</td>
						      <td>￥98.00</td>
						    </tr>
						    <tr>
						      <td colspan="4" style="text-align: right;">共5件，合计<span class="laimi-color-ju">￥1500.00</span>，实收<span class="laimi-color-ju" style="font-size: 18px;">￥1286.00</span>&nbsp;&nbsp;</td>
						    </tr>
						    <tr>
						      <td colspan="4" style="text-align: left;">优惠：满100元减10元&nbsp;&nbsp;×1</td>
						    </tr>
						    <tr>
						      <td colspan="4" style="text-align: left;">赠送：30元&nbsp;&nbsp;×3（满200元送30元）</td>
						    </tr>
						  </tbody>
						</table>
				    </div>
				  </div>
			    </div>
			    <div class="layui-col-md9">
			      <button class="layui-btn layui-btn-normal" lay-filter="laimi-submit" lay-submit>
			      	退款
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	删除
			      </button>
			    </div>
			    <div class="layui-col-md3" style="text-align: right;">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit>
			      	打印小票
			      </button>
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
				area: ["750px", "100%"],
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