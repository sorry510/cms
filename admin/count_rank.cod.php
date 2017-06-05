<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucount_rank">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="count.php">统计数据表</a></li>
    <li class="am-active"><a href="javascript:void(0)">商品销售排名</a></li>
    <li><a href="count_business.php">营业数据曲线</a></li>
    <li><a href="count_income.php">收入组成曲线</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform">
      <div class="am-form-group">
        请选择店铺：
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">店铺A</option>
          <option value="3">店铺B</option>
        </select>
      </div>
      <div class="am-form-group">
        商品类型：
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">通用型商品</option>
          <option value="3">店铺型商品</option>
        </select>
      </div>
      <div class="am-form-group">
        查询范围：从
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format:'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
        至
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format:'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        排名方式：
        <select class="uselect" data-am-selected name="">
          <option value="2">销售量</option>
          <option value="3">销售额</option>
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
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>商品编码</td>
        <td>商品名称</td>
        <td>商品价格</td>
        <td>会员价格</td>
        <td>销售数量</td>
        <td>销售金额</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>0000001</td>
        <td>霸王洗发露</td>
        <td>60元</td>
        <td>54元</td>
        <td>20瓶</td>
        <td>1054元</td>
      </tr>
      <tr>
        <td>0000001</td>
        <td>霸王洗发露</td>
        <td>60元</td>
        <td>54元</td>
        <td>20瓶</td>
        <td>1054元</td>
      </tr>
      <tr>
        <td>0000001</td>
        <td>霸王洗发露</td>
        <td>60元</td>
        <td>54元</td>
        <td>20瓶</td>
        <td>1054元</td>
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