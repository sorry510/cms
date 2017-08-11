<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="umarketing_coupon" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">优惠券发放统计</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform1">
      <div class="am-form-group">
        <label class="am-form-label">活动类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="act_type">
          <option value="0">全部活动</option>
          <option value="1">满送活动</option>
          <option value="2">赠送优惠券</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">优惠券类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="ttype">
          <option value="0">不限</option>
          <option value="1">代金券</option>
          <option value="2">体验券</option>
        </select>
      </div>
       <div class="am-form-group">
        <label class="am-form-label">日期：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">至：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>       
    </form>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>活动类型</td>
        <td>优惠券类型</td>
        <td>优惠券名称</td>
        <td>可用开始时间</td>
        <td>有效期</td>
        <td>发放总数量</td>
        <td>已使用</td>
        <td>未使用</td>
        <td>销售金额</td>
      </tr>
    </thead>
    <?php foreach($this->_data['act_give_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i',$row['act_atime']); ?></td>
        <td><?php echo $row['act_name']; ?></td>
        <td><?php echo $row['act_type']; ?></td>
        <td><?php echo $row['ttype']; ?></td>
        <td><?php echo $row['c_ticket_name']; ?></td>
        <td><?php echo $row['begin']; ?></td>
        <td><?php echo $row['c_ticket_days']; ?></td>
        <td><?php echo $row['act_relate_aticket']; ?></td>
        <td><?php echo $row['act_relate_uticket']; ?></td>
        <td><?php echo $row['act_relate_aticket']-$row['act_relate_uticket']; ?></td>
        <td><?php echo $row['act_relate_smoney']; ?></td>
      </tr>
    <?php } ?> 
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['act_give_list']['pagecount']; ?>页 <?php echo $this->_data['act_give_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="act_give.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_give_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['act_give_list']['pagenow'];?></a></li>
    <li class="clast"><a href="act_give.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_give_list']['pagenext']); ?>">&raquo;</a></li>
    <li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
//分页首末页不可选中
if(<?php echo $this->_data['act_give_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['act_give_list']['pagecount']-$this->_data['act_give_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "act_give.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}
</script>

</body>
</html>
