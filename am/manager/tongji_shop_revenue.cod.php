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
          <li class="layui-this">
            <a href="tongji_shop_revenue.php">店铺收入占比</a>
          </li>
          <li>
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
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:[<?php foreach($this->_data['money'] as $key => $row) {
            echo "'".$row['shop_name']."',";
        } ?>]
    },
    series: [
        {
            name:'营业额',
            type:'pie',
            radius: ['40%', '55%'],
            label: {
                normal: {
                    formatter: '{a|{a}}{abg|}\n{hr|}\n  {b|{b}：}{c}  {per|{d}%}  ',
                    backgroundColor: '#eee',
                    borderColor: '#aaa',
                    borderWidth: 1,
                    borderRadius: 4,
                    // shadowBlur:3,
                    // shadowOffsetX: 2,
                    // shadowOffsetY: 2,
                    // shadowColor: '#999',
                    // padding: [0, 7],
                    rich: {
                        a: {
                            color: '#999',
                            lineHeight: 22,
                            align: 'center'
                        },
                        // abg: {
                        //     backgroundColor: '#333',
                        //     width: '100%',
                        //     align: 'right',
                        //     height: 22,
                        //     borderRadius: [4, 4, 0, 0]
                        // },
                        hr: {
                            borderColor: '#aaa',
                            width: '100%',
                            borderWidth: 0.5,
                            height: 0
                        },
                        b: {
                            fontSize: 16,
                            lineHeight: 33
                        },
                        per: {
                            color: '#eee',
                            backgroundColor: '#334455',
                            padding: [2, 4],
                            borderRadius: 2
                        }
                    }
                }
            },
            data:[
              <?php foreach($this->_data['money'] as $key => $row) { ?>
                {value:<?php echo $row['sum_money']==0?0:$row['sum_money'];?>, name:'<?php echo $row['shop_name'];?>'},
              <?php };?>
            ]
        }
    ]
};
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
</script>
</body>
</html>