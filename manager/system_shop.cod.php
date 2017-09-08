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
    <button class="am-btn ubtn-sure ubtn-blue caddopen">
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
        <td>到期日期</td>
        <td style="width: 8%;">总店</td>
        <td style="width: 8%;">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['shop_info'] as $row) { ?>
    <tr>
      <td><?php echo $row['shop_name']; ?></td>
      <td><?php echo $row['shop_phone']; ?></td>
      <td><?php echo $row['province'].$row['city'].$row['shop_area_address']; ?></td>
      <td><a href="#" class="am-icon-map cmapshow" jing="<?php echo $row['shop_area_jing']; ?>" wei="<?php echo $row['shop_area_wei'];?>" shop_name="<?php echo $row['shop_name']; ?>" data-am-modal="{target: '#usystem_shopm3'}"></a>地图</td>
      <td><?php echo $row['shop_limit_user']; ?></td>
      <td class="<?php if($row['shop_edate']<time()) echo 'gtext-orange'; ?>"><?php echo date('Y-m-d',$row['shop_edate']); ?></td>
      <td><a href="javascript:;" class="<?php if($row['shop_center'] != 1) echo'ccenter';?>" style="text-decoration:none;" shop_id="<?php echo $row['shop_id'];?>">
          <?php if($row['shop_center'] == 1){?>
            <i class="am-icon-home am-icon-md"></i>
          <?php }else{
            echo "--";
          }?>
          </a>
      </td>
      <td>
      <?php if($row['shop_edate']>time()){?>
        <button class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#usystem_shopm2'}" value="<?php echo $row['shop_id']; ?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
      <?php }?>
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
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>店铺名称：</label>
          <div class="umodal-normal">
            <input name="shop_name" type="text" class="am-form-field uinput uinput-max cshop_name cvalid" value="">
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
        <input type="hidden" name="jing" class="cjing">
        <input type="hidden" name="wei" class="cwei">
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
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>店铺名称：</label>
          <div class="umodal-normal">
            <input name="shop_name" type="text" class="am-form-field uinput uinput-max cshop_name cvalid" value="">
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
        <input type="hidden" name="jing" class="cjing">
        <input type="hidden" name="wei" class="cwei">
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
<div class="am-modal" tabindex="-1" id="usystem_shopm3">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">地图
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
       <div id="allmap3" style="height: 400px;">
       </div>
       <input type="hidden" name="jing" class="cjing">
       <input type="hidden" name="wei" class="cwei">
       <input type="hidden" name="shop_name" class="cshop_name">
    </div>
  </div>
</div>
<?php confirmHtml(6)?>
<div class="am-modal am-modal-alert" tabindex="-1" id="calert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">警告</div>
    <div class="am-modal-bd">
      超过店铺最大数量限制！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="http://api.map.baidu.com/api?v=2.0&ak=LxI9Y9IBOKmglxZlF5128gcb51Pnz0WL" type="text/javascript"></script>
<script type="text/javascript">
getCity();
// 是否是主店
$('.ccenter').on('click', function(){
  $('#cconfirm9').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('system_shop_center_do.php',{'shop_id':$(this.relatedTarget).attr('shop_id')},function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert("设置失败");
          console.log(res);
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
})
// 是否可以添加店铺
$('.caddopen').on('click', function(){
  $.ajax({
    url:'system_shop_count_ajax.php',
  }).then(function(res){
    if(res==0){
      $('#usystem_shopm1').modal('open');
    }else{
      $('#calert').modal('open');
    }
  })
})

// cvalid
$('.cvalid').on('input propertychange blur', function(){
  $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
})
// add-submit
$('.caddsubmit').on('click', function(){
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#usystem_shopm1 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#usystem_shopm1 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  var url = "system_shop_add_do.php";
  var data = $('#cform1').serialize();
  $.post(url, data, function(res){
    // console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('店家被停用');
      _self.attr('disabled',false);
    }else if(res=='2'){
      alert('店铺名字不能重复');
      _self.attr('disabled',false);
    }else if(res=='3'){
      alert('添加失败');
      _self.attr('disabled',false);
    }else if(res=='4'){
      alert('超过最大数量限制');
      _self.attr('disabled',false);
    }else{
      alert('添加失败');
      _self.attr('disabled',false);
    }
  });
});
// edit-show
$('.cedit').on('click', function(){
  var shop_id = $(this).val();
  var jing = 116.404;
  var wei = 39.915;
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
    // console.log(res.shop_area_jing);
    if(res.shop_area_jing!=0){
      jing = res.shop_area_jing;
    }
    if(res.shop_area_wei!=0){
      wei = res.shop_area_wei;
    }
    city_id = res.shop_area_shi;
    $('#usystem_shopm2 input[name="shop_name"]').val(res.shop_name);
    $('#usystem_shopm2 input[name="shop_name_old"]').val(res.shop_name);
    $('#usystem_shopm2 input[name="shop_phone"]').val(res.shop_phone);
    $('#usystem_shopm2 input[name="address"]').val(res.shop_area_address);
    $('#usystem_shopm2 .cjing').val(res.shop_area_jing);
    $('#usystem_shopm2 .cwei').val(res.shop_area_wei);

    $('#usystem_shopm2 .cprovince').val(res.shop_area_sheng);
    $('#usystem_shopm2 .cprovince').selected();
    // console.log($('#usystem_shopm2 .cprovince').val());
    var map2 = new BMap.Map("allmap2");
    map2.centerAndZoom(new BMap.Point(jing, wei), 15);
    map2.enableScrollWheelZoom(true);
    var point = new BMap.Point(jing, wei);
    var marker = new BMap.Marker(point);  // 创建标注
    map2.addOverlay(marker);               // 将标注添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    var opts = {
        position : point,    // 指定文本标注所在的地理位置
        offset   : new BMap.Size(-20, 0)    //设置文本偏移量
      }
    var label = new BMap.Label(res.shop_name, opts);  // 创建文本标注对象
      label.setStyle({
        color : "#000000",
        fontSize : "13px",
        height : "20px",
        lineHeight : "20px",
        fontFamily:"微软雅黑",
        border:'none',
        boxShadow:'4px 4px 4px #888888',
        padding:'1px 5px',
        borderRadius:'5px'
       });
    map2.addOverlay(label);
    map2.addEventListener("click",function(e){
        map2.clearOverlays();//清空原来的标注
        var shop_name = $('#usystem_shopm2 .cshop_name').val();
        if(!shop_name){
          shop_name = "店铺名称";
        }
        var jing = e.point.lng ;
        var wei =  e.point.lat;
        $('#usystem_shopm2 .cjing').val(jing);
        $('#usystem_shopm2 .cwei').val(wei);
        var point = new BMap.Point(jing,wei);
        var marker = new BMap.Marker(point);  // 创建标注
        map2.addOverlay(marker);               // 将标注添加到地图中
        marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

        var opts = {
            position : point,    // 指定文本标注所在的地理位置
            offset   : new BMap.Size(-20, 0)    //设置文本偏移量
          }
        var label = new BMap.Label(shop_name, opts);  // 创建文本标注对象
          label.setStyle({
            color : "#000000",
            fontSize : "13px",
            height : "20px",
            lineHeight : "20px",
            fontFamily:"微软雅黑",
            border:'none',
            boxShadow:'4px 4px 4px #888888',
            padding:'1px 5px',
            borderRadius:'5px'
           });
        map2.addOverlay(label); 
        // console.log(e.point.lng + "," + e.point.lat);
    });

    $('#usystem_shopm2 .cmap2').on('change',function(){
      var xy = $(this).find('option:selected').text();
      // console.log(xy);
        var local = new BMap.LocalSearch(map2, {
        renderOptions:{map: map2}
      });
        local.search(xy);
    });
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
$('#usystem_shopm3').on('opened.modal.amui', function(){
  var jing = $('#usystem_shopm3 .cjing').val();
  var wei = $('#usystem_shopm3 .cwei').val();
  var shop_name = $('#usystem_shopm3 .cshop_name').val();
  var map3 = new BMap.Map("allmap3");
  map3.centerAndZoom(new BMap.Point(jing, wei), 15);
  var point = new BMap.Point(jing, wei);
  var marker = new BMap.Marker(point);  // 创建标注
  map3.addOverlay(marker);               // 将标注添加到地图中
  marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
  var opts = {
      position : point,    // 指定文本标注所在的地理位置
      offset   : new BMap.Size(-20, 0)    //设置文本偏移量
    }
  var label = new BMap.Label(shop_name, opts);  // 创建文本标注对象
    label.setStyle({
      color : "#000000",
      fontSize : "13px",
      height : "20px",
      lineHeight : "20px",
      fontFamily:"微软雅黑",
      border:'none',
      boxShadow:'4px 4px 4px #888888',
      padding:'1px 5px',
      borderRadius:'5px'
     });
  map3.addOverlay(label);
});
$('.cmapshow').on('click', function(){
  var jing = $(this).attr('jing');
  var wei = $(this).attr('wei');
  var shop_name = $(this).attr('shop_name');
  $('#usystem_shopm3 .cjing').val(jing);
  $('#usystem_shopm3 .cwei').val(wei);
  $('#usystem_shopm3 .cshop_name').val(shop_name);
  // var map3 = new BMap.Map("allmap3");
  // map3.centerAndZoom(new BMap.Point(jing, wei), 15);
  // var point = new BMap.Point(jing, wei);
  // var marker = new BMap.Marker(point);  // 创建标注
  // map3.addOverlay(marker);               // 将标注添加到地图中
  // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
  // var opts = {
  //     position : point,    // 指定文本标注所在的地理位置
  //     offset   : new BMap.Size(-20, 0)    //设置文本偏移量
  //   }
  // var label = new BMap.Label('hhh', opts);  // 创建文本标注对象
  //   label.setStyle({
  //     color : "#000000",
  //     fontSize : "13px",
  //     height : "20px",
  //     lineHeight : "20px",
  //     fontFamily:"微软雅黑",
  //     border:'none',
  //     boxShadow:'4px 4px 4px #888888',
  //     padding:'1px 5px',
  //     borderRadius:'5px'
  //    });
  // map3.addOverlay(label);
});

//关闭修改框删除select
$('#usystem_shopm2').on('close.modal.amui', function(){
    $('#usystem_shopm2 .cprovince').selected('destroy');
    $('#usystem_shopm2 .ccity').selected('destroy');
});
// edit-submit
$('.ceditsubmit').on('click', function(){
  // 验证变红
  $('#usystem_shopm2 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#usystem_shopm2 .cvalid').hasClass("am-field-error")){
    return false;
  }
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
//单击获取点击的经纬度
map.addEventListener("click",function(e){
    map.clearOverlays();//清空原来的标注
    var shop_name = $('#usystem_shopm1 .cshop_name').val();
    if(!shop_name){
      shop_name = "店铺名称";
    }
    var jing = e.point.lng ;
    var wei =  e.point.lat;
    $('#usystem_shopm1 .cjing').val(jing);
    $('#usystem_shopm1 .cwei').val(wei);
    var point = new BMap.Point(jing,wei);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

    var opts = {
        position : point,    // 指定文本标注所在的地理位置
        offset   : new BMap.Size(-20, 0)    //设置文本偏移量
      }
    var label = new BMap.Label(shop_name, opts);  // 创建文本标注对象
      label.setStyle({
        color : "#000000",
        fontSize : "13px",
        height : "20px",
        lineHeight : "20px",
        fontFamily:"微软雅黑",
        border:'none',
        boxShadow:'4px 4px 4px #888888',
        padding:'1px 5px',
        borderRadius:'5px'
       });
    map.addOverlay(label); 
    // console.log(e.point.lng + "," + e.point.lat);
});

$('#usystem_shopm1 .cmap').on('change',function(){
  var xy = $(this).find('option:selected').text();
  var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map}
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
