<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="umcombo_time" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">计时卡套餐</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" if="form1" action="mcombo_time.php" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">套餐名称：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="" value="<?php echo $this->_data['request']['mcombo_time_name']?>" name="mcombo_time_name">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search uadd-form1">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1 utable1-fixed" id="doc-modal-list">
    <thead>
      <tr>
        <td width="15%">套餐名称</td>
        <td>编码</td>
        <td>价格</td>
        <td>会员价格</td>
        <td>有效期</td>
        <td>参与活动</td>
        <td>状态</td>
      </tr>
    </thead>
    <?php foreach($this->_data['mcombo_time_list']['list'] as $row) { ?>
    <tr>
      <td class="gtext-overflow" title="<?php echo $row['mcombo_name']; ?>"><a href="#" class="coffopen" mcombo_id="<?php echo $row['mcombo_id'];?>"><?php echo $row['mcombo_name']; ?></a></td>
      <td><?php echo $row['mcombo_code']; ?></td>
      <td class="gtext-orange"><?php echo $row['mcombo_price']; ?></td>
      <td class="gtext-orange"><?php echo $row['mcombo_cprice']==0?'--':$row['mcombo_cprice']; ?></td>
      <td class="gtext-green"><?php echo $row['mcombo_limit_type'] == '2'?$row['mcombo_limit_days'].'天':($row['mcombo_limit_type'] == '3'?$row['mcombo_limit_months'].'个月':'不限期') ?></td>
      <td class="<?php echo $row['mcombo_act']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mcombo_act']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['mcombo_state']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mcombo_state']=='1'?'正常':'停用';?></td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['mcombo_time_list'],$this->_data['request'],'mcombo_time.php');?>
</div>
<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">套餐明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">套餐名称：<span class="cmcombo_name"></span></div>
        <div class="am-u-lg-6">套餐编码：<span class="cmcombo_code"></span></div>
        <div class="am-u-lg-6">价格：<span class="cmcombo_price"></span></div>
        <div class="am-u-lg-6">会员价：<span class="cmcombo_cprice"></span></div>
        <div class="am-u-lg-6">有效期：<span class="cmcombo_edate"></div>
        <div class="am-u-lg-6">参与活动：<span class="cmcombo_act"></div>
        <div class="am-u-lg-6">状态：<span class="cmcombo_state"></span></div>
        <div class="am-u-lg-6">&nbsp;</div>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['mcombo_time_list'],$this->_data['request'],'mcombo_time.php');?>
//侧拉打开
$('.coffopen').on('click',function() {
  var url = "mcombo_detail_ajax.php";
  $('#uoffcanvas .crefundopen').val($(this).attr('mcombo_id'));
  $.getJSON(url,{mcombo_id:$(this).attr('mcombo_id')},function(res){
    console.log(res);
    $("#uoffcanvas .cmcombo_name").text(res.mcombo_name);
    $("#uoffcanvas .cmcombo_code").text(res.mcombo_code);
    $("#uoffcanvas .cmcombo_price").text(res.mcombo_price);
    if(res.mcombo_cprice!=0){
      $("#uoffcanvas .cmcombo_cprice").text(res.mcombo_cprice);
    }else{
      $("#uoffcanvas .cmcombo_cprice").text('--');
    }
    switch(res.mcombo_limit_type)
    {
      case '1':
        $("#uoffcanvas .cmcombo_edate").text('不限期');
        break;
      case '2':
        $("#uoffcanvas .cmcombo_edate").text(res.mcombo_limit_days+'天');
        break;
      case '3':
        $("#uoffcanvas .cmcombo_edate").text(res.mcombo_limit_months+'个月');
        break;
      default :
        $("#uoffcanvas .cmcombo_edate").text('--');
    }
    switch(res.mcombo_act)
    {
      case '1':
        $("#uoffcanvas .cmcombo_act").text('参与');
        break;
      case '2':
        $("#uoffcanvas .cmcombo_act").text('不参与');
        break;
      default :
        $("#uoffcanvas .cmcombo_act").text('--');
    }
    switch(res.mcombo_state)
    {
      case '1':
        $("#uoffcanvas .cmcombo_state").text('正常');
        break;
      case '2':
        $("#uoffcanvas .cmcombo_state").text('停用');
        break;
      default :
        $("#uoffcanvas .cmcombo_state").text('--');
    }
    // 买套餐商品
    if(res.mgoods){
      var goods_head = '<p class="cjs"><strong>套餐商品清单</strong></p>';
      var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>序号</td><td>名称</td><td>原价</td></thead>';
      var table_body = '';
      $.each(res.mgoods,function(k,v){
          table_body = table_body+'<tr><td>'+(k+1)+'</td><td>'+v.mgoods_name+'</td><td>'+v.mgoods_price+'元</td></tr>';
      });
      var table_bottom = '</table>';
      $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
    }
  });
  $('#uoffcanvas').offCanvas('open');
});
//关闭侧拉
$('.doc-oc-js').on('click', function() {
  $('#uoffcanvas').offCanvas($(this).data('rel'));
});
//侧拉关闭删除商品信息
$('#uoffcanvas').on('close.offcanvas.amui', function() {
  $('#uoffcanvas').find('.cjs').remove();
})
</script>
</body>
</html>
