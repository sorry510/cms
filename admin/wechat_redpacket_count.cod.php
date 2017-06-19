<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="umarketing_coupon" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">微信红包放统计</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform1">
      <div class="am-form-group">
        <label class="am-form-label">红包类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">限时打折</option>
          <option value="2">满减活动</option>
          <option value="3">满送活动</option>
          <option value="3">赠送优惠券</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">活动时间：</label> 
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
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>类型</td>
        <td>总金额(元)</td>
        <td>总人数</td>
        <td>红包金额</td>
        <td>祝福语</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>发放总数量</td>
        <td>已使用</td>
        <td>未使用</td>
        <td>活动状态</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-04-18</td>
        <td>端午活动</td>
        <td>关注红包</td>
        <td>1000</td>
        <td>10</td>
        <td>0.1~2</td>
        <td>恭喜发财</td>
        <td>2017-06-18</td>
        <td>2017-06-19</td>
        <td>5000</td>
        <td>3720</td>
        <td>1280</td>
        <td>已结束</td>
      </tr>
    </tbody>
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
