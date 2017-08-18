<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div id="uworker_reward" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工提成方案</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分组</td>

        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['group_reward_list'] as $row) { ?>
    <tr>
      <td><?php echo $row['worker_group_name']; ?></td>
      <td> 
        <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['worker_group_id']; ?>" data-am-modal="{target: '#uworker_rewardm1'}">
          <i class="iconfont icon-bianji"></i>
          提成方案
        </button>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="uworker_rewardm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead"><span class="cname"></span>提成方案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">办卡提成：</label>
          <div class="umodal-short">
            <input class="uinput uinput-max creward_create" type="text"/>
          </div>
          <div class="umodal-text" for="">&nbsp;&nbsp;元/会员</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">充值提成：</label>
          <div class="umodal-short" style="margin-right:10px">
            <select class="uselect uselect-max cfill_type" data-am-selected>
              <option value="1">百分比</option>
              <option value="2">固定值</option>
            </select>
          </div>
          <div class="umodal-short">
            <input class="uinput uinput-max creward_fill" type="text"/>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label cdgtc" for="">导购提成：</label>
          <div class="umodal-short" style="margin-right:10px">
            <select class="uselect uselect-max cguide_type" data-am-selected>
              <option value="1">百分比</option>
              <option value="2">固定值</option>
            </select>
          </div>
          <div class="umodal-short">
            <input class="uinput uinput-max creward_guide" type="text"/>
          </div>
        </div>
        <input class="cworker_group_id" type="hidden">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen2"><i class="iconfont icon-xiangyou2"></i>
          下一步
        </button>
      </div>
    </div>
  </div>
</div>

<div class="am-modal" tabindex="-1" id="uworker_rewardm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">提成方案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-tabs utabs" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">商品提成</a></li>
          <li><a href="#tab2">套餐提成</a></li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">分类/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max cgoods_catalog" data-am-selected>
                        <option value="0">全部</option>
                        <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                          <option value="m-<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green csearch_goods">
                        <i class="iconfont icon-search"></i>
                        查询
                      </button>
                    </div>
                    <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                    </div>
                  </form>
                </div>
              </li>
            </ul>
            <ul class="am-list am-list-border ucont cgoods_list">
            <?php foreach($this->_data['mgoods_list'] as $row) { ?>
              <li mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">
                    <?php echo $row['mgoods_catalog_name'] ;?>
                  </div>
                  <div class="am-u-lg-5 am-text-right">
                    <input class="uinput uinput-60 cprice1" type="text" name="allgoods_value<?php echo $row['mgoods_catalog_id'] ;?>">
                    <span class="utext3">%</span>
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray callset1" ctype="m" value="<?php echo $row['mgoods_catalog_id'] ;?>">批量设置</button>
                  </div>
                </div>
              </li>
              <?php foreach($row['mgoods'] as $row2) {?>
              <li mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2"><?php echo $row2['mgoods_name']."(".$row2['mgoods_price']."元)" ;?></div>
                  <div class="am-u-lg-5 am-u-end am-text-right">
                    
                    <input mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>" mgoods_id="<?php echo $row2['mgoods_id'] ;?>" price="<?php echo $row2['mgoods_price'] ;?>" class="uinput uinput-60 cprice1" type="text">
                    <span class="utext3">%</span>&nbsp;&nbsp;
                    
                    <input mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>" price="<?php echo $row2['mgoods_price'] ;?>" mgoods_id="<?php echo $row2['mgoods_id'] ;?>" class="uinput uinput-60 cprice2" type="text">
                    <span class="utext3">元</span>
                  </div>
                </div>
              </li>
              <?php } ?>
            <?php }?>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">套餐/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max cmcombo" data-am-selected>
                        <option value="0">全部</option>
                        <?php foreach($this->_data['mcombo'] as $row) { ?>
                          <option value="<?php echo $row['mcombo_id']; ?>"><?php echo $row['mcombo_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green csearch_mcombo">
                        <i class="iconfont icon-search"></i>
                        查询
                      </button>
                    </div>
                    <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                    </div>
                  </form>
                </div>
              </li>
            </ul>
            <ul class="am-list am-list-border ucont cmcombo_list">
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">
                    套餐名称
                  </div>
                  <div class="am-u-lg-5 am-text-right">
                    <input class="uinput uinput-60 cprice1" type="text">
                    <span class="utext3">%</span>
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray callset2">批量设置</button>
                  </div>
                </div>
              </li>
              <?php foreach($this->_data['mcombo'] as $row) { ?>
              <li mcombo="<?php echo $row['mcombo_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2"><?php echo $row['mcombo_name']."(".$row['mcombo_price']."元)" ;?></div>
                  <div class="am-u-lg-5 am-text-right">
                    <input class="uinput uinput-60 cprice1" price="<?php echo $row['mcombo_price'] ;?>"  mcombo_id="<?php echo $row['mcombo_id'] ;?>" type="text">
                    <span class="utext3">%</span>&nbsp;&nbsp;
                    <input class="uinput uinput-60 cprice2" price="<?php echo $row['mcombo_price'] ;?>"  mcombo_id="<?php echo $row['mcombo_id'] ;?>" type="text">
                    <span class="utext3">元</span>
                  </div>
                  <div class="am-u-lg-2">

                  </div>
                </div>
              </li>
              <?php } ?> 
            </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen1"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green csubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
$(function(){
  $('.cmodalopen1').on('click', function(e) {
    $('#uworker_rewardm2').modal('close');
    $('#uworker_rewardm1').modal('open');
    $('#uworker_rewardm1 input').eq(0).focus();
  });
  $('.cmodalopen2').on('click', function(e) {
    $('#uworker_rewardm1').modal('close');
    $('#uworker_rewardm2').modal('open');
    $('#uworker_rewardm2 input').eq(0).focus();
  });
})

//edit-show
$('.cupdate').on('click',function(){
  //进入弹出框首先删除，遗留下来的数据
  $('#uworker_rewardm2 .cprice1').val('');
  $('#uworker_rewardm2 .cprice2').val('');
  $('#uworker_rewardm1 .cfill_type').selected('destroy');
  $('#uworker_rewardm1 .cguide_type').selected('destroy');
  var worker_group_id = $(this).val();
  $('#uworker_rewardm1 .cworker_group_id').val(worker_group_id);
  $.getJSON('worker_reward_edit_ajax.php', {worker_group_id:worker_group_id}, function(res){
    // console.log(res);
    if(res){
      $('#uworker_rewardm1 .creward_create').val(res.group_reward_create);
      if(res.group_reward_fill != 0){
        $('#uworker_rewardm1 .cfill_type').val(2);
        $('#uworker_rewardm1 .creward_fill').val(res.group_reward_fill);
      }
      if(res.group_reward_pfill != 0){
        $('#uworker_rewardm1 .cfill_type').val(1);
        $('#uworker_rewardm1 .creward_fill').val(res.group_reward_pfill);
      }
      if(res.group_reward_fill == 0 && res.group_reward_pfill == 0){
        $('#uworker_rewardm1 .cfill_type').val(1);
        $('#uworker_rewardm1 .creward_fill').val(0);
      }
      if(res.group_reward_guide != 0){
        $('#uworker_rewardm1 .cguide_type').val(2);
        $('#uworker_rewardm1 .creward_guide').val(res.group_reward_guide);
      }
      if(res.group_reward_pguide != 0){
        $('#uworker_rewardm1 .cguide_type').val(1);
        $('#uworker_rewardm1 .creward_guide').val(res.group_reward_pguide);
      }
      if(res.group_reward_guide == 0 && res.group_reward_pguide == 0){
        $('#uworker_rewardm1 .cguide_type').val(1);
        $('#uworker_rewardm1 .creward_guide').val(0);
      }
      if(res.goods){
        $.each(res.goods, function(k,v){
          if(v.mgoods_id){
            $("#uworker_rewardm2 .cprice2[mgoods_id='"+v.mgoods_id+"']").val(v.group_reward2_money);
            $("#uworker_rewardm2 .cprice1[mgoods_id='"+v.mgoods_id+"']").val(v.group_reward2_percent);
          }
          if(v.mcombo_id){
            $("#uworker_rewardm2 .cprice2[mcombo_id='"+v.mcombo_id+"']").val(v.group_reward2_money);
            $("#uworker_rewardm2 .cprice1[mcombo_id='"+v.mcombo_id+"']").val(v.group_reward2_percent);
          }
        });
      }
    }
    //第一次时添加，没有数据
    $('#uworker_rewardm1 .cfill_type').selected();
    $('#uworker_rewardm1 .cguide_type').selected();
  })
});
//edit-submit
$('.csubmit').on('click',function(){
  var url = 'worker_reward_add_do.php';
  var arr = [];
  var json = {};
  $("#uworker_rewardm2 .cprice2").each(function(){
    if($(this).val() != ''){
      if($(this).attr('mgoods_id')){
        json = {'mgoods_catalog_id':$(this).attr('mgoods_catalog_id'),'mgoods_id':$(this).attr('mgoods_id'),'money':$(this).val(),'percent':$(this).siblings('input').val()};
      }
      if($(this).attr('sgoods_id')){
        json = {'sgoods_catalog_id':$(this).attr('sgoods_catalog_id'),'sgoods_id':$(this).attr('sgoods_id'),'money':$(this).val(),'percent':$(this).siblings('input').val()};
      }
      if($(this).attr('mcombo_id')){
        json = {'mcombo_id':$(this).attr('mcombo_id'),'money':$(this).val(),'percent':$(this).siblings('input').val()};
      }
      arr.push(json);
    }
  });
  
  var data = {
    arr:arr,
    reward_create:$("#uworker_rewardm1 .creward_create").val(),
    reward_fill:$("#uworker_rewardm1 .creward_fill").val(),
    fill_type:$("#uworker_rewardm1 .cfill_type").val(),
    reward_guide:$("#uworker_rewardm1 .creward_guide").val(),
    guide_type:$("#uworker_rewardm1 .cguide_type").val(),
    worker_group_id:$("#uworker_rewardm1 .cworker_group_id").val()
  };
  // console.log(data);
  $.post(url, data, function(res){
    // console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('添加失败');
    }else if(res=='2'){
      alert('更新失败');
    }else{
      alert('更新商品失败');
    }
  });
});


//弹出框中的商品查询
$('.csearch_goods').on('click',function(){
  var arr = [];
  var goods_catalog_id = $("#uworker_rewardm2 .cgoods_catalog").val();
  if(goods_catalog_id!='0'){
    $("#uworker_rewardm2 .cgoods_list li").hide();
    arr=goods_catalog_id.split("-");
    $('#uworker_rewardm2 .cgoods_list li').each(function () {
      if(arr[0]=='m'){
        if($(this).attr('mgoods_catalog_id')==arr[1]){
          $(this).show();
        }
      }else if(arr[0]=='s'){
        if($(this).attr('sgoods_catalog_id')==arr[1]){
          $(this).show();
        }
      }
    });
  }else{
    $("#uworker_rewardm2 .cgoods_list li").show();
  }
});
//弹出框中的套餐查询
$('.csearch_mcombo').on('click',function(){
  var mcombo_id = $("#uworker_rewardm2 .cmcombo").val();
  if(mcombo_id!='0'){
    $("#uworker_rewardm2 .cmcombo_list li").hide();
    $('#uworker_rewardm2 .cmcombo_list li').each(function () {
        if($(this).attr('mcombo')==mcombo_id){
          $(this).show();
        }
    });
  }else{
    $("#uworker_rewardm2 .cmcombo_list li").show();
  }
});
//批量商品价格
$('#uworker_rewardm2 .callset1').on('click',function () {
  var goods_catalog_id = $(this).val();
  var type = $(this).attr('ctype');
  var price1 = $(this).parent().siblings().find('.cprice1').val();
  if(type==='m'){
    var elm1 = $("#uworker_rewardm2 .cgoods_list li[mgoods_catalog_id='"+goods_catalog_id+"']").find('.cprice1');
    elm1.val(price1);
    $.each(elm1, translate1);
  }else if(type==='s'){
    var elm1 = $("#uworker_rewardm2 .cgoods_list li[sgoods_catalog_id='"+goods_catalog_id+"']").find('.cprice1');
    elm1.val(price1);
    $.each(elm1, translate1);
  }
});
//批量套餐价格
$('#uworker_rewardm2 .callset2').on('click',function () {
  var price1 = $(this).parent().siblings().find('.cprice1').val();
  var elm1 = $("#uworker_rewardm2 .cmcombo_list li").find('.cprice1');
  elm1.val(price1);
  $.each(elm1, translate1);
});
//修改百分比或价格
$("#uworker_rewardm2 .cprice1").on("input propertychange",translate1);
$("#uworker_rewardm2 .cprice2").on("input propertychange",translate2);
//转换%=>元
function translate1(){
  if(isNaN($(this).val())){
    $(this).val('');
    $(this).siblings('input').val('');
  }else{
    var discount = $(this).val();
    var yprice = Number($(this).attr('price'));
    if(discount > 0){
      var nprice = yprice * discount / 100;
      nprice = nprice.toFixed(2);
      $(this).siblings('input').val(nprice);
    }else{
      $(this).val('');
      $(this).siblings('input').val('');
    }
  }
}
//转换元=>%
function translate2(){
  if(isNaN($(this).val())){
    $(this).val('');
    $(this).siblings('input').val('');
  }else{
    var nprice = $(this).val();
    var yprice = Number($(this).attr('price'));
    if(nprice > 0){
      var discount = nprice / yprice*100;
      discount = discount.toFixed(2);
      $(this).siblings('input').val(discount);
    }else{
      $(this).val('');
      $(this).siblings('input').val('');
    }
  }
}
</script>
</body>
</html>
