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
            <a href="tongji_business.php">营业收入对比</a>
          </li>
          <li>
            <a href="tongji_income.php">新增会员曲线</a>
          </li>
          <li>
            <a href="tongji_shop_revenue.php">店铺收入占比</a>
          </li>
          <li class="layui-this">
            <a href="tongji_shop_ranking.php">店铺收入排名</a>
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
		<label class="layui-form-label">对比方式</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">请选择</option>
				<option value="最近30天数据对比">最近30天数据对比</option>
				<option value="最近12个月数据对比">最近12个月数据对比</option>
			</select>
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
	</div>
</form>
<div class="laimi-height-20"></div>
<div id="main" style="width:100%;height:500px;"></div>
				</div>
			</div> 
		</div>
	</div>

<?php echo $this->fun_fetch('inc_foot', ''); ?>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/echarts.min.js"></script>
<script>
layui.use(["element", "form"], function() {
	var $ = layui.jquery;
	var objlayer = layui.layer;
	var objelement = layui.element;
	var objform = layui.form;
    });
</script>
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('main'));
option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
        }
    },
    toolbox: {
        feature: {
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    legend: {
        data:['营业额','会员数量','新增会员']
    },
    xAxis: [
        {
            type: 'category',
            data: ['东风路分店','南阳路分店','火车站分店','文化路分店','联盟路分店'],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            name: '营业额',
            min: 0,
            max: 100000,
            interval: 20000,
            axisLabel: {
                formatter: '{value} 元'
            }
        },
        {
            type: 'value',
            name: '会员数量',
            min: 0,
            max: 1000,
            interval: 200,
            axisLabel: {
                formatter: '{value} 人'
            }
        }
    ],
    series: [
        {
            name:'营业额',
            type:'bar',
            stack: 'a',
            data:[65680, 40089, 72230, 23212, 25316]
        },
        {
            name:'会员数量',
            type:'bar',
            stack: 'b',
            yAxisIndex: 1,
            data:[366, 509, 900, 264, 287]
        },
        {
            name:'新增会员',
            type:'bar',
            stack: 'b',
            yAxisIndex: 1,
            data:[200, 22, 33, 45, 63]
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>
</body>
</html>