<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ustore_info_mgoods">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">多店通用商品库存</a></li>
    <li><a href="store_info_sgoods.php">单店销售商品库存</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform" id="form1" method="get">
      <div class="am-form-group">
        商品分类：
        <select class="uselect uselect-auto" data-am-selected name="mgoods_catalog_id">
          <option value="0">所有分类</option>
          <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
          <option value="<?php echo $row['mgoods_catalog_id'] ?>" <?php if($row['mgoods_catalog_id'] == $this->_data['request']['mgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['mgoods_catalog_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-220" name="search" value="<?php echo $this->_data['request']['search'];?>" placeholder="商品名称/简拼/编码">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch-form1">
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
    <?php foreach($this->_data['store_info_mgoods_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo $row['mgoods_catalog_name']; ?></td>
        <td><?php echo $row['mgoods_name']; ?></td>
        <td><?php echo $row['mgoods_code']; ?></td>
        <td><?php echo $row['mgoods_price']; ?>元</td>
        <td><?php echo $row['mgoods_cprice']; ?>元</td>
        <td><?php echo $row['store_info_count']; ?>件</td>
        <td><?php echo $row['shop_name']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['store_info_mgoods_list'],$this->_data['request'],'store_info_mgoods.php');?>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
 <?php pageJs($this->_data['store_info_mgoods_list'],$this->_data['request'],'store_info_mgoods.php');?>
</script>
</body>
</html>