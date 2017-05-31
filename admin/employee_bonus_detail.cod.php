<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uemployee_bonus_detail">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">员工提成明细</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">员工：</label>
        <input type="text" class="am-form-field uinput uinput140" placeholder="姓名" name="">
      </div>
      <div class="am-form-group">
        日期：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至： 
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>   
      </div>
      <div class="am-form-group">
        分店：
        <select class="uselect" data-am-selected name="">
          <option value="all">请选择</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace30"></div>
    <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>时间</td>
        <td>员工</td>
        <td>类型</td>
        <td>会员卡号</td>
        <td>内容</td>
        <td>金额</td>
        <td>提成</td>
        <td>分店</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-04-03 12:30:10</td>
        <td>李四</td>
        <td>办卡</td>
        <td>A12234</td>
        <td>办理vip卡</td>
        <td>10000</td>
        <td>1000</td>
        <td>南大街13号老店</td>
      </tr>
      <tr>
        <td>2017-04-03 12:30:10</td>
        <td>张三</td>
        <td>服务</td>
        <td>A12234</td>
        <td>烫发</td>
        <td>2000</td>
        <td>30</td>
        <td>南大街14号老店</td>
      </tr>
      <tr>
        <td>2017-04-03 12:30:10</td>
        <td>小明</td>
        <td>商品</td>
        <td>A12234</td>
        <td>购买面膜100张</td>
        <td>1000</td>
        <td>400</td>
        <td>南大街8号老店</td>
      </tr>
      <tr>
        <td>2017-04-03 12:30:10</td>
        <td>小王</td>
        <td>导购</td>
        <td>A12234</td>
        <td>购买和田玉一块</td>
        <td>8888</td>
        <td>888</td>
        <td>南大街88号老店</td>
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
