<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="usgoods" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">单店销售商品</a></li>
    <li><a href="sgoods_catalog.php">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" if="form1">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
            <option value="<?php echo $row['shop_id']; ?>" <?php if($row['shop_id'] == $this->_data['request']['shop_id']){
            echo "selected" ;}?> ><?php echo $row['shop_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">商品分类：</label>
        <select class="uselect uselect-auto" data-am-selected name="sgoods_catalog_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
            <option value="<?php echo $row['sgoods_catalog_id']; ?>" <?php if($row['sgoods_catalog_id'] == $this->_data['request']['sgoods_catalog_id']){
            echo "selected" ;}?> ><?php echo $row['sgoods_catalog_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" value="<?php echo $this->_data['request']['search']; ?>" name="search" placeholder="商品名称/简拼/编码">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
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
        <td>分店</td>
        <td>状态</td>
      </tr>
    </thead>  
    <?php foreach($this->_data['sgoods_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['sgoods_catalog_name']; ?></td>
      <td><?php echo $row['sgoods_name']; ?></td>
      <td><?php echo $row['sgoods_code']; ?></td>
      <td><?php echo $row['sgoods_price']; ?>元</td>
      <td><?php echo $row['sgoods_cprice']==0?'--':$row['sgoods_cprice']; ?></td>
      <td class="<?php echo $row['sgoods_type']=='2'?'gtext-green':'gtext-orange';?>"><?php echo $row['sgoods_type']=='2'?'√':'x';?></td>
      <td><?php echo $row['shop_name']; ?></td>
      <td class="<?php echo $row['sgoods_state']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['sgoods_state']=='1'?'正常':'停用';?></td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['sgoods_list'],$this->_data['request'],'sgoods.php');?>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
<?php pageJs($this->_data['sgoods_list'],$this->_data['request'],'sgoods.php');?>
</script>
</body>
</html>
