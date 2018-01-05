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
          <li class="layui-this">
            <a href="tongji_income.php">新增会员曲线</a>
          </li>
        </ul>
				<div id="laimi-main" class="p-system-user layui-tab-content">
<form class="layui-form" method="get">
	<div class="laimi-tools layui-form-item">
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
    tooltip : {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            label: {
                backgroundColor: '#6a7985'
            }
        }
    },
    legend: {
        data:[<?php foreach($this->_data['card_type'] as $key => $row) {
            echo "'".$row['card_type_name']."',";
        } ?>]
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : [<?php echo $this->_data['request']['data_x'];?>]
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        <?php foreach($this->_data['card_type'] as $key => $row) { ?>
        {
            name:'<?php echo $row['card_type_name'];?>',
            type:'line',
            stack: '总量',
            areaStyle: {normal: {}},
            data:[<?php echo $row['card_num'];?>]
        },
        <?php };?>
    ]
};


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>
</body>
</html>