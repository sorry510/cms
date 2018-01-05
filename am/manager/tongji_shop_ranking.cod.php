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
<div id="main" style="width:100%;height:500px;"></div>
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
            data: [<?php foreach($this->_data['money'] as $key => $row) {
            echo "'".$row['shop_name']."',";
        } ?>],
            axisPointer: {
                type: 'shadow'
            }
        }
    ],
    yAxis: [
        {
            type: 'value',
            name: '营业额',
            interval: 20000,
            axisLabel: {
                formatter: '{value} 元'
            }
        },
        {
            type: 'value',
            name: '会员数量',
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
            data:[<?php foreach($this->_data['money'] as $key => $row) { ?>
                <?php echo $row['sum_money']==0?0:$row['sum_money'];?>,
              <?php };?>]
        },
        {
            name:'会员数量',
            type:'bar',
            stack: 'b',
            yAxisIndex: 1,
            data:[<?php if (!empty($this->_data['new_card'])) {
                foreach ($this->_data['card'] as $key => $row) {
                    echo $row['card_count'].",";
                }
            }else{
                echo 0;
            } ?>]
        },
        {
            name:'新增会员',
            type:'bar',
            stack: 'b',
            yAxisIndex: 1,
            data:[<?php if (!empty($this->_data['new_card'])) {
                foreach ($this->_data['new_card'] as $key => $row) {
                    echo $row['new_card_count'].",";
                }
            }else{
                echo 0;
            } ?>
            ]
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>
</body>
</html>