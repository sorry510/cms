<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uworker_reward_detail">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">员工提成明细</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" id="form1">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
          <option <?php if($row['shop_id'] == $this->_data['request']['shop_id']){echo "selected";} ?> value="<?php echo $row['shop_id'] ?>"><?php echo $row['shop_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from'] ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['from'] ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">员工：</label>
        <input type="text" class="am-form-field uinput uinput-220" name="search" value="<?php echo $this->_data['request']['search'] ?>">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch_form1">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace15"></div>
    <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>消费明细</td>
        <td>时间</td>
        <td>员工</td>
        <td>类型</td>
        <td>会员卡号</td>
        <td>会员姓名</td>
        <td>手机号</td>
        <td>内容</td>
        <td>提成</td>
        <td>分店</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['worker_reward_detail_list']['list'] as $row) { ?>
      <tr>
        <td class="coffopen" card_record_id="<?php echo $row['c_card_record_id']; ?>"><a href="#"><?php echo $row['c_card_record_code']; ?></a></td>
        <td><?php echo date('Y-m-d H:i:s',$row['worker_reward_atime']); ?></td>
        <td><?php echo $row['c_worker_name']; ?></td>
        <td><?php echo $row['worker_reward_type1']; ?></td>
        <td><?php echo $row['c_card_code']; ?></td>
        <td><?php echo $row['c_card_name']; ?></td>
        <td><?php echo $row['c_card_phone']; ?></td>
        <td>办理vip卡</td>
        <td  class="gtext-orange"><?php echo $row['worker_reward_money']; ?>元</td>
        <td><?php echo $row['shop_name']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['worker_reward_detail_list'],$this->_data['request'],'worker_reward_detail.php'); ?>
</div>

<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">消费单号:<span class="ccard_record_code"></span></span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">消费时间：<span class="ccard_record_atime"></span></div>
        <div class="am-u-lg-6">消费单号：<span class="ccard_record_code"></span></div>
        <div class="am-u-lg-6">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-6">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-6">会员类型：<span class="ccard_type_name"></div>
        <div class="am-u-lg-6">会员折扣：<span class="ccard_type_discount"></div>
        <div class="am-u-lg-6">操作类型：<span class="ccard_record_type"></span></div>
        <div class="am-u-lg-6">本次消费：<span class="ccard_record_smoney"></span></div>
        <div class="am-u-lg-6">支付方式：<span class="ccard_record_pay"></span></div>
        <div class="am-u-lg-6">手动优惠：<span class="ccard_record_jmoney">--</span></div>
        <div class="am-u-lg-6">操作人员：<span class="cuser_name"></span></div>
        <div class="am-u-lg-6">是否免单：<span class="ccard_record_state"></span></div>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
//分页首末页不可选中
<?php pageJs($this->_data['worker_reward_detail_list'],$this->_data['request'],'worker_reward_detail.php'); ?>


//关闭侧拉
$('.doc-oc-js').on('click', function() {
  $('#uoffcanvas').offCanvas($(this).data('rel'));
});

