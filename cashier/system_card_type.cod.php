<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ucard" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">会员卡分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>分类名称</td>
        <td>卡折扣</td>
        <td>描述</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['card_type_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo $row['card_type_name'] ?></td>
        <td><?php echo $row['card_type_discount'] ?></td>
        <td><?php echo $row['card_type_info'] ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
 <?php pageHtml($this->_data['card_type_list'],$this->_data['request'],'system_card_type.php');?>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['card_type_list'],$this->_data['request'],'system_card_type.php');?>
</script>
</body>
</html>