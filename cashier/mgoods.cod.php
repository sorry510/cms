<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="umgoods" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">多店通用商品</a></li>
    <li><a href="mgoods_catalog.php">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" if="form1" action="mgoods.php" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">商品分类：</label>
        <select class="uselect uselect-auto" data-am-selected name="mgoods_catalog_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
          <option value="<?php echo $row['mgoods_catalog_id'] ?>" <?php if($row['mgoods_catalog_id'] == $this->_data['request']['mgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['mgoods_catalog_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="search" value="<?php echo $this->_data['request']['search'];?>" placeholder="商品名称/简拼/编码">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search uadd-form1">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>商品分类</td>
        <td>商品名称</td>
        <td>商品编码</td>
        <td>商品价格</td>
        <td>会员价格</td>
        <td>参与库存</td>
        <td>参加活动</td>
        <td>参与预约</td>
        <td>状态</td>
      </tr>
    </thead>  
    <?php foreach($this->_data['mgoods_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['mgoods_catalog_name']; ?></td>
      <td><?php echo $row['mgoods_name']; ?></td>
      <td><?php echo $row['mgoods_code']; ?></td>
      <td><?php echo $row['mgoods_price']; ?></td>
      <td><?php echo $row['mgoods_cprice']==0?'--':$row['mgoods_cprice']; ?></td>
      <td class="<?php echo $row['mgoods_type']==2?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_type']==2?'√':'x';?></td>
      <td class="<?php echo $row['mgoods_act']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_act']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['mgoods_reserve']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_reserve']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['mgoods_state']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_state']=='1'?'正常':'停用';?></td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['mgoods_list'],$this->_data['request'],'mgoods.php');?>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
<?php pageJs($this->_data['mgoods_list'],$this->_data['request'],'mgoods.php');?>
</script>
</body>
</html>
