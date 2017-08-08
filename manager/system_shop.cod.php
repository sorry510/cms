<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="usystem_shop" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">分店管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_shopm1'}">
      <i class="iconfont icon-question"></i>
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
    <?php foreach($this->_data['shop_info'] as $row) { ?>
    <tr>
      <td><?php echo $row['shop_name']; ?></td>
      <td><?php echo $row['shop_phone']; ?></td>
      <td><?php echo $row['province'].$row['city'].$row['shop_area_address']; ?></td>
      <td><a href="javascript:void" class="iconfont icon-question"></a>
        地图</td>
      <td><?php echo $row['shop_limit_user']; ?></td>
      <td><?php echo date('Y-m-d',$row['shop_edate']); ?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#usystem_shopm2'}" value="<?php echo $row['shop_id']; ?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
      </td>
    </tr>
    <?php }?>
  </table>
</div>

<!--modal框add-->
<div class="am-modal" tabindex="-1" id="usystem_shopm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增分店
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">店铺名称：</label>
          <div class="umodal-normal">
            <input name="shop_name" type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">电话：</label>
          <div class="umodal-normal">
            <input name="shop_phone" type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">区域：</label>
          <div class="umodal-short" style="margin-right: 20px;">
            <select name="province" class="uselect uselect-max cmap cprovince" data-am-selected>
            <?php foreach($this->_data['province'] as $row){?>
            <option value="<?php echo $row['region_id'];?>"><?php echo $row['region_name'];?></option>
            <? }?>
            </select>
          </div>
          <div class="umodal-short">
            <select name="city" class="uselect uselect-max cmap ccity" data-am-selected>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系地址：</label>
          <div class="umodal-max">
            <input name="address" class="am-form-field uinput uinput-max" type="text" placeholder="联系地址">
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
        <button type="button" class="am-btn ubtn-sure ubtn-green caddsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!--modal框edit-->
<div class="am-modal" tabindex="-1" id="usystem_shopm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改分店
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">店铺名称：</label>
          <div class="umodal-normal">
            <input name="shop_name" type="text" class="am-form-field uinput uinput-max">
            <input name="shop_name_old" type="hidden">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">电话：</label>
          <div class="umodal-normal">
            <input name="shop_phone" type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">区域：</label>
          <div class="umodal-short" style="margin-right: 20px;">
            <select name="province" class="uselect uselect-max cmap2 cprovince">
            <?php foreach($this->_data['province'] as $row){?>
            <option value="<?php echo $row['region_id'];?>"><?php echo $row['region_name'];?></option>
            <? }?>
            </select>
          </div>
          <div class="umodal-short">
            <select name="city" class="uselect uselect-max cmap2 ccity">
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系地址：</label>
          <div class="umodal-max">
            <input name="address" class="am-form-field uinput uinput-max" type="text" placeholder="联系地址">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">地图位置：</label>
          <div class="umodal-max">
          <div id="allmap2" style="height: 240px;">
          </div>
          </div>
        </div>
        <input type="hidden" name="shop_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ceditsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="http://api.map.baidu.com/api?v=2.0&ak=m3VYcozyFtYtL0i0Y1zvFG5HS7XPNfan" type="text/javascript"></script>
<script type="text/javascript">

getCity();

// add
$('.caddsubmit').on('click', function(){
  var url = "system_shop_do.php";
  var data = $('#cform1').serialize();
  // console.log(data);
  $.post(url, data, function(res){
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('店家被停用');
    }else if(res=='2'){
      alert('店铺名字不能重复');
    }else{
      alert('添加失败');
    }
  });
});

