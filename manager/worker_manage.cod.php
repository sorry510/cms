<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="uworker_manage" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工管理</a></li>
    <li><a href="worker_group.php">员工分组</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" id="form1" action="worker_manage.php" method="get">
      <div class="am-form-group">
        <label class="am-form-label">分店：</label> 
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
          <option value="<?php echo $row['shop_id'];?>"  <?php if($row['shop_id'] == $this->_data['shop_id']){echo "selected";} ?> ><?php echo $row['shop_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">员工分组：</label> 
        <select class="uselect uselect-auto" data-am-selected name="worker_group_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['worker_group_list'] as $row) { ?>
          <option value="<?php echo $row['worker_group_id']; ?>"  <?php if($row['worker_group_id'] == $this->_data['worker_group_id']){echo "selected";} ?> ><?php echo $row['worker_group_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">姓名：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="strsearch" value="<?php echo $this->_data['strsearch']; ?>">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch_form1">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>       
    </form> 
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分店</td>
        <td>员工分组</td>
        <td>员工姓名</td>
        <td>员工编号</td>
        <td>性别</td>
        <td>出生日期</td>
        <td>手机号码</td>
        <td>学历</td>
        <td>入职时间</td>
        <td>基本工资</td>
        <td>参与预约</td>
        <td>导购提成</td>
      </tr>
    </thead>
    <?php foreach($this->_data['worker_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['shop_name']; ?></td>
      <td><?php echo $row['worker_group_name']; ?></td>
      <td><a data-am-offcanvas="{target: '#uoffcanvas'}" href="#" class="cworker_info" value="1"><?php echo $row['worker_name']; ?></a><input type="hidden" name="worker_id" value="<?php echo $row['worker_id']; ?>"></td>
      <td><?php echo $row['worker_code']; ?></td>
      <td><?php echo $row['worker_sex']=='3'?'保密':($row['worker_sex']=='1'?'男':'女');?></td>
      <td><?php echo date('Y年m月d日', $row['worker_birthday']); ?></td>
      <td><?php echo $row['worker_phone']; ?></td>
      <td><?php echo $row['worker_education']; ?></td>
      <td><?php echo date('Y年m月d日', $row['worker_join']); ?></td>
      <td><?php echo $row['worker_wage']; ?>元</td>
      <td class="<?php echo $row['worker_config_guide']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['worker_config_guide']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['worker_config_reserve']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['worker_config_reserve']=='1'?'√':'x'; ?></td>
    </tr>
    <?php } ?>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['worker_list']['pagecount']; ?>页 <?php echo $this->_data['worker_list']['allcount']; ?>条记录</li>
    <li><a href="worker.php?page=<?php echo $this->_data['worker_list']['pagepre']; ?>">&laquo;</a></li>
    <li class="am-active" ><a href="#"><?php echo $GLOBALS['intpage'];?></a></li>
    <li><a href="worker.php?page=<?php echo  $this->_data['worker_list']['pagenext']; ?>">&raquo;</a></li>
  </ul>
</div>

<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas" >
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas" style="width: 690px;">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">员工详细信息</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">　　分店：<span name="shop_name"></span></div>
        <div class="am-u-lg-6">员工分组：<span name="worker_group_name"></span></div>
        <div class="am-u-lg-6">员工姓名：<span name="worker_name"></span></div>
        <div class="am-u-lg-6">员工编号：<span name="worker_code"></span></div>
        <div class="am-u-lg-6">　　性别：<span name="worker_sex"></div>
        <div class="am-u-lg-6">出生日期：<span name="worker_birthday"></span></div>
        <div class="am-u-lg-6">手机号码：<span name="worker_phone"></span></div>
        <div class="am-u-lg-6">身份证号：<span name="worker_identity"></span></div>
        <div class="am-u-lg-6">最高学历：<span name="worker_education"></span></div>
        <div class="am-u-lg-6">入职时间：<span name="worker_join"></span></div>
        <div class="am-u-lg-6">居信住址：<span name="worker_address"></span></div>
        <div class="am-u-lg-6">基本工资：<span name="worker_wage"></span></div>
        <div class="am-u-lg-6">参与预约：<span name="worker_config_reserve"></span></div>
        <div class="am-u-lg-6">导购提成：<span name="worker_config_guide"></span></div>
        <div class="am-u-lg-12">工作内容：<span>理疗，理发，洗头</span></div>
        <div class="am-u-lg-12 gspace15"></div>
        <label class="am-u-lg-6">照片</label>
        <label class="am-u-lg-6">身份证</label>
        <div class="am-u-lg-6"><img src="../img/wu.jpg"></div>
        <div class="am-u-lg-6"><img src="../img/wu.jpg"></div>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
//工具栏搜索按钮
$('.csearch-form1').on('click',function(){
  $("#form1").submit();
});
/*右侧弹出框关闭按钮JS*/
$(function() {
  var id = '#uoffcanvas';
  var $myOc = $(id);
  $('.doc-oc-js').on('click', function() {
    $myOc.offCanvas($(this).data('rel'));
  });
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        $(this.relatedTarget).parent('td').parent('tr').remove();
      },
      onCancel: function() {
        return;
      }
    });
  });
});
//会员详细信息
$('.cworker_info').on('click', function(e) {
  var worker_id = $(this).next().val();
  $.ajax({
    type: "GET",
    url: "worker_info_ajax.php",
    data: {worker_id:worker_id}, 
    dataType:'json',
    success: function(msg){
    console.log(msg);
      $("#uoffcanvas span[name='shop_name']").text(msg.shop_name);
      $("#uoffcanvas span[name='worker_group_name']").text(msg.worker_group_name);
      $("#uoffcanvas span[name='worker_name']").text(msg.worker_name);
      $("#uoffcanvas span[name='worker_code']").text(msg.worker_code);
      $("#uoffcanvas span[name='worker_sex']").text(msg.worker_sex1);
      $("#uoffcanvas span[name='worker_birthday']").text(msg.worker_birthday1);
      $("#uoffcanvas span[name='worker_phone']").text(msg.worker_phone);
      $("#uoffcanvas span[name='worker_identity']").text(msg.worker_identity);
      $("#uoffcanvas span[name='worker_education']").text(msg.worker_education1);
      $("#uoffcanvas span[name='worker_join']").text(msg.worker_join1);
      $("#uoffcanvas span[name='worker_address']").text(msg.worker_address);
      $("#uoffcanvas span[name='worker_wage']").text(msg.worker_wage);
      $("#uoffcanvas span[name='worker_config_reserve']").text(msg.worker_config_reserve1);
      $("#uoffcanvas span[name='worker_config_guide']").text(msg.worker_config_guide1);
    }
  });
});
</script>
</body>
</html>
