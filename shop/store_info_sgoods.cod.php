<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ustore_info_sgoods">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="store_info_mgoods.php">多店通用商品库存</a></li>
    <li class="am-active"><a href="javascript:void(0)">单店销售商品库存</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform">
      <div class="am-form-group">
        商品分类：
        <select class="uselect uselect-auto" data-am-selected name="sgoods_catalog_id">
          <option value="0">所有分类</option>
          <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
          <option value="<?php echo $row['sgoods_catalog_id'] ?>" <?php if($row['sgoods_catalog_id'] == $this->_data['request']['sgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['sgoods_catalog_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-220" name="search" value="<?php echo $this->_data['request']['search'];?>" placeholder="商品名称/简拼/编码" name="">
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
    <?php foreach($this->_data['store_info_sgoods_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo $row['sgoods_catalog_name']; ?></td>
        <td><?php echo $row['sgoods_name']; ?></td>
        <td><?php echo $row['sgoods_code']; ?></td>
        <td><?php echo $row['sgoods_price']; ?>元</td>
        <td><?php echo $row['sgoods_cprice']; ?>元</td>
        <td><?php echo $row['store_info_count']; ?>件</td>
        <td><?php echo $row['shop_name']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['store_info_sgoods_list'],$this->_data['request'],'store_info_sgoods.php');?>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
 <?php pageJs($this->_data['store_info_sgoods_list'],$this->_data['request'],'store_info_sgoods.php');?>
</script>
</body>
</html>