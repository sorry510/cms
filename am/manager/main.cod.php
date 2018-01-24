<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
  <style type="text/css">
    .laimi-font-weight{
      font-size: 16px;
      font-weight: 600;
    }
  </style>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="layui-this">
						<a href="main.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shouye1"></use></svg>
							系统首页
						</a>
					</li>
					<li style="float:right;width:950px;color:#FF9630;text-align:right;margin-top:8px;">
						<?php echo $this->fun_fetch('../../inc_gonggao', ''); ?>
					</li>
				</ul>
				<div id="laimi-main" class="p-main layui-tab-content">
<div class="laimi-tools layui-form-item">		
  <div class="layui-row layui-col-space22">
  	<div class="layui-col-md4">
    	<div style="padding:20px;border-radius:6px;background-color:#009688;">		    		
    		<div style="padding-bottom:20px;color:#FFFFFF;font-size:14px;">
					<div class="layui-input-inline">
						<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tongji"></use></svg>
						日营业额
					</div>
    			<div class="laimi-float-right" style="color:#1BA699;">
    				<a href="#" class="laimi-day" value="3" style="color:#FFFFFF;">前天</a>　|　<a href="#" class="laimi-day" value="2" style="color:#FFFFFF;">昨天</a>　|　<a href="#" class="laimi-day laimi-font-weight" value="1" style="color:#FFFFFF;">今天</a>
    			</div>
    		</div>
    		<div>
    			<hr style="background-color:#1BA699;">
    		</div>
    		<div style="line-height:56px;color:#FFFFFF;font-family:'Segoe UI';font-size:40px;font-weight:100;">
    			<b>¥</b><span class="laimi-day-money"><?php echo $this->_data['day_money']['money1'];?></span>
    		</div>
    		<div style="line-height:33px;color:#FFFFFF;">
    			今日比昨日营业额&nbsp;<?php echo $this->_data['day_money']['money_balance'];?>
    		</div>
    	</div>
    </div>
    <div class="layui-col-md4">
    	<div style="padding:20px;border-radius:6px;background-color:#32C5D2;">
    		<div style="padding-bottom:20px;color:#FFFFFF;font-size:14px;">
					<div class="layui-input-inline">
						<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tongji"></use></svg>
						周营业额
					</div>
    			<div class="laimi-float-right" style="color:#63DAE4;">
    				<a href="#" class="laimi-week" value="3" style="color:#FFFFFF;">上上周</a>　|　<a href="#" class="laimi-week" value="2" style="color:#FFFFFF;">上周</a>　|　<a href="#" class="laimi-week laimi-font-weight" value="1" style="color:#FFFFFF;">本周</a>
    			</div>
    		</div>
    		<div>
    			<hr style="background-color:#63DAE4;">
    		</div>
    		<div style="line-height:56px;color:#FFFFFF;font-family:'Segoe UI';font-size:40px;font-weight:100;">
    			<b>¥</b><span class="laimi-week-money"><?php echo $this->_data['week_money']['money1'];?></span>
    		</div>
    		<div style="line-height:33px;color:#FFFFFF;">
    			本周比上周营业额&nbsp;<?php echo $this->_data['week_money']['money_balance'];?>
    		</div>
    	</div>
    </div>
    <div class="layui-col-md4">
    	<div style="padding:20px;border-radius:6px;background-color:#FF9630;">
    		<div style="padding-bottom:20px;color:#FFFFFF;font-size:14px;">
					<div class="layui-input-inline">
						<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tongji"></use></svg>
						月营业额
					</div>
    			<div class="laimi-float-right" style="color:#FFAF61;">
    				<a href="#" class="laimi-month" value="3" style="color:#FFFFFF;">上上月</a>　|　<a href="#" class="laimi-month" value="2" style="color:#FFFFFF;">上月</a>　|　<a href="#" class="laimi-month laimi-font-weight" value="1" style="color:#FFFFFF;">本月</a>
    			</div>
    		</div>
    		<div>
    			<hr style="background-color:#FFAF61;">
    		</div>
    		<div style="line-height:56px;color:#FFFFFF;font-family:'Segoe UI';font-size:40px;font-weight:100;">
    			<b>¥</b><span class="laimi-month-money"><?php echo $this->_data['month_money']['money1'];?></span>
    		</div>
    		<div style="line-height:33px;color:#FFFFFF;">
    			本月比上月营业额&nbsp;<?php echo $this->_data['month_money']['money_balance'];?>
    		</div>
    	</div>
    </div>
  </div>
  <div class="layui-row layui-col-space22">
  	<div class="layui-col-md4">
    	<div style="padding:20px;height:360px;border-radius:6px;background-color:#F4F4F4;">
    		<div class="laimi-color-hui" style="font-size:14px;font-weight:bold;">
    			<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
    			本月最受欢迎的商品-TOP10
    		</div>
    		<div>
    			<hr>
    		</div>		    		
			<table class="layui-table laimi-color-hui">
			  <tbody>
          <tr>
            <td>排名</td>
            <td>商品名称</td>
            <td>销售额</td>
            <td>销售量</td>
          </tr>
			  <?php foreach($this->_data['goods_count_list'] as $key => $row) { ?>
			    <tr>
			      <td><?php echo $key+1;?></td>
			      <td style="text-align:left;"><?php echo $row['goods_name'];?></td>
			      <td>¥<?php echo $row['sales_volume'];?></td>
			      <td><?php echo $row['sales_count'];?></td>
			    </tr>
			  <?php };?>
			  </tbody>
			</table>
	    </div>
    </div>
    <div class="layui-col-md4">
    	<div style="padding:20px;height:360px;border-radius:6px;background-color:#F4F4F4;">
    		<div class="laimi-color-hui" style="font-size:14px;font-weight:bold;">
    			<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
    			本月员工提成排名-TOP10
    		</div>
    		<div>
    			<hr>
    		</div>		    		
			<table class="layui-table laimi-color-hui">
			  <tbody>
          <tr>
            <td>排名</td>
            <td>员工姓名</td>
            <td>本月提成</td>
            <td>所属店铺</td>
          </tr>
			  <?php foreach($this->_data['worker_reward_list'] as $key => $row) { ?>
			    <tr>
			      <td><?php echo $key+1;?></td>
			      <td style="text-align:left;"><?php echo $row['c_worker_name'];?></td>
			      <td>¥<?php echo $row['sum_reward'];?></td>
			      <td><?php echo $row['shop_name'];?></td>
			    </tr>
			  <?php };?>
			  </tbody>
			</table>
	    </div>
    </div>
    <div class="layui-col-md4">
    	<div style="padding:20px;height:360px;border-radius:6px;background-color:#F4F4F4;">
    		<div class="laimi-color-hui" style="font-size:14px;font-weight:bold;">
    			<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
    			常用功能
    		</div>
    		<div>
    			<hr>
    		</div>
    		<div style="line-height:26px;margin-top:20px;">
  			  <div class="layui-col-md4" style="text-align:center;margin-bottom:30px;">
	            <a href="card.php">
	              <div style="margin:0 auto;height:80px;width:80px;background-color:#5FB878;border-radius:18px;">
	                <svg aria-hidden="true" style="width:50px;height:50px;color:#ffffff;overflow:hidden; fill:currentColor;margin-top:15px;"><use xlink:href="#icon-huiyuanzhongxinxian"></use></svg>
	              </div>
	              <div style="line-height:40px;font-size:16px;">会员管理</div>
	            </a>
	          </div>
	          <div class="layui-col-md4" style="text-align:center;margin-bottom:30px;">
	            <a href="act_batch.php">
	              <div style="margin:0 auto;height:80px;width:80px;background-color:#1E9FFF;border-radius:18px;">
	                <svg aria-hidden="true" style="width:50px;height:50px;color:#ffffff;overflow:hidden; fill:currentColor;margin-top:15px;"><use xlink:href="#icon-huiyuanzhongxin1"></use></svg>
	              </div>
	              <div style="line-height:40px;font-size:16px;">批量营销</div>
	            </a>
	          </div>
	          <div class="layui-col-md4" style="text-align:center;margin-bottom:30px;">
	            <a href="wechat_shop_order.php">
	              <div style="margin:0 auto;height:80px;width:80px;background-color:#393D49;border-radius:18px;">
	                <svg aria-hidden="true" style="width:50px;height:50px;color:#ffffff;overflow:hidden; fill:currentColor;margin-top:15px;"><use xlink:href="#icon-shangcheng"></use></svg>
	                <br><span class="layui-badge"><?php echo $this->_data['order_num']['worder_num'];?></span>
	              </div>
	              <div style="line-height:40px;font-size:16px;">商城订单</div>
	            </a>
	          </div>
    		</div>
	    </div>
	  </div>
	</div>
