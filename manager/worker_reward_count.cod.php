<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uworker_reward_detail">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">员工提成统计</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">请选择</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">员工：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="姓名" name="">
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
        <td rowspan="2">排名</td>
        <td rowspan="2">员工姓名</td>
        <td rowspan="2">分组</td>
        <td colspan="2">办卡</td>
        <td colspan="2">充值</td>
        <td colspan="3">服务</td>
        <td colspan="3">商品</td>
        <td rowspan="2">导购提成</td>
        <td rowspan="2">基本工资</td>
        <td rowspan="2">合计工资</td>
        <td rowspan="2">分店</td>
      </tr>
      <tr>
        <td>数量</td>
        <td>提成</td>
        <td>金额</td>
        <td>提成</td>
        <td>金额</td>
        <td>次数</td>
        <td>提成</td>
        <td>金额</td>
        <td>数量</td>
        <td>提成</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>李四</td>
        <td>理疗师</td>
        <td>25</td>
        <td>250元</td>
        <td>10000元</td>
        <td>1025元</td>
        <td>10250元</td>
        <td>30</td>
        <td>1025元</td>
        <td>1025元</td>
        <td>50</td>
        <td>500元</td>
        <td>1500元</td>
        <td>1200元</td>
        <td><span class="gtext-orange">4500</span>元</td>
        <td>南大街11号当铺</td>
      </tr>
       <tr>
        <td>2</td>
        <td>小明</td>
        <td>理疗师</td>
        <td>25</td>
        <td>250元</td>
        <td>10000元</td>
        <td>1025元</td>
        <td>10250元</td>
        <td>30</td>
        <td>1025元</td>
        <td>1025元</td>
        <td>50</td>
        <td>500元</td>
        <td>1500元</td>
        <td>1200元</td>
        <td><span class="gtext-orange">7000</span>元</td>
        <td>南大街11号当铺</td>
      </tr>
      <tr>
        <td>3</td>
        <td>李无</td>
        <td>理疗师</td>
        <td>25</td>
        <td>250元</td>
        <td>10000元</td>
        <td>1025元</td>
        <td>10250元</td>
        <td>30</td>
        <td>1025元</td>
        <td>1025元</td>
        <td>50</td>
        <td>500元</td>
        <td>1500元</td>
        <td>1200元</td>
        <td><span class="gtext-orange">4500</span>元</td>
        <td>南大街11号当铺</td>
      </tr>
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共1页 5条记录</li>
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
