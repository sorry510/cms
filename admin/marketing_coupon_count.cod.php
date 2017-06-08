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
        <label class="am-form-label">活动名称：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-form-group">
        <label class="am-form-label">活动类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">限时打折</option>
          <option value="2">满减活动</option>
          <option value="3">满送活动</option>
          <option value="3">赠送优惠券</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">优惠券类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">名称1</option>
          <option value="2">名称2</option>
          <option value="3">名称3</option>
        </select>
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
        <td>时间</td>
        <td>活动名称</td>
        <td>活动类型</td>
        <td>优惠券类型</td>
        <td>优惠券名称</td>
        <td>发放总数量</td>
        <td>已使用</td>
        <td>未使用</td>
        <td>销售金额</td>
      </tr>
    </thead>
    <tr>
      <td>2016-12-18</td>
      <td>五一满50送50</td>
      <td>满送</td>
      <td>代金券</td>
      <td>20元代金券</td>
      <td>500</td>
      <td>128</td>
      <td>372</td>
      <td>25189</td>
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

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>

</body>
</html>
