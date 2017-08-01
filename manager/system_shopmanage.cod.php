<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="usystem_shopmanage" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">分店管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_shopmanagem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增分店
    </button>
    <div style="clear: both;"></div>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>店铺名称</td>
        <td>电话</td>
        <td>地址</td>
        <td>地图位置</td>
        <td>最大用户数</td>
        <td>到期时间</td>
        <td style="width: 8%;">操作</td>
      </tr>
    </thead>
    <tr>
      <td>解放路分店</td>
      <td>0371-55912313</td>
      <td>河南省郑州市金水区解放路38号</td>
      <td><a href="javascript:void" class="iconfont icon-question"></a>
        地图</td>
      <td>5</td>
      <td>2020-3-2</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#usystem_shopmanagem1'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
      </td>
    </tr>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="usystem_shopmanagem1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增分店
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">店铺名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">电话：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">区域：</label>
          <div class="umodal-short" style="margin-right: 20px;">
            <select name="province1" class="uselect uselect-max cmap" data-am-selected>
            </select>
          </div>
          <div class="umodal-short">
            <select name="city1" class="uselect uselect-max cmap" data-am-selected>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系地址：</label>
          <div class="umodal-max">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="联系地址">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">地图位置：</label>
          <div class="umodal-max">
	        <div id="allmap" style="height: 240px;">
	        </div>
          </div>
          
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type='text/javascript' src="../js/PCASClass.js"></script>
<script src="http://api.map.baidu.com/api?v=2.0&ak=m3VYcozyFtYtL0i0Y1zvFG5HS7XPNfan" type="text/javascript"></script>
<script type="text/javascript">

new PCAS("province1","city1");
/*new PCAS("province2","city2");*/

/*var province2 = "{$user.location.0}"; 
var city2 = "{$user.location.1}";
var area2 = "{$user.location.2}";
new PCAS("province","city","area",province2,city2,area2);
new PCAS('province2','city2');*/

var map = new BMap.Map("allmap");
map.centerAndZoom(new BMap.Point(116.404, 39.915), 15);
map.enableScrollWheelZoom(true);
$('.cmap').on('change',function(){
  var xy = $(this).val();
  console.log(xy);
    var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map}
  });
    local.search(xy);
})
var map2 = new BMap.Map("allmap2");
map2.centerAndZoom(new BMap.Point(116.404, 39.915), 15);
map2.enableScrollWheelZoom(true);
$('.cmap').on('change',function(){
  var xy = $(this).val();
  console.log(xy);
    var local = new BMap.LocalSearch(map2, {
    renderOptions:{map: map2}
  });
    local.search(xy);
})

  // function place(){
  //   var xy = $('.map');
  //   var xy = xy.options[search.selectedIndex].value;
  //   // var province = search.options[search.selectedIndex].value;
  //   var local = new BMap.LocalSearch(map, {
  //   renderOptions:{map: map}
  // });
  //   local.search(xy);
  // } 
</script>
</body>
</html>
