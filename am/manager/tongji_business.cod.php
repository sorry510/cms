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
            <a href="tongji_business.php">营业收入对比</a>
          </li>
          <li>
            <a href="tongji_income.php">新增会员曲线</a>
          </li>
          <li>
            <a href="tongji_shop_revenue.php">店铺收入占比</a>
          </li>
          <li>
            <a href="tongji_shop_ranking.php">店铺收入排名</a>
          </li>
        </ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form" method="get">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop_id">
        <option value="0">全部</option>
        <?php foreach($this->_data['shop'] as $row) { ?>
        <option value="<?php echo $row['shop_id']; ?>" <?php if($row['shop_id'] == $this->_data['request']['shop_id']){
        echo "selected" ;}?> ><?php echo $row['shop_name']; ?></option>
        <?php } ;?>
      </select>
		</div>
		<label class="layui-form-label">对比方式</label>
		<div class="layui-input-inline">
      <select name="data_time">
        <option value="">请选择</option>
        <option value="1" <?php if($this->_data['request']['data_time'] == 1){
        echo "selected" ;}?>>最近30天数据对比</option>
        <option value="2" <?php if($this->_data['request']['data_time'] == 2){
        echo "selected" ;}else if($this->_data['request']['data_time']==0){
            echo "selected" ;
            }?>>最近12个月数据对比</option>
      </select>
    </div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">搜索</button>
		</div>
	</div>
</form>
<div class="laimi-height-20"></div>
<div id="main" style="width:100%;height:430px;"></div>

				</div>
			</div> 
		</div>
	</div>

<?php echo $this->fun_fetch('inc_foot', ''); ?>
<script src="../../js/jquery-1.12.4.min.js"></script>
<script src="../../js/echarts.min.js"></script>
<script>
layui.use(["layer", "element", "form"], function() {
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
            dataView: {show: false, readOnly: false},
            magicType: {show: true, type: ['line', 'bar']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    legend: {
        data:['会员消费','散客消费','充值金额','营业额']
    },
    xAxis: [
        {
            type: 'category',
            data: [<?php echo $this->_data['request']['data_x'];?>],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            name: '营业额',
            axisLabel: {
                formatter: '{value} 元'
            }
        },
        {
            type: 'value',
            name: '营业额',
            axisLabel: {
                formatter: '{value} 元'
            }
        }
    ],
    series: [
        {
            name:'会员消费',
            type:'bar',
            stack: 'a',
            data:[<?php echo $this->_data['card_shopping']['card_shopping'];?>]
        },
        {
            name:'散客消费',
            stack: 'a',
            type:'bar',
            data:[<?php echo $this->_data['normal_shopping']['normal_shopping'];?>]
        },
        {
            name:'充值金额',
            stack: 'b',
            type:'bar',
            data:[<?php echo $this->_data['cmoney']['cmoney'];?>]
        },
        {
            name:'营业额',
            type:'line',
            yAxisIndex: 1,
            data:[<?php echo $this->_data['money']['money'];?>]
        }
        
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>
</body>
</html>