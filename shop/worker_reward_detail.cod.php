<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uworker_reward_detail">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">员工提成明细</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" id="form1" action="worker_reward_detail.php" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
          <option <?php if($row['shop_id'] == $this->_data['shop_id']){echo "selected";} ?> value="<?php echo $row['shop_id'] ?>"><?php echo $row['shop_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="date_from" value="<?php if($this->_data['date_from'] != 0){echo $this->_data['date_from'];} ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="date_to" value="<?php if($this->_data['date_from'] != 0){echo $this->_data['date_to']; }?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">员工：</label>
        <input type="text" class="am-form-field uinput uinput-220" name="worker_name" <?php if($this->_data['worker_name'] != ''){echo 'value ='.$this->_data['worker_name'];}else{echo 'placeholder = "姓名"';} ?> >
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch_form1">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace15"></div>
    <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>消费明细</td>
        <td>时间</td>
        <td>员工</td>
        <td>类型</td>
        <td>会员卡号</td>
        <td>会员姓名</td>
        <td>手机号</td>
        <td>内容</td>
        <td>提成</td>
        <td>分店</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['worker_reward_detail_list']['list'] as $row) { ?>
      <tr>
        <td><a href="#">1</a></td>
        <td><?php echo date('Y-m-d H:i:s',$row['worker_reward_atime']); ?></td>
        <td><?php echo $row['c_worker_name']; ?></td>
        <td><?php echo $row['worker_reward_type1']; ?></td>
        <td><?php echo $row['c_card_code']; ?></td>
        <td><?php echo $row['c_card_name']; ?></td>
        <td><?php echo $row['c_card_phone']; ?></td>
        <td>办理vip卡</td>
        <td  class="gtext-orange"><?php echo $row['worker_reward_money']; ?>元</td>
        <td><?php echo $row['shop_name']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['worker_reward_detail_list']['pagecount']; ?>页 <?php echo $this->_data['worker_reward_detail_list']['allcount']; ?>条记录</li>
    <li><a href="worker_reword_detail.php?page=<?php echo $this->_data['worker_reward_detail_list']['pagepre']; ?>">&laquo;</a></li>
    <li class="am-active" ><a href="#"><?php echo $GLOBALS['intpage'];?></a></li>
    <li><a href="worker_reward_detail.php?page=<?php echo  $this->_data['worker_reward_detail_list']['pagenext']; ?>">&raquo;</a></li>
  </ul>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
//工具栏搜索按钮
$('.csearch-form1').on('click',function(){
  $("#form1").submit();
});
</script>
</body>
</html>