//侧拉打开
$('.coffopen').on('click',function() {
  var url = "card_record_detail_ajax.php";
  $('#uoffcanvas .crefundopen').val($(this).attr('card_record_id'));
  $.getJSON(url,{card_record_id:$(this).attr('card_record_id')},function(res){
    // console.log(res);
    $("#uoffcanvas .ccard_record_atime").text(res.card_record_atime);
    $("#uoffcanvas .ccard_record_code").text(res.card_record_code);
    $("#uoffcanvas .ccard_type_name").text(res.c_card_type_name);
    $("#uoffcanvas .ccard_type_discount").text(res.c_card_type_discount);
    $("#uoffcanvas .ccard_name").text(res.c_card_name);
    $("#uoffcanvas .ccard_code").text(res.c_card_code);
    $("#uoffcanvas .ccard_record_smoney").text(res.card_record_smoney);
    $("#uoffcanvas .ccard_record_jmoney").text(res.card_record_jmoney);
    $("#uoffcanvas .cuser_name").text(res.c_user_name);
    switch(res.card_record_type)
    {
      case '1':
        $("#uoffcanvas .ccard_record_type").text('充值');
        break;
      case '2':
        $("#uoffcanvas .ccard_record_type").text('买套餐');
        break;
      case '3':
        $("#uoffcanvas .ccard_record_type").text('消费');
        break;
      default :
        $("#uoffcanvas .ccard_record_type").text('');
    }
    switch(res.card_record_pay)
    {
      case '1':
        $("#uoffcanvas .ccard_record_pay").text('现金');
        break;
      case '2':
        $("#uoffcanvas .ccard_record_pay").text('银行卡');
        break;
      case '3':
        $("#uoffcanvas .ccard_record_pay").text('微信');
        break;
      case '4':
        $("#uoffcanvas .ccard_record_pay").text('支付宝');
        break;
      case '5':
        $("#uoffcanvas .ccard_record_pay").text('卡扣');
        break;
      default :
        $("#uoffcanvas .ccard_record_pay").text('');
    }
    switch(res.card_record_state)
    {
      case '4':
        $("#uoffcanvas .ccard_record_state").text('免单');
        break;
      default :
        $("#uoffcanvas .ccard_record_state").text('--');
    }
    if(res.goods_list != undefined && res.goods_list.length != 0){
      var goods_head = '<p class="cjs"><strong>商品消费清单</strong></p>';
      var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>编号</td><td>名称</td><td>单价</td><td>数量</td><td>金额</td><td>折后价</td></tr></thead>';
      var table_body = '';
      $.each(res.goods_list,function(k,v){
        if(v.mgoods_id!=0){
          table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_mgoods_name+'</td><td>'+v.c_mgoods_price+'元</td><td>'+v.card_record3_goods_count+'</td><td>'+v.c_mgoods_rprice*v.card_record3_goods_count+'</td><td>'+v.c_mgoods_rprice+'</td></tr>';
        }
        if(v.sgoods_id!=0){
          table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_sgoods_name+'</td><td>'+v.c_sgoods_price+'元</td><td>'+v.card_record3_goods_count+'</td><td>'+v.c_sgoods_rprice*v.card_record3_goods_count+'</td><td>'+v.c_sgoods_rprice+'</td></tr>';
        }
      });
      var table_bottom = '</table>';
      $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
    }
    // 买套餐商品
    if(res.mcombo_goods_list != undefined && res.mcombo_goods_list.length != 0){
      var goods_head = '<p class="cjs"><strong>套餐商品清单</strong></p>';
      var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>编号</td><td>名称</td><td>原单价</td><td>数量</td><td>总金额</td><td>折后价</td></tr></thead>';
      var table_body = '';
      $.each(res.mcombo_goods_list,function(k,v){
          table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_mgoods_name+'</td><td>'+v.c_mgoods_price+'元</td><td>'+v.card_record2_mcombo_gcount+'</td><td>'+v.c_mgoods_price*v.card_record2_mcombo_gcount+'</td><td>'+v.c_mgoods_cprice+'</td></tr>';
      });
      var table_bottom = '</table>';
      $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
    }
    // 消费套餐商品
    if(res.mcombo_goods_list2 != undefined && res.mcombo_goods_list2.length != 0){
      var goods_head = '<p class="cjs"><strong>消费套餐商品清单</strong></p>';
      var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>编号</td><td>名称</td><td>原单价</td><td>数量</td><td>金额</td><td>会员价</td></tr></thead>';
      var table_body = '';
      $.each(res.mcombo_goods_list2,function(k,v){
          table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_mgoods_name+'</td><td>'+v.c_mgoods_price+'元</td><td>'+v.card_record3_mgoods_count+'</td><td>'+v.c_mgoods_price*v.card_record3_mgoods_count+'</td><td>'+v.c_mgoods_cprice+'</td></tr>';
      });
      var table_bottom = '</table>';
      $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
    }
  });
  $('#uoffcanvas').offCanvas('open');
});
//侧拉关闭删除商品信息
$('#uoffcanvas').on('close.offcanvas.amui', function() {
  $('#uoffcanvas').find('.cjs').remove();
});
</script>
</body>
</html>
