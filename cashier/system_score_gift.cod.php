<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="system_score_gift">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="system_score.php">积分换礼</a></li>
    <li  class="am-active"><a href="javascript: void(0);">礼品设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <input type="text" class="am-form-field uinput uinput-220" placeholder="礼品名称" name="gift_name" value="<?php echo $this->_data['request']['gift_name']?>">
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
        <td>名称</td>
        <td>积分</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['gift_list']['list'] as $row){?>
      <tr>
        <td><?php echo $row['gift_name'];?></td>
        <td><?php echo $row['gift_score'];?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['gift_list'],$this->_data['request'],'system_score_gift.php');?>
</div>

<!-- 删除按钮弹出框 -->
<div id="cconfirm" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你，确定要删除这条记录吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['gift_list'],$this->_data['request'],'system_score_gift.php');?>
</script>
</body>
</html>
