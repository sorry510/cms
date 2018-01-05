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
					<li>
						<a href="tongji_all.php">基础销售统计</a>
					</li>
					<li>
						<a href="tongji_goods.php">商品销售排名</a>
					</li>
					<li class="layui-this">
						<a href="tongji_trade.php">营业数据曲线</a>
					</li>
					<li>
						<a href="tongji_money.php">收入组成曲线</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-tongji-trade layui-tab-content">
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
		<label class="layui-form-label">对比方式</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">请选择</option>
				<option value="最近30天数据对比">最近30天数据对比</option>
				<option value="最近12个月数据对比">最近12个月数据对比</option>
			</select>
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<div id="container" style="margin:0px auto; margin-top:40px; width:95%; height:400px;"></div>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="../js/jquery-1.12.4.min.js"></script>
	<script src="../js/highcharts.js"></script>
	<script>
	layui.use(["element", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
	});
	$('#container').highcharts({
    chart: {
      zoomType: 'xy',
      backgroundColor:'#ffffff',
      style: {
        fontFamily: "",
        fontSize: '12px',
        color: '#006cee',
      },
    },
    title: {
      text: '营业数据统计与占比',
      y:10,
    },
    xAxis: [{
      categories: ['2017-5-18', '2017-5-17', '2017-5-16', '2017-5-15', '2017-5-14', '2017-5-13', '2017-5-12', '2017-5-11', '2017-5-10', '2017-5-9', '2017-5-8', '2017-5-7', '2017-5-6', '2017-5-5', '2017-5-4', '2017-5-3', '2017-5-2', '2017-5-1', '2017-4-30', '2017-4-29', '2017-4-28', '2017-4-27', '2017-4-26', '2017-4-25', '2017-4-24', '2017-4-23', '2017-4-22', '2017-4-21', '2017-4-20', '2017-4-19',],
      crosshair: true
    }],
    yAxis: [{ // Primary yAxis
      tickInterval: 50,
      labels: {
        format: '{value}元',
        style: {
            color: Highcharts.getOptions().colors[1]
        }
      },
      title: {
        text: '单位（元）',
        style: {
            color: Highcharts.getOptions().colors[1]
        }
      },
      gridLineColor:'#cccccc',
    },{ // Secondary yAxis
      //刻度值
      tickInterval:1,
      title: {
        text: '单位（人）',
        style: {
            color: Highcharts.getOptions().colors[0]
        }
      },
      labels: {
        format: '{value}人',
        style: {
            color: Highcharts.getOptions().colors[0]
        }
      },
      opposite: true,
      gridLineColor:'#cccccc',
    }],
    tooltip: {
      shared: true
    },
    // 图例样式
    legend: {
      y: 20,
      floating: true,
      backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#F1F1F1',
      borderColor: '#CCC',
      borderWidth: 0,
      shadow: false
    },
    series: [{
      name: '新增会员',
      type: 'column',
      yAxis: 1,
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
      color : "#4572a7",
      tooltip: {valueSuffix: '人'}
    },
    {
      name: '消费会员',
      type: 'column',
      yAxis: 1,
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3],
      color : "#A7CC76",
      tooltip: {valueSuffix: '人'}
    },
    {
      name: '开卡充值',
      type: 'spline',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 140],
      color : "#49a6e1",
      tooltip: {valueSuffix: '元'}
    }, 
    {
      name: '销售金额',
      type: 'spline',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 18],
      color : "#ffc000",
      tooltip: {valueSuffix: '元'}
    }]
  });
	</script>
</body>
</html>