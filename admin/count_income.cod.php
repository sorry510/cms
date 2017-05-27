<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucount_income">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="count.php">统计数据表</a></li>
    <li><a href="count_rank.php">商品销售排名</a></li>
    <li><a href="count_business.php">营业数据曲线</a></li>
    <li class="am-active"><a href="javascript:void(0)">收入组成曲线</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform">
      <div class="am-form-group">
        请选择店铺：
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">店铺A</option>
          <option value="3">店铺B</option>
        </select>
      </div>
      <div class="am-form-group">
        对比方式：
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="2">最近30天数据对比(按天)&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="3">最近12个月数据对比(按月)</option>
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace30"></div>
  <div id="container" style="margin:0px auto; height:400px; width:95%;"></div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="../js/highcharts.js"></script>
<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            backgroundColor:'#F1F1F1',
            style: {
              fontFamily: "",
              fontSize: '12px',
              color: '#006cee',
            }
        },
        title: {
            text: '收入数据统计与占比'
        },
        xAxis: {
            categories: ['2017-5-17', '2017-5-16', '2017-5-15', '2017-5-14', '2017-5-13', '2017-5-12', '2017-5-11', '2017-5-10', '2017-5-9', '2017-5-8', '2017-5-7', '2017-5-6', '2017-5-5', '2017-5-4', '2017-5-3', '2017-5-2', '2017-5-1', '2017-4-30', '2017-4-29', '2017-4-28', '2017-4-27', '2017-4-26', '2017-4-25', '2017-4-24', '2017-4-23', '2017-4-22', '2017-4-21', '2017-4-20', '2017-4-19', '2017-4-18', 
            ]
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
            gridLineColor:'#cccccc',
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
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    '总量: ' + this.point.stackTotal;
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
            data: [0, 0, 0, 0, 0, 0, 13, 0, 0, 145, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 42, 
            ],
            color : "#f45b5b",
        }]
    });
});
</script>
</body>
</html>