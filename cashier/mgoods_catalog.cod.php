<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="umgoods_catalog" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="mgoods.php">多店通用商品</a></li>
    <li class="am-active"><a href="#">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
      <td>分类名称</td>
    </tr>
    </thead>
    <?php foreach($this->_data['mgoods_catalog_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['mgoods_catalog_name']; ?></td>
    </tr> 
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['mgoods_catalog_list'],$this->_data['request'],'mgoods_catalog.php');?>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
<?php pageJs($this->_data['mgoods_catalog_list'],$this->_data['request'],'mgoods_catalog.php');?>
</script>
</body>
</html>