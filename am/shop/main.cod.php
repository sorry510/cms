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
						<a href="main.php">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-shouye1"></use></svg>
							系统首页
						</a>
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
						今日营业额
					</div>
    			<div class="laimi-float-right" style="color:#1BA699;">
    				<a href="#" class="laimi-day" value="3" style="color:#FFFFFF;">前天</a>　|　<a href="#" class="laimi-day" value="2" style="color:#FFFFFF;">昨天</a>　|　<a href="#" class="laimi-day" value="1" style="color:#FFFFFF;">今天</a>
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
						本周营业额
					</div>
    			<div class="laimi-float-right" style="color:#63DAE4;">
    				<a href="#" class="laimi-week" value="3" style="color:#FFFFFF;">上上周</a>　|　<a href="#" class="laimi-week" value="2" style="color:#FFFFFF;">上周</a>　|　<a href="#" class="laimi-week" value="1" style="color:#FFFFFF;">本周</a>
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
						本月营业额
					</div>
    			<div class="laimi-float-right" style="color:#FFAF61;">
    				<a href="#" class="laimi-month" value="3" style="color:#FFFFFF;">上上月</a>　|　<a href="#" class="laimi-month" value="2" style="color:#FFFFFF;">上月</a>　|　<a href="#" class="laimi-month" value="1" style="color:#FFFFFF;">本月</a>
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
  	<div class="layui-col-md8">
    	<div style="padding:20px;height:360px;border:1px solid #EEEEEE;border-radius:6px;">		    		
    		<div class="laimi-color-hui" style="font-size:14px;font-weight:bold;">
    			<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tongji-p"></use></svg>
    			数据雷达
    		</div>
    		<div>
    			<hr>
    		</div>
    		<div style="line-height:33px;font-size:14px;">
    			<div id="laimi-chart" style="width:100%;height:360px;"></div>
    		</div>
    	</div>
    </div>
    <div class="layui-col-md4">
    	<div style="padding:20px;height:360px;border-radius:6px;background-color:#F4F4F4;">
    		<div class="laimi-color-hui" style="font-size:14px;font-weight:bold;">
    			<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
    			本月最受欢迎的商品-TOP8
    		</div>
    		<div>
    			<hr>
    		</div>		    		
				<table class="layui-table laimi-color-hui">
				  <tbody>
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
	</div>
</div>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="../../js/jquery-1.12.4.min.js"></script>
	<script src="../../js/echarts.min.js"></script>
	<script>
  layui.use(["element"], function() {
		var $ = layui.jquery;
		var objelement = layui.element;
	});
  // 基于准备好的dom，初始化echarts实例
  var objchart = echarts.init(document.getElementById('laimi-chart'));
	var objoption = {
	  title: {
	    text: ''
	  },
	  legend: {
	    data: ['图一', '图二', '张三', '李四']
	  },
	  radar: [{
	    indicator: [
	      { text: '10月' },
	      { text: '9月' },
	      { text: '8月' },
	      { text: '7月' },
	      { text: '6月' }
	    ],
	    center: ['25%', '50%'],
	    radius: 120,
	    startAngle: 90,
	    splitNumber: 4,
	    shape: 'circle',
	    name: {
	      formatter:'【{value}】',
	      textStyle: {
	        color:'#72ACD1'
	      }
	    },
	    splitArea: {
	      areaStyle: {
	        color: ['rgba(114, 172, 209, 0.2)',
	        'rgba(114, 172, 209, 0.4)', 'rgba(114, 172, 209, 0.6)',
	        'rgba(114, 172, 209, 0.8)', 'rgba(114, 172, 209, 1)'],
	        shadowColor: 'rgba(0, 0, 0, 0.3)',
	        shadowBlur: 10
	      }
	    },
	    axisLine: {
	      lineStyle: {
	        color: 'rgba(255, 255, 255, 0.5)'
	      }
	    },
	    splitLine: {
	      lineStyle: {
	        color: 'rgba(255, 255, 255, 0.5)'
	      }
	    }
	  }, {
			indicator: [
	      { text: '东风路分店', max: 150 },
	      { text: '南阳路分店', max: 150 },
	      { text: '文化路分店', max: 150 },
	      { text: '火车站分店', max: 120 },
	      { text: '北大学城分店', max: 108 },
	      { text: '京广路分店', max: 72 }
	    ],
	    center: ['75%', '50%'],
	    radius: 120
	  }],
	  series: [{
	    name: '雷达图',
	    type: 'radar',
	    itemStyle: {
        emphasis: {
          // color: 各异,
          lineStyle: {
            width: 4
          }
        }
	    },
	    data: [{
	      value: [100, 8, 0.40, -80, 2000],
	      name: '图一',
	      symbol: 'rect',
	      symbolSize: 5,
	      lineStyle: {
	        normal: {
	          type: 'dashed'
	        }
	      }
	    }, {
        value: [60, 5, 0.30, -100, 1500],
        name: '图二',
        areaStyle: {
          normal: {
            color: 'rgba(255, 255, 255, 0.5)'
          }
        }
	    }]
	  }, {
			name: '成绩单',
      type: 'radar',
      radarIndex: 1,
      data: [{
        value: [120, 118, 130, 100, 99, 70],
        name: '张三',
        label: {
          normal: {
            show: true,
            formatter:function(params) {
              return params.value;
            }
          }
        }
      }, {
        value: [90, 113, 140, 30, 70, 60],
        name: '李四',
        areaStyle: {
          normal: {
            opacity: 0.9,
            color: new echarts.graphic.RadialGradient(0.5, 0.5, 1, [{
							color: '#B8D3E4',
							offset: 0
						}, {
							color: '#72ACD1',
							offset: 1
						}])
          }
        }
      }]
	  }
  ]}
  // 使用刚指定的配置项和数据显示图表。
  objchart.setOption(objoption);
  $('.laimi-day').on('click',function(){
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