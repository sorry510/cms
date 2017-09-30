<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uwechat_config">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">支付宝当面付设置</a></li>
    <li><a href="system_weixin_pay_config.php">微信支付设置</a></li>
  </ul>
  <div class="gspace20"></div>
  <form class="am-form">
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">APP应用ID：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">支付宝公钥：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">商户私钥(RSA2)：</label> 
      <div class="am-u-lg-8 ub">
        <textarea class="am-form-field utextarea utextarea-max" name=""></textarea>
      </div>
    </div>
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
