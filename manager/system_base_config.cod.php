<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="usystem_base_config">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">参数设置</a></li>
  </ul>
  <div class="gspace20"></div>
  <form class="am-form" id="cform1">
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">短信通知：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="sms" value="1" data-am-ucheck <?php if($this->_data['company_config']['sms_flag']==1) echo 'checked';?>> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="sms" value="2" data-am-ucheck <?php if($this->_data['company_config']['sms_flag']==2) echo 'checked';?>> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">短信余额：</label>
      <label class="am-u-lg-2 ua1 am-u-end am-text-left" style="padding-left:0;"><?php echo $this->_data['company_config']['sms_ycount'];?> 条</label>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">积分功能：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="score" value="1" data-am-ucheck <?php if($this->_data['company_config']['score_flag']==1) echo 'checked';?>> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="score" value="2" data-am-ucheck <?php if($this->_data['company_config']['score_flag']==2) echo 'checked';?>> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">员工提成：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="reward" value="1" data-am-ucheck <?php if($this->_data['company_config']['reward_flag']==1) echo 'checked';?>> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="reward" value="2" data-am-ucheck <?php if($this->_data['company_config']['reward_flag']==2) echo 'checked';?>> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">库存报警数量：</label> 
      <input class="am-form-field uinput uinput-60" type="text" name="store_warn" value="<?php echo $this->_data['company_config']['store_warn_count'];?>">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">电子档案：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="erecord" value="1" data-am-ucheck <?php if($this->_data['company_config']['erecord_flag']==1) echo 'checked';?>> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="erecord" value="2" data-am-ucheck <?php if($this->_data['company_config']['erecord_flag']==2) echo 'checked';?>> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">预约功能：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="appoint" value="1" data-am-ucheck <?php if($this->_data['company_config']['appoint_flag']==1) echo 'checked';?>> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="appoint" value="2" data-am-ucheck <?php if($this->_data['company_config']['appoint_flag']==2) echo 'checked';?>> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1"></label> 
      <div class="am-u-lg-8 ub">
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmit">
          <i class="iconfont icon-yuanxingxuanzhong"></i>
            完成
        </button>
      </div>
    </div>
    <div class="am-u-lg-12"><div class="gspace20"></div></div> 
  </form>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
  $('.csubmit').on('click', function(){
    $.post('system_base_config_add_do.php', $('#cform1').serialize(), function(res){
      if(res==0){
        window.location.reload();
      }else{
        alert('设置失败，请重新尝试或联系管理员');
      }
    })
  })
</script>
</body>
</html>
