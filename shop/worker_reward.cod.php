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
        <td>修改时间</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['group_reward_list'] as $row) { ?>
    <tr>
      <td><?php echo $row['worker_group_name']; ?></td>
      <td><?php echo $row['group_reward_ctime'] == ''?'': date('Y-m-d H:m', $row['group_reward_ctime']); ?></td>
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
            <input class="uinput uinput-max" type="text" name="group_reward_create"/>
          </div>
          <div class="umodal-text" for="">&nbsp;&nbsp;元/会员</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">充值提成：</label>
          <div class="umodal-short" style="margin-right:10px">
            <select class="uselect uselect-max cworker_group_cz" name="group_reward_cz">
              <option value="1">百分比</option>
              <option value="2">固定值</option>
            </select>
          </div>
          <div class="umodal-short">
            <input class="uinput uinput-max" type="text" name="cworker_group_cz1"/>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label cdgtc" for="">导购提成：</label>
          <div class="umodal-short" style="margin-right:10px">
            <select class="uselect uselect-max cworker_group_dg" name="group_reward_dg" >
              <option value="1">百分比</option>
              <option value="2">固定值</option>
            </select>
          </div>
          <div class="umodal-short">
            <input class="uinput uinput-max" type="text" name="cworker_group_dg1"/>
          </div>
        </div>
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
    <div class="am-modal-hd uhead"><span class="cname"></span>提成方案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <ul class="am-list am-list-border ulist2">
        <li class="uheader"><span class="uspan1">分类/名称</span><span class="uspan2">提成</span></li>
        <li>
          <div class="am-form-group am-g">
            <form action="" id="form1">
              <div class="umodal-short" style="padding-left:20px;">
                <select class="uselect uselect-max cgoods_catalog" name="goods_catalog" data-am-selected>
                  <option value="0">全部</option>
                  <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="m-<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                  <?php } ?>
                  <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
                  <option value="s-<?php echo $row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="umodal-text" style="padding-left:10px;">
                <button type="button" class="am-btn ubtn-search2 ubtn-green csearch_form1">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
              <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                  保存
                </button>
              </div>
            </form>
          </div>
        </li>
      </ul>
      <ul class="am-list am-list-border ulist1 cgoods_list">
      <!-- 多店商品 -->
      <?php foreach($this->_data['mgoods_list'] as $row){ ?>
        <li mgoods_catalog_id="<?php echo $row['mgoods_catalog_id']; ?>">
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext1"><?php echo $row['mgoods_catalog_name']; ?></div>
            <div class="am-u-lg-4 am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
            <div class="am-u-lg-2">
              <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                批量设置
              </button>
            </div>
          </div>
        </li>
        <?php foreach($row['mgoods'] as $cont){ ?>
        <li mgoods_id = "<?php echo $cont['mgoods_id'];?>">
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2"><?php echo $cont['mgoods_name'];?>（<?php echo $cont['mgoods_price'];?>元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <?php } ?>
        <?php } ?>
        <!-- 单店商品 -->
        <?php foreach($this->_data['sgoods_list'] as $row){ ?>
        <li sgoods_catalog_id="<?php echo $row['sgoods_catalog_id']; ?>">
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext1"><?php echo $row['sgoods_catalog_name']; ?></div>
            <div class="am-u-lg-4 am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
            <div class="am-u-lg-2">
              <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                批量设置
              </button>
            </div>
          </div>
        </li>
        <?php foreach($row['sgoods'] as $cont){ ?>
        <li mgoods_id = "<?php echo $cont['sgoods_id'];?>">
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2"><?php echo $cont['sgoods_name'];?>（<?php echo $cont['sgoods_price'];?>元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <?php } ?>
      <?php } ?>
      </ul>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen1"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
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
<script>

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

$(document).on('click','.abat',function(){
  $("[id*='abfb']").val($("#abfball").val());
  $("[id*='agdz']").val($("#agdzall").val());
})

//修改按钮
$('.cupdate').on('click',function(){
  var worker_group_id = $(this).val();
  var group_name = $(this).parent().prev().prev().text();
  $(".cname").text(group_name);
  $.ajax({
    type: "GET",
    dataType:"json",
    url: "worker_reward_ajax.php",
    data: {worker_group_id:worker_group_id}
  }).then(function(msg){
      console.log(msg.group_reward_pfill);
      $("#uworker_rewardm1 input[name='group_reward_create']").val(msg.group_reward_create);
      if(msg.group_reward_pfill == 0){
        $('#uworker_rewardm1 .cworker_group_cz').val('2');
        $('#uworker_rewardm1 .cworker_group_cz').selected();
        $("#uworker_rewardm1 input[name='cworker_group_cz1']").val(msg.group_reward_fill);
      }else{
        $('#uworker_rewardm1 .cworker_group_cz').val(1);
        $('#uworker_rewardm1 .cworker_group_cz').selected();
        $("#uworker_rewardm1 input[name='cworker_group_cz1']").val(msg.group_reward_pfill);
      }

      if(msg.group_reward_pguide == 0){
        $('#uworker_rewardm1 .cworker_group_dg').val(2);
        $('#uworker_rewardm1 .cworker_group_dg').selected();
        $("#uworker_rewardm1 input[name='cworker_group_dg']").val(msg.group_reward_guide);
      }else{
        $('#uworker_rewardm1 .cworker_group_dg').val(1);
        $('#uworker_rewardm1 .cworker_group_dg').selected();
        $("#uworker_rewardm1 input[name='cworker_group_dg1']").val(msg.group_reward_pguide);
      }
  });
});

$('#uworker_rewardm1').on('close.modal.amui', function(){
  $('#uworker_rewardm1 .cworker_group_cz').selected('destroy');
  $('#uworker_rewardm1 .cworker_group_dg').selected('destroy');
});

//弹出框中的查询按钮
$('.csearch-form1').on('click',function(){
  var goods_catalog_id = $("#uworker_rewardm2 .cgoods_catalog").val();
  $("#uworker_rewardm2 .cgoods_list li").hide();
  $.ajax({
    type: "GET",
    url: "worker_reward_add_search_ajax.php",
    data: {goods_catalog_id:goods_catalog_id}, 
    dataType:"json",
  }).then(function(res){
    console.log(res);      
    for(var i=0; i<res.length; i++){
      console.log(res[i]['mgoods_catalog_id']);
      $("#umcombo_timem3 .uleft .uc .uc1").each(function(){
        if($(this).attr('mgoods_catalog_id')  == res[i]['mgoods_catalog_id']){
          $(this).show();
        }
      });
      for(var j=0; j<res[i]['mgoods'].length; j++){
        //console.log(res[i]['mgoods'][j]['mgoods_name']);
        $("#umcombo_timem3 .uleft .uc .uc2").each(function(){
          if($(this).attr('mgoods_id')  == res[i]['mgoods'][j]['mgoods_id']){
            $(this).show();
          }
        });
      }
    }
  });
});

</script>
</body>
</html>