</div>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="../../js/jquery-1.12.4.min.js"></script>
	<!--script src="../../js/echarts.min.js"></script-->
	<script>
  layui.use(["element"], function() {
		var $ = layui.jquery;
		var objelement = layui.element;
	});

  $('.laimi-day').on('click',function(){
    $(this).siblings().removeClass('laimi-font-weight');
    $(this).addClass('laimi-font-weight');
  	var signal = $(this).attr('value');
  	if (signal == 1) {
  		$('.laimi-day-money').text('<?php echo $this->_data['day_money']['money1']?>');
  	}else if(signal == 2){
  		$('.laimi-day-money').text('<?php echo $this->_data['day_money']['money2']?>');
  	}else if(signal == 3){
  		$('.laimi-day-money').text('<?php echo $this->_data['day_money']['money3']?>');
  	}
  })
  $('.laimi-week').on('click',function(){
    $(this).siblings().removeClass('laimi-font-weight');
    $(this).addClass('laimi-font-weight');
  	var signal = $(this).attr('value');
  	if (signal == 1) {
  		$('.laimi-week-money').text('<?php echo $this->_data['week_money']['money1']?>');
  	}else if(signal == 2){
  		$('.laimi-week-money').text('<?php echo $this->_data['week_money']['money2']?>');
  	}else if(signal == 3){
  		$('.laimi-week-money').text('<?php echo $this->_data['week_money']['money3']?>');
  	}
  })
  $('.laimi-month').on('click',function(){
    $(this).siblings().removeClass('laimi-font-weight');
    $(this).addClass('laimi-font-weight');
  	var signal = $(this).attr('value');
  	if (signal == 1) {
  		$('.laimi-month-money').text('<?php echo $this->_data['month_money']['money1']?>');
  	}else if(signal == 2){
  		$('.laimi-month-money').text('<?php echo $this->_data['month_money']['money2']?>');
  	}else if(signal == 3){
  		$('.laimi-month-money').text('<?php echo $this->_data['month_money']['money3']?>');;
  	}
  })
	</script>
</body>
</html>