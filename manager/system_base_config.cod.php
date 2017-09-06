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
  <form class="am-form">
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">会员密码：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">短信通知：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">短信余额：</label> 
      <input class="am-form-field uinput uinput-60" type="text" name="">  条
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">积分功能：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">员工提成：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">库存报警数量：</label> 
      <input class="am-form-field uinput uinput-60" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">电子档案：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
<!--     <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">微信会员卡底图：</label>
      <div class="am-form-file am-text-left am-u-lg-2 ub">
        <button type="button" class="am-btn am-btn-default am-btn-sm">
          <i class="am-icon-cloud-upload"></i> 选择要上传的照片
        </button>
        <input type="file" id="doc-form-file">
        <div id="file-list"></div>
      </div>
    </div> -->
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1"></label> 
      <div class="am-u-lg-8 ub">
        <button type="button" class="am-btn ubtn-sure ubtn-green">
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
</body>
</html>
