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
					<li>
						<a href="tongji_trade.php">营业数据曲线</a>
					</li>
					<li class="layui-this">
						<a href="tongji_money.php">收入组成曲线</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-tongji-money layui-tab-content">
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
			type: 'column',
			backgroundColor:'#ffffff',
      style: {
        fontFamily: "",
        fontSize: '12px',
        color: '#006cee'
      }
		},
    title: {
      text: '收入数据统计与占比'
    },
    xAxis: {
      categories: ['2017-5-17', '2017-5-16', '2017-5-15', '2017-5-14', '2017-5-13', '2017-5-12', '2017-5-11', '2017-5-10', '2017-5-9', '2017-5-8', '2017-5-7', '2017-5-6', '2017-5-5', '2017-5-4', '2017-5-3', '2017-5-2', '2017-5-1', '2017-4-30', '2017-4-29', '2017-4-28', '2017-4-27', '2017-4-26', '2017-4-25', '2017-4-24', '2017-4-23', '2017-4-22', '2017-4-21', '2017-4-20', '2017-4-19', '2017-4-18']
    },
    yAxis: {
	    min: 0,
	    title: {
	      text: '单位（元）'
	    },
	    stackLabels: {
        enabled: true,
        style: {
          fontWeight: 'normal',
          color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
        }
	    },
	    gridLineColor:'#cccccc'
    },
    // 图例样式
    legend: {
      align: 'right',
      x: -30,
      verticalAlign: 'top',
      y: 25,
      floating: true,
      backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
      borderColor: '#CCC',
      borderWidth: 1,
      shadow: false
    },
    tooltip: {
      formatter: function () {
        return '<b>' + this.x + '</b><br/>' + this.series.name + ': ' + this.y + '<br/>' + '总量: ' + this.point.stackTotal;
      }
    },
    plotOptions: {
      column: {
        stacking: 'normal',
        dataLabels: {
          // enabled: true,
          color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
          style: {
            textShadow: '0 0 1px black'
          }
        }
      }
    },
    series: [{
      name: '开卡充值',
      data: [0, 0, 0, 0, 0, 0, 122, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 100, ],
      color : "#a7cc76",
    }, {
      name: '会员消费',
      data: [0, 0, 0, 0, 0, 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 54,],
      color : "#4572a7",
    }, {
    	name: '散客消费',
      data: [0, 0, 0, 0, 0, 0, 13, 0, 0, 145, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 42],
			color : "#f45b5b",
    }]
  });
	</script>
</body>
</html>