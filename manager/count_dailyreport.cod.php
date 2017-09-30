<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="count_dailyreport">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">营收日报表</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform">
      <div class="am-form-group">
        分店：
        <select class="uselect" data-am-selected name="">
          <option value="all">全部店铺</option>
          <option value="2">店铺a</option>
          <option value="3">店铺b</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">范围：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format:'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
                <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format:'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>(最多90天)
    </form>
  </div>
  <div class="gspace15"></div>
  <div class="ua">
    <table class="am-table am-table-bordered am-table-hover am-table-compact utable1 ua1">
      <thead>
        <tr>
          <td>日期</td>
          <td>现金收入</td>
          <td>pos刷卡</td>
          <td>团购</td>
          <td>支付宝</td>
          <td>微信</td>
          <td>退款</td>
          <td>会员卡扣</td>
          <td>会员小计</td>
          <td>散客小计</td>
          <td>合计</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>合计</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
        </tr>
        <tr>
          <td>2017-5-10</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
        </tr>
        <tr>
          <td>2017-5-18</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
          <td>--</td>
        </tr>
      </tbody>
    </table>
    <table class="am-table am-table-bordered am-table-hover am-table-compact utable1 ua2">
      <thead>
        <tr>
          <td>排名</td>
          <td>店铺</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>店铺A</td>
        </tr>
        <tr>
          <td>2</td>
          <td>店铺B</td>
        </tr>
        <tr>
          <td>3</td>
          <td>店铺C</td>
        </tr>
      </tbody>
    </table>
  </div>
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