<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uworker_reward_count">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">员工提成统计</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" id="form1">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
          <option <?php if($row['shop_id'] == $this->_data['request']['shop_id']){echo "selected";} ?> value="<?php echo $row['shop_id'] ?>"><?php echo $row['shop_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from'] ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['from'] ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">员工：</label>
        <input type="text" class="am-form-field uinput uinput-220" name="search" value="<?php echo $this->_data['request']['search'] ?>">
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
        <td rowspan="2">序号</td>
        <td rowspan="2">员工姓名</td>
        <td rowspan="2">分组</td>
        <td colspan="2">办卡</td>
        <td colspan="2">充值</td>
        <td colspan="3">商品</td>
        <td rowspan="2">导购提成</td>
        <td rowspan="2">基本工资</td>
        <td rowspan="2">合计工资</td>
        <td rowspan="2">分店</td>
      </tr>
      <tr>
        <td>数量</td>
        <td>提成</td>
        <td>金额</td>
        <td>提成</td>
        <td>金额</td>
        <td>数量</td>
        <td>提成</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['worker_reward_count_list']['list'] as $key=>$row) { ?>
      <tr>
        <td><?php echo $key;?></td>
        <td><?php echo $row['c_worker_name'];?></td>
        <td><?php echo $row['c_worker_group_name'];?></td>
        <td><?php echo $row['num_kk'];?></td>
        <td><span><?php echo $row['sum_kk'];?></span></td>
        <td>取不出元</td>
        <td><span><?php echo $row['sum_cz'];?></span></td>
        <td>取不出元</td>
        <td><?php echo $row['num_xf'];?></td>
        <td><span><?php echo $row['sum_xf'];?></span></td>
        <td><span><?php echo $row['sum_dg'];?></span>元</td>
        <td><span><?php echo $row['worker_wage'];?></span>元</td>
        <td><span class="gtext-orange"><?php echo $row['worker_wage']+$row['sum_kk']+$row['sum_cz']+$row['sum_xf']+$row['sum_dg'];?></span>元</td>
        <td><?php echo $this->_data['worker_reward_count_list']['allcount'];?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['worker_reward_count_list'],$this->_data['request'],'worker_reward_count.php'); ?>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
//分页首末页不可选中
<?php pageJs($this->_data['worker_reward_count_list'],$this->_data['request'],'worker_reward_count.php'); ?>

</script>
</body>
</html>