// edit-show
$('.cedit').on('click', function(){
  var shop_id = $(this).val();
  $('#usystem_shopm2 input[name="shop_id"]').val(shop_id);
  $('#usystem_shopm2 .ccity').find('option').remove();
  var city_id = 0;
  $.ajax({
    url:'system_shop_edit_ajax.php',
    data:{
      shop_id:shop_id
    },
    type:'GET',
    dataType:'json'
  }).then(function(res){
    // console.log(res);
    $('#usystem_shopm2 input[name="shop_name"]').val(res.shop_name);
    $('#usystem_shopm2 input[name="shop_name_old"]').val(res.shop_name);
    $('#usystem_shopm2 input[name="shop_phone"]').val(res.shop_phone);
    $('#usystem_shopm2 input[name="address"]').val(res.shop_area_address);

    $('#usystem_shopm2 .cprovince').val(res.shop_area_sheng);
    $('#usystem_shopm2 .cprovince').selected();
    // console.log($('#usystem_shopm2 .cprovince').val());
    city_id = res.shop_area_shi;
  }).then(function(res){
    $.ajax({
      url:'city_ajax.php',
      data:{
        province_id:$('#usystem_shopm2 .cprovince').val()
      },
      type:"get",
      dataType:"json"
    }).then(function(res){
      // console.log(res);
      var items = '';
      if(res){
        $.each(res, function(k,v){
          items = '<option value="'+v.region_id+'">'+v.region_name+'</option>';
          $('.ccity').append(items);
        })
      }
    }).then(function(){
      $('#usystem_shopm2 .ccity').val(city_id);
      $('#usystem_shopm2 .ccity').selected();
    });
  })
})
//关闭修改框删除select
$('#usystem_shopm2').on('close.modal.amui', function(){
    $('#usystem_shopm2 .cprovince').selected('destroy');
    $('#usystem_shopm2 .ccity').selected('destroy');
});
// edit-submit
$('.ceditsubmit').on('click', function(){
  var url = "system_shop_edit_do.php";
  var data = $('#cform2').serialize();
  // console.log(data);
  $.post(url, data, function(res){
    console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('店家被停用');
    }else if(res=='2'){
      alert('名字不能重复');
    }else{
      alert('修改失败');
    }
  });
})



$('#usystem_shopm1 .cprovince').on('change', getCity);
$('#usystem_shopm2 .cprovince').on('change', getCity2);

var map = new BMap.Map("allmap");
map.centerAndZoom(new BMap.Point(116.404, 39.915), 15);
map.enableScrollWheelZoom(true);
$('#usystem_shopm1 .cmap').on('change',function(){
  var xy = $(this).find('option:selected').text();
  var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map}
  });
    local.search(xy);
})

var map2 = new BMap.Map("allmap2");
map2.centerAndZoom(new BMap.Point(116.404, 39.915), 15);
map2.enableScrollWheelZoom(true);
$('#usystem_shopm2 .cmap2').on('change',function(){
  var xy = $(this).find('option:selected').text();
  // console.log(xy);
    var local = new BMap.LocalSearch(map2, {
    renderOptions:{map: map2}
  });
    local.search(xy);
})

function getCity(){
  $('#usystem_shopm1 .ccity').find('option').remove();
  $.ajax({
    url:'city_ajax.php',
    data:{
      province_id:$('#usystem_shopm1 .cprovince').val()
    },
    type:"get",
    dataType:"json"
  }).then(function(res){
    // console.log(res);
    var items = '';
    if(res){
      $.each(res, function(k,v){
        items = '<option value="'+v.region_id+'">'+v.region_name+'</option>';
        $('.ccity').append(items);
      })
    }
  });
}

function getCity2(){
  $('#usystem_shopm2 .ccity').find('option').remove();
  $.ajax({
    url:'city_ajax.php',
    data:{
      province_id:$('#usystem_shopm2 .cprovince').val()
    },
    type:"get",
    dataType:"json"
  }).then(function(res){
    // console.log(res);
    var items = '';
    if(res){
      $.each(res, function(k,v){
        items = '<option value="'+v.region_id+'">'+v.region_name+'</option>';
        $('.ccity').append(items);
      })
    }
  });
}
</script>
</body>
</html>
