<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ugoods_stock">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">多店通用商品库存</a></li>
    <li><a href="goods_stock_special.php">单店销售商品库存</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform">
      <div class="am-form-group">
        分店：
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">所有分店</option>
          <option value="2">长春路店</option>
          <option value="3">梧桐街店</option>
        </select>
      </div>
      <div class="am-form-group">
        商品分类：
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">所有分类</option>
          <option value="2">营养品</option>
          <option value="3">保健品</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="商品名称/简拼/编码" name="">
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
        <td>分类</td>
        <td>商品名称</td>
        <td>编码</td>
        <td>价格</td>
        <td>会员价</td>
        <td>库存</td>
        <td>分店</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>洗发水</td>
        <td>飘柔洗发水</td>
        <td>00001</td>
        <td>40元</td>
        <td>35元</td>
        <td>100瓶</td>
        <td>店铺a</td>
      </tr>
      <tr>
        <td>洗发水</td>
        <td>飘柔洗发水</td>
        <td>00001</td>
        <td>40元</td>
        <td>35元</td>
        <td>100瓶</td>
        <td>店铺a</td>
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