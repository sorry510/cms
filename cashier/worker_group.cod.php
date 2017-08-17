<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uworker_group">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="worker_manage.php">员工管理</a></li>
    <li class="am-active"><a href="javascript: void(0);">员工分组</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>分组名称</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['worker_group_list'] as $row) { ?>
      <tr>
        <td><?php echo $row['worker_group_name']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="gspace20"></div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
</body>
</html>